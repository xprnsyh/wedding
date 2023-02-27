<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    {{-- icon --}}
    <link rel="shortcut icon" href="{{ asset('img/primary-icon.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/style-v1.css') }}" />
    <title>Blog | Hoofey.id - Don't Worry be Hoofey</title>
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
                        <a class="nav-link" href="{{ url('/price') }}">Price</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/blog') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/story') }}">Story</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-secondary" href="{{ route('login') }}">Masuk</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-heading">
                        <h1>Blog</h1>
                    </div>
                </div>
            </div>
            @if ($post->count() > 0)
                <div class="row">
                    @foreach ($post as $posts)
                        <div class="col-lg-4 col-md-6 col-6">
                            <a href="{{ route('show.blog', ['slug' => $posts->slug]) }}">
                                <div class="card">
                                    <img class="card-img-top"
                                        src="{{ asset('admin/assets/images/blogs/' . $posts->featured_image) }}"
                                        alt="{{ $posts->title }}"
                                        style="height: 200px; object-fit: cover; object-position: center;" />
                                    <div class="card-body">
                                        <h5 class="card-title">{!! Str::limit($posts->title, 50, '...') !!}</h5>
                                        <div class="card-text">
                                            {!! Str::limit($posts->body, 80, '...') !!}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info">
                            There's no posts
                        </div>
                    </div>
                </div>
            @endif
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
