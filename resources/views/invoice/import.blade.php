@extends('layouts.master')

@section('content')

    <div class="card card-yellow">
        <div class="card-header">
            <h1 class="card-title float-left">
                <i class="nav-icon fas fa-file-import"></i>
                بارگزاری فایل فاکتور ها
            </h1>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <form id="create" method="post" action="{{route('invoice.store_import')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="code">موضوع صورتحساب</label>
                    <select class="form-control select2" name="ins">
                        <option selected value="">لطفا انتخاب کنید</option>
                        <option value="1">اصلی</option>
                        <option value="2">اصلاحی</option>
                        <option value="3">ابطالی</option>
                        <option value="4">برگشت از فروش</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file text-left">
                            <input name="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" form="create" class="btn btn-outline-success">ثبت</button>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function () {
            bsCustomFileInput.init();
        });
    </script>
    <script src="/assets/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
@endsection
