@extends('layouts.admin')

@section('title')
    Edit story
@endsection

@section('content')
<div class="col-lg-12">\
    <div class="card" style="max-width: 1000px;">
        <div class="card-body">
            <form action="{{ route('story.update',$story->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf @method('PUT')
                <div class="row form-group">
                    <div class="col col-md-3"><label for="title" class=" form-control-label">Title</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="title" name="title" value="{{ old('title') ? old('title') : $story->title }}"  class="form-control @error('title') is-invalid @enderror"> @error('title')
                        <span class="invalid-feedback">
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        </span>
                    @enderror</div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="sub_title" class=" form-control-label">Sub title</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="sub_title" name="sub_title" value="{{ old('sub_title') ? old('sub_title') : $story->sub_title }}"class="form-control @error('sub_title') is-invalid @enderror"> @error('sub_title')
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
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $story->category_id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
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
                    <div class="col-12 col-md-9"><textarea name="content" id="editor" cols="30" rows="10" class="form-control @error('content') is-invalid @enderror">{{ $story->content }}</textarea> @error('content')
                        <span class="invalid-feedback">
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        </span>
                    @enderror</div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="image" class=" form-control-label">Image</label></div>
                    <div class="col-12 col-md-9">
                    <img src="{{ Storage::url($story->image) }}" alt="{{ $story->title }}" style="width: 100px;">
                     <hr>
                    <input type="file" id="image" name="image"class="form-control @error('image') is-invalid @enderror"> 
                    <small>Kosongkan bila (Foto) tidak ingin dirubah.</small>
                    @error('image')
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
                        <a href="{{ route('story.index') }}" class="btn btn-block btn-light btn-sm">Cancel</a>
                    </div>
                </div>
            </form>
        </div> 
    </div>
</div>
@endsection