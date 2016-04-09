<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailItemIn extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'qty', 'item_id', 'item_in_id',
    ];
}
