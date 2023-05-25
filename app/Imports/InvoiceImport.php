<?php

namespace App\Imports;

use App\Models\Invoice;
use App\Models\Product;
use App\Repositories\InvoiceRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;

class InvoiceImport implements ToModel,WithChunkReading, WithHeadingRow,SkipsEmptyRows,SkipsOnFailure,WithValidation,WithMultipleSheets
{
    use Importable, SkipsFailures;
    private InvoiceRepositoryInterface $invoice;
    public $ins;
    public function __construct($ins,InvoiceRepositoryInterface $invoiceRepository)
    {
        $this->ins = $ins;
        $this->invoice = $invoiceRepository;
    }

    public function model(array $row)
    {
     $date = $this->invoice_date($row['date']);
     $buyer_type = $this->buyer_type($row['buyer_type']);
     $flight_type = $this->flight_type($row['flight_type']);
     $invoice = $this->generate_tax_id($row['date'],$row['product_number']);
        $this->invoice->create([
            'inno'=>$invoice['inno'],
            'invoice_date'=>$date->toDateString(),
            'controller_number'=>$invoice['controller_number'],
            'taxid'=>$invoice['tax_id'],
            'indatim'=>$date->timestamp,
            'Indati2m'=>$date->timestamp,
            'ins'=>$this->ins,
            'tins'=>$this->product($row['product_number'])->company->economical_number,
            'bn'=>$row['buyer_name'],
            'tinb'=>$row['buyer_national_id'],
            'tob'=>$buyer_type,
            'bid'=>$row['buyer_national_id'],
            'ft'=>$flight_type,
            'tprdis'=>$this->total_amount_before_discount($row['count'],$row['amount']),
            'tdis'=>$row['discount'],
            'tadis'=>$this->total_amount_after_discount($row['count'],$row['amount'],$row['discount']),
            'tvam'=>$row['total_tax'],
            'todam'=>0,
            'tbill'=>$row['total_invoice'],
            'setm'=>1,
            'cap'=>$row['total_invoice'],

            'am'=>$row['count'],
            'fee'=>$row['amount'],
            'prdis'=>$this->total_amount_before_discount($row['count'],$row['amount']),
            'dis'=>$row['discount'],
            'adis'=>$this->total_amount_after_discount($row['count'],$row['amount'],$row['discount']),
            'vra'=>0.09,
            'vam'=>$row['total_tax'],
            'product_id'=>$this->product($row['product_number'])->id,
            'user_id'=>Auth::id(),
            'state_id'=>1,
        ]);

    }


    public function total_amount_before_discount($count,$amount)
    {
        return $count*$amount;
    }
    public function total_amount_after_discount($count,$amount,$discount)
    {
        return $count*($amount-$discount);
    }
    public function flight_type($flight_type): ?int
    {
        switch ($flight_type){
            case 'داخلی':
                return 1;
            case 'خارجی':
                return 2;
            default:
                return null;
        }
    }
    public function buyer_type($buyer_type):int
    {
        switch ($buyer_type){
            case 'حقیقی':
                return 1;
            case 'حقوقی':
                return 2;
            case 'مشارکت مدنی':
                return 3;
            case 'اتباع خارجی':
                return 4;
        }
    }
    public function product($product): object
    {
        return Product::with('company','invoices')
            ->where('id','=',$product)
            ->first();
    }

    public function find_invoice_number($product)
    {
        $inno = Invoice::where('product_id','=',$product)
            ->where('ins','=',$this->ins)
            ->orderby('inno',"desc")
            ->first('inno');
        if ($inno){
            return $inno->inno + 1;
        }
        return $this->product($product)->invoice_start;
    }

    public function invoice_date($date):Carbon
    {
        $date = Carbon::parse(convert2english($date));
        return $date->setTime(now()->hour, now()->minute, now()->second);

    }

    public function tax_memory_id($product):string
    {
        return $this->product($product)->company->tax_memory_id;
    }

    public function controller_number():int
    {
        return random_int(0,9);
    }
    public function generate_tax_id($date, $product) :array
    {
        $tax_memory_id = $this->tax_memory_id($product);
        $invoice_date = substr(jdate($this->invoice_date($date))->format('ymd'),1,5);
        $invoice_number = $this->find_invoice_number($product);
        $controller_number = $this->controller_number();
        return [
            'tax_memory_id'=>$tax_memory_id,
            'invoice_date'=>$invoice_date,
            'inno'=>$invoice_number,
            'controller_number'=>$controller_number,
            'tax_id'=>$tax_memory_id.$invoice_date.$invoice_number.$controller_number
        ];
    }

    public function onFailure(Failure ...$failures)
    {
        foreach ($failures as $failure) {
            foreach ($failure->errors() as $error){
                $message = 'در ردیف:'.$failure->row().' '.$error;
                Session::flash('error',$message);
            }
        }

            return back();


    }

    public function chunkSize(): int
    {
        return 10;
    }
    public function rules(): array
    {

        return [
            '*.product_number' => 'required|exists:products,id',
            '*.count' => 'required',
            '*.date' => 'required',
            '*.amount' => 'nullable',
            '*.discount' => 'required',
            '*.total_tax' => 'required',
            '*.total_invoice' => 'required',
            '*.buyer_name' => 'required',
            '*.buyer_national_id' => 'required',
            '*.buyer_type' => 'required',
            '*.flight_type' => 'nullable',
        ];
    }

    public function sheets(): array
    {
        return[
            'list'=>new self($this->ins,$this->invoice)
        ];
    }
}
