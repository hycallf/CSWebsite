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
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>Bidang Usaha</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_instansi as $instansi)
                                        <tr>
                                            <td>{{ $instansi->id }}</td>
                                            <td>{{ $instansi->nama }}</td>
                                            <td>{{ $instansi->alamat }}</td>
                                            <td>{{ $instansi->email }}</td>
                                            <td>{{ $instansi->bidang }}</td>
                                            <td>
                                                <a href="#modalEdit{{ $instansi->id }}" class="btn btn-warning"
                                                    data-toggle="modal"><i class="icon-note"></i></a>
                                                <a href="#modalHapus{{ $instansi->id }}" class="btn btn-danger"
                                                    data-toggle="modal"><i class="icon-trash"></i></a>
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
                    <h5 class="modal-title">Tambah data instansi</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('instansi.store', $instansi->id) }}">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Nama Instansi</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Instansi">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Bidang Usaha</label>
                            <input type="text" class="form-control" name="bidang" placeholder="Bidang Usaha">
                        </div>
                        <div class="form-group">
                            <label>Alamat Instansi</label>
                            <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat Instansi"></textarea>
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
    @foreach ($data_instansi as $instansi)
        <div class="modal fade" id="modalEdit{{ $instansi->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit data instansi</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('instansi.update', $instansi->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Instansi</label>
                                <input type="text" class="form-control" name="nama" value="{{ $instansi->nama }}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $instansi->email }}">
                            </div>
                            <div class="form-group">
                                <label>Bidang Usaha</label>
                                <input type="text" class="form-control" name="bidang" value="{{ $instansi->bidang }}">
                            </div>
                            <div class="form-group">
                                <label>Alamat Instansi</label>
                                <textarea class="form-control" name="alamat" rows="3">{{ $instansi->alamat }}</textarea>
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
    @foreach ($data_instansi as $instansi)
        <div class="modal fade" id="modalHapus{{ $instansi->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus data instansi</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('instansi.destroy', $instansi->id) }}">
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
