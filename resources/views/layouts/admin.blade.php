<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META SECTION -->
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('img/primary-icon.png') }}" type="image/x-icon" />
    <!-- END META SECTION -->


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
        type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('admin-bsb/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('admin-bsb/plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('admin-bsb/plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{ asset('admin-bsb/plugins/morrisjs/morris.css') }}" rel="stylesheet" />

    @yield('css-add')

    <!-- Custom Css -->
    <link href="{{ asset('admin-bsb/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-bsb/css/mystyle.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin-bsb/css/style-post.css') }}">
    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('admin-bsb/css/themes/all-themes.css') }}" />

    <!-- EOF CSS INCLUDE -->


</head>

<body>
    <!-- Page Loader -->
    <!-- <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div> -->
    <!-- #END# Page Loader -->

    <section>
        @include('layouts.includes._navbar')
    </section>

    <section>
        @include('layouts.includes._sidebar')
    </section>


    <section class="content">

        @yield('content')

    </section>


    <!-- Jquery Core Js -->
    <script src="{{ asset('admin-bsb/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('admin-bsb/plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Select Plugin Js -->
    {{-- <script src="{{asset('admin-bsb/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script> --}}

    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('admin-bsb/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('admin-bsb/plugins/node-waves/waves.js') }}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{ asset('admin-bsb/plugins/jquery-countto/jquery.countTo.js') }}"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('admin-bsb/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin-bsb/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>

    @yield('data-scripts')


    <!-- Custom Js -->
    <script src="{{ asset('admin-bsb/js/admin.js') }}"></script>
    <script src="{{ asset('admin-bsb/js/pages/tables/jquery-datatable.js') }}"></script>
    <!-- <script src="{{ asset('admin-bsb/js/pages/index.js') }}"></script> -->
    <!-- <script src="{{ asset('admin-bsb/js/pages/forms/advanced-form-elements.js') }}"></script> -->

    <!-- Custom My Style Js -->
    <script src="{{ asset('admin-bsb/js/mystylescript.js') }}"></script>

    <!-- Demo Js -->

    <!-- <script src="{{ asset('admin-bsb/js/demo.js') }}"></script> -->

    @yield('js')


</body>

</html>
