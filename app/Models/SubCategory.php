<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class SubCategory extends Model
{
    use HasFactory;
    private static $subCategory, $image, $imageName, $imageUrl, $directory, $extension;
    public static function saveSubCategory($request){
        self::$subCategory  = new SubCategory();
        self::$subCategory->name = $request->name;
        self::$subCategory->category_id = $request->category_id;
        self::$subCategory->image_path= self::getImageUrl($request);
        self::$subCategory->save();
    }
    public static function getImageUrl($request){
        self::$image    = $request->file('image');
        self::$extension= self::$image->getClientOriginalExtension();
        self::$imageName= rand(000,999).'.'.self::$extension;
        self::$directory= 'admin/image/Sub-Category/';
        self::$imageUrl= self::$directory.self::$imageName;
        self::$image->move(self::$directory, self::$imageName);
        return self::$imageUrl;

    }

    public static function statusUpdate($id){
        self::$subCategory  = SubCategory::find($id);

        if(self::$subCategory->status==1){
            self::$subCategory->status=0;
        }
        else
        {
            self::$subCategory->status=1;
        }
        self::$subCategory->save();
    }


    public static function updateSubCategory($request, $id){
        self::$subCategory = SubCategory::find($id);
        if($request->file('image')){
            if(file_exists(self::$subCategory->image_path)){
                unlink(self::$subCategory->image_path);
            }
            self::$imageUrl = self::getImageUrl($request);
            }
            else{
                self::$imageUrl = self::getImageUrl($request);

        }
        self::$subCategory->name = $request->name;
        self::$subCategory->category_id = $request->category_id;
        self::$subCategory->image_path= self::$imageUrl;
        self::$subCategory->save();

    }
    public static function deleteSubCategory($id){
       self::$subCategory= SubCategory::find($id);
       if (file_exists(self::$subCategory->image_path)){
           unlink(self::$subCategory->image_path);
       }
       self::$subCategory->delete();
    }

//    one to mane sub-category with category
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
