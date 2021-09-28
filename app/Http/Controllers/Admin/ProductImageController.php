<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    public function delete($image){


        if (Storage::disk('products')->exists($image)){
            Storage::disk('products')->delete($image);
        }

        $productImage = ProductImage::where('image', $image);
        $productImage->delete();

        flash('Foto removida com sucesso')->success();
        return redirect()->back();

    }
}
