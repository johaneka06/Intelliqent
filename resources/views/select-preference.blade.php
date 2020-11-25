@extends('template/template')
@section('page-title', 'Intelliqent | Register')

@section('page-content')

<div class="container mt-4">
  <h3 class="text-center mb-5">Select your content preferences</h3>
  @if(!isset($preferences))
  <form action="{{ url('/register/preferences') }}" method="post">
  @else
  <form action="{{ url('/preferences/update') }}" method="post">
  @endif
    @csrf
    
    @foreach($categories as $category)
    @if ($category->id%2==0)
      <div class="d-block pt-3 pb-2">
      <input type="checkbox" name="preferences[]" value="{{$category->id}}" class="mr-3 ml-3" id="{{$category->id}}" {{ isset($preferences) ? (in_array($category->id, $preferences) ? 'checked' : '') : ''  }}>
        <label for="{{$category->id}}">{{$category->category_name}}</label>
      </div>
    @else
      <div class="d-block pt-3 pb-2 bg-light">
        <input type="checkbox" name="preferences[]" value="{{$category->id}}" class="mr-3 ml-3" id="{{$category->id}}" {{ isset($preferences) ? (in_array($category->id, $preferences) ? 'checked' : '') : ''  }}> 
        <label for="{{$category->id}}">{{$category->category_name}}</label>
      </div>
        
    @endif
    
    
    @endforeach
    <div class="text-center">
      <button type="submit" class="btn btn-primary mb-3 mt-5">Save</button>
    </div>
  </form>

  <small class="text-muted d-flex justify-content-center">You may select preferences later</small>
</div>

@endsection