<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthControllerUser;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsCustomerController;
use App\Http\Controllers\CategoryNewsController;
use App\Http\Controllers\StatusNewsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\SupplierNewController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;



// ----- USER Bản demo
Route::prefix('users')->name('users.')->group(
    function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/add', [UserController::class, 'add'])->name('add');
        Route::post('/add', [UserController::class, 'post_add'])->name('post_add');
        Route::get('/edit/{id}', [UserController::class, 'get_edit'])->name('edit');
        Route::post('/update', [UserController::class, 'post_edit'])->name('post_edit');
        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('delete');
        Route::get('/testphp', [UserController::class, 'testphp'])->name('testphp');
    }
);
//====== Trang đăng nhập
Route::get('/login', [UserController::class, 'login']);
Route::get('/register', [UserController::class, 'register']);

//====== Trang giỏ hàng
Route::get('/shopping-cart', [UserController::class, 'shopping_cart']);
Route::prefix('shopping-cart')->group(
    function () {
        Route::get('check-out', [UserController::class, 'checkout']);
    }
);
// ------------------------------------------------------------------------------

//====== Trang chủ
Route::get('/', [FrontendController::class, 'index'])->name('index');

//====== Trang giới thiệu
Route::get('/about', [UserController::class, 'about']);

//====== Trang tất cả sản phẩm
Route::get('/shop', [UserController::class, 'shop']);
Route::prefix('shop')->group(
    function () {
        Route::get('/detail_product', [UserController::class, 'detail_product']);
    }
);

//====== Trang danh mục sản phẩm
Route::prefix('/category')->name('category.')->group(function () {
    Route::get('/category-get/{id}', [CategoryController::class, 'category_getId'])->name('category-get');
});

//====== Trang tin tức
Route::get('/blog', [NewsCustomerController::class, 'blog']);
Route::prefix('/blogs')->group(function () {
    Route::get('/blog-post/{id}-{slug}', [NewsCustomerController::class, 'blog_post'])->name('blog-post');
});
//----------------------------------------------------------------
//===== Bình luận
Route::prefix('comment')->name('comment.')->group(
    function () {
        Route::POST('/add-comment/{id}', [CommentController::class, 'addComment'])->name('add-comment');
        Route::GET('/list-comment', [CommentController::class, 'listComment'])->name('list-comment');
    }
);

//====== Trang liên hệ
Route::get('/contact', [UserController::class, 'contact']);

//====== Errors
Route::get('/404', function () {
    App::abort(404, 'Đã có lỗi xãy ra!');
    return view('Frontend.Errors.404');
})->name('404');




// ----------------------------------------------------------------
//San pham
Route::prefix('shop')->name('shop.')->group(
    function () {
        //===== Liệt kê tất cả sản phẩm
        Route::get('/tat-ca-san-pham', [ProductsController::class, 'allProduct'])->name('tat-ca-san-pham');

        //===== Chi tiết sản phẩm
        Route::get('/chi-tiet-san-pham/{id}', [ProductsController::class, 'detailProduct'])->name('chi-tiet-san-pham')->middleware('isLoggedInCustomer');

        //===== Giỏ hàng
        Route::get('/shopping-cart', [CartController::class, 'shopping_cart'])->name('shopping-cart')->middleware('isLoggedInCustomer');

        //===== Thêm sản phẩm vào giỏ hàng
        Route::get('/add-to-cart/{id}', [CartController::class, 'add'])->name('add-to-cart')->middleware('isLoggedInCustomer');
        Route::post('/add-to-cart/{id}', [CartController::class, 'add_product'])->name('add-to-cart-post')->middleware('isLoggedInCustomer');

        //===== Xoá giỏ hàng
        Route::get('/delete-cart/{id}', [CartController::class, 'delete'])->name('delete-cart');
        Route::get('/delete-all-cart', [CartController::class, 'delete_all_cart'])->name('delete-all-cart');

        //===== Update giỏ hành
        Route::get('/update-cart', [CartController::class, 'update_cart'])->name('update-cart');
    }
);

//----------------------------------------------------------------
//Search
Route::prefix('search')->name('search.')->group(
    function () {
        Route::post('/', [SearchController::class, 'search'])->name('index');
        Route::get('ajax-search-product', [SearchController::class, 'ajaxSearch'])->name('ajax-search-product');
    }
);




//----------------------------------------------------------------
//===== Thanh toán
Route::prefix('checkout')->name('checkout.')->group(
    function () {
        Route::get('/', [CheckOutController::class, 'indexAction'])->name('index');
        Route::post('/add-order', [CheckOutController::class, 'addOrder'])->name('add-order');
    }
);


//===== Xác nhận đơn hàng
Route::prefix('order')->name('order.')->group(
    function () {
        Route::get('accept-order/{order}/{token}', [CheckOutController::class, 'accept'])->name('accept-order');
    }
);



//----------------------------------------------------------------

//----- Auth User Controller 
Route::prefix('authentication')->name('authentication.')->group(
    function () {
        //===== Đăng ký 
        Route::get('/', [AuthControllerUser::class, 'index'])->name('index')->middleware('AlreadyLoginCustomer');
        Route::get('/regestration', [AuthControllerUser::class, 'regestration'])->name('regestration');
        Route::post('/regestration-user', [AuthControllerUser::class, 'regesterUser'])->name('regestration-user');

        //===== Đăng nhập
        Route::get('/login', [AuthControllerUser::class, 'login'])->name('login')->middleware('AlreadyLoginCustomer');
        Route::post('/login', [AuthControllerUser::class, 'loginPost'])->name('loginPost');

        //===== Trang chủ
        Route::get('/dashboard', [AuthControllerUser::class, 'dashboard'])->name('dashboard')->middleware('isLoggedInCustomer');

        //===== Đăng xuất 
        Route::get('/logout', [AuthControllerUser::class, 'logout'])->name('logout');

        //===== Quên mật khẩu
        Route::get('/forgot-password', [AuthControllerUser::class, 'forgotPassword'])->name('forgot-password');
        Route::post('/forgot-password', [AuthControllerUser::class, 'forgotPasswordPost'])->name('forgot-password-post');
        Route::get('/get-password/{customer}/{token}', [AuthControllerUser::class, 'getPassword'])->name('get-password');
        Route::post('/post-password/{customer}/{token}', [AuthControllerUser::class, 'getPasswordPost'])->name('post-password');



        //===== Đổi mật khẩu
        Route::get('/change-password', [AuthControllerUser::class, 'changePassword'])->name('change-password');
        Route::post('/change-password', [AuthControllerUser::class, 'changePasswordPost'])->name('change-password-post');


        //===== Cập nhật thông tin
        Route::get('/update-info', [AuthControllerUser::class, 'updateCustomer'])->name('update-info')->middleware('isLoggedInCustomer');

        //===== Xác nhận email


        //===== Xác nhận đăng nhập


        //===== Xác nhận đăng ký

    }
);

//----------------------------------------------------------------

//----- ADMIN
Route::prefix('admin')->name('admin.')->group(
    function () {
        //===== Đăng ký
        Route::get('/', [AdminController::class, 'login'])->name('login');
        Route::get('/regestration', [AdminController::class, 'regestration'])->name('regestration');
        Route::post('/regestration-user', [AdminController::class, 'regesterUser'])->middleware('alreadyLogged')->name('regestration-user');

        //===== Đăng nhập
        Route::get('/login', [AdminController::class, 'login'])->name('login')->middleware('alreadyLogged');
        Route::post('/login', [AdminController::class, 'loginPost'])->name('loginPost');

        //===== Trang chủ
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware('isLoggedIn')->name('dashboard');
        Route::get('/trang-chu', [AdminController::class, 'index'])->middleware('isLoggedIn')->name('trang-chu');

        //===== Quản lý khách hàng 
        Route::get('/table-data-customer', [AuthControllerUser::class, 'tableDataCustomer'])->middleware('isLoggedIn')->name('table-data-customer');
        Route::get('/delete-customer/{id}', [AuthControllerUser::class, 'deleteUser'])->name('delete-customer');

        //===== Quản lý sản phẩm
        Route::get('/table-data-product', [ProductsController::class, 'table_data_product'])->middleware('isLoggedIn')->name('table-data-product');
        Route::get('/form-add-san-pham', [ProductsController::class, 'addProduct'])->middleware('isLoggedIn')->name('form-add-san-pham');
        Route::post('/add-Product-Post', [ProductsController::class, 'addProductPost'])->name('add-Product-Post');
        Route::get('/edit-san-pham/{id}', [ProductsController::class, 'edit_san_pham'])->name('edit-san-pham');
        Route::post('/edit-san-pham-post', [ProductsController::class, 'post_edit'])->name('edit-san-pham-post');
        Route::get('/delete-san-pham/{id}', [ProductsController::class, 'delete_san_pham'])->name('delete-san-pham');
        Route::get('/delete-all-san-pham', [ProductsController::class, 'delete_all_product'])->name('delete-all-san-pham');
        Route::get('/delete-image/{imageId}', [ProductsController::class, 'deleteImage'])->name('delete-image');


        //===== Quản lý danh mục sản phẩm
        Route::get('/add-category-get', [CategoryController::class, 'addCategoryGet'])->name('add-category-get');
        Route::post('/add-category-post', [CategoryController::class, 'addCategoryPost'])->name('add-category-post');
        Route::get('/xoa-danh-muc-san-pham/{id}', [CategoryController::class, 'delete_danh_muc'])->name('xoa-danh-muc-san-pham');

        //===== Quản lý nhà cung cấp sản phẩm
        Route::post('/add-supplier-post', [SupplierNewController::class, 'addSupplierPost'])->name('add-supplier-post');
        Route::get('/xoa-nha-cung-cap-san-pham/{id}', [SupplierNewController::class, 'delete_supplier'])->name('xoa-nha-cung-cap-san-pham');


        //===== Quản lý bài viết
        Route::get('/table-data-news', [NewsController::class, 'table_data_news'])->middleware('isLoggedIn')->name('table-data-news');
        Route::get('/form-add-news', [NewsController::class, 'addNews'])->middleware('isLoggedIn')->name('form-add-news');
        Route::post('/add-news-post', [NewsController::class, 'addNewsPost'])->name('add-news-post');
        Route::get('/edit-news/{id}', [NewsController::class, 'editNewsPost'])->name('edit-news');
        Route::get('/delete-all-bai-viet', [NewsController::class, 'deleteAllNews'])->name('delete-all-bai-viet');


        //===== Quản lý danh mục bài viết
        Route::get('/add-categoryNews-get', [CategoryNewsController::class, 'addCategoryNewsGet'])->name('add-categoryNews-get');
        Route::post('/add-categoryNews-post', [CategoryNewsController::class, 'addCategoryNewsPost'])->name('add-categoryNews-post');

        //===== Quản lý trạng thái bài viết
        Route::get('/add-status-News-get', [StatusNewsController::class, 'addStatusNewsGet'])->name('add-status-News-get');
        Route::post('/add-status-News-post', [StatusNewsController::class, 'addStatusNewsPost'])->name('add-status-News-post');


        //===== Đăng xuất
        Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
    }
);
