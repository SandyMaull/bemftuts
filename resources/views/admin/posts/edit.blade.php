@extends('template.master')

@section('title')
    Edit Posts {{ $posts->title }}
@endsection


@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{url('/admin'.'/'.$bidang)}}">{{ $bidang }}</a></li>
        <li class="breadcrumb-item active">
        Edit
        </li>
    </ol>    
@endsection


@section('content')
    <div class="text-center">
        <img src="{{asset('/assets/img/posts/'.$posts->gambar)}}" width="768px" height="690px" class="img-fluid">
    </div>
    <form action="{{url('/admin'.'/'.$bidang.'/'.$posts->id.'/edit')}}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
        <div class="form-group">
            <label for="title"><h3>Title</h3></label>
            <input type="text" class="form-control" id="title" placeholder="{{$posts->title}}" name="title" value="{{$posts->title}}" required>
        </div>
        <div class="form-group">
            <label for="body"><h3>Body</h3></label>
            <textarea class="form-control" id="body" rows="15" placeholder='{{$posts->body}}' name="body" required>{{$posts->body}}</textarea>
        </div>
        <div class="form-group">
            <label for="gambar">Header Image</label>
            <input type="file" class="form-control-file" accept="image/x-png,image/jpg,image/jpeg" id="gambar" name="gambar" />
            <span>jpeg,jpg,png - Max 8 MB</span>
        </div>
        <input type="hidden" name="userid" value="{{auth()->user()->id}}">
        <input type="hidden" name="bidangid" value='{{$bidang_id}}'>
        <button type="submit" class="btn btn-primary">Edit Data</button><br><br>
    </form>
@endsection