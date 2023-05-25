@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title float-left">
                <i class="nav-icon fas fa-user"></i>
                لیست کاربران
            </h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>نام</th>
                    <th>نام خانوادگی</th>
                    <th>تاریخ ثبت نام</th>
                    <th>ایمیل</th>
                    <th>گروه ها</th>
                    <th>حساب کاربری</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>

                        <td>{{$user->name}}</td>
                        <td>{{$user->family}}</td>
                        <td>{{jdate($user->created_at)->format('Y/m/d')}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->roll}}</td>
                        <td>

                            <a class="btn btn-warning" size="7x" href="{{route('user.show',$user->id)}}">
                                <i class="fas fa-user"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
        <!-- /.card-body -->
    </div>


@endsection
