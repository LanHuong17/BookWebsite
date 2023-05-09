<?php

use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*  Route::get('/', function () {
    return view('frontend.homepage');
});  */
Route::get('/login1', function(){
    return view('frontend/login');
});

Auth::routes();

/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */


Route::get('/home', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('/author', [App\Http\Controllers\Frontend\FrontendController::class, 'author']);
Route::get('/author/{IDauthor}', [App\Http\Controllers\Frontend\FrontendController::class, 'authorBook']);

Route::get('/blog', [App\Http\Controllers\Frontend\FrontendController::class, 'blog']);
Route::get('blog/{IDblog}', [App\Http\Controllers\Frontend\FrontendController::class, 'readBlog']);

Route::get('/category', [App\Http\Controllers\Frontend\FrontendController::class, 'category']);
Route::get('/library', [App\Http\Controllers\Frontend\FrontendController::class, 'viewLibrary']);

Route::get('/category/{category_id}', [App\Http\Controllers\Frontend\FrontendController::class, 'books']);
Route::get('book/{IDbook}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewBooks']);
Route::get('book/{IDbook}/chapter/{IDchap}', [App\Http\Controllers\Frontend\FrontendController::class, 'readBook']);

Route::post('/add-to-library', [App\Http\Controllers\Frontend\FrontendController::class, 'addWishList']);
Route::post('/del-from-library', [App\Http\Controllers\Frontend\FrontendController::class, 'delWishList']);
Route::get('/delete/{IDbook}', [App\Http\Controllers\Frontend\FrontendController::class, 'removeFromLibr']);
Route::get('search', [App\Http\Controllers\Frontend\FrontendController::class, 'searchBook']);

Route::post('/comment', [App\Http\Controllers\Frontend\CommentController::class, 'store']);
Route::get('/admin/comments', [App\Http\Controllers\Frontend\CommentController::class, 'index']);
Route::get('/admin/comments/{id}/delete', [App\Http\Controllers\Frontend\CommentController::class, 'destroy']);

Route::post('/rating', [App\Http\Controllers\Frontend\RatingController::class, 'store']);
Route::get('/admin/rating', [App\Http\Controllers\Frontend\RatingController::class, 'index']);
/* Route::prefix('frontend')->middleware(['auth','isAdmin'])->group(function() {
    
}); */



Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function() {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::controller(App\Http\Controllers\Admin\AuthorController::class)->group(function () {
        Route::get('/author', 'index');
        Route::get('/author/create', 'create');
        Route::post('/author', 'store');
        Route::get('/author/{author}/edit', 'edit');
        Route::put('/author/{author}/', 'update');
    });

    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function () {
        Route::get('/slider', 'index');
        Route::get('/slider/create', 'create');
        Route::post('/slider', 'store');
        Route::get('/slider/{slider}/edit', 'edit');
        Route::put('/slider/{slider}/', 'update');
    });

    Route::controller(App\Http\Controllers\Admin\BlogController::class)->group(function () {
        Route::get('/blog', 'index');
        Route::get('/blog/create', 'create');
        Route::post('/blog', 'store');
        Route::get('/blog/{blog}/edit', 'edit');
        Route::put('/blog/{blog}/', 'update');
    });

    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category', 'store');
        Route::get('/category/{category}/edit', 'edit');
        Route::put('/category/{category}/', 'update');
    });

    Route::controller(App\Http\Controllers\Admin\BookController::class)->group(function () {
        Route::get('/book-view', 'book_view');
        Route::get('/chapters/{IDbook}', 'displayChapter');
        Route::get('/book', 'index');
        Route::get('/book/create', 'create');
        Route::post('/book', 'store');
        Route::get('/book/{book}/edit', 'edit');
        Route::put('/book/{book}/', 'update');
        Route::get('/chapters', 'displayChapter');
    });

    Route::controller(App\Http\Controllers\Admin\ChapterController::class)->group(function () {
       
        Route::get('/chapter', 'index');
        Route::get('/chapter/create', 'create');
        Route::post('/chapter', 'store');
        Route::get('/book/{IDbook}/chapter/{IDchap}/edit', 'edit');
        Route::put('/book/{IDbook}/chapter/{chapter}/', 'update');
    
    });

    Route::controller(App\Http\Controllers\Admin\UserController::class)->group(function () {
       
        Route::get('/user', 'index');
        Route::get('/user/{user}/edit', 'edit');
        Route::put('/user/{user}/', 'update');
        Route::get('/user/{user_id}/delete', 'destroy');
    
    });

    
});

