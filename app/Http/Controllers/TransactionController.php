<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Transaction;
use App\Item;
use App\Customer;
use App\DetailTransaction;
use App\Price;
use App\ItemOut;
use App\DetailItemOut;
use Response;

class TransactionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

     /**
     * Display a listing of the resource.
     *
     * @return Response
     */
     public function index()
     {

        $search = \Request::get('search');
        $getCategory = \Request::get('category');
        if (is_null($search) || is_null($getCategory) || $search == "" || $getCategory == "")
        {
            $transactions = Transaction::orderBy('id', 'DESC')->paginate(10);
        }
        else
        {
            $transactions = Transaction::where($getCategory,'=',$search)->orderBy($getCategory)->paginate(1000);
        }
        $category = array(''=>'kategori','id'=>'Kode Transaksi');
        return view('transaction.index', compact('transactions','category'));
    }

    public function create()
    {
        $id = \Request::get('id');
        try
        {
            $customer = Customer::findOrFail($id);
            return view('transaction.create', compact('customer'));
        }
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect('transaction')->with('message', 'Data dengan kode transaksi tersebut tidak ditemukan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        try
        {
            $transaction = Transaction::findOrFail($id);
            return view('transaction.show', compact('transaction'));
        }
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect('transaction')->with('message', 'Data dengan kode transaksi tersebut tidak ditemukan!');
        }
        
    }

    public function store(Request $request)
    {

        try {
            $counter = $request->input('counter');
            $transactionDate = $request->input('date');;
            Transaction::create($request->all());
            $data = Transaction::orderBy('created_at', 'desc')->first();
            ItemOut::create(['date'=>$transactionDate, 'description'=>'kode transaksi '.$data->id]);
            $dataOut = ItemOut::orderBy('created_at', 'desc')->first();

            $total = 0;
            for ($i=0; $i<$counter; $i++) {
                echo "counter: ".$counter."/";

                $qty = $request->input('qty'.strval($i));
                $priceId = $request->input('price_id'.strval($i));
                $subtotal = $request->input('subtotal'.strval($i));
                $total = $total + $subtotal;

                $price = Price::where('id','=',$priceId)->first();

                $isItemAvailable =  Item::where('id','=',$price->item_id)->first();

                if (is_null($isItemAvailable)){
                    Transaction::destroy($data->id);
                    return redirect('transaction')->with('message', 'Data dengan kode barang: '.$price->item_id.', tidak ada');
                }else {
                    DetailTransaction::create(['qty'=>$qty, 'price_id'=>$priceId, 'transaction_id'=>$data->id, 'subtotal'=>$subtotal]);

                    DetailItemOut::create(['qty'=>$qty, 'item_id'=>$price->item_id, 'item_out_id'=>$dataOut->id]);
                    Item::decreaseStock($price->item_id, $qty);
                }




            }

            $updateTransaction = Transaction::where('id', '=', $data->id)->first();
            $updateTransaction->total_price = $total;
            $updateTransaction->save();

            return redirect('transaction')->with('message', 'Data berhasil dibuat!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('transaction')->with('message', 'Data dengan transaksi tersebut sudah digunakan!');
        } catch (\PDOException $e) {
            return redirect('transaction')->with('message', 'Data dengan transaksi tersebut sudah digunakan!');
        }

    }

    public function getBill($id){
        try
        {
            $transaction = Transaction::findOrFail($id);
            return view('transaction.bill', compact('transaction'));
        }
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect('transaction')->with('message', 'Data dengan kode transaksi tersebut tidak ditemukan!');
        }
    }


    public function setReport(){
        return view('transaction.set_report');
        
    }

    public function report(){
        $from = \Request::get('from');
        $to = \Request::get('to');
        $transactions = Transaction::whereDate('date', '>=', date($from))->whereDate('date', '<=', date($to))->orderBy('id', 'DESC');

        return view('transaction.report', compact('transactions', 'from', 'to'));  
    }


}
