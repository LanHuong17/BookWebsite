@extends('layouts.admin')
@section('content')
<div>
    <div>
        <div>
             <div class="card-body">
                 <div class="row">
                     <div class="col-md-12">
                 
                         @if (session('message'))
                             <div class="alert alert-success">{{ (session('message')) }}</div>
                         @endif
                         <div class="card">
                             <div class="card-header">
                                 <h4>Ratings
                                 </h4>
                             </div>
                             <div class="card-body">
                                 <table style="" class="table table-bordered table-striped">
                                     <thead>
                                         <tr>
                                             <th>Book</th>
                                             <th>User's Name</th>
                                             <th>Rate</th>
                                             <th>Time</th>
                                         </tr>
                                         <tbody>
                                             @foreach ($rates as $rate)
                                                 
                                                 <tr>
                                                     <td>{{ $rate->bookname }}</td>
                                                     <td>{{ $rate->name }}</td>
                                                     <td>
                                                        <div class="rating">
                                                            @php
                                                                $ratenum = number_format($rate->rate)
                                                            @endphp
                                                            @for ($i = 1; $i <= $ratenum; $i++)
                                                                <i class="mdi mdi-star menu-icon"></i>
                                                            @endfor
                                                            @for ($j = $ratenum+1; $j <= 5; $j++)
                                                                <i class="mdi mdi-star-outline menu-icon"></i>
                                                            @endfor
                                                            
                                                        </div>
                                                        
                                                     </td>
                                                     <td>{{ $rate->created_at }}</td>
                             
                                                 </tr>
                                                 
                                             @endforeach
                                             {{ $rates->links('pagination::bootstrap-5') }}
                                         </tbody>
                                     </thead>
                                 </table>
                                 
                                 <div>
                                     {{-- {{ $categories->links() }} --}}
                                 </div>
                                
                             </div>
                         </div>
                     </div>
                 </div>
             </div>  
         </div>
     </div>
     </div>
     
     </div>
     
     @push('script')
     <script>
         window.addEventListener('close-modal', event => {
             $('#deleteModal').modal('hide');
         });
     </script>
     @endpush
     </div>

</div>
    
@endsection