<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class Supplier extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'suppliers';

    function pages (){
        return $this->hasMany(Products::class);
    }
    
    protected $fillable = [
        'name_supplier',
        'desc_supplier',
        'created_at',
        'updated_at',
    ];
    public function delete_supplier($id)
    {
        $supplier = DB::table($this->table)->where('id', '=', $id)->delete();
        return $supplier;
    }
}
