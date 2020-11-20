@extends('template/template')
@section('page-title', 'Log In')
@section('page-content')
@if(!Auth::user())

<div class="container text-center mt-5">
  <h3>Log In to Connect with Members</h3>
  <h5 class="mt-3">View and follow other members, leave comments, and more.</h5>
  <div class="mt-4">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">Log In</button>
    @include('template/login-modal')
  </div>
</div>

@else
@endif
@endsection