@extends('layouts.layout')
@section('category')

      

    <div class="row row-cols-1 g-3 " style=" width: 80%; margin-left: 10%">
        @foreach ($categories as $key => $category)

          <div class="card" style="background-image: linear-gradient(antiquewhite, azure);max-width: 1000px; ">
            <div class="row no-gutters">
                <div class="col-sm-2">
                    <img src="{{ URL::to('/uploads/category/'.$category->image) }}" class="card-img-top h-100" alt="...">
                </div>
                <div class="col-sm-10">
                    <div class="card-body">
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <p class="card-text">{{ $category->description }}</p>
                        <a href="{{url('category/'.$category->id) }}" class="btn btn-warning btn-info">See All</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
  
@endsection