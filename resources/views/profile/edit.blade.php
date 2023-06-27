@extends('layouts.app')

@section('head')

<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="keywords" content="" />
<meta name="author" content="" />
<meta name="robots" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1" />


<meta charset="utf-8">
<!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
<!--  All snippets are MIT license http://bootdey.com/license -->
<title>Edit Profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="bootstrap.bundle.min.js / bootstrap.bundle.js"></script>
<script src="edit_profile.js"></script>
<style type="text/css">
  body {
    margin-top: 20px;
    background: #f8f8f8
  }
</style>

<!-- PAGE TITLE HERE -->
<title>Edit Profile</title>

<!-- FAVICONS ICON -->
<link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}" />
<link href="{{ asset('vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
<link href="{{ asset('vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('vendor/nouislider/nouislider.min.css') }}" />

<!-- Style css -->
<link href="{{ asset('css/style.css') }}" rel="stylesheet" />

@endsection

@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
  <div class="row flex-lg-nowrap">


    <div class="col">
      <div class="row">
        <div class="col mb-3">
          <div class="card">
            <div class="card-body">
              <div class="e-profile">
                <div class="row">



                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{ auth()->user()->getFirstMediaUrl('profile_picture') }}" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>{{ auth()->user()->first_name}} {{ auth()->user()->last_name }}</h4>

                      @hasrole('Student')
                      <p class="text-secondary mb-1">Student</p>
                      @else
                      <p class="text-secondary mb-1">{{ auth()->user()->designation->name }}</p>
                      @endhasrole
                      <p class="text-muted font-size-sm">{{ auth()->user()->branch->name }}</p>
                      <form action="{{ route('user.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mt-2">
                          <button class="btn btn-primary" type="button">
                            <i class="fa fa-fw fa-camera"></i>

                            <input type="file" name="profile_picture" class=" @error('profile_picture') is-invalid @enderror">
                            @error('profile_picture')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </button>
                        </div>
                    </div>
                  </div>
                </div>





                <div class="tab-content pt-5">
                  <div class="tab-pane active">
                    <div class="row">
                      <div class="col">

                        <div class="row">

                          <div class="col">
                            <div class="input-group mb-3 input-danger">
                              <span class="input-group-text">FIRST NAME</span>
                              <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" value="{{ auth()->user()->first_name }}">
                              @error('first_name')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>

                          <div class="col">
                            <div class="input-group input-success">
                              <span class="input-group-text">LAST NAME</span>
                              <input class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name" value="{{ auth()->user()->last_name }}">
                              @error('last_name')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>

                        </div>

                        <label></br></label>

                        @hasrole('Student')
                        <label for=""></label>

                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <div class="input-group input-success-o">

                                <span class="input-group-text">YEAR</span>
                                @if ($years->count() > 0)

                                <select name="year_id" class="form-control @error('year_id') is-invalid @enderror">
                                  @foreach ($years as $year)
                                  <option value="{{ $year->id }}" {{ ($year->id == auth()->user()->year->id ? "selected" : "") }}>
                                    {{ $year->value }}
                                  </option>
                                  @endforeach
                                </select>
                                @else
                                NO Data Found
                                @endif

                                @error('year_id')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            </div>
                          </div>


                          @else
                          <div class="row">

                            <div class="col">
                              <div class="form-group">
                                <div class="input-group input-success-o">

                                  <span class="input-group-text">DESIGNATION</span>
                                  @if ($designations->count() > 0)

                                  <select name="designation_id" class="form-control @error('designation_id') is-invalid @enderror">
                                    @foreach ($designations as $designation)
                                    <option value="{{ $designation->id }}" {{ ($designation->id == auth()->user()->designation->id ? "selected" : "") }}>
                                      {{ $designation->name }}
                                    </option>
                                    @endforeach
                                  </select>
                                  @else
                                  NO Data Found
                                  @endif

                                  @error('designation_id')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                                </div>
                              </div>
                            </div>


                            @endhasrole

                            <div class="col mb-3">
                              <div class="form-group">
                                <div class="input-group input-danger-o">

                                  <span class="input-group-text">BRANCH</span>
                                  @if ($branches->count() > 0)

                                  <select name="branch_id" class="form-control @error('branch_id') is-invalid @enderror">
                                    @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}" {{ ($branch->id == auth()->user()->branch->id ? "selected" : "") }}>
                                      {{ $branch->name }}
                                    </option>
                                    @endforeach
                                  </select>
                                  @else
                                  NO Data Found
                                  @endif
                                  @error('branch_id')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                                </div>
                              </div>
                            </div>
                          </div>

                          <label></br></label>

                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <div class="input-group mb-3 input-warning-o">
                                  <span class="input-group-text">@</span>
                                  <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{ auth()->user()->email }}" readonly>
                                  @error('email')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                                </div>
                              </div>
                            </div>
                          </div>

                          <label></br></label>

                          <!-- <div class="row">
                            <div class="col mb-3">
                              <div class="form-group">
                                <div class="input-group mb-3 input-info-o">
                                  <span class="input-group-text">Username</span>
                                  <input class="form-control @error('x') is-invalid @enderror" type="text" name="#" value="{{ auth()->user()->email }}">
                                </div>
                              </div>
                            </div>
                          </div> -->

                        </div>
                      </div>
                      <div class="row">
                        <div class="col d-flex justify-content-end">
                          <button class="btn btn-primary" type="submit">Save Changes</button>
                        </div>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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
  <script>
    // <![CDATA[  <-- For SVG support
    if ('WebSocket' in window) {
      (function() {
        function refreshCSS() {
          var sheets = [].slice.call(document.getElementsByTagName("link"));
          var head = document.getElementsByTagName("head")[0];
          for (var i = 0; i < sheets.length; ++i) {
            var elem = sheets[i];
            var parent = elem.parentElement || head;
            parent.removeChild(elem);
            var rel = elem.rel;
            if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
              var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
              elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
            }
            parent.appendChild(elem);
          }
        }
        var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
        var address = protocol + window.location.host + window.location.pathname + '/ws';
        var socket = new WebSocket(address);
        socket.onmessage = function(msg) {
          if (msg.data == 'reload') window.location.reload();
          else if (msg.data == 'refreshcss') refreshCSS();
        };
        if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
          console.log('Live reload enabled.');
          sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
        }
      })();
    } else {
      console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
    }
    // ]]>
  </script>
  @endsection