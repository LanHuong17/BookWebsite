<?php

namespace App\Http\Livewire\Admin\Slider;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;
use App\Models\Slider;
use Livewire\Component;

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

    public function deleteSlider($IDslider) 
    {
            // dd($category_id);
            $this->IDslider = $IDslider;
        
    }
        
    /* public function destroySlider()
    {
            $slider = Slider::find($this->id);
            $path = '/uploads/slider/'.$slider->image;
            if(File::exists($path)) {
                File::delete($path);
            }
            $slider->delete();
            session()->flash('message','Slider Deleted');
            $this->dispatchBrowserEvent('close-modal');
    } */

    public function destroySlider()
    {
            $slider = Slider::find($this->IDslider);
            $path = 'uploads/slider/'.$slider->image;
            if(File::exists($path)) {
                File::delete($path);
            }
            $slider->delete();
            session()->flash('message','Slider Deleted');
            // sleep(5);
            $this->dispatchBrowserEvent('close-modal');
    }

    
    public function render()
    {
        $sliders = Slider::orderBy('IDslider', 'DESC')->paginate(3);
        return view('livewire.admin.slider.index', ['sliders' => $sliders]);
    }

}
