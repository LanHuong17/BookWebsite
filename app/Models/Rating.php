<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $table = 'tbl_rating';
    protected $fillable = [
        'user_id',
        'book_id',
        'rate'
    ];
}
