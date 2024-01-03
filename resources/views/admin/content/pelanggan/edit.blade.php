@extends('admin/layout/main')
@section('content')

    <form method="post" action="{{route('admin.pelanggan.update')}}">
        @csrf
        <div class="form-group">
            <label for="">Nama Pelanggan</label>
            <input class="form-control" type="text" name="name" required placeholder="Nama" value="{{$pelanggan->name}}"/>
        </div>
        <div class="form-group">
            <label for="">No HP/WA</label>
            <input class="form-control" type="number" name="no_hp" required placeholder="No HP/WA" value="{{$pelanggan->no_hp}}" />
        </div>
        <div class="form-group">
            <label>Jaminan</label>
            <select name="jaminan" class="form-control" required>

                @php
                    $KTP = "";
                    $KK = "";
                    if ($pelanggan->jaminan == "KTP"){
                        $KTP = "selected";
                    }else{
                        $KK = "selected";
                    }
                @endphp

                <option value="KTP" {{$KTP}}>KTP</option>
                <option value="KK" {{$KK}}>KK</option>
            </select>
        </div>

        <input type="hidden" name="id" value="{{$pelanggan->id}}">

        <a href="{{route('admin.pelanggan.index')}}" class="btn btn-outline-secondary"><i class="fa fa-arrow-left"> Batal</i></a>
        <button type="submit" class="btn btn-outline-success" id="btn-simpan"><i class="fa fa-edit"> Simpan</i></button>
    </form>


@endsection
