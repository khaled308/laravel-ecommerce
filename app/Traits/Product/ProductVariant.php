<?php

namespace App\Traits\Product;

use App\Models\Varient;
use App\Models\VarientValue;

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

  function updateVariant(int $product_id, array $data)
  {
    $varient  = Varient::where('product_id', $product_id)->get()->first();
    $varient->price = $data['price'];
    $varient->discount = $data['discount'];
    $varient->qty = $data['qty'];

    $varient->save();

    return $varient->id;
  }
}