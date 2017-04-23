<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    //
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'transaction_id','qty', 'price_id', 'subtotal',
    ];

    public function Price(){
    	 return $this->belongsTo('App\Price');
    }
}
