<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ImageSubProduct extends Model
{
    protected $table = 'image_sub_products';
    use HasFactory;
    protected $guarded = [];

    public function updataSubProduct($data, $id)
    {
        return DB::table($this->table)->where('products_id', $id)->updateOrInsert($data);
    }
}
