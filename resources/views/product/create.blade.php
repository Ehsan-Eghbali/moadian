@extends('layouts.master')

@section('content')
    <div class="card card-green">
        <div class="card-header">
            <h1 class="card-title float-left">
                <i class="nav-icon fas fa-box"></i>
                محصول جدید
            </h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form id="create" method="post" action="{{route('product.store')}}">
                @csrf
                <div class="form-group">
                    <label for="name">نام محصول</label>
                    <input type="text" class="form-control" required value="{{old('name')}}" id="name" name="name" placeholder="نام محصول را وارد کنید">
                </div>
                <div class="form-group">
                    <label for="code">کد محصول</label>
                    <input type="text" class="form-control" required value="{{old('code')}}" id="code" name="code" placeholder="کد محصول را وارد کنید">
                </div>
                <div class="form-group">
                    <label for="code">شروع شماره فاکتور</label>
                    <input type="number" class="form-control" required value="{{old('invoice_start')}}" id="invoice_start" name="invoice_start" placeholder="شروع شماره فاکتور را وارد کنید">
                </div>
                <div class="form-group">
                    <label for="code">پایان شماره فاکتور</label>
                    <input type="number" class="form-control" required value="{{old('invoice_end')}}" id="invoice_end" name="invoice_end" placeholder="پایان شماره فاکتور را وارد کنید">
                </div>
                <div class="form-group">
                    <label for="code">الگو صورتحساب</label>
                    <select class="form-control select2" name="invoice_pattern_id">
                        @foreach($invoicePatterns as $invoicePattern)
                            <option value="{{$invoicePattern->code}}">{{$invoicePattern->invoice_type->name.'-'.$invoicePattern->name}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <label for="code">نام شرکت</label>
                    <select class="form-control select2" name="company_id">
                        @foreach($companies as $company)
                            <option value="{{$company->id}}">{{$company->name}}</option>
                        @endforeach

                    </select>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" form="create" class="btn btn-success">ثبت</button>
        </div>
    </div>


@endsection
