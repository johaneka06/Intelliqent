@extends('template/template')
@section('page-title', 'Learn: '.e($course->material_name))

@section('page-content')
<div class="container mt-3 mb-5">

  <div class="text-center">
    <h3>{{ $course->material_name }}</h3>
  </div>

  <div class="mt-3">
    <div id="description">
      <h5>Description: </h5>
      <p>{{ $course->material_description }}</p>
    </div>

    <div class="mt-3">
      <h5>Number of Topics: {{ count($course->topics) }}</h5>
    </div>

    <div class="topic-list mt-3 mb-5">
      <h5>Topic List: </h5>
      @foreach($course->topics as $topic)
      <div class="card mb-3">
        <div class="card-body">
          <h6><strong>{{ $topic->topic_name }}</strong></h6>
          <p class="mt-3">Description: </p>
          <p>{{ $topic->topic_description }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection