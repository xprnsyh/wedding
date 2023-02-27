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
    <meta property="og:description"
        content="{{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM Y') }}">

    <meta property="og:image:type" content="image/jpeg" />

    <title>Hoofey - Wedding of {{ $event->nama_panggilan_mempelai_wanita }} &
        {{ $event->nama_panggilan_mempelai_pria }}
    </title>

    <link rel="icon" type="image/png" href="http://wedding.test/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="http://wedding.test/favicon-16x16.png" sizes="16x16" />

    <link
        href="https://fonts.googleapis.com/css2?family=Crimson+Text:wght@400;600;700&family=Mr+De+Haviland&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('template-6/css/natural.css') }}">
    <link rel="stylesheet" href="{{ asset('template-1/css/bootstrap.min.css') }}">


    <link rel="stylesheet" href="{{ asset('template-6/plugin/selectize/dist/css/selectize.default.css') }}">
    <link rel="stylesheet" href="{{ asset('template-6/plugin/flexbin/flexbin.css') }}" media="all">
    <link rel="stylesheet" href="{{ asset('template-6/plugin/aos/dist/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('template-6/plugin/lightgallery/dist/css/lightgallery.css') }}">

    <link rel="stylesheet" href="{{ asset('template-6/plugin/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('template-6/plugin/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('template-6/plugin/modal-video/css/modal-video.min.css') }}">
    <script src="https://unpkg.com/feather-icons"></script>

</head>

<body class="natural">

    <div id="snowflakeContainer">
        <span class="snowflake"></span>
    </div>

    <section class="top-cover">

        <div class="inner">
            <div class="details">
                <div>
                    <div class="text-02" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="700">
                        The Wedding Of
                    </div>
                    <div class="text-01" data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="500">
                        {{ $event->nama_panggilan_mempelai_wanita }} & {{ $event->nama_panggilan_mempelai_pria }}
                    </div>
                    @if (app('request')->input('invite'))
                        <div class="text-03" data-aos="fade-up" data-aos-duration="700" data-aos-delay="700">
                            Turut mengundang Bapak/Ibu/Saudara/i
                        </div>
                        <div class="text-04" data-aos="fade-up" data-aos-duration="700" data-aos-delay="700">
                            <b>{{ app('request')->input('invite') }}</b>
                        </div>
                    @else
                        <div class="text-02" data-aos="fade-up" data-aos-duration="700" data-aos-delay="700"
                            style="margin-top: 15px;">
                        </div>
                        <div class="text-04" data-aos="fade-up" data-aos-duration="700" data-aos-delay="700">
                            Kami berharap agar sedianya Bapak/Ibu/Saudara/i berkenan memberikan restu dan doa baik
                            kepada kami.
                        </div>
                    @endif
                </div>
                <div>
                    <div data-aos="fade-up" data-aos-duration="1200" data-aos-delay="900">
                        @if (app('request')->input('invite'))
                            <a href="javascript:;" onclick="startTheJourney()" class="link-01">Buka Undangan</a>
                            <div class="text-03" data-aos="fade-up" data-aos-duration="700" data-aos-delay="700">
                                Mohon maaf apabila ada kesalahan penulisan nama & gelar
                            </div>
                        @else
                            <a href="javascript:;" onclick="startTheJourney()" class="link-01">Open</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="cover-show" id="cover-banner" data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="200">
        </div>
        <section class="effects chindy" data-aos="zoom-out" data-aos-duration="1250" data-aos-delay="500">
            <div><img src="{{ asset('template-6/images/template/effects/natural/orn-01.png') }}" alt="ornamen-01">
            </div>
            <div><img src="{{ asset('template-6/images/template/effects/natural/orn-02.png') }}" alt="ornamen-02">
            </div>
            <div><img src="{{ asset('template-6/images/template/effects/natural/orn-01.png') }}" alt="ornamen-01">
            </div>
            <div><img src="{{ asset('template-6/images/template/effects/natural/orn-02.png') }}" alt="ornamen-02">
            </div>
            <div><img src="{{ asset('template-6/images/template/effects/natural/orn-01.png') }}" alt="ornamen-01">
            </div>
            <div><img src="{{ asset('template-6/images/template/effects/natural/orn-01.png') }}" alt="ornamen-01">
            </div>
            <div><img src="{{ asset('template-6/images/template/effects/natural/orn-02.png') }}" alt="ornamen-02">
            </div>
            <div><img src="{{ asset('template-6/images/template/effects/natural/orn-01.png') }}" alt="ornamen-01">
            </div>
            <div><img src="{{ asset('template-6/images/template/effects/natural/orn-02.png') }}" alt="ornamen-02">
            </div>
            <div><img src="{{ asset('template-6/images/template/effects/natural/orn-01.png') }}" alt="ornamen-01">
            </div>
        </section>

    </section>

    <!-- Cover -->
    <section class="cover" id="start">
        <div class="inner">
            <div class="details">
                <div>
                </div>
                <div>
                    <div class="text-01" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="200">The
                        Wedding
                        of</div>
                    <div class="text-02" data-aos="zoom-in" data-aos-duration="1500">
                        {{ $event->nama_panggilan_mempelai_wanita }} & {{ $event->nama_panggilan_mempelai_pria }}
                    </div>
                    <div class="text-03" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        {{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM Y') }}
                    </div>
                </div>
            </div>

            <div class="orn orn-01" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="400"></div>
            <div class="orn orn-02" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300"></div>
            <div class="orn orn-03" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500"></div>
        </div>
    </section>

    @if (app('request')->input('invite'))
        <!-- Guest -->
        <section class="guest">
            <div class="inner">
                <div class="text-01" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="0">Hi</div>
                <div class="text-02" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    {{ app('request')->input('invite') }}</div>
                <div class="text-03" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">You're
                    invited to our wedding ceremony</div>
            </div>
        </section>
    @endif

    <!-- Couple -->
    <section class="couple">
        <div class="inner">
            <div class="head">
                <div class="text-01" data-aos="fade-up" data-aos-duration="1000">
                </div>
                <div class="text-02" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">بِسْمِ
                    ٱللَّهِ ٱلرَّحْمَـٰنِ ٱلرَّحِيمِ</div>
            </div>
            <div class="body  bride-first ">

                <div class="groom">
                    @if ($event->avatar_wanita != null)
                        <div class="picture">
                            <div class="picture-01" data-aos="zoom-in" data-aos-duration="1250" data-aos-delay="0"
                                data-aos-once="false">
                                <img src="{{ asset('admin/assets/images/wanita/' . $event->order->invoice . '/' . $event->avatar_wanita) }}"
                                    alt="" class="img-01">
                            </div>
                        </div>
                    @endif
                    <div class="details">
                        <div class="text-01" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                            {{ $event->nama_lengkap_mempelai_wanita }}
                        </div>
                        <div class="text-02" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                            {{ $event->bio_mempelai_wanita }}
                        </div>
                        <div class="text-03" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                        </div>

                    </div>
                </div>
                <div class="separator  picture " data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="400">&amp;
                </div>
                <div class="bride">
                    @if ($event->avatar_pria != null)
                        <div class="picture">
                            <div class="picture-01" data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="0"
                                data-aos-once="false">
                                <img src="{{ asset('admin/assets/images/pria/' . $event->order->invoice . '/' . $event->avatar_pria) }}"
                                    alt="" class="img-01">
                            </div>
                        </div>
                    @endif
                    <div class="details">
                        <div class="text-01" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                            {{ $event->nama_lengkap_mempelai_pria }}
                        </div>
                        <div class="text-02" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                            {{ $event->bio_mempelai_pria }}
                        </div>
                        <div class="text-03" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Save Date -->
    <section class="save">
        <div class="inner">
            <div class="head">
                <div class="text-01" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="0">Save The Date
                </div>
                <div class="text-02" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    {{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM Y') }}
                </div>
            </div>
            <div class="body">
                <div class="countdown">
                    <div class="countdown-group" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="400">
                        <div data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="500">
                            <div class="text-01" id="days">0</div>
                            <div class="text-02">Days</div>
                        </div>
                        <div data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="800">
                            <div class="text-01" id="hours">0</div>
                            <div class="text-02">Hours</div>
                        </div>
                    </div>
                    <div class="countdown-group" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="400">
                        <div data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="700">
                            <div class="text-01" id="minutes">0</div>
                            <div class="text-02">Minutes</div>
                        </div>
                        <div data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="900">
                            <div class="text-01" id="seconds">0</div>
                            <div class="text-02">Seconds</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="foot" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                <a href="http://www.google.com/calendar/render?action=TEMPLATE&amp;text={{ $event->nama_panggilan_mempelai_wanita }}+%26+{{ $event->nama_panggilan_mempelai_pria }}+Wedding&amp;dates={{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('Ymd') }}T{{ \Carbon\Carbon::parse($event->jam_mulai_ijab)->format('His') }}/{{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('Ymd') }}T{{ \Carbon\Carbon::parse($event->jam_selesai_ijab)->format('His') }}&amp;location={{ $event->lokasi_ijab }}&amp;details=Hai+You%27re+invited+to+our+wedding+ceremony+%7C+{{ $event->nama_panggilan_mempelai_wanita }}+%26+{{ $event->nama_panggilan_mempelai_pria }}+Wedding+%7C+{{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('dddd') }}%2C+{{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM Y') }}"
                    target="_blank" rel="nofollow" class="btn-01">Add to Calendar</a>
            </div>
            <div class="orn orn-04" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="500"></div>
        </div>
    </section>

    <!-- Gallery -->
    @if ($photo_event != null)
        <section class="gallery">
            <div class="title">
                <h1 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="0"></h1>
                <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200"></p>
            </div>
            <div class="flexbin" id="lightGallery">
                @foreach ($photo_event as $gallery)
                    <a href="{{ asset($gallery['path']) }}" target="_blank" data-aos="zoom-in"
                        data-aos-duration="1000">
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
                <div class="title">
                    <h1 data-aos="zoom-out-up" data-aos-duration="1000"></h1>
                    <p data-aos="fade-up" data-aos-duration="1000"></p>
                </div>
                <div class="video-outer">
                    <div class="video">
                        <div class="preview" data-aos="zoom-in" data-aos-duration="1000">
                            <div class="div" style="display: none">
                                {!! $event->link_youtube !!}
                            </div>
                            <img src="" alt="">
                            <button class="play-btn" data-video-id=""><i class="fas fa-play"></i></button>
                        </div>
                        <div class="title">
                            <h2 data-aos="fade-up" data-aos-duration="1000">We're Engaged !</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- EVENT -->
    <section class="event-outer">
        <!-- Inner -->
        <div class="event-inner">
            <!-- Head -->
            <div class="head">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Wedding Day</h1>
                <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">InsyaAllah akan dilaksanakan pada
                </p>
            </div>
            <!-- Body -->
            <div class="body">
                <!-- Event -->
                <div class="event">
                    <div class="title" data-aos="zoom-out-down" data-aos-duration="1000">
                        <div class="text-01">
                            <div class="day">
                                <div data-aos="fade-down" data-aos-duration="1000" data-aos-delay="100">
                                    {{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('dddd') }}
                                </div>
                                <div data-aos="fade-right" data-aos-duration="1000" data-aos-delay="300">
                                    {{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('MMMM Y') }}
                                </div>
                            </div>
                            <div class="date" data-aos="fade-left" data-aos-duration="1000"
                                data-aos-delay="300">
                                {{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D') }}</sup>
                            </div>
                        </div>
                    </div>
                    <div class="activities">
                        <div class="activity">
                            <div class="title">
                                <img class="orn orn-party"
                                    src="{{ asset('template-6/images/template/icons/gold/01.png') }}" alt=""
                                    data-aos="fade-down" data-aos-duration="1200">
                                <h1 data-aos="fade-up" data-aos-duration="1000">Akad Nikah</h1>
                                @if (app('request')->input('invite'))
                                    <p class="time" data-aos="fade-up" data-aos-duration="1000"
                                        data-aos-delay="200">
                                        {{ \Carbon\Carbon::parse($event->jam_mulai_ijab)->format('H:i') }} -
                                        {{ \Carbon\Carbon::parse($event->jam_selesai_ijab)->format('H:i') }} WIB
                                    </p>
                                    {{-- @if ($event->lokasi_resepsi != null && $event->lokasi_resepsi != $event->lokasi_ijab)
                                <div class="address" data-aos="zoom-in-up" data-aos-duration="1000">
                                    <p>{{ $event->lokasi_resepsi }}</p>
                                </div>
                                @endif --}}
                                @endif
                            </div>
                        </div>

                        <div class="separator picture aos-init aos-animate" data-aos="zoom-in" data-aos-duration="1000"
                            data-aos-delay="400">&amp;
                        </div>

                        <div class="activity">
                            <div class="title">
                                <img class="orn orn-party"
                                    src="{{ asset('template-6/images/template/icons/gold/02.png') }}" alt=""
                                    data-aos="fade-down" data-aos-duration="1200">
                                <h1 data-aos="fade-up" data-aos-duration="1000">Resepsi</h1>
                                @if (app('request')->input('invite'))
                                    <p class="time" data-aos="fade-up" data-aos-duration="1000"
                                        data-aos-delay="200">

                                        {{ \Carbon\Carbon::parse($event->jam_mulai_resepsi)->format('H:i') }} -
                                        {{ \Carbon\Carbon::parse($event->jam_selesai_resepsi)->format('H:i') }} WIB
                                    </p>
                                @endif
                                {{-- @if ($event->lokasi_ijab != null && $event->lokasi_ijab != $event->lokasi_resepsi)
                                <div class="address" data-aos="zoom-in-up" data-aos-duration="1000">
                                    <p>{{ $event->lokasi_ijab }}</p>
                                </div>
                                @endif --}}
                            </div>
                        </div>

                    </div>
                    <div class="details">
                        @if ($event->lokasi_resepsi == $event->lokasi_ijab)
                            <div>
                                <p class="hall" data-aos="fade-up" data-aos-duration="1000"
                                    data-aos-delay="300">
                                    @if (app('request')->input('invite'))
                                        {{ $event->lokasi_resepsi }}
                                    @else
                                        {{ $event->lokasi_ijab }}
                                    @endif
                                </p>
                            </div>
                        @else
                            <div>
                                <p class="hall" data-aos="fade-up" data-aos-duration="1000"
                                    data-aos-delay="300">
                                    @if (app('request')->input('invite'))
                                        {{ $event->lokasi_resepsi }}
                                    @else
                                        {{ $event->lokasi_ijab }}
                                    @endif
                                </p>
                            </div>
                        @endif
                        @if (app('request')->input('invite'))
                            @if ($event->gm_ijab != null)
                                <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                                    {!! $event->gm_ijab !!}
                                </div>
                            @endif
                        @endif
                    </div>
                </div>

            </div>
        </div>

        <div class="orn orn-05" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="300"></div>
        <div class="orn orn-06" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="300"></div>

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
                    <form action="{{ route('attending', ['id' => $event->id]) }}" autocomplete="off" method="POST"
                        class="comment-form">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" value="" placeholder="Nama Anda"
                                required>
                            <input type="email" name="email" class="form-control" value="" placeholder="Email Anda"
                                required>
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
        @if (count($event->angpao) > 0)
            <div class="comment-inner">
                <div class="head">
                    <h1 data-aos="fade-up" data-aos-duration="1000">Kado Pernikahan</h1>
                    <p data-aos="zoom-in-up" data-aos-duration="1000">Silahkan klik tombol dibawah ini apabila ingin
                        mengirimkan hadiah secara online untuk kami</p>
                </div>
                <div class="accordion mt-5" id="accordionExample">
                    <div class="card">
                        <div class="card-header bg-white" id="kado-digital">
                            <h5 class="mb-2">
                                <div class="button text-left collapsed text-weight-bold" data-toggle="collapse"
                                    data-target="#kadoDigital" aria-expanded="false" aria-controls="kadoDigital">
                                    <span class="svg-icon svg-icon-2">
                                        <i data-feather="dollar-sign"></i>
                                    </span> Kado Digital
                                </div>
                            </h5>
                        </div>
                        <div class="card-header bg-white" id="kirim-kado">
                            <h5 class="mb-2">
                                <div class="button text-left collapsed text-weight-bold" data-toggle="collapse"
                                    data-target="#kirimKado" aria-expanded="false" aria-controls="kirimKado">
                                    <span class="svg-icon svg-icon-2">
                                        <i data-feather="home"></i>
                                    </span> Kirim Kado
                                </div>
                            </h5>
                        </div>
                        <div id="kadoDigital" class="collapse" aria-labelledby="faq"
                            data-parent="#accordionExample">
                            <div class="card-body text-justify">
                                @forelse ($event->angpao as $angpao)
                                    <div class="col-lg-6 col-md-6">
                                        <span>{{ $angpao->nama_bank ?? '' }}</span> -
                                        <span>{{$angpao->no_rekening ?? ''}}</span>
                                        <p>an. {{ $angpao->nama_penerima ?? '' }}</p>
                                        {{-- <button id="btn_copy" class="btn btn-outline-primary" onkeyup="copyNumber()">Copy Number</button> --}}
                                    </div>
                                @empty
                                @endforelse
                                <a href="https://api.whatsapp.com/send?phone={{ $event->order->customer_phone }}&text=Hai {{ $event->nama_panggilan_mempelai_pria }}, aku udah transfer nih ke {{ $angpao->nama_bank ?? '' }} atas nama {{ $angpao->nama_penerima ?? '' }}. Selamat yah!"
                                    data-aos="fade-up" data-aos-duration="1000" id="confirm_kado" target="_blank"
                                    class="btn btn-success">Konfirmasi Kado Digital</a>
                            </div>
                        </div>
                        <div id="kirimKado" class="collapse" aria-labelledby="faq"
                            data-parent="#accordionExample">
                            <div class="card-body text-justify">
                                <h5 class="modal-title">Mau Kirim Kado?</h5>
                                <p>Alamat: {{ $event->order->customer_address }}</p>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- <h5 data-aos="fade-up" data-aos-duration="1000">Konfirmasi Kado Pernikahan</h5> --}}
                {{-- <a href="#" data-toggle="modal" data-target="#kado-modal" data-aos="fade-up" data-aos-duration="1000"
                    id="confirm_kado" class="btn btn-primary">Konfirmasi Kado</a> --}}


            </div>
        @endif
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
                    <textarea class="form-control" name="text" rows="1" placeholder="Write something..." style="max-height: 350px;"
                        data-aos="fade-down" data-aos-duration="1000"></textarea>
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

    <!-- Foot Wrapper -->
    <section class="foot-wrapper">
        <!-- Quote -->
        <div class="quote">
            <div class="inner">
                <div class="text-01" data-aos="fade-up" data-aos-duration="1000">
                    &quot; Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu
                    dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di
                    antaramu rasa kasih dan sayang. Sungguh, pada yang demikian itu benar-benar terdapat tanda-tanda
                    (kebesaran Allah) bagi kaum yang berpikir.
                    &quot; (QS. Ar-Rum:21)</div>
            </div>
        </div>
        <!-- Footnote -->
        <div class="footnote">
            <div class="inner">
                <div class="text-01" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    {{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM Y') }}
                </div>
                <div class="text-02" data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="400">
                    {{ $event->nama_panggilan_mempelai_wanita }} & {{ $event->nama_panggilan_mempelai_pria }}
                </div>
            </div>
        </div>
        <!-- Orn -->
        <div class="orn orn-line" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="500"></div>
        <div class="orn orn-07" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="700"></div>
    </section>

    <!-- Panduan Penggunaan Aplikasi -->
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
    <!-- Panduan Penggunaan APlikasi -->

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
    @if ($event->audio_id != null)
        <section class="music-outer" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
            <div class="music-box auto" id="music-box"></div>
        </section>
    @endif

    <!-- ALERT -->
    <!-- <div class="alert" id="alert">
        <div class="alert-text"></div>
        <div class="alert-close fas fa-times"></div>
    </div> -->

    <!-- MODAL PROTOKOL -->
    <div id="open-modal" class="modal modal-center fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <h5 class="modal-title">Protol Kesehatan (Covid-19)</h5>
                    <p>demi mendukung kesehatan bersama alangkah baiknya para tamu yang akan hadir memenuhi protokol
                        kesehatan sebagai berikut</p>
                    <img src="{{ asset('gambar-cvd.jpg') }}" alt="covid-19" style="width: 300px; height: auto;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Baik, saya mengerti</button>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL KADO --}}
    <div id="kado-modal" class="modal modal-center fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <h5 class="modal-title">Mau Kirim Kado?</h5>
                    <p>Alamat: {{ $event->order->customer_address }}</p>
                    <a href="https://api.whatsapp.com/send?phone={{ $event->order->customer_phone }}&text=Hai {{ $event->nama_panggilan_mempelai_pria }}, aku udah transfer nih ke {{ $angpao->nama_bank ?? '' }} atas nama {{ $angpao->nama_penerima ?? '' }}. Selamat yah!"
                        data-aos="fade-up" data-aos-duration="1000" id="confirm_kado" target="_blank"
                        class="btn btn-success">Konfirmasi Kado Digital</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- SCRIPT -->
    <script src="{{ asset('template-6/js/jquery.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('template-6/plugin/aos/dist/aos.js') }}"></script>
    <script src="{{ asset('template-6/plugin/slick/slick.min.js') }}"></script>
    <script src="{{ asset('template-6/plugin/selectize/dist/js/standalone/selectize.min.js') }}"></script>
    <script src="{{ asset('template-6/plugin/modal-video/js/jquery-modal-video.min.js') }}"></script>
    <script src="{{ asset('template-6/plugin/lightgallery/dist/js/lightgallery.min.js') }}"></script>

    <script>
        @if ($event->audio_id != null)
            window.BACKGROUND_MUSIC = "{{ asset('admin/assets/audio/' . $event->audio->path ?? '') }}";
        @endif

        const img_cover = [];
        const img_picture = [];
        @foreach ($photo_event as $gallery)
            img_cover.push(`<div class="picture-outer desktop"><img src="{{ asset($gallery['path']) }}" alt=""
                    class="picture">
            </div>`);
            img_picture.push(`<div class="picture-outer mobile"><img src="{{ asset($gallery['path']) }}" alt=""
                    class="picture"> </div>`)
        @endforeach

        window.DESKTOP_COVERS = img_cover;

        window.MOBILE_COVERS = img_picture;

        window.COVERS = ['#cover-banner'];

        const image = document.querySelector(".preview img");
        const button = document.querySelector("preview .play-btn");
        const yt_id = document.querySelector("iframe").src.match(/youtube\.com.*(\?v=|\/embed\/)(.{11})/).pop();
        if (yt_id.length == 11) {
            image.setAttribute("src", `//img.youtube.com/vi/${yt_id}/0.jpg`);
            button.setAttribute("data-video-id", yt_id);
        }
        let nomorRekening = "";
        function copyNumber() {
            /* Get the text field */
            const copyText = document.getElementById('nomor_rekening').innerText;

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            document.execCommand(copyText);
            nomorRekening = copyText;
            navigator.clipboard.writeText(nomorRekening);
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
    <script>
        feather.replace()
      </script>

</body>

</html>
