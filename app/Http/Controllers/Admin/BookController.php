<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\BookFormRequest;
use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Category;
use App\Models\Book;
use App\Models\Chapter;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('admin.book.index', compact('books'));
    }

    public function book_view()
    {
        $books = Book::paginate(5);
        return view('admin.book.book-view', compact('books'));
    }

    public function render()
    {
        $books = Book::orderBy('id', 'DESC')->paginate(3);
        return view('admin.book.index', ['books' => $books]);
    }

    public function create()
    {
        $categories = Category::all();
        $authors = Author::all();
        return view('admin.book.create', compact('categories','authors'));
    }

    public function store(BookFormRequest $request)
    {
        
        $validatedData = $request->validated();
        $book = new Book;
        $book->IDbook = $validatedData['IDbook'];
        $book->category_id = $validatedData['category_id'];
        $book->IDauthor = $validatedData['IDauthor'];
        $book->bookname = $validatedData['bookname'];
        $book->small_descript = $validatedData['small_descript'];
        $book->descript = $validatedData['descript'];
        if($request->hasFile('img')) {
            $file = $request->file('img');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/book', $filename);
            
            $book->img = $filename;
        }
        
        $book->status = $request->status == true ? '1':'0';
        $book->trending = $request->status == true ? '1':'0';
        $book->save();

        return redirect('admin/book')->with('message', 'Book add successfully!');
        
    }


    public function edit(int $IDbook)
    {
        $categories = Category::all();
        $authors = Author::all();
        $book = Book::findOrFail($IDbook);
        return view('admin.book.edit', compact('categories','authors', 'book'));
    }

    public function update(BookFormRequest $request, $IDbook)
    {
        $book = Book::findOrFail($IDbook);
        $validatedData = $request->validated();
        $book->IDbook = $validatedData['IDbook'];
        $book->category_id = $validatedData['category_id'];
        $book->IDauthor = $validatedData['IDauthor'];
        $book->bookname = $validatedData['bookname'];
        $book->small_descript = $validatedData['small_descript'];
        $book->descript = $validatedData['descript'];
        if($request->hasFile('img')) {
            $path = 'upload/book/'.$book->img;
            if(File::exists($path)) {
                File::delete($path);
            }

            
            $file = $request->file('img');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/book', $filename);
            
            $book->img = $filename;
            
        }
        
        $book->status = $request->status == true ? '1':'0';
        $book->trending = $request->trending == true ? '1':'0';
        $book->update();

        return redirect('admin/book/')->with('message', 'Update successfully!');
    }

    public function displayChapter($IDbook)
    {
        $books = Book::where('IDbook',$IDbook)->get();
        $chapters = Chapter::where('IDbook', $IDbook)->get();

        if($chapters) {
            return view('admin.book.chapters', compact('books','chapters'));
        } else {
            return redirect()->back();
        }
            
    }

    
}
