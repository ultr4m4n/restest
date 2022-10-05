@extends('layouts.master')

@section('top')

@endsection

@section('content')
<div class="container">
  <div class="row">
    <form method="post" enctype="multipart/form-data" action="{{ route ('postCreate') }}">
      {{ csrf_field() }} {{ method_field('POST') }}
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="user_id">User ID</label>
          <input type="text" class="form-control" name="user_id" placeholder="User ID" class="@error('user_id') is-invalid @enderror" required>
          @error('user_id')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group col-md-6">
          <label for="post_title">Post Title</label>
          <input type="text" class="form-control" name="post_title" placeholder="Post Title" class="@error('post_title') is-invalid @enderror" required>
          @error('post_title')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group col-md-6">
          <label for="post_content">Content</label>
          <textarea type="text" class="form-control" name="post_content" placeholder="Content" class="@error('post_content') is-invalid @enderror" required></textarea> 
          @error('post_content')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Post</button>
    </form>
  </div>
</div>
@endsection

@section('bot')

@endsection