<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChapterFormRequest;
use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class ChapterController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $chapters = Chapter::all();
        return view('admin.chapter.index', compact('chapters','books'));
    }

    public function create()
    {
        $books = Book::all();
        return view('admin.chapter.create', compact('books'));
    }

    public function store(ChapterFormRequest $request)
    {
        
        $validatedData = $request->validated();
        $chapter = new chapter;
        $chapter->IDchap = $validatedData['IDchap'];
        $chapter->IDbook = $validatedData['IDbook'];
        $chapter->chapname = $validatedData['chapname'];
        $chapter->slug = $validatedData['slug'];
        $chapter->content = $validatedData['content'];
        if($request->hasFile('img')) {
            $file = $request->file('img');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/chapter', $filename);
            
            $chapter->img = $filename;
        }
        
        $chapter->status = $request->status == true ? '1':'0';
        $chapter->save();

        return redirect('admin/chapter')->with('message', 'chapter add successfully!');
        
    }


    public function edit(int $IDbook, int $IDchap)
    {
        $books = Book::all();
        $chapter = Chapter::where('IDchap', $IDchap)->where('IDbook', $IDbook)->first();
        return view('admin.chapter.edit', compact('chapter', 'books'));
    }

    public function update(chapterFormRequest $request, $IDbook, $IDchap)
    {
        $validatedData = $request->validated();   
        /* $check_chapter_exist = Chapter::where('IDchap', $validatedData['IDchap'])->where('IDbook', $validatedData['IDbook'])->count();
        if ($check_chapter_exist > 0) {
            return redirect()->back()->withErrors(['message' => 'Chapter already exists!']);
        } */
        
        $chapter = Chapter::where('IDchap', $IDchap)->where('IDbook', $IDbook)->first();
        $update = [
            'IDchap' => $validatedData['IDchap'],
            'IDbook' => $validatedData['IDbook'],
            'chapname' => $validatedData['chapname'],
            'content' => $validatedData['content'],
            'img' => '',
            'status' => 0,
            'slug' => $validatedData['slug']
        ];

        if (isset($validatedData['status']) == true && $validatedData['status'] == 'on') {
            $update['status'] = 1;
        }

        if($request->hasFile('img')) {
            $path = 'upload/chapter/' . $chapter->img;
            if(File::exists($path)) {
                File::delete($path);
            }
    
            $file = $request->file('img');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/chapter', $filename);
            if (is_file('uploads/chapter/' . $filename)) {
                $update['img'] = $filename;
            }  
        }

        $result = DB::table('tbl_chapter')
                        ->where('IDchap', $IDchap)
                        ->where('IDbook', $IDbook)
                        ->update($update);
        
        if ($result > 0) {
            return redirect('admin/chapter/')->with('message', 'Update successfully!');
        }
        return redirect()->back()->withErrors(['message' => 'Cannot update!']);
    }

   /*  public function displayChapter($IDbook)
    {
        $books = Book::where('status','0')->get();
        $chapters = Chapter::where('IDbook', $IDbook)->get();
            return view('admin.book.chapters', compact('books','chapters'));
    } */
}
