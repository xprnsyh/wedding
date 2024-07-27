<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    {{-- icon --}}
    <!--<link rel="shortcut icon" href="{{ asset('img/primary-icon.png') }}">-->
    <link rel="icon" href="{{asset('favicon_hoofey.ico')}}" type="image/x-icon"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/style-v1.css') }}" />
    <title>Feature - Don't Worry be Hoofey</title>
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

    <nav class="navbar login navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/logo-pink.png') }}" alt="Hoofey.id" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/feature') }}">Feature</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/price') }}">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/blog') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/story') }}">Template</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-secondary" href="{{ route('login') }}">Masuk</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <section class="features">
        <div class="container">
            <div class="row features-list mb-5">
                <div class="col-md-12">
                    <div class="text-heading text-center">
                        <h1>
                            Fitur <span>Eksklusif</span> untuk <span>Momen</span> Tak Terlupakan Anda
                        </h1>
                    </div>
                    <div class="text-body text-center mt-4">
                        <p>
                            "Experience istimewa: Website aktif, musik mendayu, buku tamu digital, ucapan pribadi, galeri & video berkesan, dan banyak lagi!"
                        </p>
                    </div>
                </div>
            </div>
            <div class="row features-list justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 col-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 text-card">
                                    <div class="text-heading text-center mb-3">
                                        <h3>Website Selalu Aktif</h3>
                                    </div>
                                    <div class="text-body text-center">
                                        <p>Nikmati pengalaman tanpa hambatan dengan website kami yang selalu aktif, siap untuk memastikan segala informasi tersedia kapan saja.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 col-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 text-card">
                                    <div class="text-heading text-center mb-3">
                                        <h3>Ucapan Pribadi dari Tamu</h3>
                                    </div>
                                    <div class="text-body text-center">
                                        <p>Menyampaikan harapan dan ucapan langsung dari tamu, memperdalam makna acara Anda.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 col-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 text-card">
                                    <div class="text-heading text-center mb-3">
                                        <h3>Buku Tamu Digital</h3>
                                    </div>
                                    <div class="text-body text-center">
                                        <p>Membuat kenangan yang abadi dengan buku tamu digital yang memungkinkan tamu Anda meninggalkan jejak mereka secara online.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 col-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 text-card">
                                    <div class="text-heading text-center mb-3">
                                        <h3>Barcode Tamu</h3>
                                    </div>
                                    <div class="text-body text-center">
                                        <p>Kemudahan dan keamanan dalam akses tamu dengan barcode eksklusif untuk setiap undangan.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 col-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 text-card">
                                    <div class="text-heading text-center mb-3">
                                        <h3>Meja Tamu</h3>
                                    </div>
                                    <div class="text-body text-center">
                                        <p>Fasilitas lengkap untuk memudahkan penerimaan tamu, dengan 2 laptop dan 2 scanner siap membantu.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 col-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 text-card">
                                    <div class="text-heading text-center mb-3">
                                        <h3>Galeri & Video Berkesan</h3>
                                    </div>
                                    <div class="text-body text-center">
                                        <p>Abadikan momen tak terlupakan dengan galeri foto dan video yang menggambarkan keindahan acara Anda.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 col-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 text-card">
                                    <div class="text-heading text-center mb-3">
                                        <h3>Angpao Elektronik</h3>
                                    </div>
                                    <div class="text-body text-center">
                                        <p>Sentuh modernitas dengan angpao elektronik, memberikan kejutan berharga kepada tamu-tamu terkasih.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 col-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 text-card">
                                    <div class="text-heading text-center mb-3">
                                        <h3>Template Pesan Eksklusif</h3>
                                    </div>
                                    <div class="text-body text-center">
                                        <p>Tampilkan gaya unik Anda dengan template pesan eksklusif yang mencerminkan kepribadian dan tema acara.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 col-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 text-card">
                                    <div class="text-heading text-center mb-3">
                                        <h3>Sebar Undangan via WhatsApp</h3>
                                    </div>
                                    <div class="text-body text-center">
                                        <p>Mudah dan cepat, sebarkan undangan kepada tamu-tamu Anda melalui platform pesan populer, WhatsApp.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 col-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 text-card">
                                    <div class="text-heading text-center mb-3">
                                        <h3>Desain Undangan Custom</h3>
                                    </div>
                                    <div class="text-body text-center">
                                        <p>Setiap undangan adalah karya seni yang unik, dirancang khusus sesuai dengan keinginan dan selera Anda.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 col-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 text-card">
                                    <div class="text-heading text-center mb-3">
                                        <h3>Monitor / TV untuk Layar Sapa</h3>
                                    </div>
                                    <div class="text-body text-center">
                                        <p>Tampilkan sambutan hangat dengan 2 monitor/TV yang memastikan setiap tamu merasa istimewa.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 col-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 text-card">
                                    <div class="text-heading text-center mb-3">
                                        <h3>Usher</h3>
                                    </div>
                                    <div class="text-body text-center">
                                        <p>Tamu Anda akan disambut dengan ramah oleh dua usher berpengalaman, siap membimbing mereka melalui setiap tahap acara.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 col-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 text-card">
                                    <div class="text-heading text-center mb-3">
                                        <h3>Layar Sapa Khusus untuk Tamu VIP atau Biasa</h3>
                                    </div>
                                    <div class="text-body text-center">
                                        <p>Membuat kesan tak terlupakan dengan layar sapa khusus yang mengakomodasi baik tamu VIP maupun tamu biasa.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 col-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 text-card">
                                    <div class="text-heading text-center mb-3">
                                        <h3>Putar Video atau Slideshow Foto yang Mengesankan</h3>
                                    </div>
                                    <div class="text-body text-center">
                                        <p>Memikat perasaan dengan video atau slideshow foto yang menggambarkan momen indah dan mengesankan dalam acara Anda.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-heading text-white text-center">
                        <h1>Tunggu apa lagi? Miliki sekarang juga!</h1>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row d-flex align-items-center justify-content-center mt-5">
                        <div class="col-lg-6 col-md-8 col-sm-9 col-xs-9 col-12">
                            <div class="signup-homepage">
                                <form action="{{ route('register') }}" method="get">
                                    <input type="text" name="email" id="email" placeholder="Your Email Address" />
                                    <button type="submit" class="btn btn-orange">
                                        Daftar Sekarang
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-light">
        <div class="col-lg-12 text-center">
            <p>2020-2021 Copyright Hoofey by Akses Digital. All Rights Reserved</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $("nav.navbar button.navbar-toggler").click(function() {
                $("nav").addClass("bg-putih");
            });
            $(window).scroll(function() {
                if ($(document).scrollTop() > 70) {
                    $("nav.navbar").addClass("bg-putih");
                } else {
                    $("nav.navbar").removeClass("bg-putih");
                }
            });
        });
    </script>
</body>

</html>
