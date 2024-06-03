<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>{{ $title ?? config('app.name') }} | {{config('app.name')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Boilerplate Laravel System" name="description" />
    <meta content="Phicosdev" name="author" />
    <meta content="{{ url('/') }}/" name="base_url" />
    <meta content="{{ config('app.theme') }}" name="asset_url">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--
    <meta content="{{ Route::url() }}" name="current_url"> --}}
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ config('app.theme') }}assets/images/favicon.ico">

    @include('layouts.component._style')

    @stack('styles')

</head>


<body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">


        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="index.html" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ config('app.theme') }}assets/images/logo.svg" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ config('app.theme') }}assets/images/logo-dark.png" alt="" height="17">
                            </span>
                        </a>

                        <a href="index.html" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ config('app.theme') }}assets/images/logo-light.svg" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ config('app.theme') }}assets/images/logo-light.png" alt="" height="19">
                            </span>
                        </a>
                    </div>


                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect"
                        id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect">
                        {{ Str::ucfirst(session('role_name')) }}
                    </button>
                </div>

                <div class="d-flex">

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="d-none d-xl-inline-block ml-1" key="t-henry">{{ Auth::user()->name }}</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a class="dropdown-item change-password" href="javascript:void(0)"><i
                                    class="bx bx-key font-size-16 align-middle mr-1"></i> <span
                                    key="t-change-password">Ganti Kata Sandi</span></a>
                            @if (session('multi_role'))
                            <a class="dropdown-item" href="{{ route('choose-role') }}"><i
                                    class="bx bx-lock-open font-size-16 align-middle mr-1"></i> <span
                                    key="t-lock-screen">Ganti Otoritas</span></a>
                            @endif
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit()"><i
                                    class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> <span
                                    key="t-logout">Logout</span></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-18">{{ config('app.name') }} | {{ $title ?? 'Selamat Datang'
                                    }}</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    @yield('contents', View::make('default'))

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            @include('layouts.component._change_password')

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Skote.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-right d-none d-sm-block">
                                Design & Develop by Themesbrand
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    @include('layouts.component._script')

    @stack('scripts')

</body>

</html>