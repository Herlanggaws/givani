<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ItemIn;
use App\DetailItemIn;
class ItemInController extends Controller
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
    	$itemIns = ItemIn::paginate(10);
    	return view('itemin.index', compact('itemIns'));
    }

    public function create()
    {
        return view('itemin.create');
    }


    public function store(Request $request)
    {
        
        try {
            $counter = $request->input('counter');;
            ItemIn::create($request->all());
            $data = ItemIn::orderBy('created_at', 'desc')->first();    
            echo $counter;
            for ($i=0; $i<$counter; $i++) {
                echo $i;
                $qty = $request->input('qty'.strval($i));
                $itemId = $request->input('item_id'.strval($i));
                DetailItemIn::create(['qty'=>$qty, 'item_id'=>$itemId, 'item_in_id'=>$data->id]);
            }
            return redirect('itemin')->with('message', 'Data berhasil dibuat!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('itemin')->with('message', 'Data dengan email tersebut sudah digunakan!');
        } catch (\PDOException $e) {
            return redirect('itemin')->with('message', 'Data dengan email tersebut sudah digunakan!');
        }

    }

}
