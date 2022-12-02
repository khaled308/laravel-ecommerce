<?php

namespace App\Traits;

use Intervention\Image\Facades\Image;

trait File
{
  public function uploadImage($image, $folder)
  {
    $file_name = uniqid() . '-' . $image->getClientOriginalName();

    Image::make($image)->resize(300, 300)->save('uploads/' . $folder . '/' . $file_name);

    return $file_name;
  }

  public function deleteFile($path)
  {
    unlink(public_path('uploads/' . $path));
  }
}