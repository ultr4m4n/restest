@extends('layouts.master')

@section('top')

@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="card card-white">
      <div class="card-body">
        <ul class="nav nav-pills todo-nav">
            <h2>Create User</h2>
        </ul>
        <form method="post" enctype="multipart/form-data" action="{{ route ('userCreate') }}">
          {{ csrf_field() }} {{ method_field('POST') }}
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="user_name">Name</label>
              <input type="text" class="form-control" name="user_name" placeholder="Full Name" class="@error('user_name') is-invalid @enderror" required>
              @error('user_name')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="user_email">Email</label>
              <input type="text" class="form-control" name="user_email" placeholder="Email" class="@error('user_email') is-invalid @enderror" required>
              @error('user_email')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="user_gender">Gender</label>
              <select name="user_gender" class="form-control">
                <option selected>Male</option>
                <option>Female</option>
              </select>
              @error('user_gender')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="user_status">Status</label>
              <select name="user_status" class="form-control">
                <option selected>active</option>
                <option>inactive</option>
              </select>
              @error('user_status')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <br>
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('bot')

@endsection