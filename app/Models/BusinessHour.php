<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessHour extends Model
{
    use HasFactory;
    public $table = 'shop_business_hour';


    protected $fillable = [
        'Day_Id', 'Day_Of_Week', 'Start_Time', 'End_Time', 'Status'
    ];
    
    protected $primaryKey = 'Day_Id';
    
    public $timestamps = false;

}
