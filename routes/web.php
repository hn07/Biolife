<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;



Route::get('/',[FrontendController::class,'index'])->name('index');
Route::get('/contact',[FrontendController::class,'contact'])->name('contact');
// Add
Route::get('/add',[FrontendController::class,'add'])->name('add');
Route::post('/add',[FrontendController::class,'add_post'])->name('add_post');


// ----- USER
Route::prefix('users')->group(
    function () {
        Route::get('/',[UserController::class,'index']);

        Route::get('/add',[UserController::class,'add']);
       
    }
);


//----- ADMIN
Route::prefix('admin')->group(
    function () {
        Route::get('/',[AdminController::class,'index']);
    }
);

