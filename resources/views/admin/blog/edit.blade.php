@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Blog
                    <a href="{{ url('admin/blog') }}" class="btn btn-primary btn-sm text-white float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/blog/'.$blog->IDblog) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') 
                    <div class="row">
                        <div class="mb-3">
                            <label for="">ID</label>
                            <input type="text" value="{{ $blog->IDblog }}" name="IDblog" class="form-control">
                            @error('IDblog')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title" value="{{ $blog->title }}" class="form-control">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Content</label>
                            <input type="text" name="content" value="{{ $blog->content }}" class="form-control">
                            @error('content')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Slug</label>
                            <input type="text" name="slug" value="{{ $blog->slug }}" class="form-control">
                            @error('slug')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{ asset('/uploads/blog/'.$blog->image) }}" width="150px" alt="">
                        </div>
                        
                        <div class="mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" name="status" {{ $blog->status == '1' ? 'checked':'' }}>
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