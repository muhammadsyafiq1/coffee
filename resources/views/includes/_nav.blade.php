<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light ftco-navbar-light-2" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">Coffee</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
            <li class="nav-item"><a href="{{ route('all.menu') }}" class="nav-link">Specialties</a></li>
            <li class="nav-item"><a href="{{ route('reservationPage') }}" class="nav-link">Reservation</a></li>
            <li class="nav-item"><a href="{{ route('all.blog') }}" class="nav-link">Stories</a></li>
            @auth
            <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Dashboard</a></li>
            @else
            <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">login</a></li>
            @endauth
        </ul>
      </div>
    </div>
  </nav>