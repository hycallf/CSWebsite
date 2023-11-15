@extends('layout.guest')

@section('content')
    <div class="container-fluid">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/carousel1.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/carousel2.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/carousel3.jpg') }}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="container mt-5 py-3 px-3" id="about">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Computer Science</h2>
            </div>
            <div class="col-4 mx-4">
                <img src="https://id-media.apjonlinecdn.com/wysiwyg/blog/best-hp-laptops-for-programming/Programmer_Coding_on_Laptop.jpg"
                    class="img-fluid">
            </div>
            <div class="col-6">
                computer science is a multidimensional field that encompasses algorithmic thinking, artificial intelligence,
                cybersecurity, infrastructure management, and ethical considerations. Its pervasive influence in the digital
                age is undeniable, and as it continues to advance, it will shape the future in ways we are only beginning to
                comprehend. This abstract offers a glimpse into the vast and intricate landscape of computer science,
                revealing the interplay of theory and application that propels innovation and progress in the 21st century.
            </div>
        </div>
    </div>


    <div class="container-fluid mt-5 py-5 px-3 primary-color text-white" id="prestasi">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h1>Prestasi Mahasiswa</h1>
                </div>
            </div>
            <div class="row mt-4 text-dark">
                <div class="col-md-3">
                    <div class="card">
                        <img src="{{ asset('images/carousel3.jpg') }}" class="card-img-top" alt="Image 1">
                        <div class="card-body">
                            <h5 class="card-title">Abdullah Ammar</h5>
                            <p class="card-text">Lomba Poster Digital ASTRO ( Aksi, Seni, Teknologi, dan Olahraga )
                                Competition 2018</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img src="{{ asset('images/carousel2.jpg') }}" class="card-img-top" alt="Image 2">
                        <div class="card-body">
                            <h5 class="card-title">Naufal Rasyid</h5>
                            <p class="card-text">ITechno Cup 2018 “Shining Indonesia with Technology”, Web Developer Senior
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img src="{{ asset('images/carousel1.jpg') }}" class="card-img-top" alt="Image 3">
                        <div class="card-body">
                            <h5 class="card-title">Mita Nurul Yatimah</h5>
                            <p class="card-text">Program Kreativitas Mahasiswa 2020
                                Judul Proposal: Analisis Perbandingan Efektivitas Sistem Pakar dalam Mendiagnosis Penyakit
                                Stroke di Indonesia</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img src="{{ asset('images/carousel3.jpg') }}" class="card-img-top" alt="Image 4">
                        <div class="card-body">
                            <h5 class="card-title">Risnawati</h5>
                            <p class="card-text">Program Kreativitas Mahasiswa 2020
                                Judul Proposal: GUFITECH (Get Your Farming Tools Tech) - Upaya Untuk Meningkatkan
                                Produktivitas Pertanian Sebagai Solusi Mengurangi Nilai Impor Pangan Indonesia</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
