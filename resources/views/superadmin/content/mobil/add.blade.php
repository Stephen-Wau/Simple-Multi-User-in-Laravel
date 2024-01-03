@extends('superadmin/layout/main')
@section('content')

    <div class="container" style="">

        {{--        Kolom 1--}}
        <div class="row">
            <div class="col-6">

                <form method="post" action="{{route('superadmin.mobil.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Plat</label>
                        <input class="form-control" type="number" name="plat" required placeholder="Plat" />
                    </div>
                    <div class="form-group">
                        <label for="">Merek Mobil</label>
                        <input class="form-control" type="text" name="name" required placeholder="Merek Mobil" />
                    </div>
                    <div class="form-group">
                        <label for="">Warna</label>
                        <input class="form-control" type="text" name="color" required placeholder="Warna" />
                    </div>


            </div>


            {{--            Kolom 2--}}
            <div class="col-6" >

                <div class="form-group">
                    <label for="">Tahun</label>
                    <input class="form-control" type="number" name="years" required placeholder="Tahun" />
                </div>
                <div class="form-group">
                    <label for="">Harga Sewa</label>
                    <input class="form-control" type="number" name="price" required placeholder="Harga Sewa" />
                </div>
                <div class="form-group">
                    <label for="">Jumlah Kursi</label>
                    <select name="category_id" class="form-control" required>
                        <option disabled selected>Pilih Kategori</option>
                        @foreach($kategori as $row)
                            <option value="{{$row->id}}">{{$row->chair}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="float-right">
                    <a href="{{route('superadmin.mobil.index')}}" class="btn btn-outline-info">Kembali</a>
                    <button type="submit" class="btn btn-outline-success" id="btn-tambah">
                        <i class="fa fa-save"> Simpan</i>
                    </button>
                </div>
                </form>

            </div>
        </div>


    </div>





@endsection
