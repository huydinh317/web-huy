<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
      protected $table = 'products';
      protected $primaryKey = 'id';
      protected $fillable = ['categories_id', 'name', 'code', 'slug', 'info', 'describer', 'image', 'price', 'featured', 'state'];
      public $orderable = ['price'];  
      public function categories(){
        return  $this->belongsTo('App\Models\Product','categories_id','id');
      }
}
