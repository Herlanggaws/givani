<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'name', 'production_price', 'minimum_price', 'stock','minimum_stock', 'type_id','price',    
    ];
    

    public function type(){
    	 return $this->belongsTo('App\Type');
    }

     /*get Type List*/
    public static function getTypeList(){
        $types = Type::all('id','name');
        $typeList = array();

        $typeList= array_add($typeList, "", "Jenis Barang");
        foreach ($types as $type)
        { 
            $typeList= array_add($typeList, $type->id, $type->name);
        }
        return $typeList;
    }
}
