<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('logo/intelliqent.png') }}" width="50" height="50" alt="" loading="lazy">
        <h3 class="d-inline ml-1 align-middle"><strong>INTELLIQENT</strong></h3>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link mr-4" href="{{ url('/') }}" id="home"><strong class="navbar-hover-color">Home</strong></a>
            </li>
            <li class="nav-item">
                <a class="nav-link mr-4" href="{{ url('/course') }}" id="learn"><strong class="navbar-hover-color">Learn</strong></a>
            </li>
            <li class="nav-item">
                <a class="nav-link mr-4" href="#" id="forum"><strong class="navbar-hover-color">Forum</strong></a>
            </li>
            @if(!Auth::user())
            <li class="nav-item">
                <a class="nav-link mr-4" href="{{ url('/login') }}" id="login"><strong class="navbar-hover-color">Log In</strong></a>
            </li>
            @else
            <li class="nav-item dropdown mr-4">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <strong class="navbar-hover-color">{{ Auth::user()->username }}</strong>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ url('/member') }}">View Profile</a>
                    <a class="dropdown-item" href="{{ url('/logout') }}">Log Out</a>
                </div>
            </li>

            @endif

        </ul>
    </div>
</nav>