<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Admin;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthControllerUser extends Controller
{
    private $customer;

    public function __construct()
    {
        $this->customer = new Customer();
    }
    // ===== Đăng ký - Đăng nhập - Đăng xuất ---Khách Hàng 
    public function index()
    {
        $carts = Cart::content();

        return view('Frontend.Pages.login',compact('carts'));
    }

    public function regestration()
    {
        $carts = Cart::content();
        return view('Frontend.Pages.register',compact('carts'));
    }

    public function regesterUser(Request $request)
    {
        $request->validate([
            'name_custom' => 'required',
            'email_custom' => 'required|email|unique:customers,email',
            'pass_custom' => 'required | min: 5|max: 12',
            'phone_custom' => 'required | min: 10|max: 11',
            'address_custom' => 'required ',

        ]);

        $admin = new Customer();
        $admin->username = $request->name_custom;
        $admin->password = Hash::make($request->pass_custom);
        $admin->email = $request->email_custom;
        $admin->phone_number = $request->phone_custom;
        $admin->address = $request->address_custom;
        $res = $admin->save();

        if ($res) {
            return back()->with('success', 'Đăng ký thành công');
        } else {
            return back()->with('error', 'Đăng ký thất bại');
        }
    }
    public function login()
    {
        return view('Frontend.Pages.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required | min: 5|max: 12'
        ]);

        $customer = Customer::where('email', '=', $request->email)->first();
        if ($customer) {

            if (Hash::check($request->password, $customer->password)) {
                $request->session()->put('loginId_Customer', $customer->id);
                return redirect()->route('shop.tat-ca-san-pham');
            } else {
                return redirect()->back()->with('fail', 'Mật khẩu không trùng khớp');
            }
        } else {
            return back()->with('fail', 'Email chưa được đăng ký');
        }
    }
    public function dashboard()
    {
        $data = array();
        if (Session::has('loginId_Customer')) {
            $data = Customer::where('id', '=', Session::get('loginId_Customer'))->first();
        }
        return view('Frontend.Pages.dashboard', compact('data'));
    }
    public function logout()
    {
        if (Session::has('loginId_Customer')) {
            Session::pull('loginId_Customer');
            return redirect('authentication');
        }
    }



    // ===== Admin quản lý danh sách người dùng
    public function tableDataCustomer(){
        $customer = Customer::all();        
        $dataAdmin = array();
        if (Session::has('loginId')) {
            $dataAdmin = Admin::where('id', '=', Session::get('loginId'))->first();
        }
        return view('Frontend.Pages_Admin.data-customer', compact('customer', 'dataAdmin'));
    }
    public function deleteUser(Request $request, $id = 0)
    {
          $customer = Customer::all();

        if (!empty($id)) {
            $customerDetail =  $this->customer->getDetail($id);

            if (!empty($customerDetail[0])) {
                $deleteCustomer = $this->customer->deleteCustomer($id);
                if ($deleteCustomer) {
                    $success = "Xóa người dùng thàng công";
                } else {
                    $error = "Xóa người dùng thất bại";
                }
            } else {
                $error = "người dùng không tồn tại";
            }
        } else {
            $error = "Liên kết không tồn tại";
        }

        return back()->with(compact('success','error'));
    }

}
