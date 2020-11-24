@extends('template/template')
@section('page-title', 'Course List')
@section('page-content')
<div class="container mt-4 mb-4">
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

    <div class="col-8 mb-5 ">
      <div class="card mb-5">
        <div class="card-header d-flex">
          <div class="row">
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
              <div class="card">
                <div class="card-header">{{ $course->material_name }}</div>
                <div class="card-body">
                  {{ \Illuminate\Support\Str::limit($course->material_description, 100, '...')  }}

                  @if(\Illuminate\Support\Str::length($course->material_description) > 100)
                  <div class="mt-2">
                    <a href="{{ url('/course/'.$course->id) }}" class="btn-sm btn-primary">Read more</a>
                  </div>
                  @endif
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
</div>
@endsection