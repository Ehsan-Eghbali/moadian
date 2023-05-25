@extends('admin.layouts.master')

@section('content')
    <div class="card card-yellow">
        <div class="card-header">
            <h1 class="card-title float-left">
                <i class="nav-icon fas fa-user"></i>
                ویرایش مرحله درخواست {{$requestState->name}}
            </h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form id="update" method="post" action="{{route('request-state.update',$requestState->id)}}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name">نام مرحله درخواست</label>
                    <input type="text" class="form-control" value="{{$requestState->name}}" id="name" name="name" placeholder="نام مرحله درخواست را وارد کنید">
                </div>
                <div class="form-group">
                    <label for="name">اولویت مرحله درخواست</label>
                    <input type="number" min="0" class="form-control" value="{{$requestState->priority}}" id="priority" name="priority" placeholder="اولویت مرحله درخواست را وارد کنید">
                </div>
                <div class="form-group">
                    <label for="users">کاربران</label>
                    <select multiple="multiple" name="users[]" class="form-control">
{{--                        <option value="0">--}}
{{--                            سرپرست ایجاد کننده--}}
{{--                        </option>--}}
                        @foreach($users as $user)
                            <option @if(in_array($user->id,$requestState->requestApprove->pluck('id')->toArray())) selected @endif value="{{$user->id}}">
                                {{$user->name .' '. $user->family}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" form="update" class="btn btn-outline-warning">ویرایش</button>
        </div>
    </div>


@endsection
