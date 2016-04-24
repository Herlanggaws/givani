<?php

namespace App\Http\Controllers;



use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Item;
use App\Type;
use App\Customer;
use App\Price;
use App\Http\Requests\ItemRequest;
use Request;

class ItemsController extends Controller
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
        if (is_null($search) || is_null($getCategory) || $search == "" || $getCategory == ""){
            $items = Item::paginate(10);
        }else{
            $items = Item::where($getCategory,'like','%'.$search.'%')->orderBy($getCategory)->paginate(10);
        }
        
        

        $category = array(''=>'kategori','name'=>'Nama Barang', 'type_id'=>'Jenis Barang');
        return view('item.index', compact('items','category'));
    }

    public function create()
    {


    	$types = Type::all('id','name');
        $typeList = Item::getTypeList();

        if (count($typeList)<2){
            return redirect()->action('TypeController@index')->with('message', 'Anda belum memasukan data jenis produk');
        }else{
            return view('item.create', compact('typeList'));
        }
    }

    public function store(ItemRequest $request)
    {
        try {
            $customers = Customer::all();
            Item::create($request->all());
            $item = Item::orderBy('created_at', 'desc')->first();
            foreach ($customers as $customer) {
                Price::create(['item_id'=>$item->id, 'customer_id'=>$customer->id, 'custom_price'=>$item->price]);
            }
            return redirect('item')->with('message', 'Data berhasil dibuat!');;
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('item')->with('message', 'Data dengan nama tersebut sudah digunakan!');
        } catch (\PDOException $e) {
            return redirect('item')->with('message', 'Data dengan nama tersebut sudah digunakan!');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $typeList = Item::getTypeList();
        return view('item.edit', compact('item','typeList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(ItemRequest $request, $id)
    {
        $item = Item::findOrFail($id);

        $item->update($request->all());

        return redirect('item')->with('message', 'Data berhasil dirubah!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Item::destroy($id);
        return redirect('item')->with('message', 'Data berhasil dihapus!');;
    }
}
