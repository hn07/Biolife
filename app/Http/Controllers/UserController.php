<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Rule;


class UserController extends Controller
{
    private $users;
    public function __construct()
    {
        $this->users = new Users();
    }
    public function index()
    {
        $title = "Danh sach nguoi dung";
        $list_users = $this->users->getAllUser();
        return view('Frontend.Pages.testListUser', compact('title', 'list_users'));
    }

    public function add()
    {
        $title = 'Day la mau add form';
        return view('Frontend.Pages.add', compact('title'));
    }
    public function post_add(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'email' => 'required|email|unique:users,email',

        ], [
            'name.required' => 'Bạn chưa nhập tên',
            'name.min' => 'Tên phải từ 3 đến 100 ký tự',
            'name.max' => 'Tên phải từ 3 đến 100 ký tự',

            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Bạn chưa nhập đúng định dạng email',
            'email.unique' => 'Email đã tồn tại',

        ]);
        $dataInsert = [
            $request->name,
            $request->email,
            date('Y-m-d H-i-s')
        ];
        $this->users->addUser($dataInsert);
        return redirect()->route('users.index')->with('msg','Thêm người dùng thành công');
    }
    public function get_edit(Request $request, $id=0)
    {
        $title = 'Cập nhật người dùng';
        if (!empty($id)) {
            $userDetail =  $this->users->getDetail($id);

            if (!empty($userDetail[0])) {
                $request->session()->put('id',$id);
                $userDetail = $userDetail[0];

            } else {
                return redirect()->route('users.index')->with('msg', 'Người dùng không tồn tại');

            }
        } else {
            return redirect()->route('users.index')->with('msg', 'Đường link không tồn tại');
        }

        return view('Frontend.Pages.edit', compact('title', 'userDetail'));
    }

    public function post_edit(Request $request)
    {
        $id = session('id');
        if(empty($id)){
            return back()->with('msg','liên kết không tồn tại');
        }
        $request->validate([
            'name' => 'required|min:3|max:100',
            'email' => 'required|email|unique:users,email'
           

        ], [
            'name.required' => 'Bạn chưa nhập tên',
            'name.min' => 'Tên phải từ 3 đến 100 ký tự',
            'name.max' => 'Tên phải từ 3 đến 100 ký tự',

            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Bạn chưa nhập đúng định dạng email',
            'email.unique' => 'Email đã tồn tại',
           
        ]);
        $dataupdate = [
            $request->name,
            $request->email,
            date('Y-m-d H-i-s')
        ];
        $this->users->updataUser($dataupdate, $id);
        return back()->with('msg','cập nhật người dùng thành công');
      
    }

    public function delete(Request $request, $id=0)
    {
      
        if (!empty($id)) {
            $userDetail =  $this->users->getDetail($id);

            if (!empty($userDetail[0])) {
                $deleteStatus = $this->users->deleteUser($id);
                if($deleteStatus){
                    $msg = "Xóa người dùng thàng công";
                }else{
                    $msg = "Xóa người dùng thất bại";
                }

            } else {
                $msg = "Người dùng không tồn tại";
            }
        } else {
            $msg = "Liên kết không tồn tại";
        }
        
    
        return back()->with('msg',$msg);
      
    }


    public function about()
    {
        return view('Frontend.Pages.about-us');
    }

    public function shop()
    {
        return view('Frontend.Pages.shop');
    }
    public function detail_product()
    {
        return view('Frontend.Pages.detail-product');
    }

    public function blog()
    {
        return view('Frontend.Pages.blog');
    }
    public function blog_post()
    {
        return view('Frontend.Pages.blog-post');
    }
    public function contact()
    {
        // $users = DB::select('SELECT * FROM tbl_users WHERE name_user =:name_user',['name_user' =>'THANH DŨNG']);
        $users = DB::table('tbl_users')->distinct()->get();

        return view('Frontend.Pages.contact');
    }
    public function login()
    {
        return view('Frontend.Pages.login');
    }
    public function register()
    {
        return view('Frontend.Pages.register');
    }
    public function shopping_cart()
    {
        return view('Frontend.Pages.shopping-cart');
    }
    public function checkout()
    {
        return view('Frontend.Pages.checkout');
    }
}
