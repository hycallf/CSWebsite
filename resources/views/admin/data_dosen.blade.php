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
                        <h4 class="card-title">Data Dosen</h4>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCreate">Tambah
                            Data</button>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Nim</th>
                                        <th>Nama</th>
                                        <th>Angkatan</th>
                                        <th>Status Mahasiswa</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_mahasiswa as $item)
                                        <tr>
                                            <td>{{ $item->nim }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->angkatan }}</td>
                                            <td>{{ $item->status }}</td>
                                            {{-- <td>{{ $item->alamat }}</td> --}}
                                            <td>
                                                <a href="#modalEdit{{ $item->nim }}" class="btn btn-warning"
                                                    data-toggle="modal"><i class="fa fa-edit"></i></a>
                                                <a href="#modalHapus{{ $item->nim }}" class="btn btn-danger"
                                                    data-toggle="modal"><i class="fa fa-trash"></i></a>
                                            </td>
                                            <!-- Add other table cells as needed -->
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nim</th>
                                        <th>Nama</th>
                                        <th>Angkatan</th>
                                        <th>Status Mahasiswa</th>
                                        <th>Aksi</th>
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

    <!-- modal tambah -->
    <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah data mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('mahasiswa.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>NIM</label>
                            <input type="text" class="form-control" name="nim" placeholder="NIM">
                        </div>
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <label>Angkatan</label>
                            <select class="form-control" name="angkatan">
                                <?php for ($i=2017; $i <= 2024; $i++) {
                                                    ?>
                                <option value="{{ $i }}">{{ $i }}</option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status Mahasiswa</label>
                            <select class="form-control" name="status">
                                @foreach (\App\Models\Mahasiswa::$statuses as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="form-group">
                            <label>Foto</label>
                            <input type="text" class="form-control" name="nim" placeholder="NIM">
                        </div> --}}
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <!-- modal edit -->
    @foreach ($data_mahasiswa as $mhs)
        <div class="modal fade" id="modalEdit{{ $mhs->nim }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit data mahasiswa</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="/mahasiswa/update/{{ $mhs->nim }}">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>NIM</label>
                                <input type="text" class="form-control" name="nim" value="{{ $mhs->nim }}">
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" value="{{ $mhs->nama }}">
                            </div>
                            <div class="form-group">
                                <label>Angkatan</label>
                                <select class="form-control" name="angkatan">
                                    <?php for ($i=2017; $i <= 2024; $i++) {
                                                    ?>
                                    <option value="{{ $i }}">{{ $i }}</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status Mahasiswa</label>
                                <select class="form-control" name="status">
                                    @foreach (\App\Models\Mahasiswa::$statuses as $value => $label)
                                        <option value="{{ $value }}">{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="form-group">
                            <label>Foto</label>
                            <input type="text" class="form-control" name="nim" placeholder="NIM">
                        </div> --}}
                        </div>
                    </form>
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
    @foreach ($data_mahasiswa as $mhs)
        <div class="modal fade" id="modalHapus{{ $mhs->nim }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus data mahasiswa</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form method="GET" action="/mahasiswa/destroy/{{ $mhs->nim }}">
                        @csrf
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
