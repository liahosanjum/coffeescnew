<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table   = 'products';

    protected $fillable = [
        'name','sku' , 'description', 'image' , 'status'
    ];

    public function getProductList()
    {
        // return $productListAll = Product::where('status','Active')->get();
        return $productListAll = Product::all();
    }


    public function getALLProducts(){
        
    }


}
