@extends('layout.guest')

@section('content')
<div class="container-fluid">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="{{ url('storage/images/carousel1.jpg') }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="{{ url('storage/images/carousel2.jpg') }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="{{ url('storage/images/carousel3.jpg') }}" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
</div>

<div class="container mt-5 py-3 px-3">
    <div class="row">
        <div class="col-12 text-center">
            <h2>Computer Science</h2>
        </div>
        <div class="col-4 mx-4">
            <img src="https://id-media.apjonlinecdn.com/wysiwyg/blog/best-hp-laptops-for-programming/Programmer_Coding_on_Laptop.jpg" class="img-fluid">
        </div>
        <div class="col-6">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero ipsa neque inventore architecto deserunt consequuntur consectetur, earum expedita mollitia eaque nulla repudiandae pariatur autem excepturi nobis accusantium dignissimos non voluptatem.
        </div>
    </div>
</div>
@endsection
