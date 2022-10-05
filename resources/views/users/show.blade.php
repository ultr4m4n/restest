@extends('layouts.master')

@section('top')

@endsection

@section('content')
<div class="container">
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
</div>
@endsection

@section('bot')

@endsection