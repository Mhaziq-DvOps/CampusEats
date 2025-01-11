<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    public $table = 'review';
    protected $fillable = [
        'Review_Id', 'User_Id', 'P_Id', 'R_Rating', 'R_Comment', 'R_Image', 'R_Sentiment', 'created_at', 'updated_at_at'
    ];

    public function userReview()
    {
        return $this->belongsTo(User::class,'User_Id', 'id');
    }
}
