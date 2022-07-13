@extends('layouts.app')

@section('css')
    <!-- Sweet Alert css-->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" /> --}}
    {{-- <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
  
    {{-- <link href="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" /> --}}
@endsection

@section('content')
my name is role 



<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="mt-5 mb-3 clearfix">
                    {{-- <h2 class="pull-left">Database Details</h2> --}}
                  
                    <a class="btn btn-success add-btn" href="{{ route('backend.role.create') }}"><i
                        class="ri-add-line align-bottom me-1"></i> Create Role</a> <br/>

                    
                        <form action="{{ route('backend.role.destroyAll') }}" method="post">
                            @csrf
                            {{-- {{ method_field('delete') }}  --}}
                                <input type="hidden" name="_method" value="delete">
        
                                <button type="submit" id="btn_all"
                                class="btn btn-sm btn-danger remove-item-btn show_confirm"
                                data-toggle="tooltip" title="Delete">Delete</button>   
                         </form>
                 
                </div>

               


                <div>

                </div>
                <table class="table table-bordered table-striped " id="table_role">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="checkAll"><label></label></th>
                            <th>ID</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    

                </table>
              
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

    
<script type="text/javascript">
        $(function() {

            var table = $('#table_role').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('backend.role.index') }}",
                columns:[
                    {data: 'check', name: 'check', orderable: false,
              searchable: false},
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'action', name: 'action',

              orderable: false,
              searchable: false},
                ]
            });

            
   
        });
    </script> 

{{-- for checkall boxex  --}}

<script type="text/javascript">
$(document).ready(function(){
    
    $("#btn_all").hide(); 

    $('#checkAll').on('click', function(){

        if($(this).is(':checked',true))  
        {
            $(".sub_check").prop('checked', true); 
            $("#btn_all").show(); 

    }
    else{
        $(".sub_check").prop('checked', false);  
        $("#btn_all").hide(); 

    }

    });



    // for deleting multiple data

    $('#btn_all').on('click', function(e){
        e.preventDefault();
        var allvalue=[];

        $('.sub_check:checked').each(function(e){
            allvalue.push($(this).attr('value'));
        });
        console.log(allvalue);

        Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    //   var id= this.value;
    //   console.log(this.value);
          var token = $("meta[name='csrf-token']").attr("content");

     
      $.ajax({
        url: "{{ route('backend.role.destroyAll') }}",
        type:'POST',
        data: {
            "id": allvalue,
            "_token": token,
        },
        success: function(){
            location.reload();
        }
      });
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})

        
    });
    
           
});

</script>

@endsection
{{-- for delete button// roles --}}


