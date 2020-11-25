@extends('template/template')
@section('page-title', 'Edit your profile')
@section('page-content')
<div class="container mt-5">
  <h2 class="text-center">Update your profile</h2>
  <div class="card mt-5 w-50 mx-auto d-block justify-content-center mb-5">
    <div class="card-body ">
      @if($errors->any())
      @foreach($errors->all() as $error)
      <div class="alert alert-danger">{{ $error }}</div>
      @endforeach
      @endif

      <form action="{{ url('/member/profile/'.$user->id) }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name">Name: </label>
          <input type="text" name="name" id="name" placeholder="name" class="form-control" value="{{ $user->name }}">
        </div>
        <div class="form-group">
          <label for="username">Username: </label>
          <input type="text" name="username" id="username" placeholder="username" class="form-control" value="{{ $user->username }}">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#changePassword">
            Change Password
          </button>
          <button type="submit" class=" btn btn-primary">Update Profile</button>
        </div>
      </form>
    </div>
  </div>
  @include('template/changepass')
</div>
@endsection