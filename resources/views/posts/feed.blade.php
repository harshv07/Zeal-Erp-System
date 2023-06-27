@extends('layouts.app')
@section('head')

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template" />
    <meta property="og:title" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template" />
    <meta property="og:description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template" />
    <meta property="og:image" content="https://fillow.dexignlab.com/xhtml/social-image.png" />
    <meta name="format-detection" content="telephone=no" />
    <!-- Toaster -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

    <!-- PAGE TITLE HERE -->
    <title>FEED</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}" />
    <!-- Datatable -->
    <link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet" />

    <!-- Custom Stylesheet -->
    <link href="{{ asset('vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />



</head>



@endsection
@section('content')

<div class="row page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Advanced</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">lightGallery</a></li>
    </ol>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">FEED</h4>
            </div>
            <div class="card-body pb-1">
                <div id="lightgallery" class="row">
                    <a href="{{ asset('images/big/img1.jpg') }}" data-exthumbimage="images/big/img1.jpg" data-src="{{ asset('images/big/img1.jpg') }}" class="col-lg-3 col-md-6 mb-4">
                        <img src="{{ asset('images/big/img1.jpg') }}" alt="" style="width:100%;">
                    </a>
                    <a href="{{asset('images/big/img2.jpg')}}" data-exthumbimage="images/big/img2.jpg" data-src="{{ asset('images/big/img2.jpg') }}" class="col-lg-3 col-md-6 mb-4">
                        <img src="{{asset('images/big/img2.jpg')}}" alt="" style="width:100%;">
                    </a>
                    <a href="{{asset('images/big/img3.jpg') }}" data-exthumbimage="{{asset('images/big/img3.jpg')}}" data-src="{{asset('images/big/img3.jpg')}}" class="col-lg-3 col-md-6 mb-4">
                        <img src="{{asset('images/big/img3.jpg')}}" alt="" style="width:100%;">
                    </a>



                </div>
            </div>
        </div>
        <!-- /# card -->
        <a href="{{ route('post.create') }}">Add New Post</a>
    </div>

</div>
@endsection



@section('vendors')

<script src="{{ asset('vendor/global/global.min.js') }}"></script>
<script src="{{ asset('vendor/chart.js/Chart.bundle.min.js') }}"></script>
<!-- Apex Chart -->
<script src="{{ asset('vendor/apexchart/apexchart.js') }}"></script>

<!-- light galley -->
<script src="{{asset('vendor/lightgallery/js/lightgallery-all.min.js')}}"></script>

<!-- Datatable -->
<script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/plugins-init/datatables.init.js') }}"></script>

<script src="{{ asset('vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>

<script src="{{ asset('js/custom.min.js') }}"></script>
<script src="{{ asset('js/dlabnav-init.js') }}"></script>
<script src="{{ asset('js/demo.js') }}"></script>
<script src="{{ asset('js/styleSwitcher.js') }}"></script>
<!-- Toaster -->

@endsection