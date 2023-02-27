<!DOCTYPE html>
<html lang="en">

<head>

    <title>Hoofey - Wedding of {{$event->nama_panggilan_mempelai_wanita}} & {{$event->nama_panggilan_mempelai_pria}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="Undangan Website Pernikahan">
    <meta property="og:title" content="WEDDING OF {{$event->nama_panggilan_mempelai_wanita }} & {{$event->nama_panggilan_mempelai_pria }}" />
    <meta property="og:url" content="{{route('see.event',[ 'slug' => $event->slug])}}" />
    @if($photo_event != null)
    <meta property="og:image" content="{{asset($photo_event[0]['path'])}}">
    @endif
    <meta property="og:description" content="{{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('d M Y')}}">

    <meta property="og:image:type" content="image/jpeg" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{asset('favicon-32x32.png')}}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{asset('favicon-16x16.png')}}" sizes="16x16" />

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('template-3/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('template-3/css/dripicons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('template-3/css/styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('template-3/css/ekko-lightbox.css')}}">
    <style type="text/css">
        .label-alert {
            margin-top: 5px;
            font-size: 12px !important;
            text-transform: none !important;
            color: #f85959;
            font-weight: 400 !important;
        }

        .required {
            border: 1px solid #f85959 !important;
        }
    </style>
</head>

<body class="boxed">
    @if($event->audio_id != null)
    <audio autoplay hidden loop>
        <source src="{{asset('admin/assets/audio/' . $event->audio->path)}}" type="audio/mpeg">
    </audio>
    @endif
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand font-primary" href="#">
                <i>
                    <img class="floral" src="{{asset('template-3/img/floral.png')}}" width="50">
                    {{$event->nama_panggilan_mempelai_pria}} & {{$event->nama_panggilan_mempelai_wanita}}
                </i>
            </a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <span class="nav-link">
                        <button class="btn btn--nav">
                            <img src="{{asset('template-3/img/share.svg')}}" alt="" class="share--icon mr-md-2"> <span class="xs-none">Share</span>
                            <div class="social">
                                <a href="https://plus.google.com/share?url=http://your-website.com" target="_blank">
                                    <img class="gplus" src="{{asset('template-3/img/share-gplus.svg')}}" alt="">
                                </a>
                                <a href="https://twitter.com/share?url=http://your-website.com&amp;text=Your%20Website%20Name&amp;hashtags=yourwebsite" target="_blank">
                                    <img class="twitter" src="{{asset('template-3/img/share-twitter.svg')}}" alt="">
                                </a>
                                <a href="http://www.facebook.com/sharer.php?u=http://your-website.com" target="_blank">
                                    <img class="fb" src="{{asset('template-3/img/share-fb.svg')}}" alt="">
                                </a>
                            </div>
                        </button>
                    </span>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Header -->
    <header>
        <div class="container text-center">
            <span id="wedding-date">{{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('d M Y')}}</span>
            <img class="floral" src="{{asset('template-3/img/floral.png')}}">
            <h1 class="font-primary">{{$event->nama_panggilan_mempelai_pria}} & {{$event->nama_panggilan_mempelai_wanita}}</h1>
            <p class="text-center">We're getting married.</p>

            <a class="smooth-scroll" data-scroll href="#rsvp">
                <button class="btn btn--demo">
                    I Want To Come
                </button>
            </a>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
            <polygon fill="#FAFAFA" points="0,100 100,0 100,100" />
        </svg>

    </header>
    <!-- End: Header -->

    <!-- Couple -->
    <section id="couple" class="bg--white">
        <div class="container">
            <div class="couple">
                <img src="{{asset('template-3/img/floral-border-left.png')}}" class="floral--top-left">
                <div class="row">
                    <div class="col-12">
                        <h4 class="text-center font-primary">Save the Date</h4>
                        <hr class="short">
                    </div>
                </div>
                <div class="row pt-2 pb-2">
                    <div class="col-12 col-md-6 my-auto mx-auto" style="position: relative;">
                        <img src="{{asset('template-3/img/connector.png')}}" class="bride--connector">
                        @if($event->avatar_pria != null)
                        <center><img src="{{asset($event->avatar_pria)}}" class="bride--photo"></center>
                        @endif
                        <p class="bride--name">{{$event->nama_lengkap_mempelai_pria}}</p>
                        <div class="bride--info">
                            <div class="bride--desc">
                                {{$event->bio_mempelai_pria}}
                            </div>
                            <center>
                                <div class="bride--socials">
                                    <a href="http://www.instagram.com/" target="_blank">
                                        <img class="instagram" src="{{asset('template-3/img/instagram.png')}}" alt="">
                                    </a>
                                    <a href="http://www.facebook.com/" class="pl-1" target="_blank">
                                        <img class="fb" src="{{asset('template-3/img/facebook.png')}}" alt="">
                                    </a>
                                </div>
                            </center>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 my-auto mx-auto pt-5 pt-md-0">
                        @if($event->avatar_wanita != null)
                        <center><img src="{{asset($event->avatar_wanita)}}" class="bride--photo"></center>
                        @endif
                        <p class="bride--name">{{$event->nama_lengkap_mempelai_wanita}}</p>
                        <div class="bride--info">
                            <div class="bride--desc">
                                {{$event->bio_mempelai_wanita}}
                            </div>
                            <center>
                                <div class="bride--socials">
                                    <a href="http://www.instagram.com/" target="_blank">
                                        <img class="instagram" src="{{asset('template-3/img/instagram.png')}}" alt="">
                                    </a>
                                    <a href="http://www.facebook.com/" class="pl-1" target="_blank">
                                        <img class="fb" src="{{asset('template-3/img/facebook.png')}}" alt="">
                                    </a>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
                <img src="{{asset('template-3/img/floral-bottom-right.png')}}" class="floral--bottom-right">
            </div>
        </div>
    </section>
    <!-- End: Couple -->

    <!-- Video -->
    @if($event->link_youtube != null)
    <section id="video" class="no-padding bg--white">
        <div class="container">
            <div class="row">
                <div class="col-md-7 my-auto">
                    <div class="video">
                        {!!$event->link_youtube!!}
                    </div>
                </div>
                <div class="col-md-5 sm-center pt-3 pt-md-0 pl-0 pl-md-5 my-auto">
                    <h3 class="mb-4 font-primary">{!!$event->yt_title!!}</h3>
                    <p class="mb-2">{!!$event->yt_desc!!}</p>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- End: Video -->

    <!-- Location -->
    <section id="location" class="bg--white">
        <div class="container">
            <div class="row">
                <div class="col-md-5 sm-center my-auto">
                    <h3 class="mb-4 font-primary">{{ \Carbon\Carbon::parse($event->tanggal_ijab)->dayName}}, {{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('d M Y')}}<br>{{$event->lokasi_ijab}}</h3>
                    <div class="row">
                        <div class="col-12">
                            <div class="event">
                                <div class="row">
                                    <div class="col-md-1 col-sm-3 col-2 pr-0">
                                        <i class="event--icon dripicons dripicons-location"></i>
                                    </div>
                                    <div class="col-md-11 col-sm-9 col-10 pl-0" id="countdown">
                                        <p class="event--title"><b>{{ \Carbon\Carbon::parse($event->jam_mulai_ijab)->format('H:i')}} at {{$event->lokasi_ijab}}</b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-1">
                        <div class="col-12">
                            <a data-scroll href="#rsvp">
                                <button class="btn btn--demo">
                                    Yes, take me there!
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 my-auto pt-5 pt-md-0">
                    <div class="image-card">
                        <img src="{{asset('template-3/img/hall.jpg')}}"></img>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12" id="countdown">
                    <ul>
                        <h3 class="mb-4 font-primary">Countdown to Our Wedding Day</h3>
                        <li><span id="days"></span><b>days</b></li>
                        <li><span id="hours"></span><b>Hours</b></li>
                        <li><span id="minutes"></span><b>Minutes</b></li>
                        <li><span id="seconds"></span><b>Seconds</b></li>
                    </ul>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
            <polygon fill="#F8F7F2" points="0,100 100,0 100,100" />
        </svg>
    </section>
    <!-- End: Video -->

    <!-- Description -->
    @if($photo_event != null)

    <section id="description">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 my-auto xs-center">
                    <div class="row">
                        @for ($i = 0; $i < count($photo_event); $i++) <!-- Pilih dua foto dari array foto -->
                            <div class="col-12 col-md-6">
                                <div class="image-card">
                                    <img src="{{asset($photo_event[$i]['path'])}}" alt="">
                                </div>
                            </div>
                            @endfor
                    </div>
                </div>
                <div class="col-12 col-md-6 my-auto">
                    <h1 class="pt-5 pt-md-0 mb-4 font-primary">Hear Our Story</h1>
                    <div class="divider--sm"></div>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
            <polygon fill="#FAFAFA" points="0,100 100,0 100,100" />
        </svg>
    </section>
    <!-- End: Description -->


    <!-- galleries -->
    <section id="galleries" class="no-padding pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 my-auto">
                    <h1 class="mb-4 font-primary text-center">Gallery</h1>
                    <center>
                        <img class="floral" src="{{asset('template-3/img/floral.png')}}">
                    </center>
                </div>
            </div>

            <!-- Grid row -->
            <div class="gallery pt-4" id="gallery">

                @foreach($photo_event as $gallery)
                @if($gallery['id'] % 1 == 0)
                <!-- Kalau id fotonya genap, pilih kolom ini -->
                <!-- Grid column -->
                <a href="{{asset($gallery['path'])}}" data-toggle="lightbox" data-gallery="gallery">
                    <div class="mb-3 pics all 2">
                        <img class="img-fluid" src="{{asset($gallery['path'])}}" alt="Card image cap">
                    </div>
                </a>
                <!-- Grid column -->
                @else
                <!-- Kalau id fotonya ganjil, pilih kolom ini -->
                <!-- Grid column -->
                <a href="{{asset($gallery['path'])}}" data-toggle="lightbox" data-gallery="gallery">
                    <div class="mb-3 pics all 1">
                        <img class="img-fluid" src="{{asset($gallery['path'])}}" alt="Card image cap">
                    </div>
                </a>
                <!-- Grid column -->
                @endif
                @endforeach

            </div>
            <!-- Grid row -->

        </div>
    </section>
    @endif
    <!-- End: galleries -->

    <section id="rsvp">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 xs-none">
                    <div class="image-card">
                        <img src="{{asset('template-3/img/rsvp.jpg')}}">
                    </div>
                </div>

                <div class="col-12 col-md-5">
                    <h1 class="font-primary">RSVP</h1>
                    <div class="subscribe--box">
                        <img src="{{asset('template-3/img/floral-border-left-2.png')}}" class="floral--top-left">
                        <form action="{{route('attending',[ 'id' => $event->id])}}" method="POST" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 my-auto">
                                    <div class="form-group">
                                        <input id="name" name="name" type="text" class="form-control" placeholder="Your name..." value="" required maxlength="50">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 my-auto">
                                    <div class="form-group">
                                        <input id="email" name="email" type="email" class="form-control" placeholder="Email address..." value="" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" id="btn-submit" class="btn subscribe--btn">I Am Attending</button>
                        </form>
                        <img src="{{asset('template-3/img/floral-bottom-right-2.png')}}" class="floral--bottom-right">
                    </div>
                </div>
            </div>

            <!-- Maps -->
            @if($event->gm_ijab != null)
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div id="maps">
                        {!!$event->gm_ijab!!}
                    </div>
                </div>
            </div>
            @endif
            <!-- End: Maps -->

            <!-- Protokol -->
            <div class="row" style="padding: 75px 0;">
                <div class="col-lg-10 offset-lg-1">
                    <div class="title--lg text-center" style="margin-bottom:75px;">
                        <h1 class="font--3 color--midnight">Aturan Protokol Kesehatan</h1>
                    </div>
                    <div class="row text-center">
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <img src="{{asset('admin-bsb/images/protokol-1.png')}}" alt="protokol1">
                            <p>Menggunakan Masker</p>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <img src="{{asset('admin-bsb/images/protokol-2.png')}}" alt="protokol2">
                            <p>Mencuci Tangan Dengan Sabun</p>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <img src="{{asset('admin-bsb/images/protokol-3.png')}}" alt="protokol3">
                            <p>Tidak Berjabat Tangan</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Protokol -->

            <!-- Panduan -->
            <div class="row" style="padding-bottom: 75px;">
                <div class="col-lg-10 offset-lg-1">
                    <div class="title--lg text-center">
                        <h1 class="font--1 color--midnight">Panduan Penggunaan Aplikasi</h1>
                    </div>
                    <div class="row text-center" style="margin: 45px 0;">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <img src="{{asset('admin-bsb/images/step-1.png')}}" alt="protokol1"><br>
                            <p><b>Download Aplikasi di Google Playstore</b></p>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <img src="{{asset('admin-bsb/images/step-2.png')}}" alt="protokol2"><br>
                            <p><b>Login menggunakan email yang sudah didaftarkan</b></p>
                        </div>
                    </div>
                    <div class="row text-center" style="margin: 45px 0;">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <img src="{{asset('admin-bsb/images/step-3.png')}}" alt="protokol1"><br>
                            <p><b>Pilih menu invitation dan pilih undangan</b></p>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <img src="{{asset('admin-bsb/images/step-4.png')}}" alt="protokol2"><br>
                            <p><b>Lihat detail undangan mulai dari nama sampai lokasi pernikahan</b></p>
                        </div>
                    </div>
                    <div class="row text-center" style="margin: 45px 0;">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <img src="{{asset('admin-bsb/images/step-5.png')}}" alt="protokol1"><br>
                            <p><b>Pilih menu SCAN QR di pojok kanan atas</b></p>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <img src="{{asset('admin-bsb/images/step-6.png')}}" alt="protokol2" class="img6"><br>
                            <p><b>Scan QR Code yang telah tersedia di lokasi resepsi</b></p>
                        </div>
                    </div>
                    <div class="row text-center" style="margin: 45px 0;">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <img src="{{asset('admin-bsb/images/step-7.png')}}" alt="protokol1"><br>
                            <p><b>Setelah Scan QR kamu bisa langsung memberikan ucapan</b></p>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <img src="{{asset('admin-bsb/images/step-8.png')}}" alt="protokol2" class="img8"><br>
                            <p><b>Pilih tombol kamera untuk selfie</b></p>
                        </div>
                    </div>
                    <div class="row text-center" style="margin: 45px 0;">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <img src="{{asset('admin-bsb/images/step-9.png')}}" alt="protokol1"><br>
                            <p><b>Pilih template selfie kesukaanmu dan foto</b></p>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <img src="{{asset('admin-bsb/images/step-10.png')}}" alt="protokol2"><br>
                            <p><b>Kamu juga bisa share dan simpan foto</b></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Panduan -->

        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 xs-center">
                    Copyright 2020 Hoofey - All Rights Reserved
                </div>
                <div class="col-sm-4 text-right xs-center">

                </div>
            </div>
        </div>
    </footer>
    <!-- End: Footer -->

    <!-- Scripts -->
    <script type="text/javascript" src="{{asset('template-3/js/jquery-3.1.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template-3/js/bootstrap.bundle.js')}}"></script>
    <script type="text/javascript" src="{{asset('template-3/js/script.js')}}"></script>
    <script type="text/javascript" src="{{asset('template-3/js/smooth-scroll.polyfills.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template-3/js/circletype.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template-3/js/ekko-lightbox.min.js')}}"></script>
    <script type="text/javascript">
        $('document').ready(function() {
            $('.btn--nav').on('click', function() {
                $('.social').toggle(200).css('display', 'inline-block');
            });
            var scroll = new SmoothScroll('a.smooth-scroll');

            new CircleType(document.getElementById('wedding-date'))
                .radius(94);
        });

        $(document).on("click", '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });


        // Countdown script
        (function() {
            const second = 1000,
                minute = second * 60,
                hour = minute * 60,
                day = hour * 24;

            let wedding = "{{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('M d Y')}} {{ \Carbon\Carbon::parse($event->jam_mulai_ijab)->format('H:i')}}",
                countDown = new Date(wedding).getTime(),
                x = setInterval(function() {

                    let now = new Date().getTime(),
                        distance = countDown - now;

                    document.getElementById("days").innerText = Math.floor(distance / (day)),
                        document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
                        document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
                        document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);
                }, 0)
        }());
    </script>
</body>

</html>