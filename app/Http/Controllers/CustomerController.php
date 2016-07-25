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
use App\Price;
use App\Item;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $page = \Request::get('page');
        $search = \Request::get('search');
        $getCategory = \Request::get('category');
        if (is_null($search) || is_null($getCategory) || $search == "" || $getCategory == ""){
            $customers = Customer::orderBy('id', 'DESC')->paginate(10);
        }else{
            $customers = Customer::where($getCategory,'like','%'.$search.'%')->orderBy($getCategory, 'DESC')->paginate(1000);
        }
        $category = array(''=>'kategori','name'=>'Nama','company_name'=>'Nama Perusahaan', 'address'=>'Alamat', 'email'=>'Email');

        if ($page == "transaction"){
            return view('transaction.customer', compact('customers','category'));
        }else{
            return view('customer.index', compact('customers','category'));
        }
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
     public function create()
     {
        $items = Item::all();
        if(count($items)<1){
            return redirect()->action('ItemsController@index')->with('message', 'Anda belum memasukan data produk');
        }else{
            return view('customer.create');
        }
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
            $customer = Customer::orderBy('created_at', 'desc')->first();    
            $items = Item::all();
            foreach ($items as $item) {
                Price::create(['item_id'=>$item->id, 'customer_id'=>$customer->id, 'custom_price'=>$item->price,'sellable'=>'1']);
            }
            
            return redirect('customer')->with('message', 'Data berhasil dibuat!');;
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('customer')->with('message', 'Data dengan email tersebut sudah digunakan!');
        } catch (\PDOException $e) {
            return redirect('customer')->with('message', 'Data dengan email tersebut sudah digunakan!');
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
        
        $prices = $customer->prices()->paginate(10);
        $search = \Request::get('search');

        if (is_null($search) || $search == ""){

            if (is_null($customer)){
                return "ga ada";
            }else {
                return view('customer.show', compact('customer', 'prices'));  
            }
        }else{
            $item = Item::where('name','like','%'.$search.'%')->orderBy('name')->first();
            // $prices = Price::peginate(10);
            // $prices = Price::
            $prices = Price::where('customer_id','like','%'.$customer->id.'%')->where('item_id','like','%'.$item->id.'%')->orderBy('customer_id')->paginate(10);
            return view('customer.show', compact('customer', 'prices'));  
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

     public function setReport(){
        return view('customer.set_report');
        
    }

    public function report(){
        $from = \Request::get('from');
        $to = \Request::get('to');
        $customers = Customer::all();

        return view('customer.report', compact('customers', 'from', 'to'));  
    }
}
