@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title float-left">
                <i class="nav-icon fas fa-user-plus"></i>
                کاربر جدید
            </h1>
        </div>
        <form id="register" method="POST" action="{{route('user.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <code>*</code>
                            <label for="name">نام</label>
                            <input type="text" name="name" value="{{old('name')}}" required autofocus class="form-control" id="name" placeholder="نام کاربر را وارد کنید">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <code>*</code>
                            <label for="family">نام خانوادگی</label>
                            <input type="text" name="family" value="{{old('family')}}" required autofocus class="form-control" id="family" placeholder="نام خانوادگی کاربر را وارد کنید">
                        </div>
                    </div>


                    <div class="col-sm-4">
                        <div class="form-group">
                            <code>*</code>
                            <label for="birthday">نام کاربری</label>
                            <input type="text" name="user" value="{{old('user')}}" autofocus class="form-control" id="user" placeholder="نام کاربری را وارد کنید">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="email">ایمیل</label>
                            <input type="email" name="email" value="{{old('email')}}"  autofocus class="form-control" id="email" placeholder=" پست الکترونیکی کاربر را وارد کنید">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <code>*</code>
                            <label for="is_signatory">امضا کننده</label>
                            <select name="is_signatory" class="form-control">
                                <option selected value="0">
                                    خیر
                                </option>
                                <option value="1">
                                    بله
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <code>*</code>
                            <label for="password">رمز کاربر</label>
                            <input type="text" name="password" class="form-control" value="{{substr(md5(mt_rand()), 0, 12)}}" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer clearfix">
                <ul class="m-0 p-0">
                    <button class="btn btn-primary" type="submit" form="register">ثبت نام</button>
                </ul>
            </div>
        </form>
    </div>
@endsection

