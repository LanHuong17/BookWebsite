@extends('layouts.layout')
@section('home')
<style>
	.rating-css div {
    color: #ffe400;
    font-family: sans-serif;
    text-transform: uppercase;
  }
  .rating-css input {
    display: none;
  }
  .rating-css input + label {
    text-shadow: 1px 1px 0 #8f8420;
    cursor: pointer;
  }
  .rating-css input:checked + label ~ label {
    color: #b4afaf;
  }
  .rating-css label:active {
    transform: scale(0.8);
    transition: 0.3s ease;
  }
  .checked {
	  color: #ffe400;
  }
</style>
<div style="margin-top: 3cm; " id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

  <div class="carousel-inner" style=" width: 90%; margin-left:5%;">

    @foreach ($sliders as $key => $sliderItem)
    <div class="carousel-item {{ $key == 0 ? 'active':'' }}">
      @if ($sliderItem->image)
      <img src="{{ URL::to('/uploads/slider/'.$sliderItem->image) }}" class="d-block w-100 " alt="...">
      @endif
      <div class="carousel-caption d-none d-md-block">
        {{-- <h5>{{ $sliderItem->title }}</h5>
        <p>{{ $sliderItem->descript }}</p> --}}
      </div>
    </div>
    @endforeach


  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex flex-column justify-content-center align-items-center" data-aos="fade" data-aos-delay="1500">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 text-center">
        <h2>Dive into a good book <span>#BookLife</span> </h2>
        <p>We’re your essential resource for discovering new stories, ideas, and experiences to feed the mind and nourish the soul</p>
        <a href="{{ url('/category') }}" class="btn-get-started">TAKE A LOOK</a>
      </div>
    </div>
  </div>
</section><!-- End Hero Section -->
<!-- ======= Gallery Section ======= -->

<section class="section about-section gray-bg" id="about">
  <div class="container">
    <div class="row align-items-center justify-content-around flex-row-reverse">
      <div class="col-lg-7">
        <div class="about-text">
          <h3 class="dark-color">Sherlock Holmes - The prototype for the modern mastermind detective</h3>
          <h5 class="theme-color"><i>Sherlock Holmes</i> - Arthur Conan Doyle</h5>
          <p>Sherlock Holmes is a fictional detective of the late 19th and early 20th centuries, who first appeared in publication in 1887. <br>
            He was devised by British author and physician Sir Arthur Conan Doyle. <br>
            A brilliant London-based detective, Holmes is famous for his prowess at using logic and astute observation to solve cases.</p>
          <div class="btn-bar">
            <a class="px-btn theme-t" href="{{ url('book/2') }}">View Book</a>
          </div>
        </div>
      </div>
      <div class="col-lg-5 text-center">
        <div class="about-img">
          <img style="max-width: 70%" src="{{ asset('public/frontend/assets/img/sh1.png') }}">
        </div>
      </div>
    </div>
  </div>
</section>

<section id="gallery" class="gallery" style="width: 80%; margin-left: 10%;">
  <div class="trending-book">
    <h2>Same genre of this book</h2>
    <hr>
    <div class="swiper books-slider">
      <div class="swiper-wrapper">
        @foreach ($book1 as $key => $book)
        <div class="swiper-slide">
          <div class="gallery-item h-100">
            <img style="max-width: 5cm; height: 8cm" src="{{ URL::to('/uploads/book/'.$book->img) }}" class="img-thumbnail" alt="">
            <div style="text-align: center; max-width: 5.2cm;" class="gallery-links d-flex align-items-center justify-content-center">
              <a href="{{ url('book/'.$book->IDbook) }}" title="{{ $book->small_descript }}" class="bg-light bg-gradient" style="color: black; width: 100%" {{--  class="glightbox preview-link" --}}><i>{{ $book->bookname }}</i></a>
            </div>
          </div>
        </div><!-- End Gallery Item -->
        @endforeach
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
  </div>
</section><!-- End Gallery Section -->



<section class="section about-section gray-bg" id="about">
  <div class="container">
    <div class="row align-items-center justify-content-around flex-row-reverse">
      <div class="col-lg-4">
        <div class="about-img">
          <img style="max-width: 90%" src="{{ asset('public/frontend/assets/img/lw1.jpg') }}">
        </div>
      </div>
      <div class="col-lg-6 text-center">
        <div class="about-text">
          <h3 class="dark-color">“I'd rather take coffee than compliments just now...”</h3>
          <h5 class="theme-color"><i>Little Women</i> - Louisa May Alcott</h5>
          <p>Growing up with three sisters, Little Women was more than just a book; it was a parallel world. <br>
            Meg, Jo, Beth and Amy became templates against which to compare myself.</p>
          <div class="btn-bar">
            <a class="px-btn theme" href="{{ url('book/1') }}">View Book</a>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<section id="gallery" class="gallery" style="width: 80%; margin-left: 10%;">
  <div class="trending-book">
    <h2>Same genre of this book</h2>
    <hr>
    <div class="swiper books-slider">
      <div class="swiper-wrapper">
        @foreach ($book3 as $key => $book)
        <div class="swiper-slide">
          <div class="gallery-item h-100">
            <img style="max-width: 5cm; height: 8cm;" src="{{ URL::to('/uploads/book/'.$book->img) }}" class="img-thumbnail" alt="">
            <div style="text-align: center; max-width: 5.2cm ;" class="gallery-links d-flex align-items-center justify-content-center">
              <a href="{{ url('book/'.$book->IDbook) }}" title="{{ $book->small_descript }}" class="bg-light bg-gradient" style="color: black; width: 1000%;"><i>{{ $book->bookname }}</i></a>
            </div>
          </div>
        </div><!-- End Gallery Item -->
        @endforeach
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
  </div>
</section><!-- End Gallery Section -->

<section id="gallery" class="gallery" style="width: 80%; margin-left: 10%;">
      <div class="trending-book">
        <h2>Top rating</h2>
        <hr>
        <div class="container-fluid">
          <div class="row gy-4">
            @foreach ($top_books as $book)
                <div class="col-xl-3 col-lg-2 col-md-4" style="height: 8.5cm">
                <div class="gallery-item h-100">
                  <img style="max-width: 5cm; height: 8cm;" src="{{ URL::to('/uploads/book/'.$book->img) }}" class="img-thumbnail" alt="">
                  <div style="text-align: center; max-width: 5.2cm ;;" class="gallery-links d-flex align-items-center justify-content-center">
                  <a href="{{ url('book/'.$book->IDbook) }}" title="{{ $book->small_descript }}" class="bg-light bg-gradient"
                    style="color: black; width: 100%"
                     {{--  class="glightbox preview-link" --}}><i>{{ $book->bookname }}</i></a>
                     
                  </div>
                </div>
                <div>
                  <div class="rating"> <span>{{ number_format($book->avg_rate, 1) }}/5</span>
                    @php
                      $ratenum = number_format($book->avg_rate)
                    @endphp
                    @for ($i = 1; $i <= $ratenum; $i++)
                      <i class="bi bi-star-fill checked"></i>
                    @endfor
                    @for ($j = $ratenum+1; $j <= 5; $j++)
                      <i class="bi bi-star"></i>
                    @endfor
                      <p>{{ $book->user }} rating(s)</p>
                  </div>
                </div>
              </div><!-- End Gallery Item -->
            @endforeach
          </div>  
        </div>
      </div>
    </section>


@endsection
