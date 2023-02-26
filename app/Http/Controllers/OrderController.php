<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Copoun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $orders = Order::where('user_id',$userid)->get();

            $cart = Cart::where('user_id',$userid)->get();
            $products = Product::all();
            // foreach($orders as $order)
            // {
            //     if($order->product_id == $cart->user_i)
            // }
            return view('home.orders',compact('orders','cart','products'));
        }
        else
        {
            return redirect('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $cart = Cart::where('user_id',$userid)->get();
           
            
            foreach($cart as $cat)
            {
            $order = new Order();
            $product = Product::where('id',$cat->product_id)->first();
            // return $product;
            $order->user_id = $user->id;
            $order->phone = $request->phone;
            $order->city = $request->city;
            $order->address = $request->address;

            $order->product_id = $product->id;
            $order->product_title = $product->title;
            $order->product_image = $product->image1;
            $order->product_price = $product->price;
            $order->product_price_with_discount = $product->price_with_discount;
            $order->product_size = $cat->product_size;
            $order->product_color = $cat->product_color;
            $order->product_quantity = $cat->quantity;

            
            $cop = $request->copoun;
            if(!$cop == null)
            {
                $copoun = Copoun::where('copoun',$cop)->first(); 
            $cop_discount = $copoun->discount_percentage;

            if($cop_discount != null)
            {
                $order->copoun = $request->copoun;
                $after_discount = $cat->total_price * ($cop_discount/100);
                $order->total_pay = $cat->total_price - $after_discount;
            }
            else
            {
                $order->copoun = $request->copoun;
                $order->total_pay = $cat->total_price;
            }
            }
            else
            {
                $order->copoun = "null";
                $order->total_pay = $cat->total_price;   
            }
            
           
            $order->payment_status ="On delivery";
            $order->payment_method="cash";
            $order->delivery_status="Processing";
            $order->save();
            
            $cart_id = $cat->id;
            $cart = Cart::find($cart_id);
            $cart->delete();
            }
            return redirect()->back();
        }
        else
        {
            return redirect('login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
