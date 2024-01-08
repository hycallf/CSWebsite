<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/app.css">
    <script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="#"><img src="{{ asset('images/Logo2.png') }}" alt="Logo" width='40%' height='auto'></a>

            <!-- Toggler for Small Screens -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu Items on the Right -->
            <div class="collapse navbar-collapse flex-row-reverse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="guest">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="prestasi">Prestasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="intern">Internship</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="project">Project</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#publikasi">Publikasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item ms-3">
                        <a href="/login">
                            <button class="btn btn-login">Login</button>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>


    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    <script>
    var swiper = new Swiper(".mySwiper", {
      spaceBetween: 30,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints:{
        0:{
            slidesPerView:1,
        },
        768:{
            slidesPerView:2,
        },
        968:{
            slidesPerView:3,
        },
        1068:{
            slidesPerView:4,
        }
      },
    });
  </script>


    <footer class="py-4 text-white mt-4 footer">
        <div class="container">
            <div class="row">
                <div class="container">
                    <a class="navbar-brand" href="#"><img src="{{ asset('images/Logo1.png') }}" alt="Logo" width='30%' height='auto'></a>
                </div>
            </div>
            <div class="row text-center my-4">
                <div class="col">
                    Mahasiswa Ilmu Komputer | Copyright © {{date("Y")}} ESQ Business School
                </div>
            </div>
        </div>
    </footer>

    <script src="/js/bootstrap.js"></script>
    <script src="/js/app.js"></script>
</body>

</html>