<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = [
        "name",
        "id_category",
        "price",
        "image",
        "quantity",
        "description"

    ]; 

    public function categories(){ 
        return $this->belongsTo('App\Models\Categories','id_catagory','id');
    }
    public function brands(){ 
        return $this->belongsTo('App\Models\brand','id_brand','id');
    }
}
