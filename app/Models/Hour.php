<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hour extends Model
{
    public $table = 'business_hour';
    protected $primaryKey = 'Day_Id';
    protected $fillable = [
        'Day_Id', 'Day_Of_Week', 'Start_Time', 'End_Time', 'Status'
    ];
    public $timestamps = false;
}
