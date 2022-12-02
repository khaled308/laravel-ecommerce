<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $table = 'options';
    protected $fillable = ['name'];
    public $timestamps = false;

    function optionValues()
    {
        return $this->hasMany(OptionValue::class, 'option_id');
    }
}