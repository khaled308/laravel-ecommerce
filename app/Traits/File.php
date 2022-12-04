<?php

namespace App\Traits;

use Intervention\Image\Facades\Image;

trait File
{
  public function uploadImage($image, $folder, $dimensions = [300, 300])
  {
    $file_name = uniqid() . '-' . $image->getClientOriginalName();

    Image::make($image)->resize($dimensions[0], $dimensions[1])->save('uploads/' . $folder . '/' . $file_name);

    return $file_name;
  }

  public function deleteFile($path)
  {
    unlink(public_path('uploads/' . $path));
  }
}