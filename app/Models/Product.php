<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =[
        'id',
        'cat_id',
        'sub_cat_id',
        'brand_id',
        'unit_id',
        'size_id',
        'color_id',
        'product_code',
        'product_name',
        'product_description',
        'product_price',
        'product_image',
        'product_status',
    ];

    public function category(){
        return $this->belongsTo(Category::class,'cat_id');
    }

    public function sub_category(){
        return $this->belongsTo(SubCategory::class,'sub_cat_id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }

    public function unit(){
        return $this->belongsTo(Unit::class,'unit_id');
    }

    public function size(){
        return $this->belongsTo(Size::class,'size_id');
    }

    public function color(){
        return $this->belongsTo(Color::class,'color_id');
    }

    public static function product_count_by_cat($catId){
        return $cat_p_count = Product::where('cat_id', $catId)
                        ->where('product_status', 1)
                        ->count();
    }

    public static function product_count_by_sub_cat($subCatId){
        return $sub_cat_p_count = Product::where('sub_cat_id', $subCatId)
                        ->where('product_status', 1)
                        ->count();
    }

    public static function product_count_by_brand($brandId){
        return $brand_p_count = Product::where('brand_id', $brandId)
                        ->where('product_status', 1)
                        ->count();
    }
}
