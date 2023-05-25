@extends('layouts.master')

@section('content')
    <div class="card card-blue">
        <div class="card-header">
            <h1 class="card-title float-left">
                <i class="nav-icon fas fa-box-open"></i>
                انواع محصولات
            </h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>کد محصول</th>
                    <th>نام محصول</th>
                    <th>شناسه محصول</th>
                    <th>شروع فاکتور محصول</th>
                    <th>پایان فاکتور محصول</th>
                    <th>ویرایش</th>
                    <th>حذف</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->code}}</td>
                            <td>{{$product->invoice_start}}</td>
                            <td>{{$product->invoice_end}}</td>
                            <td>
                                <a href="{{route('product.edit',$product->id)}}" class="btn btn-warning">
                                    ویرایش
                                </a>
                            </td>
                            <td>
                                <a href="{{route('product.edit',$product->id)}}" class="btn btn-danger">
                                    حذف
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a href="{{route('product.create')}}"  class="btn btn-success">جدید</a>
        </div>
    </div>


@endsection
