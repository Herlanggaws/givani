<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailItemOut extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'qty', 'item_id', 'item_out_id',
    ];


    public function item(){
    	 return $this->belongsTo('App\Item')->withTrashed();
    }
}
