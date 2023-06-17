<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    protected $table = 'news';
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'code_news',
        'titel',
        'author',
        'status',
        'category_news',
        'image_news',
        'quote',       
        'content',       
        'category_product',
        'created_at',
        'updated_at',
    ];
    public function getDetail($id)
    {
        $getDetail = DB::table($this->table)
            ->where('id', $id)
            ->get();
        return $getDetail;
    }
    function categoryNews()
    {
        return $this->belongsTo(Categorynews::class, 'category_news', 'id');
        //foreign_key //local_key
    }
    public function delete_all_news(){
        $deleted = DB::table('news')->delete();
        return $deleted;
    }
}
