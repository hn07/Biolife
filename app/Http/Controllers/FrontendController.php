<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('Frontend.index');
    }
    public function contact(){
        return view('Frontend.Pages.contact');
    }
}
