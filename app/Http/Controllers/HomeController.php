<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Copoun;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.homePage');
    }
    public function about()
    {
        return view('about.about');
    }
    // public function products()
    // {
    //     return view('home.all_products');
    // }
    public function all_products()
    {
        $products = Product::all();
        return view('home.all_products',compact('products'));
    }
    public function contact()
    {
        return view('contacts.contact');
    }
    public function redirect()
    {
        // $usertype = Auth::user()->userType;
        // if($usertype == '1')
        // {
        //     return view('admin.home');
        // }
        // else
        // {
        //     return view('home.homePage');
        // }

        if(!empty(Auth::user()) && Auth::user()->userType == 1 )
            {
                return view('admin.home');
            }
            else
            {
                $category = Category::where('name',"men")->first();
                $categoryid = $category->id;
                $products = Product::where('category_id',$categoryid)->get();
                return view('home.homePage',compact('products'));
            }
     
    }
    public function profile()
    {
        $user = Auth::user();
        return view('home.profile',compact('user'));
    }

    public function order()
    {
        $copouns = Copoun::all();
        return view('home.order');
    }

    public function men_latest()
    {
        // $category = Category::where('name',"men")->first();
        // $categoryid = $category->id;
        $products = Product::all();
        return view('home.homePage',compact('products'));
    }


}
