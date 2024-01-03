@extends('admin/layout/main')
@section('content')


    <div class="row">
        <div class="col-md-9">
            <a href="{{route('admin.barang.add')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"> Tambah Data</i></a>
        </div>
        <div class="col-md-3" style="float: right">
            <form class="form-inline my-2 my-lg-0" type="get" action="{{route('admin.barang.index')}}">
                <input type="search" class="form-control mr-sm-2" name="cari" placeholder="Search Food" value="{{$request->cari}}">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>
    <br>

    <div class="table table-responsive">
        <table class="table table-bordered table-hover table-sm">
            <thead style="background: gainsboro">
            <tr>
                <th scope="col">Nama Barang</th>
                <th scope="col">Image Barang</th>
                <th scope="col">Harga Barang</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($barang as $row)
                <tr>
                    <td>{{$row->name}}</td>
                    <td><a class="btn btn-outline-primary btn-sm" href="{{route('storage_file',$row->image)}}" data-toggle="tooltip" data-placement="top" title="Img"><i class="fa fa-eye"></i></a></td>
                    <td>{{$row->harga}}</td>
                    <td>
                        <a class="btn btn-outline-warning btn-sm" href="{{route('admin.barang.edit',$row->id)}}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                        <a onclick="return confirm('Apakah anda yakin?')" class="btn btn-outline-danger btn-sm" href="{{route('admin.barang.delete',$row->id)}}" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>


@endsection
