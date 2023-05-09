<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use PhpParser\Node\Stmt\Catch_;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.create');
    }


    public function store(CategoryFormRequest $request)
    {
        $validatedData = $request->validated();

        $category = new Category;
        $category->id = $validatedData['id'];
        $category->name = $validatedData['name'];
        $category->category_slug = $validatedData['category_slug'];
        $category->description = $validatedData['description'];
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/category', $filename);
            
            $category->image = $filename;
        }
        
        $category->status = $request->status == true ? '1':'0';
        $category->save();

        return redirect('admin/category')->with('message', 'Category add successfully!');
    }

/*     public function all_category_product(){
        $this->AuthLogin();
        $all_category_product = DB::table('categories')->get();
        $manager_category_product = view('admin/category')->with('all_category_product',$all_category_product);
        return view('admin/category')->with('admin/category', $manager_category_product);
    } */

    public function edit(Category $category)
    {
        return view('admin/category/edit', compact('category'));
        //return $category;
    }

    public function update(CategoryFormRequest $request, $category)
    {
        $category = Category::findOrFail($category);
        $validatedData = $request->validated();
        $category->id = $validatedData['id'];
        $category->name = $validatedData['name'];
        $category->category_slug = $validatedData['category_slug'];
        $category->description = $validatedData['description'];
        if($request->hasFile('image')) {
            $path = 'upload/category/'.$category->image;
            if(File::exists($path)) {
                File::delete($path);
            }

            
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/category', $filename);
            
            $category->image = $filename;
            
        }
        
        $category->status = $request->status == true ? '1':'0';
        $category->update();

        return redirect('admin/category/')->with('message', 'Update successfully!');
    }

    /* public function delete(CategoryFormRequest $request, $category)
    {
        $category = Category::findOrFail($category);
        $category->delete();
        return redirect('admin/category/')->with('message','ok');
    } */
}
