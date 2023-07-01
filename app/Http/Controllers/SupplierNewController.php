<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SupplierNewController extends Controller
{
    private $supplier;
    public function __construct()
    {
        $this->supplier = new Supplier();
    }
    public function addSupplierPost(Request $request){

        $request->validate([
            'supplier' => 'required',
            'descSupplier' => 'required',
        ]);

        $supplier = new Supplier();
        $supplier->name_supplier = $request->supplier;
        $supplier->desc_supplier = $request->descSupplier;
        $supplier_done = $supplier->save();

        if($supplier_done){
            return redirect()->back()->with('success','Thêm nhà cung cấp thành công');
        }
        else {
            return redirect()->back()->with('error','Thêm nhà cung cấp thất bại');
        }
    }
    public function delete_supplier($id = 0)
    {
        if (!empty($id)) {
            $supplierDetail =  Supplier::where('id', '=', $id)->get();

            if (!empty($supplierDetail[0])) {
                $deleteSupplier = $this->supplier->delete_supplier($id);
                if ($deleteSupplier) {
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
}
