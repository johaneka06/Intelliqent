@extends('template/template')
@section('page-title', 'Intelliqent | Register')

@section('page-content')

<div class="container mt-4">
  <h3 class="text-center">Select your content preferences</h3>

  <form action="{{ url('/register/preferences') }}" method="post">
    @csrf
    
    @foreach($categories as $category)
    <input type="checkbox" name="preferences[]" value="{{$category->id}}"> {{$category->category_name}}
    @endforeach
    <div class="text-center">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form>

  <small class="text-muted">You may select preferences later</small>
</div>

@endsection