<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Undangan Website Pernikahan">
    <meta property="og:title" content="WEDDING OF {{ $event->nama_panggilan_mempelai_wanita }} & {{ $event->nama_panggilan_mempelai_pria }}" />
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

    <link rel="stylesheet" href="{{ asset('template-6/plugin/selectize/dist/css/selectize.default.css') }}">
    <link rel="stylesheet" href="{{ asset('template-6/plugin/flexbin/flexbin.css') }}" media="all">
    <link rel="stylesheet" href="{{ asset('template-6/plugin/aos/dist/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('template-6/plugin/lightgallery/dist/css/lightgallery.css') }}">

    <link rel="stylesheet" href="{{ asset('template-6/css/universal.css') }}">
    <link rel="stylesheet" href="{{ asset('template-6/css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('template-6/css/custom-v1.css') }}">
    <link rel="stylesheet" href="{{ asset('template-1/css/bootstrap.min.css') }}">


    <link rel="stylesheet" href="{{ asset('template-6/plugin/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('template-6/plugin/modal-video/css/modal-video.min.css') }}">

</head>

<body class="nanda-special">

<div id="snowflakeContainer">
        <span class="snowflake"></span>
    </div>

    <!-- Top Cover -->
    <section class="top-cover">

        <div class="inner">
            <div class="details">
                <div class="text-02" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="500">
                    Undangan Pernikahan
                </div>
                <div>
                    <div class="text-01" data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="700">
                        {{ $event->nama_panggilan_mempelai_wanita }} & {{ $event->nama_panggilan_mempelai_pria }}
                    </div>
                </div>
                @if(app('request')->input('invite'))
                <div class="text-03" data-aos="fade-up" data-aos-duration="700" data-aos-delay="700">
                    Turut mengundang Bapak/Ibu/Saudara/i
                </div>
                <div class="text-04" data-aos="fade-up" data-aos-duration="700" data-aos-delay="700">
                    <b>{{ app('request')->input('invite')}}</b>
                </div>
                @else
                <div class="text-03" data-aos="fade-up" data-aos-duration="700" data-aos-delay="700">
                    Sesuai dengan Instruksi Menteri Dalam Negeri Nomor 39 Tahun 2021 khusunya terkait dengan pembatasan kapasitas pada resepsi pernikahan, maka tanpa mengurangi rasa hormat dengan ini kami memberitahukan bahwa acara hanya dihadiri oleh keluarga dan kerabat terdekat.
                </div>
                <div class="text-04" data-aos="fade-up" data-aos-duration="700" data-aos-delay="700">
                    Namun kami berharap agar sedianya Bapak/Ibu/Saudara/i berkenan memberikan restu dan doa baik kepada kami.
                </div>
                @endif
               
                <div>
                    <div data-aos="fade-up" data-aos-duration="1200" data-aos-delay="900">
                        <a href="javascript:;" onclick="startTheJourney()" class="link-01">Buka Undangan</a>
                    </div>
                </div> 
            </div>
        </div>

        <div class="cover-show" id="cover-banner" data-aos="zoom-out" data-aos-duration="1200" data-aos-delay="100">
            <div class="picture-outer">
                @foreach ($photo_event as $gallery)
                <img class="picture" src="{{ asset($gallery['path']) }}" alt="">
                @endforeach
            </div>
        </div>

        <section class="effects nanda" data-aos="zoom-out" data-aos-duration="2000" data-aos-delay="500">
            <div><img src="{{ asset('template-6/images/template/effects/nanda/blink-1.png') }}" alt=""></div>
            <div><img src="{{ asset('template-6/images/template/effects/nanda/blink-2.png') }}" alt=""></div>
            <div><img src="{{ asset('template-6/images/template/effects/nanda/blink-3.png') }}" alt=""></div>
            <div><img src="{{ asset('template-6/images/template/effects/nanda/blink-4.png') }}" alt=""></div>
            <div><img src="{{ asset('template-6/images/template/effects/nanda/blink-5.png') }}" alt=""></div>
            <div><img src="{{ asset('template-6/images/template/effects/nanda/blink-1.png') }}" alt=""></div>
            <div><img src="{{ asset('template-6/images/template/effects/nanda/blink-2.png') }}" alt=""></div>
            <div><img src="{{ asset('template-6/images/template/effects/nanda/blink-3.png') }}" alt=""></div>
            <div><img src="{{ asset('template-6/images/template/effects/nanda/blink-4.png') }}" alt=""></div>
            <div><img src="{{ asset('template-6/images/template/effects/nanda/blink-5.png') }}" alt=""></div>
        </section>

    </section>

    <!-- COVER -->
    <section class="cover" id="start" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="0">
        <div class="cover-inner">
            <div class="cover-greet">
                <div class="orn orn-01" data-aos="fade-down" data-aos-duration="1000"></div>
                <p class="text-01" data-aos="fade-up" data-aos-duration="1000">The Wedding Of</p>
            </div>
            <div class="cover-bridegroom">
                <h1 class="title-01" data-aos="zoom-in-up" data-aos-duration="1000">
                    {{ $event->nama_panggilan_mempelai_wanita }} & {{ $event->nama_panggilan_mempelai_pria }}
                </h1>
                <p class="text-02" data-aos="fade-up-right" data-aos-duration="1000">
                    {{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM Y') }}
                </p>
            </div>
        </div>

    </section>
    
    <!-- GREETINGS -->
    @if(app('request')->input('invite'))
    <section class="greetings">
        <div class="orn orn-02" data-aos="zoom-in-up" data-aos-duration="1000"></div>
        <div>
            <h1 class="title-01" data-aos="fade-up" data-aos-duration="1000">Hi, {{ app('request')->input('invite')}}</h1>
            <p class="text-01" data-aos="fade-down" data-aos-duration="1000">You're invited to our wedding ceremony</p>
        </div>
    </section>
    @endif

    <!-- BRIDEGROOM -->
    <section class="bridegroom">
        <div class="bridegroom-inner">
            <div class="head">
                <p class="text-01" data-aos="fade-down" data-aos-duration="1000">
                بِسْمِ ٱللَّهِ ٱلرَّحْمَـٰنِ
                ٱلرَّحِيمِ
                </p>
            </div>
            <div class="body">
                <div class="groom">
                    @if ($event->avatar_wanita != null)
                    <div class="bridegroom-border" data-aos="zoom-in" data-aos-duration="1000" data-aos-once="false">
                        <img src="{{ asset('admin/assets/images/wanita/'. $event->order->invoice.'/' . $event->avatar_wanita) }}" alt="" class="bridegroom-picture" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000" data-aos-once="false">
                    </div>
                    @endif
                    <div class="bridegroom-details">
                        <h1 class="title-01" data-aos="fade-down" data-aos-duration="1000">
                            {{ $event->nama_lengkap_mempelai_wanita }}
                        </h1>
                        <p class="text-01" data-aos="fade-up" data-aos-duration="1000">
                            {{ $event->bio_mempelai_wanita }}
                        </p>
                    </div>
                </div>
                <div class="bridegroom-separator" data-aos="zoom-out" data-aos-duration="1000">&amp;</div>
                <div class="bride">
                    @if ($event->avatar_pria != null)
                    <div class="bridegroom-border" data-aos="zoom-in" data-aos-duration="1000" data-aos-once="false">
                        <img src="{{ asset('admin/assets/images/pria/'. $event->order->invoice.'/' . $event->avatar_pria) }}" alt="" class="bridegroom-picture" data-aos="fade-left" data-aos-delay="300" data-aos-duration="1000" data-aos-once="false">
                    </div>
                    @endif
                    <div class="bridegroom-details">
                        <h1 class="title-01" data-aos="fade-down" data-aos-duration="1000">
                            {{ $event->nama_lengkap_mempelai_pria }}
                        </h1>
                        <p class="text-01" data-aos="fade-up" data-aos-duration="1000">
                            {{ $event->bio_mempelai_pria }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SAVE THE DATE -->
    <section class="save-date">
        <div class="inner">
            <div class="head">
                <h1 class="title-01" data-aos="fade-down" data-aos-duration="1000">Save The Date</h1>
                <p class="text-01" data-aos="fade-up" data-aos-duration="1000">
                    {{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM Y') }}
                </p>
            </div>
            <div class="body">
                <div class="schedule">
                    <div class="countdown">
                        <div class="countdown-time" data-aos="flip-left" data-aos-duration="1000">
                            <h1 id="days">0</h1>
                            <small data-aos="fade-up" data-aos-duration="1000">Days</small>
                        </div>
                        <div class="countdown-time" data-aos="flip-right" data-aos-duration="1000">
                            <h1 id="hours">0</h1>
                            <small data-aos="fade-up" data-aos-duration="1000">Hours</small>
                        </div>
                        <div class="countdown-time" data-aos="flip-right" data-aos-duration="1000">
                            <h1 id="minutes">0</h1>
                            <small data-aos="fade-up" data-aos-duration="1000">Minutes</small>
                        </div>
                        <div class="countdown-time" data-aos="flip-left" data-aos-duration="1000">
                            <h1 id="seconds">0</h1>
                            <small data-aos="fade-up" data-aos-duration="1000">Seconds</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="foot" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                <a href="http://www.google.com/calendar/render?action=TEMPLATE&amp;text={{ $event->nama_panggilan_mempelai_wanita }}+%26+{{ $event->nama_panggilan_mempelai_pria }}+Wedding&amp;dates={{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('Y m d') }}T{{ \Carbon\Carbon::parse($event->jam_mulai_ijab)->format('H:i') }}&amp;location={{ $event->lokasi_ijab }}&amp;details=Hai+You%27re+invited+to+our+wedding+ceremony+%7C+{{ $event->nama_panggilan_mempelai_wanita }}+%26+{{ $event->nama_panggilan_mempelai_pria }}+Wedding+%7C+{{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('dddd') }}%2C+{{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM Y') }}" target="_blank" ref="nofollow" class="link-01">Add to
                    Calendar</a>
            </div>
        </div>
    </section>

    <!-- Gallery Wrapper -->
    <div class="gallery-wrapper">

        <!-- GALLERY -->
        @if ($photo_event != null)
        <section class="gallery">
            <div class="title">
                <h1 data-aos="zoom-out-up" data-aos-duration="1000">Picts of us</h1>
                <p data-aos="fade-up" data-aos-duration="1000">A successful marriage requires falling in love many
                    times, always with the same person</p>
            </div>
            <div class="flexbin" id="lightGallery">
                @foreach ($photo_event as $gallery)
                <a href="{{ asset($gallery['path']) }}" target="_blank" data-aos="zoom-in" data-aos-duration="1000">
                    <img src="{{ asset($gallery['path']) }}" alt="">
                </a>
                @endforeach
            </div>
        </section>
        @endif

        <!-- VIDEO GALLERY -->
        @if ($event->link_youtube != null)
        <section class="video-gallery">
            <div class="inner">
                <div class="video-outer">
                    <div class="video">
                        <div class="title">
                            <h2 data-aos="fade-up" data-aos-duration="1000">Clip of Us</h2>
                        </div>
                        <div class="preview" data-aos="zoom-in" data-aos-duration="1000">
                            <div class="div" style="display: none">
                                {!! $event->link_youtube !!}
                            </div>
                            <img src="" alt="">
                            <button class="play-btn" data-video-id=""><i class="fas fa-play"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif

    </div>

    <!-- EVENT -->
    <section class="event-outer">
        <div class="event-inner">
            <div class="orn orn-06" data-aos="zoom-in" data-aos-duration="1000"></div>
            <div class="head">
                <div class="title">
                    <h1 data-aos="fade-down" data-aos-duration="1000">Wedding Day</h1>
                    <p data-aos="fade-up" data-aos-duration="1000">Save The Date</p>
                </div>
            </div>
            <div class="body">
                <div class="event">
                    <div class="title" data-aos="zoom-in" data-aos-duration="1000">
                        <h1 data-aos="fade-right" data-aos-duration="1000" data-aos-delay="300">
                            {{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('dddd') }}
                        </h1>
                        <p data-aos="fade-left" data-aos-duration="1000" data-aos-delay="300">
                            {{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM Y') }}
                        </p>
                    </div>
                    <div class="activities">
                        <div class="activity">
                            <div class="title">
                                <img class="orn orn-party" src="{{ asset('template-6/images/template/icons/gold/01.png') }}" alt="" data-aos="zoom-in" data-aos-duration="1000">
                                <h1 data-aos="fade-right" data-aos-duration="1000">Akad Nikah</h1>

                                <p class="time" data-aos="zoom-in-up" data-aos-duration="1000">
                                    {{ \Carbon\Carbon::parse($event->jam_mulai_ijab)->format('H:i') }} -
                                    {{ \Carbon\Carbon::parse($event->jam_selesai_ijab)->format('H:i') }}
                                </p>
                            </div>
                            @if ($event->lokasi_ijab != null && $event->lokasi_ijab != $event->lokasi_resepsi)
                            <div class="address" data-aos="zoom-in-up" data-aos-duration="1000">
                                {{ $event->lokasi_ijab }}
                            </div>
                            @endif
                        </div>
                        @if(app('request')->input('invite'))
                        <div class="activity">
                            <div class="title">
                                <img class="orn orn-party" src="{{ asset('template-6/images/template/icons/gold/02.png') }}" alt="" data-aos="zoom-in" data-aos-duration="1000">
                                <h1 data-aos="fade-right" data-aos-duration="1000">Resepsi</h1>

                                <p class="time" data-aos="zoom-in-up" data-aos-duration="1000">
                                    {{ \Carbon\Carbon::parse($event->jam_mulai_resepsi)->format('H:i') }} -
                                    {{ \Carbon\Carbon::parse($event->jam_selesai_resepsi)->format('H:i') }}
                                </p>
                            </div>

                            @if ($event->lokasi_resepsi != null && $event->lokasi_resepsi != $event->lokasi_ijab)
                            <div class="address" data-aos="zoom-in-up" data-aos-duration="1000">
                                {{ $event->lokasi_resepsi }}
                            </div>
                            @endif
                        </div>
                        @endif
                    </div>
                    <div class="details">
                        @if ($event->lokasi_resepsi == $event->lokasi_ijab)
                        <div class="address" data-aos="zoom-in-up" data-aos-duration="1000">
                            <div class="address" data-aos="zoom-in-up" data-aos-duration="1000">
                                <p><strong>{{ $event->lokasi_resepsi }}</strong></p>
                            </div>
                        </div>
                        @endif
                        @if ($event->gm_ijab != null)
                        <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                            {!! $event->gm_ijab !!}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="orn orn-07" data-aos="zoom-in" data-aos-duration="1000"></div>
        </div>
    </section>


    @if (isset($event->link_livestreaming))
        <section class="live-streaming">
            <div class="inner">
                <div class="title">
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

    @if (app('request')->input('invite'))
        <!-- RESERVATION -->
        <section class="rsvp" id="rsvp">
                <!-- INNER -->
                <div class="rsvp-inner come">
                    <div class="rsvp-confirm">
                        <div class="head">
                            <h1 data-aos="zoom-in-up" data-aos-duration="1000" class="aos-init aos-animate">RSVP</h1>
                        </div>
                        <form action="{{ route('attending', ['id' => $event->id]) }}" autocomplete="off"
                            method="POST" class="comment-form">
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

    <!-- COMMENT -->
    <section class="comment-outer">
        <div class="comment-inner">
            <div class="head">
                <h1>Wedding Wish</h1>
                <p>Thanks for all the wedding wishes! You made a great day even greater!</p>
            </div>
            <form action="{{ route('wishes', ['id' => $event->id]) }}" autocomplete="off" method="POST" class="comment-form">
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

    <!-- WRAPPER -->
    <div class="quote-wrapper">

        <!-- QUOTE -->
        <section class="quote">
            <div class="inner">
                <p class="text-01" data-aos="fade-up" data-aos-duration="1000">"Every great love starts with a
                    great
                    story, <br> we've decided on forever"</p>
            </div>
        </section>


        <!-- FOOTNOTE -->
        <section class="footnote">
            <div class="inner">
                <p data-aos="fade-up" data-aos-duration="1000">
                    {{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM Y') }}
                </p>
                <h1 data-aos="zoom-in" data-aos-duration="1000">{{ $event->nama_panggilan_mempelai_wanita }} &
                    {{ $event->nama_panggilan_mempelai_pria }}
                </h1>
            </div>
        </section>

    </div>

    <!-- Panduan Penggunaan APlikasi -->
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
                                <img src="{{ asset('admin-bsb/images/step-6.png') }}" alt="protokol2" class="img6"><br>
                                <p><b>Scan QR Code yang telah tersedia di lokasi resepsi</b></p>
                            </div>
                        </div>
                        <div class="row text-center" style="margin: 45px 0;">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <img src="{{ asset('admin-bsb/images/step-7.png') }}" alt="protokol1"><br>
                                <p><b>Setelah Scan QR kamu bisa langsung memberikan ucapan</b></p>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <img src="{{ asset('admin-bsb/images/step-8.png') }}" alt="protokol2" class="img8"><br>
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
                                        <a href="https://play.google.com/store/apps/details?id=com.aksesdigital.hoofey" target="_blank"><img src="{{ asset('admin-bsb/images/image-download.png') }}" alt=""></a>
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
    <!-- Panduan Penggunaan APlikasi -->

    <!-- FOOTER -->
    <section class="footer">
        <div class="footer-inner">
            <p>Made with by</p>
            <img src="{{ asset('admin-bsb/images/logo.png') }}" alt="">
        </div>
    </section>

    <!-- MUSIC -->
    @if($event->audio_id != null)
    <section class="music-outer" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
        <div class="music-box" id="music-box"></div>
    </section>
    @endif

    <!-- ALERT -->
    <!-- <div class="alert" id="alert">
        <div class="alert-text"></div>
        <div class="alert-close fas fa-times"></div>
    </div> -->

    <!-- MODAL -->
    <div id="modal" class="modal modal-center"></div>

    <!-- SCRIPT -->
    <script src="{{ asset('template-6/js/jquery.js') }}"></script>
    <script src="{{ asset('template-6/plugin/aos/dist/aos.js') }}"></script>
    <script src="{{ asset('template-6/plugin/selectize/dist/js/standalone/selectize.min.js') }}"></script>
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
