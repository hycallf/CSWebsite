<!DOCTYPE html>
<html>
<head>
	<title>Tutorial Membuat CRUD Pada Laravel - www.malasngoding.com</title>
</head>
<body>
 
	<h2><a href="https://www.malasngoding.com">www.malasngoding.com</a></h2>
	<h3>Edit Pegawai</h3>
 
	<a href="/mahasiswa"> Kembali</a>
	
	<br/>
	<br/>
 
	@foreach($mahasiswa as $m)
    <p>Current NIM being edited: {{ $m->nim}}</p>

	<form action="/mahasiswa/update" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="nim" value="{{ $m->nim }}"> <br/>
		Nama <input type="text" required="required" name="nama" value="{{ $m->nama }}"> <br/>
		Role <input type="text" required="required" name="role" value="{{ $m->role }}"> <br/>
		Angkatan <input type="number" required="required" name="angkatan" value="{{ $m->angkatan }}"> <br/>
		No. Telp <input type="text" required="required" name="notelp" value="{{ $m->notelp }}"> <br/>
		Alamat <textarea required="required" name="alamat">{{ $m->alamat }}</textarea> <br/>
		Bio <input type="text" required="required" name="bio" value="{{ $m->bio }}"> <br/>
		Status <input type="text" required="required" name="status" value="{{ $m->status }}"> <br/>
		<input type="submit" value="Simpan Data">
	</form>
	@endforeach
		
 
</body>
</html>