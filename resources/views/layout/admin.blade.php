<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- theme meta -->
    <meta name="theme-name" content="quixlab" />

    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="theme/images/favicon.png">
    <!-- Pignose Calender -->
    <link href="theme/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="theme/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="theme/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    {{-- Data table --}}
    <link href="theme/plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="theme/css/style.css" rel="stylesheet">
    {{-- Summernote --}}
    <link href="theme/plugins/summernote/dist/summernote.css" rel="stylesheet">
    {{-- DatePicker --}}
    <link href="theme/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css"
        rel="stylesheet">
    <link href="theme/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
    <!-- Daterange picker plugins css -->
    <link href="theme/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>


</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    {{-- <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3"
                    stroke-miterlimit="10" />
            </svg>
        </div>
    </div> --}}
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.html">
                    <b class="logo-abbr"><img src="theme/images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="./theme/images/logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        <img src="theme/images/logo-text.png" alt="">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">

                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="theme/images/user/1.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="app-profile.html"><i class="icon-user"></i>
                                                <span>Profile</span></a>
                                        </li>

                                        <hr class="my-2">

                                        <li><a href="page-login.html"><i class="icon-key"></i> <span>Logout</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a class="" href="dashboard" aria-expanded="false"
                            class="{{ Request::is('dashboard') ? 'active' : '' }}">
                            <i class="icon-speedometer menu-icon "></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-people menu-icon"></i><span class="nav-text">Data Civitas Akademi</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="mahasiswa" class="{{ Request::is('mahasiswa') ? 'active' : '' }}">Mahasiswa</a>
                            </li>
                            <li><a href="dosen" class="{{ Request::is('dosen') ? 'active' : '' }}">Dosen</a></li>
                            <li><a href="user" class="{{ Request::is('user') ? 'active' : '' }}">User</a></li>
                        </ul>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-notebook menu-icon"></i><span class="nav-text">Publikasi</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="publikasi" class="{{ Request::is('publikasi') ? 'active' : '' }}">Publikasi -
                                    Mahasiswa</a></li>
                            <li><a href="publikasi" class="{{ Request::is('publikasi') ? 'active' : '' }}">Publikasi -
                                    Dosen</a></li>
                            <li><a href="publikasi" class="{{ Request::is('publikasi') ? 'active' : '' }}">Jurnal</a>
                            </li>
                        </ul>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-trophy menu-icon"></i><span class="nav-text">MBKM</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="tipe_mbkm" class="{{ Request::is('tipe_mbkm') ? 'active' : '' }}">Jenis
                                    MBKM</a></li>
                            <li><a href="instansi" class="{{ Request::is('instansi') ? 'active' : '' }}">Instansi</a>
                            </li>
                            <li><a href="supervisor"
                                    class="{{ Request::is('supervisor') ? 'active' : '' }}">Supervisor</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="" href="lomba" aria-expanded="false"
                            class="{{ Request::is('lomba') ? 'active' : '' }}">
                            <i class="icon-medal menu-icon "></i><span class="nav-text">Prestasi Mahasiswa</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            @include('sweetalert::alert')
            @yield('content')
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a>
                    2018</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="theme/plugins/common/common.min.js"></script>
    <script src="theme/js/custom.min.js"></script>
    <script src="theme/js/settings.js"></script>
    <script src="theme/js/gleek.js"></script>
    <script src="theme/js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src="theme/plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="theme/plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="theme/plugins/d3v3/index.js"></script>
    <script src="theme/plugins/topojson/topojson.min.js"></script>
    <script src="theme/plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="theme/plugins/raphael/raphael.min.js"></script>
    <script src="theme/plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="theme/plugins/moment/moment.min.js"></script>
    <script src="theme/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="theme/plugins/chartist/js/chartist.min.js"></script>
    <script src="theme/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>

    <!-- DataTables -->
    <script src="theme/js/dashboard/dashboard-1.js"></script>
    <script src="theme/plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="theme/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="theme/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    {{-- Form Editor --}}
    <script src="theme/plugins/summernote/dist/summernote.min.js"></script>
    <script src="theme/plugins/summernote/dist/summernote-init.js"></script>

    <script src="theme/js/dashboard/dashboard-1.js"></script>

    <!-- Date Picker Plugin JavaScript -->
    <script src="theme/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- Date range Plugin JavaScript -->
    <script src="theme/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="theme/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

    <script src="theme/js/plugins-init/form-pickers-init.js"></script>
    <script src="theme/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script>
        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
    </script>

</body>

</html>
