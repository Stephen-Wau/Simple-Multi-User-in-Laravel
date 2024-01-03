<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;

use Session;

class BarangController extends Controller
{

    public function index(Request $request){
        //List Food
        Session::put('title','Data Barang'); 

        if ($request){
            $barang = Barang::where('name', 'like', '%'.$request->cari.'%')->get();
        }else{
            $barang = Barang::all();
        }

        return view('admin/content/barang/list',compact('barang','request'));
    }


    public function add(){
        //Tambah Food
        Session::put('title','Tambah Data Barang');
        return view('admin/content/barang/add');
    }


    public function store(Request $request){
        $request->file('image')->store('public');
        $nameImage = $request->file('image')->hashName();

        $barang = new barang();
        $barang->name = $request->name;
        $barang->image = $nameImage;
        $barang->harga = $request->harga;
        try {
            $barang->save();
            //pesan notifikasi sukses
            return redirect(route('admin.barang.index'))->with('pesan-berhasil',
                'Anda berhasil menambah data barang!');
        }catch (\Exception $e){
            ////pesan notifikasi tidak sukses
            return redirect(route('admin.barang.index'))->with('pesan-gagal',
                'Anda gagal menambah data barang!');
        }
    }


    public function edit($id){
        Session::put('title','Edit Data Barang');
        $barang = Barang::findOrFail($id);
        return view('admin/content/barang/edit', compact('barang'));
    }


    public function update(Request $request){
        $barang = barang::findOrFail($request->id);
        $barang->name = $request->name;
        $barang->harga = $request->harga;
        try {
            $barang->save();
            return redirect(route('admin.barang.index'))->with('pesan-berhasil',
                'Anda berhasil mengubah data barang!');
        }catch (\Exception $e){
            return redirect(route('admin.barang.index'))->with('pesan-gagal',
                'Anda gagal mengubah data barang!');
        }
    }


    public function delete($id){
        $barang = Barang::findOrFail($id);
        try {
            $barang->delete();
            return redirect(route('admin.barang.index'))->with('pesan-berhasil',
                'Anda berhasil menghapus data barang!');
        }catch (\Exception $e){
            return redirect(route('admin.barang.index'))->with('pesan-gagal',
                'Anda gagal menghapus data barang!');
        }
    }

}
