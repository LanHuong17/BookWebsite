<?php

namespace App\Http\Livewire\Admin\Book;
use Livewire\WithPagination;
use Livewire\Component;
use Illuminate\Support\Facades\File;
use App\Models\Book;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $categoryId;
    public $showModal = false;

    /* public function openModal($id) {
            $this->showModal = true;
            $this->categoryId = $id;
    } */

    public function deleteBook($IDbook) 
    {
            // dd($category_id);
            $this->IDbook = $IDbook;
        
    }
        
    public function destroyBook()
    {
            $book = Book::find($this->IDbook);
            $path = 'uploads/book/'.$book->img;
            if(File::exists($path)) {
                File::delete($path);
            }
            $book->delete();
            session()->flash('message','Book Deleted');
            // sleep(5);
            $this->dispatchBrowserEvent('close-modal');
    }

    
    public function render()
    {
        $books = Book::orderBy('IDbook', 'DESC')->paginate(6);
        return view('livewire.admin.book.index', ['books' => $books]);
    }

    public function render2()
    {
        $books = Book::orderBy('IDbook', 'DESC')->paginate(3);
        return view('admin.book.book-view', ['books' => $books]);
    }
}
