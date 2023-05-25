@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-3">
            <form id="update" action="{{route('user.update',$user->id)}}" method="post" enctype="multipart/form-data">
                @method('PUT')
            @csrf

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="profile-pic">
                        <label class="-label" for="file">
                            <span class="glyphicon glyphicon-camera"></span>
                            <span>تغییر عکس</span>
                        </label>
                        <input accept=".jpg, .jpeg, .png ,.webp" id="file" name="file" type="file" onchange="loadFile(event)"/>
                        <img id="output"  src="@if(count($user->attachment)>0) {{$user->attachment[0]->path}} @else /assets/admin/images/user.svg @endif" class="profile-user-img img-fluid img-circle">
                    </div>

                    <h3 class="profile-username text-center">{{$user->name . ' ' . $user->family}}</h3>
                    <p class="text-muted text-center">{{$user->user}}</p>
{{--                    <ul class="list-group list-group-unbordered mb-3">--}}
{{--                        <li class="list-group-item">--}}
{{--                            <b>درخواست های ثبت شده</b>--}}
{{--                            <a class="float-right">0</a>--}}
{{--                        </li>--}}
{{--                        <li class="list-group-item">--}}
{{--                            <b>درخواست های منتظر تایید</b> <a class="float-right">0</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
                    @if($user->status ==1)
                        <button form="update" type="submit" class="btn btn-outline-danger  btn-block" name="status" value="0"><b>Block</b></button>
                    @else
                        <button form="update" type="submit" class="btn  btn-outline-success  btn-block" name="status" value="1"><b>Active</b></button>
                    @endif
                    <button form="update" type="submit" class="btn btn-warning btn-block"><b>ویرایش اطلاعات</b></button>
                </div>
                <!-- /.card-body -->
            </div>
            </form>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
                <div class="card-header ">
                    <h3 class="card-title float-left">مشخصات</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <strong><i class="fas fa-map-marker-alt mr-1"></i> محل فعالیت</strong>

                    <p class="text-muted">
                        مالی
                    </p>
                    <hr>

                    <strong><i class="fas fa-user mr-1"></i> سمت</strong>

                    <p class="text-muted">{{implode(',',$user->roll->pluck('name')->toArray())}}</p>
                    <hr>

                    <strong>
                        <i class="fas fa-envelope-open mr-1"></i>ایمیل</strong>

                    <p class="text-muted">
                        {{$user->email}}
                    </p>



                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" href="#messages" data-toggle="tab">اطلاعیه ها</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#password" data-toggle="tab">تغییر رمز عبور</a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="#favorites" data-toggle="tab">درخواست ها</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="#favorites" data-toggle="tab">تنظیمات</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="#permission" data-toggle="tab">دسترسی</a>--}}
{{--                        </li>--}}
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="messages">
                            <!-- The timeline -->
                            @if(count($user->messages)>0)
                            <div class="timeline timeline-inverse">
                                <!-- timeline time label -->
                                @foreach($user->messages as $message)
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-envelope @if($message->type == 1) bg-primary @elseif($message->type == 2) bg-yellow @elseif($message->type == 3) bg-danger @endif"></i>

                                    <div class="timeline-item">
                                        <span class="time float-right"><i class="far fa-clock"></i> {{jdate($message->created_at)}}</span>

                                        <h3 class="timeline-header">{{$message->subject}}</h3>

                                        <div class="timeline-body">
                                            {{$message->message}}
                                        </div>

                                    </div>
                                </div>
                                @endforeach
                                <!-- END timeline item -->
                                <!-- timeline item -->

                            </div>
                                <div>
                                    <form id="read" action="{{route('messages.read')}}" method="post">
                                        @method('PUT')
                                        @csrf
                                    </form>
                                    <button form="read" class="btn btn-primary">همه را خواندم</button>
                                </div>
                            @else
                                <div class="img image-clean text-center" >
                                    <img src="/assets/admin/images/empty_inbox.svg"style="height: 20rem">
                                </div>

                            @endif

                        </div>
                        <div class="tab-pane" id="password">
                            <div class="card-body">
                                <form action="{{route('user.update',$user->id)}}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input name="password" type="password" class="form-control" placeholder="رمز عبور جدید">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input name="password_confirmation" type="password" class="form-control" placeholder="تکرار رمز عبور جدید">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary btn-block">تغییر رمز عبور</button>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                    </div>

                </div>

                <!-- /.tab-content -->
{{--                <div class="card-footer">--}}
{{--                    <form method="get" action="{{route('order.create')}}">--}}
{{--                        @csrf--}}
{{--                        <input type="hidden" name="user" value="{{$user->id}}">--}}
{{--                        <button class="btn btn-info">--}}
{{--                            <i class="fas fa-truck"></i>--}}
{{--                            ثبت سفارش--}}
{{--                        </button>--}}
{{--                    </form>--}}
{{--                </div>--}}
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->

    </div>
@endsection
@section('script')
<script>
    var loadFile = function (event) {
        var image = document.getElementById("output");
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
@endsection
