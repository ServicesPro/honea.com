@extends('layouts.dash')

@section('css')
    <link href="{{ asset('dash/plugins/dropify/css/dropify.min.css') }} " rel="stylesheet">
    <link href="{{ asset('dash/plugins/filter/magnific-popup.css') }} " rel="stylesheet" type="text/css" />
@endsection

@section('js')
    <script src="{{ asset('dash/plugins/dropify/js/dropify.min.js') }} "></script>
    <script src="{{ asset('dash/pages/jquery.profile.init.js') }} "></script>

    <script src="{{ asset('dash/plugins/filter/isotope.pkgd.min.js') }} "></script>
    <script src="{{ asset('dash/plugins/filter/masonry.pkgd.min.js') }} "></script>
    <script src="{{ asset('dash/plugins/filter/jquery.magnific-popup.min.js') }} "></script>
    <script src="{{ asset('dash/pages/jquery.gallery.inity.js') }} "></script>
@endsection

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Honea</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('profile', ['id' => Auth::user()->id]) }}">{{ Auth::user()->name }}</a>
                        </li>
                        <li class="breadcrumb-item active">Profil</li>
                    </ol>
                </div>
                <h4 class="page-title">Profil</h4>
            </div>
            <!--end page-title-box-->
        </div>
        <!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body  met-pro-bg">
                    <div class="met-profile">
                        <div class="row">
                            <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                                <div class="met-profile-main">
                                    <div class="met-profile-main-pic">
                                        <img src="{{ "storage/" . Auth::user()->avatar }} " alt="" class="rounded-circle">
                                        <span class="fro-profile_main-pic-change">
                                            <i class="fas fa-camera"></i>
                                        </span>
                                    </div>
                                    <div class="met-profile_user-detail">
                                        <h5 class="met-user-name">{{ Auth::user()->name }}</h5>
                                        {{-- <p class="mb-0 met-user-name-post">{{ Auth::user()->email }}</p> --}}
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-4 ml-auto">
                                <ul class="list-unstyled personal-detail">
                                    <li class=""><i class="dripicons-phone mr-2 text-info font-18"></i> <b> phone </b> :
                                        </li>
                                    <li class="mt-2"><i class="dripicons-mail text-info font-18 mt-2 mr-2"></i> <b> Email
                                        </b> : {{ Auth::user()->email }}</li>
                                    {{-- <li class="mt-2"><i class="dripicons-location text-info font-18 mt-2 mr-2"></i>
                                        <b>Location</b> : USA</li> --}}
                                </ul>
                                <div class="button-list btn-social-icon">
                                    <button type="button" class="btn btn-blue btn-round">
                                        <i class="fab fa-facebook-f"></i>
                                    </button>

                                    <button type="button" class="btn btn-secondary btn-round ml-2">
                                        <i class="fab fa-twitter"></i>
                                    </button>

                                    <button type="button" class="btn btn-pink btn-round  ml-2">
                                        <i class="fab fa-dribbble"></i>
                                    </button>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end f_profile-->
                </div>
                <!--end card-body-->
                <div class="card-body">
                    <ul class="nav nav-pills mb-0" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="general_detail_tab" data-toggle="pill"
                                href="#general_detail">General</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="settings_detail_tab" data-toggle="pill"
                                href="#settings_detail">Settings</a>
                        </li>
                    </ul>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
        <div class="col-12">
            <div class="tab-content detail-list" id="pills-tabContent">
                <div class="tab-pane fade show active" id="general_detail">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="dash/images/small/user-pro.jpg" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="met-basic-detail">
                                                <h3>{{ Auth::user()->name }}</h3>
                                                <p class="text-uppercase font-14">{{ Auth::user()->email }}</p>
                                                {{-- <p class="text-muted font-14">
                                                     There are many variations of passages of Lorem Ipsum available,
                                                     but the majority have suffered alteration in some form, by injected humour,
                                                     or randomised words which don't look even slightly believable.
                                                     If you are going to use a passage of Lorem Ipsum, you need to be sure there
                                                     isn't anything embarrassing hidden in the middle of text.
                                                     All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.
                                                </p> --}}

                                                <div class="my-3">
                                                    <a href="{{ route('products.index') }}"
                                                        class="btn btn-primary px-3">Faire des achats</a>
                                                    <a href="{{ route('users.orders', ['id'=>Auth::user()->id]) }}" class="btn btn-outline-primary  px-3">Voir mes commandes</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end general detail-->

                <div class="tab-pane fade" id="settings_detail">
                    <div class="row">
                        <div class="col-lg-12 col-xl-9 mx-auto">
                            <div class="card">
                                <div class="card-body">
                                    {{-- <form method="post" class="card-box">
                                        <input type="file" id="input-file-now-custom-1" class="dropify"
                                            data-default-file="dash/images/users/user-4.jpg" />
                                        <span class="input-icon icon-right">
                                            <textarea rows="4" class="form-control"
                                                placeholder="Post a new message"></textarea>
                                        </span>
                                        <div class="float-right my-3">
                                            <a class="btn btn-sm btn-primary text-light px-4 mb-0">Send</a>
                                        </div>
                                        <ul class="nav nav-pills profile-pills mt-1">
                                            <li>
                                                <a href="#"><i class=" fas fa-video font-18 mr-2 mt-2 text-primary"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i
                                                        class="fas fa-camera  font-18 mx-2 mt-2 text-primary"></i></a>
                                            </li>
                                        </ul>
                                    </form> --}}

                                    <div class="">
                                        <form class="form-horizontal form-material mb-0">
                                            <div class="form-group">
                                                <input type="text" placeholder="Full Name" class="form-control">
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <input type="email" placeholder="Email" class="form-control"
                                                        name="example-email" id="example-email">
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="password" placeholder="password" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="password" placeholder="Re-password" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit"
                                                    class="btn btn-primary btn-sm text-light px-4 mt-3 float-right mb-0">
                                                    Mettre à jour mon profil
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end settings detail-->
            </div>
            <!--end tab-content-->

        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
