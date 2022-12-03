<?php

namespace App\Traits\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait ProductData
{

  function saveData(Request $request, Product $product)
  {
    if ($request->tags_en) {
      $tags_en = explode(',', $request->tags_en);
      $tags_ar = explode(',', $request->tags_ar);
      $this->addTags($tags_en, $tags_ar, $product);
    } else {
      $this->addTags([], [], $product);
    }

    $variant_id = $this->updateVariant($product->id, [
      'price' => $request->price,
      'discount' => $request->discount,
      'qty' => $request->qty
    ]);

    $this->updateImages($request, $product);
    $this->updateOption($request, $variant_id);

    $product->name = ['ar' => $request->name_ar, 'en' => $request->name_en];
    $product->short_description = ['ar' => $request->short_description_ar, 'en' => $request->short_description_en];
    $product->long_description = ['ar' => $request->long_description_ar, 'en' => $request->long_description_en];
    $product->slug = Str::slug($request->name_en);
    $product->category_id = $request->category_id;
    $product->brand_id = $request->brand_id;

    $product->save();
  }

  private function updateOption($request, $variant_id)
  {
    if ($request->size) {
      $this->updateProductOption('size', explode(',', $request->size), $variant_id);
    } else {
      $this->updateProductOption('size', [], $variant_id);
    }

    if ($request->color) {
      $this->updateProductOption('color', explode(',', $request->color), $variant_id);
    } else {
      $this->updateProductOption('color', [], $variant_id);
    }
  }

  private function updateImages(Request $request, Product $product)
  {
    if ($request->cover_image) {
      if ($product->cover_image)
        $this->deleteFile('products/' . $product->cover_image);

      $product->cover_image = $this->uploadImage($request->cover_image, 'products');
    }
  }
}