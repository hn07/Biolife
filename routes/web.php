<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthControllerUser;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;



Route::get('/',[FrontendController::class,'index']);
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

//----- Auth User Controller 
Route::prefix('authentication')->name('authentication.')->group(
    function () {
        //===== Đăng ký 
        Route::get('/',[AuthControllerUser::class,'index'])->name('index');
        Route::get('/regestration',[AuthControllerUser::class,'regestration'])->name('regestration');
        Route::post('/regestration-user',[AuthControllerUser::class,'regesterUser'])->name('regestration-user');
       
        //===== Đăng nhập
        Route::get('/login',[AuthControllerUser::class,'login'])->name('login')->middleware('alreadyLogged');
        Route::post('/login',[AuthControllerUser::class,'loginPost'])->name('loginPost');

        //===== Trang chủ
        Route::get('/dashboard',[AuthControllerUser::class,'dashboard'])->middleware('isLoggedIn')->name('dashboard');
        

        //===== Đăng xuất 
        Route::get('/logout',[AuthControllerUser::class,'logout'])->name('logout');
       
       

    }
);


//----- ADMIN
Route::prefix('admin')->name('admin.')->group(
    function () {
        //===== Đăng ký
        Route::get('/',[AdminController::class,'login'])->name('login');
        Route::get('/regestration',[AdminController::class,'regestration'])->name('regestration');
        Route::post('/regestration-user',[AdminController::class,'regesterUser'])->middleware('alreadyLogged')->name('regestration-user');
        
        //===== Đăng nhập
        Route::get('/login',[AdminController::class,'login'])->name('login')->middleware('alreadyLogged');
        Route::post('/login',[AdminController::class,'loginPost'])->name('loginPost');

        //===== Trang chủ
        Route::get('/dashboard',[AdminController::class,'dashboard'])->middleware('isLoggedIn')->name('dashboard');
        Route::get('/trang-chu',[AdminController::class,'index'])->middleware('isLoggedIn')->name('trang-chu');
        
        //===== Quản lý sản phẩm
        Route::get('/table-data-product',[ProductsController::class,'table_data_product'])->middleware('isLoggedIn')->name('table-data-product');
        Route::get('/form-add-san-pham',[ProductsController::class,'addProduct'])->middleware('isLoggedIn')->name('form-add-san-pham');
        Route::post('/add-Product-Post',[ProductsController::class,'addProductPost'])->name('add-Product-Post');
        Route::get('/edit-san-pham/{id}',[ProductsController::class,'edit_san_pham'])->name('edit-san-pham');
        Route::get('/delete-san-pham/{id}',[ProductsController::class,'delete_san_pham'])->name('delete-san-pham');

        //===== Quản lý danh mục sản phẩm
        Route::get('/add-category-get',[CategoryController::class,'addCategoryGet'])->name('add-category-get');
        Route::post('/add-category-post',[CategoryController::class,'addCategoryPost'])->name('add-category-post');

        
        //===== Đăng xuất
        Route::get('/logout',[AdminController::class,'logout'])->name('logout');
        
    }
);



