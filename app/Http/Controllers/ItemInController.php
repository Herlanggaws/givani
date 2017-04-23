<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ItemInRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ItemIn;
use App\DetailItemIn;
use App\Item;

class ItemInController extends Controller
{
    //
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
            $itemIns = ItemIn::orderBy('id', 'DESC')->get();
        }
        else
        {
            $itemIns = ItemIn::where($getCategory,'=',$search)->orderBy($getCategory)->paginate(1000);   
        }

        $category = array(''=>'kategori','id'=>'Kode Masuk');

        return view('itemin.index', compact('itemIns', 'category'));
    }

    public function create()
    {
        $items = Item::all();
        if(count($items)<1){
            return redirect()->action('ItemsController@index')->with('message', 'Anda belum memasukan data produk');
        }else{
            return view('itemin.create', compact('items'));
        }
    }


    public function store(ItemInRequest $request)
    {

        try {
            $counter = $request->input('counter');
            ItemIn::create($request->all());
            $data = ItemIn::orderBy('created_at', 'desc')->first();    
            echo $counter;
            for ($i=0; $i<$counter; $i++) {
                $qty = $request->input('qty'.strval($i));
                $itemId = $request->input('item_id'.strval($i));

                $isItemAvailable =  Item::where('id','like','%'.$itemId.'%')->first();
                // Item::findOrFail($itemId);

                if (is_null($isItemAvailable)){
                    ItemIn::destroy($data->id);
                    return redirect('itemin')->with('message', 'Data dengan kode barang: '.$itemId.', tidak ada');
                }else {
                    DetailItemIn::create(['qty'=>$qty, 'item_id'=>$itemId, 'item_in_id'=>$data->id]);
                    Item::addStock($itemId, $qty);
                }


            }
            return redirect('itemin')->with('message', 'Data berhasil dibuat!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('itemin')->with('message', 'Data dengan email tersebut sudah digunakan!');
        } catch (\PDOException $e) {
            return redirect('itemin')->with('message', 'Data dengan email tersebut sudah digunakan!');
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
        $itemIn = ItemIn::findOrFail($id);
        $DetailItemIns = $itemIn->DetailItemIns;

        if (is_null($itemIn)){
            return "ga ada";
        }else {
            return view('itemin.show', compact('itemIn','DetailItemIns'));  
        }
        
    }

    public function getGoodsDetail(){
        $id = $_GET['id'];
        $item = Item::findOrFail($id);
        return $item->name;
    }

    public function setReport(){
        return view('itemin.set_report');
        
    }

    public function report(){
        $from = \Request::get('from');
        $to = \Request::get('to');
        $itemIns = ItemIn::whereDate('date', '>=', date($from))->whereDate('date', '<=', date($to))->orderBy('id', 'DESC');

        return view('itemin.report', compact('itemIns', 'from', 'to'));  
    }

}
