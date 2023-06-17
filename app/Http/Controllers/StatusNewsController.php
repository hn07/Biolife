<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\StatusNews;
use App\Models\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StatusNewsController extends Controller
{
    public function addStatusNewsPost(Request $request){
        $request->validate([
            'status_name' => 'required',
            'desc_status' => 'required',
        ]);

        $status = new StatusNews();
        $status->status_name = $request->status_name;
        $status->desc_status = $request->desc_status;
        $status_done = $status->save();


        if($status_done){
            return redirect()->back()->with('success','Thêm danh mục thành công');
        }
        else {
            return redirect()->back()->with('error','Thêm danh mục thất bại');
        }
    }
}
