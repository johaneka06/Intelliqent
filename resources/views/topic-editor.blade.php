@extends('template/template')
@section('page-title', 'Edit topic')
@section('page-content')
<div class="container mt-5 mb-5">
  <div class="text-center">
    <h3>Edit topics for {{ $topics[0]->material->material_name }}</h3>
    <div class="container card mt-3">
      <div class="text-right mt-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#topicModal">
          Add new topic
        </button>
      </div>
      @if($errors->any())
      @foreach($errors->all() as $error)
      <div class="alert alert-danger">
        {{ $error }}
      </div>
      @endforeach
      @endif
      
      @foreach($topics as $topic)
      <div class="card mb-3 mt-3">
        <div class="card-content">
          <h4 class="mt-3">Topic #{{ $loop->iteration }}</h4>
          <div class="row">
            <div class="col-8">
              <form action="{{ url('/topic/'.$topic->material->id.'/update/'.$topic->id) }}" method="post">
                @csrf
                <div class="form-inline d-flex justify-content-start mb-3">
                  <label for="name" class="col-3 text-left">Topic Name: </label>
                  <input type="text" name="name" id="name" value="{{ $topic->topic_name }}" class="form-control col-9">
                </div>
                <div class="form-inline mb-3">
                  <label for="desc" class="col-3 text-left">Topic Description: </label>
                  <textarea name="desc" id="desc" class="form-control col-9">{{ $topic->topic_description }}</textarea>
                </div>
                <div class="form-inline mb-3">
                  <label for="name" class="col-3 text-left mb-3">Topic Video: </label>
                  <input type="text" name="video" id="video" value="{{ $topic->topic_video }}" class="form-control col-9">
                </div>
                <div class="mb-3">
                  <button type="submit" class="btn btn-primary">Edit current topic</button>
                </div>
              </form>
            </div>
            <div class="col-4">
              <iframe class="d-flex align-items-center" src="{{ $topic->topic_video }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@include('template/insert-topic')
@endsection