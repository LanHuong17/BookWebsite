<div>
    <div wire:ignore.self class="modal fade" id="deleteAuthorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Author delete</h1>
              <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyAuthor">
                <div class="modal-body">
                    <h4>Are u sure?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Delete</button>
                </div>
            </form>
                
          </div>
        </div>
      </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Author
                        <a href="{{ url('admin/author/create') }}" class="btn btn-primary btn-sm text-white float-end">Add Author</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th colspan="2">Action</th>
                            </tr>
                            <tbody>
                                @forelse ($authors as $author)
                                    <tr>
                                        <td>{{ $author->IDauthor }}</td>
                                        <td>{{ $author->auname }}</td>
                                        <td style=" max-width: 80px;
                                                        overflow: hidden;
                                                        text-overflow: ellipsis;
                                                        white-space: nowrap;">{{ $author->description }}</td>
                                        <td>
                                            <img style="width: 1.5cm; height: 1.5cm;" src="{{ URL::to('uploads/author/'.$author->img) }}" alt="">
                                        </td>
                                        <td colspan="2">
                                            <a href="{{ url('admin/author/'.$author->IDauthor.'/edit') }}" type="button" class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            </button>
                                            <button href="#" wire:click="deleteAuthor({{ $author->IDauthor }})" data-bs-toggle="modal" 
                                                data-bs-target="#deleteAuthorModal" class="btn btn-danger btn-edit btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                        <!-- <td>{{ $author->action }}</td> -->
                
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No author found</td>    
                                    </tr>    
                                @endforelse

                               {{ $authors->links('pagination::bootstrap-5') }}
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


@push('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#addAuthorModal').modal('hide');
            $('#updateAuthorModal').modal('hide');
            $('#deleteAuthorModal').modal('hide');
        });
    </script>
@endpush
