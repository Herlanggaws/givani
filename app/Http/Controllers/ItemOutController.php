<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ItemOut;
use App\DetailItemOut;
use App\Item;

class ItemOutController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $search = \Request::get('search');
    $getCategory = \Request::get('category');
    if (is_null($search) || is_null($getCategory) || $search == "" || $getCategory == "")
    {
      $itemOuts = ItemOut::orderBy('id', 'DESC')->paginate(10);
    }
    else
    {
      $itemOuts = ItemOut::where($getCategory,'=',$search)->orderBy($getCategory)->paginate(1);   
    }
    $category = array(''=>'kategori','id'=>'Kode Keluar');
    return view('itemout.index', compact('itemOuts', 'category'));
  }

  public function create()
  {
    $items = Item::all();
    if(count($items)<1){
      return redirect()->action('ItemsController@index')->with('message', 'Anda belum memasukan data produk');
    }else{
      return view('itemout.create', compact('items'));
    }
  }

  public function store(Request $request)
  {
    try {
      $counter = $request->input('counter');;
      ItemOut::create($request->all());
      $data = ItemOut::orderBy('created_at', 'desc')->first();    
      echo $counter;
      for ($i=0; $i<$counter; $i++) {
        $qty = $request->input('qty'.strval($i));
        $itemId = $request->input('item_id'.strval($i));

        $isItemAvailable =  Item::where('id','like','%'.$itemId.'%')->first();
                // Item::findOrFail($itemId);

        if (is_null($isItemAvailable)){
          ItemOut::destroy($data->id);
          return redirect('itemout')->with('message', 'Data dengan kode barang: '.$itemId.', tidak ada');
        }else {
          DetailItemOut::create(['qty'=>$qty, 'item_id'=>$itemId, 'item_out_id'=>$data->id]);
          Item::decreaseStock($itemId, $qty);
        }
      }
      return redirect('itemout')->with('message', 'Data berhasil dibuat!');
    } catch (\Illuminate\Database\QueryException $e) {
      return redirect('itemout')->with('message', 'Data dengan email tersebut sudah digunakan!');
    } catch (\PDOException $e) {
      return redirect('itemout')->with('message', 'Data dengan email tersebut sudah digunakan!');
    }

  }

  public function show($id)
  {
    $itemOut = ItemOut::findOrFail($id);
    $DetailItemOuts = $itemOut->DetailItemOuts;

    if (is_null($itemOut)){
      return "ga ada";
    }else {
      return view('itemout.show', compact('itemOut','DetailItemOuts'));  
    }
  }


  public function setReport(){
    return view('itemout.set_report');

  }

  public function report(){
    $from = \Request::get('from');
    $to = \Request::get('to');
    $itemOuts = ItemOut::whereDate('date', '>=', date($from))->whereDate('date', '<=', date($to))->orderBy('id', 'DESC');

    return view('itemout.report', compact('itemOuts', 'from', 'to'));  
  }
}
