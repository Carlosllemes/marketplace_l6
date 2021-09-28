<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait UploadTrait
{
    private function imageUpload(Request $request, $imageCollum = null){
        $images = $request->file('images');
        $uploadImages = [];

        if(is_array($images)) {
            foreach ($images as $image) {
                $image->store('products', 'public');
                $uploadImages[] = [$imageCollum => $image->hashName()];
            }

        }

        return $uploadImages;
    }
}
