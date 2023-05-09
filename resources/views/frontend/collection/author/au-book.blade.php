@extends('layouts.layout')
@section('books')
<div ></div>
<div style="margin-top: 3cm; margin-left: 10%; width:80%" class="row row-cols-1 row-cols-md-4 g-4 ">
    
    

    @forelse ($books as $key => $book)


    <div class="col" style="color: black">
        <div class="gallery-item h-100 ">
            <img  src="{{ URL::to('/uploads/book/'.$book->img) }}" style="max-width: 5cm; height:7.5cm" class="img-thumbnail" alt="...">
            <div class="card-body" >
            <h5 class="card-title" style="text-align: center; max-width: 5.2cm;height: 2cm">{{ $book->bookname }}</h5>
            </div>
            <div class="btn-group" role="group"  style="margin-left: 15%">
                <button onclick="window.location.href='{{ url('book/'.$book->IDbook) }}'" type="button" class="btn btn-warning" >More infor</button>
              </div>
        </div>
    </div>
        
    @empty 
        
    @endforelse 
    
        

    
  </div>

@endsection
