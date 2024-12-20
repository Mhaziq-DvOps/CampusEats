<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = 'product';
    
    // Cast the column as Json in product model
    protected $casts = [
        'features' => 'json'
    ];

    // public function setFeaturesAttribute($value)
	// {
	//     $features = [];

	//     foreach ($value as $array_item) {
	//         if (!is_null($array_item['key'])) {
	//             $features[] = $array_item;
	//         }
	//     }

	//     $this->attributes['features'] = json_encode($features);
	// }

    protected $fillable = [
        'P_Id',
        'P_Name',
        'Cat_Id',
        'P_Price',
        'P_Disc_Price',
        'S_Description',
        'L_Description',
        'P_Duration',
        'P_Image',
        'P_Quantity',
        'P_Status',
        'features'
        // 'features.fry',
        // 'features.spicy',
        // 'features.grill',
        // 'features.healthy',
        // 'features.soup',
        // 'features.noodles',
        // 'features.rice',
        // 'features.chicken',
        // 'features.chilli',
        // 'features.seafood',
        // 'features.meat',
        // 'features.halal',
        // 'features.carbs',
        // 'features.fat',
        // 'features.fruit',
        // 'features.vegie'
    ];


    public function qty()
    {
        return $this->belongsTo(Product::class, 'P_Id', 'Pro_Id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    protected $primaryKey = 'P_Id';

    public function category()
    {
    	return $this->hasOne(Product_Category::class, 'P_Cat_Id', 'Cat_Id');
    }

}


