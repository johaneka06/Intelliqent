@extends('template/template')

@section('page-title','Home | Intelliqent')

@section('page-content')
<div class="title-background justify-content-center align-items-center">
  <div class="center-content">
    <h1 class="font-weight-bolder text-white big-and-bold center-self" data-aos="fade-up"
    data-aos-duration="3000">Learn anything,<br>wherever, whenever.</h1>
    @if (!Auth::user())
    <div class="center-self mt-5">
      <a href="{{ url('/login') }}" class="btn btn-secondary font-weight-bold" data-aos="fade-up"
      data-aos-duration="3000">Start your journey</a>
    </div>

    @else
    <div class="center-self mt-5">
      <a href=" {{ url('/course') }} " class=" btn btn-secondary font-weight-bold" data-aos="fade-up"
      data-aos-duration="3000">Start your journey</a>
    </div>

    @endif
  </div>

</div>
<div class="container-fluid text-center mt-4">
    <div class="row">
        <div class="col justify-content-center p-5 text-center">
            <img src="{{ asset('asset/effectiveandfun.png') }}" alt="" class="w-25" data-aos="fade-up"
            data-aos-duration="3000">
            <h5 class="features mt-3" data-aos="fade-up"
            data-aos-duration="3000">Effective and Fun</h5>
            <p class="w-50 mx-auto d-block mt-3" data-aos="fade-up"
            data-aos-duration="3000">Learn through interactive lectures and work with thousands of other people to solve problems</p>
        </div>
        <div class="col justify-content-center p-5 text-center">
            <img src="{{ asset('asset/leadinginstructors.png') }}" alt="" class="w-25" data-aos="fade-up"
            data-aos-duration="3000">
            <h5 class="features mt-3" data-aos="fade-up"
            data-aos-duration="3000">Leading Instructors</h5>
            <p class="w-50 mx-auto d-block mt-3" data-aos="fade-up"
            data-aos-duration="3000">Enjoy thousands of explorations written by award-winning teachers, researchers, and professionals.</p>
        </div>
        <div class="col justify-content-center p-5 text-center">
            <img src="{{ asset('asset/variouslessons.png') }}" alt="" class="w-25" data-aos="fade-up"
            data-aos-duration="3000">
            <h5 class="features mt-3" data-aos="fade-up"
            data-aos-duration="3000">Various Lessons</h5>
            <p class="w-50 mx-auto d-block mt-3"data-aos="fade-up"
            data-aos-duration="3000">Unlimited access to more than 30.000 classes and forums full of passionate people.</p>
        </div>
    </div>
</div>
<div class="why-background text-center d-flex justify-content-center align-self-center">
    <div class="container mt-5 justify-content-center align-self-center">
        <h1 class="features p-5">Why learn on Intelliqent?</h1>
        <div class="row p-5">
            <div class="col">
                <img data-aos="fade-up"
                data-aos-duration="3000" src="{{ asset('asset/learnfromanywhere.png') }}" alt="">
            </div>
            <div class="col justify-content-center align-self-center">
                <h1 data-aos="fade-up"
                data-aos-duration="3000" class="features text-left">Learn from anywhere</h4>
                <p data-aos="fade-up"
                data-aos-duration="3000" class="text-left"> Take classes on the go with Intelliqent. Stream them in the kitchen, the car, or wherever you learn best.</p>
            </div>
        </div>
        <div class="row p-5">
            <div class="col justify-content-center align-self-center">
                <h1 data-aos="fade-up"
                data-aos-duration="3000" class="features text-right">Learn by doing</h4>
                <p data-aos="fade-up"
                data-aos-duration="3000" class="text-right">We believe the best way to learn is by putting your skills to use. That’s why every Intelliqent class has a project that lets you practice and get feedback from people all around the globe.</p>
            </div>
            <div class="col">
                <img data-aos="fade-up"
                data-aos-duration="3000" src="{{ asset('asset/learnbydoing.png') }}" alt="" class="d-inline">
            </div>
        </div>
    </div>
</div>
<div class="footer-background d-flex justify-content-center align-self-center">
    <div class="justify-content-center align-self-center">
        <h1 class="font-weight-bolder text-white less-big-and-bold center-self" data-aos="fade-up"
        data-aos-duration="3000">Start your learning journey today.</h1>
        @if (!Auth::user())
        <div class="center-self mt-4">
          <a href="{{ url('/login') }}" class="btn btn-secondary font-weight-bold" data-aos="fade-up"
          data-aos-duration="3000">Start your journey</a>
        </div>
    
        @else
        <div class="center-self mt-4">
          <a href=" {{ url('/course') }} " class=" btn btn-secondary font-weight-bold" data-aos="fade-up"
          data-aos-duration="3000">Start your journey</a>
        </div>
        @endif
    </div>  
</div>
@endsection