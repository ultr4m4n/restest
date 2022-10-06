@extends('layouts.master')

@section('top')

@endsection

@section('content')
<div class="container">
    {{-- @if($user_details) --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card card-white">
                    <div class="card-body">
                        <ul class="nav nav-pills todo-nav">
                            <li role="presentation" class="nav-item"><a href="/user-create-page" class="btn btn-success">User Details</a></li>
                        </ul>
                        <div class="todo-list">
                            <div class="todo-item">
                                <form method="post" enctype="multipart/form-data" action="{{ route ('userUpdate', ['id' => $user_details->id??1 ]) }}">
                                  {{ csrf_field() }} {{ method_field('POST') }}
                                  <div class="form-row">
                                    <div class="form-group col-md-6">
                                      <label for="user_name">Name</label>
                                      <input type="text" class="form-control" name="user_name" value="{{$user_details->name??null}}" class="@error('user_name') is-invalid @enderror" required>
                                      @error('user_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label for="user_email">Email</label>
                                      <input type="text" class="form-control" name="user_email" placeholder="{{$user_details->email??null}}" class="@error('user_email') is-invalid @enderror" required>
                                      @error('user_email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label for="user_gender">Gender</label>
                                      <select name="user_gender" class="form-control">
                                        <option selected="">{{$user_details->gender??null}}</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                      </select>
                                      @error('user_gender')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label for="user_status">Status</label>
                                      <select name="user_status" class="form-control">
                                        <option selected="">{{$user_details->status??null}}</option>
                                        <option>active</option>
                                        <option>inactive</option>
                                      </select>
                                      @error('user_status')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                    </div>
                                  </div>
                                  <br>
                                  <button type="submit" class="btn btn-primary">Update</button>
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
                        	<h3>User's Posts</h3>
                        	@if($posts)
    	                    	@foreach($posts as $post)
    		                        <div class="todo-item">
    		                            <span class="">#{{$post->id??null}}</span>
    		                            <br>
    		                            <span>{{$post->title??null}}</span>
    		                            <br>
    		                            <a href="/post/{{$post->id??null}}" class="btn btn-primary">View Post</a>
    		                        </div>
    							@endforeach
    							<br>
    						@else
    							<p>User hasn't post anything yet.</p>
    						@endif
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
                        	<h3>User's Todos</h3>
                        	@if($todos)
    	                    	@foreach($todos as $todo)
        	                        <div class="todo-item">
        	                            <span class="">#{{$todo->id??null}}</span>
        	                            <br>
        	                            <span>{{$todo->title??null}}</span>
        	                            <br>
        	                            <span>Status: {{$todo->status??null}}</span>
        	                            <br>
        	                            <span>Due date: {{date('d/m/Y', strtotime($todo->due_on))??null}}</span>
        	                        </div>
    							@endforeach
    							<br>
    						@else
    							<p>User has no todo yet.</p>
    						@endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{-- @else --}}
        <!-- <p>No user found.</p> -->
    {{-- @endif --}}
</div>
@endsection

@section('bot')

@endsection