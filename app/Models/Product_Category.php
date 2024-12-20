<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Product_Category extends Model
{
    use HasFactory;
    public $table = 'product_category';

    protected $fillable = [
        'P_Cat_Id','P_Cat_Name'
    ];
    
    protected $primaryKey = 'P_Cat_Id';

    // public function products()
    // {
    //     return $this->hasMany(Product::class);
    // }
}
