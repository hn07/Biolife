<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Categories;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $category;
    const _PER_PAGE = 2;
    public function __construct()
    {
        $this->category = new Categories();
    }
    public function addCategoryPost(Request $request){
        $request->validate([
            'addCategory' => 'required',
            'descCategory' => 'required',
        ]);

        $category = new Categories();
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

    public function delete_danh_muc( $id = 0)
    {
        if (!empty($id)) {
            $categoryDetail =  $this->category->getDetail($id);

            if (!empty($categoryDetail[0])) {
                $deleteCategory = $this->category->deleteCategory($id);
                if ($deleteCategory) {
                    $msg = "Xóa sản phẩm thàng công";
                } else {
                    $msg = "Xóa sản phẩm thất bại";
                }
            } else {
                $msg = "Sản phẩm không tồn tại";
            }
        } else {
            $msg = "Liên kết không tồn tại";
        }

        return back()->with('msg', $msg);
    }

    public function category_getId($id){
        $carts = Cart::content();
        $category_product = Products::where('category_id', $id)->paginate(self::_PER_PAGE)->withQueryString(); //lấy ra tất cả sản phẩm có category_id = $id

        return view('Frontend.Pages.category-page', compact('category_product','carts'));
    }
}
