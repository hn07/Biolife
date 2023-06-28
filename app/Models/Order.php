<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;



class Order extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'username',
        'userphone',
        'email_address',
        'city',
        'district',
        'wards',
        'address',
        'created_at',
        'updated_at',
    ];
}
