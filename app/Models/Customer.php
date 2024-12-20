<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'name', 'phone', 'password', 'gender', 'birthDate', 'email', 'street_1', 'postcode', 'city', 'state', 'ban', 'reason'
    ];
    public $timestamps = false;
}
