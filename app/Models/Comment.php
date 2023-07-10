<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'comments';
    protected $fillable = [
        'news_id',
        'customer_id',
        'content',
        'reply_id',
        'status',
        'create_at',
        'updated_at',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function cus()
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'reply_id', 'id');
    }
    public function news()
    {
        return $this->belongsTo(News::class, 'news_id', 'id');
    }
    public function getComment($id)
    {
        $comment = DB::table('comments')
            ->join('customers', 'comments.customer_id', '=', 'customers.id')
            ->select('comments.*', 'customers.username')
            ->where('news_id', $id)
            ->where('reply_id', 0)
            ->orderBy('comments.id', 'DESC')
            ->get();
        return $comment;
    }
    public function getReply($id)
    {
        $reply = DB::table('comments')
            ->join('customers', 'comments.customer_id', '=', 'customers.id')
            ->select('comments.*', 'customers.name')
            ->where('reply_id', $id)
            ->orderBy('comments.id', 'DESC')
            ->get();
        return $reply;
    }
    
}
