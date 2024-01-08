@extends('layout.admin')

@section('content')
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />

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
                                        <th>Id</th>
                                        <th>Judul</th>
                                        <th>Jurnal</th>
                                        <th>Penerbit</th>
                                        <th>Mahasiswa</th>
                                        <th>Dosen</th>
                                        <th>Volume</th>
                                        <th>Tanggal Terbit</th>
                                        <th>Halaman</th>
                                        <th>URL</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_publikasi as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->judul }}</td>
                                            <td>{{ $item->jurnal }}</td>
                                            <td>{{ $item->penerbit }}</td>
                                            <td>
                                                <ul>
                                                    @foreach ($item->mahasiswas as $mahasiswa)
                                                        <li>{{ $mahasiswa->nama }}</li>
                                                        <br>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>
                                                <ul>
                                                    @foreach ($item->dosens as $dosen)
                                                        <li>{{ $dosen->nama }}</li>
                                                        <br>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>{{ $item->volume }}</td>
                                            <td>{{ $item->tanggal_terbit }}</td>
                                            <td>{{ $item->halaman }}</td>
                                            <td>{{ $item->url }}</td>
                                            <td>
                                                <a href="#modalEdit{{ $item->id }}" class="btn btn-warning"
                                                    data-toggle="modal"><i class="fa fa-edit"></i></a>
                                                <a href="#modalHapus{{ $item->id }}" class="btn btn-danger"
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
                    <h5 class="modal-title">Tambah data publikasi</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('publikasi.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>URL</label>
                            <input type="text" class="form-control" name="url" id="url" placeholder="URL">
                        </div>
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul">
                        </div>

                        <div class="form-group">
                            <label>Jurnal Publikasi</label>
                            <input type="text" class="form-control" name="jurnal" id="jurnal"
                                placeholder="Tempat Publikasi">
                        </div>
                        <div class="form-group">
                            <label>Penerbit</label>
                            <input type="text" class="form-control" name="penerbit" id="penerbit"
                                placeholder="Penerbit">
                        </div>
                        <div class="form-group">
                            <label>Volume No</label>
                            <input type="text" class="form-control" name="volume" id="volume"
                                placeholder="Volume No">
                        </div>
                        <div class="form-group">
                            <label>Halaman</label>
                            <input type="text" class="form-control" name="halaman" id="halaman" placeholder="Halaman">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Terbit</label>
                            <input id="datepicker" class="form-control" name="tanggal_terbit" placeholder="yyyy-mm-dd" />
                        </div>

                        <div class="form-group" id="mahasiswas-container">
                            <label for="mahasiswas">Mahasiswa yang berkontribusi :</label>
                            <div id="mahasiswas">
                                <!-- Initial select field for Mahasiswas -->
                                <select class="form-control mb-2" name="mahasiswas[]" required>
                                    <option value="">Select Mahasiswa</option>
                                    @foreach ($mahasiswas as $mahasiswa)
                                        <option value="{{ $mahasiswa->nim }}">{{ $mahasiswa->nama }}
                                        </option>
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
                                    <option value="">Select Dosen</option>
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
    @foreach ($data_publikasi as $mk)
        <div class="modal fade" id="modalEdit{{ $mk->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit data publikasi</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('publikasi.update', $mk->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" class="form-control" name="judul" placeholder="Judul"
                                    value="{{ $mk->judul }}">
                            </div>

                            <div class="form-group">
                                <label>Jurnal Publikasi</label>
                                <input type="text" class="form-control" name="jurnal" placeholder="Tempat Publikasi"
                                    value="{{ $mk->jurnal }}">
                            </div>
                            <div class="form-group">
                                <label>Penerbit</label>
                                <input type="text" class="form-control" name="penerbit" placeholder="Penerbit"
                                    value="{{ $mk->penerbit }}">
                            </div>
                            <div class="form-group">
                                <label>Volume No</label>
                                <input type="text" class="form-control" name="volume" placeholder="Volume No"
                                    value="{{ $mk->volume }}">
                            </div>
                            <div class="form-group">
                                <label>Halaman</label>
                                <input type="text" class="form-control" name="halaman" placeholder="Halaman"
                                    value="{{ $mk->halaman }}">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Terbit</label>
                                <input id="datepicker" class="form-control datepicker" name="tanggal_terbit"
                                    placeholder="yyyy-mm-dd" value="{{ $mk->tanggal_terbit }}" />
                            </div>
                            <div class="form-group">
                                <label>URL</label>
                                <input type="text" class="form-control" name="url" placeholder="URL"
                                    value="{{ $mk->url }}">
                            </div>

                            <div class="form-group" id="mahasiswas-container">
                                <label for="mahasiswas">Mahasiswa yang berkontribusi :</label>
                                <div id="mahasiswa-update">

                                    <select class="form-control mb-2" name="mahasiswas[]" required>
                                        <option value="">Select Mahasiswa</option>
                                        @foreach ($mahasiswas as $mahasiswa)
                                            <option value="{{ $mahasiswa->nim }}">{{ $mahasiswa->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="button" class="btn btn-success" onclick="addMahasiswaFieldUpdate()">Add
                                    Mahasiswa</button>
                            </div>

                            <div class="form-group mt-3" id="dosens-container">
                                <label for="dosens">Dosen yang berkontribusi :</label>
                                <div id="dosen-update">
                                    {{-- @foreach ($mk->dosens as $dsn)
                                        <select class="form-control mb-2" name="dosens[]" required>
                                            @foreach ($dosens as $value)
                                                <option value="{{ $value }}"
                                                    {{ $dsn->nidp == $value->nidp ? 'selected' : '' }}>{{ $value->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @endforeach --}}
                                    <select class="form-control mb-2" name="dosens[]" required>
                                        <option value="">Select Dosen</option>
                                        @foreach ($dosens as $dosen)
                                            <option value="{{ $dosen->nidp }}">{{ $dosen->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="button" class="btn btn-success" onclick="addDosenFieldUpdate()">Add
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
    @endforeach

    {{-- Modal Hapus --}}
    @foreach ($data_publikasi as $mk)
        <div class="modal fade" id="modalHapus{{ $mk->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus data publikasi</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('publikasi.destroy', $mk->id) }}">
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
        // Create arrays to store selected Mahasiswas and Dosens
        var selectedMahasiswasTambah = [];
        var selectedMahasiswasUpdate = [];
        var selectedDosensTambah = [];
        var selectedDosensUpdate = [];

        function updateSelectedMahasiswas(isUpdate = false) {
            // Reset the array each time a selection changes
            if (isUpdate) {
                selectedMahasiswasUpdate = [];
            } else {
                selectedMahasiswasTambah = [];
            }

            // Choose the appropriate container ID based on the modal type
            var containerID = isUpdate ? 'mahasiswa-update' : 'mahasiswas';
            var selectedOptions = document.querySelectorAll('#' + containerID + ' select');

            // Iterate through all selected Mahasiswas and add their values to the array
            selectedOptions.forEach(function(select) {
                if (isUpdate) {
                    selectedMahasiswasUpdate.push(select.value);
                } else {
                    selectedMahasiswasTambah.push(select.value);
                }
            });
        }

        function updateSelectedDosens(isUpdate = false) {
            // Reset the array each time a selection changes
            if (isUpdate) {
                selectedDosensUpdate = [];
            } else {
                selectedDosensTambah = [];
            }

            // Choose the appropriate container ID based on the modal type
            var containerID = isUpdate ? 'dosen-update' : 'dosens';
            var selectedOptions = document.querySelectorAll('#' + containerID + ' select');

            // Iterate through all selected Dosens and add their values to the array
            selectedOptions.forEach(function(select) {
                if (isUpdate) {
                    selectedDosensUpdate.push(select.value);
                } else {
                    selectedDosensTambah.push(select.value);
                }
            });
        }

        function addMahasiswaField(isUpdate = false) {
            // Call the update function to refresh the selected Mahasiswas array
            updateSelectedMahasiswas(isUpdate);

            // Choose the appropriate container ID and selected array based on the modal type
            var containerID = isUpdate ? 'mahasiswa-update' : 'mahasiswas';
            var selectedMahasiswas = isUpdate ? selectedMahasiswasUpdate : selectedMahasiswasTambah;

            var container = document.getElementById(containerID);

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
            select.onchange = function() {
                updateSelectedMahasiswas(isUpdate);
            };

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
                updateSelectedMahasiswas(isUpdate);
            };

            // Append the remove button to the container div
            removeButtonContainer.appendChild(removeButton);

            // Append the select and remove button containers to the main container
            fieldContainer.appendChild(selectContainer);
            fieldContainer.appendChild(removeButtonContainer);

            // Append the container div to the main container
            container.appendChild(fieldContainer);
        }

        // Function for adding Mahasiswa fields in the update modal
        function addMahasiswaFieldUpdate() {
            addMahasiswaField(true);
        }

        function addDosenField(isUpdate = false) {
            // Call the update function to refresh the selected Mahasiswas array
            updateSelectedDosens(isUpdate);

            // Choose the appropriate container ID and selected array based on the modal type
            var containerID = isUpdate ? 'dosen-update' : 'dosens';
            var selectedDosens = isUpdate ? selectedDosensUpdate : selectedDosensTambah;

            var container = document.getElementById(containerID);

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

        function addDosenFieldUpdate() {
            addDosenField(true);
        }

        // function fetchDataFromUrl() {
        //     // Ambil nilai URL dari input
        //     var urlInput = document.getElementById('url');
        //     var url = urlInput.value;

        //     // encodedUrl = encodedUrl.replace(/%3A/g, ':').replace(/%2F/g, '/');

        //     // Kirim permintaan Guzzle untuk mendapatkan data
        //     fetch('/fetch-data?url=' + url)
        //         .then(response => {
        //             if (!response.ok) {
        //                 throw new Error('Network response was not ok');
        //             }
        //             return response.json();
        //         })
        //         .then(data => {
        //             // Isi formulir dengan data yang diterima
        //             document.getElementById('judul').value = data.judul;
        //             document.getElementById('jurnal').value = data.jurnal;
        //             document.getElementById('penerbit').value = data.penerbit;
        //             document.getElementById('volume').value = data.volume;
        //             document.getElementById('halaman').value = data.halaman;
        //             // document.getElementById('tanggal_terbit').value = data.tanggal_terbit;
        //         })
        //         .catch(error => console.error('Error:', error));
        // }

        // Panggil fetchDataFromUrl saat nilai input URL berubah
        document.getElementById('url').addEventListener('input', fetchDataFromUrl);

        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
    </script>
@endsection
