@extends('layout.admin')

@section('content')
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Supervisor</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Supervisor</h4>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCreate">Tambah
                            Data</button>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>ID Supervisor</th>
                                        <th>Nama</th>
                                        <th>No. Telp</th>
                                        <th>Email</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($supervisor as $item)
                                        <tr>
                                            <td>{{ $item->id_supervisor }}</td>
                                            <td>{{ $item->nama_supervisor }}</td>
                                            <td>{{ $item->notelp }}</td>
                                            <td>{{ $item->email }}</td>
                                            {{-- <td>{{ $item->alamat }}</td> --}}
                                            <td>
                                                <a href="#modalEdit{{ $item->id_supervisor }}" class="btn btn-warning"
                                                    data-toggle="modal"><i class="fa fa-edit"></i></a>
                                                <a href="#modalHapus{{ $item->id_supervisor }}" class="btn btn-danger"
                                                    data-toggle="modal"><i class="fa fa-trash"></i></a>
                                            </td>
                                            <!-- Add other table cells as needed -->
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID Supervisor</th>
                                        <th>Nama</th>
                                        <th>No. Telp</th>
                                        <th>Email</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>

    <!-- Large modal -->
    <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah data supervisor</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form method="POST" action="/supervisor/store">
                    @csrf
                    <div class="modal-body">
                        
                        <div class="form-group">
                            <label>Nama Supervisor</label>
                            <input type="text" class="form-control" name="nama_supervisor" placeholder="Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <label>No Telepon</label>
                            <input type="text" class="form-control" name="notelp" placeholder="No Telepon">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" name="email" placeholder="E-mail">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modal edit -->
    @foreach ($data_supervisor as $supervisor)
        <div class="modal fade" id="modalEdit{{ $supervisor->id_supervisor }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit data supervisor</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="/supervisor/update/{{ $supervisor->id_supervisor }}">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                           
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_supervisor" value="{{ $supervisor->nama_supervisor }}">
                            </div>
                            
                            <div class="form-group">
                                <label>No Telepon</label>
                                <input type="text" class="form-control" name="notelp" value="{{ $supervisor->notelp }}">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" value="{{ $supervisor->email }}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <!-- modal hapus -->
    @foreach ($data_supervisor as $supervisor)
        <div class="modal fade" id="modalHapus{{ $supervisor->id_supervisor }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus data supervisor</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="/supervisor/destroy/{{ $supervisor->id_supervisor }}">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            <h5>Yakin ingin menghapus data?</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">cancel</button>
                            <button type="submit" class="btn btn-danger">Yakin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach


    
@endsection
