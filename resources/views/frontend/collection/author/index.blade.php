@extends('layouts.layout')
@section('books')

<div class="container">
    <div class="row ng-scope">
        <div class="col-md-9 col-md-pull-3" style=" width: 80%; margin-left: 10%; " >
            @forelse ($authors as $key => $author)
                <section class="search-result-item" style="background-image: linear-gradient(antiquewhite, azure);">
                <a class="image-link" href="#"><img class="image" src="{{ 'uploads/author/'.$author->img }}">
                </a>
                <div class="search-result-item-body" >
                    <div class="row">
                        <div class="col-sm-9">
                            <h4 class="search-result-item-heading"><a href="#">{{ $author->auname }}</a></h4>
                            <p class="info"></p>
                            <p style="color: dimgray" class="description">{{ $author->description }}</p>
                        </div>
                        <div class="col-sm-3 text-align-center">
                            <p class="value3 mt-sm"></p>
                            <p class="fs-mini text-muted"></p><a class="btn btn-warning btn-info" href="{{ 'author/'.$author->IDauthor }}">View Book</a>
                        </div>
                    </div>
                </div>
            </section>
            @empty
                <h4>404</h4>
            @endforelse
            {{ $authors->links('pagination::bootstrap-5') }}
            
        </div>
        {{-- {{ $authors->links('pagination::bootstrap-5') }} --}}
    </div>
    </div>
   
@endsection