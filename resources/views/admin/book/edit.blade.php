@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Book
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
                <form action="{{ url('admin/book/'.$book->IDbook) }}" method="post" enctype="multipart/form-data">
                    @csrf 
                    @method('PUT')
                    <div class="row">
                        <div class="mb-3">
                            <label for="">ID</label>
                            <input type="text" name="IDbook" value="{{ $book->IDbook }}" class="form-control">
                            @error('IDbook')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Category</label>
                            <select style="height: 1.5cm;" name="category_id" id="" class="form-control">
                                    <option value="">Unknow</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $book->category_id ? 'selected':'' }}>
                                        {{ $category->name }}
                                    </option>
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
                                    <option value="{{ $author->IDauthor }}" {{ $author->IDauthor == $book->IDauthor ? 'selected':'' }}>
                                        {{ $author->auname }}
                                    </option>
                                @endforeach
                            </select>
                            {{-- @error('id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror --}}
                        </div>
                        <div class="mb-3">
                            <label for="">Book's Name</label>
                            <input type="text" name="bookname" value="{{ $book->bookname }}" class="form-control">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Sub-Description</label>
                            <input type="text" name="small_descript" value="{{ $book->small_descript }}" class="form-control">
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Description</label>
                            <input type="text" name="descript" value="{{ $book->descript }}" class="form-control">
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Image</label>
                            <input type="file" name="img" class="form-control">
                            <img src="{{ asset('/uploads/book/'.$book->img) }}" width="150px" alt="">
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