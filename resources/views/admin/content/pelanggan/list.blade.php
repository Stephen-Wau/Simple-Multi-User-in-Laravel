@extends('admin/layout/main')
@section('content')

    <div class="row">
        <div class="col-lg-7">
            <a href="{{route('admin.pelanggan.add')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"> Tambah Data</i></a>
        </div>
        <div class="col-lg-5" style="float: right">
            <form class="form-inline my-2 my-lg-0" type="get" action="{{route('admin.pelanggan.index')}}">
                <input type="search" class="form-control mr-sm-2" name="cari" placeholder="Search User" value="{{$request->cari}}">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>
    <br>

    <div class="table table-responsive">
        <table class="table table-bordered table-hover table-sm">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama</th>
                <th scope="col">NO HP/WA</th>
                <th scope="col">Jaminan</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($pelanggan as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->no_hp}}</td>
                    <td>{{$row->jaminan}}</td>
                    <td>
                        <a class="btn btn-outline-warning btn-sm" href="{{route('admin.pelanggan.edit',$row->id)}}" title="Edit"><i class="fa fa-edit"></i></a>
                        <a onclick="return confirm('Apakah anda yakin?')" class="btn btn-outline-danger btn-sm" href="{{route('admin.pelanggan.delete',$row->id)}}" title="Hapus"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>




@endsection
