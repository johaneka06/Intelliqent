@extends('template/template')
@section('page-title', 'Intelliqent | Register')
@section('page-content')
<div class="container mt-5">
  <strong>
    <h3 class="text-center">Sign Up</h3>
  </strong>
  <div class="container mt-3 col-6">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
          {{ $error }}
        </div>
        @endforeach
    @endif
    <form action="{{ url('/register') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="name">Name: </label>
        <input type="text" class="form-control" id="name" name="name" placeholder="John Doe">
      </div>
      <div class="form-group">
        <label for="name">Username: </label>
        <input type="text" class="form-control" id="username" name="username" placeholder="JohnDoe001">
      </div>
      <div class="form-group">
        <label for="email">Email address: </label>
        <input type="email" class="form-control" id="email" name="email" placeholder="johndoe@domain.com">
      </div>
      <div class="form-group">
        <label for="password">Password: </label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
      </div>
      <div class="form-group">
        <label for="confirm">Confirmation Password: </label>
        <input type="password" class="form-control" id="confirm" name="confirm" placeholder="Confirmation Password">
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Sign Up</button>
      </div>
      <small class="text-muted">* By clicking Sign Up, you agree to our Terms, Data Policy and Cookie Policy.</small>
    </form>
  </div>
</div>
@endsection