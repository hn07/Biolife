<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AdminController extends Controller
{
    public function index()
    {
        $dataAdmin = array();
        if (Session::has('loginId')) {
            $dataAdmin = Admin::where('id', '=', Session::get('loginId'))->first();
        }
        return view('Frontend.Pages_Admin.index', compact('dataAdmin'));
    }

    // ===== Đăng ký
    public function regestration()
    {
        return view('Frontend.Pages_Admin.regest_Admin');
    }

    public function regesterUser(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required | min: 5|max: 12'
        ]);

        $admin = new Admin();
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $res = $admin->save();

        if ($res) {
            return back()->with('success', 'Đăng ký thành công');
        } else {
            return back()->with('error', 'Đăng ký thất bại');
        }
    }

    // ===== Đăng nhập
    public function login()
    {
        return view('Frontend.Pages_Admin.login_Admin');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required | min: 5|max: 12'
        ]);

        $admin = Admin::where('email', '=', $request->email)->first();
        if ($admin) {

            if (Hash::check($request->password, $admin->password)) {
                $request->session()->put('loginId', $admin->id);
                return redirect()->route('admin.trang-chu');
                
            } else {
                return redirect()->back()->with('fail', 'Mật khẩu không trùng khớp');
            }
        } else {
            return back()->with('fail', 'Email chưa được đăng ký');
        }
    }

    // ===== Đăng xuất
    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('admin/login');
        }
    }

    // ===== Trang quản lý.
    public function dashboard()
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = Admin::where('id', '=', Session::get('loginId'))->first();
        }
        return view('Frontend.Pages_Admin.dashboard',compact('data'));
    }

    public function table_data_product(){
        return view('Frontend.Pages_Admin.data-product');
    }
    public function form_add_san_pham(){
        return view('Frontend.Pages_Admin.form-add-san-pham');
    }
}
