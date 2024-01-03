@extends('superadmin/layout/main')
@section('content')

    <form method="post" action="{{route('superadmin.mobil.update')}}">
        @csrf
        <div class="form-group">
            <label for="">Plat</label>
            <input class="form-control" type="number" name="plat" required readonly value="{{$car->plat}}" />
        </div>
        <div class="form-group">
            <label for="">Merek Mobil</label>
            <input class="form-control" type="text" name="name" required placeholder="Merek Mobil"  value="{{$car->name}}"/>
        </div>
        <div class="form-group">
            <label for="">Warna</label>
            <input class="form-control" type="text" name="color" required placeholder="Warna" value="{{$car->color}}" />
        </div>
        <div class="form-group">
            <label for="">Tahun</label>
            <input class="form-control" type="number" name="years" required placeholder="Tahun" value="{{$car->years}}" />
        </div>
        <div class="form-group">
            <label for="">Harga Sewa</label>
            <input class="form-control" type="number" name="price" required placeholder="Harga Sewa" value="{{$car->price}}"/>
        </div>
        <div class="form-group">
            <label for="">Kategori</label>
            <select name="category_id" class="form-control" required>
                <option disabled selected>Pilih Kategori</option>
                @foreach($kategori as $row)
                    <option value="{{$row->id}}">{{$row->chair}}</option>
                @endforeach
            </select>
        </div>

        <a href="{{route('superadmin.mobil.index')}}" class="btn btn-outline-secondary"><i class="fa fa-arrow-left"> Batal</i></a>
        <button type="submit" class="btn btn-outline-success" id="btn-simpan"><i class="fa fa-edit"> Simpan</i></button>
    </form>


@endsection
