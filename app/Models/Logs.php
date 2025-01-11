<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    public $table = 'log';
    protected $primaryKey = 'Log_Id';
    protected $fillable = [
        'Log_Id', 'Cust_Id', 'Manager_Id', 'Log_Module', 'Log_Pay_Type', 'Log_Total_Price', 'Log_Status', 'created_at', 'updated_at'
    ];
}
