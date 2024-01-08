<!DOCTYPE html>
<html>
<head>
	<title>Tutorial Membuat CRUD Pada Laravel - www.malasngoding.com</title>
</head>
<body>
 
	<h2><a href="https://www.malasngoding.com">www.malasngoding.com</a></h2>
	<h3>Data Pegawai</h3>
 
	<a href="/mahasiswa"> Kembali</a>
	
	<br/>
	<br/>
 
	<form action="/mahasiswa/store" method="post">
		{{ csrf_field() }}
		NIM <input type="text" name="nim" required="required"> <br/>
		Nama <input type="text" name="nama" required="required"> <br/>
		Role <input type="number" name="role" required="required"> <br/>
		Angkatan <textarea name="angkatan" required="required"></textarea> <br/>
		No. Telp <textarea name="notelp" required="required"></textarea> <br/>
		Alamat <textarea name="alamat" required="required"></textarea> <br/>
		Bio <textarea name="bio" required=""></textarea> <br/>
		Status <input type="number" name="status" required="required"> <br/>
		<input type="submit" value="Simpan Data">
	</form>
 
</body>
</html>