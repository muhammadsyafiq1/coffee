@extends('layouts.admin')

@section('title')
    Menu
@endsection

@section('content')
<div class="orders">
    <div class="form-inline mb-3">
        <form action="{{ route('category.index') }}" class="search-form">
            @csrf
            <input class="form-control mr-sm-2" type="text" placeholder="Search category ..." aria-label="Search" name="keyword">
            <input type="submit" class="btn btn-sm bg-primary text-white" value="Search">
        </form>
    </div>
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
                        <p>{{ $menu->name }}</p>
                        <h5 class="mb-2">category :</h5>
                        <p>{{ $menu->category->name ?? '' }}</p>
                        <h5 class="mb-2">Price :</h5>
                        <p>Rp.{{ number_format($menu->price )}}</p>
                        <h5 class="mb-2">Desc :</h5>
                        <p>{!! $menu->description !!}</p>
                        <h5 class="mb-2">Created at :</h5>
                        <p>{{ $menu->created_at->diffForHumans() ?? '' }}</p>
                    </div>
                    <div class="form-group">
                        <a href="{{ route('menu.index') }}" class="btn btn-sm btn-warning">back</a>
                    </div>
                </div>
            </div> <!-- /.card -->
        </div> 
    </div>
</div>
@endsection