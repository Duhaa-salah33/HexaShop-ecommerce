<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Copoun;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function category()
    {
        if(!empty(Auth::user()) && Auth::user()->userType == 1 )
        {
            return view('admin.category');
        }
        else
        {
            return view('home.homePage');
        }
    }

    public function add_category()
    {
        if(!empty(Auth::user()) && Auth::user()->userType == 1 )
        {
            return view('admin.addCategory');
        }
        else
        {
            return view('home.homePage');
        }

    }

    public function add_product()
    {
        if(!empty(Auth::user()) && Auth::user()->userType == 1 )
        {
            $category = Category::all();
        if($category->isEmpty())
        {
            return view('admin.addCategory');
        }
        else
        {
            return view('admin.addProduct',compact('category'));
        }
        }
        else
        {
            return view('home.homePage');
        }
        
    }

    public function product()
    {
        if(!empty(Auth::user()) && Auth::user()->userType == 1 )
        {
            $products = Product::all();
            $colors = Color::all();
            //$orders = Order::all();
            $count = 0;
            foreach($products as $product)
            {
                
                $orders = Order::where('product_id',$product->id)->get();
                
                // foreach($orders as $order)
                // {
                //     // if($product->id == $order->product_id)
                //     $count = $count + $order->product_quantity;
                // }
                
            }
            //$order = Order::all();
            return view('admin.product',compact('products','colors','orders','count'));
        }   
        else
        {
            return view('home.homePage');
        }
    }

    public function orders()
    {
        if(!empty(Auth::user()) && Auth::user()->userType == 1 )
        {
            $users = User::all();
            $orders = Order::all();
            return view('admin.orders',compact('orders','users'));
        }   
        else
        {
            return view('home.homePage');
        }
    }
    public function delivery($id)
    {
        $order = Order::find($id);
        $order->delivery_status = "Delivered";
        $order->payment_status = "Paid";
        $order->save();
        return redirect()->back();
    }

    public function cancel_order($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect()->back();
    }

    public function copouns()
    {
        $copouns = Copoun::all();
        return view('admin.copouns',compact('copouns'));
    }

    public function details($id)
    {
        $product = Product::find($id);
        $orders = Order::where('product_id',$id)->get();
        $count = 0;
        foreach($orders as $order)
        {
            $count = $count+$order->product_quantity;
        }
        return view('admin.details',compact('orders','product','count'));
    }
}
