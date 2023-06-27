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
    <title>Create Page</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}" />
    <!-- Datatable -->
    <link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet" />

    <!-- Custom Stylesheet -->
    <link href="{{ asset('vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">



</head>

@endsection




@section('content')
<div class="container">
    <form action="{{route('post.store')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row">
            <div class="col-8 offset-2">
                <h1>Add new post</h1>
                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label">Post Caption</label>


                    <input id="caption" type="text" name="caption" class="form-control @error('caption') is-invalid @enderror" value="{{ old('caption') }}" autocomplete="caption" autofocus>

                    @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Post</label>
                    <input type="file" class="form-control-file" id="image" name="image">

                    @error('image')

                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror


                </div>

                <div class="row pt-4">
                    <button class="btn btn-primary">Add New Post</button>
                </div>



            </div>
        </div>
    </form>
</div>
@endsection


@section('vendors')

<script src="{{ asset('vendor/global/global.min.js') }}"></script>
<script src="{{ asset('vendor/chart.js/Chart.bundle.min.js') }}"></script>
<!-- Apex Chart -->
<script src="{{ asset('vendor/apexchart/apexchart.js') }}"></script>

<!-- Datatable -->
<script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/plugins-init/datatables.init.js') }}"></script>

<script src="{{ asset('vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>

<script src="{{ asset('js/custom.min.js') }}"></script>
<script src="{{ asset('js/dlabnav-init.js') }}"></script>
<script src="{{ asset('js/demo.js') }}"></script>
<script src="{{ asset('js/styleSwitcher.js') }}"></script>
<!-- Toaster -->
<script>
    $(document).ready(function() {
        // Bounce button
        $("#animatebutton").click(function() {
            const element = document.querySelector('.animatebutton');
            element.classList.add('animated', 'swing');
            setTimeout(function() {
                element.classList.remove('swing');
            }, 1000);
        });


    });
</script>
@endsection