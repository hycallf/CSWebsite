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
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>Role</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_user as $item)
                                        <tr>
                                            <td>{{ $item->username }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->role }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>
                                                <a href="#modalEdit{{ $item->username }}" class="btn btn-warning"
                                                    data-toggle="modal"><i class="fa fa-edit"></i></a>
                                                <a href="#modalHapus{{ $item->username }}" class="btn btn-danger"
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
                    <h5 class="modal-title">Tambah data user</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('user.store') }}" id="multiStepForm">
                        @csrf
                        <!-- Step 1 -->
                        <div id="step1">
                            <h3>Account Type</h3>
                            <div class="form-group">
                                <label>Pilih Jenis Akun</label>
                                <select class="form-control" id="accountType" name="role" required>
                                    <option value="mahasiswa">Mahasiswa</option>
                                    <option value="dosen">Dosen</option>
                                </select>
                            </div>
                            <button type="button" class="nextStep btn btn-primary">Next</button>
                        </div>

                        <!-- Step 2 (Mahasiswa) -->
                        <div id="step2-mahasiswa" style="display: none;">
                            <h3>Daftarkan akun mahasiswa</h3>
                            <div class="form-group">
                                <label>Pilih Mahasiswa</label>
                                <select class="form-control" name="username" required id="nimSelect">
                                    <option>---Select One---</option>
                                    @foreach ($data_mahasiswa as $mahasiswa)
                                        <option value="{{ $mahasiswa->nim }}" data-nama="{{ $mahasiswa->nama }}">
                                            {{ $mahasiswa->nim }} - {{ $mahasiswa->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" id="namaMaha" class="form-control" name="name" readonly>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <button type="button" class="prevStep btn btn-secondary">Previous</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                        <!-- Step 2 (Dosen) -->
                        <div id="step2-dosen" style="display: none;">
                            <h3>Daftarkan akun dosen</h3>
                            <div class="form-group">
                                <label>Pilih Dosen</label>
                                <select class="form-control" name="username" required id="nidpSelect">
                                    <option>---Select One---</option>
                                    <!-- Populate this dropdown dynamically with Mahasiswa data -->
                                    @foreach ($data_dosen as $dosen)
                                        <option value="{{ $dosen->nidp }}" data-nama="{{ $dosen->nama }}">
                                            {{ $dosen->nidp }} - {{ $dosen->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" id="namaDosen" class="form-control" name="name" readonly>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <button type="button" class="prevStep btn btn-secondary">Previous</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- modal edit -->
    @foreach ($data_user as $user)
        <div class="modal fade" id="modalEdit{{ $user->username }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit data user</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('user.update', $user->username) }}">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" value="{{ $user->email }}">
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
    @foreach ($data_user as $user)
        <div class="modal fade" id="modalHapus{{ $user->username }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus data user</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('user.destroy', $user->username) }}">
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


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.getElementById('multiStepForm');
            var steps = form.querySelectorAll('div[id^="step"]');
            var currentStep = 0;

            var nextButtons = form.querySelectorAll('.nextStep');
            var prevButtons = form.querySelectorAll('.prevStep');

            nextButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    steps[currentStep].style.display = 'none';
                    currentStep = currentStep + 1;
                    steps[currentStep].style.display = 'block';

                    // Jika di Step 1 user memilih "Mahasiswa", tampilkan langkah 2 untuk Mahasiswa
                    if (currentStep === 1 && document.getElementById('accountType').value ===
                        'mahasiswa') {
                        document.getElementById('step2-mahasiswa').style.display = 'block';
                        document.getElementById('step2-dosen').remove();
                    } else {
                        document.getElementById('step2-mahasiswa').style.display = 'none';
                    }

                    // Jika di Step 1 user memilih "Dosen", tampilkan langkah 2 untuk Dosen
                    if (currentStep === 1 && document.getElementById('accountType').value ===
                        'dosen') {
                        document.getElementById('step2-dosen').style.display = 'block';
                        document.getElementById('step2-mahasiswa').remove();
                    } else {
                        document.getElementById('step2-dosen').style.display = 'none';
                    }
                });
            });

            prevButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    steps[currentStep].style.display = 'none';
                    currentStep = currentStep - 1;
                    steps[currentStep].style.display = 'block';
                    document.getElementById('step2-dosen').style.display = 'none';
                    // document.getElementById('step2-mahasiswa').style.display = 'none';
                });
            });

            $('#nimSelect').change(function() {
                // Dapatkan nilai nama dari atribut data-nama
                var selectedNama = $('#nimSelect option:selected').data('nama');
                var nameFieldValue = selectedNama ? selectedNama : '';
                // Setel nilai input form dengan nilai nama yang dipilih
                $('#namaMaha').val(nameFieldValue);

            });

            $('#nidpSelect').change(function() {
                // Dapatkan nilai nama dari atribut data-nama
                var selectedNama = $('#nidpSelect option:selected').data('nama');
                var nameFieldValue = selectedNama ? selectedNama : '';
                // Setel nilai input form dengan nilai nama yang dipilih
                $('#namaDosen').val(nameFieldValue);
            });
            // ... Bagian setelahnya ...
        });
    </script>
@endsection
