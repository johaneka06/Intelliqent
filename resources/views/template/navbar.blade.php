<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="{{ url('/') }}">
    <img src="{{ asset('logo/intelliqent.png') }}" width="50" height="50" alt="" loading="lazy">
    <h3 class="d-inline ml-1 align-middle"><strong>INTELLIQENT</strong></h3>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
    <div class="navbar-nav ml-auto">
      <a class="nav-link mr-4" href="{{ url('/') }}" id="home"><strong class="navbar-hover-color">Home</strong></a>
      <a class="nav-link mr-4" href="#" id="learn"><strong class="navbar-hover-color">Learn</strong></a>
      <a class="nav-link mr-4" href="#" id="forum"><strong class="navbar-hover-color">Forum</strong></a>
      @if(!Auth::user())
      <a class="nav-link mr-4" href="{{ url('/login') }}" id="login"><strong class="navbar-hover-color">Members</strong></a>
      @else
      <a class="nav-link mr-4" href="{{ url('/member/'.Auth::user()->id) }}" id="member"><strong class="navbar-hover-color">{{ Auth::user()->username }}</strong></a>
      @endif
    </div>
  </div>
</nav>