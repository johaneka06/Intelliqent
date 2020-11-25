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
      <div class="card mb-3" data-aos="fade-up">
        <div class="card-body">
          <div class="row">
            <div class="col-10">
              <h6><strong>{{ $topic->topic_name }}</strong></h6>
              <p class="mt-3">Description: </p>
              <p>{{ $topic->topic_description }}</p>
            </div>

            <div class="col-2 d-flex align-items-center">
              <a href="{{ url('/course/'.$course->id.'/'.$topic->id) }}" class="btn btn-primary align-middle">Learn</a>
            </div>
          </div>

        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection