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
    	$itemOuts = ItemOut::paginate(10);
    	return view('itemout.index', compact('itemOuts'));
    }

    public function create()
    {
        $items = Item::all();
    	return view('itemout.create', compact('items'));
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


       /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
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


   }
