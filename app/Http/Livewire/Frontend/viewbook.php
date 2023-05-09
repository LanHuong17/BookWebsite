<?php

namespace App\Http\Livewire\Frontend;

use Illuminate\Support\Facades\Auth;


use Livewire\Component;
use App\Models\Book;
use App\Models\Wishlist;

class ViewBook extends Component
{
    public $category, $book, $book_id;
    public function render()
    {
        return view('livewire.frontend.viewbook');
    }

    public function addToLibrary($book_id)
    {
        dd('called');
        /* if(Auth::check()) {

            $this->book_id = $book_id;
            dd($book_id);

            if(Wishlist::where('user_id', auth()->user()->id)->where('book_id', $book_id)->exists()){
                session()->flash('message', 'Already added to library');
                return false;
            } else {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'book_id' => $book_id
                ]);
                session()->flash('message', 'Add to library successfully');
            }

        } else {
            session()->flash('message', 'login first');
            return false;
        } */
    }

}
