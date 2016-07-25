<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Exception;

use App\Exception\Handler;
use Illuminate\Database\QueryException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\User;

class UserController extends Controller
{
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
            $users = User::orderBy('id', 'DESC')->paginate(10);
        }else{
            $users = User::where($getCategory,'like','%'.$search.'%')->orderBy($getCategory,'DESC')->paginate(1000);
        }

        $category = array(''=>'kategori','name'=>'name','email'=>'email');
        
        return view('user.index', compact('users','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(UserRequest $request)
    {
        try {
            User::create($request->all());
            return redirect('user')->with('message', 'Data berhasil dibuat!');;
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('user')->with('message', 'Data dengan email tersebut sudah digunakan!');;
        } catch (\PDOException $e) {
            return redirect('user')->with('message', 'Data dengan email tersebut sudah digunakan!');;
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
    	$user = User::findOrFail($id);

    	if (is_null($user)){
    		return "ga ada";
    	}else {
    		return view('user.show', compact('user'));	
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
    	$user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update($request->all());

        return redirect('user')->with('message', 'Data berhasil dirubah!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('user')->with('message', 'Data berhasil dihapus!');;
    }
}
