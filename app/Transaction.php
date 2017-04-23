<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
     'date', 'total_price','description',
     ];


     public function DetailTransaction(){
     	return $this->hasMany('App\DetailTransaction');
     }
 }
