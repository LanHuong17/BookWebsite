<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Book extends Model
{
    use HasFactory;
    protected $table = 'tbl_book';
    protected $primaryKey = 'IDbook';
    protected $fillable = [
        'IDbook',
        'category_id',
        'IDauthor',
        'bookname',
        'small_descript',
        'descript',
        'img',
        'trending',
        'status',
        'avg_rate'
    ];

    /* public function category()
    {
        return $this->belongsTo(Category::class, 'IDbook', 'id');
    } */

    

    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault([
            'name' => 'Unknown Category',
        ]);
    }

    public function author()
    {
        /* return $this->belongsTo(Author::class, 'IDbook', 'IDauthor'); */
        return $this->belongsTo(Author::class)->withDefault([
            'auname' => 'Unknown',
        ]);
    }

    public function chapter()
    {
        return $this->hasMany(Chapter::class, 'IDbook', 'IDchap');
    }
}
