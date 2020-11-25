@extends('template/template')
@section('page-title', 'Forum')
@section('page-content')


<div class="container mt-3 mb-5">

<div class="ml-auto">
  <form action="{{ url('/forum/search/') }}" method="GET">
    <div class="form-inline ml-auto d-flex justify-content-end mb-5">
      <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search">
      <button class="btn btn-primary ml-sm-2" type="submit">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
          <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
        </svg>
      </button>
    </div>
  </form>
</div>

  <div class="text-center">
    <h1><strong>Forum</strong></h1>
    <div class="w-75 mx-auto d-block mt-3">
      <h4>Explore the forum below for the things you're interested in and discuss with fellow members and professionals</h4>
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