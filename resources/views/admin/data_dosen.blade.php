@extends('layout.admin')

@section('content')
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $title }}</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $title }}</h4>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCreate">Tambah
                            Data</button>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>nidn</th>
                                        <th>Nama</th>
                                        <th>No Telepon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_dosen as $item)
                                        <tr>
                                            <td>{{ $item->nidn }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->notelp }}</td>
                                            {{-- <td>{{ $item->alamat }}</td> --}}
                                            <td>
                                                <a href="#modalEdit{{ $item->nidn }}" class="btn btn-warning"
                                                    data-toggle="modal"><i class="fa fa-edit"></i></a>
                                                <a href="#modalHapus{{ $item->nidn }}" class="btn btn-danger"
                                                    data-toggle="modal"><i class="fa fa-trash"></i></a>
                                            </td>
                                            <!-- Add other table cells as needed -->
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>

    <!-- modal tambah -->
    <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah data dosen</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('dosen.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>nidn</label>
                            <input type="text" class="form-control" name="nidn" placeholder="nidn">
                        </div>
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <label>No Telepon</label>
                            <input type="text" class="form-control" name="notelp" placeholder="No Telepon">
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
    @foreach ($data_dosen as $dsn)
        <div class="modal fade" id="modalEdit{{ $dsn->nidn }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit data dosen</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('dosen.update', $dsn->nidn) }}">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label>nidn</label>
                                <input type="text" class="form-control" name="nidn" value="{{ $dsn->nidn }}">
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" value="{{ $dsn->nama }}">
                            </div>
                            <div class="form-group">
                                <label>No Telepon</label>
                                <input type="text" class="form-control" name="notelp" value="{{ $dsn->notelp }}">
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

    {{-- Modal Hapus --}}
    @foreach ($data_dosen as $dsn)
        <div class="modal fade" id="modalHapus{{ $dsn->nidn }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus data dosen</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('dosen.destroy', $dsn->nidn) }}">
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
