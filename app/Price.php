<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'item_id', 'customer_id', 'custom_price',  'sellable',
    ];

    public function item()
    {
        return $this->belongsTo('App\Item')->withTrashed();
    }
}
