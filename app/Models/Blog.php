<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'tbl_blog';
    protected $primaryKey = 'IDblog';
    protected $fillable = [
        'IDblog',
        'title',
        'content',
        'image',
        'slug',
        'status',
    ];
}
