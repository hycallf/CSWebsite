@extends('layout.admin');

@section('content')
    <div class="container-fluid px-3">
        <a href="#" class="btn btn-primary"><ion-icon name="add-circle-outline"></ion-icon>Tambah
            data</a>
        <table id="datatable" class="table">
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
                        <td>{{ $item->statuses }}</td>
                        {{-- <td>{{ $item->alamat }}</td> --}}
                        <td>
                            <a href="#" class="btn btn-warning"><ion-icon name="create-outline"></ion-icon></a>
                            <a href="#" class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon></a>
                        </td>
                        <!-- Add other table cells as needed -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
@endsection
