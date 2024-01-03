@extends('superadmin/layout/main')
@section('content')

    <div class="row">
        <div class="col-lg-7">
            <a href="{{route('superadmin.pengguna.add')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"> Tambah Data</i></a>
        </div>
        <div class="col-lg-5" style="float: right">
            <form class="form-inline my-2 my-lg-0" type="get" action="{{route('superadmin.pengguna.index')}}">
                <input type="search" class="form-control mr-sm-2" name="cari" placeholder="Search User" value="{{$request->cari}}">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>
    <br>



    <div class="table-responsive">
        <table class="table table-bordered table-hover table-sm">
            <thead>
            <tr>
                <th scope="col">Nama</th>
                <th scope="col">Role</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col" style="text-align: center">Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($pengguna as $row)
                <tr>
                    <td>{{$row->name}}</td>
                    <td>{{$row->role}}</td>
                    <td>{{$row->email}}</td>
                    <td>{{Helper::active($row->status)}}</td>
                    <td style="text-align: center">
                        <a class="btn btn-outline-primary btn-sm" href="{{route('storage_file',$row->image)}}" data-toggle="tooltip" data-placement="top" title="Img"><i class="fa fa-eye"></i></a>
                        <a class="btn btn-outline-warning btn-sm" href="{{route('superadmin.pengguna.edit',$row->id)}}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                        <a onclick="return confirm('Apakah anda yakin?')" class="btn btn-outline-danger btn-sm" href="{{route('superadmin.pengguna.delete',$row->id)}}" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></a>
                        <a href="{{route('download_file',$row->image)}}" class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-download"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>




@endsection
