<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory;
    protected $table = "order_detail";
    public function product(){
        return $this->belongsTo('App\Product','id_product','id');
    }
    public function bills(){
        return $this->belongsTo('App\Order','id_order','id');
    }
}
