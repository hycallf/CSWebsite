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
                        <button type="button" class="btn btn-primary mb-4" data-toggle="modal"
                            data-target="#modalCreate">Tambah
                            Data</button>

                        @foreach ($data_publikasi as $mk)
                            <div class="row border-3">
                                <div class="col-12">
                                    <div class="card mb-4 border-1">
                                        <div class="row no-gutters">
                                            <!-- Image container (left side) -->
                                            <div class="col-md-4">
                                                <img src="theme/images/profile/3.jpg" class="card-img image-fluid"
                                                    style="height: 100%;">
                                            </div>
                                            <!-- Description container (right side) -->
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3">{{ $mk->judul }}</h5>
                                                    <h6 class="card-subtitle text-muted mb-2">Jurnal :
                                                        {{ $mk->jurnal }}
                                                    </h6>
                                                    <h6 class="card-subtitle mb-3 text-muted">Penerbit : {{ $mk->penerbit }}
                                                    </h6>
                                                    <p class="card-text">{{ $mk->desc }}</p>
                                                </div>

                                                <div class="card-footer">
                                                    <a href="#modalEdit{{ $mk->id }}" class="btn btn-warning"
                                                        data-toggle="modal"><i class="fa fa-edit"></i> Edit</a>
                                                    <a href="#modalHapus{{ $mk->id }}" class="btn btn-danger"
                                                        data-toggle="modal"><i class="fa fa-trash"> Delete</i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
                    <h5 class="modal-title">Tambah data publikasi</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('publikasi.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" class="form-control" name="judul" placeholder="Judul">
                        </div>
                        <div class="form-group">
                            <label>Penerbit</label>
                            <input type="text" class="form-control" name="penerbit" placeholder="Penerbit">
                        </div>
                        <div class="form-group">
                            <label>Jurnal Publikasi</label>
                            <input type="text" class="form-control" name="jurnal" placeholder="Tempat Publikasi">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <div class="summernote form-control" name="desc" aria-placeholder="Ketik Deskripsi jurnal">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Abstrak</label>
                            <div class="summernote form-control" name="abstrak" aria-placeholder="Ketik Deskripsi jurnal">
                            </div>
                        </div>

                        <div class="form-group" id="mahasiswas-container">
                            <label for="mahasiswas">Mahasiswa yang berkontribusi :</label>
                            <div id="mahasiswas">
                                <!-- Initial select field for Mahasiswas -->
                                <select class="form-control mb-2" name="mahasiswas[]" required>
                                    <option value="">Select Mahasiswa</option>
                                    @foreach ($mahasiswas as $mahasiswa)
                                        <option value="{{ $mahasiswa->nim }}">{{ $mahasiswa->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="button" class="btn btn-success" onclick="addMahasiswaField()">Add
                                Mahasiswa</button>
                        </div>

                        <div class="form-group mt-3" id="dosens-container">
                            <label for="dosens">Dosen yang berkontribusi :</label>
                            <div id="dosens">
                                <!-- Initial select field for Mahasiswas -->
                                <select class="form-control mb-2" name="dosens[]" required>
                                    <option value="">Select Mahasiswa</option>
                                    @foreach ($dosens as $dosen)
                                        <option value="{{ $dosen->nidp }}">{{ $dosen->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="button" class="btn btn-success" onclick="addDosenField()">Add
                                Dosen</button>
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
    {{-- @foreach ($data_publikasi as $mk)
        <div class="modal fade" id="modalEdit{{ $mk->id_matkul }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit data publikasi</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('publikasi.update', $mk->id_matkul) }}">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Kode Matakuliah</label>
                                <input type="text" class="form-control" name="id_matkul" value="{{ $mk->id_matkul }}">
                            </div>
                            <div class="form-group">
                                <label>Nama Matakuliah</label>
                                <input type="text" class="form-control" name="nama" value="{{ $mk->nama }}">
                            </div>
                            <div class="form-group">
                                <label>SKS</label>
                                <input type="text" class="form-control" name="sks" value="{{ $mk->sks }}">
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
    @endforeach --}}

    {{-- Modal Hapus --}}
    {{-- @foreach ($data_publikasi as $mk)
        <div class="modal fade" id="modalHapus{{ $mk->id_matkul }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus data publikasi</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('publikasi.destroy', $mk->id_matkul) }}">
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
    @endforeach --}}

    <script>
        // Create arrays to store selected Mahasiswas and Dosens
        var selectedMahasiswas = [];
        var selectedDosens = [];

        function updateSelectedMahasiswas() {
            // Reset the array each time a selection changes
            selectedMahasiswas = [];

            // Iterate through all selected Mahasiswas and add their values to the array
            var selectedOptions = document.querySelectorAll('#mahasiswas select');
            selectedOptions.forEach(function(select) {
                selectedMahasiswas.push(select.value);
            });
        }

        function updateSelectedDosens() {
            // Reset the array each time a selection changes
            selectedDosens = [];

            // Iterate through all selected Dosens and add their values to the array
            var selectedOptions = document.querySelectorAll('#dosens select');
            selectedOptions.forEach(function(select) {
                selectedDosens.push(select.value);
            });
        }

        function addMahasiswaField() {
            // Call the update function to refresh the selected Mahasiswas array
            updateSelectedMahasiswas();

            var container = document.getElementById('mahasiswas');

            // Create a container div for the select and remove button
            var fieldContainer = document.createElement('div');
            fieldContainer.className = 'row mb-2'; // Added a Bootstrap row class

            var selectContainer = document.createElement('div');
            selectContainer.className = 'col-md-10'; // Adjusted column size
            var select = document.createElement('select');
            select.className = 'form-control';
            select.name = 'mahasiswas[]';
            select.required = true;

            var option = document.createElement('option');
            option.value = '';
            option.text = 'Select Mahasiswa';
            select.appendChild(option);

            @foreach ($mahasiswas as $mahasiswa)
                // Check if the Mahasiswa is already selected
                if (!selectedMahasiswas.includes('{{ $mahasiswa->nim }}')) {
                    option = document.createElement('option');
                    option.value = '{{ $mahasiswa->nim }}';
                    option.text = '{{ $mahasiswa->nama }}';
                    select.appendChild(option);
                }
            @endforeach

            // Append the onchange event to the select element
            select.onchange = updateSelectedMahasiswas;

            // Append the select to the container div
            selectContainer.appendChild(select);

            // Add a "Remove" button with the 'x' icon
            var removeButtonContainer = document.createElement('div');
            removeButtonContainer.className = 'col-md-2'; // Adjusted column size
            var removeButton = document.createElement('button');
            removeButton.innerHTML = '<i class="icon-close"></i>';
            removeButton.className = 'btn btn-danger remove-btn';
            removeButton.type = 'button';
            removeButton.onclick = function() {
                container.removeChild(fieldContainer);
                updateSelectedMahasiswas();
            };

            // Append the remove button to the container div
            removeButtonContainer.appendChild(removeButton);

            // Append the select and remove button containers to the main container
            fieldContainer.appendChild(selectContainer);
            fieldContainer.appendChild(removeButtonContainer);

            // Append the container div to the main container
            container.appendChild(fieldContainer);
        }

        function addDosenField() {
            // Call the update function to refresh the selected Dosens array
            updateSelectedDosens();

            var container = document.getElementById('dosens');

            // Create a container div for the select and remove button
            var fieldContainer = document.createElement('div');
            fieldContainer.className = 'row mb-2'; // Added a Bootstrap row class

            var selectContainer = document.createElement('div');
            selectContainer.className = 'col-md-10'; // Adjusted column size
            var select = document.createElement('select');
            select.className = 'form-control';
            select.name = 'dosens[]';
            select.required = true;

            var option = document.createElement('option');
            option.value = '';
            option.text = 'Select Dosen';
            select.appendChild(option);

            @foreach ($dosens as $dosen)
                // Check if the Dosen is already selected
                if (!selectedDosens.includes('{{ $dosen->nidp }}')) {
                    option = document.createElement('option');
                    option.value = '{{ $dosen->nidp }}';
                    option.text = '{{ $dosen->nama }}';
                    select.appendChild(option);
                }
            @endforeach

            // Append the onchange event to the select element
            select.onchange = updateSelectedDosens;

            // Append the select to the container div
            selectContainer.appendChild(select);

            // Add a "Remove" button with the 'x' icon
            var removeButtonContainer = document.createElement('div');
            removeButtonContainer.className = 'col-md-2'; // Adjusted column size
            var removeButton = document.createElement('button');
            removeButton.innerHTML = '<i class="icon-close"></i>';
            removeButton.className = 'btn btn-danger remove-btn';
            removeButton.type = 'button';
            removeButton.onclick = function() {
                container.removeChild(fieldContainer);
                updateSelectedDosens();
            };

            // Append the remove button to the container div
            removeButtonContainer.appendChild(removeButton);

            // Append the select and remove button containers to the main container
            fieldContainer.appendChild(selectContainer);
            fieldContainer.appendChild(removeButtonContainer);

            // Append the container div to the main container
            container.appendChild(fieldContainer);
        }
    </script>
@endsection
