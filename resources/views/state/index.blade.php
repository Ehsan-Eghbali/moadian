@extends('layouts.master')

@section('content')
    <div class="card card-blue">
        <div class="card-header">
            <h1 class="card-title float-left">
                <i class="nav-icon fas fa-step-backward"></i>
                مراحل
            </h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>نام مرحله</th>
                    <th>ویرایش</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($states as $state)
                        <tr>
                            <td>{{$state->name}}</td>
                            <td>
                                <a href="{{route('state.edit',$state->id)}}" class="btn btn-warning">
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
            <a href="{{route('state.create')}}"  class="btn btn-success">جدید</a>
        </div>
    </div>


@endsection
