<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('storage/logo/intelliqent.png') }}" width="50" height="50" alt="" loading="lazy">INTELLIQENT</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
    <div class="navbar-nav ml-auto">
      <a class="nav-link active" href="#">Home</a>
      <a class="nav-link" href="#">Services</a>
      <a class="nav-link" href="#">Why Intelliqent</a>
      <a class="nav-link" href="#">Learn</a>
      <a class="nav-link" href="#">Forum</a>
      @if(!Auth::user())
      <a class="nav-link" href="{{ url('/login') }}">Members</a>
      @else
      <a class="nav-link" href="#">Members</a>
      @endif
    </div>
  </div>
</nav>