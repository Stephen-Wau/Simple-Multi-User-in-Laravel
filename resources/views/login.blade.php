<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SI TOKO</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">

    <style>
        .hold-transition{
            background-image: url({{asset('assets/img/wall.jpg')}});
            background-repeat: repeat;
            background-attachment: fixed;
            background-size: contain;
        }
    </style>
</head>
<body class="hold-transition register-page">

&nbsp;
{{--Pesan error--}}
@if(\Session::has('pesan'))
    <div class="alert alert-danger" role="alert" style="text-align: center">
        {{Session::get('pesan')}}
    </div>
@endif

<div class="register-box">
    <div class="card card-outline card-red" style="border-radius: 10% 10%">
        <div class="card-header text-center">
            <a href="" class="h1"><b>Tes </b>Toko</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Login To Your Account</p>

            <form action="{{route('auth.verify')}}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <button type="submit" class="btn btn-success btn-block">Sign In</button>
                </div>
            </form>

            <div class="text-center">
                <a href="{{route('auth.reset')}}" class="text-center">Forgot Password?</a>
            </div>

        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>
</html>
