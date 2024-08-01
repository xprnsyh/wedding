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
    <link rel="stylesheet" href="{{asset('template-1/css/custom.css')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Niconne&display=swap" rel="stylesheet">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    @if($event->audio_id != null)
    <audio autoplay hidden loop>
        <source src="{{asset('admin/assets/audio/' . $event->audio->path)}}" type="audio/mpeg">
    </audio>
    @endif
    <div class="section header">
        <div class="background">
            <img src="{{asset('admin-bsb/images/tile-bg.png')}}">
        </div>
        <div class="row valign">
            <div class="col s12">
                <div class="template">
                    @if($event->logo_req != null)
                    <img src="{{asset('admin/assets/images/events/' . $event->order->invoice . '/'. $event->logo_req)}}" alt="logorequest">
                    @endif
                    <p class="span-sm choco-light-text">Undangan Pernikahan</p>
                    <p class="span choco-light-text">{{$event->nama_panggilan_mempelai_wanita}} & {{$event->nama_panggilan_mempelai_pria}}</p>
                    <p class="choco-light-text">{{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('d M Y')}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="section white valign-wrapper">
        <div class="row valign">
            <div class="col s12 m12 l12">
                <div class="row">
                    <div class="col s12 m12 l8" id="detail-container">
                        <div class="opening-detail">
                            <div class="col s12 m4 l4">
                                @if($event->avatar_wanita != null)
                                <img src="{{asset('admin/assets/images/wanita/' . $event->order->invoice . '/' . $event->avatar_wanita)}}" alt="fotomempelai" class="image-mempelai">
                                <h4 class="choco-light-text">{{$event->nama_lengkap_mempelai_wanita}}</h4>
                                <p class="choco-light-text">{{$event->bio_mempelai_wanita}}</p>
                                @else
                                <h4 class="choco-light-text" style="margin: 20vh 0 0;">{{$event->nama_lengkap_mempelai_wanita}}</h4>
                                <p class="choco-light-text">{{$event->bio_mempelai_wanita}}</p>
                                @endif
                                <!-- <img src="{{asset('admin-bsb/images/insta.png')}}" alt="insta" class="image-mempelai"> -->
                            </div>
                            <div class="col s12 m4 l4">
                                <h4 class="choco-light-text" id="and">&</h4>
                            </div>
                            <div class="col s12 m4 l4">
                                @if($event->avatar_pria != null)
                                <img src="{{asset('admin/assets/images/pria/' . $event->order->invoice . '/' . $event->avatar_pria)}}" alt="fotomempelai" class="image-mempelai">
                                <h4 class="choco-light-text">{{$event->nama_lengkap_mempelai_pria}}</h4>
                                <p class="choco-light-text">{{$event->bio_mempelai_pria}}</p>
                                @else
                                <h4 class="choco-light-text" style="margin: 20vh 0 0;">{{$event->nama_lengkap_mempelai_pria}}</h4>
                                <p class="choco-light-text">{{$event->bio_mempelai_pria}}</p>
                                @endif
                                <!-- <img src="{{asset('admin-bsb/images/insta.png')}}" alt="insta" class="image-mempelai"> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section choco-light-bg valign-wrapper">
        <div class="row valign">
            <div class="col s12 m12 l12">
                <div class="row">
                    <div class="col s12 m12 l8" id="invite-container">
                        <div class="opening">
                            <img src="{{asset('admin-bsb/images/flower-vector.png')}}" alt="insta" class="image-mempelai">
                            <p>Dengan memanjatkan puji syukur serta memohon ridho dan rahmat Allah Subhanahu Wa Ta'ala,
                                kami bermaksud menyelenggarakan resepsi pernikahan
                                Putra-Putri kami yang Insha Allah akan diselenggarakan pada</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l8" id="lokasi-container">
                        <div class="opening-detail">
                            <div class="col s12 m12 l6">
                                <h6 class="white-text">Akad Nikah</h6>
                                <p class="white-text">{{ \Carbon\Carbon::parse($event->tanggal_ijab)->dayName}}, {{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('d M Y')}}</p>
                                <p class="white-text">{{ \Carbon\Carbon::parse($event->jam_mulai_ijab)->format('H:i')}} WIB</p>
                                <p class="white-text">{{$event->lokasi_ijab}}</p>
                            </div>
                            <div class="col s12 m12 l6">
                                <h6 class="white-text">Resepsi Pernikahan</h6>
                                <p class="white-text">{{ \Carbon\Carbon::parse($event->tanggal_resepsi)->dayName}}, {{ \Carbon\Carbon::parse($event->tanggal_resepsi)->format('d M Y')}}</p>
                                <p class="white-text">{{ \Carbon\Carbon::parse($event->jam_mulai_resepsi)->format('H:i')}} WIB</p>
                                <p class="white-text">{{$event->lokasi_resepsi}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @if($event->gm_ijab != null)
                <div class="row">
                    <div class="col s12 m12">
                        <div class="opening-detail" id="btn-lokasi">
                            <a href="{!!$event->gm_ijab!!}" class="btn-transparent">Lihat Lokasi</a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    </div>

    <div class="section white valign-wrapper" id="section-countdown">
        <div class="row valign">
            <div class="col s12 m12 l12">
                <div class="row">
                    <div class="col s12 m12 l8" id="countdown-container">
                        <div class="countdown">
                            <div class="row">
                                <div class="col s12">
                                    <ul>
                                        <li class="choco-light-text"><span class="choco-light-text" id="days"></span>days</li>
                                        <li class="choco-light-text"><span class="choco-light-text" id="hours"></span>Hours</li>
                                        <li class="choco-light-text"><span class="choco-light-text" id="minutes"></span>Minutes</li>
                                        <li class="choco-light-text"><span class="choco-light-text" id="seconds"></span>Seconds</li>
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
    <div class="section choco-light-bg" id="slider-gallery">
        <!-- <div class="slider fullscreen">
            <ul class="slides col s12 m6 l4 fade-in-out">
                @foreach($photo_event as $gallery)
                <li>
                    <img src="{{asset($gallery['path'])}}">
                </li>
                @endforeach
            </ul>
        </div> -->
        @foreach($photo_event as $gallery)
        <div class="col-12 col-md-6 col-lg-6">
            <div class="picture">
                <div class="thumb">
                    <img src="{{asset($gallery['path'])}}">
                </div>
                <!-- <div class="overlay">
                                        <div class="caption">
                                            <h4 class="text-uppercase bold italic">{{ \Carbon\Carbon::parse($gallery['date'])->format('M, d Y')}}</h4>
                                            <p class="bold italic">{{$gallery['name']}}</p>
                                        </div>
                                    </div> -->
            </div>
        </div>
        @endforeach
    </div>
    @endif


    <div class="section choco-light-bg valign-wrapper">
        <div class="background">
            <img src="{{asset('admin-bsb/images/tile-bg-2.png')}}">
        </div>
        <div class="row valign">
            <div class="col s12 m12 l12">
                <div class="row">
                    <div class="col s12 m12 l8" id="attend-container">
                        <div class="opening">
                            <h2 class="choco-light-text">Are you attending?</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l10" id="attend-input-container">
                        <div class="attend">
                            <div class="row">
                                <form action="{{route('attending',[ 'id' => $event->id])}}" method="post">
                                    @csrf
                                    <div class="col s12 m12 l4">
                                        <label for="name" class="choco-light-text">Your Name</label>
                                        <input type="text" name="name" class="input-choco" placeholder="Your name" required>
                                    </div>
                                    <div class="col s12 m12 l4">
                                        <label for="email" class="choco-light-text">Your Email Address</label>
                                        <input type="email" name="email" class="input-choco" placeholder="Your email address" required>
                                    </div>
                                    <div class="col s12 m12 l4">
                                        <button type="submit" class="btn btn-choco-light-2 waves-effect">I am Attending</button>
                                    </div>
                                </form>
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
                    <div class="col s12 m12 l8" id="protokol-container">
                        <div class="protokol">
                            <h2 class="choco-light-text">Aturan Protokol Kesehatan</h2>
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
                                        <p class="choco-light-text">Menggunakan Masker</p>
                                    </div>
                                    <div class="col s12 m12 l4">
                                        <img src="{{asset('admin-bsb/images/protokol-2.png')}}" alt="protokol2">
                                        <p class="choco-light-text">Mencuci Tangan Dengan Sabun</p>
                                    </div>
                                    <div class="col s12 m12 l4">
                                        <img src="{{asset('admin-bsb/images/protokol-3.png')}}" alt="protokol3">
                                        <p class="choco-light-text">Tidak Berjabat Tangan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section choco-light-bg valign-wrapper">
        <div class="row valign">
            <div class="col s12 m12 l12">
                <div class="row">
                    <div class="col s12 m12 l12 center-align">
                        <h2 class="white-text panduan-title">Panduan Penggunaan Aplikasi</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l3 center" style="padding-right:0; margin-top:50px;">
                        <img src="{{asset('admin-bsb/images/step-1.png')}}" alt="" srcset="">
                    </div>
                    <div class="col s12 m12 l3" style="padding-left:0;">
                        <h4 class="white-text panduan">Download aplikasi Hoofey di Google Playstore</h4>
                    </div>
                    <div class="col s12 m12 l3 center" style="padding-right:0; margin-top:50px;">
                        <img src="{{asset('admin-bsb/images/step-2.png')}}" alt="" srcset="">
                    </div>
                    <div class="col s12 m12 l3" style="padding-left:0;">
                        <h4 class="white-text panduan">Login menggunakan email yang sudah didaftarkan</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section choco-light-bg valign-wrapper">
        <div class="row valign">
            <div class="col s12 m12 l12">
                <div class="row">
                    <div class="col s12 m12 l3 center" style="padding-right:0; margin-top:50px;">
                        <img src="{{asset('admin-bsb/images/step-3.png')}}" alt="" srcset="">
                    </div>
                    <div class="col s12 m12 l3" style="padding-left:0;">
                        <h4 class="white-text panduan">Pilih menu invitation dan pilih undangan</h4>
                    </div>
                    <div class="col s12 m12 l3 center" style="padding-right:0; margin-top:50px;">
                        <img src="{{asset('admin-bsb/images/step-4.png')}}" alt="" srcset="">
                    </div>
                    <div class="col s12 m12 l3" style="padding-left:0;">
                        <h4 class="white-text panduan">Lihat detail undangan mulai dari nama sampai lokasi pernikahan</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section choco-light-bg valign-wrapper">
        <div class="row valign">
            <div class="col s12 m12 l12">
                <div class="row">
                    <div class="col s12 m12 l3 center" style="padding-right:0; margin-top:50px;">
                        <img src="{{asset('admin-bsb/images/step-5.png')}}" alt="" srcset="">
                    </div>
                    <div class="col s12 m12 l3" style="padding-left:0;">
                        <h4 class="white-text panduan">Pilih menu SCAN QR di pojok kanan atas</h4>
                    </div>
                    <div class="col s12 m12 l3 center" style="padding-right:0; margin-top:50px;">
                        <img src="{{asset('admin-bsb/images/step-6.png')}}" alt="" srcset="">
                    </div>
                    <div class="col s12 m12 l3" style="padding-left:0;">
                        <h4 class="white-text panduan">Scan QR Code yang telah tersedia di lokasi resepsi</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section choco-light-bg valign-wrapper">
        <div class="row valign">
            <div class="col s12 m12 l12">
                <div class="row">
                    <div class="col s12 m12 l3 center" style="padding-right:0; margin-top:50px;">
                        <img src="{{asset('admin-bsb/images/step-7.png')}}" alt="" srcset="">
                    </div>
                    <div class="col s12 m12 l3" style="padding-left:0;">
                        <h4 class="white-text panduan">Setelah Scan QR kamu bisa langsung memberikan ucapan</h4>
                    </div>
                    <div class="col s12 m12 l3 center" style="padding-right:0; margin-top:50px;">
                        <img src="{{asset('admin-bsb/images/step-8.png')}}" alt="" srcset="">
                    </div>
                    <div class="col s12 m12 l3" style="padding-left:0;">
                        <h4 class="white-text panduan">Pilih tombol kamera untuk selfie</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section choco-light-bg valign-wrapper">
        <div class="row valign">
            <div class="col s12 m12 l12">
                <div class="row">
                    <div class="col s12 m12 l3 center" style="padding-right:0; margin-top:50px;">
                        <img src="{{asset('admin-bsb/images/step-9.png')}}" alt="" srcset="">
                    </div>
                    <div class="col s12 m12 l3" style="padding-left:0;">
                        <h4 class="white-text panduan">Pilih template selfie kesukaanmu dan foto</h4>
                    </div>
                    <div class="col s12 m12 l3 center" style="padding-right:0; margin-top:50px;">
                        <img src="{{asset('admin-bsb/images/step-10.png')}}" alt="" srcset="">
                    </div>
                    <div class="col s12 m12 l3" style="padding-left:0;">
                        <h4 class="white-text panduan">Kamu juga bisa share dan simpan foto</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section choco-light-bg valign-wrapper" style="padding:0;">
        <div class="row valign">
            <div class="col s12 m12 l12" id="download-container">
                <div class="row">
                    <div class="col s12 m12 l8">
                        <div class="download">
                            <h2 class="white-text">Download Aplikasi</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l8">
                        <div class="download">
                            <div class="row">
                                <div class="col s12">
                                    <a href="https://play.google.com/store/apps/details?id=com.aksesdigital.hoofey"><img src="{{asset('admin-bsb/images/image-download.png')}}" alt=""></a>
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
                                    <h3 class="white-text">Terima Kasih</h3>
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
                <p class="black-text center-align">Made by</p>
                <p class="center-align"><a href="https://hoofey.id"><img src="{{asset('admin-bsb/images/logo.png')}}" alt="hoofeylogo" width="5%" /></a></p>
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
    <script type="text/javascript" src="{{asset('template-1/js/levidio.js')}}"></script>

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