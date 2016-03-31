<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
     'name', 'company_name', 'email', 'phone','mobiel', 'address', 'pos_code',
     ];

     
 }
