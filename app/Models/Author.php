<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $table = 'tbl_author';
    protected $primaryKey = 'IDauthor';
    protected $fillable = [
        'IDauthor',
        'auname',
        'img',
        'description',
        'status'
    ];

    public function books()
    {
        return $this->hasMany(Book::class, 'IDauthor', 'IDbook');
    }
}
