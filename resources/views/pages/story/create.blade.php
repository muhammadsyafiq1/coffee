@extends('layouts.admin')

@section('title')
    Create story
@endsection

@section('content')
<div class="col-lg-12">
    @if (session('alert'))
        <div class="alert alert-primary text-center">
            <h5 class="text-white">{{ session('alert') }}</h5>
        </div>
    @endif
    <div class="card" style="max-width: 1000px;">
        <div class="card-body">
            <form action="{{ route('story.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="row form-group">
                    <div class="col col-md-3"><label for="title" class=" form-control-label">Title</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="title" name="title"class="form-control @error('title') is-invalid @enderror"> @error('title')
                        <span class="invalid-feedback">
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        </span>
                    @enderror</div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="sub_title" class=" form-control-label">Sub title</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="sub_title" name="sub_title"class="form-control @error('sub_title') is-invalid @enderror"> @error('sub_title')
                        <span class="invalid-feedback">
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        </span>
                    @enderror</div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="category_id" class=" form-control-label @error('category_id') is-invalid @enderror">Kategori</label></div>
                    <div class="col-12 col-md-9">
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="0" selected disabled>Pilih Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="invalid-feedback">
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="content" class=" form-control-label">Content</label></div>
                    <div class="col-12 col-md-9"><textarea name="content" id="editor" cols="30" rows="10" class="form-control @error('content') is-invalid @enderror"></textarea> @error('content')
                        <span class="invalid-feedback">
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        </span>
                    @enderror</div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="image" class=" form-control-label">Image</label></div>
                    <div class="col-12 col-md-9"><input type="file" id="image" name="image"class="form-control @error('image') is-invalid @enderror"> @error('image')
                        <span class="invalid-feedback">
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        </span>
                    @enderror</div>
                </div>
                <div class="form-group" style="margin-top: 50px">
                    <div class="12">
                        <button class="btn btn-block btn-primary btn-sm">Sumbit</button>
                        <a href="{{ route('story.index') }}" class="btn btn-block btn-light btn-sm">Cancel</a >
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection