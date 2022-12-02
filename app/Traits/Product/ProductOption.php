<?php

namespace App\Traits\Product;

use App\Models\Option;
use App\Models\OptionValue;
use App\Models\VarientValue;

trait ProductOption
{
  function addOption(string $option, array $values, int $varient_id = 0)
  {
    $option = Option::where('name', $option)->get()->first();

    foreach ($values as $value) {
      $value_exist = OptionValue::where('value_name', $value)->where('option_id', $option->id)->get()->first();

      if (!$value_exist) {
        $option_value = OptionValue::create([
          'option_id' => $option->id,
          'value_name' => $value
        ]);

        $this->addProductVariedOption($option_value->id, $varient_id);
      }
    }

    return $option->id;
  }

  function addProductVariedOption(int $option_value_id, $varient_id)
  {
    VarientValue::create([
      'option_value_id' => $option_value_id,
      'variant_id' => $varient_id
    ]);
  }
}