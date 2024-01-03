@extends('admin-barang/layout/main')
@section('content')

    <form method="post" action="{{route('admin-barang.barang.update')}}">
        @csrf
        <div class="form-group">
            <label for="">Nama Barang</label>
            <input class="form-control" type="text" name="name" required placeholder="Nama barang" value="{{$barang->name}}" />
        </div>
        <div class="form-group"> 
            <label for="">Stock Barang</label>
            <input class="form-control" type="number" name="harga" required placeholder="harga barang" value="{{$barang->harga}}" />
        </div>

        <input type="hidden" name="id" value="{{$barang->id}}">

        <a href="{{route('admin-barang.barang.index')}}" class="btn btn-outline-secondary"><i class="fa fa-arrow-left"> Batal</i></a>
        <button type="submit" class="btn btn-outline-success" id="btn-simpan"><i class="fa fa-edit"> Simpan</i></button>
    </form>


@endsection
