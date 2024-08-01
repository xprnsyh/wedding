<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Undangan Website Pernikahan">
    <meta property="og:title"
        content="WEDDING OF {{ $event->nama_panggilan_mempelai_wanita }} & {{ $event->nama_panggilan_mempelai_pria }}" />
    <meta property="og:url" content="{{ route('see.event', ['slug' => $event->slug]) }}" />
    @if ($photo_event != null)
        <meta property="og:image" content="{{ asset($photo_event[0]['path']) }}">
        <meta property="og:image:size" content="300" />
    @endif
    <meta property="og:description" content="{{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('d M Y') }}">

    <meta property="og:image:type" content="image/jpeg" />

    <title>Hoofey - Wedding of {{ $event->nama_panggilan_mempelai_wanita }} &
        {{ $event->nama_panggilan_mempelai_pria }}
    </title>

    <link rel="icon" type="image/png" href="http://wedding.test/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="http://wedding.test/favicon-16x16.png" sizes="16x16" />

    <link
        href="https://fonts.googleapis.com/css2?family=Abhaya+Libre:wght@400;500;600;700;800&family=Bad+Script&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('template-6/css/universal.css') }}">
    <link rel="stylesheet" href="{{ asset('template-6/css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('template-6/css/biasa-02.css') }}">
    <link rel="stylesheet" href="{{ asset('template-1/css/bootstrap.min.css') }}">


    <link rel="stylesheet" href="{{ asset('template-6/plugin/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('template-6/plugin/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('template-6/plugin/modal-video/css/modal-video.min.css') }}">

    <link rel="stylesheet" href="{{ asset('template-6/plugin/selectize/dist/css/selectize.default.css') }}">
    <link rel="stylesheet" href="{{ asset('template-6/plugin/flexbin/flexbin.css') }}" media="all">
    <link rel="stylesheet" href="{{ asset('template-6/plugin/aos/dist/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('template-6/plugin/lightgallery/dist/css/lightgallery.css') }}">

</head>


<body class="alunan ruby">

<div id="snowflakeContainer">
        <span class="snowflake"></span>
    </div>

    <!-- Top Cover -->
    <section class="top-cover">

        <div class="inner">
            <div class="details">
                <div>
                    <div class="text-02" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="900">
                        Undangan Pernikahan
                    </div>
                    <div class="text-01" data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="1000">
                        {{ $event->nama_panggilan_mempelai_wanita }} & {{ $event->nama_panggilan_mempelai_pria }}
                    </div>
                    @if (app('request')->input('invite'))
                        <div class="text-03" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="1100">
                            Turut mengundang Bapak/Ibu/Saudara/i
                        </div>
                        <div class="text-04" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="1200">
                            <b>{{ app('request')->input('invite') }}</b>
                        </div>
                    @else
                        <div class="text-03" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="1100">
                            Sesuai dengan Instruksi Menteri Dalam Negeri Nomor 39 Tahun 2021 khusunya terkait dengan
                            pembatasan kapasitas pada resepsi pernikahan, maka tanpa mengurangi rasa hormat dengan ini
                            kami memberitahukan bahwa acara hanya dihadiri oleh keluarga dan kerabat terdekat.
                        </div>
                        <div class="text-04" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="1200">
                            Namun kami berharap agar sedianya Bapak/Ibu/Saudara/i berkenan memberikan restu dan doa baik
                            kepada kami.
                        </div>
                    @endif
                </div>
                <div>
                    <a href="javascript:;" onclick="startTheJourney()" class="link-01">Buka Undangan</a>
                </div>
            </div>
            <div class="orn orn-01" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="100"></div>
            <div class="orn orn-02" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="300"></div>
            <div class="orn orn-03" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="500"></div>
        </div>

    </section>

    <!-- COVER -->
    <section class="cover">

        <div class="cover-inner">
            <div class="cover-greet">
                <div class="text-01" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="700">Wedding
                    Invitation</div>
            </div>

            <div class="cover-picture">
                <div class="cover-show">
                    <div class="picture-outer no-picture">
                        <div class="picture" data-aos="zoom-in-down" data-aos-duration="1200"></div>
                    </div>
                </div>
            </div>

            <div class="cover-bridegroom">
                <div class="title-01" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
                    {{ $event->nama_panggilan_mempelai_wanita }} & {{ $event->nama_panggilan_mempelai_pria }}
                </div>
                <div class="text-01" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="700">
                    {{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM Y') }}
                </div>
            </div>

            <div class="orn orn-01" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="1100"></div>
            <div class="orn orn-02" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="1200"></div>
            <div class="orn orn-03" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="1100"></div>
            <div class="orn orn-04" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="1200"></div>
            <div class="orn orn-05" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="1100"></div>

        </div>

    </section>

    <!-- GREETINGS -->
    @if(app('request')->input('invite'))
    <section class="greetings">
        <div>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="0">Hi</p>
            <h1 data-aos="fade-up" data-aos-duration="1000">{{ app('request')->input('invite')}}</h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">you're invited to our wedding ceremony</p>
        </div>
    </section>
    @endif

    <!-- BRIDEGROOM -->
    <section class="bridegroom">
        <div class="bridegroom-inner">
            <div class="head">
                <h1 data-aos="zoom-in" data-aos-duration="1000">The Wedding of</h1>
                <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">Dengan memohon Rahmat dan Ridho
                    Allah
                    SWT,<br />
                    kami bermaksud untuk menyelenggarakan acara pernikahan putra - putri kami :</p>
            </div>
            <div class="body    show-profile ">
                <div class="groom">
                    @if ($event->avatar_wanita != null)
                        <div class="bridegroom-border" data-aos="zoom-in-down" data-aos-duration="2000"
                            data-aos-delay="400" data-aos-once="false">
                            <img class="bridegroom-picture" src="{{ asset('admin/assets/images/wanita/'. $event->order->invoice.'/' . $event->avatar_wanita) }}" alt="">
                        </div>
                    @endif
                    <div class="bridegroom-details">
                        <h1 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800">
                            {{ $event->nama_lengkap_mempelai_wanita }}
                        </h1>
                        <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="1000">
                            {{ $event->bio_mempelai_wanita }}
                        </p>
                        <p class="bio" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="1200"></p>
                    </div>
                </div>
                <div class="bridegroom-separator" data-aos="zoom-out" data-aos-duration="1000" data-aos-delay="800">
                    &amp;</div>
                <div class="bride">
                    @if ($event->avatar_pria != null)
                        <div class="bridegroom-border" data-aos="zoom-in-down" data-aos-duration="2000"
                            data-aos-delay="400" data-aos-once="false">
                            <img class="bridegroom-picture" src="{{ asset('admin/assets/images/pria/'. $event->order->invoice.'/' . $event->avatar_pria) }}" alt="">
                        </div>
                    @endif
                    <div class="bridegroom-details">
                        <h1 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800">
                            {{ $event->nama_lengkap_mempelai_pria }}
                        </h1>
                        <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="1000">
                            {{ $event->bio_mempelai_wanita }}
                        </p>
                        <p class="bio" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="1200"></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SAVE THE DATE -->
    <section class="save-date">
        <div class="save-date-inner">
            <div class="quote">
                <p>&quot;And one of His signs is that He has created for you,spouses from amongst yourselves so that you
                    might
                    take comfort in them and He has placed between you, love and mercy. In this there is surely evidence
                    (of the
                    truth) for the people who carefully think.<br />
                    <br />
                    (Ar-Rum: 21)&quot;
                </p>
            </div>
            <div class="schedule">
                <h1>SAVE THE DATE</h1>
                <div class="countdown">
                    <div>
                        <h1 id="days">0</h1>
                        <small>Hari</small>
                    </div>
                    <div>
                        <h1 id="hours">0</h1>
                        <small>Jam</small>
                    </div>
                    <div>
                        <h1 id="minutes">0</h1>
                        <small>Menit</small>
                    </div>
                    <div>
                        <h1 id="seconds">0</h1>
                        <small>Detik</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- EVENT -->
    <section class="event-outer">
        <div class="event-inner">

            <div class="body">

                <div class="event">
                    <div class="title">
                        <h1>{{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('dddd') }}, <br>
                            {{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM Y') }}
                        </h1>
                    </div>
                    <div class="activities">
                        <div class="activity">
                            <div class="title">
                                <img class="party-icon"
                                    src="{{ asset('template-6/images/template/icons/gray/01.png') }}"
                                    alt="Icon Party">
                                <h1>Akad Nikah</h1>

                                <p class="time">
                                    {{ \Carbon\Carbon::parse($event->jam_mulai_ijab)->format('H:i') }} -
                                    {{ \Carbon\Carbon::parse($event->jam_selesai_ijab)->format('H:i') }}
                                </p>
                                @if ($event->lokasi_resepsi != null && $event->lokasi_resepsi != $event->lokasi_ijab)
                                    <div class="address" data-aos="zoom-in-up" data-aos-duration="1000">
                                        <p>{{ $event->lokasi_resepsi }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        @if (app('request')->input('invite'))
                            <div class="activity">
                                <div class="title">
                                    <img class="party-icon"
                                        src="{{ asset('template-6/images/template/icons/gray/02.png') }}"
                                        alt="Icon Party">
                                    <h1>Resepsi</h1>
                                    <p class="time">
                                        {{ \Carbon\Carbon::parse($event->jam_mulai_resepsi)->format('H:i') }}
                                        -
                                        {{ \Carbon\Carbon::parse($event->jam_selesai_resepsi)->format('H:i') }}
                                    </p>
                                    @if ($event->lokasi_ijab != null && $event->lokasi_ijab != $event->lokasi_resepsi)
                                        <div class="address" data-aos="zoom-in-up" data-aos-duration="1000">
                                            <p>{{ $event->lokasi_ijab }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>

                    @if ($event->lokasi_resepsi == $event->lokasi_ijab)
                        <div class="details">
                            <div>
                                <p class="hall">{{ $event->lokasi_ijab }}</p>
                            </div>
                            @if ($event->gm_ijab != null)
                                <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                                    {!! $event->gm_ijab !!}
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <div class="wrapper-01">
        <!-- RESERVATION -->
        @if (app('request')->input('invite'))
            <section class="rsvp" id="rsvp">
                <!-- INNER -->
                <div class="rsvp-inner come">
                    <div class="rsvp-confirm">
                        <div class="head">
                            <h1 data-aos="zoom-in-up" data-aos-duration="1000" class="aos-init aos-animate">RSVP</h1>
                        </div>
                        <form action="{{ route('attending', ['id' => $event->id]) }}" autocomplete="off"
                            method="POST" class="comment-form" style="margin-top: 30px">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" value="" placeholder="Nama Anda"
                                    required>
                                <input type="email" name="email" class="form-control" value=""
                                    placeholder="Email Anda" required>
                            </div>
                            <button type="submit" class="change-confirmation aos-init aos-animate" data-aos="zoom-out"
                                data-aos-duration="1000" type="submit">Saya akan hadir</button>
                        </form>
                    </div>
                </div>
            </section>
        @endif
    </div>

    @if (isset($event->link_livestreaming))
        <section class="live-streaming">
            <div class="inner">
                <div class="head">
                    <h1>Live Streaming</h1>
                    <p>Please join and watch us become husband &amp; wife on</p>
                </div>
                <div class="body">
                    <div class="streaming-info">
                        <div class="link">
                            <a href="{{ $event->link_livestreaming }}" target="_blank">Zoom</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- COMMENT -->
    <section class="comment-outer">
        <div class="comment-inner">
            <div class="head">
                <h1>Wedding Wish</h1>
                <p>Thanks for all the wedding wishes! You made a great day even greater!</p>
            </div>
            <form action="{{ route('wishes', ['id' => $event->id]) }}" autocomplete="off" method="POST"
                class="comment-form">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" class="form-control" value="" placeholder="Nama Anda" required>
                    <input type="email" name="email" class="form-control" value="" placeholder="Email Anda" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="text" rows="1" placeholder="Write something..."
                        style="max-height: 350px;" data-aos="fade-down" data-aos-duration="1000"></textarea>
                </div>
                <button type="submit" data-aos="fade-up" data-aos-duration="1000" class="send-comment">Send</button>
            </form>

            <div class="comments">
                @foreach ($data_guestbook as $guestbook)
                    <div class="comment aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                        <div class="comment-head">
                            <p><strong>{{ $guestbook->user->name }}</strong></p>
                        </div>
                        <div class="comment-body">
                            <p>{{ $guestbook->text }}</p>
                        </div>
                        <div class="comment-foot">
                            <small>{{ \Carbon\Carbon::parse($guestbook->created_at)->diffForHumans() }}</small>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- FOOTNOTE -->
    <section class="footnote">
        <div class="footnote-inner">
            <h1>{{ $event->nama_panggilan_mempelai_wanita }} & {{ $event->nama_panggilan_mempelai_pria }}</h1>
            <p>{{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM Y') }}</p>
        </div>
    </section>

    {{-- Panduan Penggunaan APlikasi --}}
    <div class="wrapper-01">
        <!-- background -->
        <section class="rsvp">
            <!-- INNER -->
            <div class="container">
                <!-- Panduan -->
                <div class="row" style="padding-bottom: 75px;">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="title--lg text-center">
                            <h2 class="font--4 color--midnight">Panduan Penggunaan Aplikasi</h2>
                        </div>
                        <div class="row text-center" style="margin: 45px 0;">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <img src="{{ asset('admin-bsb/images/step-1.png') }}" alt="protokol1"><br>
                                <p><b>Download Aplikasi di Google Playstore</b></p>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <img src="{{ asset('admin-bsb/images/step-2.png') }}" alt="protokol2"><br>
                                <p><b>Login menggunakan email yang sudah didaftarkan</b></p>
                            </div>
                        </div>
                        <div class="row text-center" style="margin: 45px 0;">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <img src="{{ asset('admin-bsb/images/step-3.png') }}" alt="protokol1"><br>
                                <p><b>Pilih menu invitation dan pilih undangan</b></p>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <img src="{{ asset('admin-bsb/images/step-4.png') }}" alt="protokol2"><br>
                                <p><b>Lihat detail undangan mulai dari nama sampai lokasi pernikahan</b></p>
                            </div>
                        </div>
                        <div class="row text-center" style="margin: 45px 0;">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <img src="{{ asset('admin-bsb/images/step-5.png') }}" alt="protokol1"><br>
                                <p><b>Pilih menu SCAN QR di pojok kanan atas</b></p>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <img src="{{ asset('admin-bsb/images/step-6.png') }}" alt="protokol2"
                                    class="img6"><br>
                                <p><b>Scan QR Code yang telah tersedia di lokasi resepsi</b></p>
                            </div>
                        </div>
                        <div class="row text-center" style="margin: 45px 0;">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <img src="{{ asset('admin-bsb/images/step-7.png') }}" alt="protokol1"><br>
                                <p><b>Setelah Scan QR kamu bisa langsung memberikan ucapan</b></p>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <img src="{{ asset('admin-bsb/images/step-8.png') }}" alt="protokol2"
                                    class="img8"><br>
                                <p><b>Pilih tombol kamera untuk selfie</b></p>
                            </div>
                        </div>
                        <div class="row text-center" style="margin: 45px 0;">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <img src="{{ asset('admin-bsb/images/step-9.png') }}" alt="protokol1"><br>
                                <p><b>Pilih template selfie kesukaanmu dan foto</b></p>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <img src="{{ asset('admin-bsb/images/step-10.png') }}" alt="protokol2"><br>
                                <p><b>Kamu juga bisa share dan simpan foto</b></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="download">
                                <h2>Download Aplikasi</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="download">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a href="https://play.google.com/store/apps/details?id=com.aksesdigital.hoofey"
                                            target="_blank"><img
                                                src="{{ asset('admin-bsb/images/image-download.png') }}" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="download">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h3>Terima Kasih</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Panduan -->
            </div>
        </section>
    </div>
    {{-- Panduan Penggunaan APlikasi --}}

    <!-- FOOTER -->
    <section class="footer">
        <div class="footer-inner">
            <p>Made with by</p>
            <a href="/" target="_blank">
                <img src="{{ asset('admin-bsb/images/logo.png') }}" alt="">
            </a>
        </div>
    </section>

    <!-- MUSIC -->
        <section class="music-outer" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
            <div class="music-box" id="music-box">
            </div>
        </section>
    <!-- MODAL -->
    <div id="modal" class="modal modal-center"></div>

    <!-- SCRIPT -->
    <script src="{{ asset('template-6/js/jquery.js') }}"></script>
    <script src="{{ asset('template-6/plugin/selectize/dist/js/standalone/selectize.min.js') }}"></script>
    <script src="{{ asset('template-6/plugin/slick/slick.min.js') }}"></script>
    <script src="{{ asset('template-6/plugin/aos/dist/aos.js') }}"></script>
    <script src="{{ asset('template-6/plugin/modal-video/js/jquery-modal-video.min.js') }}"></script>
    <script src="{{ asset('template-6/plugin/lightgallery/dist/js/lightgallery.min.js') }}"></script>


    <script>
        @if($event->audio_id != null)
        window.BACKGROUND_MUSIC = "{{ asset('admin/assets/audio/' . $event->audio->path ?? '') }}";
        @endif

        const image = document.querySelector(".preview img");
        const button = document.querySelector("preview .play-btn");
        const yt_id = document.querySelector("iframe").src.match(/youtube\.com.*(\?v=|\/embed\/)(.{11})/).pop();

        if (yt_id.length == 11) {
            image.setAttribute("src", `//img.youtube.com/vi/${yt_id}/0.jpg`);
            button.setAttribute("data-video-id", yt_id);
        }
    </script>

    <script>
        (function() {
            const second = 1000,
                minute = second * 60,
                hour = minute * 60,
                day = hour * 24;

            let wedding =
                "{{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('M d Y') }} {{ \Carbon\Carbon::parse($event->jam_mulai_ijab)->format('H:i') }}",
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

    <script src="{{ asset('template-6/js/template.js') }}"></script>
</body>

</html>
