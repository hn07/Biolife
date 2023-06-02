<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Users extends Model
{
    use HasFactory;
    protected $table = 'users';
    public function getAllUser(){
        // $users = DB::select('SELECT * FROM users');
        $users = DB::table($this->table)
        ->orderBy('id_user','desc')
        ->get();
        return $users;
    }
 

    public function addUser($data){
        DB::insert('INSERT INTO  users (name, email, create_at) VALUES (?, ?, ?)', $data);
      
    }

    public function getDetail($id){
       $getDetail = DB::table($this->table)
       ->where('id_user', $id)
       ->get();
       return $getDetail;
    }
    
    public function updataUser($data, $id){
        $data_user = array_merge($data,[$id]);
        
        return DB::update('UPDATE '.$this->table.' SET name= ?, email= ?, update_at = ? WHERE id_user = ?',$data_user);
        
       
    }
    public function deleteUser($id){
        $data_user = array_merge([$id]);

        // $delUser = DB::table($this->table)
        // ->where('id_user', $data_user)
        // ->delete();
        $delUser = DB::table('users')->where('id_user', '=', $id)->delete();
        return $delUser;
    }
   

}
