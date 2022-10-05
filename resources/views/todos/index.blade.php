@extends('layouts.master')

@section('top')

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-white">
                <div class="card-body">
                    <form action="javascript:void(0);">
                        <input type="text" class="form-control add-task" placeholder="New Task...">
                    </form>
                    <ul class="nav nav-pills todo-nav">
                        <li role="presentation" class="nav-item all-task active"><a href="#" class="nav-link">All</a></li>
                        <li role="presentation" class="nav-item active-task"><a href="#" class="nav-link">Active</a></li>
                        <li role="presentation" class="nav-item completed-task"><a href="#" class="nav-link">Completed</a></li>
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
    	                            <a href="javascript:void(0);" class="float-right remove-todo-item"><i class="icon-close"></i></a>
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
