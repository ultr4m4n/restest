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
                        <li role="presentation" class="nav-item"><a href="/todos-create-page" class="btn btn-success">Create Todos</a></li>
                    </ul>
                    <div class="todo-list">
                        @if($result)
                        	@foreach($result as $res)
    	                        <div class="todo-item">
    	                            <span class="">#{{$res->id??null}}</span>
    	                            <br>
    	                            <span>{{$res->title??null}}</span>
    	                            <br>
    	                            <span>Status: {{$res->status??null}}</span>
    	                            <br>
    	                            <span>Due date: {{date('d/m/Y', strtotime($res->due_on))??null}}</span>
    	                        </div>
    						@endforeach
    						<br>
                        @else
                            <p>No todos found.</p>
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
