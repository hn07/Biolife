<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Categorynews extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'name_category',
        'desc_category',
        'created_at',
        'updated_at',
    ];
    function pages (){
        return $this->hasMany(News::class);
    }
}
