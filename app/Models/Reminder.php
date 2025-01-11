<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    public $table = 'notifications';
    public $timestamps = TRUE;
    protected $fillable = [
        'id', 'status', 'subject', 'data', 'footer'
    ];
}
