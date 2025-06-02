<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shop;

class Manager extends Model
{
    public $table = 'manager';
    protected $primaryKey = 'Manager_id';
    protected $fillable = [
        'Manager_id','Shop_Id', 'Name', 'Email', 'Password', 'Street_1', 'Postcode', 'City', 'State', 'isBanned', 'Reason', 'Ban'
    ];
    public $timestamps = false;
    // app/Models/Manager.php
public function shop()
{
    return $this->belongsTo(Shop::class, 'Shop_Id', 'Shop_Id');
}

}
