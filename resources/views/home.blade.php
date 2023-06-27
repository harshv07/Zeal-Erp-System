@extends('layouts.app')

@section('head')


<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="keywords" content="" />
<meta name="author" content="" />
<meta name="robots" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@600&display=swap" rel="stylesheet">
<!-- PAGE TITLE HERE -->
<title>Dashboard</title>

<!-- FAVICONS ICON -->
<link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}" />
<link href="{{ asset('vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
<link href="{{ asset('vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('vendor/nouislider/nouislider.min.css') }}" />

<!-- Style css -->
<link href="{{ asset('css/style.css') }}" rel="stylesheet" />

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
<style>
    body {
        font-family: 'Baloo Bhai 2', cursive;
        font-family: 'Macondo', cursive;
        font-family: 'Roboto Mono', monospace;
        font-family: 'Square Peg', cursive;
        font-size: 16px;
        line-height: 2;
    }
</style>
@endsection



@section('content')

<div class="d-flex flex-column align-items-end m-5 p-0 ">

    <h1 class="display-4 text-primary">Hello</h1>
    <h1 class="display-1 text-danger font-weight-bold">{{ auth()->user()->first_name }}</h1>

    <img src="{{ asset('images\welcome1.png') }}" alt="welcome">
</div>

<div class="d-flex  justify-content-center flex-column" $font-size-base>
    <h2 class="display-4">Instructions</h2>
    <br>
    <div class="m2">
        <h1 class="display-6"><i class="fa fa-bell"></i> Notice</h1>
        <p class="display-6">Here you will get daily notices with <br> respect to your department and year</p>
    </div>
    <div class="m2">
        <h1 class="display-6"><i class="fas fa-image"></i> Feed</h1>
        <p class="display-6">This module is just like Instagram where <br> we can post images and view these posts</p>
    </div>
    <div class="m2">
        <h1 class="display-6"><i class="fa fa-credit-card"></i> Payment</h1>
        <p class="display-6">This section is mainly used for payment <br> transactions between students and college</p>
    </div>
    <div class="m2">
        <h1 class="display-6"><i class="far fa-comment-dots"></i> Chat</h1>
        <p class="display-6">This chat application will be used by students <br> of faculty to chat with each other</p>
    </div>
    <div class="m2">
        <h1 class="display-6"><i class="fa fa-file-text"></i> File-Manager</h1>
        <p class="display-6">In this section we can upload or view notes <br> related to the curriculum or placement</p>
    </div>
</div>

@endsection



@section('vendors')
<script src="{{ asset('vendor/global/global.min.js') }}"></script>
<script src="{{ asset('vendor/chart.js/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>

<!-- Apex Chart -->
<script src="{{ asset('vendor/apexchart/apexchart.js') }}"></script>

<script src="{{ asset('vendor/chart.js/Chart.bundle.min.js') }}"></script>

<!-- Chart piety plugin files -->
<script src="{{ asset('vendor/peity/jquery.peity.min.js') }}"></script>



<!-- Dashboard 1 -->
<script src="{{ asset('js/dashboard/dashboard-1.js') }}"></script>

<script src="{{ asset('vendor/owl-carousel/owl.carousel.js') }}"></script>

<script src="{{ asset('js/custom.min.js') }}"></script>
<script src="{{ asset('js/dlabnav-init.js') }}"></script>
<script src="{{ asset('js/demo.js') }}"></script>
<script src="{{ asset('js/styleSwitcher.js') }}"></script>

@endsection