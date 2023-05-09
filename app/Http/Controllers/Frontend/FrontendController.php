<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Blog;
use App\Models\Book;
use App\Models\Category;
use App\Models\Chapter;
use App\Models\Comment;
use App\Models\Rating;
use App\Models\Slider;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class FrontendController extends Controller
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function index()
    {


        $categories = Category::where('status','0')->get();
        $sliders = Slider::where('status','0')->get();
        $top_books = DB::table('tbl_book')
                            ->join('tbl_rating', 'tbl_book.IDbook', '=', 'tbl_rating.book_id')
                            ->select('tbl_book.img', 'tbl_book.bookname', 'tbl_book.small_descript', 
                                    'tbl_book.IDbook', DB::raw('avg(tbl_rating.rate) as avg_rate, count(tbl_rating.user_id) as user'))
                            ->groupBy('tbl_book.img', 'tbl_book.bookname', 'tbl_book.small_descript', 
                                    'tbl_book.IDbook')
                            ->orderByDesc('avg_rate')
                            ->paginate(4);
        $books = Book::all();
        $book1 = Book::where('category_id','1')->get();
        $book3 = Book::where('category_id','3')->get();
        return view('frontend.homepage', compact('categories','sliders','book1','book3','books', 'top_books'),);
    }

    public function render()
    {
        $authors = author::orderBy('IDauthor', 'DESC')->paginate(3);
        return view('frontend.collection.author.index', ['authors' => $authors]);
    }

    public function category()
    {
        $categories = Category::where('status','0')->get();
        return view('frontend.collection.category.index', compact('categories'));
        
    }

    public function author()
    {
        $categories = Category::where('status','0')->get();
        $authors = Author::where('status','0')->paginate(4);
        return view('frontend.collection.author.index', compact('categories','authors'));
    }

    public function authorBook($IDauthor)
    {
        $categories = Category::where('status','0')->get();
        $books = Book::where('IDauthor',$IDauthor)->get();
        $book = DB::table('tbl_book')
                        ->join('tbl_author', 'tbl_book.IDauthor', '=', 'tbl_author.IDauthor')
                        ->select('tbl_author.auname')
                        ->where('tbl_book.IDauthor', $IDauthor)->first();
        return view('frontend.collection.author.au-book', compact('categories','books'));
    }

    
    public function about()
    {
        $categories = Category::where('status','0')->get();
        return view('frontend.about', compact('categories'));
    }

    /* public function books($category_slug)
    {
        $categories = Category::where('status','0')->get();
        $category = Category::where('category_slug',$category_slug)->first();
        if($category) {
            $books = $category->books->get();
            return view('frontend.collection.book.index', compact('categories','books'));
        } else {
            return redirect()->back();
        }
    } */

    public function books($category_id)
    {
        $book = DB::table('tbl_book')
                    ->join('categories', 'tbl_book.category_id', '=', 'categories.id')
                    ->select('categories.name')
                    ->where('tbl_book.category_id', $category_id)->first();
        $categories = Category::where('status','0')->get();
        $books = Book::where('category_id',$category_id)->paginate(8);
        if($books) {
            
            return view('frontend.collection.book.index', compact('categories','books', 'book'));
        } else {
            return redirect()->back();
        }
    }

    public function viewBooks($IDbook)
    {
        $categories = Category::where('status','0')->get();
        $authors = Author::where('status','0')->get();
        $books = Book::where('IDbook',$IDbook)->get();
        $chapters = Chapter::where('IDbook',$IDbook)->paginate(7);

        $rates = Rating::where('book_id',$IDbook)->get();
        $rate_sum = Rating::where('book_id',$IDbook)->sum('rate');
        $user_rate = Rating::where('book_id',$IDbook)->where('user_id', Auth::id())->first();
        if($rates->count() > 0) {
            $rate_avg = $rate_sum/$rates->count();
        } else {
            $rate_avg = 0;
        }
        
        $exist_in_library = Wishlist::where('user_id', Auth::id())->where('book_id', $IDbook)->count();
        $type = 'add';
        if ($exist_in_library > 0) {
            $type = 'remove';
        }
        if(is_null($books) == false) {
            return view('frontend.collection.book.viewbook', compact('categories','books','authors','chapters', 
                                                            'type', 'rates','rate_avg', 'user_rate'));
        } else {
            return redirect()->back();
        }
    }

    public function readBook($IDbook, $IDchap)
    {
        $cmts = DB::table('tbl_comment')
                        ->join('users', 'tbl_comment.user_id', '=', 'users.id')
                        ->select('users.name','tbl_comment.cmt','tbl_comment.created_at','tbl_comment.IDbook')
                        ->orderByDesc('tbl_comment.created_at')
                        ->where('tbl_comment.IDbook', $IDbook)
                        ->paginate(3);

        $categories = Category::where('status','0')->get();
        $books = Book::where('status','0')->get();


        $table_content = Chapter::where('IDbook',$IDbook)->get();
        $chapters = Chapter::where('IDbook',$IDbook)->where('IDchap',$IDchap)->get();
        $next = Chapter::where('IDbook', $IDbook)->where('IDchap', '>', $IDchap)->orderBy('IDchap')->first();
        $prev = Chapter::where('IDbook', $IDbook)->where('IDchap', '<', $IDchap)->orderByDesc('IDchap')->first();
        

        return view('frontend.collection.book.chapters.index', compact('cmts','categories','books','chapters', 'table_content', 'prev', 'next'));
    }


    public function library()
    {
        $categories = Category::where('status','0')->get();
        $library = Wishlist::where('user_id', Auth::id())->get();

        return view('frontend.collection.book.library', compact('categories','library'));
    }



    public function addWishList(Request $request)
    {
        $book_id = $request->book_id;
        if(Auth::check()) {
            if(Book::find($book_id)){
                $libr = new Wishlist();
                $libr->book_id = $book_id;
                $libr->user_id = Auth::id();
                $libr->save();
                return response()->json(['status'=>"Book added to library"]);
            } else {
                return response()->json(['status'=>"Book doesn't exist"]);
            }
        } else {
            return response()->json(['status' => "Login to continue"]);
        }
    }

    public function delWishList(Request $request)
    {
        $book_id = $request->book_id;

        if(Auth::check()) {
            if(Book::find($book_id)){
                Wishlist::where('user_id', Auth::id())->where('book_id', $book_id)->delete();
                return response()->json(['status'=>"Ok"]);
            } else {
                
                return response()->json(['status'=>"Book doesn't exist"]);
            }
        } else {
            return response()->json(['status' => "Login to continue"]);
        }
    }

    public function viewLibrary()
    {
        $wishlist = new Wishlist();

        if(Auth::check()) {

        $libraries = $wishlist->join('tbl_book', 'tbl_library.book_id', '=', 'tbl_book.IDbook')
                            ->select('tbl_book.bookname', 'tbl_book.img','tbl_book.IDbook')
                            ->where('user_id', Auth::id())->get();
        $categories = Category::where('status','0')->get();
        return view('frontend.collection.book.library', compact('categories','libraries'));
        }
        else {
            return redirect('/')->with('message', 'Login first');
        }
    }
    
    public function removeFromLibr(int $book_id)
    {
        $this->book_id = $book_id;

        if(Auth::check()) {
            if(Book::find($book_id)){
                $libraries = Wishlist::where('user_id', Auth::id())->where('book_id', $book_id);
                $libraries->delete();
                return redirect('/library');
            } 
        } else {
            return response()->json(['status' => "Login to continue"]);
        }
    }

    public function searchBook(Request $request)
    {
        $categories = Category::where('status','0')->get();
        if($request->search) {
            $result = Book::where('bookname','like','%'.$request->search.'%')->get();
            return view('frontend.collection.category.search', compact('result','categories'));
        } else {
            return redirect()->back()->with('message','Empty search');
        }
    }

    public function blog()
    {
        $categories = Category::where('status','0')->get();
        $blogs = Blog::where('status','0')->get();
        return view('frontend.collection.blog.index', compact('categories','blogs'));
    }

    public function readBlog($IDblog)
    {
        $categories = Category::where('status','0')->get();
        $blogs = Blog::where('IDblog', $IDblog)->get();
        $next = Blog::where('IDblog', '>', $IDblog)->orderBy('IDblog')->first();
        $prev = Blog::where('IDblog', '<', $IDblog)->orderByDesc('IDblog')->first();
        return view('frontend.collection.blog.read', compact('categories','blogs','next','prev'));
    }
}
