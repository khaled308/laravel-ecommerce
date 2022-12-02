<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Varient extends Model
{
    use HasFactory;

    protected $table = 'variants';
    protected $fillable = ['product_id', 'price', 'discount', 'qty'];
    public $timestamps = false;
}