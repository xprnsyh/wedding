<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META SECTION -->
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--<link rel="icon" href="{{ asset('img/primary-icon.png') }}" type="image/x-icon" />-->
    <meta property="og:image" itemprop="image" content="{{ asset('img/logo-hoofey-meta.png') ?? ''}}">
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="300" />
    <meta property="og:image:height" content="300" />
    <!-- END META SECTION -->

    <title>Hoofey - Wedding Invitation Website</title>

     <link rel="icon" href="{{asset('favicon_hoofey.ico')}}" type="image/x-icon"> 

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
    @yield('css-add')
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/dashboard/css/admin-v2.css') }}" />
</head>

<body>
    @include('layouts.includes._navbarv2')
    @include('layouts.includes._sidebarv2')
    @include('popper::assets')

    <main class="content-wrapper active">
        {{-- Breadcrumb --}}
        @yield('breadcrumb')
        {{-- End Breadcrumb --}}

        {{-- Content --}}
        @yield('content')
        {{-- End Content --}}
        <footer class="active">
            <p>Copyright 2021. Hoofey. Syarat & Ketentuan. Kebijakan Privasi</p>
        </footer>
    </main>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <script src="https://use.fontawesome.com/e912f54b8f.js"></script>
    @yield('add-js')
    <script>
        $(document).ready(function() {
            let x = window.matchMedia("(max-width: 768px)");
            $("#sidebar-toggler").click(function() {
                $("#sidebar-wrapper").toggleClass("active");
                $("main").toggleClass("active");
                $("footer").toggleClass("active");
                $("#sidebar-toggler").toggleClass("active");
                if ($("#sidebar-toggler").hasClass("active")) {
                    $("#sidebar-toggler #sidebar-icon").html("&times;");
                    $("#sidebar-toggler #sidebar-icon").removeClass(
                        "navbar-toggler-icon"
                    );
                } else {
                    $("#sidebar-toggler #sidebar-icon").html("");
                    $("#sidebar-toggler #sidebar-icon").addClass("navbar-toggler-icon");
                    // console.log(true);
                }
            });

            function myFunction(x) {
                if (x.matches) {
                    $("#sidebar-wrapper").removeClass("active");
                    $("main").removeClass("active");
                    $("footer").removeClass("active");
                    $("#sidebar-toggler").removeClass("active");
                    $("#sidebar-toggler #sidebar-icon").html("");
                    $("#sidebar-toggler #sidebar-icon").addClass("navbar-toggler-icon");
                } else {
                    $("#sidebar-wrapper").addClass("active");
                    $("main").addClass("active");
                    $("footer").addClass("active");
                    $("#sidebar-toggler").addClass("active");
                    $("#sidebar-toggler #sidebar-icon").html("&times;");
                    $("#sidebar-toggler #sidebar-icon").removeClass(
                        "navbar-toggler-icon"
                    );
                }
            }
            myFunction(x);
            x.addListener(myFunction);
        });
    </script>
</body>

</html>
