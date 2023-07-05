<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Admin;
use App\Models\StatusNews;
use App\Models\Supplier;
use App\Models\ImageSubProduct;
use Gloudemans\Shoppingcart\Facades\Cart;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AIPController extends Controller
{
    public function ajaxSearch(){
        $data =  Products::search()->get();
        return $data;
    }
}
