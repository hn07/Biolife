<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;



class ProductsController extends Controller
{
    private $product;

    public function __construct()
    {
        $this->product = new Products();
    }
    public function table_data_product()
    {
        $products = Products::all();
        // ->with('produts', $products)
        return view('Frontend.Pages_Admin.data-product', compact('products'));
    }
    public function addProduct()
    {
        $categoryList = Categories::all();
        return view('Frontend.Pages_Admin.form-add-san-pham')->with('categoryList', $categoryList);
    }

    public function addProductPost(Request $request)
    {
        $request->validate([
            'code_product' => 'required',
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'category' => 'required|integer',
            'mota' => 'required',
        ], [
            "code_product.required" => "Mã sản phẩm không được để trống",
            "category.integer" => "Bạn hãy chọn danh mục sản phẩm",

        ]);

        $requestData = $request->all();
        $fileName = time() . $request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->storeAs('images', $fileName, 'public');
        $requestData["photo"] = '/storage/' . $path;
        $photoUpload = $requestData["photo"];

        $admin = new Products();
        $admin->code_product = $request->code_product;
        $admin->name = $request->name;
        $admin->quantity = $request->quantity;
        $admin->price = $request->price;
        $admin->image = $photoUpload;
        $admin->category_id = $request->category;
        $admin->description = $request->mota;
        $res = $admin->save();

        if ($res) {
            return redirect()->back()->with('success', 'Thêm sản phẩm thành công');
        } else {
            return back()->with('error', 'Thêm sản phẩm thất bại');
        }
    }

    public function edit_san_pham(Request $request, $id = 0)
    {
        $categoryList = Categories::all();
        $products = Products::all();

        if (!empty($id)) {
            $productDetail =  $this->product->getDetail($id);

            if (!empty($productDetail[0])) {
                $request->session()->put('getIdProduct', $id);
                $productDetail = $productDetail[0];
            } else {
                return redirect()->route('admin.table-data-product')->with('error', 'Người dùng không tồn tại');
            }
        } else {
            return redirect()->route('admin.table-data-product')->with('error', 'Đường link không tồn tại');
        }

        return view('Frontend.Pages_Admin.form-edit-san-pham', compact('productDetail', 'products','categoryList'));
    }

    public function delete_san_pham(Request $request, $id = 0)
    {
          $products = Products::all();

        if (!empty($id)) {
            $productDetail =  $this->product->getDetail($id);

            if (!empty($productDetail[0])) {
                $deleteStatus = $this->product->deleteProduct($id);
                if ($deleteStatus) {
                    $msg = "Xóa người dùng thàng công";
                } else {
                    $msg = "Xóa người dùng thất bại";
                }
            } else {
                $msg = "Người dùng không tồn tại";
            }
        } else {
            $msg = "Liên kết không tồn tại";
        }

        return back()->with('msg', $msg);
    }
}
