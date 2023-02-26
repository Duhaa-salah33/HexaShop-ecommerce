<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    use HasFactory;
    public function productcarts()
    {
        return $this->belongsTo(Cart::class);
    }
    public function cartproducts()
    {
        return $this->belongsTo(Product::class);
    }
}
