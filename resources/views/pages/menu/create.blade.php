@extends('layouts.admin')

@section('title')
    Create menu
@endsection

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body card-block">
            <form action="{{ route('menu.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="row form-group">
                    <div class="col col-md-3"><label for="name" class=" form-control-label">Nama Manu</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="name" name="name"class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="price" class=" form-control-label">Harga</label></div>
                    <div class="col-12 col-md-9"><input type="number" id="price" name="price" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="category_id" class=" form-control-label">Kategori</label></div>
                    <div class="col-12 col-md-9">
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="0">Please select</option>
                            <option value="1">Option #1</option>
                            <option value="2">Option #2</option>
                            <option value="3">Option #3</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="description" class=" form-control-label">Deskripsi</label></div>
                    <div class="col-12 col-md-9"><textarea name="description" id="description" rows="9" class="form-control"></textarea></div>
                </div>
                <div class="form-group" style="margin-top: 50px">
                    <div class="12">
                        <button class="btn btn-block btn-primary btn-sm">Sumbit</button>
                        <button class="btn btn-block btn-light btn-sm">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection