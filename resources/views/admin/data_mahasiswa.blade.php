@extends('layout.admin');

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Mahasiswa</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <a href="#" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah
                            data</a>
                        <table id=".datatable" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Angkatan</th>
                                    <th>Status Mahasiswa</th>
                                    {{-- <th>Alamat</th> --}}
                                    <th>Action</th>
                                    <!-- Add other table headers as needed -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_mahasiswa as $item)
                                    <tr>
                                        <td>{{ $item->nim }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->angkatan }}</td>
                                        <td>{{ $item->status_id }}</td>
                                        {{-- <td>{{ $item->alamat }}</td> --}}
                                        <td>
                                            <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
@endsection
