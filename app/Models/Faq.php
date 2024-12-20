<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    public $table = 'faq';
    protected $primaryKey = 'Faq_id';
    protected $fillable = [
        'Faq_id', 'Faq_Question', 'Faq_Category', 'Faq_Answer', 'created_at', 'updated_at'
    ];
    
}
