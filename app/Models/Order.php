<?php

namespace App\Models;

use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $table = "customer_order";



    public $fillable = [
        'User_Id',
        'T_Id',
        'D_Id',
        'O_Name',
        'O_Street_1',
        'O_Postcode',
        'O_City',
        'O_State',
        'O_Email',
        'O_Phone',
        'O_Notes',
        'O_Status',
        'Datetime',
        'BookDate',
        'BookTime',
        'O_Total_Price',
        'O_Type',
        'O_Payment',
        'T_Pax',
        'Tracking_No',
    ];

    public function orderitems()
    {
        return $this->hasMany(OrderProduct::class,'Order_Id','id');
    }

    public function orderProduct()
    {
        return $this->hasMany(OrderProduct::class,'Order_Id','id');
    }


}