<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderFormRequest;
use App\Models\Slider;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        return view('admin.slider.index');
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(SliderFormRequest $request)
    {
        $validatedData = $request->validated();

        $slider = new Slider;
        $slider->IDslider = $validatedData['IDslider'];
        $slider->title = $validatedData['title'];
        $slider->descript = $validatedData['descript'];
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/slider', $filename);
            
            $slider->image = $filename;
        }
        
        $slider->status = $request->status == true ? '1':'0';
        $slider->save();

        return redirect('admin/slider')->with('message', 'Slider add successfully!');
    }

    public function edit(Slider $slider)
    {
        return view('admin/slider/edit', compact('slider'));
    }

    public function update(SliderFormRequest $request, $slider)
    {
        $slider = Slider::findOrFail($slider);
        $validatedData = $request->validated();
        $slider->IDslider = $validatedData['IDslider'];
        $slider->title = $validatedData['title'];
        $slider->descript = $validatedData['descript'];
        if($request->hasFile('image')) {
            $path = 'uploads/slider/'.$slider->image;
            if(File::exists($path)) {
                File::delete($path);
            }

            
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/slider', $filename);
            
            $slider->image = $filename;
            
        }
        
        $slider->status = $request->status == true ? '1':'0';
        $slider->update();

        return redirect('admin/slider/')->with('message', 'Update successfully!');
    }
}
