@extends('layouts.master')

@section('content')
    <div class="card card-green">
        <div class="card-header">
            <h1 class="card-title float-left">
                <i class="nav-icon fas fa-building"></i>
                محصول جدید
            </h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form id="create" method="post" action="{{route('company.store')}}">
                @csrf
                <div class="form-group">
                    <code>*</code>
                    <label for="name">نام شرکت</label>
                    <input type="text" class="form-control" required value="{{old('name')}}" id="name" name="name" placeholder="نام شرکت را وارد کنید">
                </div>
                <div class="form-group">
                    <label for="tax_memory_id">شناسه حافظه مالیاتی</label>
                    <input type="text" class="form-control" value="{{old('tax_memory_id')}}" id="tax_memory_id" name="tax_memory_id" placeholder="شناسه حافظه مالیاتی">
                </div>
                <div class="form-group">
                    <label for="tax_memory_id">حافظه داخلی مالیاتی</label>
                    <input type="text" class="form-control"  value="{{old('internal_series_of_tax_memory')}}" id="internal_series_of_tax_memory" name="internal_series_of_tax_memory" placeholder="حافظه مالیاتی">
                </div>
                <div class="form-group">
                    <code>*</code>
                    <label for="economical_number">شماره اقتصادی</label>
                    <input type="text" class="form-control" required value="{{old('economical_number')}}" id="economical_number" name="economical_number" placeholder="شماره اقتصادی">
                </div>
                <div class="form-group">
                    <code>*</code>
                    <label for="registration_number">شماره ثبت</label>
                    <input type="text" class="form-control" required value="{{old('registration_number')}}" id="registration_number" name="registration_number" placeholder="شماره ثبت">
                </div>
                <div class="form-group">
                    <code>*</code>
                    <label for="national_id">شناسه ملی</label>
                    <input type="text" class="form-control" required value="{{old('national_id')}}" id="national_id" name="national_id" placeholder="شناسه ملی">
                </div>
                <div class="form-group">
                    <code>*</code>
                    <label for="post_code">کد پستی</label>
                    <input type="text" class="form-control" required value="{{old('post_code')}}" id="post_code" name="post_code" placeholder="کد پستی">
                </div>
                <div class="form-group">
                    <label for="address">آدرس</label>
                    <input type="text" class="form-control"  value="{{old('address')}}" id="address" name="address" placeholder="آدرس">
                </div>
                <div class="form-group">
                    <label for="phone">تلفن</label>
                    <input type="text" class="form-control"  value="{{old('phone')}}" id="phone" name="phone" placeholder="تلفن">
                </div>
            </form>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" form="create" class="btn btn-success">ثبت</button>
        </div>
    </div>


@endsection
