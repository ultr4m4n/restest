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
		                            <span>Name: {{$res->name??null}}</span>
		                            <br>
		                            <span>Email: {{$res->email??null}}</span>
		                            <br>
		                            <span>Gender: {{$res->gender??null}}</span>
		                            <br>
		                            <span>Status: {{$res->status??null}}</span>
		                            <br>
		                            <a href="/user/{{$res->id??null}}" class="btn btn-primary">View User Details</a>
		                        </div>
							@endforeach
							<br>
						@else
							<p>No users found.</p>
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