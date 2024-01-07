<!DOCTYPE html>
<html>

<head>
    <title>User Registration Email</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<body>
    <img src="{{ asset('images/EBSCS1.png') }}" class="img-fluid mx-auto d-block my-4">
    <p>Selamat, Anda telah berhasil mendaftarkan akun di situs kami. Berikut adalah data akun Anda:</p>
    <ul>
        <li>Nama: <strong>{{ $name }}</strong></li>
        <li>Email: <strong>{{ $email }}</strong></li>
        <li>Password: <strong>{{ $password }}</strong></li>
    </ul>
    <p><strong>Setelah kamu mendapatkan email ini, segera lakukan ubah password untuk keamanan akun anda.</strong></p>
    <p>Hormat kami, Admin CS Website</p>
</body>

</html>
