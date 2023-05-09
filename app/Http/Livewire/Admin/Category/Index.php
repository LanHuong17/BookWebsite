<?php

namespace App\Http\Livewire\Admin\Category;
use App\Models\Category;
use Livewire\WithPagination;
use Livewire\Component;
use Illuminate\Support\Facades\File;

class index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $categoryId;
    public $showModal = false;

    /* public function openModal($id) {
            $this->showModal = true;
            $this->categoryId = $id;
    } */

    public function deleteCategory($category_id) 
    {
            // dd($category_id);
            $this->category_id = $category_id;
        
    }
        
    public function destroyCategory()
    {
            $category = Category::find($this->category_id);
            $path = 'uploads/category/'.$category->image;
            if(File::exists($path)) {
                File::delete($path);
            }
            $category->delete();
            session()->flash('message','Category Deleted');
            // sleep(5);
            $this->dispatchBrowserEvent('close-modal');
    }

    
    public function render()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(3);
        return view('livewire.admin.category.index', ['categories' => $categories]);
    }
}
