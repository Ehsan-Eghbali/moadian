<?php

namespace App\Http\Controllers;

use App\Imports\InvoiceImport;
use App\Models\Invoice;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Repositories\InvoiceRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;

class InvoiceController extends Controller
{
    private InvoiceRepositoryInterface $invoice;
//    public $ins;
    public function __construct(InvoiceRepositoryInterface $invoiceRepository)
    {
        $this->invoice = $invoiceRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('invoice.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoiceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }

    public function index_import()
    {
        return view('invoice.import');
    }
    public function store_import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new InvoiceImport($request->ins,$this->invoice),$file);
        return back()->with('message',trans('notification.message'));
    }

    public function cartable(Request $request)
    {
        $builder = $this->invoice->getInvoiceBuilder();
        (new Invoice())->setFilter($builder, $request);
        (new Invoice())->setOrder($builder, $request);
        $counter = clone $builder;
        $total   = $counter->count();

        $length = $request->length;
        $length == -1 ? $length = $total : $length;
        $invoices = $builder
            ->skip($request->start)
            ->limit($length)
            ->get()
        ;
        return Response::json(['data' => $invoices, 'iTotalRecords' => $total, 'iTotalDisplayRecords' => $total]);
    }

    public function approve(Request $request)
    {
        $invoices = explode(',', $request->invoices);

        foreach ($invoices as $invoice){
            $inv = Invoice::findornew($invoice);
            $inv->state_id += 1;
            $inv->save();
        }
        return back()->with('message','با موفقیت ثبت شد');
    }

    public function update_data()
    {

    }
}
