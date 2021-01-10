@extends('layouts.landingPage')

@section('title')
    Coffee Shop
@endsection

@section('content')
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">Coffee</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="{{ route('all.menu') }}" class="nav-link">Menu</a></li>
          @auth
          <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Dashboard</a></li>
          <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
          <form action="{{ route('logout') }}" method="post" class="d-none" id="logout-form">
          @csrf
          </form>
          @else
          <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
          @endauth
      </ul>
    </div>
  </div>
</nav>
<section class="home-slider js-fullheight owl-carousel bg-white">
  <div class="slider-item js-fullheight">
    <div class="overlay"></div>
    <div class="container-fluid p-0">
      <div class="row d-md-flex no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
        <div class="one-third order-md-last img js-fullheight" style="background-image:url(/frontend/images/bg_3.jpg);">
          <div class="overlay"></div>
        </div>
        <div class="one-forth d-flex js-fullheight align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
          <div class="text mt-md-5">
            <h1 class="mb-4">Eat Healthy <br> and Natural Foods</h1>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country.</p>
            <p><a href="#booking" class="btn btn-primary px-4 py-3 mt-3">Book A Table</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="slider-item js-fullheight">
    <div class="overlay"></div>
    <div class="container-fluid p-0">
      <div class="row d-flex no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
        <div class="one-third order-md-last img js-fullheight" style="background-image:url(/frontend/images/bg_2.jpg);">
          <div class="overlay"></div>
        </div>
        <div class="one-forth d-flex js-fullheight align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
          <div class="text mt-md-5">
            <h1 class="mb-4">We Love <br> Delicious Foods</h1>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country.</p>
            <p><a href="#booking" class="btn btn-primary px-4 py-3 mt-3">Book A Table</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="ftco-section ftco-wrap-about ftco-no-pb ftco-no-pt">
  <div class="container">
    <div class="row no-gutters">
      <div class="col-sm-5 img img-2 d-flex align-items-center justify-content-center justify-content-md-end" style="background-image: url(/frontend/images/about.jpg); position: relative"></div>
      <div class="col-sm-7 wrap-about py-5 ftco-animate">
        <div class="heading-section mt-5 mb-4">
          <div class="pl-lg-5 ml-md-5">
            <span class="subheading">About</span> <br>
            <h2 class="mb-4">Welcome to coffee Restaurant</h2>
          </div>
        </div>
        <div class="pl-lg-5 ml-md-5">
          <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
          <h3 class="mt-5">Special Recipe</h3>
          <div class="thumb my-4 d-flex">
            @foreach ($special as $item)
            <a href="#" class="thumb-menu pr-md-4 text-center">
              <div class="img" style="background-image: url('{{ Storage::url($item->gallery->first()->image) }}');"></div>
              <h4>{{ $item->name }}</h4>
            </a>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(/frontend/images/bg_4.jpg);" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row d-md-flex align-items-center justify-content-center">
      <div class="col-lg-10">
        <div class="row d-md-flex align-items-center">
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text">
                <strong class="number" data-number="18">0</strong>
                <span>Years of Experienced</span>
              </div>
            </div>
          </div>
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text">
                <strong class="number" data-number="{{ $user }}">0</strong>
                <span>Happy Customers</span>
              </div>
            </div>
          </div>
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text">
                <strong class="number" data-number="{{ $menu }}">0</strong>
                <span>Finished Projects</span>
              </div>
            </div>
          </div>
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text">
                <strong class="number" data-number="{{ $category->count() }}">0</strong>
                <span>Category</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-2">
      <div class="col-md-7 text-center heading-section ftco-animate">
        <span class="subheading">Specialties</span> <br>
        <h2 class="mb-4">Our Menu</h2>
      </div>
    </div>
    <div class="row">
      @foreach ($category as $category)
      <div class="col-md-6 col-lg-4 menu-wrap">
        <div class="heading-menu text-center ftco-animate">
          <h3>{{ $category->name }}</h3>
        </div>
        @foreach ($category->menu as $item)
        <div class="menus d-flex ftco-animate">
          <div class="menu-img img" style="background-image: url('{{ Storage::url($item->gallery->first()->image) }}');"></div>
          <div class="text">
            <div class="d-flex">
              <div class="one-half">
                <h3>{{ $item->name }}</h3>
              </div>
              <div class="one-forth">
                <span class="price">{{ number_format($item->price) }} k</span>
              </div>
            </div>
            <a href="{{ route('detail.menu',$item->slug) }}" class="px-4 btn btn-success btn-sm shadow"><span>Detail</span></a>
          </div>
        </div> 
        @endforeach
      </div>
      @endforeach
    </div>
  </div>

</section>

<section class="ftco-section testimony-section" style="background-image: url(/frontend/images/bg_5.jpg);" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-2">
      <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
        <span class="subheading">Testimony</span> <br>
        <h2 class="mb-4">Happy Customer</h2>
      </div>
    </div>
    <div class="row ftco-animate justify-content-center">
      <div class="col-md-7">
        <div class="carousel-testimony owl-carousel ftco-owl">
          <div class="item">
            <div class="testimony-wrap text-center py-4 pb-5">
              <div class="user-img mb-4" style="background-image: url(/frontend/images/person_1.jpg)">
                <span class="quote d-flex align-items-center justify-content-center">
                  <i class="icon-quote-left"></i>
                </span>
              </div>
              <div class="text p-3">
                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <p class="name">Arthur Browner</p>
                <span class="position">Customer</span>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimony-wrap text-center py-4 pb-5">
              <div class="user-img mb-4" style="background-image: url(/frontend/images/person_2.jpg)">
                <span class="quote d-flex align-items-center justify-content-center">
                  <i class="icon-quote-left"></i>
                </span>
              </div>
              <div class="text p-3">
                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <p class="name">Arthur Browner</p>
                <span class="position">Customer</span>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimony-wrap text-center py-4 pb-5">
              <div class="user-img mb-4" style="background-image: url(/frontend/images/person_3.jpg)">
                <span class="quote d-flex align-items-center justify-content-center">
                  <i class="icon-quote-left"></i>
                </span>
              </div>
              <div class="text p-3">
                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <p class="name">Arthur Browner</p>
                <span class="position">Customer</span>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimony-wrap text-center py-4 pb-5">
              <div class="user-img mb-4" style="background-image: url(/frontend/images/person_4.jpg)">
                <span class="quote d-flex align-items-center justify-content-center">
                  <i class="icon-quote-left"></i>
                </span>
              </div>
              <div class="text p-3">
                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <p class="name">Arthur Browner</p>
                <span class="position">Customer</span>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimony-wrap text-center py-4 pb-5">
              <div class="user-img mb-4" style="background-image: url(/frontend/images/person_3.jpg)">
                <span class="quote d-flex align-items-center justify-content-center">
                  <i class="icon-quote-left"></i>
                </span>
              </div>
              <div class="text p-3">
                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <p class="name">Arthur Browner</p>
                <span class="position">Customer</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  

<section class="ftco-section ftco-no-pt ftco-no-pb" id="booking">
  <div class="container">
    <div class="row d-flex">
      <div class="col-md-5 ftco-animate img img-2" style="background-image: url(/frontend/images/bg_6.jpg);"></div>
      <div class="col-md-7 ftco-animate makereservation p-4 p-md-5">
        <div class="heading-section ftco-animate mbookingb-5">
          <span class="subheading">Book a Table</span> <br>
          <h2 class="mb-4">Make Reservation</h2>
        </div>
        <form action="{{ route('reservation.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" value="{{ Auth::user()->name ?? '' }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" name="email" value="{{ Auth::user()->email ?? '' }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Phone</label>
                <input type="text" class="form-control" name="phone" >
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="type">Tipe</label>
                <select name="table_id" id="type" class="form-control">
                    <option value="0" disabled selected>Pilih</option>
                    @foreach ($tables as $table)
                        <option value="{{ $table->id }}">{{ $table->types == 1 ? 'Premium' : 'Medium' }}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="person">Person</label>
                <div class="select-wrap one-third">
                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                  <select name="person" id="person" class="form-control">
                    <option value="">Person</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4+</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Date</label>
                <input type="date" name="date" id="date" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Time</label>
                <input type="time" name="time" class="form-control" id="time">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Upload Bukti</label>
                <input type="file" name="image" class="form-control" id="image">
              </div>
            </div>
            <div class="col-md-12 mt-3">
              <div class="form-group">
                @auth
                <input type="submit" value="Make a Reservation" class="btn btn-primary py-3 px-5">
                @else
                <input type="submit" value="Silahkan Login dulu" class="btn btn-primary py-3 px-5" href={{ route('login') }}>
                @endauth
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection