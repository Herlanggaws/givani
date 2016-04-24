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
            $customers = Customer::paginate(10);
        }
        else
        {
            $customers = Customer::where($getCategory,'like','%'.$search.'%')->orderBy($getCategory)->paginate(10);
        }
        $category = array(''=>'kategori','name'=>'Nama','company_name'=>'Nama Perusahaan', 'address'=>'Alamat', 'email'=>'Email');
        return view('transaction.index', compact('customers','category'));
    }

    public function create()
    {
        $items = Item::all();
        if(count($items)<1)
        {
            return redirect()->action('ItemsController@index')->with('message', 'Anda belum memasukan data produk');
        }
        else
        {
         return view('transaction.create', compact('items'));
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
        $customer = Customer::findOrFail($id);
        return view('transaction.show', compact('customer'));
    }

    public function store(Request $request)
    {

        try {
            $counter = $request->input('counter');
            Transaction::create($request->all());
            $data = Transaction::orderBy('created_at', 'desc')->first();
            ItemOut::create(['date'=>'2016-04-01', 'description'=>'kode transaksi '.$data->id]);
            $dataOut = ItemOut::orderBy('created_at', 'desc')->first();

            $total = 0;
            for ($i=0; $i<$counter; $i++) {
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
            return redirect('transaction')->with('message', 'Data dengan email tersebut sudah digunakan!');
        } catch (\PDOException $e) {
            return redirect('transaction')->with('message', 'Data dengan email tersebut sudah digunakan!');
        }

    }
}
