<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use function Illuminate\Foundation\Configuration\redirectUsersTo;

class Product extends Model
{
    use HasFactory;
    private static $product, $image, $imageUrl, $directory, $imageName, $extension;

    public static function saveProduct($request){
        self::$product = new Product();

        self::$product->category_id     = $request->category_id;
        self::$product->subCategory_id  = $request->subCategory_id;
        self::$product->brand_id        = $request->brand_id;
        self::$product->name            = $request->name;
        self::$product->image           = self::getImageUrl($request);
        self::$product->slug            = Str::slug($request->name);
        self::$product->code            = $request->code;
        self::$product->color           = $request->color;
        self::$product->size            = $request->size;
        self::$product->price           = $request->price;
        self::$product->qty             = $request->qty;
        self::$product->description     = $request->description;
       self::$product->save();
        return redirect()->route('product.index')->with('message','Product added Successfully');
    }

    public static function getImageUrl($request){
        self::$image    = $request->file('image');
        self::$extension= self::$image->getClientOriginalExtension();
        self::$imageName= rand(000,999).'.'.self::$extension;
        self::$directory= 'admin/image/product/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory, self::$imageName);
        return self::$imageUrl;
    }


    public static function statusUpdate($id){
        self::$product = Product::find($id);

        if(self::$product->status==1){
            self::$product->status=0;
        }
        else{
            self::$product->status=1;
        }
        self::$product->save();
    }

//    many to one with Product and Category
    public function category(){
       return $this->belongsTo(Category::class);
    }
}
