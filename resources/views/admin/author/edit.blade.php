@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Author
                    <a href="{{ url('admin/author') }}" class="btn btn-primary btn-sm text-white float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/author/'.$author->IDauthor) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') 
                    <div class="row">
                        <div class="mb-3">
                            <label for="">ID</label>
                            <input type="text" value="{{ $author->IDauthor }}" name="IDauthor" class="form-control">
                            @error('IDauthor')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Author's name</label>
                            <input type="text" name="auname" value="{{ $author->auname }}" class="form-control">
                            @error('auname')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Description</label>
                            <input type="text" name="description" value="{{ $author->description }}" class="form-control">
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Image</label>
                            <input type="file" name="img" class="form-control">
                            <img src="{{ asset('/uploads/author/'.$author->img) }}" width="150px" alt="">
                        </div>
                        
                        <div class="mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" name="status" {{ $author->status == '1' ? 'checked':'' }}>
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