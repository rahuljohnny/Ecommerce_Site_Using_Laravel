<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //fillable
    protected $fillable=['name'];
    //Relationship
    public function product()
    {
        //return $this->hasMany('App\Product');  It can be written as-
        return $this->hasMany(Product::class); //ctrl + click on the class to access the class
    }

}
