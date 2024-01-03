<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Form Reset Password</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-5 col-lg-6 col-md-9">

            &nbsp;
            {{--Pesan error--}}
            @if(\Session::has('pesan'))
                <div class="alert alert-danger" role="alert" style="text-align: center">
                    {{Session::get('pesan')}}
                </div>
            @endif

            <div class="card shadow-lg"  style="margin-top: 70px">

                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h5 text-gray-900 mb-4">Form Reset Password</h1>
                                </div>
                                <form class="user" method="post" action="{{route('auth.renew')}}">
                                    @csrf
                                    <div class="form-group">
                                        <hr>
                                        <input type="password" name="password" required class="form-control form-control-user" id="password" aria-describedby="emailHelp" placeholder="Password Baru">
                                    </div>
                                    <div class="form-group">
                                        <hr>
                                        <input type="password" name="new_password" required class="form-control form-control-user" id="new_password" aria-describedby="emailHelp" placeholder="Konfirmasi Password">
                                    </div>
                                    <br>
                                    <input type="hidden" name="token" value="{{$emailHash}}">
                                    <button type="submit" class="btn btn-facebook btn-user btn-block">Reset</button>
                                    <hr>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{route('auth.index')}}">Back to Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('assets/js/sb-admin-2.min.js')}}"></script>

</body>

</html>
