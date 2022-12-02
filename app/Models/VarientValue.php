<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VarientValue extends Model
{
    use HasFactory;

    protected $table = 'variants_values';
    protected $fillable = ['variant_id', 'option_value_id'];
    public $timestamps = false;
}