<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;


class Categories extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'name_category',
        'desc_category',
        'created_at',
        'updated_at',
    ];
    function pages (){
        return $this->hasMany(Products::class);
    }
    protected $table = 'categories';

    public function getAll(){
        $category = DB::table($this->table)
        ->orderBy('created_at','desc')
        ->get();
        return $category;
    }
    public function deleteCategory($id)
    {
        $category = DB::table($this->table)->where('id', '=', $id)->delete();
        return $category;
    }
    public function getDetail($id)
    {
        $getDetail = DB::table($this->table)
            ->where('id', $id)
            ->get();
        return $getDetail;
    }
}
