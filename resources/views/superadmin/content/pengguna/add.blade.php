@extends('superadmin/layout/main')
@section('content')

    <form method="post" action="{{route('superadmin.pengguna.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Nama Admin</label>
            <input class="form-control" type="text" name="name" required placeholder="Nama" />
        </div>
        <div class="form-group">
            <label for="">Email Admin</label>
            <input class="form-control" type="email" name="email" required placeholder="Email"/>
        </div>
        <div class="form-group">
            <label>Role</label>
            <select name="role" class="form-control" required>
                <option value="admin">Admin</option>
                <option value="admin-food">Admin-food</option>
                <option value="admin-barang">Admin-barang</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Gambar</label>
            <input class="form-control" type="file" accept="image/png,image/jpeg,image/jpg" name="image" required />
        </div>
        <a href="{{route('superadmin.pengguna.index')}}" class="btn btn-outline-info">Kembali</a>
        <button type="submit" class="btn btn-outline-success" id="btn-tambah">
            <i class="fa fa-save"> Simpan</i>
        </button>
    </form>



@endsection
