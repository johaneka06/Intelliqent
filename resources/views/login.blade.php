@extends('template/template')
@section('page-title', 'Log In')
@section('page-content')
@if(!Auth::user())

<div class="container text-center mt-5 mb-5">
  <h3>Log In to Start Learning</h3>
  <h5 class="mt-3">Watch classes anywhere, learn from other members, and more.</h5>
  <div class="mt-4 mb-5">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">Log In</button>
    @include('template/login-modal')
  </div>
</div>

@else
@endif
@endsection