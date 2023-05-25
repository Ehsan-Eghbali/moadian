@extends('layouts.master')

@section('content')
    <div class="card card-green">
        <div class="card-header">
            <h1 class="card-title float-left">
                <i class="nav-icon fas fa-step-backward"></i>
                مرحله جدید
            </h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form id="create" method="post" action="{{route('state.store')}}">
                @csrf
                <div class="form-group">
                    <label for="name">نام مرحله</label>
                    <input type="text" class="form-control" required value="{{old('name')}}" id="name" name="name" placeholder="نام مرحله را وارد کنید">
                </div>

            </form>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" form="create" class="btn btn-success">ثبت</button>
        </div>
    </div>


@endsection
