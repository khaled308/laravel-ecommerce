<?php

namespace App\Traits\Product;

use App\Models\Product;
use App\Models\ProductImage;

trait productImages
{
  function saveImages($images, Product $product)
  {
    foreach ($images as $img) {
      $img  = $this->uploadImage($img, 'products');

      ProductImage::create(['image' => $img, 'product_id' => $product->id]);
    }
  }
}