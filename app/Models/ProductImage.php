<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $table = 'productimages';
    protected $fillable = [
        'id',
        "name",
        "id_product",
        "created_at",
        "updated_at",

     

    ]; 
}
