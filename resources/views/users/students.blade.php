@extends('layouts.app')

@section('head')


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

<!-- PAGE TITLE HERE -->
<title>Students</title>

<!-- FAVICONS ICON -->
<link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}" />
<!-- Datatable -->
<link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet" />

<!-- Custom Stylesheet -->
<link href="{{ asset('vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
<link href="{{ asset('css/style.css') }}" rel="stylesheet" />


<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>



@endsection


@section('content')



<form action="{{ route('user.search.students') }}" method="POST">
    @csrf
    <div class="row filter-row">
        <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus">
                <!-- <input type="text" class="form-control floating" id="branch" name="branch" placeholder="Branch" value="{{ old('branch') }}"> -->
                @if($branches->count() > 0)
                <select name="branch" id="branch" class="form-control floating  btn-primary text-white">
                    <option value="">-- Select Branch --</option>
                    @foreach ($branches as $branch)

                    <option value="{{ $branch->id }}" class="">{{ $branch->name }}</option>

                    @endforeach
                </select>
                @else
                <p>no record found</p>
                @endif
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus">
                <!-- <input type="text" class="form-control floating" id="year" name="year" placeholder="Year" value="{{ old('year') }}"> -->
                @if($years->count() > 0)
                <select name="year" id="year" class="form-control floating btn-primary text-white ">
                    <option value="">-- Select Year --</option>
                    @foreach ($years as $year)

                    <option value="{{ $year->id }}" class="">{{ $year->value }}</option>

                    @endforeach
                </select>
                @else
                <p>no record found</p>
                @endif
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus">
                <input type="text" class="form-control floating" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <button type="sumit" class="btn btn-success btn-block"> Search </button>
        </div>
    </div>
</form>

<br>




<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Super Admins</h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="example3" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Branch</th>
                                <th>Year</th>
                                @can('delete_Student')

                                <th>Action</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @if ($students->count() > 0)
                            @foreach ($students as $student)
                            <tr>
                                <td><img class="rounded-circle" width="35" src="{{ $student->getFirstMediaUrl('profile_picture') }}" alt=""></td>
                                <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->branch->name }}</td>
                                <td>{{ $student->year->value }}</td>
                                @can('delete_Student')
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('user.admin.edit',[encrypt($student->id)]) }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i>
                                        </a>

                                        <button class="btn btn-danger shadow btn-xs sharp" data-bs-toggle="modal" data-bs-target=".bd-example-modal-{{ $student->id }}"><i class="fa fa-trash"></i></button>
                                    </div>

                                    <div class="modal fade bd-example-modal-{{ $student->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Modal title</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <h4 class="modal-body text-red">Delete this user ==> {{ $student->name }}</h4>
                                                <div class="modal-footer">
                                                    <form action="{{ route('user.delete',[$student->id]) }}" method="post">
                                                        <input class="btn btn-danger light" type="submit" value="Delete" />
                                                        <input type="hidden" name="_method" value="delete" />
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    </form>
                                                    <button type="button" class="btn btn-primary light" data-bs-dismiss="modal">No</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </td>
                                @endcan
                            </tr>
                            @endforeach
                            @else
                            NO RECORD FOUND
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Toastr::message() !!}
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

@endsection