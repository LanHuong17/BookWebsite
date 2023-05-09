<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        $rate = $request->input('book_rating');
        $book_id = $request->input('book_id');

        $existing_rating = Rating::where('user_id', Auth::id())
                                        ->where('book_id', $book_id)->first();
        if($existing_rating) {
            $existing_rating->rate = $rate;
            $existing_rating->update();
        } else {
            Rating::create([
                'user_id' => Auth::id(),
                'book_id' => $book_id,
                'rate' => $rate
            ]);
        }
        return redirect()->back();
    }

    public function index()
    {
        $rates = DB::table('tbl_rating')
                        ->join('users', 'tbl_rating.user_id', '=', 'users.id')
                        ->join('tbl_book', 'tbl_rating.book_id', '=', 'tbl_book.IDbook')
                        ->orderByDesc('tbl_rating.created_at')
                        ->select('users.name','tbl_rating.rate','tbl_rating.id','tbl_rating.created_at','tbl_book.bookname')
                        ->paginate(7);
        return view('admin.rating.index', compact('rates'));
    }
}
