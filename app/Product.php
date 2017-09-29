<?php

namespace App;

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
}
