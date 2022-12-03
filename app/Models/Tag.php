<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Tag extends Model
{
    use HasFactory, HasTranslations;
    public $timestamps = false;
    protected $fillable = ['name'];
    public $translatable = ['name'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_tag', 'tag_id', 'product_id');
    }
}