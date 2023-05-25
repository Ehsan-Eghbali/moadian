<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{config('name','Finance-Panel')}}</title>

    <link rel="icon" href="/favicon.png" type="image/x-icon">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="/assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
{{--    <!-- Theme style -->--}}
    <link rel="stylesheet" href="/assets/admin/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/assets/admin/plugins/daterangepicker/daterangepicker.css">
    <!-- Bootstrap 4 RTL -->
    <link rel="stylesheet" href="/assets/admin/dist/css/bootstrapRtl.css">
    <!-- Custom style for RTL -->
    <link rel="stylesheet" href="/assets/admin/dist/css/custom.css">
    <!-- Fonts -->
    <link rel="stylesheet" href="/assets/fonts/fontiran.css">
    <!-- Drop Zone -->
    <link rel="stylesheet" href="/assets/dropzone/css/dropzone.min.css">
    <link rel="stylesheet" href="/assets/dropzone/css/basic.min.css">

    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="/assets/admin/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/assets/admin/plugins/select2/css/select2.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- persian Date-->
    <link rel="stylesheet" href="/assets/admin/plugins/persianDatepicker/persian-datepicker.min.css"/>
    @yield('css')
</head>
<body class="sidebar-mini layout-fixed sidebar-collapse">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="/assets/admin/images/logo/alibabaurl.svg" alt="alibaba" width="200">
    </div>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
             <a href="{{route('home')}}" class="nav-link">خانه</a>
            </li>



        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-yellow elevation-4">
        <!-- Brand Logo -->
        <a href="{{route('home')}}" class="brand-link">

            <img src="/assets/admin/images/logo/alibaba.svg" alt="کشفلو" class="brand-image img-circle elevation-3"
                     style="opacity: .8">
            <span class="brand-text font-weight-light">{{config('name','Finance-Panel')}}</span>
        </a>


        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center">
                <div class="image pl-2">
                    <img src=" /assets/admin/images/user.svg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="{{route('profile')}}" class="d-block">{{$auth->name .' ' .$auth->family}}</a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            @include('layouts.includes.sidebar')
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content pt-2">
            <div class="container-fluid">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="m-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        <div>{{session('message')}}</div>
                    </div>
                @endif
                @if(Session::has('error'))
                    <div class="alert alert-danger">
                        <div>{{session('error')}}</div>
                    </div>
                @endif
                @if(Session::has('alert'))
                    <div class="alert alert-warning">
                        <div>{{session('alert')}}</div>
                    </div>
                @endif

               @yield('content')

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/assets/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap 4 rtl -->
<script src="/assets/admin/dist/js/bootstrapRTL.min.js"></script>
<!-- overlayScrollbars -->
<script src="/assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/assets/admin/dist/js/adminlte.min.js"></script>

<script src="/assets/admin/dist/js/tagsinput.js"></script>
<!-- Ekko Lightbox -->
<script src="/assets/admin/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- DropZone -->
<script src="/assets/dropzone/js/dropzone.min.js"></script>
<!-- num2Persian -->
<script src="/assets/admin/plugins/num2persian/num2persian.min.js"></script>
<!-- persian Date-->
<script src="/assets/admin/plugins/persianDatepicker/persian-date.min.js"></script>
<script src="/assets/admin/plugins/persianDatepicker/persian-datepicker.min.js"> </script>

<script src="/assets/admin/plugins/select2/js/select2.full.min.js"></script>

<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
    })
</script>
@yield('script')
</body>
</html>
