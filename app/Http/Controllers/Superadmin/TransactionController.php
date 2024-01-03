<?php


namespace App\Http\Controllers\Superadmin;


use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Category;
use App\Models\Costumer;
use App\Models\Item;
use App\Models\Transaction;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Session;
use Mpdf\Mpdf;

class TransactionController extends Controller
{

    public function index(){
        //List Transaksi
        Session::put('title','Data Transaksi');

        $transaction = Transaction::select('transactions.*','costumers.name')
        ->join('costumers','costumers.id','=','transactions.costumer_id')->get();

        return view('superadmin/content/transaction/list',compact('transaction'));
    }

    public function detail($id){
        //Detail Transaksi
        Session::put('title','Detail Transaksi');

        $transaction = Transaction::select('transactions.*','costumers.name')
            ->join('costumers','costumers.id','=','transactions.costumer_id')
            ->where('transactions.id',$id)
            ->first();

        $item = Item::select('items.*','cars.name as car_name','cars.price as car_price')
            ->join('transactions','transactions.id','=','items.transaction_id')
            ->join('cars','cars.plat','=','items.car_id')
            ->where('transactions.id',$id)
            ->get();

        return view('superadmin/content/transaction/detail',compact('transaction','item'));
    }

    public function add(){
        Session::put('title','Tambah Transaksi Baru');
        $car = Car::all();
        $costumer = Costumer::all();
        return view('superadmin/content/transaction/add',compact('car','costumer'));
    }

    public function store(Request  $request){
        //insert table
        DB::beginTransaction();

        try {
            //semua proses insert di jquery
            $send = $request->send;
            $costumer_id = $request->costumer_id;

            $transaction = new Transaction();
            $transaction->date = date('Y-m-d H:i:s');
            $transaction->costumer_id = $costumer_id;
            $transaction->save();

//            dd($transaction);


            foreach ($send as $i){
                $car = Car::where('plat',$i['car_id'])->first();
                $subTotal = $car->price * intval($i['car_qty']);
//
//                dd($car,$subTotal);

                $item = new Item();
                $item->qty = intval($i['car_qty']);
                $item->price = $subTotal;
                $item->transaction_id = $transaction->id;
                $item->car_id = intval($i['car_id']);
                $item->save();
            }

            DB::commit();
            return redirect(route('superadmin.transaction.index'))->with('pesan-berhasil',
                'Anda berhasil menambah data transaksi!');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect(route('superadmin.transaction.index'))->with('pesan-gagal',
                'Anda gagal menambah data transaksi!');
        }
    }

    public function print($id){
        $transaction = Transaction::select('transactions.*','costumers.name')
            ->join('costumers','costumers.id','=','transactions.costumer_id')
            ->where('transactions.id',$id)
            ->first();

        $item = Item::select('items.*','cars.name as car_name','cars.price as car_price')
            ->join('transactions','transactions.id','=','items.transaction_id')
            ->join('cars','cars.plat','=','items.car_id')
            ->where('transactions.id',$id)
            ->get();

        $html = view('superadmin/content/transaction/print',compact('transaction','item'));
        $mpdf = new Mpdf();
        $mpdf->writeHTML($html);
        $mpdf->Output();
    }



    public function edit($id){
        Session::put('title','Edit Transaksi');
        $kategori = Transaction::findOrFail($id);
        return view('superadmin/content/transaction/edit', compact('kategori'));
    }

    public function update(Request $request){
        $kategori = Transaction::findOrFail($request->id);
        $kategori->status = $request->status;
        try {
            $kategori->save();
            return redirect(route('superadmin.transaction.index'))->with('pesan-berhasil',
                'Anda berhasil mengubah data Transaksi!');
        }catch (\Exception $e){
            return redirect(route('superadmin.transaction.index'))->with('pesan-gagal',
                'Anda gagal mengubah data Transaksi!');
        }
    }


}
