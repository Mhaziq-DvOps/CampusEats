<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop_Category extends Model
{
    use HasFactory;
    public $table = 'shop_category';

    protected $fillable = [
        'S_Cat_Name', 'S_Cat_Slug'
    ];
    
    protected $primaryKey = 'S_Cat_Name';

}
