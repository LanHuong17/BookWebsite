<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogFormRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function index()
    {
        return view('admin.blog.index');
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(BlogFormRequest $request)
    {
        $validatedData = $request->validated();

        $blog = new Blog;
        $blog->IDblog = $validatedData['IDblog'];
        $blog->title = $validatedData['title'];
        $blog->content = $validatedData['content'];
        $blog->slug = $validatedData['slug'];
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/blog', $filename);
            
            $blog->image = $filename;
        }
        
        $blog->status = $request->status == true ? '1':'0';
        $blog->save();

        return redirect('admin/blog')->with('message', 'blog add successfully!');
    }

    public function edit(Blog $blog)
    {
        return view('admin/blog/edit', compact('blog'));
    }

    public function update(blogFormRequest $request, $blog)
    {
        $blog = blog::findOrFail($blog);
        $validatedData = $request->validated();
        $blog->IDblog = $validatedData['IDblog'];
        $blog->title = $validatedData['title'];
        $blog->content = $validatedData['content'];
        $blog->slug = $validatedData['slug'];
        if($request->hasFile('image')) {
            $path = 'uploads/blog/'.$blog->image;
            if(File::exists($path)) {
                File::delete($path);
            }

            
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/blog', $filename);
            
            $blog->image = $filename;
            
        }
        
        $blog->status = $request->status == true ? '1':'0';
        $blog->update();

        return redirect('admin/blog/')->with('message', 'Update successfully!');
    }
}
