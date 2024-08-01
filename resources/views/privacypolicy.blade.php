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
                            <span>Kebijakan</span> Privasi
                        </h1>
                    </div>
                    <div class="text-body text-center mt-2">
                        <p>
                            "dibuat oleh hoofey, 08 Agustus 2020."
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <p>Kebijakan privasi menjelaskan bagaimana informasi Anda dikumpulkan dan digunakan oleh Hoofey. Kebijakan ini juga berlaku untuk informasi yang kami kumpulkan Ketika pengguna memilih untuk menggunakan Website dan Platform Hoofey.</p>
                <p>Kami dapat mengganti dan memodifikasi Kebijakan Privasi dari waktu ke waktu. Kami menghimbau Anda untuk meninjau halaman ini secara berkala ketika Anda mengakses Platform Hoofey untuk mengetahui informasi terbaru terkait Kebijakan Privasi yang berlaku.</p>
                <p>Anda akan memberikan informasi pribadi yang diberikan secara langsung kepada kami (contohnya saat pendaftaran, pengisian formulir, atau mengunjungi halaman) dan beberapa informasi akan secara otomatis dikumpulkan ketika Anda menggunakan website Hoofey. Ketika Anda menggunakan dan berinteraksi dengan Platform Hoofey, kami akan mengumpulkan data teknis seperti alamat IP Anda, halaman yang pernah Anda kunjungi, browser internet yang Anda gunakan, halaman web yang sebelumnya/selanjutnya Anda kunjungi dan durasi setiap kunjungan/sesi.</p>
                <p>Dengan data ini, kami dapat menyelesaikan kesulitan-kesulitan teknis atau memperbaiki kemampuan untuk dapat diaksesnya bagian-bagian tertentu dari aplikasi maupun website. Kami menggunakan informasi pribadi dalam bentuk tanpa nama dan secara keseluruhan untuk memantau lebih dekat fitur-fitur mana dari aplikasi maupun website yang paling sering digunakan, untuk menganalisa pola penggunaan.</p>
                <p>Dengan ini Anda setuju bahwa data Anda akan digunakan untuk mendukung pelayanan kami, yaitu untuk memperbaiki dan meningkatkan pelayanan. Memahami bagaimana layanan kami dipergunakan, mengoptimalkan upaya pemasaran dan periklanan, meningkatkan layanan Customer Service dan Support Operations, serta melindungi Anda selaku Pengguna, Kami selaku penyedia Platform, dan layanan yang kami tawarkan.</p>
                <p>Dengan mengunjungi website, Anda mengakui bahwa Anda telah membaca dan memahami Kebijakan Privasi ini dan setuju dan sepakat terhadap penggunaan, praktik, pemrosesan, dan pengalihan informasi pribadi Anda oleh kami sebagaimana dinyatakan di dalam Kebijakan Privasi ini.</p>
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