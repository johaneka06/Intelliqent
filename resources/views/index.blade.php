@extends('template/template')

@section('page-title','Home | Intelliqent')

@section('page-content')
<div class="title-background justify-content-center align-items-center">
    <div class="center-content">
        <h1 class="font-weight-bolder text-white big-and-bold center-self">Learn anything,<br>wherever, whenever.</h1>
        @if (!Auth::user())
            <div class="center-self mt-5">
                <a href="{{ url('/login') }}" class="btn btn-primary font-weight-bold">Start your journey</a>
            </div>
            
        @else
            <a href="" class="btn btn-primary font-weight-bold">Start your journey</a>
        @endif
    </div>
    
</div>
@endsection