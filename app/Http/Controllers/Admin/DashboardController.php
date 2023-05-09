<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Blog;
use App\Models\Book;
use App\Models\Category;
use App\Models\Chapter;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $category = Category::count();
        $book = Book::count();
        $chapter = Chapter::count();
        $blog = Blog::count();
        $author = Author::count();
        $user = User::count();
        return view('admin.dashboard', compact('category', 'book', 'chapter','blog','author','user'));
    }
}
