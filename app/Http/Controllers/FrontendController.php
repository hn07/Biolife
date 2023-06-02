<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('Frontend.index');
    }
  


    public function add(){
        $title = 'Day la mau add form';
        return view('Frontend.Pages.add',compact('title'));
    }

    public function add_post(Request $request){
        dd($request);
    }
}
