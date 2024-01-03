@extends('superadmin/layout/main')
@section('content')


    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header">
                <strong>Akun yang sedang login</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-borderless">
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><b>{{Auth::guard('superadmin')->user()->name}}</b></td>
                            </tr>
                            <tr>
                                <td>Gmail</td>
                                <td>:</td>
                                <td><b>{{Auth::guard('superadmin')->user()->email}}</b></td>
                            </tr>
                            <tr>
                                <td>Role</td>
                                <td>:</td>
                                <td><b>{{Auth::guard('superadmin')->user()->role}}</b></td>
                            </tr>
                            <tr>
                                <td>Tanggal & Waktu Login</td>
                                <td>:</td>
                                <td><b><?php
                                        date_default_timezone_set("Asia/Jakarta") . '<br>';

                                        echo date("d-m-Y H:i"); ?></b></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
