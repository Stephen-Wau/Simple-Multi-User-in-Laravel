<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot Password</title>

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
            background-image: url({{asset('assets/img/cae.jpg')}});
            background-repeat: repeat;
            background-attachment: fixed;
            background-size: contain;
        }
    </style>
</head>
<body class="hold-transition login-page">

&nbsp;
{{--Pesan error--}}
@if(\Session::has('pesan'))
    <div class="alert alert-danger" role="alert" style="text-align: center">
        {{Session::get('pesan')}}
    </div>
@endif

<div class="login-box">
    <div class="card card-outline card-red" style="border-radius: 10% 10%;">
        <div class="card-header text-center">
            <a href="" class="h1"><b>Rental</b>Mobil</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
            <form action="{{route('auth.forgot')}}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-success btn-block">Request new password</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <div>
                <br>
                <p class="text-center">
                    <a href="{{route('auth.index')}}">Back To Login</a>
                </p>
            </div>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>
</html>
