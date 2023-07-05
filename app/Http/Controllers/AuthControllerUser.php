<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Admin;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AuthControllerUser extends Controller
{
    private $customer;

    public function __construct()
    {
        $this->customer = new Customer();
    }

    // DEMO
    public function dashboard()
    {
        $data = array();
        if (Session::has('loginId_Customer')) {
            $data = Customer::where('id', '=', Session::get('loginId_Customer'))->first();
        }
        return view('Frontend.Pages.dashboard', compact('data'));
    }
    // ===== Đăng ký - Đăng nhập - Đăng xuất ---Khách Hàng 
    public function index()
    {
        $carts = Cart::content();

        return view('Frontend.Pages.login', compact('carts'));
    }

    //===== Đăng ký
    public function regestration()
    {
        $carts = Cart::content();
        return view('Frontend.Pages.register', compact('carts'));
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

    //===== Đăng nhập
    public function login()
    {
        return view('Frontend.Pages.login');
    }

    public function loginPost(Request $request)
{
    $request->validate(
        [
            'email' => 'required|email',
            'password' => 'required | min: 5|max: 12'
        ],
        [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải có ít nhất 5 ký tự',
            'password.max' => 'Mật khẩu không được quá 12 ký tự',
        ]
    );

    $customer = Customer::where('email', '=', $request->email)->first();

    if ($customer) {

        if (Hash::check($request->password, $customer->password)) {
            $request->session()->put('loginId_Customer', $customer->id);
            return redirect()->route('index')->with('success', 'Đăng nhập thành công');
        } else {
            return redirect()->back()->with('error', 'Mật khẩu không trùng khớp');
        }
    } else {
        return redirect()->back()->with('error', 'Email chưa được đăng ký');
    }
}


    //===== Đăng xuất
    public function logout()
    {
        if (Session::has('loginId_Customer')) {
            Session::pull('loginId_Customer');
            Cart::destroy();
            return redirect('authentication');
        }
    }
    //===== Cập nhật thông tin
    public function updateCustomer()
    {
        $data = array();
        if (Session::has('loginId_Customer')) {
            $data = Customer::where('id', '=', Session::get('loginId_Customer'))->first();
        }
        return view('Frontend.Pages.profile', compact('data'));
    }

    //===== quên mật khẩu
    public function forgotPassword()
    {
        return view('Frontend.Pages.forget-password');
    }
    public function forgotPasswordPost(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email|exists:customers,email',
            ],
            [
                'email.required' => 'Email không được để trống',
                'email.email' => 'Email không đúng định dạng',
                'email.exists' => 'Email không tồn tại',
            ]
        );
        $token = strtoupper(Str::random(10));
        $customer = Customer::where('email', '=', $request->email)->first();
        $customer = $customer->update(['token' => $token]);
        $customer = Customer::where('email', '=', $request->email)->first();

        //gửi mail
        $subject = 'Biolife - Lấy lại mật khẩu';
        $this->sendEmail($subject, $customer);
        return view('Frontend.Pages.login')->with('success', 'Vui lòng kiểm tra lại email của bạn để lấy lại mật khẩu');
    }
    public function sendEmail($subject, $customer)
    {
        $email_to = $customer->email;
        $data = [
            'subject' => $subject,
            'customer' => $customer,
        ];

        Mail::send('Frontend.Pages.check-mail-forget', $data, function ($message) use ($email_to, $subject) {
            $message->from('nguyennham2580@gmail.com', 'Biolife');
            $message->to($email_to);
            $message->subject($subject);
        });
    }

    public function getPassword(Customer $customer, $token)
    {
        $customer = Customer::where('token', '=', $token)->first();
        if ($customer) {
            return view('Frontend.Pages.reset-password', compact('customer'));
        } else {
            return redirect()->route('authentication.index')->with('error', 'Đường dẫn không tồn tại');
        }
    }

    public function getPasswordPost(Request $request, $token)
    {
        $request->validate(
            [
                'password' => 'required | min: 5|max: 12',
                'confirm_password' => 'required | min: 5|max: 12|same:password',
            ],
            [
                'password.required' => 'Mật khẩu không được để trống',
                'password.min' => 'Mật khẩu phải có ít nhất 5 ký tự',
                'password.max' => 'Mật khẩu không được quá 12 ký tự',
                'confirm_password.required' => 'Mật khẩu không được để trống',
                'confirm_password.min' => 'Mật khẩu phải có ít nhất 5 ký tự',
                'confirm_password.max' => 'Mật khẩu không được quá 12 ký tự',
                'confirm_password.same' => 'Mật khẩu không trùng khớp',
            ]
        );
        $customer = Customer::find($token);
        $customer->password = Hash::make($request->password);
        $customer->token = '';
        $customer->save();
        return redirect()->route('authentication.index')->with('success', 'Đổi mật khẩu thành công');
    }


    // ===== Đổi mật khẩu
    public function changePassword()
    {
        $data = array();
        if (Session::has('loginId_Customer')) {
            $data = Customer::where('id', '=', Session::get('loginId_Customer'))->first();
        }
        return view('Frontend.Pages.change-password', compact('data'));
    }

    public function changePasswordPost(Request $request)
    {
        $request->validate(
            [
                'passwordold' => 'required | min: 5|max: 12',
                'passwordnew' => 'required | min: 5|max: 12',
                'passwordnew_confirmation' => 'required | min: 5|max: 12|same:passwordnew',
            ],
            [
                'passwordold.required' => 'Mật khẩu không được để trống',
                'passwordold.min' => 'Mật khẩu phải có ít nhất 5 ký tự',
                'passwordold.max' => 'Mật khẩu không được quá 12 ký tự',
                'passwordnew.required' => 'Mật khẩu không được để trống',
                'passwordnew.min' => 'Mật khẩu phải có ít nhất 5 ký tự',
                'passwordnew.max' => 'Mật khẩu không được quá 12 ký tự',
                'passwordnew_confirmation.required' => 'Mật khẩu không được để trống',
                'passwordnew_confirmation.min' => 'Mật khẩu phải có ít nhất 5 ký tự',
                'passwordnew_confirmation.max' => 'Mật khẩu không được quá 12 ký tự',
                'passwordnew_confirmation.same' => 'Mật khẩu không trùng khớp',

            ]
        );

        $customer = Customer::where('id', '=', Session::get('loginId_Customer'))->first();
        if (Hash::check($request->passwordold, $customer->password)) {
            $customer->password = Hash::make($request->passwordnew);
            $customer->save();
            // Đăng xuất
            Session::forget('loginId_Customer');
            return redirect()->route('authentication.index')->with('success', 'Đổi mật khẩu thành công');
        } else {
            return redirect()->back()->with('error', 'Trùng mật khẩu cũ');
        }
    }






    // -----------------END KHÁCH HÀNG-----------------
    // ===== Admin quản lý danh sách người dùng
    public function tableDataCustomer()
    {
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

        return back()->with(compact('success', 'error'));
    }
}
