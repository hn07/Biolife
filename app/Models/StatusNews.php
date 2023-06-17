<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
class StatusNews extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    // protected $table = 'products';
    // protected $primaryKey = 'id';
    protected $fillable = [
        'status_name',
        'desc_status',        
        'created_at',
        'updated_at',
    ];
}
