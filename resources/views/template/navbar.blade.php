<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('logo/intelliqent.png') }}" width="50" height="50" alt="" loading="lazy">INTELLIQENT</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
    <div class="navbar-nav ml-auto">
      <a class="nav-link" href="{{ url('/') }}" id="home">Home</a>
      <a class="nav-link" href="#" id="services">Services</a>
      <a class="nav-link" href="#" id="why">Why Intelliqent</a>
      <a class="nav-link" href="#" id="learn">Learn</a>
      <a class="nav-link" href="#" id="forum">Forum</a>
      @if(!Auth::user())
      <a class="nav-link" href="{{ url('/login') }}" id="login">Members</a>
      @else
      <a class="nav-link" href="#" id="member">{{ Auth::user()->username }}</a>
      @endif
    </div>
  </div>
</nav>