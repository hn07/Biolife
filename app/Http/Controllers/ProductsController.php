<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Cart;
use App\Models\Categories;
use App\Models\Admin;
use App\Models\StatusNews;
use DeepCopy\f013\C;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;



class ProductsController extends Controller
{
    private $product;
    const _PER_PAGE = 5;

    public function __construct()
    {
        $this->product = new Products();
    }
    // ===== ADMIN MANAGER
    public function table_data_product()
    {
        $products = Products::all();
        // ->with('produts', $products)$data = array();
        $dataAdmin = array();
        if (Session::has('loginId')) {
            $dataAdmin = Admin::where('id', '=', Session::get('loginId'))->first();
        }
        return view('Frontend.Pages_Admin.data-product', compact('products', 'dataAdmin'));
    }
    public function addProduct()
    {
        $categoryList = Categories::all();
        $StatusList = StatusNews::all();
        return view('Frontend.Pages_Admin.form-add-san-pham', compact('categoryList', 'StatusList'));
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

        return view('Frontend.Pages_Admin.form-edit-san-pham', compact('productDetail', 'products', 'categoryList'));
    }

    public function delete_san_pham(Request $request, $id = 0)
    {
        $products = Products::all();

        if (!empty($id)) {
            $productDetail =  $this->product->getDetail($id);

            if (!empty($productDetail[0])) {
                $deleteStatus = $this->product->deleteProduct($id);
                if ($deleteStatus) {
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

    public function delete_all_product()
    {
        $delete = $this->product->deleteAllProduct();
        if ($delete) {
            $delete_msg = "Hiện chưa có sản phẩm";
        } else {
            $delete_msg = "Xóa tất cả sản phẩm thất bại";
        }
        return view('Frontend.Pages_Admin.data-product', compact('delete_msg'));
    }
    // ===== CUSTOMER
    public function allProduct(Request $request)
    {

        $filters = [];
        $keyWords = null;

        $product = Products::all();

        //Xử lý logic filter
        if (!empty($request->status)) {
            $status = $request->status;
            if ($status == 'Latest') {
                $status = 1;
            } else {
                $status = 0;
            }
            $filters[] = ['products.created_at', '=', $status];
        }
        if (!empty($request->price)) {
            $price = $request->price;
            if ($price == 'HighestPrice') {
                $price = 1;
            } else {
                $price = 0;
            }
            $filters[] = ['products.price', '=', $price];
        }
        if (!empty($request->category)) {
            $category = $request->category;

            $filters[] = ['products.category_id', '=', $category];
        }

        if (!empty($request->key_words)) {
            $keyWords = $request->key_words;
        }
        //Xử lý logic sắp xếp
        $sortBy = $request->input('sort-by');
        $sortType = $request->input('sort-type');
        $allowSort = ['asc', 'desc'];

        if (!empty($sortType) && in_array($sortType, $allowSort)) {
            if ($sortType == 'asc') {
                $sortType = 'desc';
            } else {
                $sortType = 'asc';
            }
        } else {
            $sortType = "desc";
        }

        $sort_Array = [
            'sortBy' => $sortBy,
            'sortType' => $sortType,
        ];

        $list_product = $this->product->getAllProduct($filters, $keyWords, $sort_Array, self::_PER_PAGE);
        return view('Frontend.Pages.shop', compact('product', 'list_product', 'sortType'));
    }
    public function detailProduct(Request $request, $id)
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
        return view('Frontend.Pages.detail-product', compact('productDetail', 'products', 'categoryList'));
    }

    public function cart()
    {
        return view('Frontend.Pages.shop');
    }
    public function shopping_cart()
    {
        return view('Frontend.Pages.shopping-cart');
    }

    // public function addToCart($id)
    // {
    //     $product = Products::findorFail($id);
    //     $cart = session()->get('cart', []);
    //     if (isset($cart[$id])) {
    //         $cart[$id]['quantity']++;
    //     } else {
    //         $cart[$id] = [
    //             "name" => $product->name,
    //             "image" => $product->image,
    //             "payload" => $product->price,
    //             "quantity" => 1
    //         ];
          
    //     }
    //     Session::push('cart',$cart);
    //     // session()->put('cart', $cart);
    //     return redirect()->back()->with('success', 'Product add to cart successfully!');
    // }

    
    // public function removeFromCart(Request $request)
    // {
    //     if ($request->id) {
    //         $cart = session()->get('cart');
    //         if (isset($cart[$request->id])) {
    //             unset($cart[$request->id]);
    //             session()->put('cart', $cart);
    //         }
    //         session()->flash('success', 'Product successfully removed!');
    //     }
    // }
    // public function update_cart(Request $request)
    // {
    //     if ($request->id && $request->quantity) {
    //         $cart = session()->get('cart');
    //         $cart[$request->id]["quantity"] = $request->quantity;
    //         session()->put('cart', $cart);
    //         session()->flash('success', 'Cart successfully updated!');
    //     }
    // }


    
}
