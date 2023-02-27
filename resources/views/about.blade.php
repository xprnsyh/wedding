<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>About Us | Hoofey</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/startup-materialize.min.css') }}">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    @if ($errors->count() > 0)
        <div class="modal d-block" tabindex="-1" role="dialog" id="modal-alert">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ $errors->first() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- Navbar -->
    <nav class="navbar navbar-solid-transition">
        <div class="nav-wrapper">
            <a href="{{ url('/') }}" class="brand-logo" style="padding: 3px;">
                <img src="{{ asset('admin-bsb/images/logo.png') }}" alt="" width="auto" height="20">
            </a>
            <ul id="nav-mobile" class="right hide-on-med-and-down" style="color:#F7ADAF">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('create.payment') }}">Payment</a></li>
                <li><a href="{{ url('/blog') }}">Blog</a></li>
                <li><a href="{{ url('/about') }}">About</a></li>
                <li><a href="{{ route('login') }}">Sign In</a></li>
            </ul>
            <a href="#" data-activates="slide-out" class="button-collapse right"><i class="material-icons black-text"
                    style="margin-right:15px;">menu</i></a>
        </div>
    </nav>
    <ul id="slide-out" class="side-nav">
        <li><a class="waves-effect waves-teal" href="{{ url('/') }}">Home</a></li>
        <li><a class="waves-effect waves-teal" href="{{ route('create.payment') }}">Payment</a></li>
        <li><a class="waves-effect waves-teal" href="#">Blog</a></li>
        <li><a class="waves-effect waves-teal" href="#">About</a></li>
        <li><a class="waves-effect waves-teal" href="{{ route('login') }}">Sign In</a></li>
    </ul>

    <div class="section grey valign-wrapper">
        <div class="row valign">
            <div class="col s12 m10 offset-m1">
                <div class="row">
                    <div class="col s12">
                        <h2 class="section-title grey-text" style="font-family:Playfair Display;" id="who-we-are">
                            <b>About Us</b>
                        </h2>
                    </div>
                </div>
                <div class="col s6" style="padding: 0 5vh 0 0;">
                    <img src="{{ asset('admin-bsb/images/slider2.png') }}" alt="who-we-are"
                        style="width:100%;border-radius: 10px;">
                </div>
                <div class="col s6">
                    <div class="blog">
                        <h4 class="span">Don't Worry Be Hoofey</h4>
                        <p>Hoofey adalah penyedia layanan pembuatan undangan digital berbasis website dan aplikasi.
                            Kamu bisa mengatur pernikahanmu dengan Hoofey,
                            sebar undangan dengan cepat dan mudah,
                            kelola buku tamu tanpa ribet.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <footer class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col s6 m3">
                    <p>Made with love by <a href="https://aksesdigital.co.id">CV. Akses Digital</a></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>

    <!-- External libraries -->
    <script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/TweenMax.min.js') }}"></script>
    <script src="{{ asset('js/ScrollMagic.min.js') }}"></script>
    <script src="{{ asset('js/animation.gsap.min.js') }}"></script>

    <!-- Initialization script -->
    <script src="{{ asset('js/startup.js') }}"></script>
    <script src="{{ asset('js/init.js') }}"></script>
</body>

</html>
