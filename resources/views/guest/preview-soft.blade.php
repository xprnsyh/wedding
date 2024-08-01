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

    <link rel="icon" type="image/png" href="{{asset('favicon-32x32.png')}}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{asset('favicon-16x16.png')}}" sizes="16x16" />

    <link rel="stylesheet" href="{{asset('template-2/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('template-2/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('template-2/css/custom.css')}}">
</head>

<body class="boxed">
    @if($event->audio_id != null)
    <audio autoplay hidden loop>
        <source src="{{asset('admin/assets/audio/' . $event->audio->path)}}" type="audio/mpeg">
    </audio>
    @endif
    <!-- Top Nav -->
    <div id="top-nav">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-7 col-6 text-left">
                    <h5 class="font--2">{{$event->nama_panggilan_mempelai_pria}} <span class="color--gold">&</span> {{$event->nama_panggilan_mempelai_wanita}} <span class="font--1 text--sm italic bold ml-3 soft xs--none">Wedding Invitation</span></h5>
                </div>
                <div class="col-md-5 col-sm-5 col-6 text-right">
                    <div class="share bold italic text-uppercase">
                        share
                        <span class="separator"></span>
                        <span class="share-social">
                            <a href="https://www.facebook.com/sharer.php?u=YOUR_WEBSITE_URL" target="_blank">
                                <img src="{{asset('template-2/img/icons/facebook.png')}}" alt="">
                            </a>
                            <a href="https://twitter.com/share?url=YOUR_WEBSITE_URL&amp;text=SOME_TEXT&amp;hashtags=HASHTAGS" target="_blank">
                                <img src="{{asset('template-2/img/icons/twitter.png')}}" alt="">
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End: Top Nav -->

    <!-- Header -->
    <header>
        <div class="container">
            <div class="text-center">
                <img src="{{asset('template-2/img/logo-ornament.png')}}" alt="" class="header--ornaments">
                <h3 class="mt-4 mb-2 font--2">{{$event->nama_panggilan_mempelai_wanita}} <span class="color--gold font--4">&</span> {{$event->nama_panggilan_mempelai_pria}}</h3>
                <p class="italic text-uppercase spacing--1">{{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('M d Y')}}</p>
            </div>
            <div class="divider"></div>
            @if($photo_event != null)
            <div class="header--photo">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        @foreach($photo_event as $key => $gallery)
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{asset($gallery['path'])}}" alt="First slide">
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            @endif
            <div class="divider--lg"></div>
            <div class="title--xlg text-center">
                <h5 class="italic text-uppercase text-center spacing--2">The Wedding of</h5>
                <h3 class="font--4">{{$event->nama_panggilan_mempelai_wanita}} & {{$event->nama_panggilan_mempelai_pria}}</h3>
            </div>
            <div class="divider"></div>
            <div class="row">
                <div class="col-md-4 col-sm-4 r-5 my-auto text-right sm--center">
                    <h4 class="font--3 mb-4">{{$event->nama_lengkap_mempelai_wanita}}</h4>
                    <p class="italic">{{$event->bio_mempelai_wanita}}</p>
                    <a href="">
                        <img class="social-media" src="{{asset('template-2/img/instagram.png')}}" alt="">
                    </a>
                </div>
                <div class="col-md-2 col-sm-2 col-6 pr-0 xs--reset--padding my-auto">
                    @if($event->avatar_wanita != null)
                    <div class="photo left">
                        <img class="bride" src="{{asset($event->avatar_wanita)}}" alt="">
                    </div>
                    @endif
                </div>
                <div class="col-md-2 col-sm-2 col-6 pl-0 xs--reset--padding my-auto">
                    <div class="photo">
                        @if($event->avatar_pria != null)
                        <img class="bride" src="{{asset($event->avatar_pria)}}" alt="">
                        @endif
                        <div class="love">
                            <img src="{{asset('template-2/img/heart.png')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 pl-5 my-auto sm--center">
                    <h4 class="font--3 mb-4">{{$event->nama_lengkap_mempelai_pria}}</h4>
                    <p class="italic">{{$event->bio_mempelai_pria}}</p>
                    <a href="">
                        <img class="social-media" src="{{asset('template-2/img/instagram.png')}}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </header>
    <!-- End: Header -->

    <!-- Date -->
    <section id="invite">
        <div class="container">
            <div class="text-center">
                <div class="invite--title">
                    <h5 class="italic bold text-uppercase text-center spacing--2">With great pleasure</h5>
                    <h2 class="font--4">Invite You</h2>
                    <h6 class="mt-3 italic bold text-uppercase text-center spacing--2">TO CELEBRATE OUR MARRIAGE</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="date text-center">
                        <h5 class="italic">Dengan memanjatkan puji syukur serta memohon ridho dan rahmat
                            Allah Subhanahu Wa Ta'ala, kami bermaksud menyelenggarakan resepsi pernikahan Putra-Putri kami yang InshaAllah
                            akan diselenggarakan pada</h5>
                        <div class="title">
                            <h2 class="font--3 mt-4">{{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('d M Y')}}</h2>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Date -->

    <!-- Gallery -->
    <section id="gallery">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="row">
                                <div class="col-md-3 col-2 my-auto">
                                    <img src="{{asset('template-2/img/location.svg')}}" alt="" class="event--icon">
                                </div>
                                <div class="col-md-9 col-10 pl-2 my-auto">
                                    <p class="bold italic mb-0">{{$event->lokasi_ijab}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <br class="xs--show">
                            <div class="row">
                                <div class="col-md-3 col-2 my-auto">
                                    <img src="{{asset('template-2/img/clock.svg')}}" alt="" class="event--icon">
                                </div>
                                <div class="col-md-9 col-10 pl-2 my-auto">
                                    <p class="bold italic mb-0">{{ \Carbon\Carbon::parse($event->jam_mulai_ijab)->format('H:i')}} - {{ \Carbon\Carbon::parse($event->jam_selesai_ijab)->format('H:i')}} WIB</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="row">
                                <div class="col-md-3 col-2 my-auto">
                                    <img src="{{asset('template-2/img/location.svg')}}" alt="" class="event--icon">
                                </div>
                                <div class="col-md-9 col-10 pl-2 my-auto">
                                    <p class="bold italic mb-0">{{$event->lokasi_resepsi}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <br class="xs--show">
                            <div class="row">
                                <div class="col-md-3 col-2 my-auto">
                                    <img src="{{asset('template-2/img/clock.svg')}}" alt="" class="event--icon">
                                </div>
                                <div class="col-md-9 col-10 pl-2 my-auto">
                                    <p class="bold italic mb-0">{{ \Carbon\Carbon::parse($event->jam_mulai_resepsi)->format('H:i')}} - {{ \Carbon\Carbon::parse($event->jam_selesai_resepsi)->format('H:i')}} WIB</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="row">
                        <div class="col-12 col-lg-8 col-sm-6 offset-lg-4 mx-auto my-auto">
                            <div class="row">
                                <div class="countdown">
                                    <h2 class="font--3 mt-4">Countdown to Our Wedding Day</h2>
                                    <ul>
                                        <li><span id="days"></span>days</li>
                                        <li><span id="hours"></span>Hours</li>
                                        <li><span id="minutes"></span>Minutes</li>
                                        <li><span id="seconds"></span>Seconds</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if($event->link_youtube != null)
            <div class="row">
                <div class="col-12 col-lg-8 offset-lg-4 mx-auto my-auto">
                    <div class="video">
                        {!!$event->link_youtube!!}
                    </div>
                </div>
            </div>
            @endif

            @if($photo_event != null)

            <div class="text-center">
                <img class="gallery--separator" src="{{asset('template-2/img/separator.svg')}}" alt="">
            </div>
            <div class="title--lg text-center">
                <h2 class="font--4 color--gold">Gallery</h2>
                <p class="text-uppercase bold italic spacing--1">OUR STORIES</p>
            </div>

            <div class="divider--lg"></div>

            @foreach($photo_event as $gallery)
            @if($gallery['id'] % 1 == 0)
            <!-- Kalau id fotonya genap, pilih kolom ini -->
            <!-- Story 1 -->
            <div class="story">
                <div class="row">
                    <div class="col-md-6 col-sm-4 my-auto">
                        <div class="story--photo">
                            <img src="{{asset($gallery['path'])}}" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-8 sm--center my-auto">
                        <div class="story--text">
                            <div class="title">
                                <h3 class="font--3">{{$gallery['name']}}</h3>
                                <p class="text-uppercase bold italic color--gold spacing--1">{{ \Carbon\Carbon::parse($gallery['date'])->format('M d, Y')}}</p>
                            </div>
                            <h5 class="italic">{{$gallery['caption']}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <!-- Kalau id fotonya genap, pilih kolom ini -->
            <!-- Story 2 -->
            <div class="story">
                <div class="row">
                    <div class="col-md-6 col-sm-8 text-right sm--center my-auto">
                        <div class="story--text left">
                            <div class="title">
                                <h3 class="font--3">{{$gallery['name']}}</h3>
                                <p class="text-uppercase bold italic color--gold spacing--1">{{ \Carbon\Carbon::parse($gallery['date'])->format('M d, Y')}}</p>
                            </div>
                            <h5 class="italic">{{$gallery['caption']}}</h5>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-4 my-auto">
                        <div class="story--photo">
                            <img src="{{asset($gallery['path'])}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            @endif

        </div>
    </section>
    <!-- End: Gallery -->

    <!-- RSVP -->
    <section id="rsvp">
        <div class="container">
            <div class="row">
                <div class="col-md-4 pr-5 xs--reset--padding text-right md--center my-auto">
                    <h3 class="font--4">Are you attending?</h3>
                    <p class="bold italic text-uppercase spacing--1">RSVP Here</p>
                    <div class="divider md--show"></div>
                </div>
                <div class="col-md-8 my-auto">
                    <form action="{{route('attending',[ 'id' => $event->id])}}" autocomplete="off" method="POST">
                        @csrf
                        <div class="row gutter--sm">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Your name..." required>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email address..." required>
                                </div>
                            </div>
                        </div>
                        <div class="row gutter--sm">

                            <div class="col-md-12 col-sm-12">
                                <button type="submit" class="btn btn-block btn--attending">I am Attending</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Maps -->
            @if($event->gm_ijab != null)
            <div class="maps">
                {!!$event->gm_ijab!!}
            </div>
            @endif
            <!-- End Maps -->

            <!-- Protokol -->
            <div class="row" style="padding: 150px 0 75px;">
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
            <!--End  Protokol -->

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
    <!-- End: RSVP -->

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p class="bold italic spacing--1 mb-0">{{$event->nama_panggilan_mempelai_wanita}} & {{$event->nama_panggilan_mempelai_pria}}</p>
        </div>
    </footer>
    <!-- End: Footer -->

</body>

<!-- Scripts -->
<script type="text/javascript" src="{{asset('template-2/js/jquery-3.1.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('template-2/js/bootstrap.bundle.js')}}"></script>
<script type="text/javascript" src="{{asset('template-2/js/levidio.js')}}"></script>
<!-- Countdown script -->
<script>
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

</html>