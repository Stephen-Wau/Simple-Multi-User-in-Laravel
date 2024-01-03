@extends('admin/layout/main')
@section('content')

    <form method="post" action="{{route('admin.pelanggan.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Nama Kategory</label>
            <input class="form-control" type="text" name="name" required placeholder="Nama" />
        </div>
        <div class="form-group">
            <label for="">No HP/WA</label>
            <input class="form-control" type="number" name="no_hp" required placeholder="No HP/WA" />
        </div>
        <div class="form-group">
            <label for="">Jaminan</label>
            <select name="jaminan" class="form-control" required>
                <option value="KTP">KTP</option>
                <option value="KK">KK</option>
            </select>
        </div>
        <a href="{{route('admin.pelanggan.index')}}" class="btn btn-outline-info">Kembali</a>
        <button type="submit" class="btn btn-outline-success" id="btn-tambah">
            <i class="fa fa-save"> Simpan</i>
        </button>
    </form>


@endsection
