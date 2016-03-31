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
    	$customers = Customer::paginate(2);
    	return view('customer.index', compact('customers'));
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
}
