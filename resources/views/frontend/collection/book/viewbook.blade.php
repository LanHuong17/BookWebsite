@extends('layouts.layout')
@section('books')
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
<div>
	 
    <!--Important link from https://bootsnipp.com/snippets/XqvZr-->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"><div class="pd-wrap">
		
		<div>
			<div class="container">
				@foreach ($books as $key => $book)
					@foreach ($categories as $key => $category)
					@foreach ($authors as $key => $author)
						@if ($category->id == $book->category_id)
						@if ($author->IDauthor == $book->IDauthor)
		
				
				<div class="row">
					<div class="col-md-4">
						<div id="slider" class="card" style="border: none">
							<div class="imgbox">
								<img style="width: 9cm;" src="{{ asset('/uploads/book/'.$book->img) }}" />
								  {{-- <img src="{{ '/uploads/book/'.$book->img }}" /> --}}
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="product-dtl">
							<div class="heading-section">
								<h2>{{ $book->bookname }}</h2>
							</div>
							<div class="mt-40" style="text-align: justify;">
								<p>{!!nl2br($book->small_descript);!!}</p>
							</div>
							<div class="book-btn">
								<div class="btn-group" role="group" aria-label="Basic outlined example">
									<div>
										<a href="{{ url('book/'.$book->IDbook.'/chapter/1') }}" class="btn btn-warning btn-lg"><i class="bi bi-book"></i> Start Reading</a>
										@if ($type === 'add')
											<a href="javascript:void(0)" id="action-library" class="btn btn-outline-info btn-lg" data-book-id="{{ $book->IDbook }}" data-type="add">
												Add To Library
											</a>
										@else
											<a href="javascript:void(0)" id="action-library" class="btn btn-outline-info btn-lg" data-book-id="{{ $book->IDbook }}" data-type="del">
												Remove from Library
											</a>
										@endif
									</div>
									
								</div>
							</div>
							{{-- rating --}}

							<h6 style="margin-top: 15px">Rating: <br></h6>
							
							<div class="rating"> <span>{{ number_format($rate_avg ,1); }}</span>
								@php
									$ratenum = number_format($rate_avg)
								@endphp
								@for ($i = 1; $i <= $ratenum; $i++)
									<i class="fa fa-star checked"></i>
								@endfor
								@for ($j = $ratenum+1; $j <= 5; $j++)
									<i class="fa fa-star"></i>
								@endfor
								
								<span>{{ $rates->count() }} ratings</span>
							</div>
						</div>
							<div class="product-info">
								<h6>Tags:</h6>
									<div class="btn-group">
										<div style="margin-right: 10px" class="product-name">
											<a class="btn btn-primary btn-sm" href="{{ url('category/'.$category->id) }}" role="button">{{ $category->name }}</a></div>
										<div class="product-name">
											<a class="btn btn-primary btn-sm" href="{{ url('author/'.$author->IDauthor) }}" role="button">{{ $author->auname }}</a></div>
									</div>
								<a href=""></a>
								<h6 style="margin-top: 10px;">Your rating: </h6> 
								  <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
									Rate {{ $book->bookname }}
								  </button>
								  <!-- Modal -->
								  {{-- user rating --}}
									<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog">
										<div class="modal-content">
											<form action="{{ url('/rating') }}" method="POST">
												@csrf
												<input type="hidden" name="book_id" value="{{ $book->IDbook }}">
												<div class="modal-header">
												<h1 class="modal-title fs-5" id="exampleModalLabel"><h6 style="margin-top: 10px">Your rating: </h6></h1>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													<div class="rating-css">
														<div class="star-icon">
															@if ($user_rate)
																@for ($i = 1; $i <= $user_rate->rate; $i++)
																	<input type="radio" value="{{ $i }}" name="book_rating" checked id="rating{{ $i }}">
																	<label for="rating{{ $i }}" class="fa fa-star"></label>
																@endfor
																@for ($j = $user_rate->rate+1; $j <= 5; $j++)
																	<input type="radio" value="{{ $j }}" name="book_rating" id="rating{{ $j }}">
																	<label for="rating{{ $j }}" class="fa fa-star"></label>
																@endfor
																
															@else
																<input type="radio" value="1" name="book_rating" id="rating1">
																<label for="rating1" class="fa fa-star"></label>
																<input type="radio" value="2" name="book_rating" id="rating2">
																<label for="rating2" class="fa fa-star"></label>
																<input type="radio" value="3" name="book_rating" id="rating3">
																<label for="rating3" class="fa fa-star"></label>
																<input type="radio" value="4" name="book_rating" id="rating4">
																<label for="rating4" class="fa fa-star"></label>
																<input type="radio" value="5" name="book_rating" id="rating5">
																<label for="rating5" class="fa fa-star"></label>
															@endif

															
															
														</div>
													</div>
												</div>
												<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-primary">Save changes</button>
												</div>	
											</form>
											
										</div>
										</div>
									</div>
							</div>
							
					</div>
				</div>
					@endif
					@endif
					@endforeach
					@endforeach
					
				<div class="product-info-tabs">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						  <li class="nav-item">
							<a class="nav-link active" id="description-tab" data-toggle="tab" 
							href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" id="review-tab" data-toggle="tab" 
							href="#review" role="tab" aria-controls="review" aria-selected="false">Chapter</a>
						  </li>
					</ul>
					<div class="tab-content" id="myTabContent">
						  <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
							<div class="mt-40" style="text-align: justify;">
								<p>{!!nl2br($book->descript);!!}</p>
							</div>
						  </div>
						  <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
							 @endforeach



							@foreach ($chapters as $chapter)
							
								{{-- @if ($chapter->IDbook = $book->IDbook)
										
								@endif --}}
							  			<ul class="list-group"> 
											<li value="{{ $chapter->IDchap }}" class="list-group-item" style="height: 1.3cm;">
												<a href="{{ url('book/'.$chapter->IDbook.'/chapter/'.$chapter->IDchap) }}">{{ $chapter->chapname }}</a>
												<p class="float-end" style="color: #b4afaf"><i>Upload at {{ $chapter->created_at }}</i></p>
											</li>
										</ul>	
							@endforeach
							{{ $chapters->links('pagination::bootstrap-5') }}
							
							
							  
						  </div>
					</div>
				</div>
				
				
			</div>
		</div>
		</div>
		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="	sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	

</div>
<script>
	
	$(document).ready(function(){
		$('#action-library').click(function () {
			let book_id = $(this).attr("data-book-id");
			let type = $(this).attr("data-type");
			let url = '';
			if (type === 'add') {
				url = '/B4/add-to-library';
			} else {
				url = '/B4/del-from-library';
			} 

			$.ajax({
				method: "POST",
				url: url,
				headers: {
                	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            	},
				data: {
					'book_id' : book_id
				},
				success: function (response) {
					if (type === 'add') {
						$('#action-library').text("Remove from Library");
						$('#action-library').attr("data-type", "del");
					} else {
						$('#action-library').text("Add To Library");
						$('#action-library').attr("data-type", "add");
					}
					
				}
			});
		});
});
</script>
 
@endsection