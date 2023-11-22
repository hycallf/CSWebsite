@extends('layout.guest')

@section('content')
    <link href="theme/css/style.css" rel="stylesheet">
    <div class="login-form-bg h-100 py-5 mt-5">
        <div class="container h-100 mt-5">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="">
                                    <h4>Login</h4>
                                </a>

                                <form class="mt-5 mb-5 login-input" method="POST" action="/login">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                                            required>
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password"
                                            required>
                                    </div>
                                    <button type="submit" class="btn login-form__btn submit w-100">Sign In</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="theme/plugins/common/common.min.js"></script>
    <script src="theme/js/custom.min.js"></script>
    <script src="theme/js/settings.js"></script>
    <script src="theme/js/gleek.js"></script>
    <script src="theme/js/styleSwitcher.js"></script>
@endsection
