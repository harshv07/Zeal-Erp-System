<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- PAGE TITLE HERE -->
    <title>Register</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

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
                                        <a href="{{ asset('welcome  ') }}"><img src="{{ asset('images/logo-full.png') }}" alt=""></a>
                                    </div>
                                    <h4 class="text-center mb-4">Sign up your account</h4>
                                    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>First Name</strong></label>
                                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="firstname" autofocus>
                                            @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Last Name</strong></label>
                                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="lastname" autofocus>
                                            @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        @if ($branches->count() > 0)
                                        <div class="mb-3">
                                            <!-- <input id="email" type="" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"> -->
                                            <div class="btn-group mb-1">
                                                <button type="button" class="btn btn-primary">Branch</button>
                                                <select name="branch" class="btn btn-primary dropdown-toggle dropdown-toggle-split form-control @error('branch') is-invalid @enderror" data-bs-toggle="dropdown">
                                                    @foreach ($branches as $branche)
                                                    <option class="dropdown-item" value="{{ $branche->id }}">{{ $branche->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            @error('branch')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            @else

                                            <h3>No Branch Found</h3>
                                            @endif

                                            @if ($years->count() > 0)
                                            <div class="btn-group mb-1">
                                                <button type="button" class="btn btn-primary">Year</button>
                                                <select name="year" class="btn btn-primary dropdown-toggle dropdown-toggle-split form-control @error('year') is-invalid @enderror" data-bs-toggle="dropdown">
                                                    @foreach ($years as $year)
                                                    <option class="dropdown-item" value="{{ $year->id }}">{{ $year->value }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            @error('year')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                            @else

                                            <h3>No Year Found</h3>

                                            @endif
                                        </div>



                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Confirm Password</strong></label>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Already have an account? <a class="text-primary" href="{{ route('login') }}">Sign in</a></p>
                                    </div>
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