<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;


class SearchController extends Controller
{
    public function search(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ yêu cầu AJAX
        $keyword = $request->input('keyword');

        // Tìm kiếm các kết quả liên quan đến từ khóa
        $products = Products::where('name', 'LIKE', '%' . $keyword . '%')->get();

        // Trả về kết quả dưới dạng JSON
        return response()->json($products);
    }

    public function ajaxSearch(){
        $data =  Products::search()->get();
        return view('Frontend.Pages.ajaxSearch', compact('data'));
    }
}
