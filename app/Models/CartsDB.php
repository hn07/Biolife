<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class CartsDB extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'carts_d_b_s';

  
   
    protected $fillable = [
        
    ];
}
