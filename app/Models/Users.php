<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Users extends Model
{
    use HasFactory;
    protected $table = 'users';
    public function getAllUser($filters = [],  $keyWords = null,  $sortArray = null, $perPage = null)
    {
        // $users = DB::select('SELECT * FROM users');
        $users = DB::table($this->table)
            ->select('users.*', 'groups.name as group_name')
            ->join('groups', 'users.group_id', '=', 'groups.id');

        $order_By = 'users.id_user';
        $order_Type = 'desc';

        if (!empty($sortArray) && isset($sortArray)) {
            if (!empty($sortArray['sortBy']) && !empty($sortArray['sortType'])) {
                $order_By = trim($sortArray['sortBy']);
                $order_Type = trim($sortArray['sortType']);
            }
        }

        $users = $users->orderBy($order_By, $order_Type);

        if (!empty($filters)) {
            $users = $users->where($filters);
        }

        if (!empty($keyWords)) {
            $users = $users->where('users.name', 'like', '%' . $keyWords . '%')
                ->orWhere('users.email', 'like', '%' . $keyWords . '%');
        }

        if (!empty($perPage)) {
            $users = $users->paginate($perPage);
        } else {
            $users = $users->get();
        }
        return $users->withQueryString();
    }


    public function addUser($data)
    {
        // DB::insert('INSERT INTO  users (name, email, create_at) VALUES (?, ?, ?)', $data);
        return DB::table($this->table)->insert($data);
    }

    public function getDetail($id)
    {
        $getDetail = DB::table($this->table)
            ->where('id_user', $id)
            ->get();
        return $getDetail;
    }

    public function updataUser($data, $id)
    {
        return DB::table($this->table)->where('id_user', $id)->update($data);
    }
    public function deleteUser($id)
    {
        $delUser = DB::table('users')->where('id_user', '=', $id)->delete();
        return $delUser;
    }
}
