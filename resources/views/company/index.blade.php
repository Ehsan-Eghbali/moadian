@extends('layouts.master')

@section('content')
    <div class="card card-blue">
        <div class="card-header">
            <h1 class="card-title float-left">
                <i class="nav-icon fas fa-building"></i>
                شرکت ها
            </h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>نام شرکت</th>
                    <th>ویرایش</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($companies as $company)
                        <tr>
                            <td>{{$company->name}}</td>
                            <td>
                                <a href="{{route('company.edit',$company->id)}}" class="btn btn-warning">
                                    ویرایش
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a href="{{route('company.create')}}"  class="btn btn-success">جدید</a>
        </div>
    </div>


@endsection
