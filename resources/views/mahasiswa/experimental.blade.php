<!DOCTYPE html>
<html>
<head>
	<title>Tutorial Membuat CRUD Pada Laravel - www.malasngoding.com</title>
</head>
<body>
 
	<h2>www.malasngoding.com</h2>
	<h3>Data Pegawai</h3>
 
	<a href="mahasiswa/tambah"> + Tambah Pegawai Baru</a>
	
	<br/>
	<br/>
 
	<table border="1">
		<tr>
			<th>Nim</th>
			<th>Nama</th>
			<th>Role</th>
			<th>Angkatan</th>
			<th>No Telp</th>
			<th>Alamat</th>
			<th>Bio</th>
			<th>Status</th>
		</tr>
		@foreach($mahasiswa as $m)
		<tr>
			<td>{{ $m->nim }}</td>
			<td>{{ $m->nama }}</td>
			<td>{{ $m->role }}</td>
			<td>{{ $m->angkatan }}</td>
			<td>{{ $m->notelp }}</td>
			<td>{{ $m->alamat }}</td>
			{{-- <td>{{ $m->pegawai_foto_profile }}</td> --}}
			<td>{{ $m->bio }}</td>
			<td>{{ $m->status }}</td>
			<td>
				<a href="/mahasiswa/edit/{{ $m->nim }}">Edit</a>
				|
				<a href="/mahasiswa/hapus/{{ $m->nim }}">Hapus</a>
			</td>
		</tr>
		@endforeach
	</table>
 
 
</body>
</html>