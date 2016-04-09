<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Item;
use App\Type;
use App\Http\Requests\ItemRequest;

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
    	$items = Item::paginate(10);
    	return view('item.index', compact('items'));
    }

    public function create()
    {
    	$types = Type::all('id','name');
        $typeList = Item::getTypeList();
        return view('item.create', compact('typeList'));
    }

    public function store(ItemRequest $request)
    {
        try {
            Item::create($request->all());
            return redirect('item')->with('message', 'Data berhasil dibuat!');;
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('item')->with('message', 'Data dengan email tersebut sudah digunakan!');;
        } catch (\PDOException $e) {
            return redirect('item')->with('message', 'Data dengan email tersebut sudah digunakan!');;
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
