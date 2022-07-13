@extends('layouts.app')
@section('title', 'post index')
@section('content')

<main role="main" class="container">

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Record</h2>
                  
                    <form action="{{ route('backend.post.update',$datas) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title"  id="slug_source" class="form-control"  value="{{ $datas->title }}" oninput="myslug(this) ">
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug"  id="slug_target" class="form-control" value="{{ $datas->slug }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <input type="text" name="content" class="form-control" value="{{ $datas->content }}" >
                        </div>
                        <div class="form-group">
                            <div class="radio">
                                <label><input type="radio" name="status"  id="stat" {{ $datas->status == '1' ? 'checked' : ''}} value="1" checked> active</label>
                                <label><input type="radio" name="status"  id="stat" {{ $datas->status == '0' ? 'checked' : ''}} value="0"> offline</label>
                            </div>
                            </div>
                        <div class="form-group">
                            <label> Select an image:</label><br>
                            <img style="height: 100px; width:150px;" src="/images/{{ $datas->images }}">
                                 <input type="file" name="uploadfile" accept=".jpg" id="uploadfile" class="form-control"  value="">
                                  
                                 <input type="button" value="Delete" id="del_img" name="btn_delete" />
                                 <input type="button" value="Update" name="btn_delete" />
     
                        </div>
                        <div class="form-group">
                                <label for="category">Category</label>
                                <select id="category" name="category">
                                
                                  <option {{ $datas->category == 'none' ? 'selected' : ''}} value="none">select one</option>
                                  <option {{ $datas->category == 'instagram' ? 'selected' : ''}} value="instagram">instagram</option>
                                  <option {{ $datas->category == 'facebook' ? 'selected' : ''}} value="facebook">facebook</option>
                                  <option {{ $datas->category == 'pinterest' ? 'selected' : ''}} value="pinterest">pinterest</option>
                                  <option {{ $datas->category == 'tweeter' ? 'selected' : ''}} value="tweeter">tweeter</option>
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