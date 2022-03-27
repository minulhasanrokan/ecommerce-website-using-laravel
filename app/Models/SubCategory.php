<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

       protected $fillable =[
        'id',
        'cat_id',
        'category_name',
        'category_description',
        'category_status',
    ]; 

    public function category(){
        return $this->belongsTo(Category::class,'cat_id');
    }
}

