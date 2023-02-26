<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CopounController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Rules\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
});

Route::get('/redirect',[HomeController::class,'redirect'])->middleware(['auth','verified']); //when login
Route::get('/',[HomeController::class,'index']);
Route::get('/about',[HomeController::class,'about']);
Route::get('/view_products',[HomeController::class,'all_products']);
Route::get('/contact',[HomeController::class,'contact']);
Route::get('/profile',[HomeController::class,'profile']);
Route::get('/',[HomeController::class,'men_latest']);
Route::get('/orders',[HomeController::class,'order']);

Route::get('/back',[CustomerController::class,'back']);


Route::get('/add_product',[AdminController::class,'add_product']);
Route::get('/All-products',[AdminController::class,'product']);
Route::get('/category',[AdminController::class,'category']);
Route::get('/add_category',[AdminController::class,'add_category']);
Route::get('All-orders',[AdminController::class,'orders']);
Route::get('delivery_status/{id}',[AdminController::class,'delivery'])->middleware(['auth','verified']);
Route::get('cancel_order/{id}',[AdminController::class,'cancel_order']);
Route::get('/Copouns',[AdminController::class,'copouns']);
Route::get('/availability/{id}',[AdminController::class,'details']);

Route::post('/add_copoun',[CopounController::class,'store']);
// Route::post('/copoun',[CopounController::class,'index']);


Route::post('/add_cat',[CategoryController::class,'store']);
Route::get('/category',[CategoryController::class,'index']);
Route::get('/edit_category/{id}',[CategoryController::class,'edit']);
Route::post('/update/{id}',[CategoryController::class,'update']);
Route::get('/delete/{id}',[CategoryController::class,'destroy']);


Route::post('/add_product',[ProductController::class,'store']);
Route::get('/index/{id}',[ProductController::class,'index']);
Route::get('/edit_product/{id}',[ProductController::class,'edit']);
Route::post('/update/{id}',[ProductController::class,'update']);
Route::get('/delete/{id}',[ProductController::class,'destroy']);


Route::get('/women_products',[CustomerController::class,'women_products']);
Route::get('/men_products',[CustomerController::class,'men_products']);
Route::get('singleProduct/{id}',[CustomerController::class,'single_product']);
Route::get('/kids',[CustomerController::class,'kids_products']);


Route::get('/remove_cart/{id}',[CartController::class,'remove']);
Route::post('/add_cart/{id}',[CartController::class,'store']);
Route::get('/index_cart',[CartController::class,'index']);
Route::get('/carts',[CartController::class,'show']);
Route::get('/confirm_order',[CartController::class,'order']);

Route::get('/make_order',[OrderController::class,'store']);
Route::get('/all_orders',[OrderController::class,'index']);
//Route::post('/make_order',[OrderController::class,'store']);
// ROute::post('signup',[UserController::class,'signupsave'])->name('signup');
//Route::get('/redirect',[HomeController::class,'redirect'])->middleware(['auth','verified']); 

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('home.homePage');
//     })->name('dashboard');
    
// });
