<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="https://mighty-caverns-66483.herokuapp.com/">Lab 5</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <li class = "{{ 'about' == request()->path() ? 'active' : '' }}">
          <a class="nav-link" href="{{url('about')}}">About</a>
          </li>
          <li class = "{{ 'bookings' == request()->path() ? 'active' : '' }}">
          <a class="nav-link" href="{{url('bookings')}}">Booking</a>
          </li>
          <li class = "{{ 'posts' == request()->path() ? 'active' : '' }}">
          <a class="nav-link" href="{{url('posts')}}">Rooms</a>
          </li>
        </div>
      </div>
    </div>
  </nav>