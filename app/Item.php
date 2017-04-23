<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'name', 'production_price', 'minimum_price', 'stock','minimum_stock', 'type_id','price',
    ];
    

    public function type()
    {
        return $this->belongsTo('App\Type')->withTrashed();
    }

    /*get Type List*/
    public static function getTypeList()
    {
        $types = Type::all('id','name');
        $typeList = array();

        $typeList= array_add($typeList, "", "Jenis Barang");
        foreach ($types as $type)
        { 
            $typeList= array_add($typeList, $type->id, $type->name);
        }
        return $typeList;
    }

    public static function addStock($id, $qty){
        $item = Item::where('id','=',$id)->first();
        if (!is_null($item)){

            $totalQty = $item->stock;
            $totalQty = $totalQty + $qty;

            $item->stock = $totalQty;

            $item->save();
        }

    }

    public static function decreaseStock($id, $qty){
        $item = Item::where('id','=',$id)->first();
        if (!is_null($item)){

            $totalQty = $item->stock;
            $totalQty = $totalQty - $qty;

            $item->stock = $totalQty;

            $item->save();
        }

    }
}
