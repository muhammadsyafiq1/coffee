@extends('layouts.admin')

@section('title')
    Categories
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
                        <p>{{ $category->name }}</p>
                        <h5 class="mb-2">Slug :</h5>
                        <p>{{ $category->slug }}</p>
                        <h5 class="mb-2">Created at :</h5>
                        <p>{{ $category->created_at->diffForHumans() }}</p>
                        <h5 class="mb-2">Photo</h5> <br>
                        <img src="{{ Storage::url($category->photo) }}" alt="{{ $category->name }}">
                    </div>
                    <div class="form-group">
                        <a href="{{ route('category.index') }}" class="btn btn-sm btn-warning">back</a>
                    </div>
                </div>
            </div> <!-- /.card -->
        </div> 
    </div>
</div>
@endsection