<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Categories;
use App\Models\Products;
use App\Models\News;
use App\Models\Categorynews;
use App\Models\StatusNews;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $news;

    public function __construct()
    {
        $this->news = new News();
    }
    public function table_data_news()
    {
        $news = News::all();
        // ->with('produts', $products)$data = array();
        $dataAdmin = array();
        if (Session::has('loginId')) {
            $dataAdmin = Admin::where('id', '=', Session::get('loginId'))->first();
        }
        $categoryNewsList = Categorynews::all();

        return view('Frontend.Pages_Admin.data-news', compact('news', 'dataAdmin','categoryNewsList'));
    }

    public function addNews()
    {
        $dataAdmin = array();
        if (Session::has('loginId')) {
            $dataAdmin = Admin::where('id', '=', Session::get('loginId'))->first();
        }
        $categoryList = Categories::all();
        $StatusList = StatusNews::all();
        $categoryNewsList = Categorynews::all();
        return view('Frontend.Pages_Admin.form-add-news', compact('dataAdmin','categoryNewsList','categoryList','StatusList'));
    }

    public function addNewsPost(Request $request)
    {
        $request->validate([
            'code_news' => 'required',
            'category_news' => 'required',
            'title' => 'required',
            'author' => 'required',
            'category_product' => 'required|integer',
            'quote' => 'required',
            'photo' => 'required',           
            'mota' => 'required',
        ], [
            "code_news.required" => "Mã sản phẩm không được để trống",
            "category.integer" => "Bạn hãy chọn danh mục sản phẩm",

        ]);

        $requestData = $request->all();
        $fileName = time() . $request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->storeAs('images', $fileName, 'public');
        $requestData["photo"] = '/storage/' . $path;
        $photoUpload = $requestData["photo"];

        $news = new News();
        $news->code_news = $request->code_news;
        $news->category_news = $request->category_news;
        $news->title = $request->title;
        $news->author = $request->author;
        $news->category_product = $request->category_product;
        $news->quote = $request->quote;
        $news->content = $request->mota;
        $news->image_news = $photoUpload;       
        $res = $news->save();

        if ($res) {
            return redirect()->back()->with('success', 'Thêm bài viết thành công');
        } else {
            return back()->with('error', 'Thêm bài viết thất bại');
        }
    }
    public function editNewsPost(Request $request, $id = 0)
    {
        $categoryList = Categories::all();
        $products = Products::all();

        if (!empty($id)) {
            $newsDetail =  $this->news->getDetail($id);
            if (!empty($newsDetail[0])) {
                $request->session()->put('getIdProduct', $id);
                $newsDetail = $newsDetail[0];
            } else {
                return redirect()->route('admin.table-data-news')->with('error', 'Người dùng không tồn tại');
            }
        } else {
            return redirect()->route('admin.table-data-news')->with('error', 'Đường link không tồn tại');
        }

        return view('Frontend.Pages_Admin.form-edit-news', compact('newsDetail', 'products','categoryList'));
    }
    public function deleteAllNews(){
        $delete = $this->news->delete_all_news();
        if($delete){
         $delete_msg = "Hiện chưa có bài viết";
        }else{
         $delete_msg = "Xóa tất cả bài viết thất bại";
        }
        return view('Frontend.Pages_Admin.data-news',compact('delete_msg'));
     }
}
