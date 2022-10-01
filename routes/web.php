<?php

use Illuminate\Support\Facades\Route;

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
//
Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    /// dashboard show route
    Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

    //User Role
    Route::get('profile', [\App\Http\Controllers\Admin\DashboardController::class, 'profile'])->name('profile');
    Route::get('edit-profile/{id}', [\App\Http\Controllers\Admin\DashboardController::class, 'edit_profile'])->name('edit_profile');
    Route::post('update-profile/{id}', [\App\Http\Controllers\Admin\DashboardController::class, 'update_profile'])->name('upadet_profile');


    //Category crud Route
    Route::get('category', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category');
    Route::get('mange-category', [\App\Http\Controllers\Admin\CategoryController::class, 'manage_category'])->name('create_category');
    Route::post('category', [\App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('category_store');
    Route::get('edit-category/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('category_edit');
    Route::post('update-category/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('category_update');
    Route::get('delete-category/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('category_delete');
    Route::get('category-status/{status}/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'status'])->name('category_status');

    //end category

    //Product Route
    Route::get('product', [\App\Http\Controllers\Admin\ProductController::class, 'index'])->name('product');
    Route::get('create-product', [\App\Http\Controllers\Admin\ProductController::class, 'create'])->name('create_product');
    Route::post('product', [\App\Http\Controllers\Admin\ProductController::class, 'store'])->name('store_product');
    Route::get('edit_product/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('edit_product');
    Route::post('update_product/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'update'])->name('update_product');
    Route::get('delete_product/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('delete_product');
    //end product


    //Product-Brand Route start
    Route::get('brand', [\App\Http\Controllers\Admin\BrandController::class, 'index'])->name('brands');
    Route::get('add-brand', [\App\Http\Controllers\Admin\BrandController::class, 'create'])->name('create_brand');
    Route::post('brand', [\App\Http\Controllers\Admin\BrandController::class, 'store'])->name('store_brand');
    Route::get('edit-brand/{id}', [\App\Http\Controllers\Admin\BrandController::class, 'edit'])->name('brand_edit');
    Route::post('update-brand/{id}', [\App\Http\Controllers\Admin\BrandController::class, 'update'])->name('brand_update');
    Route::get('delete-brand/{id}', [\App\Http\Controllers\Admin\BrandController::class, 'destroy'])->name('brand_delete');
    Route::get('brand-status/{status}/{id}', [\App\Http\Controllers\Admin\BrandController::class, 'status'])->name('brand_status');
    //Product-Brand Route end

    //Product-tax Route start

    Route::get('tax', [\App\Http\Controllers\Admin\TaxController::class, 'index'])->name('taxs');
    Route::get('add-tax', [\App\Http\Controllers\Admin\TaxController::class, 'create'])->name('create_tax');
    Route::post('tax', [\App\Http\Controllers\Admin\TaxController::class, 'store'])->name('store_tax');
    Route::get('edit-tax/{id}', [\App\Http\Controllers\Admin\TaxController::class, 'edit'])->name('tax_edit');
    Route::post('update-tax/{id}', [\App\Http\Controllers\Admin\TaxController::class, 'update'])->name('tax_update');
    Route::get('delete-tax/{id}', [\App\Http\Controllers\Admin\TaxController::class, 'destroy'])->name('tax_delete');
    Route::get('tax-status/{status}/{id}', [\App\Http\Controllers\Admin\TaxController::class, 'status'])->name('tax_status');
    //Product-tax Route end

    //Coupon Route
    Route::get('coupon', [\App\Http\Controllers\Admin\CouponController::class, 'index'])->name('coupon');
    Route::get('add-coupon', [\App\Http\Controllers\Admin\CouponController::class, 'create'])->name('create_coupon');
    Route::post('coupon', [\App\Http\Controllers\Admin\CouponController::class, 'store'])->name('store_coupon');
    Route::get('edit-coupon/{id}', [\App\Http\Controllers\Admin\CouponController::class, 'edit'])->name('coupon_edit');
    Route::post('update-coupon/{id}', [\App\Http\Controllers\Admin\CouponController::class, 'update'])->name('coupon_update');
    Route::get('delete-coupon/{id}', [\App\Http\Controllers\Admin\CouponController::class, 'destroy'])->name('coupon_delete');
    Route::get('coupon-status/{status}/{id}', [\App\Http\Controllers\Admin\CouponController::class, 'status'])->name('coupon_status');
    //end coupon Route

     //Customer Route
    Route::get('Customer', [\App\Http\Controllers\Admin\CustomerController::class, 'index'])->name('customer');
    Route::get('show-customer/{id}', [\App\Http\Controllers\Admin\CustomerController::class, 'show'])->name('show_customer');
    Route::get('Customer-status/{status}/{id}', [\App\Http\Controllers\Admin\CustomerController::class, 'status'])->name('customer_status');
    //end Customer Route

    //Size crud Route
    Route::get('size', [\App\Http\Controllers\Admin\SizeController::class, 'index'])->name('size');
    Route::get('add-size', [\App\Http\Controllers\Admin\SizeController::class, 'create'])->name('create_size');
    Route::post('size', [\App\Http\Controllers\Admin\SizeController::class, 'store'])->name('store_size');
    Route::get('edit-size/{id}', [\App\Http\Controllers\Admin\SizeController::class, 'edit'])->name('size_edit');
    Route::post('update-size/{id}', [\App\Http\Controllers\Admin\SizeController::class, 'update'])->name('size_update');
    Route::get('delete-size/{id}', [\App\Http\Controllers\Admin\SizeController::class, 'destroy'])->name('size_delete');
    Route::get('size-status/{status}/{id}', [\App\Http\Controllers\Admin\SizeController::class, 'status'])->name('size_status');
    //size end


    //colors crud route
    Route::get('color', [\App\Http\Controllers\Admin\ColorController::class, 'index'])->name('color');
    Route::get('add-color', [\App\Http\Controllers\Admin\ColorController::class, 'create'])->name('create_color');
    Route::post('color', [\App\Http\Controllers\Admin\ColorController::class, 'store'])->name('store_color');
    Route::get('edit-color/{id}', [\App\Http\Controllers\Admin\ColorController::class, 'edit'])->name('color_edit');
    Route::post('update-color/{id}', [\App\Http\Controllers\Admin\ColorController::class, 'update'])->name('color_update');
    Route::get('delete-color/{id}', [\App\Http\Controllers\Admin\ColorController::class, 'destroy'])->name('color_delete');
    Route::get('color-status/{status}/{id}', [\App\Http\Controllers\Admin\ColorController::class, 'status'])->name('color_status');
    //colors end


    //colors crud route
    Route::get('banner', [\App\Http\Controllers\Admin\BannerController::class, 'index'])->name('banner');
    Route::get('add-banner', [\App\Http\Controllers\Admin\BannerController::class, 'create'])->name('create_banner');
    Route::post('banner', [\App\Http\Controllers\Admin\BannerController::class, 'store'])->name('store_banner');
    Route::get('banner-edit/{id}', [\App\Http\Controllers\Admin\BannerController::class, 'edit'])->name('banner_edit');
    Route::post('banner-update/{id}', [\App\Http\Controllers\Admin\BannerController::class, 'update'])->name('banner_update');
    Route::get('banner-delete/{id}', [\App\Http\Controllers\Admin\BannerController::class, 'destroy'])->name('banner_delete');
    Route::get('banner-status/{status}/{id}', [\App\Http\Controllers\Admin\BannerController::class, 'status'])->name('banner_status');
    //colors end

});




Route::group(['prefix'=>'front'],function (){
    Route::get('dashboard', [\App\Http\Controllers\Front\DashController::class, 'index'])->name('front.dash');
    Route::get('category/{id}',[\App\Http\Controllers\Front\DashController::class,'category'])->name('front_category');
    Route::get('product/{id}',[\App\Http\Controllers\Front\DashController::class,'product'])->name('front_product');
});


