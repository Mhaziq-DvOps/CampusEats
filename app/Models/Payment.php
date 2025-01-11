<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $table = 'payment_type';
    protected $primaryKey = 'PM_Id';
    protected $fillable = [
        'PM_Id', 'Name', 'Status', 'Image'
    ];
    public $timestamps = false;
}
