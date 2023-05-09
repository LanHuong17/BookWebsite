@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Chapter
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
                <form action="{{ url('admin/book/'.$chapter->IDbook.'/chapter/'.$chapter->IDchap) }}" method="post" enctype="multipart/form-data">
                    @csrf 
                    @method('PUT')
                    <div class="row">
                        <div class="mb-3">
                            <label for="">ID</label>
                            <input type="text" name="IDchap" value="{{ $chapter->IDchap }}" class="form-control">
                            @error('IDchap')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Book</label>
                            <select style="height: 1.5cm;" name="IDbook" id="" class="form-control">
                                    <option value="">Unknow</option>
                                @foreach ($books as $book)
                                    <option value="{{ $book->IDbook }}" {{ $book->IDbook == $chapter->IDbook ? 'selected':'' }}>
                                        {{ $book->bookname }}
                                    </option>
                                @endforeach
                            </select>
                            {{-- @error('id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror --}}
                        </div>
                        <div class="mb-3">
                            <label for="">Chap's Name</label>
                            <input type="text" name="chapname" value="{{ $chapter->chapname }}" class="form-control">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Slug</label>
                            <input type="text" name="slug" value="{{ $chapter->slug }}" class="form-control">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Content</label>
                            <textarea type="text" name="content" class="form-control" rows="20">{{ $chapter->content }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <script src="{{ asset('public/ckeditor/ckeditor.js') }}">CKEDITOR.replace('content');</script>
                            
                        </div>
                        <div class="mb-3">
                            <label for="">Image</label>
                            <input type="file" name="img" class="form-control">
                            <img src="{{ asset('/uploads/chapter/'.$chapter->img) }}" width="150px" alt="">
                        </div>
                        
                        <div class="mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" id="" name="status">
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