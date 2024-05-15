<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    private static $category, $image, $imageName, $imageUrl, $extension, $directory;
    public static function saveCategory($request){
        self::$category         = new Category();
        self::$category->name   = $request->name;
        self::$category->image  = self::getImageUrl($request);
        self::$category->save();
    }
    public static function getImageUrl($request){
        self::$image        = $request->file('image');
        self::$extension    = self::$image->getClientOriginalExtension();
        self::$imageName    = rand(000, 999).'.'.self::$extension;
        self::$directory    = 'admin/image/category/';
        self::$imageUrl     = self::$directory.self::$imageName;
        self::$image->move(self::$directory, self::$imageName);
        return self::$imageUrl;
    }

    public static function statusUpdate($id){

            self::$category = Category::find($id);

            if(self::$category->status==1){
                self::$category->status=0;
            }
            else{
                self::$category->status=1;
            }
            self::$category->save();
        }
    public static function updateCategory($request, $id){

        self::$category         = Category::find($id);

        if($request->file('image'))
        {
            if(file_exists(self::$category->image))
            {
                unlink(self::$category->image);
            }
            self::$imageUrl= self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$category->image;
        }

        self::$category->name   = $request->name;
        self::$category->image  = self::$imageUrl;
        self::$category->save();
    }

    public static function deleteCategory( $id){
        self::$category = Category::find($id);
        if(file_exists(self::$category->image)){
            unlink(self::$category->image);
        }
        self::$category->delete();
    }


}
