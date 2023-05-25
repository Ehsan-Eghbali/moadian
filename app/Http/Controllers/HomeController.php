<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function db()
    {
        return DB::connection('sqlsrv')->select('SELECT TOP (10) [OrderItemId]
      ,[TransactionPersianDate]
      ,[TransactionTypeName]
      ,[PassengerFullNameEn]
      ,[PassengerFullNamePe]
      ,[PassengerIdentificationCode]
      ,[EconomicNo]
      ,[SaleType]
      ,[PassengerPassportNo]
      ,[TotalGrossSaleAmountBeforeDiscount]
      ,[DiscountAmount]
      ,[PureSaleAmount]
      ,[TotalTaxAndVatAmount]
      ,[TotallegalTaxAndVatAmount]
      ,[TotalPureSaleAmount]
      ,[PaymentMethod]
      ,[SalePaymentBankAmount]
      ,[ProviderName]
      ,[ProductName]
      ,[AgancyName]
      ,[AirlineName]
      ,[CharterAgencyContract]
      ,[CountAndAmountBasedOnProductInRow]
      ,[GrossSaleAmountPerItem]
      ,[GrossSaleAmountBeforeDiscount]
      ,[ItemDiscount]
      ,[ItemPureSaleAmount]
      ,[ItemTaxAndVatAmountOf]
      ,[ItemTotalAmountOfServices]
      ,[VoucherTypeName]
      ,[TerminalId]
      ,[MerchandId]
      ,[SalePaymentTerminalId]
      ,[SalePaymentTypeName]
      ,[SalePaymentReferenceNumber]
      ,[CardNo]
      ,[SalePaymentPersianDate]
      ,[PayableSaleAmount]
      ,[SalePaymentBankAmount2]
  FROM [AlibabaPanel].[Financial].[vw_MoadianReport_AllProducts_SaleRefundReisue]');
    }
}
