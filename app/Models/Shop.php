<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    public $table = 'shop';

    protected $fillable = [
        'Shop_Id', 'S_Category', 'S_Image', 'S_Table' , 'S_Banner' , 'S_Name', 'S_Description', 'Dine_In', 'Booking', 'Delivery', 'Pick_Up'
    ];

    protected $primaryKey = 'Shop_Id';
}
