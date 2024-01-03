@extends('superadmin/layout/main')
@section('content')

    @foreach($admins as $p)
        <form method="post" action="{{route('superadmin.pengguna.update')}}">
            @csrf
            <input type="hidden" name="id" value="{{ $p->id }}">
            <div class="form-group">
                <label for="">Nama Admin</label>
                <input class="form-control" type="text" name="name" required placeholder="Nama" value="{{$p->name}}" />
            </div>
            <div class="form-group">
                <label for="">Email Admin</label>
                <input class="form-control" type="email" name="email" required placeholder="Email" value="{{$p->email}}" />
            </div>
            <div class="form-group">
                <label>Role</label>
                <select name="role" class="form-control" required >
 
                    @php
                        $admin = "";
                        $food = "";
                        $barang = "";
                        if ($p->role == "admin"){
                            $admin = "selected";
                        }else if($p->role == "admin-food"){
                            $food = "selected";
                        }else if($p->role == "admin-barang"){
                            $barang = "selected";
                        }else{
                            $p = "selected";
                        }
                    @endphp

                    <option value="admin" {{$admin}}>Admin</option>
                    
                    <option value="admin-barang" {{$barang}}>Admin-barang</option>
                    <option value="admin-food" {{$food}}>Admin-food</option>
                </select>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control" required >

                    @php
                        $aktif = "";
                        $tidakaktif = "";
                        if ($p->status == 1){
                            $aktif = "selected";
                        }else{
                            $tidakaktif = "selected";
                        }
                    @endphp

                    <option value="1" {{$aktif}}>Aktif</option>
                    <option value="0" {{$tidakaktif}}>Tidak Aktif</option>
                </select>
            </div>
            <a href="{{route('superadmin.pengguna.index')}}" class="btn btn-outline-secondary"><i class="fa fa-arrow-left"> Batal</i></a>
            <button type="submit" class="btn btn-outline-success" id="btn-simpan"><i class="fa fa-edit"> Simpan</i></button>
        </form>
    @endforeach


@endsection
