@extends('template/template')
@section('page-title', e($current->topic_name))
@section('page-content')
<div class="container mt-3 mb-5 text-center">
  <h2 class="text-center">{{ $current->topic_name }}</h2>
  <p class="text-center mt-4">{{ $current->topic_description }}</p>
  <div class="mt-3 theater-mode">
    <iframe width="720" height="480" src="{{ $current->topic_video }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>
  @if($next != null)
  <div class="text-center mt-3 mb-3">
    <a href="{{ url('/course/'.$current->material_id.'/'.$next->id) }}" class="btn btn-primary">Next Topic</a>
  </div>
  @else
  <div class="text-center mt-3 mb-3">
    <a href="{{ url('/course/') }}" class="btn btn-primary">Learn other topics</a>
  </div>
  @endif
  <div class="mt-3">
    <h5>IDE: </h5>
    <textarea name="code" id="code" cols="113" rows="30" class="ide"></textarea>
    <div class="mt-2">
      <button class="btn btn-primary">RUN</button>
    </div>

  </div>
</div>
@endsection