<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class ,'category_id' , 'id');
    }
    public function carts()
    {
        return $this->belongsToMany(Cart::class,'cart_products',);
    }
    public function colors()
    {
        return $this->hasMany(Color::class);
    }
}
