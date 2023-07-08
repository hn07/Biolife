<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Categories;
use App\Models\Products;
use App\Models\News;
use App\Models\Customer;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Str;
use App\Models\StatusNews;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


class NewsCustomerController extends Controller
{
    private $news;

    public function __construct()
    {
        $this->news = new News();
    }
    public function blog()
    {   
        // $newsAll đã được gửi qua NewsMiddleware
        $carts = Cart::content();
        $newsCategory = News::with('categoryNews')->get();

        return view('Frontend.Pages.blog',compact('carts', 'newsCategory' ));
    }
    public function blog_post($id)
    {
        $CustomerId ='';
        $carts = Cart::content();
        $news = News::find($id);
        if (Session::has('loginId_Customer')){
            $id = Session::get('loginId_Customer');
            $CustomerId = Customer::find($id);
        }
        $newsall = News::all();
        
        return view('Frontend.Pages.blog-post',compact('carts','news','newsall','CustomerId'));

    }
}
