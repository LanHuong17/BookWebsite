@extends('layouts.admin')
@section('content')
<div class="m-3">
    <h3>Danh mục sản phẩm</h3>
    <div class="card">
        <div class="card-header text-white" style="background-color: #343a40">
            <div class="row">
                <div class="col-3"><h5  style="line-height: 35px">Thêm danh mục sản phẩm</h5></div>
                <div class="col"><a href="{{ route('category.create') }}" class="btn btn-success">Thêm danh mục</a></div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($categories as $category)
            <tr id="rm{{ $category->id }}">
                <td>{{ $category->name }}</td>
                <td>{{ $category->image }}</td>
                <td>{{ $category->description }}</td>
            </tr>
            @endforeach     
            </tbody>
        </table>
        </div>
    <!-- /.card-body -->
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
      $('.delete-record').click(function() {
        if(confirm("Bạn có muốn xóa danh mục này ?"))
        {
          var pID = $(this).data("id");
          var token = $("meta[name='csrf-token']").attr('content');
          $.ajax({
              url: '/admin/danh-muc-san-pham/xoa/' + pID,
              type: 'DELETE',
              data: {
                    "pID": pID,
                    "_token": token,
              },
              success :function() {
                $("#rm" + pID).remove();
              }
          });
        }
      });
  });
</script>  
@endsection