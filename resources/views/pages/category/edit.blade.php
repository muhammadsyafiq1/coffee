@extends('layouts.admin')

@section('title')
    Create menu
@endsection

@section('content')
<div class="col-lg-12">
    @if (session('alert'))
        <div class="alert alert-primary text-center text-white">
            <h5>{{ session('alert') }}</h5>
        </div>
    @endif
    <div class="card">
        <div class="photo p-1">
            <img src="{{ Storage::url($category->photo) }}" alt="{{ $category->name }}">
        </div>
        <div class="card-body card-block">
            <form action="{{ route('category.update',$category->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf @method('PUT')
                <div class="row form-group">
                    <div class="col col-md-3"><label for="name" class=" form-control-label">Nama Kategori</label></div>
                    <div class="col-12 col-md-9"><input value="{{ old('name') ? old('name') : $category->name }}" type="text" id="name" name="name"class="form-control @error('name') is-invalid @enderror"> @error('name')
                        <span class="invalid-feedback">
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        </span>
                    @enderror</div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="photo" class=" form-control-label">Photo Kategori</label></div>
                    <div class="col-12 col-md-9"><input type="file" id="photo" name="photo" class="form-control @error('photo') is-invalid @enderror">
                        @error('photo')
                        <span class="invalid-feedback">
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        </span>
                    @enderror</div>
                </div>
                <div class="form-group" style="margin-top: 50px">
                    <div class="12">
                        <button class="btn btn-block btn-primary btn-sm">Update</button>
                        <a href="{{ route('category.index') }}" class="btn btn-block btn-light btn-sm">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection