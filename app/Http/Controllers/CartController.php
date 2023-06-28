<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;

use App\Models\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Stripe\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class CartController extends Controller
{
    private $carts;
    const _PER_PAGE = 5;

    public function add(Request $request, $id)
    {
        $product = Products::findorFail($id);
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $product->discount ?? $product->price,
            'weight' => 0,
            'options' => [
                'image' => $product->image,
            ]
            
        ]);       
        return back();
    }

    public function shopping_cart()
    {
        $carts = Cart::content();
        $total = Cart::total();
        $totalQty = Cart::count();
        $totalPrice = Cart::subtotal();
        $totalDiscount = Cart::discount();

        return view('Frontend.Pages.shopping-cart', compact('carts', 'total', 'totalQty', 'totalPrice', 'totalDiscount'));
    }
   
    public function delete($id){
        Cart::remove($id);
        return back();
    }

    public function delete_all_cart(){
        Cart::destroy();
        return back();
    }

    public function update_cart(Request $request){
        if(request()->ajax()){
            $id = request()->rowId;
            $qty = request()->qty;
            Cart::update($id, $qty);
            // return response()->json(['success' => true]);
        }
    }

    public function getCheckOut(){
        $carts = Cart::content();
        $total = Cart::total();
        $totalQty = Cart::count();
        $totalPrice = Cart::subtotal();
        $totalDiscount = Cart::discount();
        return view('Frontend.Pages.check-out',compact('carts', 'total', 'totalQty', 'totalPrice', 'totalDiscount'));
    }

}
