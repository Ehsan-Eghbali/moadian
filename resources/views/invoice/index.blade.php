@extends('invoice.layouts.index')
@section('ajax-url'){{route('invoice.cartable')}}@endsection
@section('card-header')
    <div class="btn-group float-right">
        <button type="button" class="btn btn-dark" aria-expanded="false">عملیات ها</button>
        <button type="button" class="btn btn-dark dropdown-toggle dropdown-icon" data-toggle="dropdown">
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <div class="dropdown-menu" role="menu">
            <form id="approve" class="d-none" method="post" action="{{route('invoice.approve')}}">
                <input type="hidden" class="requestSelect" id="approveSelect" name="invoices">
                @csrf
                @method('put')
            </form>
            <button class="dropdown-item d-none" id="approveRequest" form="approve">تایید</button>
        </div>
    </div>
    <h3 class="card-title float-left text-white pt-2">کارتابل من</h3>
@endsection
