@extends('layouts.master')

@section('top')

@endsection

@section('content')
<div class="container">
	<div class="row">
	    <div class="col-md-12">
	        <div class="card card-white">
	            <div class="card-body">
	                <ul class="nav nav-pills todo-nav">
	                    <li role="presentation" class="nav-item"><h4>Post a comment<h4></li>
	                </ul>
	                <div class="todo-list">
	                    <div class="todo-item">
					        <form method="post" enctype="multipart/form-data" action="{{ route ('commentCreate', ['id' => $id??0 ]) }}">
					          {{ csrf_field() }} {{ method_field('POST') }}
					          <div class="form-row">
					          	<div class="form-group col-md-6">
					              <label for="c_name">Commentor's Name</label>
					              <input type="text" class="form-control" name="c_name" placeholder="Commentor's name" class="@error('c_name') is-invalid @enderror" required>
					              @error('c_name')
					                <div class="alert alert-danger">{{ $message }}</div>
					              @enderror
					            </div>
					            <div class="form-group col-md-6">
					              <label for="c_email">Commentor's Email</label>
					              <input type="text" class="form-control" name="c_email" placeholder="Post Title" class="@error('c_email') is-invalid @enderror" required>
					              @error('c_email')
					                <div class="alert alert-danger">{{ $message }}</div>
					              @enderror
					            </div>
					            <div class="form-group col-md-6">
					              <label for="c_title">Comment Title</label>
					              <input type="text" class="form-control" name="c_title" placeholder="Post Title" class="@error('c_title') is-invalid @enderror" required>
					              @error('c_title')
					                <div class="alert alert-danger">{{ $message }}</div>
					              @enderror
					            </div>
					            <div class="form-group col-md-6">
					              <label for="c_content">Content</label>
					              <textarea type="text" class="form-control" name="c_content" placeholder="Content" class="@error('c_content') is-invalid @enderror" required></textarea> 
					              @error('c_content')
					                <div class="alert alert-danger">{{ $message }}</div>
					              @enderror
					            </div>
					          </div>
					          <br>
					          <button type="submit" class="btn btn-primary">Post</button>
					        </form>                               
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-white">
                <div class="card-body">
                    <div class="todo-list">
                    	<h2>Post's Comments</h2>
                    	@if($result)
	                    	@foreach($result as $res)
		                        <div class="todo-item">
		                            <span class="">#{{$res->id??null}}</span>
		                            <br>
		                            <span>{{$res->title??null}}</span>
		                            <br>
		                            <p>Comment: {{$res->body??null}}</p>
		                        </div>
							@endforeach
							<br>
						@else
							<p>There are no comment for this post.</p>
						@endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('bot')

@endsection