@extends('layouts.layout')
@section('library')

@if ($libraries->count() > 0)
<form action="" method="post">
@csrf
	<div style="margin-top: 3cm; margin-left: 1cm; margin-right: 1cm;" class="row row-cols-1 row-cols-md-6 g-4 ">
		@foreach ($libraries as $key => $libr)
			<div class="col" style="color: black">
				<div class="card .h-100" style="width: fit-content;">
					<img  src=" {{ URL::to('/uploads/book/'.$libr->img) }} " style="max-width: 5.5cm; height:7.5cm" class="card-img-top" alt="...">
		
						<div class="card-body" >
							<h6 class="card-title" style="text-align: center; max-width: 5.2cm;height: 1cm">{{ $libr->bookname }}</h6>
						{{-- <p class="card-text">{{ $book->small_descript }}</p> --}}
						</div>
						<div class="btn-group" role="group" aria-label="Basic example">
							<button onclick="window.location.href='{{ url('book/'.$libr->IDbook) }}'" type="button" class="btn btn-outline-warning">Read</button>
							<a href="{{ url('delete/'.$libr->IDbook) }}" id="action-library" class="btn btn-outline-info" data-book-id="{{ $libr->IDbook }}" data-type="del">
								Remove
							</a>
						</div>
				</div>
			</div>
		@endforeach
	</div>

</form>

@else
    <h4>No book</h4>
@endif


@endsection

{{-- <script>
	$(document).ready(function(){
		$('#action-library').click(function () {
			let book_id = $(this).attr("data-book-id");
			let url = '/B3/del-to-library';

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
</script> --}}