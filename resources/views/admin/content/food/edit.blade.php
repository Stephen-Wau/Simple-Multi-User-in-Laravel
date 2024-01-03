@extends('admin/layout/main')
@section('content')

    <form method="post" action="{{route('admin.food.update')}}">
        @csrf
        <div class="form-group">
            <label for="">Nama Food</label>
            <input class="form-control" type="text" name="name" required placeholder="Nama Food" value="{{$food->name}}" />
        </div>
        <div class="form-group"> 
            <label for="">Stock Food</label>
            <input class="form-control" type="number" name="harga" required placeholder="harga Food" value="{{$food->harga}}" />
        </div>

        <input type="hidden" name="id" value="{{$food->id}}">

        <a href="{{route('admin.food.index')}}" class="btn btn-outline-secondary"><i class="fa fa-arrow-left"> Batal</i></a>
        <button type="submit" class="btn btn-outline-success" id="btn-simpan"><i class="fa fa-edit"> Simpan</i></button>
    </form>


@endsection
