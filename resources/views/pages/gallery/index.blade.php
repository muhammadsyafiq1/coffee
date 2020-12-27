@extends('layouts.admin')

@section('title')
    Gallery
@endsection

@section('content')
<div class="orders">
    <div class="form-inline mb-3">
        <form action="{{ route('gallery.index') }}" class="search-form">
            @csrf
            <input class="form-control mr-sm-2" type="text" placeholder="Search menu ..." aria-label="Search" name="keyword" value="{{ Request::get('keyword') }}">
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
                    <h4 class="box-title">List Gallery Menu</h4>
                    <button data-toggle="modal" data-target="#exampleModal" class="float-right btn btn-sm btn-primary shadow ml-2"><i class="fa fa-plus text-white"></i></button>
                </div>
                <div class="card-body--">
                    <div class="table">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>ID_image</th>
                                    <th>Menu</th>
                                    <th>Image</th>
                                    <th>Created at</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)
                                <tr>
                                    <td> #{{ $item->id }} </td>
                                    <td>  <span class="name">{{ $item->menu->name }}</span> </td>
                                    <td>  <span class="product"><img src="{{ Storage::url($item->image) }}" style="width: 80px;" alt="{{ $item->menu->name }}"></span> </td>
                                    <td>  <span class="product"></span>{{ $item->created_at->diffForHumans()}}</td>
                                    <td class="text-center">
                                        <form action="{{ route('gallery.destroy',$item->id) }}" method="post" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure ?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <div class="alert alert-primary text-white">
                                        <h5>Menu Tidak Tersedia</h5>
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div> <!-- /.table-stats -->
                </div>
                <div class="col-12 mt-5">
                    {{ $items->links() }}
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
        <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Menu</label>
                <select name="menu_id" id="menu_id" required class="form-control">
                    <option value="0" disabled selected>Pilih Menu</option>
                    @foreach ($menus as $menu)
                        <option value="{{ $menu->id }}">
                            {{ $menu->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" required class="form-control" id="image">
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