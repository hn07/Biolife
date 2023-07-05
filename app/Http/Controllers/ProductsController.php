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



class ProductsController extends Controller
{
    private $product;
    private $imageSubProduct;
    const _PER_PAGE = 5;

    public function __construct()
    {
        $this->imageSubProduct = new ImageSubProduct();
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
        $supplier = Supplier::all();
        $StatusList = StatusNews::all();
        return view('Frontend.Pages_Admin.form-add-san-pham', compact('categoryList', 'StatusList', 'supplier'));
    }

    public function addProductPost(Request $request)
    {
        $request->validate([
            'code_product' => 'required',
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'category' => 'required|integer',
            'supplier' => 'required|integer',
            'mota' => 'required',
            'beneficial' => 'required',
            'User_manual' => 'required',
        ], [
            "code_product.required" => "Mã sản phẩm không được để trống",
            "category.integer" => "Bạn hãy chọn danh mục sản phẩm",

        ]);

        $requestData = $request->all();
        $fileName = time() . $request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->storeAs('images', $fileName, 'public');
        $requestData["photo"] = '/storage/' . $path;
        $photoUpload = $requestData["photo"];

        $product = new Products();
        $product->code_product = $request->code_product;
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->image = $photoUpload;
        $product->category_id = $request->category;
        $product->supplier_id = $request->supplier;
        $product->description = $request->mota;
        $product->beneficial = $request->beneficial;
        $product->User_manual = $request->User_manual;
        $res = $product->save();

        if ($request->has('images')) {
            foreach ($request->file('images') as $image) {
                $fileName = time() . $image->getClientOriginalName();
                $path = $image->storeAs('images', $fileName, 'public');
                $photoUpload = '/storage/' . $path;
                $product->images()->create([
                    'products_id' => $product->id,
                    'image' => $photoUpload
                ]);
            }
        }

        if ($res) {
            return redirect()->back()->with('success', 'Thêm sản phẩm thành công');
        } else {
            return back()->with('error', 'Thêm sản phẩm thất bại');
        }
    }

    public function edit_san_pham(Request $request, $id = 0)
    {
        $supplier = Supplier::all();
        $categoryList = Categories::all();
        $products = Products::all();

        if (!empty($id)) {
            $productDetail =  $this->product->getDetail($id);

            if (!empty($productDetail[0])) {
                $request->session()->put('getIdProduct', $id);
                $productDetail = $productDetail[0];

                $productId = Products::find($id);
                $imageSub = $productId->images;
            } else {
                return redirect()->route('admin.table-data-product')->with('error', 'Sản phẩm không tồn tại');
            }
        } else {
            return redirect()->route('admin.table-data-product')->with('error', 'Đường link không tồn tại');
        }

        return view('Frontend.Pages_Admin.form-edit-san-pham', compact('productDetail', 'products', 'categoryList', 'imageSub','supplier'));
    }
    //request bình thường 
    public function post_edit(Request $request)
    {
        $id = session('getIdProduct');
        if (empty($id)) {
            return back()->with('msg', 'liên kết không tồn tại');
        }
        $request->validate([
            'code_product' => 'required',
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'category' => 'required|integer',
            'supplier' => 'required|integer',
            'mota' => 'required',
            'beneficial' => 'required',
            'User_manual' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ], [
            "code_product.required" => "Mã sản phẩm không được để trống",
            "name.required" => "Tên sản phẩm không được để trống",
            "quantity.required" => "Số lượng sản phẩm không được để trống",
            "price.required" => "Giá sản phẩm không được để trống",
            "category.required" => "Danh mục sản phẩm không được để trống",
            "category.integer" => "Bạn hãy chọn danh mục sản phẩm",
            "mota.required" => "Mô tả sản phẩm không được để trống",
            "beneficial.required" => "Lợi ích sản phẩm không được để trống",
            "User_manual.required" => "Hướng dẫn sử dụng sản phẩm không được để trống",
            "images.*.image" => "File phải là ảnh",
            "images.*.mimes" => "File phải có định dạng jpeg,png,jpg,gif,svg",
            "images.*.max" => "File phải nhỏ hơn 2048kb",



        ]);
        $product = Products::all()->where('id', $id)->first();
        if ($request->has('images')) {
            foreach ($request->file('images') as $image) {
                $fileName = time() . $image->getClientOriginalName();
                $path = $image->storeAs('images', $fileName, 'public');
                $photoUpload = '/storage/' . $path;
                $dataInsert = [
                    'products_id' => $product->id,
                    'image' => $photoUpload,
                    'updated_at' => date('Y-m-d H-i-s'),
                ];
                $this->imageSubProduct->updataSubProduct($dataInsert, $product);
            }
        }
        $dataInsert = [
            'code_product' => $request->code_product,
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'category_id' => $request->category,
            'supplier_id' => $request->supplier,
            'description' => $request->mota,
            'beneficial' => $request->beneficial,
            'User_manual' => $request->User_manual,
            'updated_at' => date('Y-m-d H-i-s'),
        ];
        $this->product->updataProduct($dataInsert, $id);
        $products = Products::all();
        $dataAdmin = array();
        return view('Frontend.Pages_Admin.data-product', compact('products', 'dataAdmin'))->with('success', 'Sửa sản phẩm thành công');
    }

    public function deleteImage($imageId)
    {
        $image = ImageSubProduct::find($imageId);

        if (!empty($image)) {
            // Delete the image file from the disk
            Storage::delete($image);

            // Delete the image record from the database
            $image->delete();

            return redirect()->back()->with('success', 'Image deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Image not found.');
        }
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

    // ===== CUSTOMER =================================================
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

        $oldCart = Session::get('orders');
        $cart = new Cart($oldCart);
        $carts = Cart::content();
        $categories = Categories::all();
        return view('Frontend.Pages.shop', compact('product', 'list_product', 'sortType', 'carts', 'categories'));
    }
    public function detailProduct(Request $request, $id)
    {
        $carts = Cart::content();
        
        $products = Products::all();
        $productId = Products::find($id);
        
        $imageSub = $productId->images;

        $categoryId = $productId->category_id;
        $categoryName = Categories::where('id', $categoryId)->get();

        $productCategoryList = Products::where('category_id', $categoryId)->get();

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
        return view('Frontend.Pages.detail-product', compact('carts','productDetail', 'products', 'categoryName','imageSub','productCategoryList'));
    }

    public function cart()
    {
        return view('Frontend.Pages.shop');
    }
}
