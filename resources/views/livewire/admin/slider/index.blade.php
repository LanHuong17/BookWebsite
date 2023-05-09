<div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Slider Delete</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form wire:submit.prevent="destroySlider">
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
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-12">

                @if (session('message'))
                <div class="alert alert-success">{{ (session('message')) }}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Slider
                            <a href="{{ url('admin/slider/create') }}" class="btn btn-primary btn-sm float-end">Add Slider</a>
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
                                    <th>Status</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            <tbody>
                                @foreach ($sliders as $slider)
                                <tr>
                                    <td>{{ $slider->IDslider }}</td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->descript }}</td>
                                    <td>
                                        <img style="width: 2cm; height: 2cm;" src="{{ URL::to('/uploads/slider/'.$slider->image) }}" alt="">
                                    </td>
                                    <td>{{ $slider->status == '1' ? 'Hidden':'Visible'}}</td>
                                    <td colspan="2">
                                        <a href="{{ url('admin/slider/'.$slider->IDslider.'/edit') }}" type="button" class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        </button>
                                        <button href="#" wire:click="deleteSlider({{$slider->IDslider}})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger btn-edit btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                    <!-- <td>{{ $slider->action }}</td> -->

                                </tr>

                                @endforeach
                                {{ $sliders->links('pagination::bootstrap-5') }}
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

@push('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#deleteModal').modal('hide');
    });
</script>
@endpush