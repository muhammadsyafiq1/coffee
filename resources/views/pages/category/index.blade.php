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
                    <h4 class="box-title">List Category</h4>
                </div>
                <div class="card-body--">
                    <div class="table">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Photo</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                <tr>
                                    <td> #{{ $category->id }} </td>
                                    <td>  <span class="name">{{ $category->name }}</span> </td>
                                    <td>  <span class="name"><img src="{{ Storage::url($category->photo) }}" alt="{{ $category->name }}"></span> </td>
                                    <td class="text-center">
                                        <form action="{{ route('category.destroy',$category->id) }}" method="post" class="d-inline">
                                            @csrf @method('DELETE')
                                            <a href="{{ route('category.show',$category->id) }}" class="btn btn-sm btn-secondary">Detail</a>
                                            <a href="{{ route('category.edit',$category->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure ?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <div class="alert alert-primary text-white">
                                        <h5>category Tidak Tersedia</h5>
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div> <!-- /.table-stats -->
                </div>
                <div class="col-12 mt-5">
                    {{ $categories->links() }}
                </div>
            </div> <!-- /.card -->
        </div> 
    </div>
</div>
@endsection