<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthControllerUser extends Controller
{
    public function index()
    {
        return view('Frontend.Pages.login');
    }

    public function regestration()
    {
        return view('Frontend.Pages.register');
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
                $request->session()->put('loginId', $customer->id);
                return redirect()->route('authentication.dashboard');
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
        if (Session::has('loginId')) {
            $data = Customer::where('id', '=', Session::get('loginId'))->first();
        }
        return view('Frontend.Pages.dashboard', compact('data'));
    }
    public function logout()
    {
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return redirect('authentication');
        }
    }
}
