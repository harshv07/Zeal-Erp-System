@extends('layouts.app')




@section('head')



<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="keywords" content="" />
<meta name="author" content="" />
<meta name="robots" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1" />


<!-- PAGE TITLE HERE -->
<title>Settings</title>


<!-- FAVICONS ICON -->
<link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}" />

<!-- select  -->
<link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">


<!-- Custom Stylesheet -->
<link href="{{ asset('vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
<link href="{{ asset('css/style.css') }}" rel="stylesheet" />


<!-- Toaster -->
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>





@endsection


@section('content')

{!! Toastr::message() !!}

@can('show_settings')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Branches</h4>
            @can('edit_settings')

            <button type="button" class="btn btn-rounded btn-info" data-bs-toggle="modal" data-bs-target=".bd-example-modal-addbranch"><span class=" btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                </span class=" d-flex justify-content-end">Add</button>

            <div class="modal fade bd-example-modal-addbranch" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Branch</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>
                        <form action="{{ route('branch.create') }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="basic-form">

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Branch Name</label>
                                        <div class="col-sm-9">
                                            <!-- <input type="email" class="" placeholder="Email"> -->

                                            <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror text-green bold text-center form-control" placeholder="Enter Branch Name" required>
                                            @error('name')
                                            <span class="name-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
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
            @endcan

        </div>

        <div class="card-body">


            <div class="table-responsive">
                @if(count($branches) > 0)
                <table class="table  table-hover verticle-middle table-responsive-sm">
                    <thead>
                        <tr>
                            <th scope="col">Branch</th>
                            <th scope="col">Users</th>
                            <th scope="col">Total</th>
                            <th scope="col">Percentage</th>
                            @can('edit_settings')

                            <th scope="col">Action</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($branches as $branch)

                        <tr>
                            <td>{{ $branch['name'] }}</td>
                            <td>
                                <div class="progress" style="background: rgba(76, 175, 80, .1)">
                                    <div class="progress-bar bg-{{ array_rand(['primary' =>'primary','success' =>'success','danger'=>'danger','dark'=>'dark','warning'=>'warning','info'=>'info'],1) }}" style="width: {{ $branch['cnt']*100/$total }}%;" role="progressbar"><span class="sr-only">{{ $branch['cnt']*100/$total }}% Complete</span>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $branch['cnt'] }}</td>
                            <td><span class="badge badge-success light">{{ round($branch['cnt']*100/$total) }}%</span>
                            </td>
                            @can('edit_settings')
                            <td>
                                <div class="d-flex">
                                    <button class="btn btn-primary shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target=".bd-example-modal-branchedit{{ $branch['id'] }}"><i class="fas fa-pencil-alt"></i> </button>


                                    <button class="btn btn-danger shadow btn-xs sharp" data-bs-toggle="modal" data-bs-target=".bd-example-modal-branch{{ $branch['id'] }}"><i class="fa fa-trash"></i></button>
                                </div>

                                <div class="modal fade bd-example-modal-branch{{ $branch['id'] }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete Branch</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                </button>
                                            </div>
                                            <h4 class="modal-body text-red">Delete {{ $branch['name'] }} Branch? </h4>
                                            <div class="modal-footer">
                                                <form action="{{ route('branch.delete',[$branch['id']]) }}" method="post">
                                                    <input class="btn btn-danger light" type="submit" value="Delete" />
                                                    <input type="hidden" name="_method" value="delete" />
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                </form>
                                                <button type="button" class="btn btn-primary light" data-bs-dismiss="modal">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade bd-example-modal-branchedit{{ $branch['id'] }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">UPDATE BRANCH</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                </button>
                                            </div>
                                            <form action="{{ route('branch.update',encrypt($branch['id'])) }}" method="post">
                                                <div class="modal-body">
                                                    @csrf
                                                    @method('put')

                                                    <label>Branch Name :</label>
                                                    <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror text-green bold text-center" value="{{ $branch['name'] }}" required>
                                                    @error('name')
                                                    <span class="name-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-success light" type="submit">Save </button>

                                                    <button type="button" class="btn btn-primary light" data-bs-dismiss="modal">No</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            @endcan
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                NO BRANCH FOUND
                @endif
            </div>
        </div>
    </div>
</div>



<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Years</h4>

            @can('edit_settings')

            <button type="button" class="btn btn-rounded btn-info" data-bs-toggle="modal" data-bs-target=".bd-example-modal-addyear"><span class=" btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                </span class=" d-flex justify-content-end">Add</button>
            @endcan



            <div class="modal fade bd-example-modal-addyear" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Years</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>
                        <form action="{{ route('year.create') }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="basic-form">

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Enter Year</label>
                                        <div class="col-sm-9">


                                            <input type="text" name="value" id="value" class="@error('value') is-invalid @enderror text-green bold text-center form-control" placeholder="Enter Branch Name" required>
                                            @error('value')
                                            <span class="name-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
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


            <div class="table-responsive">
                @if(count($years) > 0)
                <table class="table  table-hover verticle-middle table-responsive-sm">
                    <thead>
                        <tr>
                            <th scope="col">Year</th>
                            <th scope="col">Users</th>
                            <th scope="col">Total</th>
                            <th scope="col">Percentage</th>
                            @can('edit_settings')
                            <th scope="col">Action</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($years as $year)

                        <tr>
                            <td>{{ $year['value'] }}</td>
                            <td>
                                <div class="progress" style="background: rgba(76, 175, 80, .1)">
                                    <div class="progress-bar bg-{{ array_rand(['primary' =>'primary','success' =>'success','danger'=>'danger','dark'=>'dark','warning'=>'warning','info'=>'info'],1) }}" style="width: {{ $year['cnt']*100/$total }}%;" role="progressbar"><span class="sr-only">{{ $year['cnt']*100/$total }}% Complete</span>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $year['cnt'] }}</td>
                            <td><span class="badge badge-success light">{{ round($year['cnt']*100/$total) }}%</span>
                            </td>
                            @can('edit_settings')
                            <td>
                                <div class="d-flex">
                                    <button class="btn btn-primary shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target=".bd-example-modal-yearedit{{ $year['id'] }}"><i class="fas fa-pencil-alt"></i>
                                    </button>

                                    <button class="btn btn-danger shadow btn-xs sharp" data-bs-toggle="modal" data-bs-target=".bd-example-modal-year{{ $year['id'] }}"><i class="fa fa-trash"></i></button>
                                </div>

                                <div class="modal fade bd-example-modal-year{{ $year['id'] }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete Year</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                </button>
                                            </div>
                                            <h4 class="modal-body text-red">Delete {{ $year['value'] }} Year? </h4>
                                            <div class="modal-footer">
                                                <form action="{{ route('year.delete',[$year['id']]) }}" method="post">
                                                    <input class="btn btn-danger light" type="submit" value="Delete" />
                                                    <input type="hidden" name="_method" value="delete" />
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                </form>
                                                <button type="button" class="btn btn-primary light" data-bs-dismiss="modal">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade bd-example-modal-yearedit{{ $year['id'] }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">UPDATE Year</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                </button>
                                            </div>
                                            <form action="{{ route('year.update',encrypt($year['id'])) }}" method="post">
                                                <div class="modal-body">
                                                    @csrf
                                                    @method('put')

                                                    <label>Year : </label>
                                                    <input type="text" name="value" id="name" class="@error('value') is-invalid @enderror bold text-green text-center" value="{{ $year['value'] }}">
                                                    @error('value')
                                                    <span class="name-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-success light" type="submit">Save </button>

                                                    <button type="button" class="btn btn-primary light" data-bs-dismiss="modal">No</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>



                            </td>
                            @endcan
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                NO Year FOUND
                @endif
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Designations</h4>

            @can('edit_settings')

            <button type="button" class="btn btn-rounded btn-info" data-bs-toggle="modal" data-bs-target=".bd-example-modal-adddesgin"><span class=" btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                </span class=" d-flex justify-content-end">Add</button>
            @endcan

            <div class="modal fade bd-example-modal-adddesgin" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Desingation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>
                        <form action="{{ route('designation.create') }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="basic-form">

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Desingation</label>
                                        <div class="col-sm-9">


                                            <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror text-green bold text-center form-control" placeholder="Enter Branch Name" required>
                                            @error('name')
                                            <span class="name-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
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


            <div class="table-responsive">
                @if(count($branches) > 0)
                <table class="table table-bordered verticle-middle table-responsive-sm">
                    <thead>
                        <tr>
                            <th scope="col">Designations</th>
                            <th scope="col">Users</th>
                            <th scope="col">Total</th>
                            <th scope="col">Percentage</th>
                            @can('edit_settings')
                            <th scope="col">Action</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($designations as $designation)

                        <tr>
                            <td>{{ $designation['name'] }}</td>
                            <td>
                                <div class="progress" style="background: rgba(76, 175, 80, .1)">
                                    <div class="progress-bar bg-{{ array_rand(['primary' =>'primary','success' =>'success','danger'=>'danger','dark'=>'dark','warning'=>'warning','info'=>'info'],1) }}" style="width: {{ $designation['cnt']*100/$total }}%;" role="progressbar"><span class="sr-only">{{ $designation['cnt']*100/$total }}% Complete</span>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $designation['cnt'] }}</td>
                            <td><span class="badge badge-success light">{{ round($designation['cnt']*100/$total) }}%</span>
                            </td>
                            @can('edit_settings')
                            <td>
                                <div class="d-flex">
                                    <button class="btn btn-primary shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target=".bd-example-modal-designationedit{{ $designation['id'] }}"><i class="fas fa-pencil-alt"></i> </button>


                                    <button class="btn btn-danger shadow btn-xs sharp" data-bs-toggle="modal" data-bs-target=".bd-example-modal-designation{{ $designation['id'] }}"><i class="fa fa-trash"></i></button>
                                </div>

                                <div class="modal fade bd-example-modal-designation{{ $designation['id'] }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete designation</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                </button>
                                            </div>
                                            <h4 class="modal-body text-red">Delete {{ $designation['name'] }} designation? </h4>
                                            <div class="modal-footer">
                                                <form action="{{ route('designation.delete',[$designation['id']]) }}" method="post">
                                                    <input class="btn btn-danger light" type="submit" value="Delete" />
                                                    <input type="hidden" name="_method" value="delete" />
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                </form>
                                                <button type="button" class="btn btn-primary light" data-bs-dismiss="modal">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade bd-example-modal-designationedit{{ $designation['id'] }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">UPDATE designation</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                </button>
                                            </div>
                                            <form action="{{ route('designation.update',encrypt($designation['id'])) }}" method="post">
                                                <div class="modal-body">
                                                    @csrf
                                                    @method('put')

                                                    <label>designation Name :</label>
                                                    <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror text-green bold text-center" value="{{ $designation['name'] }}">
                                                    @error('name')
                                                    <span class="name-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-success light" type="submit">Save </button>

                                                    <button type="button" class="btn btn-primary light" data-bs-dismiss="modal">No</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            @endcan
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                NO DESIGNATION FOUND
                @endif
            </div>
        </div>
    </div>
</div>


@can('show_role')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Roles</h4>

            @can('edit_role')
            <button type="button" class="btn btn-rounded btn-info" data-bs-toggle="modal" data-bs-target=".bd-example-modal-addrole"><span class=" btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                </span class=" d-flex justify-content-end">Add</button>



            <div class="modal fade bd-example-modal-addrole" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Role</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>
                        <form action="{{ route('role.create') }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="basic-form">

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Role Name</label>
                                        <div class="col-sm-9">
                                            <!-- <input type="email" class="" placeholder="Email"> -->
                                            <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror text-green bold text-center form-control" placeholder="Don't User space" required>
                                            @error('name')
                                            <span class="name-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="uselec">

                                        <!-- <fieldset class="mb-3">
                                                <div class="row">
                                                    <label class="col-form-label col-sm-3 pt-0">Radios</label>
                                                    <div class="col-sm-9">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="gridRadios" value="option1" checked="">
                                                            <label class="form-check-label">
                                                                First radio
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="gridRadios" value="option2">
                                                            <label class="form-check-label">
                                                                Second radio
                                                            </label>
                                                        </div>
                                                        <div class="form-check disabled">
                                                            <input class="form-check-input" type="radio" name="gridRadios" value="option3" disabled="">
                                                            <label class="form-check-label">
                                                                Third disabled radio
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset> -->
                                        <!-- <div class="mb-3 row">
                                                <div class="col-sm-3">Checkbox</div>
                                                <div class="col-sm-9">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <label class="form-check-label">
                                                            Example checkbox
                                                        </label>
                                                    </div>
                                                </div>
                                            </div> -->
                                    </div>
                                </div>
                                @if(count($permissions) > 0)
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Permission</label>
                                    <div class="col-sm-9">
                                        <select class="multi-select" name="permissions[]" multiple="multiple">
                                            @foreach ($permissions as $permission)
                                            <option value="{{ $permission }}">{{ $permission }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @else
                                NO permissions found contact Admin
                                @endif
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-success light" type="submit">Create</button>
                                <button type="button" class="btn btn-primary light" data-bs-dismiss="modal">No</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endcan

        </div>

        <div class="card-body">


            <div class="table-responsive">
                @if(count($roles) > 0)
                <table class="table table-bordered verticle-middle table-responsive-sm">
                    <thead>
                        <tr>
                            @php
                            $i = 1
                            @endphp

                            <th scope="col">ID</th>
                            <th scope="col">Roles</th>
                            @can('edit_role')
                            <th scope="col">Action</th>

                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        @php
                        $allowed = Qs::isPrimaryRole($role)
                        @endphp
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{ $role }}</td>
                            @can('edit_role')
                            @if($allowed == 0)
                            <td>
                                <div class="d-flex">
                                    <button class="btn btn-primary shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target=".bd-example-modal-roleupdate{{ $role }}"><i class="fas fa-pencil-alt"></i> </button>


                                    <button class="btn btn-danger shadow btn-xs sharp" data-bs-toggle="modal" data-bs-target=".bd-example-modal-roledelete{{ $role }}"><i class="fa fa-trash"></i></button>
                                </div>

                                <div class="modal fade bd-example-modal-roledelete{{ $role }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete Role</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                </button>
                                            </div>
                                            <h4 class="modal-body text-red">Delete {{ $role }} Role? </h4>
                                            <div class="modal-footer">
                                                <form action="{{ route('role.delete',$role) }}" method="post">
                                                    <input class="btn btn-danger light" type="submit" value="Delete" />
                                                    <input type="hidden" name="_method" value="delete" />
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                </form>
                                                <button type="button" class="btn btn-primary light" data-bs-dismiss="modal">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade bd-example-modal-roleupdate{{ $role }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">UPDATE ROLE</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                </button>
                                            </div>
                                            <form action="{{ route('role.update',$role) }}" method="post">
                                                @csrf
                                                @method('put');
                                                <div class="modal-body">
                                                    <div class="basic-form">

                                                        <div class="mb-3 row">
                                                            <label class="col-sm-3 col-form-label">Role Name</label>
                                                            <div class="col-sm-9">
                                                                <!-- <input type="email" class="" placeholder="Email"> -->
                                                                <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror text-green bold text-center form-control" placeholder="Don't Use space" required>
                                                                @error('name')
                                                                <span class="name-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-success light" type="submit">Save </button>

                                                    <button type="button" class="btn btn-primary light" data-bs-dismiss="modal">No</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            @endif
                            @endcan
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                NO DESIGNATION FOUND
                @endif
            </div>
        </div>
    </div>
</div>
@endcan






@can('show_permission')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Permissions</h4>
        </div>

        <div class="card-body">

            @php
            $i=1
            @endphp
            <div class="table-responsive">
                @if(count($permissions) > 0)
                <table class="table verticle-middle table-responsive-sm">
                    <thead>
                        <tr>
                            <th scope="col">Sr.NO</th>
                            <th scope="col">Permissions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i
                        @endphp
                        @foreach ($permissions as $permission)

                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $permission }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                NO DESIGNATION FOUND
                @endif
            </div>
        </div>
    </div>
</div>
@endcan





@endcan

@endsection


@section('vendors')

<script src="{{ asset('vendor/global/global.min.js') }}"></script>
<script src="{{ asset('vendor/chart.js/Chart.bundle.min.js') }}"></script> -->
<!-- Apex Chart -->
<script src="{{ asset('vendor/apexchart/apexchart.js') }}"></script>

<!-- Datatable -->
<script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/plugins-init/datatables.init.js') }}"></script>

<script src="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<script src="{{ asset('js/plugins-init/sweetalert.init.js') }}"></script>


<script src="{{ asset('vendor/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('js/plugins-init/select2-init.js') }}"></script>

<script src="{{ asset('vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>


<script src="{{ asset('js/custom.min.js') }}"></script>
<script src="{{ asset('js/dlabnav-init.js') }}"></script>
<script src="{{ asset('js/demo.js') }}"></script>
<script src="{{ asset('js/styleSwitcher.js') }}"></script>

@endsection