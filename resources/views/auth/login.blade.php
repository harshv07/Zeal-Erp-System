<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />


    <!-- PAGE TITLE HERE -->
    <title>Log IN</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="{{ asset('welcome') }}"><img src="{{ asset('images/logo-full.png') }}" alt="" /></a>
                                    </div>
                                    <h4 class="text-center mb-4">
                                        Sign in your account
                                    </h4>
                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email</strong></label>

                                            <input type="email" class="
                                                        form-control
                                                        @error('email')
                                                        is-invalid
                                                        @enderror
                                                    " name="email" value="{{ old('email') }}" />

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="
                                                        form-control
                                                        @error('password')
                                                        is-invalid
                                                        @enderror
                                                    " name="password" />

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="
                                                    row
                                                    d-flex
                                                    justify-content-between
                                                    mt-4
                                                    mb-2
                                                ">
                                            <div class="mb-3">
                                                <div class="
                                                            form-check
                                                            custom-checkbox
                                                            ms-1
                                                        ">
                                                    <input type="checkbox" name="remember" id="basic_checkbox_1" {{
                                                        old('remember') ?
                                                        'checked' : '' }}>
                                                    <label class="
                                                                form-check-label
                                                            " for="basic_checkbox_1">Remember Me</label>
                                                </div>
                                            </div>
                                            @if (Route::has('password.request'))
                                            <div class="mb-3">
                                                <a href="{{ route('password.request') }}">Forgot Password?</a>
                                            </div>

                                            @endif
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="
                                                        btn
                                                        btn-primary
                                                        btn-block
                                                    ">
                                                Login
                                            </button>
                                        </div>
                                    </form>
                                    @if (Route::has('register'))
                                    <div class="new-account mt-3">
                                        <p>
                                            Don't have an account?
                                            <a class="text-primary" href="{{ route('register') }}">Sign up</a>
                                        </p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/dlabnav-init.js') }}"></script>
    <script src="{{ asset('js/styleSwitcher.js') }}"></script>
</body>

</html>