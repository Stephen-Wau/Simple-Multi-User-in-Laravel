<?php


namespace App\Http\Controllers\Food;


use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;

use Session;

class FoodController extends Controller
{

    public function index(Request $request){
        //List Food
        Session::put('title','Data Food'); 

        if ($request){
            $food = Food::where('name', 'like', '%'.$request->cari.'%')->get();
        }else{
            $food = Food::all();
        }

        return view('admin-food/content/food/list',compact('food','request'));
    }


    public function add(){
        //Tambah Food
        Session::put('title','Tambah Data Food');
        return view('admin-food/content/food/add');
    }


    public function store(Request $request){
        $request->file('image')->store('public');
        $nameImage = $request->file('image')->hashName();

        $food = new Food();
        $food->name = $request->name;
        $food->image = $nameImage;
        $food->harga = $request->harga;
        try {
            $food->save();
            //pesan notifikasi sukses
            return redirect(route('admin-food.food.index'))->with('pesan-berhasil',
                'Anda berhasil menambah data food!');
        }catch (\Exception $e){
            ////pesan notifikasi tidak sukses
            return redirect(route('admin-food.food.index'))->with('pesan-gagal',
                'Anda gagal menambah data food!');
        }
    }


    public function edit($id){
        Session::put('title','Edit Data Food');
        $food = Food::findOrFail($id);
        return view('admin-food/content/food/edit', compact('food'));
    }


    public function update(Request $request){
        $food = Food::findOrFail($request->id);
        $food->name = $request->name;
        $food->harga = $request->harga;
        try {
            $food->save();
            return redirect(route('admin-food.food.index'))->with('pesan-berhasil',
                'Anda berhasil mengubah data food!');
        }catch (\Exception $e){
            return redirect(route('admin-food.food.index'))->with('pesan-gagal',
                'Anda gagal mengubah data food!');
        }
    }


    public function delete($id){
        $food = Food::findOrFail($id);
        try {
            $food->delete();
            return redirect(route('admin-food.food.index'))->with('pesan-berhasil',
                'Anda berhasil menghapus data food!');
        }catch (\Exception $e){
            return redirect(route('admin-food.food.index'))->with('pesan-gagal',
                'Anda gagal menghapus data food!');
        }
    }

}
