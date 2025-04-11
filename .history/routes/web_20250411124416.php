<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

route::get('/',[HomeController::class,'home']);

route::get('/dashboard',[HomeController::class,'login_home'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/myorders', [HomeController::class, 'myorders'])->middleware(['auth', 'verified']);

// Route::get('/dashboard', function () {
//     return view('home.index');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


route::get('admin/dashboard',[HomeController::class,'index'])->middleware(['auth','admin']);

route::get('view_category',[AdminController::class,'view_category'])->middleware(['auth','admin']);

route::post('add_category',[AdminController::class,'add_category'])->middleware(['auth','admin']);

route::get('delete_category/{id}',[AdminController::class,'delete_category'])->middleware(['auth','admin']);

route::get('edit_category/{id}',[AdminController::class,'edit_category'])->middleware(['auth','admin']);

route::post('update_category/{id}',[AdminController::class,'update_category'])->middleware(['auth','admin']);



route::get('view_brand',[AdminController::class,'view_brand'])->middleware(['auth','admin']);

route::post('add_brand',[AdminController::class,'add_brand'])->middleware(['auth','admin']);

route::get('delete_brand/{id}',[AdminController::class,'delete_brand'])->middleware(['auth','admin']);

route::get('edit_brand/{id}',[AdminController::class,'edit_brand'])->middleware(['auth','admin']);

route::post('update_brand/{id}',[AdminController::class,'update_brand'])->middleware(['auth','admin']);



route::get('add_product',[AdminController::class,'add_product'])->middleware(['auth','admin']);

route::post('upload_product',[AdminController::class,'upload_product'])->middleware(['auth','admin']);

route::get('view_product',[AdminController::class,'view_product'])->middleware(['auth','admin']);


route::get('delete_product/{id}',[AdminController::class,'delete_product'])->middleware(['auth','admin']);

route::get('update_product/{id}',[AdminController::class,'update_product'])->middleware(['auth','admin']);

route::post('edit_product/{id}',[AdminController::class,'edit_product'])->middleware(['auth','admin']);

route::get('product_search',[AdminController::class,'product_search'])->middleware(['auth','admin']);

Route::get('product_details/{id}', [HomeController::class, 'product_details']);

Route::get('add_cart/{id}', [HomeController::class, 'add_cart'])->middleware(['auth', 'verified']);

Route::post('add_cart/{id}', [HomeController::class, 'add_cart'])->middleware(['auth', 'verified']);

Route::get('mycart', [HomeController::class, 'mycart'])->middleware(['auth', 'verified']);

Route::get('remove_cart/{id}', [HomeController::class, 'remove_cart']);

Route::post('update_cart_quantity/{id}', [HomeController::class, 'update_cart_quantity']);


Route::get('view_shop', [HomeController::class, 'view_shop']);

Route::post('confirm_order', [HomeController::class, 'confirm_order'])->middleware(['auth', 'verified']);

Route::get('view_orders', [AdminController::class, 'view_order'])->middleware(['auth', 'admin']);

Route::get('on_delivery/{id}', [AdminController::class, 'on_delivery'])->middleware(['auth', 'admin']);

Route::get('delivered/{id}', [AdminController::class, 'delivered'])->middleware(['auth', 'admin']);

Route::get('print_pdf/{id}', [AdminController::class, 'print_pdf'])->middleware(['auth', 'admin']);

Route::get('view_users', [AdminController::class, 'view_users'])->middleware(['auth', 'admin']);
Route::get('delete_user/{id}', [AdminController::class, 'delete_user'])->middleware(['auth', 'admin']);

Route::get('delete_order/{id}', [HomeController::class, 'delete_order'])->name('delete_order');

Route::controller(HomeController::class)->group(function(){

    Route::get('stripe/{total}', 'stripe');

    Route::post('stripe', 'stripePost')->name('stripe.post');

});

Route::get('view_contact', [HomeController::class, 'view_contact']);
Route::post('view_contact', [HomeController::class, 'store'])->name('view_contact.store');

Route::get('search', [HomeController::class, 'search']);
