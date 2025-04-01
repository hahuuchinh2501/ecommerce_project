<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

route::get('/',[HomeController::class,'home']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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