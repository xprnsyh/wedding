<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <title>Hoofey - Wedding of {{ $event->nama_panggilan_mempelai_wanita }} & {{ $event->nama_panggilan_mempelai_pria }}</title>

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style"
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=block">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=block">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('template-7/plugin/selectize/dist/css/selectize.default.css') }}">
    <link rel="stylesheet" href="{{ asset('template-7/plugin/flexbin/flexbin.css') }}" media="all">
    <link rel="stylesheet" href="{{ asset('template-7/plugin/aos/dist/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('template-7/plugin/lightgallery/dist/css/lightgallery.css') }}">
    <link rel="stylesheet" href="{{ asset('template-7/plugin/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('template-7/plugin/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('template-7/plugin/modal-video/css/modal-video.min.css') }}">

    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    <link rel="stylesheet" href="{{ asset('template-7/src/universal.css') }}">
    <link rel="stylesheet" href="{{ asset('template-7/src/template/global.css') }}">

    <link rel="stylesheet" href="{{ asset('template-7/src/template/custom-minang.css') }}">

    <style>
        .fix-navbar {
            position: relative;
            z-index: 99;
            left: 50%;
        }

        .navbar {
            bottom: 0%;
            position: fixed;
            transform: translate(-50%, -50%);
            display: flex;
            justify-content: flex-start;
            border-radius: 24px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(44, 55, 94, 0.16);
            flex-direction: row;
            align-items: center;
            padding: 16px 24px;
            gap: 24px;
            font-size: 20px;
        }

        .navbar .nav-item {
            text-decoration: none;
            color: #000;
        }

        .navbar .nav-item:hover {
            color: #A21920;
        }
    </style>
</head>

<body class="minang original">
    <section class="kat-page__side-to-side">
        <section class="primary-pane">
            <div class="inner">
                <div class="texture-outer top bottom" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="1500">
                    <div class="coconut-tree left"></div>
                </div>
                <div class="texture-outer top bottom" data-aos="fade-left" data-aos-duration="1000"
                    data-aos-delay="1700">
                    <div class="coconut-tree right"></div>
                </div>
                <div class="texture-outer top bottom" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="200">
                    <div class="rumah-gadang"></div>
                </div>
                <div class="texture-outer top bottom" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
                    <div class="flowers bottom-01 left"></div>
                </div>
                <div class="texture-outer top bottom" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="700">
                    <div class="flowers bottom-02 left"></div>
                </div>
                <div class="texture-outer top bottom" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
                    <div class="flowers bottom-01 right"></div>
                </div>
                <div class="texture-outer top bottom" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="700">
                    <div class="flowers bottom-02 right"></div>
                </div>
                <div class="details">
                    <div class="cover-logo-wrap" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="900">
                        <!-- <img src="{{ asset('admin/assets/images/events/' . $event->order->invoice . '/' . $event->logo_req) }}"
                            alt class="cover-logo" width="100"> -->
                        <h1 class="prime-title" data-aos="fade-up" data-aos-duration="1200"
                            data-aos-delay="200">{{ $event->nama_panggilan_mempelai_wanita }}</h1>
                        <h1 class="prime-title" data-aos="fade-up" data-aos-duration="1200"
                            data-aos-delay="200"> & </h1>
                        <h1 class="prime-title" data-aos="fade-up" data-aos-duration="1200"
                            data-aos-delay="200">{{ $event->nama_panggilan_mempelai_pria }}</h1>
                    </div>
                    @if ($invite->name)
                        <p data-aos="fade-up" data-aos-duration="700" data-aos-delay="700">
                            Turut mengundang Bapak/Ibu/Saudara/i
                        </p>
                        <h1 data-aos="fade-up" data-aos-duration="700" data-aos-delay="700">
                            {{ $invite->name }}
                        </h1>
                    @endif
                </div>
            </div>
        </section>

        <section class="secondary-pane">
            <section class="top-cover">
                <div class="texture-outer top bottom" data-aos="fade-up" data-aos-duration="1000"
                    data-aos-delay="1500">
                    <div class="coconut-tree left"></div>
                </div>
                <div class="texture-outer top bottom" data-aos="fade-left" data-aos-duration="1000"
                    data-aos-delay="1700">
                    <div class="coconut-tree right"></div>
                </div>
                <div class="texture-outer top bottom" data-aos="fade-up" data-aos-duration="1500"
                    data-aos-delay="200">
                    <div class="rumah-gadang"></div>
                </div>
                <div class="texture-outer top bottom" data-aos="fade-up" data-aos-duration="1000"
                    data-aos-delay="500">
                    <div class="flowers bottom-01 left"></div>
                </div>
                <div class="texture-outer top bottom" data-aos="fade-up" data-aos-duration="1000"
                    data-aos-delay="700">
                    <div class="flowers bottom-02 left"></div>
                </div>
                <div class="texture-outer top bottom" data-aos="fade-up" data-aos-duration="1000"
                    data-aos-delay="500">
                    <div class="flowers bottom-01 right"></div>
                </div>
                <div class="texture-outer top bottom" data-aos="fade-up" data-aos-duration="1000"
                    data-aos-delay="700">
                    <div class="flowers bottom-02 right"></div>
                </div>
                <div class="inner">
                    <div class="details">
                        <div class="cover-logo-wrap" data-aos="fade-up" data-aos-duration="1500"
                            data-aos-delay="900">
                            <h1 class="prime-title" data-aos="fade-up" data-aos-duration="1200"
                                data-aos-delay="200">{{ $event->nama_panggilan_mempelai_wanita }}</h1>
                            <h1 class="prime-title" data-aos="fade-up" data-aos-duration="1200"
                                data-aos-delay="200"> & </h1>
                            <h1 class="prime-title" data-aos="fade-up" data-aos-duration="1200"
                                data-aos-delay="200">{{ $event->nama_panggilan_mempelai_pria }}</h1>
                        </div>
                        @if ($invite->name)
                            <p data-aos="fade-up" data-aos-duration="700" data-aos-delay="700">
                                Turut mengundang Bapak/Ibu/Saudara/i
                            </p>
                            <h1 data-aos="fade-up" data-aos-duration="700" data-aos-delay="700">
                                {{ $invite->name }}
                            </h1>
                        @endif
                        <div data-aos="fade-up" data-aos-duration="1500" data-aos-delay="1300">
                            <a href="javascript:;" onclick="startTheJourney()" class="link" id="startToExplore">
                                <i class="fas fa-envelope"></i> Buka Undangan
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <div class="section-group top">
                <div class="section-separator-wrap top" data-aos="zoom-out" data-aos-duration="1500"
                    data-aos-delay="300">
                    <img src="{{ asset('template-7/media/template/custom/minang/ic-separator.png') }}"
                        alt="Section Group" class="section-separator">
                </div>
                <section class="cover" id="home">
                    <div class="cover-inner">
                        <div class="cover-head">
                            <div class="cover-icon-wrap" data-aos="fade-down" data-aos-duration="1200"
                                data-aos-delay="400">
                                <img src="{{ asset('template-7/media/template/custom/minang/ic-spirals-of-vines.png') }}"
                                    alt class="cover-icon" width="100">
                            </div>
                            <p class="top-text" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="200">
                                Pernikahan</p>
                        </div>
                        <div class="cover-foot">
                            <h1 class="prime-title" data-aos="fade-up" data-aos-duration="1200"
                                data-aos-delay="200">{{ $event->nama_panggilan_mempelai_wanita }} &
                                {{ $event->nama_panggilan_mempelai_pria }}</h1>
                            <p class="date" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="400">
                                {{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM, Y') }}
                            </p>
                        </div>
                    </div>
                </section>
            </div>
            @if (isset($event->textSection->quote))
                <div class="section-group top">
                    <div class="section-separator-wrap top" data-aos="zoom-out" data-aos-duration="1500"
                        data-aos-delay="300">
                        <img src="{{ asset('template-7/media/template/custom/minang/ic-separator.png') }}"
                            alt="Section Group" class="section-separator">
                    </div>
                    <div class="quote-wrap">
                        <div class="quote-inner">
                            <p class="quote-caption" id="quote" data-aos="fade-up" data-aos-duration="1200">
                                {!! nl2br(e($event->textSection->quote ?? '')) !!}</p>
                        </div>
                    </div>
                </div>
            @endif
            <div class="section-group top">
                <div class="section-separator-wrap top" data-aos="zoom-out" data-aos-duration="1500"
                    data-aos-delay="300">
                    <img src="{{ asset('template-7/media/template/custom/minang/ic-separator.png') }}"
                        alt="Section Group" class="section-separator">
                </div>
                <section class="couple-wrap">
                    <div class="couple">
                        @if (isset($event->textSection->title))
                            <div class="couple-head">
                                <p class="couple-description" data-aos="fade-up" data-aos-duration="1000"
                                    data-aos-delay="200">{!! nl2br(e($event->textSection->title ?? '')) !!}</p>
                            </div>
                        @endif
                        <div class="couple-body bride-first show-picture">
                            <div class="couple-info groom">
                                <div class="couple-preview-wrap">
                                    <div class="couple-preview lightgallery" data-aos="zoom-in"
                                        data-aos-duration="2000" data-aos-once="false">
                                        <a class="img-wrap"
                                            href="{{ asset('admin/assets/images/pria/' . $event->order->invoice . '/' . $event->avatar_pria) }}"
                                            target="_blank">
                                            <img class="img"
                                                src="{{ asset('admin/assets/images/pria/' . $event->order->invoice . '/' . $event->avatar_pria) }}"
                                                alt>
                                        </a>
                                    </div>
                                </div>
                                <div class="couple-details">
                                    <h2 class="couple-name" data-aos="fade-up" data-aos-duration="1000">
                                        {{ $event->nama_lengkap_mempelai_pria }}
                                        </h1>
                                        <p class="couple-parents" data-aos="fade-up" data-aos-duration="1000"
                                            data-aos-delay="200"> {!! nl2br(e($event->bio_mempelai_pria ?? '')) !!}
                                        </p>
                                </div>
                            </div>
                            <div class="separator-wrap">
                                <div class="separator" data-aos="zoom-in" data-aos-duration="1500"
                                    data-aos-delay="800">
                                    <h2 class="couple-separator">&amp;</h2>
                                </div>
                            </div>
                            <div class="couple-info bride">
                                <div class="couple-preview-wrap">
                                    <div class="couple-preview lightgallery" data-aos="zoom-in"
                                        data-aos-duration="2000" data-aos-once="false">
                                        <a class="img-wrap"
                                            href="{{ asset('admin/assets/images/wanita/' . $event->order->invoice . '/' . $event->avatar_wanita) }}"
                                            target="_blank">
                                            <img class="img"
                                                src="{{ asset('admin/assets/images/wanita/' . $event->order->invoice . '/' . $event->avatar_wanita) }}"
                                                alt>
                                        </a>
                                    </div>
                                </div>
                                <div class="couple-details">
                                    <h2 class="couple-name" data-aos="fade-up" data-aos-duration="1000">
                                        {{ $event->nama_lengkap_mempelai_wanita }}
                                    </h2>
                                    <p class="couple-parents" data-aos="fade-up" data-aos-duration="1000"
                                        data-aos-delay="200">{!! nl2br(e($event->bio_mempelai_wanita ?? '')) !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="section-group top combine-wrapper-05">
                <div class="section-separator-wrap top" data-aos="zoom-out" data-aos-duration="1500"
                    data-aos-delay="300">
                    <img src="{{ asset('template-7/media/template/custom/minang/ic-separator.png') }}"
                        alt="Section Group" class="section-separator">
                </div>
                <section class="save-date-wrap" id="date">
                    <div class="save-date">
                        <div class="save-date-head" id="head_title">
                            <h1 class="save-date-title" data-aos="fade-up" data-aos-duration="1200">Hari Yang
                                Ditunggu</h1>
                            <h6 class="save-date-title" data-aos="fade-up" data-aos-duration="1200" id="head_name"></h6>
                        </div>
                        <div class="save-date-body">
                            <div class="save-date-icon-wrap top" data-aos="fade-up" data-aos-duration="1200"
                                data-aos-delay="200">
                                <img src="{{ asset('template-7/media/template/custom/minang/ic-spirals-of-vines.png') }}"
                                    alt class="save-date-icon" width="100">
                            </div>
                            <div class="countdown">
                                <div class="count-item" data-aos="fade-right" data-aos-duration="1200"
                                    data-aos-delay="600">
                                    <h2 class="count-num count-day" id="days">0</h2>
                                    <small class="count-text">Hari</small>
                                </div>
                                <div class="count-item" data-aos="fade-down" data-aos-duration="1200"
                                    data-aos-delay="500">
                                    <h2 class="count-num count-hour" id="hours">0</h2>
                                    <small class="count-text">Jam</small>
                                </div>
                                <div class="count-item" data-aos="fade-up" data-aos-duration="1200"
                                    data-aos-delay="500">
                                    <h2 class="count-num count-minute" id="minutes">0</h2>
                                    <small class="count-text">Menit</small>
                                </div>
                                <div class="count-item" data-aos="fade-left" data-aos-duration="1200"
                                    data-aos-delay="600">
                                    <h2 class="count-num count-second" id="seconds">0</h2>
                                    <small class="count-text">Detik</small>
                                </div>
                            </div>
                            <div class="add-to-calendar-wrap" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="800">
                                <a class="add-to-calendar"
                                    href="http://www.google.com/calendar/render?action=TEMPLATE&amp;text={{ $event->nama_panggilan_mempelai_wanita }}+%26+{{ $event->nama_panggilan_mempelai_pria }}+Wedding&amp;dates={{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('Ymd') }}T{{ \Carbon\Carbon::parse($event->jam_mulai_ijab)->format('His') }}/{{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('Ymd') }}T{{ \Carbon\Carbon::parse($event->jam_selesai_ijab)->format('His') }}&amp;location={{ $event->lokasi_ijab }}&amp;details=Hai+You%27re+invited+to+our+wedding+ceremony+%7C+{{ $event->nama_panggilan_mempelai_wanita }}+%26+{{ $event->nama_panggilan_mempelai_pria }}+Wedding+%7C+{{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('dddd') }}%2C+{{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM Y') }}"
                                    target="_blank" rel="nofollow" id="addToCalendar">Tambah ke Kalender </a>
                            </div>
                        </div>
                        <div class="save-date-icon-wrap bottom" data-aos="fade-up" data-aos-duration="1200"
                            data-aos-delay="900">
                            <img src="{{ asset('template-7/media/template/custom/minang/ic-spirals-of-vines.png') }}"
                                alt class="save-date-icon" width="100">
                        </div>
                    </div>
                </section>
                @if ($event->order->orderDetail->product_id == 2 || $event->order->orderDetail->product_id == 3 || $event->order->orderDetail->product_id == 4)
                    @if (count($photo_event) > 0)
                        <div class="photo-wrap" id="galeri">
                            <div class="photo-inner">
                                <div class="photo-head">
                                    <h1 class="photo-title" data-aos="fade-up" data-aos-duration="1200">Galeri Foto</h1>
                                </div>
                                <div class="photo-body">
                                    <div class="photo-nav-wrap">
                                        <div class="photo-nav" data-aos="fade-up" data-aos-duration="1200">
                                            @foreach ($photo_event as $gallery)
                                                <div class="photo-item">
                                                    <div class="photo-img-wrap lightgallery">
                                                        <a href="{{ asset($gallery['path']) }}" class="photo-link">
                                                            <img src="{{ asset($gallery['path']) }}" alt="Gallery"
                                                                class="photo-img">
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="photo-slider-wrap">
                                        <div class="photo-slider" data-aos="fade-up" data-aos-duration="1200">
                                            @foreach ($photo_event as $gallery)
                                                <div class="photo-item">
                                                    <div class="photo-img-wrap">
                                                        <img src="{{ asset($gallery['path']) }}" alt="Gallery"
                                                            class="photo-img">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <button class="photo-arrow next">
                                            <svg width="108" height="198" viewBox="0 0 108 198" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 190L100 99L8 8" stroke="black" stroke-width="15"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                        <button class="photo-arrow prev">
                                            <svg width="108" height="198" viewBox="0 0 108 198" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M100 190L8 99L100 8" stroke="black" stroke-width="15"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            </div>
            <div class="section-group top combine-wrapper-03">
                <div class="section-separator-wrap top" data-aos="zoom-out" data-aos-duration="1500"
                    data-aos-delay="300">
                    <img src="{{ asset('template-7/media/template/custom/minang/ic-separator.png') }}"
                        alt="Section Group" class="section-separator">
                </div>

                <section class="agenda-wrap" id="agenda">
                    <div class="agenda-inner">
                        <div class="section-group bottom combine-wrapper-04">
                            <div class="agenda-head">
                                <h1 class="agenda-title" data-aos="zoom-in" data-aos-duration="1500">Hari Pernikahan
                                </h1>
                            </div>
                            <div class="section-separator-wrap bottom" data-aos="zoom-out" data-aos-duration="1500"
                                data-aos-delay="300">
                                <img src="{{ asset('template-7/media/template/custom/minang/ic-separator.png') }}"
                                    alt="Section Group" class="section-separator">
                            </div>
                        </div>
                        <div class="agenda-body">
                            <div class="texture-outer top" data-aos="fade-right" data-aos-duration="1200"
                                data-aos-delay="200">
                                <div class="agenda-corner top left"></div>
                            </div>
                            <div class="texture-outer top" data-aos="fade-left" data-aos-duration="1200"
                                data-aos-delay="200">
                                <div class="agenda-corner top right"></div>
                            </div>
                            <div class="texture-outer bottom" data-aos="fade-right" data-aos-duration="1200"
                                data-aos-delay="200">
                                <div class="agenda-corner bottom left"></div>
                            </div>
                            <div class="texture-outer bottom" data-aos="fade-left" data-aos-duration="1200"
                                data-aos-delay="200">
                                <div class="agenda-corner bottom right"></div>
                            </div>
                            <div class="event-item" data-aos="fade-up" data-aos-duration="1200">
                                <div class="event-head">
                                    <h1 class="event-day" data-aos="fade-up" data-aos-duration="1000">
                                        {{ \Carbon\Carbon::parse($event->tanggal_ijab)->formatLocalized('%A') }}
                                    </h1>
                                    <p class="event-date" data-aos="fade-up" data-aos-duration="1000">
                                        {{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM, Y') }}</p>
                                </div>
                                <div class="activity-wrap ">
                                    <div class="activity-item">
                                        <div class="activity-head">
                                            <img src="{{ asset('template-7/media/template/icons/cream/01.png') }}"
                                                alt="Wedding Icons" class="activity-icon" data-aos="fade-up"
                                                data-aos-duration="1000">
                                            <h1 class="activity-title" data-aos="fade-up" data-aos-duration="1000">
                                                Akad Nikah
                                            </h1>
                                            <p class="activity-time" data-aos="fade-up" data-aos-duration="1000">
                                                {{ \Carbon\Carbon::parse($event->jam_mulai_ijab)->format('H:i') }} -
                                                {{ \Carbon\Carbon::parse($event->jam_selesai_ijab)->format('H:i') }}
                                            </p>
                                        </div>
                                        <div class="activity-details">
                                            <p class="activity-address" data-aos="fade-up" data-aos-duration="1000">
                                                {{ $event->lokasi_ijab }}</p>
                                            @if ($event->gm_ijab != null)
                                                <div class="activity-link-wrap" data-aos="fade-up"
                                                    data-aos-duration="1000">
                                                    <a href="{{ $event->gm_ijab }}" class="activity-link"
                                                        target="_blank">Lihat Peta</a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="activity-item">
                                        <div class="activity-head">
                                            <img src="{{ asset('template-7/media/template/icons/cream/02.png') }}"
                                                alt="Wedding Icons" class="activity-icon" data-aos="fade-up"
                                                data-aos-duration="1000">
                                            <h1 class="activity-title" data-aos="fade-up" data-aos-duration="1000">
                                                Resepsi
                                            </h1>
                                            <p class="activity-time" data-aos="fade-up" data-aos-duration="1000">
                                                {{ \Carbon\Carbon::parse($event->jam_mulai_resepsi)->format('H:i') }} -
                                                {{ \Carbon\Carbon::parse($event->jam_selesai_resepsi)->format('H:i') }}
                                            </p>
                                        </div>
                                        <div class="activity-details">
                                            <p class="activity-address" data-aos="fade-up" data-aos-duration="1000">
                                                {{ $event->lokasi_resepsi }}</p>
                                            @if ($event->gm_resepsi != null)
                                                <div class="activity-link-wrap" data-aos="fade-up"
                                                    data-aos-duration="1000">
                                                    <a href="{{ $event->gm_resepsi }}" class="activity-link"
                                                        target="_blank">Lihat Peta</a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            {{-- Done --}}
            @if ($event->order->orderDetail->product_id == 2 || $event->order->orderDetail->product_id == 3 || $event->order->orderDetail->product_id == 4)
                <div class="section-group top combine-wrapper-01">
                    <div class="section-separator-wrap top" data-aos="zoom-out" data-aos-duration="1500"
                        data-aos-delay="300">
                        <img src="{{ asset('template-7/media/template/custom/minang/ic-separator.png') }}"
                            alt="Section Group" class="section-separator">
                    </div>
                    @if ($event->order->orderDetail->product_id == 3 || $event->order->orderDetail->product_id == 4)
                        @if (isset($invite->kode_qr))
                            <div class="qr-invitation-wrap" id="qr">
                                <div class="qr-invitation-body">
                                    <div class="qr-invitation-form">
                                        <div class="qr-invitation-details">
                                            <h1 class="qr-invitation-title">QR Code</h1>
                                            <p class="qr-invitation-desc">simpan QR Code ini untuk ditunjukkan pada saat
                                                isi buku tamu</p>
                                            <img class="qr-invitation-qrcode"
                                                src="data:image/png;base64, {!! base64_encode(
                                                    QrCode::format('png')->style('round')->merge('/public/img/logo-hoofey-bg-white.png', 0.3)->errorCorrection('H')->size(300)->generate($invite->kode_qr),
                                                ) !!} ">
                                            <a class="qr-invitation-download"
                                                href="{{ route('export.pdf', $invite->id) }}" target="_blank">Download <i
                                                    class="fas fa-download"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="section-separator-wrap bottom" data-aos="zoom-out" data-aos-duration="1500"
                                data-aos-delay="300">
                                <img src="{{ asset('template-7/media/template/custom/minang/ic-separator.png') }}"
                                    alt="Section Group" class="section-separator">
                            </div>
                        @endif
                    @endif
                    @if (isset($event->angpao))
                        <section class="wedding-gift-wrap">
                            <div class="wedding-gift-inner">
                                <div class="wedding-gift-head">
                                    <h1 class="wedding-gift-title" data-aos="zoom-in" data-aos-duration="1500">Kirim
                                        amplop tanpa repot</h1>
                                    <p class="wedding-gift-description" data-aos="fade-up" data-aos-duration="1000">
                                        Atas
                                        restu
                                        dan kedatangan kamu ke pesta pernikahan kami sudah cukup bagi kami.Tapi jika kamu
                                        ingin
                                        memberi hadiah, kami menyediakan Amplop Digital untuk memudahkan kamu. Terima kasih
                                    </p>
                                </div>
                                <div class="wedding-gift-body">
                                    <div class="wedding-gift-form">
                                        <div class="wedding-gift-details wedding-gift__first-slide wedding-gift-slide">

                                            <div class="wedding-gift-select-bank-wrap">
                                                <label>Pilih bank tujuan transfer</label>
                                                <select name="select_bank" id="selectBank" class="form-control"></select>
                                            </div>

                                            <div class="wedding-gift-bank-wrap">
                                                @forelse ($event->angpao as $angpao)
                                                    <div class="bank-item" id="savingBook{{ $angpao->id ?? '' }}">
                                                        <div class="bank-detail">
                                                            <h3 class="bank-name">{{ $angpao->nama_bank ?? '' }}</h3>
                                                            <div>
                                                                <small class="bank-account-number-label">No.
                                                                    Rekening</small>
                                                                <h4 class="bank-account-number"
                                                                    data-copy="{{ $angpao->no_rekening ?? '' }}">
                                                                    {{ $angpao->no_rekening ?? '' }} <i
                                                                        class="fas fa-clone fa-flip-horizontal"></i>
                                                                </h4>
                                                            </div>
                                                            <div>
                                                                <small class="bank-account-name-label">Pemilik
                                                                    Rekening</small>
                                                                <h4 class="bank-account-name">
                                                                    {{ $angpao->nama_penerima ?? '' }}</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                @endforelse
                                            </div>

                                            <div class="wedding-gift-page-wrap">
                                                <a href="https://api.whatsapp.com/send?phone={{ $event->order->customer_phone }}&text=Hai {{ $event->nama_panggilan_mempelai_pria }}, aku udah transfer nih ke {{ $angpao->nama_bank ?? '' }} atas nama {{ $angpao->nama_penerima ?? '' }}. Selamat yah!"
                                                    class="wedding-gift-page wedding-gift__next"
                                                    target="_blank">Konfirmasi <i class="fas fa-chevron-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    @endif
                </div>
            @endif
            <div class="section-group top">
                <div class="section-separator-wrap top" data-aos="zoom-out" data-aos-duration="1500"
                    data-aos-delay="300">
                    <img src="{{ asset('template-7/media/template/custom/minang/ic-separator.png') }}"
                        alt="Section Group" class="section-separator">
                </div>

                <section class="wedding-wish-wrap" id="wish">
                    <div class="texture-outer top" data-aos="fade-left" data-aos-duration="1200"
                        data-aos-delay="200">
                        <div class="star-02"></div>
                    </div>
                    <div class="wedding-wish-inner">
                        <div class="wedding-wish-head">
                            <h1 class="wedding-wish-title" data-aos="fade-up" data-aos-duration="1200">Ucapan &amp;
                                Harapan</h1>
                        </div>
                        <div class="wedding-wish-body">
                            <div class="wedding-wish-form">
                                <form action="{{ route('wishes', ['id' => $event->id]) }}" autocomplete="off"
                                    method="POST">
                                    @csrf
                                    <div class="form-group guest-name-wrap" data-aos="fade-up"
                                        data-aos-duration="1200">
                                        <input type="text" name="name" class="form-control guest-name"
                                            placeholder="Name">
                                    </div>
                                    <div class="form-group guest-email-wrap" data-aos="fade-up"
                                        data-aos-duration="1200">
                                        <input type="email" name="email" class="form-control guest-name"
                                            placeholder="Email">
                                    </div>
                                    <div class="button-input-wrapper" data-aos="fade-up" data-aos-duration="1200">
                                        <div class="form-group guest-comment-wrap">
                                            <textarea class="form-control guest-comment" name="text" rows="1" placeholder="Give your wish..."></textarea>
                                        </div>
                                        <div class="submit-comment-wrap">
                                            <button type="submit" class="submit submit-comment"
                                                data-last>Kirim</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="comment-wrap show">
                                @foreach ($data_guestbook as $guestbook)
                                    <div class="comment-item aos-init aos-animate" data-aos="fade-up"
                                        data-aos-duration="1200">
                                        <div class="comment-head">
                                            <h3 class="comment-name">{{ $guestbook->name }}</h3>
                                            <small class="comment-date">{{ \Carbon\Carbon::parse($guestbook->created_at)->diffForHumans() }}</small>
                                        </div>
                                        <div class="comment-body">
                                            <p class="comment-caption">{{ $guestbook->text }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="section-group top">
                <div class="section-separator-wrap top" data-aos="zoom-out" data-aos-duration="1500"
                    data-aos-delay="300">
                    <img src="{{ asset('template-7/media/template/custom/minang/ic-separator.png') }}"
                        alt="Section Group" class="section-separator">
                </div>

                <section class="footnote-wrap">
                    <div class="footnote">
                        <h1 class="footnote-title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="200">
                            {{ $event->nama_panggilan_mempelai_wanita }} & {{ $event->nama_panggilan_mempelai_pria }}
                        </h1>
                        <p class="footnote-date" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="400">
                            {{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM, Y') }}
                        </p>
                        <div class="footnote-icon-wrap" data-aos="fade-up" data-aos-duration="1200"
                            data-aos-delay="600">
                            <img src="{{ asset('template-7/media/template/custom/minang/ic-spirals-of-vines.png') }}"
                                alt class="footnote-icon">
                        </div>
                    </div>
                </section>
            </div>
            <div class="fix-navbar">
                <div class="navbar">
                    <a href="#home" class="nav-item">
                        <i class="fa-solid fa-house"></i>
                    </a>
                    <a href="#date" class="nav-item">
                        <i class="fa-solid fa-calendar"></i>
                    </a>
                    @if (count($photo_event) > 0)
                        <a href="#galeri" class="nav-item">
                            <i class="fa-solid fa-images"></i>
                        </a>
                    @endif
                    <a href="#agenda" class="nav-item">
                        <i class="fa-solid fa-map-location-dot"></i>
                    </a>
                    @if (isset($invite->kode_qr))
                        <a href="#qr" class="nav-item">
                            <i class="fa-solid fa-qrcode"></i>
                        </a>
                    @endif
                    <a href="#wish" class="nav-item">
                        <i class="fa-solid fa-message"></i>
                    </a>
                </div>

            </div>
        </section>
    </section>
    @if ($event->audio_id != null)
        <section class="music-outer play" data-id="show_music" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
            <div class="music-box auto" id="music-box"></div>
        </section>
    @else
        <section class="music-outer" data-id="show_music" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
            <div class="music-box auto" id="music-box"></div>
        </section>
    @endif

    <script>
        // Music

        const is_music = document.querySelector('[data-id="show_music"]');

        var MUSIC = {
            'url': "{{ asset('admin/assets/audio/' . $event->audio->path?? '') }}",
            'box': '#music-box'
        };





        // Event
        var EVENT = {{ strtotime($event->tanggal_ijab) }};
        // 1671854400

        //CountDown
        (function() {
            const second = 1000,
            minute = second * 60,
            hour = minute * 60,
            day = hour * 24;

            let ijab = "{{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('M d Y') }} {{ \Carbon\Carbon::parse($event->jam_mulai_ijab)->format('H:i') }}";
            let countDown = new Date(ijab).getTime();
            let now = new Date().getTime();
            let distance = countDown - now;
            let checkCount = Math.floor((distance % (day)) / (hour));

            if (checkCount < 0){
                let resepsi = "{{ \Carbon\Carbon::parse($event->tanggal_resepsi)->format('M d Y') }} {{ \Carbon\Carbon::parse($event->jam_mulai_resepsi)->format('H:i') }}",
                countDown = new Date(resepsi).getTime()
                x = setInterval(function() {
                    let now = new Date().getTime()
                    distance = countDown - now;
                    document.getElementById("days").innerText = Math.floor(distance / (day)),
                    document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
                    document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
                    document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);
                }, 0)

                const para = document.getElementById("head_name");
                const node = document.createTextNode("Resepsi");
                para.appendChild(node);
            } else {
                let ijab = "{{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('M d Y') }} {{ \Carbon\Carbon::parse($event->jam_mulai_ijab)->format('H:i') }}",
                countDown = new Date(ijab).getTime(),
                x = setInterval(function() {
                    let now = new Date().getTime(),
                    distance = countDown - now;
                    document.getElementById("days").innerText = Math.floor(distance / (day)),
                    document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
                    document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
                    document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);
                }, 0)
                const para = document.getElementById("head_name");
                const node = document.createTextNode("Akad/Janji Pernikahan");
                para.appendChild(node);
            }
        }());

        // Covers
        var COVERS = [{
                'position': 'MAIN',
                'details': {
                    'desktop': "",
                    'mobile': ""
                },
                'element': '#cover-main'
            },
            {
                'position': 'OPENING',
                'details': {
                    'desktop': "",
                    'mobile': ""
                },
                'element': '#cover-opening'
            },
            {
                'position': 'PANE',
                'details': {
                    'desktop': "",
                    'mobile': ""
                },
                'element': '#cover-pane'
            }
        ];

        // Banks
        var BANK_OPTIONS = [
            @forelse ($event->angpao as $angpao)
                {
                    "id": {{ $angpao->id ?? '' }},
                    "title": "{{ $angpao->nama_bank ?? '' }}",
                    "credential": "{{ $angpao->no_rekening ?? '' }}"
                },
            @empty @endforelse
        ];
    </script>


    <script src="{{ asset('template-7/src/jquery.js') }}"></script>
    <script src="{{ asset('template-7/plugin/aos/dist/aos.js') }}"></script>
    <script src="{{ asset('template-7/plugin/slick/slick.min.js') }}"></script>
    <script src="{{ asset('template-7/plugin/selectize/dist/js/standalone/selectize.min.js') }}"></script>
    <script src="{{ asset('template-7/plugin/modal-video/js/jquery-modal-video.min.js') }}"></script>
    <script src="{{ asset('template-7/plugin/lightgallery/dist/js/lightgallery.min.js') }}"></script>
    <script src="{{ asset('template-7/src/universal.js') }}"></script>
    <script src="{{ asset('template-7/src/template/template.js') }}"></script>
    <script src="{{ asset('template-7/src/template/js/custom-minang.js') }}"></script>
</body>

</html>
