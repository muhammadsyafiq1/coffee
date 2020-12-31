@extends('layouts.web')

@section('title')
    Menu
@endsection

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('/frontend/images/bg_4.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
          <h1 class="mb-2 bread">Specialties</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Menu <i class="ion-ios-arrow-forward"></i></span></p>
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
              <p><span>Meat</span>, <span>Potatoes</span>, <span>Rice</span>, <span>Tomatoe</span></p>
            </div>
          </div> 
          @endforeach
        </div>
        @endforeach
      </div>
    </div>
  
  </section>
@endsection