<?php

namespace App\Models\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait InvoiceFilterTrait
{


    /**
     * set query filter on builder
     *
     * @param Builder                  $builder
     * @param Request $request
     *
     * @return void
     */
    public function setFilter(Builder $builder, Request $request): void
    {
        $filters = $this->getFilters($request);
        foreach ($filters as $key => $value) {
            $pars_key = preg_replace('/[0-9]+/', '', $key);
            $method   = "request" . Str::replace("_", "", $pars_key) . "Filter";
            if (method_exists($this, $method)) {
                $this->$method($value, $builder);
            }
        }
    }



    /**
     * set query sort on builder
     *
     * @param Builder $builder
     * @param Request $request
     *
     * @return void
     */
    public function setOrder(Builder $builder, Request $request): void
    {
        $orders  = $this->getOrders($request);
        if(empty($orders)){
            $builder->orderBy('id', 'desc');
        }
        $builder->orderBy($orders[0],$orders[1]);
    }



    /**
     * set the filter on id
     *
     * @param string $value
     * @param string $builder
     *
     * @return void
     */
    public function requestTaxIdFilter($value, $builder)
    {
        $builder->where('taxid', 'like',"%".$value."%")->orderBy('id', 'desc');
    }



    /**
     * set the filter on amount
     *
     * @param string $value
     * @param string $builder
     *
     * @return void
     */
//    public function requestAmountFilter($value, $builder)
//    {
//        $builder->where('amount', 'LIKE', '%' . $value . '%')->orderBy('amount', 'desc');
//
//    }
//
//
//
//    /**
//     * set the filter on amount
//     *
//     * @param string $value
//     * @param string $builder
//     *
//     * @return void
//     */
//    public function requestRequestTypeItemsFilter($value, $builder)
//    {
//        $type_id = RequestTypeItem::where('name', 'LIKE', '%' . $value . '%')->get('id');
//        $builder->whereIn("requestTypeItem", $type_id)->orderby('requestTypeItem');
//
//    }
//
//
//
//    /**
//     * set the filter on amount
//     *
//     * @param string $value
//     * @param string $builder
//     *
//     * @return void
//     */
//    public function requestCashFlowFactorFilter($value, $builder)
//    {
//        $factor_id = CashFlowFactor::where('CashFlowFactorName', 'LIKE', '%' . $value . '%')->get('id');
//        $builder->whereIn("CashFlowFactors_id", $factor_id)->orderby('CashFlowFactors_id');
//    }
//
//
//
//    /**
//     * set the filter on dls4
//     *
//     * @param string $value
//     * @param string $builder
//     *
//     * @return void
//     */
//    public function requestDlsFourFilter($value, $builder)
//    {
//        $dl_id = Dl::where('title', 'LIKE', '%' . $value . '%')->get('id');
//        $builder->whereIn("dl4", $dl_id)->orderby('dl4');
//    }
//
//
//
//    /**
//     * set the filter on dls5
//     *
//     * @param string $value
//     * @param string $builder
//     *
//     * @return void
//     */
//    public function requestDlsFiveFilter($value, $builder)
//    {
//        $dl_id = Dl::where('title', 'LIKE', '%' . $value . '%')->get('id');
//        $builder->whereIn("dl5", $dl_id)->orderby('dl5');
//    }
//
//
//
//    /**
//     * set the filter on dls6
//     *
//     * @param string $value
//     * @param string $builder
//     *
//     * @return void
//     */
//    public function requestDlsSixFilter($value, $builder)
//    {
//        $dl_id = Dl::where('title', 'LIKE', '%' . $value . '%')->get('id');
//        $builder->whereIn("dl6", $dl_id)->orderby('dl6');
//    }
//
//
//
//    /**
//     * set the filter on description
//     *
//     * @param string $value
//     * @param string $builder
//     *
//     * @return void
//     */
//    public function requestDescriptionFilter($value, $builder)
//    {
//        $builder->where("description", 'LIKE', '%' . $value . '%')->orderby('description');
//    }
//
//
//
//    /**
//     * set the filter on description
//     *
//     * @param string $value
//     * @param string $builder
//     *
//     * @return void
//     */
//    public function requestBankFilter($value, $builder)
//    {
//        $builder->whereRelation("requestPayment.bank", 'banks.name', 'LIKE', '%' . $value . '%');
//    }
//
//
//
//    public function requestbankdlFilter($value, $builder)
//    {
//        $builder->whereRelation("requestPayment.bankDl", 'banks.name', 'LIKE', '%' . $value . '%');
//    }
//
//
//
//    public function requestOriginAccountFilter($value, $builder)
//    {
//        $builder->where(function ($builder) use ($value) {
//            $builder->whereRelation("requestPayment.bank", 'banks.account_number', 'LIKE', '%' . $value . '%')
//                    ->orWhereRelation("requestPayment.bank", 'banks.international_number', 'LIKE', '%' . $value . '%')
//            ;
//        });
//
//    }
//
//
//
//    public function requestDestinationAccountFilter($value, $builder)
//    {
//        $builder->where(function ($builder) use ($value) {
//            $builder->whereRelation("requestPayment.bankDl", 'banks.account_number', 'LIKE', '%' . $value . '%')
//                    ->orWhereRelation("requestPayment.bankDl", 'banks.international_number', 'LIKE', '%' . $value . '%')
//            ;
//        });
//
//    }
//
//
//
//    public function requestDepositCodeFilter($value, $builder)
//    {
//        $builder->whereRelation("requestPayment", 'request_payments.depositCode', 'LIKE', '%' . $value . '%');
//
//    }
//
//
//
//    /**
//     * set the filter on name
//     *
//     * @param string $value
//     * @param string $builder
//     *
//     * @return void
//     */
//    public function requestUserFilter($value, $builder)
//    {
//
//        $user_id = User::where('name', 'LIKE', '%' . $value . '%')
//                       ->orWhere('family', 'LIKE', '%' . $value . '%')
//                       ->get('id')
//        ;
//        $builder->whereIn("user_id", $user_id);
//    }
//
//
//
//    /**
//     * set the filter on name
//     *
//     * @param string $value
//     * @param string $builder
//     *
//     * @return void
//     */
//    public function requestStateFilter($value, $builder)
//    {
//        $builder->whereRelation("states", 'request_states.name', 'LIKE', '%' . $value . '%');//TODO
//    }
//
//
//
//    /**
//     * set the filter on do_date
//     *
//     * @param string $value
//     * @param string $builder
//     *
//     * @return void
//     */
//    public function requestdodateFilter($value, $builder)
//    {
//        $parts = explode('/', $value);
//        if (strlen($value) >= 4) {
//            $year = $parts[0];
//        }
//        if (isset($parts[1]) && strlen($value) >= 7 && strlen($value) <= 10) {
//            $month = $parts[1];
//        }
//        if (isset($parts[2]) && strlen($value) >= 10 && strlen($value) <= 11) {
//            $day = $parts[2];
//        }
//
//        if (isset($year) && isset($month) && isset($day)) {
//            // Full date: year, month, day
//            $builder->where('do_date', convert2english("$year/$month/$day")->toDate());
//        } elseif (isset($year) && isset($month)) {
//            // Year and month
//
//            if (intval($month) >= 6) {
//                $builder->whereBetween('do_date', [
//                     convert2english("$year/$month/01")->toDate(),
//                     convert2english("$year/$month/30")->toDate(),
//                ]);
//            } else {
//                $builder->whereBetween('do_date', [
//                     convert2english("$year/$month/01")->toDate(),
//                     convert2english("$year/$month/31")->toDate(),
//                ]);
//            }
//        } elseif (isset($year)) {
//            // Year only
//
//            $builder->whereBetween('do_date', [
//                 convert2english("$year/01/01")->toDate(),
//                 convert2english("$year/12/31")->toDate(),
//            ]);
//        } else {
//            return;
//        }
//    }
//
//
//
//    /**
//     * set the filter on name
//     *
//     * @param string $value
//     * @param string $builder
//     *
//     * @return void
//     */
//    public function requestDepositeCodeFilter($value, $builder)
//    {
//        //TODO
//    }
//
//
//
//    /**
//     * get array of filters
//     *
//     * @param \Illuminate\Http\Request $request
//     *
//     * @return array
//     */
    private function getFilters(Request $request): array
    {
        $filters = [];
        foreach ($request->columns as $column) {
            if ($value = $column["search"]["value"]) {
                $filters[$column['name']] = $column["search"]["value"];
            }
        }
        return $filters;
    }
//
//
//
//    /**
//     * get array of filters
//     *
//     * @param \Illuminate\Http\Request $request
//     *
//     * @return array|void
//     */
    private function getOrders(Request $request)
    {
        if(!isset($request->order)){
            return;
        }
        return [$request['columns'][$request->order[0]['column']]["name"], $request->order[0]['dir']];
    }
}
