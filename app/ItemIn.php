<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemIn extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'date', 'description',
    ];

    public function DetailItemIns(){
    	return $this->hasMany('App\DetailItemIn');
    }
}
