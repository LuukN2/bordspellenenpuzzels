<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Category extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name', 'parent_category',
    ];
    
    public function subcategories(){
        $subs = DB::table('categories')->where('parent_category', $this->id)->get();
        if($subs->count() > 0){
            return $subs;
        }
        return false;
    }
}
