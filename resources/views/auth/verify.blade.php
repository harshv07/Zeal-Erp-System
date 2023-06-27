<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:title" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:image" content="https://fillow.dexignlab.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- PAGE TITLE HERE -->
    <title>Admin Dashboard</title>

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

                                    <a href="{{ route('landing') }}"><button type="submit" class="btn tp-btn btn-danger " style="margin-right: 394px;">Home</button></a>

                                    <h4 class="text-center mb-4">Verify Your Email Address</h4>
                                    <div class="mb-3">
                                        <p><strong>Before proceeding, please check your email for a verification link.</strong></p>
                                        <p><strong>If you did not receive the email</strong></p>
                                        @if (session('resent'))
                                        <div class="alert alert-success" role="alert">
                                            {{ __('A fresh verification link has been sent to your email address.') }}
                                        </div>
                                        @endif
                                    </div>
                                    <form class="text-center" method="POST" action="{{ route('verification.resend') }}">
                                        @csrf
                                        <button type="submit" class="btn tp-btn btn-primary">{{ __('click here to request another') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
    <!-- Common JS -->
    <script src="vendor/global/global.min.js"></script>
    <!-- Custom script -->
    <script src="page-error-404.html"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>

</html>