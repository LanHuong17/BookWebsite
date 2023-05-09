@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Add chapter
                    <a href="{{ url('admin/chapter/') }}" class="btn btn-primary btn-sm text-white float-end">Back</a>
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
                    
                <form action="{{ url('admin/chapter') }}" method="post" enctype="multipart/form-data">
                    @csrf 
                    <div class="row">
                        <div class="mb-3">
                            <label for="">ID</label>
                            <input type="text" name="IDchap" class="form-control">
                            @error('IDbook')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Book</label>
                            <select style="height: 1.5cm;" name="IDbook" id="" class="form-control">
                                    <option value="">Unknow</option>
                                @foreach ($books as $book)
                                    <option value="{{ $book->IDbook }}">{{ $book->bookname }}</option>
                                @endforeach
                            </select>
                            {{-- @error('id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror --}}
                        </div>
                        <div class="mb-3">
                            <label for="">Chapter's Name</label>
                            <input type="text" name="chapname" class="form-control">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Slug</label>
                            <input type="text" name="slug" class="form-control">
                            @error('slug')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="">Content</label>
                            <textarea type="text" name="content" class="form-control" rows="20"></textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <script src="{{ asset('public/admin/js/ckeditor.js') }}"></script>
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