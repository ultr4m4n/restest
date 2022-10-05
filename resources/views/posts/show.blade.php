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