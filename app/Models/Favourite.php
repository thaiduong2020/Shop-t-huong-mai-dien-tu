<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;
    protected $table = "favourite";
    protected $fillable = [
        'id',
        'product_id',
        'user_id',
        'created_at',
        'updated_at'
    ];
}
