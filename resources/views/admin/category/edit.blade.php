@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Category
                    <a href="{{ url('admin/category') }}" class="btn btn-primary btn-sm text-white float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/category/'.$category->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') 
                    <div class="row">
                        <div class="mb-3">
                            <label for="">ID</label>
                            <input type="text" value="{{ $category->id }}" name="id" class="form-control">
                            @error('id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{ $category->name }}" class="form-control">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Slug</label>
                            <input type="text" name="category_slug" value="{{ $category->category_slug }}" class="form-control">
                            @error('category_slug')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Description</label>
                            <input type="text" name="description" value="{{ $category->description }}" class="form-control">
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{ asset('/uploads/category/'.$category->image) }}" width="150px" alt="">
                        </div>
                        
                        <div class="mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" name="status" {{ $category->status == '1' ? 'checked':'' }}>
                        </div>

                        <div class="mb-3">
                            <label for=""></label>
                            <input type="submit" class="btn btn-primary float-end" value="Update" id="">
                        </div>
                    </div>
            <div class="card-footer">
                <a href=""></a>
                
            </div> 
             </form>
                    </div>
               
               
        </div>
    </div>
</div>
@endsection