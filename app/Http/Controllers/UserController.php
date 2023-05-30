<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;


class UserController extends Controller
{
    private $users;
    public function __construct(){
        $this->users = new Users();
    }
    public function index(){
        $title = "Danh sach nguoi dung";
        $list_users = $this->users->getAllUser();
        return view('Frontend.Pages.testListUser',compact('title', 'list_users'));
    }
   
    public function add(){
        $title = 'Day la mau add form';
        return view('Frontend.Pages.add',compact('title'));
    }
   
}
