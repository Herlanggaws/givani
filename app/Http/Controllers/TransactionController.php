<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Transaction;
use App\Item;

class TransactionController extends Controller
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
    	$transactions = Transaction::paginate(10);
    	return view('transaction.index', compact('transactions'));
    }

    public function create()
    {
        $items = Item::all();
    	return view('transaction.create', compact('items'));
    }
}
