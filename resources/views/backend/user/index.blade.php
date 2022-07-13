@extends('layouts.app')

@section('css')
    <!-- Sweet Alert css-->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" /> --}}
    {{-- <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
  
    {{-- <link href="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" /> --}}
@endsection

@section('content')
my name is user 



<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="mt-5 mb-3 clearfix">
                    <h2 class="pull-left">Database Details</h2>
                    <a class="btn btn-success add-btn" href="{{ route('backend.user.create') }}"><i
                        class="ri-add-line align-bottom me-1"></i> Create New User</a>                </div>


                        <form action="" method="GET" class="form-inline active-purple-4">
                            <input id="searching" class="form-control form-control-sm mr-3 w-75 find " type="text" placeholder="Search" name="search" aria-label="Search">
                            <button type="submit" class="btn btn-primary">search</button>
                            <i class="fas fa-search" aria-hidden="true"></i>
                          </form>
                <table class="table table-bordered table-striped " id="table_id">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="data_table">
                        @foreach ($data as $datas )
                        <tr>
                            <td>{{  $datas->id }}</td>
                            <td>{{ $datas->name }}</td>
                            <td>{{ $datas->email }}</td>
                            <td>{{ $datas->action }}</td>
                          
                        </tr>
                          
                       
                        @endforeach
                     
                    </tbody>

                </table>
                <div>
                    {{-- {{  $data->links('pagination::bootstrap-5')  }} --}}
                </div>
            </div>
        </div>
    </div>
</div>




@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
{{-- 
    <script type="text/javascript">
        $(function() {

            var table = $('#table_id').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('backend.user.index') }}",
                columns:[
                    {data: 'id', name: 'id'},
              {data: 'name', name: 'name'},
              {data: 'email', name: 'email'},
             
          
              {data: 'action', name: 'action',

              orderable: false,
              searchable: false},
                ]
            });

        });
    </script> --}}

    <script type="text/javascript">

document.querySelector('body').addEventListener('click', event => {

// Check if the clicked element was actually a .remove-button
if (event.target.matches('.show_confirm')) {

    event.preventDefault();

    console.log('hello');
    var form = event.target.closest("form");
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonClass: 'btn btn-primary w-xs me-2 mt-2',
        cancelButtonClass: 'btn btn-danger w-xs mt-2',
        confirmButtonText: "Yes, delete it!",
        buttonsStyling: false,
        showCloseButton: true
    }).then(function(result) {
        if (result.value) {

            form.submit();
        }
    });
}
});

    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#searching").on('keyup',function(){
                search_table($(this).val());

            });
            function search_table(value){
                $('#data_table tr').each(function(){
                    var found='false';
                    $(this).each(function(){
                        if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >=0)
                        {
                            found='true';
                        }
                });
                if(found== 'true'){
                    $(this).show();
                }
                else{
                    $(this).hide();
                }
            });

            
        }
    });
    </script>

    @endsection
