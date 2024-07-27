<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="{{asset('favicon_hoofey.ico')}}" type="image/x-icon"> 

    <!-- Bootstrap CSS -->
    {{-- icon --}}
    <link rel="shortcut icon" href="{{ asset('img/primary-icon.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/style-v1.css') }}" />
    <title>Price - Don't Worry be Hoofey</title>
    <style>
        .striketrough{
            text-decoration: line-through;
        }
    </style>
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
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/feature') }}">Feature</a>
                    </li>
                    <li class="nav-item active">
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

    <section class="price">
        <div class="container">
            <div class="row price-list mb-5">
                <div class="col-md-12">
                    <div class="text-heading text-center">
                        <h1>
                            Harga <span>Bersahabat</span> sesuai dengan
                            <span>kebutuhanmu</span>
                        </h1>
                    </div>
                    <div class="text-body text-center mt-4">
                        <p>
                            Semua paket sudah mendapatkan undangan digital, undangan dengan nama tamu,
                            music, dan ucapan pribadi!
                        </p>
                    </div>
                </div>
            </div>
            <div class="row price-list  justify-content-center">
                @foreach ($products as $product)
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="icon-card" style="text-align: center;">
                                        <img src="{{ asset('img/icons/website.svg') }}" alt="" />
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12 p-0" style="text-align: center;">
                                    <div class="text-card m-0">
                                        <div class="text-body" >
                                            <h3>{{ $product->name }}</h3>
                                        </div>
                                        @if($product->discount()->where('is_active',true)->count() > 0)
                                            @if($product->discount->discount_type == 'Presentase')
                                                <?php
                                                    $harga_awal = $product->price;
                                                    $discount = $product->discount->amount;
                                                    $discount = ($discount/100) * $harga_awal;
                                                    $harga_akhir = ($harga_awal - $discount);
                                                ?>
                                                <p class="striketrough">Rp. {{ number_format($product->price) }}</p>
                                                <h3>Rp. {{number_format($harga_akhir)}}</h3>
                                            @else
                                                <?php
                                                    $harga_awal = $product->price;
                                                    $discount = $product->discount->amount;
                                                    $harga_akhir = ($harga_awal - $discount);
                                                ?>
                                                <p class="striketrough">Rp. {{ number_format($product->price) }}</p>
                                                <h3>Rp. {{number_format($harga_akhir)}}</p>
                                            @endif
                                        @else
                                            <div class="text-heading mb-3">
                                                <h3>Rp. {{ number_format($product->price) }}</h3>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12 text-card">
                                    <div class="text-body text-center">
                                        {!! $product->description !!}
                                        <a href="{{ route('login') }}"
                                            class="btn btn-pink-primary text-white mt-3">Pesan
                                            Sekarang</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
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
