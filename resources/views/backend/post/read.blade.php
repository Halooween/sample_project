@extends('layouts.app')
@section('title', 'read post')

@section('content')
<main role="main" class="container">

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left"></h2>
                        <!-- <a href="index.php?action=create" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New records</a> -->
                    </div>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Content</th>
                                <th>Image</th>
                                <th>Category</th>
                            </tr>
                        </thead>
                        {{-- @foreach ($datas as $data) --}}
    
                        <tr>
                        <td>{{ $datas->id }}</td>
                        <td>{{ $datas->title }}</td>
                        <td>{{ $datas->slug }}</td>
                        <td>{{ $datas->status}}</td>
                        <td>{{ $datas->content}}</td>
                        <td><img style="height: 100px; width:150px;" class="dt-img"src="/images/{{ $datas->images }}"></td>
                        <td>{{ $datas->category}}</td>
                        </tr>
                        {{-- @endforeach --}}
                    </table>
    
                   <a href="{{ route('backend.post.index') }}"><Button class="btn btn-primary">Back</Button></a>
    
                </div>
            </div>
        </div>
    </div>
    </main>

@endsection