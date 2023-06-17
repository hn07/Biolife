<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorynews;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryNewsController extends Controller
{
    public function addCategoryNewsPost(Request $request){
        $request->validate([
            'addCategory' => 'required',
            'descCategory' => 'required',
        ]);

        $category = new Categorynews();
        $category->name_category = $request->addCategory;
        $category->desc_category = $request->descCategory;
        $category_done = $category->save();

        if($category_done){
            return redirect()->back()->with('success','Thêm danh mục thành công');
        }
        else {
            return redirect()->back()->with('error','Thêm danh mục thất bại');
        }
    }
}
