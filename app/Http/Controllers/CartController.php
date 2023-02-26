<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cart_Product;
use App\Models\CartProduct;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $cart = Cart::find(11);
        // $pro = $cart->products()->where('product_id',2)->first();
        // return $pro->title;
        $product = Product::find(2);

        $cart = $product->carts()->where('cart_id',)->first();
        return $cart->id;

    }
    public function show()
    {
        // if(Auth::id())
        // { 
            $user = Auth::user();
            $id = $user->id;
            $name = $user->name;
            $cart = Cart::where('user_id',$id)->get();
            $products = Product::all();
            $category = Category::all();
            //$cartid = $cart->product_id;
            //$product = Product::where('id',$cart->id)->get();
            return view('home.cart',compact('cart','name','products','category'));
            // $product = Product::get();
            // if($cart->product_id == $product->id)
            // {
            //  return $product;
            // }
            //$cartid = CartProduct::where('cart_id',$cart->id)->first();
            //$cartpro = $cart->products()->where();
            //$product= $cart->products()->where('product_id',1)->get();
            //$product = CartProduct::where('category_id',$cart->id);
            //$pro = Product::where('id',$product->product_id)->first();
            // $product = Product::where('id',$products->id);
               //return ([$product->title,$cart->quantity]);
            // $cart->total_price = $request->quantity * $product->price;
            // return view('home.cart',compact('cart','name','products'));
        // }
        // else
        // {
        //     return redirect('login');
        // }
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
    public function store(Request $request, $id)
    {
        if(Auth::id())
        {
            $product = Product::find($id); 
            $user = Auth::user();
            $userid = $user->id;
            $product_exist_id = Cart::where('product_id',$id )->where('user_id',$userid)->get('id')->first();
            $cart1 = Cart::where('user_id',$userid)->where('product_id',$id)->where('product_color',$request->color)->where('product_size',$request->size)->get('id')->first();

            if($product_exist_id != null && $product_exist_id == $cart1) 
            {
                //$cart = Cart::where('user_id',$userid)->where('product_id',$id)->where('product_color',$request->color)->where('product_size',$request->size)->get()->first();
                $cart = Cart::find($product_exist_id)->first();
                
                $quantity = $cart->quantity;
                $cart->quantity = $quantity + $request->quantity;

                if($product->price_with_discount != null)
                {
                    $cart->total_price = $product->price_with_discount * $cart->quantity;
                }
                else
                {
                    $cart->total_price = $product->price * $cart->quantity;
                }
                $cart->save();
                return redirect()->back()->with('message','Prodect added successfully!');
            }
            else
            {
            $cart = new Cart();
            $cart->user_id = $userid;
            $cart->product_id = $product->id;
            $cart->email = $user->email;
            $cart->quantity = $request->quantity;
            // $cart->product_size = json_encode($request->size);
            $cart->product_size = $request->size;
            $cart->product_color = $request->color;
           // $cart->products()->attach([$product]);
           // $product->carts()->attach($cart->id);
           if($product->price_with_discount != null)
                {
                    $cart->total_price = $product->price_with_discount * $request->quantity;
                }
                else
                {
                    $cart->total_price = $request->quantity * $product->price;
                }
            $cart->save();
            $cart->products()->attach([$product->id]);
            $product->carts()->attach($cart->id);
            return redirect()->back()->with('message','Product added successfully!');
            }
            
        }
        else
        {
            return redirect('login');
        }

    }

    public function edit(Cart $cart)
    {
        //
    }

 
    public function update(Request $request, Cart $cart)
    {
        //
    }


    public function remove($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back()->with('message','Product removed from the cart successfully!');
    }

    public function order()
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $cart = Cart::where('user_id',$userid)->get();
            $products = Product::all();
            return view('home.order',compact('user','cart','products'));
        }
        else
        {
            return redirect('login');
        }
    }
}
