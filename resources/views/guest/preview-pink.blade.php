<!doctype html>
<html>

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

    <link rel="stylesheet" href="{{asset('css/materialize.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/startup-materialize.min.css')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Niconne&display=swap" rel="stylesheet">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <div class="section header" style="padding-bottom:0;">
        <div class="background">
            <img src="{{asset('admin-bsb/images/image-template-1.png')}}" style="opacity:0.5;">
        </div>
        <div class="row valign">
            <div class="col s12">
                <div class="template">
                    <p class="span-sm">Undangan Pernikahan</p>
                    <p class="span">{{$event->nama_panggilan_mempelai_wanita}} & {{$event->nama_panggilan_mempelai_pria}}</p>
                    <p>{{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('d M Y')}}</p>
                </div>
            </div>
        </div>

        <div style="height: 150px; overflow: hidden;">
            <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                <path d="M-8.74,49.83 C149.99,150.00 381.77,151.47 514.39,40.95 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #ffffff;"></path>
                <path d="M-8.74,84.38 C149.99,150.00 381.77,151.47 511.57,85.36 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #f7adaf;"></path>
            </svg>
        </div>
    </div>

    <div class="section pink valign-wrapper">
        <div class="row valign">
            <div class="col s12 m12 l12">
                <div class="row">
                    <div class="col s12 m12 l8" id="invite-container">
                        <div class="opening">
                            <p>Dengan memanjatkan puji syukur serta memohon ridho dan rahmat Allah Subhanahu Wa Ta'ala,
                                kami bermaksud menyelenggarakan resepsi pernikahan
                                Putra-Putri kami yang Insha Allah akan diselenggarakan pada</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l8" id="detail-container">
                        <div class="opening-detail">
                            <div class="col s12 m4 l4">
                                @if($event->avatar_wanita != null)
                                <img src="{{asset($event->avatar_wanita)}}" alt="fotomempelai" class="image-mempelai">
                                <h4 class="pink-text">{{$event->nama_lengkap_mempelai_wanita}}</h4>
                                <p class="pink-text">{{$event->bio_mempelai_wanita}}</p>
                                @else
                                <h4 class="pink-text" style="margin: 20vh 0 0;">{{$event->nama_lengkap_mempelai_wanita}}</h4>
                                <p class="pink-text">{{$event->bio_mempelai_wanita}}</p>
                                @endif
                            </div>
                            <div class="col s12 m4 l4">
                                <h4 class="pink-text" id="and">&</h4>
                            </div>
                            <div class="col s12 m4 l4">
                                @if($event->avatar_pria != null)
                                <img src="{{asset($event->avatar_pria)}}" alt="fotomempelai" class="image-mempelai">
                                <h4 class="pink-text">{{$event->nama_lengkap_mempelai_pria}}</h4>
                                <p class="pink-text">{{$event->bio_mempelai_pria}}</p>
                                @else
                                <h4 class="pink-text" style="margin: 20vh 0 0;">{{$event->nama_lengkap_mempelai_pria}}</h4>
                                <p class="pink-text">{{$event->bio_mempelai_pria}}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section white valign-wrapper">
        <div class="row valign">
            <div class="col s12 m12 l12">
                <div class="row">
                    <div class="col s12 m12 l8" id="lokasi-container">
                        <div class="opening-detail">
                            <div class="col s12 m12 l6">
                                <h6 class="pink-text">Akad Nikah</h6>
                                <p class="pink-text">{{ \Carbon\Carbon::parse($event->tanggal_ijab)->dayName}}, {{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('d M Y')}}</p>
                                <p class="pink-text">{{ \Carbon\Carbon::parse($event->jam_mulai_ijab)->format('H:i')}} WIB</p>
                                <p class="pink-text">{{$event->lokasi_ijab}}</p>
                            </div>
                            <div class="col s12 m12 l6">
                                <h6 class="pink-text">Resepsi Pernikahan</h6>
                                <p class="pink-text">{{ \Carbon\Carbon::parse($event->tanggal_resepsi)->dayName}}, {{ \Carbon\Carbon::parse($event->tanggal_resepsi)->format('d M Y')}}</p>
                                <p class="pink-text">{{ \Carbon\Carbon::parse($event->jam_mulai_resepsi)->format('H:i')}} WIB</p>
                                <p class="pink-text">{{$event->lokasi_resepsi}}</p>
                            </div>
                        </div>
                    </div>
                    @if($event->gm_ijab != null)
                    <div class="row">
                        <div class="col s12 m12">
                            <div class="opening-detail" id="btn-lokasi">
                                <a href="{!!$event->gm_ijab!!}" class="btn-pink">Lihat Lokasi</a>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="section pink valign-wrapper">
        <div class="row valign">
            <div class="col s12 m12 l12">
                <div class="row">
                    <div class="col s12 m12 l8" id="counting">
                        <div class="opening">
                            <h2>Counting Down to The Big Day</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l8" id="countdown-container">
                        <div class="countdown">
                            <div class="row">
                                <div class="col s12">
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
        </div>
    </div>

    @if($photo_event != null)
    <div class="section pink">
        <div class="slider fullscreen">
            <ul class="slides col s12 m6 l4 fade-in-out">
                @foreach($photo_event as $gallery)
                <li>
                    <img src="{{asset($gallery['path'])}}">
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    <div class="section pink valign-wrapper" style="padding:0;">
        <div class="row valign">
            <div class="col s12 m12 l12">
                <div class="row">
                    <div class="col s12 m12 l8" id="attend-container">
                        <div class="opening">
                            <h2>Are you attending?</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l10" id="attend-input-container">
                        <div class="attend">
                            <div class="row">
                                <form action="{{route('attending',[ 'id' => $event->id])}}" autocomplete="off" method="POST">
                                @csrf
                                    <div class="col s12 m12 l4">
                                        <label for="name" class="pink-text">Your Name</label>
                                        <input type="text" name="name" class="input-pink" placeholder="Your name">
                                    </div>
                                    <div class="col s12 m12 l4">
                                        <label for="email" class="pink-text">Your Email Address</label>
                                        <input type="email" name="email" class="input-pink" placeholder="Your email address">
                                    </div>
                                    <div class="col s12 m12 l4">
                                        <button type="submit" class="btn btn-pink waves-effect">I am Attending</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section pink valign-wrapper" style="padding:0;">
        <div class="row valign">
            <div class="col s12 m12 l12">
                <div class="row">
                    <div class="col s12 m12 l8" id="protokol-container">
                        <div class="protokol">
                            <h2>Aturan Protokol Kesehatan</h2>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col s12 m12">
                        <div class="protokol">
                            <div class="row">
                                <div class="col s12">
                                    <div class="col s12 m12 l4">
                                        <img src="{{asset('admin-bsb/images/protokol-1.png')}}" alt="protokol1">
                                        <p>Menggunakan Masker</p>
                                    </div>
                                    <div class="col s12 m12 l4">
                                        <img src="{{asset('admin-bsb/images/protokol-2.png')}}" alt="protokol2">
                                        <p>Mencuci Tangan Dengan Sabun</p>
                                    </div>
                                    <div class="col s12 m12 l4">
                                        <img src="{{asset('admin-bsb/images/protokol-3.png')}}" alt="protokol3">
                                        <p>Tidak Berjabat Tangan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section pink valign-wrapper">
        <div class="row valign">
            <div class="col s12 m12 l12">
                <div class="row">
                    <div class="col s12 m12 l12 center-align">
                        <h2>Panduan Penggunaan Aplikasi</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l3" style="padding-right:0; margin-top:50px;">
                        <img src="{{asset('admin-bsb/images/step-1.png')}}" alt="" srcset="">
                    </div>
                    <div class="col s12 m12 l3" style="padding-left:0;">
                        <h4>Download aplikasi Hoofey di Google Playstore</h4>
                    </div>
                    <div class="col s12 m12 l3" style="padding-right:0; margin-top:50px;">
                        <img src="{{asset('admin-bsb/images/step-2.png')}}" alt="" srcset="">
                    </div>
                    <div class="col s12 m12 l3" style="padding-left:0;">
                        <h4>Login menggunakan email yang sudah didaftarkan</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section pink valign-wrapper">
        <div class="row valign">
            <div class="col s12 m12 l12">
                <div class="row">
                    <div class="col s12 m12 l3" style="padding-right:0; margin-top:50px;">
                        <img src="{{asset('admin-bsb/images/step-3.png')}}" alt="" srcset="">
                    </div>
                    <div class="col s12 m12 l3" style="padding-left:0;">
                        <h4>Pilih menu invitation dan pilih undangan</h4>
                    </div>
                    <div class="col s12 m12 l3" style="padding-right:0; margin-top:50px;">
                        <img src="{{asset('admin-bsb/images/step-4.png')}}" alt="" srcset="">
                    </div>
                    <div class="col s12 m12 l3" style="padding-left:0;">
                        <h4>Lihat detail undangan mulai dari nama sampai lokasi pernikahan</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section pink valign-wrapper">
        <div class="row valign">
            <div class="col s12 m12 l12">
                <div class="row">
                    <div class="col s12 m12 l3" style="padding-right:0; margin-top:50px;">
                        <img src="{{asset('admin-bsb/images/step-5.png')}}" alt="" srcset="">
                    </div>
                    <div class="col s12 m12 l3" style="padding-left:0;">
                        <h4>Pilih menu SCAN QR di pojok kanan atas</h4>
                    </div>
                    <div class="col s12 m12 l3" style="padding-right:0; margin-top:50px;">
                        <img src="{{asset('admin-bsb/images/step-6.png')}}" alt="" srcset="">
                    </div>
                    <div class="col s12 m12 l3" style="padding-left:0;">
                        <h4>Scan QR Code yang telah tersedia di lokasi resepsi</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section pink valign-wrapper">
        <div class="row valign">
            <div class="col s12 m12 l12">
                <div class="row">
                    <div class="col s12 m12 l3" style="padding-right:0; margin-top:50px;">
                        <img src="{{asset('admin-bsb/images/step-7.png')}}" alt="" srcset="">
                    </div>
                    <div class="col s12 m12 l3" style="padding-left:0;">
                        <h4>Setelah Scan QR kamu bisa langsung memberikan ucapan</h4>
                    </div>
                    <div class="col s12 m12 l3" style="padding-right:0; margin-top:50px;">
                        <img src="{{asset('admin-bsb/images/step-8.png')}}" alt="" srcset="">
                    </div>
                    <div class="col s12 m12 l3" style="padding-left:0;">
                        <h4>Pilih tombol kamera untuk selfie</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section pink valign-wrapper">
        <div class="row valign">
            <div class="col s12 m12 l12">
                <div class="row">
                    <div class="col s12 m12 l3" style="padding-right:0; margin-top:50px;">
                        <img src="{{asset('admin-bsb/images/step-9.png')}}" alt="" srcset="">
                    </div>
                    <div class="col s12 m12 l3" style="padding-left:0;">
                        <h4>Pilih template selfie kesukaanmu dan foto</h4>
                    </div>
                    <div class="col s12 m12 l3" style="padding-right:0; margin-top:50px;">
                        <img src="{{asset('admin-bsb/images/step-10.png')}}" alt="" srcset="">
                    </div>
                    <div class="col s12 m12 l3" style="padding-left:0;">
                        <h4>Kamu juga bisa share dan simpan foto</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section pink valign-wrapper" style="padding:0;">
        <div class="row valign">
            <div class="col s12 m12 l12" id="download-container">
                <div class="row">
                    <div class="col s12 m12 l8">
                        <div class="download">
                            <h2>Download Aplikasi</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l8">
                        <div class="download">
                            <div class="row">
                                <div class="col s12">
                                    <a href="https://play.google.com/store/apps/details?id=com.aksesdigital.hoofey" target="_blank"><img src="{{asset('admin-bsb/images/image-download.png')}}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l8">
                        <div class="download">
                            <div class="row">
                                <div class="col s12">
                                    <h3>Terima Kasih</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="page-footer white">
        <div class="row center-align">
            <div class="col s12">
                <p class="black-text">Made by</p>
                <p><a href="https://hoofey.id"><img src="{{asset('admin-bsb/images/logo.png')}}" alt="hoofeylogo" width="5%" /></a></p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="{{asset('js/materialize.min.js')}}"></script>

    <!-- External libraries -->
    <script src="{{asset('js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('js/masonry.pkgd.min.js')}}"></script>
    <script src="{{asset('js/TweenMax.min.js')}}"></script>
    <script src="{{asset('js/ScrollMagic.min.js')}}"></script>
    <script src="{{asset('js/animation.gsap.min.js')}}"></script>

    <!-- Initialization script -->
    <script src="{{asset('js/startup.js')}}"></script>
    <script src="{{asset('js/init.js')}}"></script>

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
</body>

</html>