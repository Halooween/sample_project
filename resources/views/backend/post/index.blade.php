@extends('layouts.app')
@section('title', 'post index')
@section('content')


<main role="main" class="container">

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Post Details</h2>
                        <a href="{{ route('backend.post.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New records</a>
                    </div>

                    <table class="table table-bordered table-striped " id="table_id">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Content</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        {{-- @foreach ($datas as $data)
                        
                            <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->title }}</td>
                            <td>{{ $data->slug }}</td>
                            <td>{{ $data->content}}</td>
                            <td>{{ $data->status}}</td>
                            <td>
                                <a href="{{  route('page.show',$data) }}" class="mr-3" title="View Record" data-toggle="tooltip"><span  class="fa fa-eye"></span></a>
                                <a href="{{  route('page.edit',$data) }}" class="mr-3" title="update Record" data-toggle="tooltip"><span class="fa fa-edit"></span></a>
                                <form method="POST" action="{{  route('page.destroy',$data->id) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                               
                            </td>

                            </tr>
                        @endforeach --}}

                    </table>
                
                </div>
            </div>
        </div>
    </div> 
</main>

@endsection


@section('script')
<script >
    function myslug(e)
  {
    var a = e.value;
    var b = a.toLowerCase().replace(/ /g, '-')
        .replace(/[^\w-]+/g, '');
        console.log(b)
    document.getElementById("slug_target").value = b;
    document.getElementById("slug-target-span").innerHTML = b;
  }
  </script>



<script type="text/javascript">
    $(document).ready(function () {
      
      var table = $('#table_id').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('backend.post.index') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'title', name: 'title'},
              {data: 'slug', name: 'slug'},
              {data: 'status', name: 'status'},
              {data: 'content', name: 'content'},
              {data: 'images', name: 'images'},
              {data: 'category', name: 'category'},
              {data: 'action', name: 'action', 
              orderable: false,
              searchable: false},
          ]
      });
    });
    
</script>
@endsection

