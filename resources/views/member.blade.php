@extends('template/template')
@section('page-title', e($user->name). ' - ' . e($user->username))
@section('page-content')
<div class="container mt-5 mb-5">
  <div class="header text-center">
    <h2>Profile</h2>
  </div>
  <div class="row mt-5">
    <div class="col-3">
      <div class="card text-center">
        <div class="card-body">
          <div>
            <img src="{{ asset('/profile/'.$user->profile) }}" alt="{{ $user->profile }}" class="circle">
          </div>
          <h4 class="mt-3">{{ $user->name }}</h4>
          <h6 class="mt2">{{ $user->username }}</h6>
          <a href="#" class="btn btn-primary">Edit Profile</a>
        </div>
      </div>
    </div>

    <div class="col-9">
      <div class="card">
        <div class="card-body">
          <h3>Progress Report</h3>
          @foreach($courseCount as $course)
          @foreach($studied as $study)
          @if($study->material_id == $course->material_id)
          <div class="card mt-3">
            <div class="card-body">
              @foreach($categories as $cat)
              @if($cat->id == $course->category_id)
              {{ $cat->category_name }}
              <br>
              {{ $course->material_name }}
              <br>
              {{ ($study->counter / $course->counter) * 100 }} %
              @endif
              @endforeach
            </div>
          </div>
          @endif
          @endforeach
          @endforeach
          
        </div>
      </div>
      
    </div>
  </div>


</div>
@endsection