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
          <h1 class="mb-2 bread">{{ $item->name }}</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('all.menu') }}">Menu <i class="ion-ios-arrow-forward"></i></a></span> <span>Detail <i class="ion-ios-arrow-forward"></i></span></p>
        </div>
      </div>
    </div>
  </section>
  

  <section class="ftco-section">
    <div class="container">
        <h3 class="mb-3">{{ $item->name }}</h3>
        <div class="row d-flex justify-content-between">
            <div class="col-5">
                <div class="menu-pic-zoom">
                    <img class="menu-big-img" src="{{ Storage::url($item->gallery->first()->image) }}" alt="image" style="width: 642px;">
                </div>
            </div>
            <div class="col-4">
                <div class="thubmnail">
                    @foreach ($item->gallery as $gallery)
                    <div class="row mb-3 ">
                        <a href="">
                            <img class="menu-big-img" src="{{ Storage::url($gallery->image) }}" alt="image" style="width: 200px;">
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <h3 class="mt-3">About</h3>
        <p>Rp .{{ number_format($item->price) }} k</p>
        <div class="row">
            <div class="col descrition">
                {!! $item->description !!}
            </div>
            <div class="col-4">
                @auth
                <a  href="https://wasap.at/IG0trB" class="btn btn-success block py-2 px-3 shadow">
                    Pesan Sekarang
                </a>
                @else
                <a  href="{{ route('login') }}" class="btn btn-success block py-2 px-3 shadow">
                    Login
                </a>
                @endauth
            </div>
        </div>
    </div>
  
  </section>
@endsection