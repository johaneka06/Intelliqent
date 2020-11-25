@extends('template/template')
@section('page-title', e($thread->thread_name))
@section('page-content')
<div class="container mt-3 mb-4">
  <div class="card">
    <div class="card-body">
      <label><small>{{ $thread->user->name }}</small></label>
      <label class="float-right"><small>{{ (new Carbon\Carbon($thread->created_at))->format('d/m/Y H:i')  }}</small></label>
      <div class="divider d-block"></div>
      <h5 class="mt-2"><strong>{{ $thread->thread_name }}</strong></h5>
      <p class="mt-2">{{ $thread->thread_question }}</p>
      <a href="" data-toggle="modal" data-target="#ForumModal" class="reply-button d-flex justify-content-end">
        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-reply-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path d="M9.079 11.9l4.568-3.281a.719.719 0 0 0 0-1.238L9.079 4.1A.716.716 0 0 0 8 4.719V6c-1.5 0-6 0-7 8 2.5-4.5 7-4 7-4v1.281c0 .56.606.898 1.079.62z"/>
        </svg>
      </a>
        
    </div>
  </div>

  <div class="mt-3 mb-3 text-light-purple font-weight-bold">Replies </div>

  @foreach($replies as $reply)
  <div class="card mt-3">
    <div class="card-body">
      <label><small>{{ $reply->user->name }}</small></label>
      
      <label class="float-right"><small>{{ (new Carbon\Carbon($reply->created_at))->format('d/m/Y H:i')  }}</small></label>
      <div class="divider d-block"></div>
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