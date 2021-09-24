<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    public function delete(Request $request){

        $imgName = $request->input('image');

        if (Storage::disk('public')->exists($imgName)){
            Storage::disk('public')->delete($imgName);
        }

        $productImage = ProductImage::where('image', $imgName);
        $productImage->delete();

        flash('Foto removida com sucesso')->success();
        return redirect()->back();

    }
}
