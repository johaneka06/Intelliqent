@extends('template/template')
@section('page-title', 'Course List')
@section('page-content')
<div class="container mt-4 mb-5">
  <div class="row">
    <div class="col-4">
      <div class="card">
        <div class="card-header">
          <strong>Filter Category:</strong>
        </div>
        <div class="card-body">
          <form action="{{ url('/course/filter/category') }}" method="get" class="form-group">
            @include('template/sidebar-content')
            <div class="text-center mt-3">
              <button type="submit" class="btn btn-primary">Search</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="col-8  ">
      <div class="card mb-5">
        <div class="card-header d-flex">
          <div class="row d-flex align-items-center">
            <div class="col">
              <strong>Course List</strong>
            </div>
          </div>
          <div class="col d-flex justify-content-end">
            <div class="float-right">
              @include('template/searchbar')
            </div>
          </div>
          
        </div>
        <div class="card-body">
          <div class="row">
            @foreach($courses as $course)
            <div class="col-4 mb-3">
              <div class="card" data-aos="fade-up" data-aos-duration="3000">
                <div class="card-header">{{ $course->material_name }}</div>
                <div class="card-body">
                  {{ \Illuminate\Support\Str::limit($course->material_description, 100, '...')  }}

                  <div class="mt-2">
                    @if(\Illuminate\Support\Str::length($course->material_description) > 100)
                    <a href="{{ url('/course/'.$course->id) }}" class="btn-sm btn-primary">Read more</a>
                    @else
                    <a href="{{ url('/course/'.$course->id) }}" class="btn-sm btn-primary">Learn</a>
                    @endif

                    @if(Auth::user()->isAdmin())
                    <a href="{{ url('course/'.$course->id.'/update') }}" class="btn-sm btn-primary">Edit course</a>
                    @endif
                  </div>
                  
                </div>
              </div>
            </div>
            @endforeach
          </div>
          @if(isset($isPreferred))
          <div class="text-center mt-3">
            <a href="{{ url('/course/all') }}" class="btn btn-primary">See all course</a>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
  @if(Auth::user()->isAdmin())
  <div class="text-center">
    <button class="btn btn-primary" data-toggle="modal" data-target="#courseModal">Create new course</button>
  </div>
  @include('template/insert-course')
  @endif
</div>
@endsection