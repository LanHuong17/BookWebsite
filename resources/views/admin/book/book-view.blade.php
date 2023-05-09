@extends('layouts.admin')
@section('content')

<div class="card-body">
    <div class="row">
        <div class="col-md-12">
    
            @if (session('message'))
                <div class="alert alert-success">{{ (session('message')) }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Book
                        
                    </h4>
                </div>
                <div class="card-body">
                    
                    <table style="" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <td>{{ $book->bookname }}</td>
                                        <td>{{ $book->category ? $book->category->name : " " }}</td>
                                        <td>{{ $book->author ? $book->author->auname : " " }}</td>
                                        <td><img style="width: 2cm; height: 2cm;" src="{{ URL::to('/uploads/book/'.$book->img) }}" alt=""></td>
                                        <td>
                                            <a href="{{ url('admin/chapters/'.$book->IDbook) }}" class="btn btn-success">View Chapter</a>
                                        </td>
                                        <!-- <td>{{ $book->action }}</td> -->
                
                                    </tr>
                                    
                                @endforeach
                                {{ $books->links('pagination::bootstrap-5') }}
                            </tbody>
                        </thead>
                    </table>
                    
                    <div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div> 
    
@endsection