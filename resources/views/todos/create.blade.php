@extends('layouts.master')

@section('top')

@endsection

@section('content')
<div class="container">
  <div class="row">
    <form method="post" enctype="multipart/form-data" action="{{ route ('todosCreate') }}">
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
          <label for="todos_title">Todos Title</label>
          <input type="text" class="form-control" name="todos_title" placeholder="Todos Title" class="@error('todos_title') is-invalid @enderror" required>
          @error('todos_title')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group col-md-6">
          <label for="todos_status">Status</label>
          <select name="todos_status" class="form-control">
            <option selected>active</option>
            <option>completed</option>
          </select>
          @error('todos_status')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group col-md-6">
          <label for="todos_due_date">Due Date</label>
          <input type="date" class="form-control" name="todos_due_date" placeholder="Todos Due Date" class="@error('todos_due_date') is-invalid @enderror" required>
          @error('todos_due_date')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
</div>
@endsection

@section('bot')

@endsection