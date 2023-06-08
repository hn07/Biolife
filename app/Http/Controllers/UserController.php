<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;



class UserController extends Controller
{
    private $users;
    const _PER_PAGE = 3;
    public function __construct()
    {
        $this->users = new Users();
    }
    public function index(Request $request)
    {
        $title = "Danh sach nguoi dung";
        $filters = [];
        $keyWords = null;

        //Xử lý logic filter
        if (!empty($request->status)) {
            $status = $request->status;
            if ($status == 'active') {
                $status = 1;
            } else {
                $status = 0;
            }
            $filters[] = ['users.status', '=', $status];
        }

        if (!empty($request->group_id)) {
            $groupId = $request->group_id;

            $filters[] = ['users.group_id', '=', $groupId];
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

        $list_users = $this->users->getAllUser($filters, $keyWords, $sort_Array, self::_PER_PAGE);
        return view('Frontend.Pages.testListUser', compact('title', 'list_users', 'sortType'));
    }


    public function add()
    {
        $title = 'Day la mau add form';
        $allGroups = getAllGroup();
        return view('Frontend.Pages.add', compact('title', 'allGroups'));
    }

    //request sử dụng model Requests
    public function post_add(UserRequest $request)
    {
        $dataInsert = [
            'name' => $request->name,
            'email' => $request->email,
            'group_id' => $request->group_id,
            'status' => $request->status,
            'create_at'=> date('Y-m-d H-i-s'),
        ];

        $this->users->addUser($dataInsert);
        return redirect()->route('users.index')->with('msg', 'Thêm người dùng thành công');
    }
    public function get_edit(Request $request, $id = 0)
    {
        $title = 'Cập nhật người dùng';
        if (!empty($id)) {
            $userDetail =  $this->users->getDetail($id);

            if (!empty($userDetail[0])) {
                $request->session()->put('id', $id);
                $userDetail = $userDetail[0];
            } else {
                return redirect()->route('users.index')->with('msg', 'Người dùng không tồn tại');
            }
        } else {
            return redirect()->route('users.index')->with('msg', 'Đường link không tồn tại');
        }
        $allGroups = getAllGroup();
        return view('Frontend.Pages.edit', compact('title', 'userDetail','allGroups'));
    }

    //request bình thường 
    public function post_edit(Request $request)
    {
        $id = session('id');
        if (empty($id)) {
            return back()->with('msg', 'liên kết không tồn tại');
        }
        $request->validate([
            'name' => 'required|min:3|max:100',
            'email' => 'required|email',
            'group_id' => ['required', 'integer', function ( $value, $false) {
                if ($value == 0) {
                    $false('bắt buộc phải chọn nhóm');
                }
            }],
            'status' => 'required|integer'
        ], [
            'name.required' => 'Bạn chưa nhập tên',
            'name.min' => 'Tên phải từ 3 đến 100 ký tự',
            'name.max' => 'Tên phải từ 3 đến 100 ký tự',

            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Bạn chưa nhập đúng định dạng email',
            'email.unique' => 'Email đã tồn tại',
            'group_id.required' => 'Nhóm không được để trống',
            'group_id.integer' => 'Nhóm không hợp lệ',
            'status.required' => 'Trạng thái không được để trống',
            'status.integer' => 'Trạng không hợp lệ'

        ]);
        $dataInsert = [
            'name' => $request->name,
            // 'email' => $request->email,
            'group_id' => $request->group_id,
            'status' => $request->status,
            'update_at'=> date('Y-m-d H-i-s'),
        ];
        $this->users->updataUser($dataInsert, $id);
        return back()->with('msg', 'cập nhật người dùng thành công');
    }

    public function delete(Request $request, $id = 0)
    {

        if (!empty($id)) {
            $userDetail =  $this->users->getDetail($id);

            if (!empty($userDetail[0])) {
                $deleteStatus = $this->users->deleteUser($id);
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
        $users = DB::table('users')->distinct()->get();

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
