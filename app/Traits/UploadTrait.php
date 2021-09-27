<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait UploadTrait
{
    private function imageUpload(Request $request, $imageCollum = null){
        $images = $request->file('images');
        dd($images);
        $uploadImages = [];

        if(is_array($images)){
            foreach ($images as $image){
                array_push($uploadImages, [$imageCollum => $image->store('products', 'public')]);
            }
        }else{
            $uploadImages = $images->store('logo','public');
        }

        return $uploadImages;
    }
}
