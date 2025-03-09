<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    public $table = 'terms';
    protected $primaryKey = 'T_Id';
    protected $fillable = [
        'T_Id', 'T_Topics', 'T_Terms'
    ];
    public $timestamps = false;
}
