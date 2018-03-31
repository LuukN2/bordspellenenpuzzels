<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $amount;
    protected $fillable = ['name','type','description','price','imageurl'];
    
    public function categories(){
        return $this->belongsToMany('App\Category', 'category_product');
    }
}
