<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class Carts_DB extends Model
{
    protected $table = 'carts__d_b_s';

    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'qty',
        'price',
        'weight',
        'image',
        'user_id',
    ];
}
