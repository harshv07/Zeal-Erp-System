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
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

<!-- PAGE TITLE HERE -->
<title>Students</title>

<!-- FAVICONS ICON -->
<link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}" />
<!-- Datatable -->
<link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet" />

<!-- Custom Stylesheet -->
<link href="{{ asset('vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
<link href="{{ asset('css/style.css') }}" rel="stylesheet" />
@endsection


@section('content')

{!! Toastr::message() !!}
<form action="{{ route('notice.search') }}" method="POST">
    @csrf
    <div class="row filter-row">
        <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus">
                <!-- <input type="text" class="form-control floating" id="branch" name="branch" placeholder="Branch" value="{{ old('branch') }}"> -->
                @if($branches->count() > 0)
                <select name="branch" id="branch" class="form-control floating  btn-primary text-white text-center">
                    <option value="">-- Your Branch --</option>
                    <option value="0">Everyone</option>
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
                <select name="year" id="year" class="form-control floating btn-primary text-white text-center">
                    <option value="">-- Your Year --</option>
                    <option value="0">Everyone</option>
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

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Notices</h4>
    

            <button type="button" class="btn btn-rounded btn-info" data-bs-toggle="modal" data-bs-target=".bd-example-modal-addnotice"><span class=" btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                </span class=" d-flex justify-content-end">Add</button>




            <div class="modal fade bd-example-modal-addnotice" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Notice</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>
                        <form action="{{ route('notice.create') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="basic-form">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Caption</label>
                                        <div class="col-sm-9">

                                            <input type="text" name="caption" id="caption" class="@error('caption') is-invalid @enderror text-green bold text-center form-control" placeholder="Caption" required>
                                            @error('caption')
                                            <span class="name-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Year</label>
                                        <div class="col-sm-9">

                                            @if($years->count() > 0)
                                            <select name="year_id" id="year_id" class="form-control floating btn-primary text-white text-center">
                                                <option value="">-- Every Year --</option>
                                                <option value="0">Everyone</option>
                                                @foreach ($years as $year)

                                                <option value="{{ $year->id }}" class="">{{ $year->value }}</option>

                                                @endforeach
                                            </select>
                                            @else
                                            <p>no record found</p>
                                            @endif

                                            @error('year_id')
                                            <span class="name-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Branches</label>
                                        <div class="col-sm-9">

                                            @if($branches->count() > 0)

                                            <select name="branch_id" id="branch_id" class="form-control floating  btn-primary text-white text-center" required>
                                                <option value="">-- Every Branch --</option>
                                                <option value="0">Everyone</option>
                                                @foreach ($branches as $branch)

                                                <option value="{{ $branch->id }}" class="">{{ $branch->name }}</option>

                                                @endforeach
                                            </select>
                                            @else
                                            <p>no record found</p>
                                            @endif


                                            @error('branch_id')
                                            <span class="name-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mt-2">
                                        <label class="col-sm-3 col-form-label">Notice</label>
                                        <button class="btn btn-success" type="button">
                                            <i class="fa fa-fw fa-camera"></i>
                                            <input type="file" name="notice" class=" @error('notice') is-invalid @enderror" required>
                                            @error('notice')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-success light" type="submit">Create</button>
                                <button type="button" class="btn btn-primary light" data-bs-dismiss="modal">No</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

    
        </div>

        <div class="card-body">


            @if ($notices->count() > 0)

            <div class="table-responsive">
                <table class="table  table-hover verticle-middle table-responsive-sm">


                    <thead>
                        <tr>

                            <th scope="col">Date</th>
                            <th scope="col">Uploaded By</th>
                            <th scope="col">Caption</th>
                            <th scope="col">Branch</th>
                            <th scope="col">Year</th>


                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>


                        @php
                        $i=1;
                        @endphp

                        @foreach ($notices as $notice)

                        <tr>
                            <td>{{ date('jS M Y h:i A', strtotime($notice->created_at))}}</td>
                            <td>{{ $notice->user->first_name }} {{ $notice->user->last_name }}</td>
                            <td>{{ $notice->caption }}</td>
                            @if ($notice->branch_id == 0)
                            <td>Everyone</td>
                            @else
                            <td>{{ $notice->branch->name }}</td>
                            @endif

                            @if ($notice->year_id == 0)
                            <td>Everyone</td>
                            @else
                            <td>{{ $notice->year->value }}</td>
                            @endif

                            <td>
                                <div class="d-flex">


                                    <button class="btn btn-info shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target=".bd-example-modal-noticeview{{ $notice->id }}"><i class="fas fa-eye"></i> </button>

                                    <a href="{{ $notice->getFirstMediaUrl('notice') }}" class="btn btn-success shadow btn-xs sharp me-1" download><i class="fas fa-download"></i></a>

                                    @can('edit_notice')

                                    <button class="btn btn-primary shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target=".bd-example-modal-noticeupdate{{ $notice->id }}"><i class="fas fa-pencil-alt"></i> </button>

                                    <button class="btn btn-danger shadow btn-xs sharp" data-bs-toggle="modal" data-bs-target=".bd-example-modal-noticedelete{{ $notice->id }}"><i class="fa fa-trash"></i></button>

                                    @endcan
                                </div>

                                <div class="modal fade bd-example-modal-noticeview{{ $notice->id }}">
                                    <div class="modal-dialog modal-fullscreen-xxl-down">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button class="close btn btn-primary light" type="button" data-bs-dismiss="modal">&times;</button>
                                                <h6 class="modal-title">View Notice</h6>
                                            </div>
                                            <div class="modal-body">

                                                <embed src="{{ $notice->getFirstMediaUrl('notice') }}#toolbar=0&navpanes=0&scrollbar=0" frameborder="0" width="100%" height="400px">


                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @can('edit_notice')


                                <div class="modal fade bd-example-modal-noticedelete{{ $notice->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete Notice</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                </button>
                                            </div>
                                            <h4 class="modal-body text-red">Are You Sure? </h4>
                                            <div class="modal-footer">
                                                <form action="{{ route('notice.delete',encrypt($notice->id)) }}" method="post">
                                                    <input class="btn btn-danger light" type="submit" value="Delete" />
                                                    <input type="hidden" name="_method" value="delete" />
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                </form>
                                                <button type="button" class="btn btn-primary light" data-bs-dismiss="modal">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade bd-example-modal-noticeupdate{{ $notice->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Update Notice</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                </button>

                                            </div>
                                            <form action="{{ route('notice.update',$notice->id) }}" method="post">
                                                @csrf
                                                @method('put')
                                                <div class="modal-body">
                                                    <p class="text-red">Note* Your Name will be displayed after updation</p>
                                                    <div class="basic-form">

                                                        <div class="mb-3 row">
                                                            <label class="col-sm-3 col-form-label">Caption</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="caption" id="name" class="@error('caption') is-invalid @enderror text-green bold text-center form-control" value="{{ $notice->caption }}" required>
                                                                @error('caption')
                                                                <span class="name-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                        <div class="mb-3 row">
                                                            <label class="col-sm-3 col-form-label">Year</label>
                                                            <div class="col-sm-9">

                                                                @if($years->count() > 0)
                                                                <select name="year_id" id="year_id" class="form-control floating btn-primary text-white text-center">
                                                                    <option value="0" {{ ($notice->year_id == 0 ? "Selected" : "") }}>Everyone</option>
                                                                    @foreach ($years as $year)

                                                                    <option value="{{ $year->id }}" {{ ($notice->year_id == $year->id ? "Selected" : "") }} class="">{{ $year->value }}</option>

                                                                    @endforeach
                                                                </select>
                                                                @else
                                                                <p>no record found</p>
                                                                @endif

                                                                @error('year_id')
                                                                <span class="name-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label class="col-sm-3 col-form-label">Branches</label>
                                                            <div class="col-sm-9">

                                                                @if($branches->count() > 0)

                                                                <select name="branch_id" id="branch_id" class="form-control floating  btn-primary text-white text-center" required>
                                                                    <option value="">-- Every Branch --</option>
                                                                    <option value="0" {{ ($notice->branch_id == 0 ? "Selected" : "") }}>Everyone</option>
                                                                    @foreach ($branches as $branch)

                                                                    <option value="{{ $branch->id }}" {{ ($notice->branch_id == $branch->id ? "Selected" : "") }} class="">{{ $branch->name }}</option>

                                                                    @endforeach
                                                                </select>
                                                                @else
                                                                <p>no record found</p>
                                                                @endif


                                                                @error('branch_id')
                                                                <span class="name-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-success light" type="submit">Save</button>
                                                    <button type="button" class="btn btn-primary light" data-bs-dismiss="modal">No</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endcan
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                NO NOICES TO SHOW
                @endif
            </div>
        </div>
    </div>
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

@endsection