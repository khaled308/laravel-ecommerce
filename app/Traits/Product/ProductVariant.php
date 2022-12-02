<?php

namespace App\Traits\Product;

use App\Models\Varient;

trait ProductVariant
{
  function addVariant($data)
  {
    $varient = Varient::create([
      'product_id' => $data['product_id'],
      'price' => $data['price'],
      'discount' => $data['discount'],
      'qty' => $data['qty']
    ]);

    return $varient->id;
  }
}