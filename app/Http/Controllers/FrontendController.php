<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Products;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use \Carbon\Carbon;


class FrontendController extends Controller
{
    public function index(){
        $carts = Cart::content();
        $productAll = Products::all();
        $newsAll = News::all();
        $dates = [];

        foreach ($newsAll as $news) {
            $date = Carbon::parse($news->created_at)->day;
            $dates[] = $date;
        }
        // dd($dates[0]);
        return view('Frontend.index',compact('carts','productAll','newsAll','dates'));
    }
  


    public function add(){
        $title = 'Day la mau add form';
        return view('Frontend.Pages.add',compact('title'));
    }

    public function add_post(Request $request){
        dd($request);
    }
}
