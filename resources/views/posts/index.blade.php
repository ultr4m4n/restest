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
                    	@if($result)
	                    	@foreach($result as $res)
		                        <div class="todo-item">
		                            <span class="">#{{$res->id??null}}</span>
		                            <br>
		                            <h4>{{$res->title??null}}</h4>
		                            <br>
		                            <a href="/post/{{$res->id??null}}" class="btn btn-primary">View Post</a>
		                        </div>
							@endforeach
							<br>
						@else
							<p>There are currently no post.</p>
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