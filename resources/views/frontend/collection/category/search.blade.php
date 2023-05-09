@extends('layouts.layout')
@section('books')
<div ></div>
<div style="margin-top: 3cm; margin-left: 1cm; margin-right: 1cm;" class="row row-cols-1 row-cols-md-6 g-4 ">
    
    {{-- @foreach ($categories as $key => $category)
        @foreach ($books as $key => $book)
            @if ($category->id == $book->category_id)
               <h4>{{$category->name }}</h4> 
            @endif
        @endforeach
            
    @endforeach --}}
    

    

        @if ($result->count() > 0)

        @foreach ($result as $key => $book)
            <div class="col" style="color: black">
            <div class="card .h-100">
                <img  src="{{ URL::to('/uploads/book/'.$book->img) }}" style="max-height: 7.5cm" class="card-img-top" alt="...">
                <div class="card-body" >
                <h5 class="card-title" style="height: 2.5cm">{{ $book->bookname }}</h5>
                {{-- <p class="card-text">{{ $book->small_descript }}</p> --}}
                </div>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button onclick="window.location.href='{{ url('book/'.$book->IDbook) }}'" type="button" class="btn btn-outline-warning">More infor</button>
                </div>
            </div>
            </div>
        @endforeach

        @else
            <h4>No books found</h4>
        @endif
    
    
        
        

    
  </div>

@endsection
