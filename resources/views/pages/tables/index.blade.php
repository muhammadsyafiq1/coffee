@extends('layouts.admin')

@section('title')
    Tables
@endsection

@section('content')
<div class="orders">
    <div class="form-inline mb-3">
        <form action="{{ route('table.index') }}" class="search-form">
            @csrf
            <input class="form-control mr-sm-2" type="text" placeholder="Search table ..." aria-label="Search" name="keyword">
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
                    <h4 class="box-title">List Table</h4>
                    <button data-toggle="modal" data-target="#exampleModal" class="float-right btn btn-sm btn-primary shadow ml-2"><i class="fa fa-plus text-white"></i></button>
                </div>
                <div class="card-body--">
                    <div class="table">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Type</th>
                                    <th>Price</th>
                                    <th>Ready</th>
                                    <th>Created at</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tables as $table)
                                <tr>
                                    <td> #{{ $table->id }} </td>
                                    <td>  <span class="name">{{ $table->types == 1 ? 'Premium' : 'Medium' }}</span> </td>
                                    <td>  <span class="name">{{ $table->price }}</span> </td>
                                    <td>  <span class="name">{{ $table->ready }}</span> </td>
                                    <td>  <span class="name">{{ $table->created_at->diffForHumans() ?? '' }}</span> </td>
                                    <td class="text-center">
                                        <form action="{{ route('table.destroy',$table->id) }}" method="post" class="d-inline">
                                            @csrf @method('DELETE')
                                            <a href="{{ route('table.show',$table->id) }}" class="btn btn-sm btn-secondary">Detail</a>
                                            <a href="{{ route('table.edit',$table->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure ?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <div class="alert alert-primary text-white">
                                        <h5>table Tidak Tersedia</h5>
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div> <!-- /.table-stats -->
                </div>
            </div> <!-- /.card -->
        </div> 
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{ route('table.store') }}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="type">Tipe</label>
                <select name="types" id="type" class="form-control @error('types') is-invalid @enderror" required>
                    <option value="0" selected disabled>Pilih</option>
                    <option value="1">Premium</option>
                    <option value="0">Medium</option>
                </select>
                @error('types')
                    <span class="invalid-feedback">
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" required class="form-control @error('price') is-invalid @enderror" id="price">
                @error('price')
                    <div class="invalid-feedback">
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="ready">Ketersediaan</label>
                <input type="number" required name="ready" required class="form-control @error('ready') is-invalid @enderror" id="ready">
                @error('ready')
                    <div class="invalid-feedback">
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    </div>
                @enderror
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>
@endsection