<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOtherImage extends Model
{
    use HasFactory;
    private static $productOtherImage, $image, $extension, $imageName, $directory, $imageUrl;


    private static function getImageUrl($image){

        self::$extension= $image->getClientOriginalExtension();
        self::$imageName= rand(000,999).'.'.self::$extension;
        self::$directory= 'admin/image/productOtherImage/';
        self::$imageUrl = self::$directory.self::$imageName;
        $image->move(self::$directory, self::$imageName);
        return self::$imageUrl;
    }

    public static function saveProductOtherImage($images, $productId){

        foreach ($images as $image){
            self::$imageUrl = self::getImageUrl($image);

            self::$productOtherImage = New ProductOtherImage();
            self::$productOtherImage->product_id    = $productId;
            self::$productOtherImage->image         = self::$imageUrl;
            self::$productOtherImage->save();

        }
    }




}
