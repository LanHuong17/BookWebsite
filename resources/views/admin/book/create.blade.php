@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Add Book
                    <a href="{{ url('admin/book/') }}" class="btn btn-primary btn-sm text-white float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-warning">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{ url('admin/book') }}" method="post" enctype="multipart/form-data">
                    @csrf 
                    <div class="row">
                        <div class="mb-3">
                            <label for="">ID</label>
                            <input type="text" name="IDbook" class="form-control">
                            @error('IDbook')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Category</label>
                            <select style="height: 1.5cm;" name="category_id" id="" class="form-control">
                                    <option value="">Unknow</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            {{-- @error('id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror --}}
                        </div>
                        <div class="mb-3">
                            <label for="">Author</label>
                            <select style="height: 1.5cm;" name="IDauthor" id="" class="form-control">
                                    <option value="">Unknow</option>
                                @foreach ($authors as $author)
                                    <option value="{{ $author->IDauthor }}">{{ $author->auname }}</option>
                                @endforeach
                            </select>
                            {{-- @error('id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror --}}
                        </div>
                        <div class="mb-3">
                            <label for="">Book's Name</label>
                            <input type="text" name="bookname" class="form-control">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Sub-Description</label>
                            <input type="text" name="small_descript" class="form-control">
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Description</label>
                            <input type="text" name="descript" class="form-control">
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Image</label>
                            <input type="file" name="img" class="form-control">
                        </div>
                        
                        <div class="mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" id="" name="status">
                        </div>
                        <div class="mb-3">
                            <label for="">Trending</label>
                            <input type="checkbox" id="" name="trending">
                        </div>
                        <div class="mb-3">
                            <label for=""></label>
                            <input type="submit" class="btn btn-primary float-end" value="Add" id="">
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