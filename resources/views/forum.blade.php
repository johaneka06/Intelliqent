@extends('template/template')
@section('page-title', 'Forum')
@section('page-content')


<div class="container mt-3 mb-5">

<div class="ml-auto">
  <form action="{{ url('/forum/search/') }}" method="GET">
    <div class="form-inline ml-auto d-flex justify-content-end mb-5">
      <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search">
      <button class="btn btn-primary ml-sm-2" type="submit">Search</button>
    </div>
  </form>
</div>

  <div class="text-center">
    <h1><strong>Forum</strong></h1>
    <div class="w-75 mx-auto d-block mt-3">
      <h4>Ask to other member and to the professional if you have a question and they will help you.</h4>
    </div>

    <div class="mt-5 mb-3">
      <div class="card">
        <div class="card-body">
          @if($errors->any())
          @foreach($errors->all() as $error)
          <div class="alert alert-danger">{{ $error }}</div>
          @endforeach
          @endif
          <div class="row">
            <div class="col-9">
              <div class="d-flex align-items-center">
                <label for="select">Filter by category: </label>
                <select name="select" class="custom-select w-50 ml-3" onchange="loadForum()" id="categorySelector">
                  <option value="0">All</option>
                  @foreach($categories as $category)
                  @if(request()->id != null && request()->id == $category->id)
                  <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
                  @else
                  <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                  @endif
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-3">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ForumModal">
                Create new thread
              </button>


            </div>
          </div>
        </div>
      </div>
      @foreach($threads as $thread)
      <div class="card mb-2 text-left">
        <div class="card-body">
          <h5><a href="{{ url('/forum/thread/'.$thread->id) }}">{{ $thread->thread_name }}</a></h5>
          <small>{{ $thread->user->name }} - created in category: {{ $thread->category->category_name }}</small>
        </div>
      </div>
      @endforeach
    </div>

  </div>
</div>

@include('template/forum-modal')
@endsection