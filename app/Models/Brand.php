<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    private static $brand, $image, $imageUrl, $imageName, $directory, $extension;

    public static function saveBrand($request){
       self::$brand = new Brand();

       self::$brand->name = $request->name;
       self::$brand->image= self::getImageUrl($request);
       self::$brand->save();
    }
    public static function getImageUrl($request){
       self::$image     = $request->file('image');
       self::$extension = self::$image->getClientOriginalExtension();
       self::$imageName = rand(000,999).'.'.self::$extension;
       self::$directory = 'admin/image/brand/';
       self::$imageUrl  = self::$directory.self::$imageName;
       self::$image->move(self::$directory,self::$imageName);
       return self::$imageUrl;
    }

    public static function brandUpdate($request, $id){
        self::$brand = Brand::find($id);
        if($request->file('image')){
            if(file_exists(self::$brand->image)){
                unlink(self::$brand->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else{
            self::$imageUrl =  self::$brand->image;
        }
        self::$brand->name = $request->name;
        self::$brand->image= self::$imageUrl;
        self::$brand->save();


    }

    public static function destroyBrand($request, $id){
        self::$brand    = Brand::find($id);
        if($request->file('image')){
            if (file_exists()){
                unlink(self::$imageUrl);
            }
        }
        self::$brand->delete();
    }
    public static function statusUpdate($id){
        self::$brand= Brand::find($id);

        if(self::$brand->status==1){
            self::$brand->status=0;
        }
        else{
            self::$brand->status=1;
        }
        self::$brand->save();
    }

}
