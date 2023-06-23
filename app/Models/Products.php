<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    protected $table = 'products';

    use HasApiTokens, HasFactory, Notifiable;

    // protected $table = 'products';
    // protected $primaryKey = 'id';
    protected $fillable = [
        'code_product',
        'name',
        'quantity',
        'description',
        'price',
        'image',
        'category_id',
        'created_at',
        'updated_at',
    ];

    function category()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
        //foreign_key //local_key
    }
    public function getDetail($id)
    {
        $getDetail = DB::table($this->table)
            ->where('id', $id)
            ->get();
        return $getDetail;
    }

    public function deleteProduct($id)
    {
        $delUser = DB::table('products')->where('id', '=', $id)->delete();
        return $delUser;
    }
    public function deleteAllProduct(){
        $deleted = DB::table('products')->delete();
        return $deleted;
    }



    public function getAllProduct($filters = [],  $keyWords = null,  $sortArray = null, $perPage = null)
    {
        $users = DB::table($this->table)
            ->select('products.*', 'categories.name_category as category_name')
            ->join('categories', 'products.category_id', '=', 'categories.id');

        $order_By = 'products.id';
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
            $users = $users->where('products.name', 'like', '%' . $keyWords . '%')
                ->orWhere('products.description', 'like', '%' . $keyWords . '%');
        }

        if (!empty($perPage)) {
            $users = $users->paginate($perPage);
        } else {
            $users = $users->get();
        }
        return $users->withQueryString();
    }
}


