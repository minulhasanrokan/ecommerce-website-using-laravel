<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\SuperAdminController;

use App\Http\Controllers\CategoryController;

use App\Http\Controllers\SubCategoryController;

use App\Http\Controllers\BrandController;

use App\Http\Controllers\UnitController;

use App\Http\Controllers\SizeController;

use App\Http\Controllers\ColorController;

use App\Http\Controllers\ProductController;

use App\Http\Controllers\CartController;

use App\Http\Controllers\CheckoutController;

use App\Http\Controllers\CustomerController;


use App\Http\Controllers\OrderController;

use App\Http\Controllers\SslCommerzPaymentController;

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
// start backend .......................................................start backend 

Route::get('admin',[AdminController::class,'index']);

Route::post('admin-dashboard',[AdminController::class,'admin_dashboard']);

Route::get('dashboard',[SuperAdminController::class,'dashboard']);

Route::get('logout',[SuperAdminController::class,'logout']);


// category route

Route::resource('categories',CategoryController::class);

Route::get('/category-status/{category}',[CategoryController::class,'change_category_status']);

// sub category

Route::resource('sub-categories',SubCategoryController::class);

Route::get('/sub-category-status/{subCategory}',[SubCategoryController::class,'change_sub_category_status']);


// Brand

Route::resource('brands',BrandController::class);

Route::get('/brand-status/{brand}',[BrandController::class,'change_brand_status']);


// Units

Route::resource('units',UnitController::class);

Route::get('/units-status/{unit}',[UnitController::class,'change_unit_status']);


// products sizes

Route::resource('sizes',SizeController::class);

Route::get('/sizes-status/{size}',[SizeController::class,'change_size_status']);


// products colors

Route::resource('colors',ColorController::class);

Route::get('/colors-status/{color}',[ColorController::class,'change_color_status']);


// products

Route::resource('products',ProductController::class);

Route::get('/products-status/{product}',[ProductController::class,'change_product_status']);

// get sub catagoey by category id
Route::get('/get-sub-category/{id}',[ProductController::class,'get_sub_category']);



// end backend ...........................................................end backend 


// start frontend ............................................................ start frontend 

Route::get('/',[HomeController::class,'index']);

// single product page
Route::get('/view-product-details/{id}',[HomeController::class,'view_product_details']);

//  product page by category
Route::get('/product-by-category/{id}',[HomeController::class,'product_by_category']);

//  product page by category
Route::get('/product-by-sub-category/{id}',[HomeController::class,'product_by_sub_category']);

//  product page by category
Route::get('/product-by-brand/{id}',[HomeController::class,'product_by_brand']);

// add to cart route 

Route::post('/add-to-cart',[CartController::class,'add_to_cart']);

// delete from cart

Route::get('/delete-cart/{id}',[CartController::class,'delete_cart']);


//check out

//Route::get('/check-out',[CheckoutController::class,'check_out']);


// user login check
Route::get('/login-check',[CheckoutController::class,'login_check']);


// customer registration
Route::post('/customer-registration',[CustomerController::class,'customer_registration']);

// customer registration
Route::post('/customer-login',[CustomerController::class,'customer_login']);

// customer registration
Route::get('/cus-logout',[CustomerController::class,'cus_logout']);

//save shipping address

//Route::post('/save-shipping-address',[CheckoutController::class,'save_shipping_address']);

//save shipping address

//Route::get('/payment',[CheckoutController::class,'payment']);


Route::get('/search',[HomeController::class,'search']);

//save shipping address

//Route::post('/order-place',[CheckoutController::class,'order_place']);


Route::get('/manage-order',[OrderController::class,'manage_order']);

Route::get('/view-order/{id}',[OrderController::class,'view_order']);



// end frontend .........................................................end frontend 


// SSLCOMMERZ Start
Route::get('/check-out', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END
