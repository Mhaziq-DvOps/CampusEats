<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Captcha extends Model
{
    public $table = 'captcha';
    protected $primaryKey = 'Capt_Id';
    protected $fillable = [
        'Capt_Id', 'Capt_Name', 'Capt_Status', 'Capt_Type'
    ];
    public $timestamps = false;
}
