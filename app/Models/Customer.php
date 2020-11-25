<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';
    protected $fillable = [
        'id',
        'name',
        'gender',
        'email',
        'address',
        'phone',
        'created_at',
        'updated_at'
    ]; 
    protected $primaryKey = 'id';
    public function bills(){
        return $this->hasMany('App\Oder','id_customer','id');
    }
}
