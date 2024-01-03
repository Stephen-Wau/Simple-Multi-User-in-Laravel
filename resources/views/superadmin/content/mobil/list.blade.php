@extends('superadmin/layout/main')
@section('content')

    <a href="{{route('superadmin.mobil.add')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"> Tambah Data</i></a>
    <a href="{{route('superadmin.mobil.export')}}" class="btn btn-sm btn-success"><i class="fa fa-file-export"> Download Excel</i></a>
    <p></p>


    <div class="table table-responsive">
        <table class="table table-bordered table-hover table-sm">
            <thead style="background: gainsboro">
            <tr>
                <th scope="col">Plat</th>
                <th scope="col">Nama</th>
                <th scope="col">Warna</th>
                <th scope="col">Tahun</th>
                <th scope="col">Harga Sewa</th>
                <th scope="col">Jumlah Kursi</th> 
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($car as $row)
                <tr>
                    <td>{{$row->plat}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->color}}</td>
                    <td>{{$row->years}}</td>
                    <td>{{$row->price}}</td>
                    <td>{{$row->kategori}}</td>
                    <td>
                        <a class="btn btn-outline-warning btn-sm" href="{{route('superadmin.mobil.edit',$row->plat)}}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                        <a onclick="return confirm('Apakah anda yakin?')" class="btn btn-outline-danger btn-sm" href="{{route('superadmin.mobil.delete',$row->plat)}}" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>

            @endforeach

            </tbody>
        </table>
    </div>

@endsection
