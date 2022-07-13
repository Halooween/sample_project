@extends('layouts.app')
@section('title', 'post index')
@section('content')


    <main role="main" class="container">

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Record</h2>
                  
                    <form action="{{ route('backend.post.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title"  id="slug_source" class="form-control"  oninput="myslug(this) ">
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug"  id="slug_target" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <input type="text" name="content" class="form-control" >
                        </div>
                        <div class="form-group">
                            <div class="radio">
                                <label><input type="radio" name="status"  id="stat" value="1" checked> active</label>
                                <label><input type="radio" name="status"  id="stat" value="0"> offline</label>
                            </div>
                            </div>
                        <div class="form-group">
                            <label> Select an image:</label><br>
                                 <input type="file" name="uploadfile" accept=".jpg" id="uploadfile" class="form-control">
                                 <!-- <img src="" height="1000px" width="1000px"> -->
     
                                 <input type="button" value="Delete" id="del_img" name="btn_delete" />
                                 <input type="button" value="Update" name="btn_delete" />
     
                        </div>
                        <div class="form-group">
                                <label for="category">Category</label>
                                <select id="category" name="category">
                                  <option value="select">select one</option>
                                  <option value="instagram">instagram</option>
                                  <option value="facebook">facebook</option>
                                  <option value="pinterest">pinterest</option>
                                  <option value="tweeter">tweeter</option>
                                </select>
                        </div>
                      
                        {{-- <input type="hidden" name="_method" value="DELETE"> --}}
                        <input type="submit" name="create" class="btn btn-primary" id="submit"  value="Submit">
                        <a href="{{ route('backend.post.index') }}" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                   
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
@endsection

