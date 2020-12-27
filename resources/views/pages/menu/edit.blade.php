@extends('layouts.admin')

@section('title')
    Edit menu
@endsection

@section('content')
<div class="col-lg-12">\
    <div class="card" style="max-width: 1000px;">
        <div class="card-body">
            <form action="{{ route('menu.update',$menu->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf @method('PUT')
                <div class="row form-group">
                    <div class="col col-md-3"><label for="name" class=" form-control-label">Nama Manu</label></div>
                    <div class="col-12 col-md-9"><input value="{{ old('name') ? old('name') : $menu->name }}" type="text" id="name" name="name"class="form-control @error('name') is-invalid @enderror"> @error('name')
                        <span class="invalid-feedback">
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        </span>
                    @enderror</div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="price" class=" form-control-label">Harga</label></div>
                    <div class="col-12 col-md-9"><input value="{{ old('price') ? old('price') : $menu->price }}" type="number" id="price" name="price" class="form-control @error('price') is-invalid @enderror">
                        @error('price')
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
                                <option value="{{ $category->id }}" {{ $category->id == $menu->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
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
                    <div class="col col-md-3"><label for="description" class=" form-control-label">Deskripsi</label></div>
                    <div class="col-12 col-md-9"><textarea name="description" id="editor" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror">{!! old('description') ? old('description') : $menu->description !!}</textarea> @error('description')
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
                        <a href="{{ route('menu.index') }}" class="btn btn-block btn-light btn-sm">Cancel</a>
                    </div>
                </div>
            </form>
        </div> 
    </div>
</div>
@endsection