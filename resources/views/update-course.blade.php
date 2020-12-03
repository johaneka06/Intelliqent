@extends('template/template')
@section('page-title', 'Update Course '.e($course->material_name))
@section('page-content')
<div class="container mt-5 mb-5">
  <strong>
    <h3 class="text-center">Update current course</h3>
  </strong>
  <div class="container mt-3 col-6">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
          {{ $error }}
        </div>
        @endforeach
    @endif
    <form action="{{ url('/course/'.$course->id.'/update') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="name">Course Name: </label>
        <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Basic Programming" value="{{ $course->material_name }}">
      </div>
      <div class="form-group">
        <label for="description">Description: </label>
        <textarea type="text" class="form-control" id="description" name="description" placeholder="Description">{{ $course->material_description }}</textarea>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Update Course</button>
        <a href="{{ url('/topic/'.$course->id.'/view') }}" class="btn btn-secondary ml-2">Update Material</a>
      </div>
    </form>
  </div>
</div>
@endsection