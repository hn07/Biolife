<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    protected $table = 'products';
    protected $guarded = [];

    use HasApiTokens, HasFactory, Notifiable;

    // protected $table = 'products';
    // protected $primaryKey = 'id';
    protected $fillable = [
        'code_product',
        'name',
        'quantity',
        'description',
        'beneficial',
        'User_manual',
        'price',
        'image',
        'category_id',
        'supplier_id',
        'created_at',
        'updated_at',
    ];

    public function scopeSearch($query){
        if(request('key')){
            $key = request('key');
            $query = $query->where('name','like','%'.$key.'%');
            
        }
        if(request('cart_id')){
            $query = $query->where('id',request('cart_id'));
        }
    }
    function category()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
        //foreign_key //local_key
    }
    function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
        //foreign_key //local_key
    }

    //lay ra anh cua san pham
    public function images()
    {
        return $this->hasMany(ImageSubProduct::class);
    }

    //lay ra chi tiet san pham
    public function getDetail($id)
    {
        $getDetail = DB::table($this->table)
            ->where('id', $id)
            ->get();
        return $getDetail;
    }

    //update san pham
    public function updataProduct($data, $id)
    {
        return DB::table($this->table)->where('id', $id)->update($data);
    }

    //xoa san pham
    public function deleteProduct($id)
    {
        $delUser = DB::table('products')->where('id', '=', $id)->delete();
        return $delUser;
    }
    public function deleteAllProduct()
    {
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
