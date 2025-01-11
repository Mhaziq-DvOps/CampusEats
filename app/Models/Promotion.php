<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    public $table = 'promotion';
    protected $primaryKey = 'Promotion_Id';
    protected $fillable = [
        'Promotion_Id', 'Promo_Name', 'Promo_Descr', 'Promo_Discount','Promo_Status','Promo_Start','Promo_End','Promo_Image','Manager_id', 'created_at', 'updated_at'
    ];

    
}
