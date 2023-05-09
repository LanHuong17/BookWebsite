@extends('layouts.admin')
@section('content')
<div>
    <div>
        <div>
             <!-- Modal -->
             {{-- <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
                 <div class="modal-dialog">
                 <div class="modal-content">
                     <div class="modal-header">
                     <h1 class="modal-title fs-5" id="exampleModalLabel">Book Delete</h1>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     
                     <form wire:submit.prevent="destroyChapter">
                         <div class="modal-body">
                             <h6>Are you sure?</h6>
                         </div>
                         <div class="modal-footer">
                             <meta name="csrf-token" content="{{ csrf_token() }}">
                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                             <button type="submit" class="btn btn-primary">Yes</button>
                         </div>
                     </form>
                         
                 </div>
                 </div>
             </div> --}}
     
             <div class="card-body">
                 <div class="row">
                     <div class="col-md-12">
                 
                         @if (session('message'))
                             <div class="alert alert-success">{{ (session('message')) }}</div>
                         @endif
                         <div class="card">
                             <div class="card-header">
                                 <h4>Comment
                                 </h4>
                             </div>
                             <div class="card-body">
                                 <table style="" class="table table-bordered table-striped">
                                     <thead>
                                         <tr>
                                             <th>Book</th>
                                             <th>User's Name</th>
                                             <th>Comment</th>
                                             <th>Time</th>
                                             <th>Action</th>
                                         </tr>
                                         <tbody>
                                             @foreach ($cmts as $comment)
                                                 
                                                 <tr>
                                                     <td>{{ $comment->bookname }}</td>
                                                     <td>{{ $comment->name }}</td>
                                                     <td>{{ $comment->cmt }}</td>
                                                     <td>{{ $comment->created_at }}</td>
                                                     <td>
                                                         <a href="{{ url('admin/comments/'.$comment->id.'/delete') }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
                                                     </td>
                                                    {{--  <td>{{ $comment->action }}</td> --}}
                             
                                                 </tr>
                                                 
                                             @endforeach
                                             {{ $cmts->links('pagination::bootstrap-5') }}
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