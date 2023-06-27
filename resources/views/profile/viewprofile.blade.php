@extends('layouts.app')

@section('head')


<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="keywords" content="" />
<meta name="author" content="" />
<meta name="robots" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1" />



<!-- PAGE TITLE HERE -->
<title>My Profile</title>

<!-- FAVICONS ICON -->
<link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon - Copy (2).png') }}" />
<!-- Datatable -->
<link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet" />
<!-- Custom Stylesheet -->
<link href="{{ asset('vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
<link href="{{ asset('css/style.css') }}" rel="stylesheet" />

<!-- Toaster -->
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>


<style>
  .container {
    border: 2px solid red;
  }

  .main-body {
    border: 2px solid blue;

  }

  .col-xl-8 .col-lg-8 .col-sm-8 {
    border: 2px solid green;

  }
</style>


@endsection


@section('content')

{!! Toastr::message() !!}

<div class="card-body">
  <div class="text-center">
    <div class="profile-photo">
      <img src="{{ auth()->user()->getFirstMediaUrl('profile_picture') }}" width="100" class="img-fluid rounded-circle" alt="">
    </div>
    <div>
      <h3>
        <div class="text-danger mt-4 mb-1">
          {{ strtoupper(auth()->user()->first_name) }}
        </div>
      </h3>
    </div>

    @hasrole('Student')
    <h4 class="text-muted">Student</h4>
    @else
    <h4 class="text-muted">{{ auth()->user()->designation->name }}</h4>
    @endhasrole

    <h6 class="text-muted">{{ auth()->user()->branch->name }}</h6>
    <a class="btn btn-outline-primary btn-rounded mt-3 px-5" href="{{ route('user.edit') }}">Edit Profile</a><br>
    <br>
    <br>
    <br>



    {{-- <div class="col-md-8"> --}}
    <div class="card mb-3">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-3">
            <h6 class="mb-0">Full Name</h6>
          </div>
          <div class="col-sm-9 text-secondary">
            {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <h6 class="mb-0">Email</h6>
          </div>
          <div class="col-sm-9 text-secondary">
            {{ auth()->user()->email }}
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <h6 class="mb-0">Role</h6>
          </div>
          <div class="col-sm-9 text-secondary">
            @role('SuperAdmin')
            SuperAdmin
            @elserole('Admin')
            Admin
            @elserole('Teacher')
            Teacher
            @else
            Student
            @endrole
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <h6 class="mb-0">Branch</h6>
          </div>
          <div class="col-sm-9 text-secondary">
            {{ auth()->user()->branch->name }}
          </div>
        </div>
        <hr>

        <div class="row">
          <div class="col-sm-3">
            @hasrole('Student')
            <h6 class="mb-0">Passout Year</h6>
            @else
            <h6 class="mb-0">Designation</h6>
            @endhasrole
          </div>
          <div class="col-sm-9 text-secondary">
            @hasrole('Student')
            {{ auth()->user()->year->value }}
            @else
            {{ auth()->user()->designation->name }}
            @endhasrole
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-12">
            <a class="btn btn-outline-primary btn-rounded mt-3 px-5 " target="__blank" href="#">Change Password</a>
          </div>
        </div>
      </div>
    </div>

    <div class="row gutters-sm">
      <div class="col-sm-6 mb-3">

        <div class="col-sm-6 mb-3">

        </div>
      </div>
    </div>
  </div>
</div>
</div>


@endsection


<!-- /Breadcrumb -->



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
<script type="{{ asset('text/javascript') }}"></script>


@endsection