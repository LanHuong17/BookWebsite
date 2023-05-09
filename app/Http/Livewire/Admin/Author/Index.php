<?php

namespace App\Http\Livewire\Admin\Author;
use App\Models\Author;
use GuzzleHttp\Psr7\Request;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;


class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $auname, $IDauthor, $description, $img;
    use WithFileUploads;
    /* public function rules()
    {
        return [
            'IDauthor' => 'required',
            'auname' => 'required|string',
            'description' => 'required|string',
            'img' => 'image|nullable'
        ];
    } */

    public function resetInput()
    {
        $this->IDauthor = NULL;
        $this->auname = NULL;
        $this->description = NULL;
        $this->img = NULL;
    }

    public function storeAuthor()
    {
        $validatedData = $this->validate();
        /* $img = $this->img->store('uploads/author'); */
        Author::create([
            'IDauthor' => $this->IDauthor,
            'auname' => $this->auname,
            'description' => $this->description,
            /* 'img' => $img, */
        ]);

        session()->flash('message', 'Author add successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function openModal()
    {
        $this->resetInput();
    }

    public function editAuthor(int $IDauthor)
    {
        $author = Author::findOrFail($IDauthor);
        $this->IDauthor = $author->IDauthor;
        $this->auname = $author->auname;
        $this->description = $author->description;
        
    }

    public function updateAuthor()
    {
        $validatedData = $this->validate();
        Author::findOrFail($this->IDauthor)->update([
            'IDauthor' => $this->IDauthor,
            'auname' => $this->auname,
            'description' => $this->description
        ]);
        session()->flash('message', 'Author update successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function deleteAuthor($IDauthor) 
    {
            // dd($category_id);
            $this->IDauthor = $IDauthor;
        
    }
        
    public function destroyAuthor()
    {
            $author = Author::find($this->IDauthor);
            /* $path = 'uploads/category/'.$author->image;
            if(File::exists($path)) {
                File::delete($path);
            } */
            $author->delete();
            session()->flash('message','Author Deleted');
            // sleep(5);
            $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {   
        $authors = Author::orderBy('IDauthor', 'DESC')->paginate(3);
        return view('livewire.admin.author.index',['authors' => $authors] )
                ->extends('layouts.admin')
                ->section('content');
    }
}
