<?php

namespace App\Http\Livewire\Admin\Blog;

use App\Models\Blog;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $showModal = false;

    /* public function openModal($id) {
            $this->showModal = true;
            $this->categoryId = $id;
    } */

    public function deleteBlog($IDblog) 
    {
            // dd($category_id);
            $this->IDblog = $IDblog;
        
    }
        
    /* public function destroyblog()
    {
            $blog = blog::find($this->id);
            $path = '/uploads/blog/'.$blog->image;
            if(File::exists($path)) {
                File::delete($path);
            }
            $blog->delete();
            session()->flash('message','blog Deleted');
            $this->dispatchBrowserEvent('close-modal');
    } */

    public function destroyBlog()
    {
            $blog = Blog::find($this->IDblog);
            $path = 'uploads/blog/'.$blog->image;
            if(File::exists($path)) {
                File::delete($path);
            }
            $blog->delete();
            session()->flash('message','blog Deleted');
            // sleep(5);
            $this->dispatchBrowserEvent('close-modal');
    }

    
    public function render()
    {
        $blogs = Blog::orderBy('IDblog', 'DESC')->paginate(3);
        return view('livewire.admin.blog.index', ['blogs' => $blogs]);
    }
}
