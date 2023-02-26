<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CustomerController extends Controller
{
    public function women_products()
    {
        // if($category->name == "women")
        // {
        //     $products = Product::where('category_id',$category->id);
        //     return view('home.womenProducts',compact('products','category'));
        // }
        // else
        // {
        //     return redirect()->back();
        // }
        $category = Category::where('name',"women");
        $products = Product::all();
        
        return view('home.womenProducts',compact('products','category'));
    }

    public function men_products()
    {
        $category = Category::where('name',"men");
        $products = Product::all();
        return view('home.menProducts',compact('products','category'));
    }

    public function kids_products()
    {
        //$category = Category::where('name',"men");
        $products = Product::all();
        return view('home.kidsProducts',compact('products'));
    }

    public function single_product($id)
    {
        $product = Product::find($id);
        $colors = Color::all();
        $count = 0;
        $orders = Order::where('product_id',$id)->get();
        foreach($orders as $order)
        {
            $count = $count+$order->product_quantity;
        }
        // foreach($colors as $color)
        // {
        //     if($product->id == $color->product_id)
        //     {
        //         $color->get();
        //     }
        // }
        $total_price = $product->quantity * $product->price;
        return view('home.singleProduct',compact('product','total_price','colors','count'));
    }

    public function carts(Request $request)
    {
        if(Auth::id())
        {
            $id = Auth::user()->id;
            $name = Auth::user()->name;
            $cart = Cart::where('user_id',$id)->get();
            $cartpro = $cart->products()->all();
            // $cart->total_price = $request->quantity * $product->price;
            return view('home.cart',compact('cart','name'));
        }
        else
        {
            return redirect('login');
        }
    }

    public function women_latest()
    {
        $cat = Category::where('name',"women")->first();
        $catid = $cat->id;
        $pros = Product::where('category_id',$catid)->get();
        return view('home.homePage',compact('pros'));
    }
}
