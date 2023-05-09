<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'category_slug',
        'description',
        'image',
        'status',
    ];

    public function books()
    {
        return $this->hasMany(Book::class, 'category_id', 'IDbook');
    }
    /* public function book()
    {
        return $this->hasMany(Book::class)->getResults([
            'category_slug' => 'Unknown Book',
        ]);
    } */
}
