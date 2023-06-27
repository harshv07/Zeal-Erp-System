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
    <title>Feed</title>

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

<div class=" container w-100 p-3  ">
    <div class=" d-flex card-body w-75 p-3 mx-auto rounded ">
        <div class="profile-tab ">
            <div class="custom-tab-1">

                <div class="tab-content">
                    <div id="my-posts" class="tab-pane fade active show">
                        <div class="my-post-content pt-3">
                            <div class="post-input d-flex justify-content-end">
                                <!--  <textarea name="textarea" id="textarea" cols="30" rows="5"
                                    class="form-control bg-transparent border border-primary"
                                    placeholder="Please type what you want...."></textarea>

                                
                                
                                <a href="javascript:void(0);" class="btn btn-primary light me-1 px-3"
                                    data-bs-toggle="modal" data-bs-target="#cameraModal"><i
                                        class="fa fa-camera"></i> </a>
                            
                                <div class="modal fade" id="cameraModal">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Upload images</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">Upload</span>
                                                    <div class="form-file">
                                                        <input type="file" class="form-file-input form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <a href="{{ route('post.create') }}" class="btn btn-primary">Add Post</a>
                                <!-- Modal -->
                                <div class="modal fade" id="postModal">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header ">
                                                <h5 class="modal-title">Add Post</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                </button>
                                            </div>
                                            <div class="modal-body p-3 mb-2 bg-light text-dark">
                                                <textarea name="textarea" id="textarea2" cols="30" rows="5" class="form-control bg-transparent " placeholder="Please type what you want...."></textarea>
                                                <a class="btn btn-primary btn-rounded" href="javascript:void(0)">Post</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @foreach($posts as $post)

                            <div class=" profile-uoloaded-post border-bottom-1 pb-5">
                                <br>
                                <br>
                                <br>

                                <br>





                                <div class="media d-flex align-items-center">
                                    <div class="avatar avatar-xl me-2">
                                        <div class=""><img src="{{ $post->user->getFirstMediaUrl('profile_picture') }}" class="rounded-circle img-fluid" width="30" alt="">
                                        </div>
                                    </div>
                                    <div class="media-body d-flex justify-content-start w-10 p-3">
                                        <h2 class="text-bold">{{ $post->user->name }}</h2>

                                        @if(auth()->user()->can('edit_post') || auth()->user()->id== $post->user->id)
                                        <div class="d-flex justify-content-end w-75 p-3">
                                            <button class="btn btn-primary shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target=".bd-example-modal-postupdate{{ $post->id }}"><i class="fas fa-pencil-alt"></i> </button>
                                            <button class="btn btn-danger shadow btn-xs sharp" data-bs-toggle="modal" data-bs-target=".bd-example-modal-postdelete{{ $post->id }}"><i class="fa fa-trash"></i></button>
                                        </div>
                                        @else()
                                        @endcan



                                    </div>
                                </div>

                                <h3 class="text-black"> {{ $post->caption }} </h3>
                                <img src="{{$post->getFirstMediaUrl('image')}}" alt="" class="img-fluid w-100 h-100 rounded ">





                                <div class="modal fade bd-example-modal-postupdate{{ $post->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Update Post</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                </button>

                                            </div>
                                            <form action="{{ route('post.update', $post->id) }}" method="post">
                                                @csrf
                                                @method('put')
                                                <div class="modal-body">
                                                    <p class="text-red">Note* Your Name will be displayed after updation</p>
                                                    <div class="basic-form">

                                                        <div class="mb-3 row">
                                                            <label class="col-sm-3 col-form-label">Caption</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="caption" id="caption" class="@error('caption') is-invalid @enderror text-green bold text-center form-control" value="{{ $post->caption }}" required>
                                                                @error('caption')
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

                                <div class="modal fade bd-example-modal-postdelete{{ $post->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete Post</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                </button>
                                            </div>
                                            <h4 class="modal-body text-red">Are You Sure? </h4>
                                            <div class="modal-footer">
                                                <form action="{{ route('post.delete',encrypt($post->id)) }}" method="post">
                                                    <input class="btn btn-danger light" type="submit" value="Delete" />
                                                    <input type="hidden" name="_method" value="delete" />
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                </form>
                                                <button type="button" class="btn btn-primary light" data-bs-dismiss="modal">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- 
                                <button class="btn btn-primary me-2 "><span class="me-2"><i class="fa fa-heart"></i></span>Like</button>
                                <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#replyModal"><span class="me-2"><i class="fa fa-reply"></i></span>Reply</button> -->


                                @endforeach

                            </div>


                        </div>
                    </div>
                    <div id="about-me" class="tab-pane fade">
                        <div class="profile-about-me">
                            <div class="pt-4 border-bottom-1 pb-3">
                                <h4 class="text-primary">About Me</h4>

                            </div>
                        </div>
                        <div class="profile-skills mb-5">
                            <h4 class="text-primary mb-2">Skills</h4>
                            <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Admin</a>
                            <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Dashboard</a>
                            <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Photoshop</a>
                            <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Bootstrap</a>
                            <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Responsive</a>
                            <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Crypto</a>
                        </div>
                        <div class="profile-lang  mb-5">
                            <h4 class="text-primary mb-2">Language</h4>
                            <a href="javascript:void(0);" class="text-muted pe-3 f-s-16"><i class="flag-icon flag-icon-us"></i> English</a>
                            <a href="javascript:void(0);" class="text-muted pe-3 f-s-16"><i class="flag-icon flag-icon-fr"></i> French</a>
                            <a href="javascript:void(0);" class="text-muted pe-3 f-s-16"><i class="flag-icon flag-icon-bd"></i> Bangla</a>
                        </div>
                        <div class="profile-personal-info">
                            <h4 class="text-primary mb-4">Personal Information</h4>
                            <div class="row mb-2">
                                <div class="col-sm-3 col-5">
                                    <h5 class="f-w-500">Name <span class="pull-end">:</span>
                                    </h5>
                                </div>
                                <div class="col-sm-9 col-7"><span>Mitchell C.Shay</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-3 col-5">
                                    <h5 class="f-w-500">Email <span class="pull-end">:</span>
                                    </h5>
                                </div>
                                <div class="col-sm-9 col-7"><span>example@examplel.com</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-3 col-5">
                                    <h5 class="f-w-500">Availability <span class="pull-end">:</span></h5>
                                </div>
                                <div class="col-sm-9 col-7"><span>Full Time (Free Lancer)</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-3 col-5">
                                    <h5 class="f-w-500">Age <span class="pull-end">:</span>
                                    </h5>
                                </div>
                                <div class="col-sm-9 col-7"><span>27</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-3 col-5">
                                    <h5 class="f-w-500">Location <span class="pull-end">:</span></h5>
                                </div>
                                <div class="col-sm-9 col-7"><span>Rosemont Avenue Melbourne,
                                        Florida</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-3 col-5">
                                    <h5 class="f-w-500">Year Experience <span class="pull-end">:</span></h5>
                                </div>
                                <div class="col-sm-9 col-7"><span>07 Year Experiences</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="profile-settings" class="tab-pane fade">
                        <div class="pt-3">
                            <div class="settings-form">
                                <h4 class="text-primary">Account Setting</h4>
                                <form>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Email</label>
                                            <input type="email" placeholder="Email" class="form-control">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Password</label>
                                            <input type="password" placeholder="Password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <input type="text" placeholder="1234 Main St" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Address 2</label>
                                        <input type="text" placeholder="Apartment, studio, or floor" class="form-control">
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">City</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label class="form-label">State</label>
                                            <select class="form-control default-select wide" id="inputState" style="display: none;">
                                                <option selected="">Choose...</option>
                                                <option>Option 1</option>
                                                <option>Option 2</option>
                                                <option>Option 3</option>
                                            </select>
                                            <div class="nice-select form-control default-select wide" tabindex="0">
                                                <span class="current">Choose...</span>
                                                <ul class="list">
                                                    <li data-value="Choose..." class="option selected">Choose...
                                                    </li>
                                                    <li data-value="Option 1" class="option">Option 1</li>
                                                    <li data-value="Option 2" class="option">Option 2</li>
                                                    <li data-value="Option 3" class="option">Option 3</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-2">
                                            <label class="form-label">Zip</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-check custom-checkbox">
                                            <input type="checkbox" class="form-check-input" id="gridCheck">
                                            <label class="form-check-label form-label" for="gridCheck"> Check me
                                                out</label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Sign
                                        in</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="replyModal">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Post Reply</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <textarea class="form-control" rows="4">Message</textarea>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Reply</button>
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