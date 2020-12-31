@extends('layouts.admin')

@section('title')
    Times
@endsection

@section('content')
<div class="orders">
    <div class="form-inline mb-3">
        <form action="{{ route('time.index') }}" class="search-form">
            @csrf
            <input class="form-control mr-sm-2" type="text" placeholder="Search time ..." aria-label="Search" name="keyword">
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
                    <h4 class="box-title">List Time</h4>
                    <button data-toggle="modal" data-target="#exampleModal" class="float-right btn btn-sm btn-primary shadow ml-2"><i class="fa fa-plus text-white"></i></button>
                </div>
                <div class="card-body--">
                    <div class="table">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Hari</th>
                                    <th>Jam Buka</th>
                                    <th>Jam Tutup</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($times as $time)
                                <tr>
                                    <td> #{{ $time->id }} </td>
                                    <td>  <span class="name">{{ $time->day }}</span> </td>
                                    <td>  <span class="name">{{ date("h:i", strtotime($time->jam_buka ))}}</span> </td>
                                    <td>  <span class="name">{{ date("H:i", strtotime($time->jam_tutup)) }}</span> </td>
                                    <td class="text-center">
                                        <form action="{{ route('time.destroy',$time->id) }}" method="post" class="d-inline">
                                            @csrf @method('DELETE')
                                            <a href="{{ route('time.show',$time->id) }}" class="btn btn-sm btn-secondary">Detail</a>
                                            <a href="{{ route('time.edit',$time->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure ?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <div class="alert alert-primary text-white">
                                        <h5>time Tidak Tersedia</h5>
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
        <form action="{{ route('time.store') }}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Hari</label>
                <input type="text" class="form-control" name="day">
            </div>
            <div class="form-group">
                <label for="jam_buka">Jam buka</label>
                <input type="time" name="jam_buka" required class="form-control" id="jam_buka">
            </div>
            <div class="form-group">
                <label for="jam_tutup">Jam tutup</label>
                <input type="time" name="jam_tutup" required class="form-control" id="jam_tutup">
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