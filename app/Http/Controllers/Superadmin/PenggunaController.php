<?php


namespace App\Http\Controllers\Superadmin;


use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Session;

class PenggunaController extends Controller
{

    public function index(Request $request){
        //List Admin
        Session::put('title','Data Admin');
        if ($request){
            $pengguna = Pengguna::where('name', 'like', '%'.$request->cari.'%')->get();
        }else{
            $pengguna = Pengguna::all();
        }

        return view('superadmin/content/pengguna/list',compact('pengguna','request'));
    }


    public function add(){
        //Tambah Admin
        Session::put('title','Tambah Data Admin');
        return view('superadmin/content/pengguna/add');
    }


    public function store(Request $request){
        //upload file
        //1. store file ke storage
        //2. getHasNameFromFile (DB)
        $request->file('image')->store('public');
        $nameImage = $request->file('image')->hashName();

        $pengguna = new Pengguna();
        $pengguna->name = $request->name;
        $pengguna->role = $request->role;
        $pengguna->email = $request->email;
        $pengguna->password = bcrypt('123456789');
        $pengguna->image = $nameImage;
        try {
            $pengguna->save();
            //pesan notifikasi sukses
            return redirect(route('superadmin.pengguna.index'))->with('pesan-berhasil',
                'Anda berhasil menambah data pengguna!');
        }catch (\Exception $e){
            ////pesan notifikasi tidak sukses
            return redirect(route('superadmin.pengguna.index'))->with('pesan-gagal',
                'Anda gagal menambah data pengguna!');
        }
    }


    public function edit($id){
        Session::put('title','Edit Data Admin');
        //Cara 1
        $pengguna = Pengguna::findOrFail($id);
//        return view('superadmin/content/pengguna/edit', compact('pengguna'));
        //Cara 2
        $tes = Pengguna::findOrFail($id);
        $pengguna = DB::table('admins')->where('id',$id)->get();
        return view('superadmin/content/pengguna/edit',['admins' => $pengguna]);
    }


    public function update(Request $request){
        //Cara 1
//        $pengguna = Pengguna::findOrFail($request->id);
//        $pengguna->name = $request->name;
//        $pengguna->role = $request->role;
//        $pengguna->email = $request->email;
//        $pengguna->status = $request->status;

        //Cara 2
        DB::table('admins')->where('id',$request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'status' => $request->status
        ]);

        try {
//            $pengguna->save();
            return redirect(route('superadmin.pengguna.index'))->with('pesan-berhasil',
                'Anda berhasil mengubah data pengguna!');
        }catch (\Exception $e){
            return redirect(route('superadmin.pengguna.index'))->with('pesan-gagal',
                'Anda gagal mengubah data pengguna!');
        }
    }


    public function delete($id){
        //cek data di database
        $pengguna = Pengguna::findOrFail($id);
        $pengguna->delete();
        try {
            return redirect(route('superadmin.pengguna.index'))->with('pesan-berhasil',
                'Anda berhasil menghapus data pengguna!');
        }catch (\Exception $e){
            return redirect(route('superadmin.pengguna.index'))->with('pesan-gagal',
                'Anda gagal menghapus data pengguna!');
        }
    }

}
