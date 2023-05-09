<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorFormRequest;
use App\Models\Author;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('admin.author.index', compact('authors'));
    }

    public function render()
    {
        $authors = author::orderBy('id', 'DESC')->paginate(3);
        return view('admin.author.index', ['authors' => $authors]);
    }

    public function create()
    {
        $authors = Author::all();
        return view('admin.author.create', compact('authors'));
    }

    public function store(AuthorFormRequest $request)
    {
        
        $validatedData = $request->validated();
        $author = new author;
        $author->IDauthor = $validatedData['IDauthor'];
        $author->auname = $validatedData['auname'];
        $author->description = $validatedData['description'];
        if($request->hasFile('img')) {
            $file = $request->file('img');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/author', $filename);
            
            $author->img = $filename;
        }
        
        $author->status = $request->status == true ? '1':'0';
        $author->save();

        return redirect('admin/author')->with('message', 'author add successfully!');
        
    }


    public function edit(int $IDauthor)
    {
        $author = Author::findOrFail($IDauthor);
        return view('admin.author.edit', compact('author'));
    }

    public function update(AuthorFormRequest $request, $IDauthor)
    {
        $author = author::findOrFail($IDauthor);
        $validatedData = $request->validated();
        $author->IDauthor = $validatedData['IDauthor'];
        $author->auname = $validatedData['auname'];
        $author->description = $validatedData['description'];
        if($request->hasFile('img')) {
            $path = 'upload/author/'.$author->img;
            if(File::exists($path)) {
                File::delete($path);
            }

            
            $file = $request->file('img');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/author', $filename);
            
            $author->img = $filename;
            
        }
        
        $author->status = $request->status == true ? '1':'0';
        $author->update();

        return redirect('admin/author/')->with('message', 'Update successfully!');
    }
}
