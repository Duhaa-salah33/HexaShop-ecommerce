<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $product = Product::find($id)->first();
        // $productid = $product->id;
        $orders = Order::where('product_id',$id)->get();
        $count = 0;
        foreach($orders as $order)
        {
            $count = $count+ $order->product_quantity;
        }
        return $count;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $products = new Product();

        $products->title = $request->title;
        $products->quantity = $request->quantity;
        $products->category_id = $request->category_id;
        $products->details = $request->details;
        $products->price = $request->price;
        $products->discount_rate = $request->discount_rate;
        $products->price_with_discount = $request->price_with_discount;
        $products->size = json_encode($request->size);
        $products->color = json_encode($request->color);
       
        $image1 = $request->image1;
        $image1name = time().'.'.$image1->getClientOriginalExtension();
        $request->image1->move('products',$image1name);
        $products->image1 = $image1name;

        $image2 = $request->image2;
        $image2name = time().'.'.$image2->getClientOriginalExtension();
        $request->image2->move('product',$image2name);
        $products->image2 = $image2name;

    
        $products->save();
          
        // $color = new Color();
        // $color->color = json_encode($request->color);
        // $color->product_id = $products->id;

        // $color->save();
        
        // if($request->has('color'))
        // {
        //     $inputs[] = $request->color;
        //     // foreach($inputs as $input)
        //     // {
        //         $inputs['color'] = $request->input('color');
        //         $inputs['product_id'] = $products->id;
        //         Color::create($inputs);
        //     // }
            
        //$products->save();
        return redirect()->back()->with('message','A new Product added successfully!');
         //dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
     
    }

    
    public function edit($id)
    {
        $category = Category::all();
        $product = Product::find($id);
        return view('admin.editProduct',compact('product','category'));
    }

    public function update(Request $request, $id)
    {
        if(Auth::id())
        {
        $products = Product::find($id);
        $products->title = $request->title;
        $products->quantity = $request->quantity;
        $products->category_id = $request->category_id;
        $products->details = $request->details;
        $products->price = $request->price;
        $products->discount_rate = $request->discount_rate;
        $products->price_with_discount = $request->price_with_discount;
        $products->size = $request->size;
        $products->color = $request->color;


        $image1 = $request->image1;
        $image1name = time().'.'.$image1->getClientOriginalExtension();
        $request->image1->move('products',$image1name);
        $products->image1 = $image1name;

        $image2 = $request->image2;
        $image2name = time().'.'.$image2->getClientOriginalExtension();
        $request->image2->move('product',$image2name);
        $products->image2 = $image2name;

        $products->save();
        return redirect()->back()->with('message','Product updated successfully!');
        }
        else
        {
            return redirect('login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('message','Product deleted successfully!');
    }
}
