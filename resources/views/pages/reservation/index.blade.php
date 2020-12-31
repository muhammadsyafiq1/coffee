@extends('layouts.admin')

@section('title')
    Reservation
@endsection

@section('content')
<div class="orders">
    <div class="form-inline mb-3">
        <form action="{{ route('reservation') }}" class="search-form mr-auto">
            @csrf
            <input class="form-control mr-sm-2" type="text" placeholder="Search menu ..." aria-label="Search" name="keyword" value="{{ Request::get('keyword') }}">
            <input type="submit" class="btn btn-sm bg-primary text-white" value="Search">
        </form>
    </div>
    <div class="row">
        @if (session('alert'))
            <div class="alert alert-primary text-center text-white">
                <h5>{{ session('alert') }}</h5>
            </div>
        @endif
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">List Menu</h4>
                </div>
                <div class="card-body--">
                    <div class="table">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($reservations as $reservasi)
                                <tr>
                                    <td> #{{ $reservasi->id }} </td>
                                    <td>  <span class="name">{{ $reservasi->user->name }}</span> </td>
                                    <td>  <span class="name">{{ $reservasi->type == 0 ? 'Medium' : 'Premium' }}</span> </td>
                                    <td>  <span class="name">{{ $reservasi->user->email }}</span> </td>
                                    <td>  <span class="name">{{ $reservasi->phone }}</span> </td>
                                    <td class="text-center">
                                        <a href="{{ route('reservation.show',$reservasi->id) }}" class="btn btn-sm btn-secondary">Detail</a>
                                        <a href="{{ route('reservation.destroy',$reservasi->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @empty
                                    <div class="alert alert-primary text-white">
                                        <h5>No data</h5>
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div> <!-- /.table-stats -->
                </div>
                <div class="col-12 mt-5">
                    {{ $reservations->links() }}
                </div>
            </div> <!-- /.card -->
        </div> 
    </div>
</div>
@endsection