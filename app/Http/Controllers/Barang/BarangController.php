<?php


namespace App\Http\Controllers\Barang;


use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Http;


class BarangController extends Controller
{


    function index(Request $request){
        $on_page = is_null($request->get('page')) ? 1 : $request->get('page');

        $res = Http::get('http://localhost:8000/api/tes/kandidat/gnp/barang/all'. $on_page);

        $data['users'] = $res->json()['data'];
        $data['max_pages'] = $res->json()['total_pages'];

        return view('admin-barang/content/barang/list', $data);

    }

    // function detail($id){

    //     $res = Http::get('tes.kandidat.forntend.gnpmultimedia.com/api/tes/kandidat/gnp/barang/byid/id-barangnya'. $id);

    //     $data['user'] = $res->json()['data'];

    //     return view('detail', $data);
    // }


    // public function index(Request $request){
    //     //List Food
    //     Session::put('title','Data Barang'); 

    //     if ($request){
    //         $barang = Barang::where('name', 'like', '%'.$request->cari.'%')->get();
    //     }else{
    //         $barang = Barang::all();
    //     }

    //     return view('admin-barang/content/barang/list',compact('barang','request'));
    // }


    public function add(){
        //Tambah Food
        Session::put('title','Tambah Data Barang');
        return view('admin-barang/content/barang/add');
    }


    public function store(Request $request){
        $request->file('image')->store('public');
        $nameImage = $request->file('image')->hashName();

        $barang = new Barang();
        $barang->name = $request->name;
        $barang->image = $nameImage;
        $barang->harga = $request->harga;
        try {
            $barang->save();
            //pesan notifikasi sukses
            return redirect(route('admin-barang.barang.index'))->with('pesan-berhasil',
                'Anda berhasil menambah data barang!');
        }catch (\Exception $e){
            ////pesan notifikasi tidak sukses
            return redirect(route('admin-barang.barang.index'))->with('pesan-gagal',
                'Anda gagal menambah data barang!');
        }
    }


    public function edit($id){
        Session::put('title','Edit Data Barang');
        $barang = Barang::findOrFail($id);
        return view('admin-barang/content/barang/edit', compact('barang'));
    }


    public function update(Request $request){
        $barang = Barang::findOrFail($request->id);
        $barang->name = $request->name;
        $barang->harga = $request->harga;
        try {
            $barang->save();
            return redirect(route('admin-barang.barang.index'))->with('pesan-berhasil',
                'Anda berhasil mengubah data barang!');
        }catch (\Exception $e){
            return redirect(route('admin-barang.barang.index'))->with('pesan-gagal',
                'Anda gagal mengubah data barang!');
        }
    }


    public function delete($id){
        $barang = Barang::findOrFail($id);
        try {
            $barang->delete();
            return redirect(route('admin-barang.barang.index'))->with('pesan-berhasil',
                'Anda berhasil menghapus data barang!');
        }catch (\Exception $e){
            return redirect(route('admin-barang.barang.index'))->with('pesan-gagal',
                'Anda gagal menghapus data barang!');
        }
    }


}
