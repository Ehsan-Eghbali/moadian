<!doctype html>
<html lang="en">
<head>
    <title>{{config('name','Finance-Panel')}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/admin/auth/css/style.css">
    <link rel="icon" href="favicon.png" type="image/x-icon">

</head>
<body class="img js-fullheight body-img" >
<section class="ftco-section">

    <div class="container">

        <div class="row d-flex justify-content-start ml-xl-5" style="width: 100%">
            <div class="col-md-6 col-lg-5 col-xl-3 ml-xl-5">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="m-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="login-wrap p-0">

                    <h1 class="mb-4 text-center">{{config('name','Finance-Panel')}}<img style="width: 40px" class="img image ml-4" src="/favicon.png" alt="alibaba"></h1>

                    <form id="login" method="post" action="{{route('login')}}" class="signin-form">
                        @csrf
                        <div class="form-group mt-5">
                            <input name="user" value="{{old('user')}}"  type="text" class="form-control login-input" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <input name="password" id="password-field" type="password" class="form-control login-input" placeholder="Password" required>
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group mt-4">
                            <button form="login" type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
                        </div>
                        <div class="form-group d-md-flex">
                            <div class="w-50">
                                <label class="checkbox-wrap checkbox-primary">Remember Me
                                    <input name="remember" type="checkbox" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="/assets/admin/auth/js/jquery.min.js"></script>
<script src="/assets/admin/auth/js/popper.js"></script>
<!-- Bootstrap 4 -->
<script src="/assets/admin/auth/js/bootstrap.min.js"></script>
<script src="/assets/admin/auth/js/main.js"></script>

</body>
</html>

