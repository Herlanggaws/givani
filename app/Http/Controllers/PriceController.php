<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Price;
class PriceController extends Controller
{
    public function edit($id)
    {
        $price = Price::findOrFail($id);
        return view('price.edit', compact('price'));
    }
    public function update(Request $request, $id)
    {
    	$price = Price::findOrFail($id);
    	$price->update($request->all());
        $price->sellable = 1;
        $price->is_custom = 1;
        $price->save();
    	return redirect('customer')->with('message', 'Data berhasil dirubah!');;
    }
}
