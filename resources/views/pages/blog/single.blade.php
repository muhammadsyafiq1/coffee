@extends('layouts.web')

@section('title')
    Single blog
@endsection

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('/frontend/images/bg_4.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
          <h1 class="mb-2 bread">Stories</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="{{ route('all.blog') }}">Blog <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog Single<i class="ion-ios-arrow-forward"></i></span></p>
        </div>
      </div>
    </div>
  </section>
  
      <section class="ftco-section">
          <div class="container">
              <div class="row">
        <div class="col-lg-8 ftco-animate">
          <h2 class="mb-3">{{ $story->title }}</h2>
          <img src="{{ Storage::url($story->image) }}" alt="{{ $story->title }}">
          <div class="tag-widget post-tag-container mb-5 mt-5">
            <div class="tagcloud">
              <a href="#" class="tag-cloud-link">{{ $story->category->name }}</a>
            </div>
          </div>
          <p>{!! $story->content !!}</p>


          <div class="pt-5 mt-5">
            <h3 class="mb-5 h4 font-weight-bold p-4 bg-light">07 Feedbacks</h3>
            <ul class="comment-list">
              <li class="comment">
                <div class="vcard bio">
                  <img src="/frontend/images/person_1.jpg" alt="Image placeholder">
                </div>
                <div class="comment-body">
                  <h3>John Doe</h3>
                  <div class="meta mb-2">January 03, 2019 at 2:21pm</div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                </div>
              </li>
            </ul>
            <!-- END comment-list -->
            
            <div class="comment-form-wrap pt-5">
              <h3 class="mb-5 h4 font-weight-bold p-4 bg-light">Leave a comment</h3>
              <form action="#" class="p-4 p-md-5 bg-light">
                <div class="form-group">
                  <label for="name">Name *</label>
                  <input type="text" class="form-control" id="name">
                </div>
                <div class="form-group">
                  <label for="email">Email *</label>
                  <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                  <label for="website">Website</label>
                  <input type="url" class="form-control" id="website">
                </div>

                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                </div>

              </form>
            </div>
          </div>
        </div> <!-- .col-md-8 -->

        <div class="col-lg-4 sidebar ftco-animate">
          <div class="sidebar-box">
            <form action="#" class="search-form">
              <div class="form-group">
                <span class="icon icon-search"></span>
                <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
              </div>
            </form>
          </div>
          <div class="sidebar-box ftco-animate">
              <h3>Category</h3>
            <ul class="categories">
              @foreach ($category as $item)
              <li><a href="#">{{ $item->name }} <span>({{ $item->menu->count() }})</span></a></li>
              @endforeach
            </ul>
          </div>

          <div class="sidebar-box ftco-animate">
            <h3>Popular Articles</h3>
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url(/frontend/images/image_1.jpg);"></a>
              <div class="text">
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="icon-calendar"></span> Feb. 04, 2019</a></div>
                  <div><a href="#"><span class="icon-person"></span> Dave Lewis</a></div>
                  <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                </div>
              </div>
            </div>
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url(/frontend/images/image_2.jpg);"></a>
              <div class="text">
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="icon-calendar"></span> Feb. 04, 2019</a></div>
                  <div><a href="#"><span class="icon-person"></span> Dave Lewis</a></div>
                  <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                </div>
              </div>
            </div>
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url(/frontend/images/image_3.jpg);"></a>
              <div class="text">
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="icon-calendar"></span> Feb. 04, 2019</a></div>
                  <div><a href="#"><span class="icon-person"></span> Dave Lewis</a></div>
                  <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                </div>
              </div>
            </div>
          </div>

          <div class="sidebar-box ftco-animate">
              <h3>Archives</h3>
            <ul class="categories">
                <li><a href="#">January 2019 <span>(20)</span></a></li>
                <li><a href="#">December 2018 <span>(30)</span></a></li>
                <li><a href="#">Novemmber 2018 <span>(20)</span></a></li>
              <li><a href="#">September 2018 <span>(6)</span></a></li>
              <li><a href="#">August 2018 <span>(8)</span></a></li>
            </ul>
          </div>
        </div><!-- END COL -->
      </div>
          </div>
      </section>
@endsection