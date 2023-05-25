@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title float-left">
                <i class="nav-icon fas fa-user-plus"></i>
                کاربر {{$editUser->name}}
            </h1>
        </div>
        <form id="update" method="POST" action="{{route('user.update',$editUser->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <code>*</code>
                            <label for="name">نام</label>
                            <input type="text" name="name" value="{{$editUser->name}}" required autofocus class="form-control" id="name" placeholder="نام کاربر را وارد کنید">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <code>*</code>
                            <label for="family">نام خانوادگی</label>
                            <input type="text" name="family" value="{{$editUser->family}}" required autofocus class="form-control" id="family" placeholder="نام خانوادگی کاربر را وارد کنید">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="birthday">تاریخ تولد</label>
                            <input type="text" name="birthday"  value={{$editUser->birthday}}  autofocus class="form-control" id="birthday" placeholder="تاریخ تولد کاربر را وارد کنید">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <code>*</code>
                            <label for="phone">شماره همراه</label>
                            <input type="number" name="phone" value="{{$editUser->phone}}" required autofocus class="form-control" id="phone" placeholder="شماره همراه کاربر را وارد کنید">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="nationalCode">کد ملی</label>
                            <input type="text" name="nationalCode" value="{{$editUser->nationalCode}}" autofocus class="form-control" id="nationalCode" placeholder="کد ملی کاربر را وارد کنید">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="email">ایمیل</label>
                            <input type="email" name="email" value="{{$editUser->email}}"  autofocus class="form-control" id="email" placeholder=" پست الکترونیکی کاربر را وارد کنید">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="input">نوع کاربر</label>
                            <select class="form-control" name="personalType">
                                <option value="1"  @if($editUser->personalType == 1) selected @endif>
                                    حقیقی
                                </option>
                                <option value="2"  @if($editUser->personalType == 2) selected @endif>
                                    حقوقی
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="photo">عکس</label>
                            <input type="hidden" name="photo_id" id="user-photo" required>
                            <div id="photo" class="dropzone"></div>
                        </div>
                    </div>
                    @if($editUser->photo)
                        <div class="col-sm-1" id="photo{{$editUser->photo->id}}">
                            <div class="form-group">
                                <label for="category_id">عکس ها</label>
                                <a href="{{$editUser->photo->path}}" data-toggle="lightbox" data-title="{{$editUser->name}}" data-gallery="gallery">
                                    <img src="{{$editUser->photo->path}}" class="img-rounded img-lg" alt="{{$editUser->name}}"/>
                                </a>
                                <button type="button" class="btn btn-danger mt-2" onclick="removeImages({{$editUser->photo->id}})">Delete</button>
                            </div>

                        </div>
                    @endif
                </div>
            </div>

            <div class="card-footer clearfix">
                <ul class="m-0 p-0">
                    <button onclick="userGallery()" class="btn btn-warning" type="submit" form="update">ثبت تغییرات</button>
                </ul>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script>
        $("#birthday").pDatepicker(
            {
                "inline": false,
                "initialValue": true,
                "format": "L",
                "viewMode": "year",
                "autoClose": true,
                "position": "auto",
                "altFormat": "L",
                "onlyTimePicker": false,
                "onlySelectOnDate": true,
                "calendarType": "persian",
                "inputDelay": "0",
                "observer": true,
                "initialValueType":'persian',
                "calendar": {
                    "persian": {
                        "locale": "en",
                        "showHint": true,
                    },
                    "gregorian": {
                        "locale": "en",
                        "showHint": true
                    }
                },
                "toolbox": {
                    "enabled": true,
                    "calendarSwitch": {
                        "enabled": true,
                        "format": "MMMM-MM"
                    },
                    "todayButton": {
                        "enabled": true,
                        "text": {
                            "fa": "امروز",
                            "en": "Today"
                        }
                    },
                    "submitButton": {
                        "enabled": true,
                        "text": {
                            "fa": "تایید",
                            "en": "Submit"
                        }
                    },
                    "text": {
                        "btnToday": "امروز"
                    }
                },
                "timePicker": {
                    "enabled": false,
                    "step": 1,
                    "hour": {
                        "enabled": false,
                        "step": null
                    },
                    "minute": {
                        "enabled": false,
                        "step": null
                    },
                    "second": {
                        "enabled": false,
                        "step": null
                    },
                    "meridian": {
                        "enabled": false
                    }
                },
                "responsive": false
            }
        );
    </script>
    <script>
        Dropzone.autoDiscover = false;
        @if($editUser->photo)
        let photosGallery = {{$editUser->photo_id}}
            @else
                let photosGallery = []
        @endif

        let drop = new Dropzone('#photo', {
            addRemoveLinks: true,
            thumbnailMethod: 'crop',
            resizeWidth: 500,
            resizeHeight: 500,
            maxFiles:1,
            acceptedFiles: ".jpg, .jpeg, .png ,.webp",
            dictDefaultMessage: "تصویر کاربر را وارد کنید",
            url: "{{ route('photo.store') }}",
            sending: function(file, xhr, formData){
                formData.append("_token","{{csrf_token()}}")
            },
            success: function(file, response){
                photosGallery = response.photo_id
            }
        });
        removeImages = function(id){
            let index = photosGallery.indexOf(id)
            photosGallery.splice(index, 1);
            document.getElementById('photo' + id).remove();
        }
        userGallery = function() {
            document.getElementById('user-photo').value = photosGallery
        }
    </script>
@endsection
