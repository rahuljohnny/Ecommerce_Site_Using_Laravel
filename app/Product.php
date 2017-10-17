<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['id','name','description','size','price','image','category_id'];
    //Relationship
    public function category()
    {
        //return $this->hasMany('App\Product');  It can be written as-
        return $this->belongsTo(Category::class);
    }

    public static function categorizedProducts($id)
    {
        $selectedProducts = DB::table('products')
            ->where('category_id', '=', $id)
            ->latest()
            ->get();

        return $selectedProducts;

    }
}
