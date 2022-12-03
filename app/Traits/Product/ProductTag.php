<?php

namespace App\Traits\Product;

use App\Models\Product;
use App\Models\Tag;

trait ProductTag
{
  function addTags(array $en_tags, array $ar_tags, Product $product)
  {
    $tag_ids = [];

    for ($i = 0; $i < count($en_tags) && $i < count($ar_tags); $i++) {
      $tag = Tag::where('name->en', $en_tags[$i])->first();

      if (!$tag) {
        $tag = Tag::create([
          'name' => ['ar' => $ar_tags[$i], 'en' => $en_tags[$i]]
        ]);
      }
      $tag_ids[] = $tag->id;
    }

    $product->tags()->sync($tag_ids);
  }
}