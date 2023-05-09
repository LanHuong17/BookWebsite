<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Chapter extends Model
{
    use HasFactory;
    protected $table = 'tbl_chapter';
    protected $primaryKey = ['IDbook', 'IDchap'];
    public $incrementing = false;
    protected $fillable = [
        'chapname',
        'content',
        'slug',
        'img',
        'status',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'IDchap', 'IDbook');
    }

}
