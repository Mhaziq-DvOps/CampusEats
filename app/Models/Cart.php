<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table="cart";
    protected $fillable = 
    [
        'Cust_id',
        'Pro_id',
        'Pro_qty',
        'Order_Type',
        'BookDate',
        'BookTime',
        'BookPax',
        'BookTable'
    ];

    public function products()
    {
        return $this->belongsTo(Product::class,'Pro_Id', 'P_Id');
    }
}
