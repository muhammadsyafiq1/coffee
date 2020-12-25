@extends('layouts.admin')

@section('title')
    Menu
@endsection

@section('content')
<div class="orders">
    <div class="form-inline mb-3">
        <form action="{{ route('menu.index') }}" class="search-form">
            @csrf
            <input class="form-control mr-sm-2" type="text" placeholder="Search menu ..." aria-label="Search" name="keyword" value="{{ Request::get('keyword') }}">
            <input type="submit" class="btn btn-sm bg-primary text-white" value="Search">
        </form>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">List Menu</h4>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)
                                <tr>
                                    <td> #{{ $item->id }} </td>
                                    <td>  <span class="name">{{ $item->name }}</span> </td>
                                    <td> <span class="product">Daging</span> </td>
                                    <td> <span class="product">{{ $item->price }}</span> </td>
                                    <td class="text-center">
                                        <form action="{{ route('menu.destroy',$item->id) }}" method="post" class="d-inline">
                                            @csrf @method('DELETE')
                                            <a href="{{ route('menu.show',$item->id) }}" class="btn btn-sm btn-secondary">Detail</a>
                                            <a href="{{ route('menu.edit',$item->id) }}" class="btn btn-sm btn-warning">Edit</a>
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
@endsection