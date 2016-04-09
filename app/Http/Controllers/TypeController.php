<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use DB;
use App\Http\Requests\TypeRequest;
use App\Http\Controllers\Exception;

use App\Exception\Handler;
use Illuminate\Database\QueryException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Type;

class TypeController extends Controller
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
    	$types = Type::paginate(10);
    	return view('type.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
    	return view('type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(TypeRequest $request)
    {
    	try {
    		Type::create($request->all());
    		return redirect('type')->with('message', 'Data berhasil dibuat!');;
    	} catch (\Illuminate\Database\QueryException $e) {
    		return redirect('type')->with('message', 'Data dengan email tersebut sudah digunakan!');;
    	} catch (\PDOException $e) {
    		return redirect('type')->with('message', 'Data dengan email tersebut sudah digunakan!');;
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
    	$type = Type::findOrFail($id);

    	if (is_null($type)){
    		return "ga ada";
    	}else {
    		return view('type.show', compact('type'));	
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
    	$type = Type::findOrFail($id);
    	return view('type.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(TypeRequest $request, $id)
    {
    	$type = Type::findOrFail($id);

    	$type->update($request->all());

    	return redirect('type')->with('message', 'Data berhasil dirubah!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
    	Type::destroy($id);
    	return redirect('type')->with('message', 'Data berhasil dihapus!');;
    }

}
