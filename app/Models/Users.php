<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Users extends Model
{
    use HasFactory;
    
    public function getAllUser(){
        $users = DB::select('SELECT * FROM tbl_users');
        return $users;
    }
}
