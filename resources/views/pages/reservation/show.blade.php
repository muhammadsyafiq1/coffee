@extends('layouts.admin')

@section('title')
    Show
@endsection

@section('content')
<div class="orders">
    <div class="row">
        <div class="col-lg-12">
            @if (session('alert'))
                <div class="alert alert-primary text-center text-white">
                    <h5>{{ session('alert') }}</h5>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <h5 class="mb-2">Name :</h5>
                        <p>{{ $reservation->user->name }}</p>
                        <h5 class="mb-2">email :</h5>
                        <p>{{ $reservation->user->email }}</p>
                        <h5 class="mb-2">person :</h5>
                        <p>{{ $reservation->person }}</p>
                        <h5 class="mb-2">phone :</h5>
                        <p>{{ $reservation->phone }}</p>
                        <h5 class="mb-2">date :</h5>
                        <p>{{ date('d-m-y',strtotime($reservation->date)) }}</p>
                        <h5 class="mb-2">time :</h5>
                        <p>{{ $reservation->time }}</p>
                        <h5 class="mb-2">Created at :</h5>
                        <p>{{ $reservation->created_at->diffForHumans() ?? '' }}</p>
                    </div>
                    <div class="form-group">
                        <a href="{{ route('reservation') }}" class="btn btn-sm btn-warning">back</a>
                    </div>
                </div>
            </div> <!-- /.card -->
        </div> 
    </div>
</div>
@endsection