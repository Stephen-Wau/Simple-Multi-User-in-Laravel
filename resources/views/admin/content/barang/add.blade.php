@extends('admin/layout/main')
@section('content')

    <form method="post" action="{{route('admin.barang.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Nama Barang</label>
            <input class="form-control" type="text" name="name" required placeholder="Nama Barang" />
        </div>
        <div class="form-group">
            <label for="">Gambar</label>
            <input class="form-control" type="file" accept="image/png,image/jpeg,image/jpg" name="image" required />
        </div>
        <div class="form-group">
            <label for="">Harga Barang</label>
            <input class="form-control" type="number" name="harga" required placeholder="Harga Barang" />
        </div>
        <a href="{{route('admin.barang.index')}}" class="btn btn-outline-info">Kembali</a>
        <button type="submit" class="btn btn-outline-success" id="btn-tambah">
            <i class="fa fa-save"> Simpan</i>
        </button>
    </form>


@endsection
