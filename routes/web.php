<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;



Route::get('/',[FrontendController::class,'index'])->name('index');
Route::get('/about',[UserController::class,'about']);
Route::get('/shop',[UserController::class,'shop']);
Route::prefix('shop')->group(
    function()
    {
        Route::get('/detail_product',[UserController::class,'detail_product']);
        
    }
);
Route::get('/blog',[UserController::class,'blog']);
Route::prefix('/blog')->group(
    function()
    {
        Route::get('/blog-post',[UserController::class,'blog_post']);
        
    }
);
Route::get('/contact',[UserController::class,'contact']);

Route::get('/login',[UserController::class,'login']);
Route::get('/register',[UserController::class,'register']);
Route::get('/shopping-cart',[UserController::class,'shopping_cart']);
Route::prefix('shopping-cart')->group(
    function () {
        Route::get('check-out',[UserController::class,'checkout']);  
    }
);


// Add
Route::get('/add',[FrontendController::class,'add'])->name('add');
Route::post('/add',[FrontendController::class,'add_post'])->name('add_post');


// ----- USER
Route::prefix('users')->name('users.')->group(
    function () {
        Route::get('/',[UserController::class,'index'])->name('index');
        Route::get('/add',[UserController::class,'add'])->name('add');
        Route::post('/add',[UserController::class,'post_add'])->name('post_add');
        Route::get('/edit/{id}',[UserController::class,'get_edit'])->name('edit');
        Route::post('/update',[UserController::class,'post_edit'])->name('post_edit');
        Route::get('/delete/{id}',[UserController::class,'delete'])->name('delete');
        Route::get('/testphp',[UserController::class,'testphp'])->name('testphp');

  
    }
);


//----- ADMIN
Route::prefix('admin')->name('admin.')->group(
    function () {
        Route::get('/',[AdminController::class,'index'])->name('index');
        Route::get('/about',[AdminController::class,'about']);
    }
);



