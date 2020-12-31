@extends('layouts.web')

@section('title')
    make-reservation
@endsection

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('/frontend/images/bg_4.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
          <h1 class="mb-2 bread">Make Reservation</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Reservation <i class="ion-ios-arrow-forward"></i></span></p>
        </div>
      </div>
    </div>
  </section>
  
      <section class="ftco-section ftco-no-pt ftco-no-pb">
          <div class="container">
              <div class="row d-flex">
        <div class="col-md-5 ftco-animate img img-2" style="background-image: url(/frontend/images/bg_6.jpg);"></div>
        <div class="col-md-7 ftco-animate makereservation p-4 p-md-5">
            <div class="heading-section ftco-animate mb-5">
                <span class="subheading mb-3">Book a Table</span>
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