<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Undangan Pernikahan, Undangan pernikahan online, website undangan">
    <meta property="og:image" itemprop="image" content="{{ asset('img/logo-hoofey-meta.png') ?? ''}}">
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="300" />
    <meta property="og:image:height" content="300" />
    {{-- icon --}}
    <!--<link rel="shortcut icon" href="{{ asset('img/primary-icon.png') }}">-->
    <link rel="icon" href="{{asset('favicon_hoofey.ico')}}" type="image/x-icon"> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/style-v1.css') }}">
    <title>Hoofey.id - Don't Worry be Hoofey</title>
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
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('img/logo.png') }}" alt="Hoofey.id" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/feature') }}">Feature</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/price') }}">Products</a>
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

    <section class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <div class="text-heading">
                        <h1>
                            <span>The New</span> Way to Wedding <span>Invitation</span>
                        </h1>
                    </div>
                    <div class="text-body">
                        <p>
                            Sending invitation is easier,<br />
                            Manage guest list without hassle
                        </p>
                    </div>
                    <div class="signup-homepage">
                        <form action="{{ route('register') }}" method="get">
                            <input type="text" name="email" id="email" placeholder="Your Email Address" />
                            <button type="submit" class="btn btn-orange main">
                                Daftar Sekarang
                            </button>
                        </form>
                    </div>
                </div>
                <div class="d-lg-block d-md-block d-sm-none d-none col-lg-7 col-md-6">
                    <div class="img-wrapper">
                        <img src="{{ asset('img/review.png') }}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="features">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6 col-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="icon-card">
                                <img src="{{ asset('img/icons/website.svg') }}" alt="" />
                            </div>
                            <div class="text-card">
                                <div class="text-heading">
                                    <h3>Website Selalu Aktif</h3>
                                </div>
                                <div class="text-body">
                                    <p>
                                        Website yang cepat dan aman akan aktif tanpa ada batasan
                                        waktu.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6 col-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="icon-card">
                                <img src="{{ asset('img/icons/bukutamu.svg') }}" alt="" />
                            </div>
                            <div class="text-card">
                                <div class="text-heading">
                                    <h3>Buku Tamu Digital</h3>
                                </div>
                                <div class="text-body">
                                    <p>
                                        Catatan kehadiran dapat dipantau dengan mudah dan lengkap.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6 col-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="icon-card">
                                <img src="{{ asset('img/icons/ucapan.svg') }}" alt="" />
                            </div>
                            <div class="text-card">
                                <div class="text-heading">
                                    <h3>Doa dan Ucapan</h3>
                                </div>
                                <div class="text-body">
                                    <p>
                                        Para tamu dapat memberikan doa dan ucapan langsung di website-mu.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6 col-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="icon-card">
                                <img src="{{ asset('img/icons/website.svg') }}" alt="" />
                            </div>
                            <div class="text-card">
                                <div class="text-heading">
                                    <h3>Impor/Ekspor Data</h3>
                                </div>
                                <div class="text-body">
                                    <p>
                                        Semua data seperti tamu, buku tamu kamu olah dengan mudah.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="other-features">
        <div class="container">
            <div class="row">
                <div class="col-md-4 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('img/home-featured.png') }}" alt="" />
                </div>
                <div class="col-md-8 d-flex align-items-center justify-content-center">
                    <div class="text">
                        <div class="title-other-features">
                            <h1>Undangan Digital yang Berkesan</h1>
                        </div>
                        <div class="text-other-features">
                            <p>
                                90% undangan fisik hanya akan dibuang begitu saja. Kami
                                memberikan website sebagai undangan digital yang dapat dikirim
                                melalui WhatsApp atau email!
                            </p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4 d-lg-none d-md-none d-sm-flex d-flex align-items-center justify-content-center">
                    <img src="{{ asset('img/home-featured2.png') }}" alt="" />
                </div>
                <div class="col-md-8 d-flex align-items-center justify-content-center">
                    <div class="text">
                        <div class="title-other-features">
                            <h1>Lebih Dekat dengan Para Tamu</h1>
                        </div>
                        <div class="text-other-features">
                            <p>
                                Tamu dapat memberi doa
                                atau ucapan yang semua akan tercatat secara online.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-lg-flex d-md-flex d-sm-none d-none align-items-center justify-content-center">
                    <img src="{{ asset('img/home-featured2.png') }}" alt="" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('img/home-featured3.png') }}" alt="" />
                </div>
                <div class="col-md-8 d-flex align-items-center justify-content-center">
                    <div class="text">
                        <div class="title-other-features">
                            <h1>Check-in di Lokasi</h1>
                        </div>
                        <div class="text-other-features">
                            <p>
                                Tidak perlu repot lagi menulis di buku tamu, semua akan
                                tercatat dilokasi secara online dengan melakukan scan QR Code pada undangan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 d-lg-none d-md-none d-sm-flex d-flex align-items-center justify-content-center">
                    <img src="{{ asset('img/home-featured4.png') }}" alt="" />
                </div>
                <div class="col-md-8 d-flex align-items-center justify-content-center">
                    <div class="text">
                        <div class="title-other-features">
                            <h1>Buat Kenangan dalam Bentuk Website</h1>
                        </div>
                        <div class="text-other-features">
                            <p>
                                Sesuaikan desain website dengan konsep pernikahanmu pilih
                                warna, gaya, foto, semua bisa dilakukan.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-lg-flex d-md-flex d-sm-none d-none align-items-center justify-content-center">
                    <img src="{{ asset('img/home-featured4.png') }}" alt="" />
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="testimoni">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="text-heading">
                        <h1>What Customers Say About Us</h1>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

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
                $("nav").addClass("bg-pink");
            });
            $(window).scroll(function() {
                if ($(document).scrollTop() > 70) {
                    $("nav.navbar").addClass("bg-pink");
                } else {
                    $("nav.navbar").removeClass("bg-pink");
                }
            });
            $("#modal-alert button").click(function() {
                if ($(this).attr('data-dismiss') == "modal") {
                    $('#modal-alert').remove();
                }

            })
        });
    </script>
</body>

</html>
