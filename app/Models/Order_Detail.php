<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class Order_Detail extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'total',
        'created_at',
        'updated_at',
    ];
}
