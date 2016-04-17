<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CustomerRequest;
use App\Http\Controllers\Controller;

use DB;
use App\Http\Requests\TypeRequest;
use App\Http\Controllers\Exception;

use App\Exception\Handler;
use Illuminate\Database\QueryException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Customer;

class CustomerController extends Controller
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
            $customers = Customer::paginate(10);
        }else{
            $customers = Customer::where($getCategory,'like','%'.$search.'%')->orderBy($getCategory)->paginate(10);

        }
        $category = array(''=>'kategori','name'=>'Nama','company_name'=>'Nama Perusahaan', 'address'=>'Alamat', 'email'=>'Email');
        return view('customer.index', compact('customers','category'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
     public function create()
     {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CustomerRequest $request)
    {



        try {
            Customer::create($request->all());
            return redirect('customer')->with('message', 'Data berhasil dibuat!');;
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('customer')->with('message', 'Data dengan email tersebut sudah digunakan!');;
        } catch (\PDOException $e) {
            return redirect('customer')->with('message', 'Data dengan email tersebut sudah digunakan!');;
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

        if (is_null($customer)){
            return "ga ada";
        }else {
            return view('customer.show', compact('customer'));  
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
        $customer = Customer::findOrFail($id);
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(CustomerRequest $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $customer->update($request->all());

        return redirect('customer')->with('message', 'Data berhasil dirubah!');;
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
     public function destroy($id)
     {
        Customer::destroy($id);
        return redirect('customer')->with('message', 'Data berhasil dihapus!');;
    }
}
