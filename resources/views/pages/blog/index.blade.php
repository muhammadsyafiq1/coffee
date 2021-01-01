@extends('layouts.web')

@section('title')
    Blog
@endsection

@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url('/frontend/images/bg_4.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
          <h1 class="mb-2 bread">Stories</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog <i class="ion-ios-arrow-forward"></i></span></p>
        </div>
      </div>
    </div>
  </section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
        @foreach ($stories as $story)
        <div class="col-md-4 ftco-animate">
            <div class="blog-entry">
            <a href="{{ route('single.blog', $story->slug) }}" class="block-20" style="background-image: url('/frontend/images/image_1.jpg');">
            </a>
            <div class="text px-4 pt-3 pb-4">
                <div class="meta">
                <div><a href="#">{{ date('M/d/Y',strtotime($story->created_at)) }}</a></div>
                <div><a href="#">{{ $story->user->name }}</a></div>
                </div>
                <h3 class="heading"><a href="#">{{ $story->title }}</a></h3>
                <p class="clearfix">
                <a href="{{ route('single.blog',$story->slug) }}" class="float-left read">Read more</a>
                <a href="#" class="float-right meta-chat"><span class="icon-chat"></span> 3</a>
                </p>
            </div>
            </div>
        </div>
        @endforeach
        </div>
    </div>
</section>

@endsection