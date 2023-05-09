<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class CommentController extends Controller
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function store(Request $request)
    {
        $request->validate([
            'cmt'=>'required',
        ]);
   
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
    
        Comment::create($input);
   
        return back();
    }

    public function index()
    {
        $cmts = DB::table('tbl_comment')
                        ->join('users', 'tbl_comment.user_id', '=', 'users.id')
                        ->join('tbl_book', 'tbl_comment.IDbook', '=', 'tbl_book.IDbook')
                        ->orderByDesc('tbl_comment.created_at')
                        ->select('users.name','tbl_comment.cmt','tbl_comment.id','tbl_comment.created_at','tbl_book.bookname')
                        ->paginate(5);
        return view('admin.comment.index', compact('cmts'));
    }

    public function destroy(int $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect('admin/comments')->with('message','Delete successfully');
    }
}
