@extends('template/template')
@section('page-title', e($thread->thread_name))
@section('page-content')
<div class="container mt-3">
  <div class="card">
    <div class="card-body">
      <label><small>{{ $thread->user->name }}</small></label>
      <label class="float-right"><small>{{ (new Carbon\Carbon($thread->created_at))->format('d/m/Y H:i')  }}</small></label>
      <div class="row">
        <div class="col-10">
          <h5 class="mt-2"><strong>{{ $thread->thread_name }}</strong></h5>
          <p class="mt-2">{{ $thread->thread_question }}</p>
        </div>
        <div class="col-2 d-flex align-items-center ">
          <button type="button" class="btn btn-primary text-center" data-toggle="modal" data-target="#ForumModal">
            Reply
          </button>
        </div>
      </div>

    </div>
  </div>

  <div class="mt-3 mb-3">Reply: </div>

  @foreach($replies as $reply)
  <div class="card mt-3">
    <div class="card-body">
      <label><small>Answer from: {{ $reply->user->name }}</small></label>
      <label class="float-right"><small>{{ (new Carbon\Carbon($reply->created_at))->format('d/m/Y H:i')  }}</small></label>
      <div class="row mt-2">
        <div class="col">
          <p>{{ $reply->reply }}</p>
        </div>

      </div>
    </div>
  </div>
  @endforeach

  @include('template/reply')
</div>
@endsection