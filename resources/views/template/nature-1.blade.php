<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <title>Hoofey - Wedding of {{ $event->nama_panggilan_mempelai_wanita }} & {{ $event->nama_panggilan_mempelai_pria }}
    </title>
    <link rel="icon" href="{{ asset('favicon_hoofey.ico') }}" type="image/x-icon">

    <!-- WA -->
    <meta property="og:image" itemprop="image"
        content="{{ asset('admin/assets/images/events/' . $event->order->invoice . '/' . $event->logo_req) }}">
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="300" />
    <meta property="og:image:height" content="300" />
    <meta property="og:title"
        content="Hoofey - Wedding of  {{ $event->nama_panggilan_mempelai_wanita }} & {{ $event->nama_panggilan_mempelai_pria }}" />
    <meta property="og:description"
        content="{{ \Carbon\Carbon::parse($event->tanggal_resepsi)->format('M d Y') }}, {{ $event->lokasi_resepsi }}">
    <meta property="og:url" content="{{ route('see.event', ['slug' => $event->slug]) }}" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="en_GB" />

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style"
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=block">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=block">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="preload" as="style"
        href="https://fonts.googleapis.com/css2?family=Cormorant+Infant:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Cormorant:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=block">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Cormorant+Infant:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Cormorant:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=block">
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

    <script src="https://unpkg.com/@phosphor-icons/web" type="text/javascript"></script>

    <link rel="stylesheet" href="{{ asset('template-7/src/universal.css') }}">
    <link rel="stylesheet" href="{{ asset('template-7/src/template/global.css') }}">
    <link rel="stylesheet" href="{{ asset('template-7/src/template/theme-2.css') }}">

    <style>
        body {
            --background-primary: #EEE8E5 !important;
            --background-primary-rgb: 238, 232, 229 !important;
            --background-secondary: #E4D5C0 !important;
            --background-secondary-rgb: 228, 213, 192 !important;
            --background-tertiary: #7E3942 !important;
            --background-tertiary-rgb: 126, 57, 66 !important;
            --text-primary: #7E3942 !important;
            --text-primary-rgb: 126, 57, 66 !important;
            --text-secondary: #1E3F43 !important;
            --text-secondary-rgb: 30, 63, 67 !important;
            --text-tertiary: #EEE8E5 !important;
            --text-tertiary-rgb: 238, 232, 229 !important;
            --button-text-primary: #7E3942 !important;
            --button-text-primary-rgb: 126, 57, 66 !important;
            --button-background-primary: #EEE8E5 !important;
            --button-background-primary-rgb: 238, 232, 229 !important;
            --button-text-secondary: #EEE8E5 !important;
            --button-text-secondary-rgb: 238, 232, 229 !important;
            --button-background-secondary: #7E3942 !important;
            --button-background-secondary-rgb: 126, 57, 66 !important;
        }
    </style>
</head>

<body class="olan original  preset-original custom-fonts" data-template="olan">
    <section class="kat-page__side-to-side">
        <section class="primary-pane">
            <div class="inner">
                <div class="details">
                    <h1 data-aos="zoom-out" data-aos-duration="1200">
                        {{ $event->nama_panggilan_mempelai_wanita ?? 'Hawa' }} &
                        {{ $event->nama_panggilan_mempelai_pria ?? 'Adam' }}</h1>
                    @if (isset($invite->name))
                        <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">Hai {{ $invite->name }}</p>
                    @endif
                </div>
                <div class="highlight" data-aos="zoom-out" data-aos-duration="1000">
                    <div class="preview-container cover-show" id="cover-pane">
                    </div>
                </div>
            </div>
            <section class="effects chindy" data-aos="zoom-out" data-aos-duration="1250" data-aos-delay="500">
                <div><img src="{{ asset('template-7/media/template/theme-2/orn-01.png') }}" alt="ornamen-01"></div>
                <div><img src="{{ asset('template-7/media/template/theme-2/orn-02.png') }}" alt="ornamen-02"></div>
                <div><img src="{{ asset('template-7/media/template/theme-2/orn-01.png') }}" alt="ornamen-01"></div>
                <div><img src="{{ asset('template-7/media/template/theme-2/orn-02.png') }}" alt="ornamen-02"></div>
                <div><img src="{{ asset('template-7/media/template/theme-2/orn-01.png') }}" alt="ornamen-01"></div>
                <div><img src="{{ asset('template-7/media/template/theme-2/orn-01.png') }}" alt="ornamen-01"></div>
                <div><img src="{{ asset('template-7/media/template/theme-2/orn-02.png') }}" alt="ornamen-02"></div>
                <div><img src="{{ asset('template-7/media/template/theme-2/orn-01.png') }}" alt="ornamen-01"></div>
                <div><img src="{{ asset('template-7/media/template/theme-2/orn-02.png') }}" alt="ornamen-02"></div>
                <div><img src="{{ asset('template-7/media/template/theme-2/orn-01.png') }}" alt="ornamen-01"></div>
            </section>
        </section>

        <section class="secondary-pane">

            <section class="top-cover">
                <div class="inner">
                    <div class="details">
                        <div class="body-detail">
                            <h1 data-aos="fade-up" data-aos-duration="1200" data-aos-delay="700">
                                {{ $event->nama_panggilan_mempelai_wanita ?? 'Hawa' }} &
                                {{ $event->nama_panggilan_mempelai_pria ?? 'Adam' }}
                            </h1>
                            @if (isset($invite->name))
                                <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">Hai
                                    {{ $invite->name }}</p>
                            @endif
                            <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                                <a href="javascript:;" onclick="startTheJourney()" class="link"
                                    id="startToExplore">Open
                                    Invitation</a>
                            </div>
                        </div>
                    </div>
                    <div class="highlight" data-aos="zoom-out" data-aos-duration="1000">
                        <div class="preview-container cover-show" id="cover-opening">
                        </div>
                    </div>
                </div>
                <section class="effects chindy" data-aos="zoom-out" data-aos-duration="1250" data-aos-delay="500">
                    <div><img src="{{ asset('template-7/media/template/theme-2/orn-01.png') }}" alt="ornamen-01">
                    </div>
                    <div><img src="{{ asset('template-7/media/template/theme-2/orn-02.png') }}" alt="ornamen-02">
                    </div>
                    <div><img src="{{ asset('template-7/media/template/theme-2/orn-01.png') }}" alt="ornamen-01">
                    </div>
                    <div><img src="{{ asset('template-7/media/template/theme-2/orn-02.png') }}" alt="ornamen-02">
                    </div>
                    <div><img src="{{ asset('template-7/media/template/theme-2/orn-01.png') }}" alt="ornamen-01">
                    </div>
                    <div><img src="{{ asset('template-7/media/template/theme-2/orn-01.png') }}" alt="ornamen-01">
                    </div>
                    <div><img src="{{ asset('template-7/media/template/theme-2/orn-02.png') }}" alt="ornamen-02">
                    </div>
                    <div><img src="{{ asset('template-7/media/template/theme-2/orn-01.png') }}" alt="ornamen-01">
                    </div>
                    <div><img src="{{ asset('template-7/media/template/theme-2/orn-02.png') }}" alt="ornamen-02">
                    </div>
                    <div><img src="{{ asset('template-7/media/template/theme-2/orn-01.png') }}" alt="ornamen-01">
                    </div>
                </section>
            </section>

            <section class="cover">
                <div class="inner">
                    <div class="head " data-aos="fade-down" data-aos-duration="1000">
                        <p data-aos="fade-down" data-aos-duration="1000">Wedding Invitation</p>
                        <h1 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                            {{ $event->nama_panggilan_mempelai_wanita ?? 'Hawa' }} &
                            {{ $event->nama_panggilan_mempelai_pria ?? 'Adam' }}</h1>
                        <p class="date" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="300">
                            {{ $event->tanggal_ijab ? \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM, Y') : '24-11-2024' }}
                        </p>
                    </div>
                    <div class="ornaments-wrapper">
                        <div class="orn-cover-top-wrap">
                            <div class="orn-cover-top-1">
                                <div class="image-wrap" data-aos="fade-up" data-aos-duration="1200"
                                    data-aos-delay="500">
                                    <img src="{{ asset('template-7/media/template/theme-2/ranting-pohon.png') }}"
                                        alt="orn-cover-bottom-left-1">
                                </div>
                            </div>
                            <div class="orn-cover-top-2">
                                <div class="image-wrap" data-aos="fade-up" data-aos-duration="1200"
                                    data-aos-delay="500">
                                    <img src="{{ asset('template-7/media/template/theme-2/awan-1-min.png') }}"
                                        alt="orn-cover-bottom-3">
                                </div>
                            </div>
                            <div class="orn-cover-top-3">
                                <div class="image-wrap" data-aos="fade-up" data-aos-duration="1200"
                                    data-aos-delay="500">
                                    <img src="{{ asset('template-7/media/template/theme-2/awan-2.png') }}"
                                        alt="orn-cover-bottom-2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="body highlight" data-aos="zoom-out" data-aos-duration="2000">
                        <div class="cover-frame" id="coverFrame">
                            <div class="preview-container cover-show" id="cover-main"></div>
                        </div>
                    </div>
                    <div class="ornaments-wrapper">
                        <div class="orn-cover-bottom-wrap">
                            <div class="orn-cover-bottom-event-1">
                                <div class="image-wrap" data-aos="fade-up" data-aos-duration="1200"
                                    data-aos-delay="500">
                                    <img src="{{ asset('template-7/media/template/theme-2/bunga-cover-1.png') }}"
                                        alt="orn-cover-bottom-left-1">
                                </div>
                            </div>
                            <div class="orn-cover-bottom-event-3">
                                <div class="image-wrap" data-aos="fade-up" data-aos-duration="1200"
                                    data-aos-delay="500">
                                    <img src="{{ asset('template-7/media/template/theme-2/bunga-cover-2.png') }}"
                                        alt="orn-cover-bottom-3">
                                </div>
                            </div>
                            <div class="orn-cover-bottom-event-2">
                                <div class="image-wrap" data-aos="fade-up" data-aos-duration="1200"
                                    data-aos-delay="500">
                                    <img src="{{ asset('template-7/media/template/theme-2/bunga-cover-kiri.png') }}"
                                        alt="orn-cover-bottom-2">
                                </div>
                            </div>
                            <div class="orn-cover-bottom-event-6">
                                <div class="image-wrap" data-aos="fade-up" data-aos-duration="1200"
                                    data-aos-delay="500">
                                    <img src="{{ asset('template-7/media/template/theme-2/bunga-cover-kanan.png') }}"
                                        alt="orn-cover-bottom-6">
                                </div>
                            </div>
                            <div class="orn-cover-bottom-event-5">
                                <div class="image-wrap" data-aos="fade-up" data-aos-duration="1200"
                                    data-aos-delay="500">
                                    <img src="{{ asset('template-7/media/template/theme-2/bunga-cover-3.png') }}"
                                        alt="orn-cover-bottom-5">
                                </div>
                            </div>
                            <div class="orn-cover-bottom-event-4">
                                <div class="image-wrap" data-aos="fade-up" data-aos-duration="1200"
                                    data-aos-delay="500">
                                    <img src="{{ asset('template-7/media/template/theme-2/bunga-cover-tengah.png') }}"
                                        alt="orn-cover-bottom-4">
                                </div>
                            </div>
                            <div class="orn-cover-bottom-event-7">
                                <div class="image-wrap" data-aos="fade-up" data-aos-duration="1200"
                                    data-aos-delay="500">
                                    <img src="{{ asset('template-7/media/template/theme-2/bunga-cover-4.png') }}"
                                        alt="orn-cover-bottom-4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="couple-wrap">
                <div class="couple">
                    <div class="couple-head">
                        @if (isset($event->textSection->title))
                            <p class="couple-description" data-aos="fade-up" data-aos-duration="1000">
                                {!! nl2br(e($event->textSection->title ?? '')) !!}</p>
                        @endif
                    </div>
                    <div class="couple-body  bride-first   show-picture  ">
                        <div class="couple-info groom previewed">
                            <div class="couple-preview">
                                <div class="couple-frame">
                                    <div class="couple-picture-wrap">
                                        <div class="couple-picture lightgallery" data-aos="zoom-out"
                                            data-aos-duration="1500" data-aos-delay="500" data-aos-once="false">
                                            <a class="img-wrap"
                                                href="{{ asset('admin/assets/images/pria/' . $event->order->invoice . '/' . $event->avatar_pria) }}"
                                                target="_blank">
                                                <img class="img"
                                                    src="{{ asset('admin/assets/images/pria/' . $event->order->invoice . '/' . $event->avatar_pria) }}"
                                                    alt>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="decor-frame">
                                        <div class="image-wrap" data-aos="zoom-out" data-aos-duration="1000"
                                            data-aos-delay="0" data-aos-once="false">
                                            <img src="{{ asset('template-7/media/template/theme-2/frame-couple.png') }}"
                                                alt="Frame">
                                        </div>
                                    </div>
                                    <div class="orn-couple-1">
                                        <div class="image-wrap" data-aos="fade-right" data-aos-duration="1000"
                                            data-aos-delay="400">
                                            <img src="{{ asset('template-7/media/template/theme-2/frame-mempelai-01-min.png') }}"
                                                alt="orn-left">
                                        </div>
                                    </div>
                                    <div class="orn-couple-4">
                                        <div class="image-wrap" data-aos="fade-right" data-aos-duration="1000"
                                            data-aos-delay="1000">
                                            <img src="{{ asset('template-7/media/template/theme-2/frame-mempelai-04-min.png') }}"
                                                alt="orn-right">
                                        </div>
                                    </div>
                                    <div class="orn-couple-2">
                                        <div class="image-wrap" data-aos="fade-right" data-aos-duration="1000"
                                            data-aos-delay="600">
                                            <img src="{{ asset('template-7/media/template/theme-2/frame-mempelai-02-min.png') }}"
                                                alt="orn-left-edge">
                                        </div>
                                    </div>
                                    <div class="orn-couple-3">
                                        <div class="image-wrap" data-aos="fade-right" data-aos-duration="1000"
                                            data-aos-delay="800">
                                            <img src="{{ asset('template-7/media/template/theme-2/frame-mempelai-03-min.png') }}"
                                                alt="orn-bottom">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="couple-details">
                                <h2 class="couple-name" data-aos="fade-up" data-aos-duration="1000">
                                    {{ $event->nama_lengkap_mempelai_pria }}</h2>
                                <p class="couple-parents" data-aos="fade-up" data-aos-duration="1000">
                                    {!! nl2br(e($event->bio_mempelai_pria ?? '')) !!}</p>
                            </div>
                        </div>
                        <div class="separator-wrap previewed">
                            <div class="separator" data-aos="zoom-in" data-aos-duration="1500">
                                <h2 class="couple-separator">&amp;</h2>
                            </div>
                        </div>
                        <div class="couple-info bride previewed">
                            <div class="couple-preview">
                                <div class="couple-frame">
                                    <div class="couple-picture-wrap">
                                        <div class="couple-picture lightgallery" data-aos="zoom-out"
                                            data-aos-duration="1500" data-aos-delay="500" data-aos-once="false">
                                            <a class="img-wrap"
                                                href="{{ asset('admin/assets/images/wanita/' . $event->order->invoice . '/' . $event->avatar_wanita) }}"
                                                target="_blank">
                                                <img class="img"
                                                    src="{{ asset('admin/assets/images/wanita/' . $event->order->invoice . '/' . $event->avatar_wanita) }}"
                                                    alt>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="decor-frame">
                                        <div class="image-wrap" data-aos="zoom-out" data-aos-duration="1000"
                                            data-aos-once="false">
                                            <img src="{{ asset('template-7/media/template/theme-2/frame-couple.png') }}"
                                                alt="Frame">
                                        </div>
                                    </div>
                                    <div class="orn-couple-1">
                                        <div class="image-wrap" data-aos="fade-right" data-aos-duration="1000"
                                            data-aos-delay="400">
                                            <img src="{{ asset('template-7/media/template/theme-2/frame-mempelai-01-min.png') }}"
                                                alt="orn-left">
                                        </div>
                                    </div>
                                    <div class="orn-couple-4">
                                        <div class="image-wrap" data-aos="fade-right" data-aos-duration="1000"
                                            data-aos-delay="1000">
                                            <img src="{{ asset('template-7/media/template/theme-2/frame-mempelai-04-min.png') }}"
                                                alt="orn-right">
                                        </div>
                                    </div>
                                    <div class="orn-couple-2">
                                        <div class="image-wrap" data-aos="fade-right" data-aos-duration="1000"
                                            data-aos-delay="600">
                                            <img src="{{ asset('template-7/media/template/theme-2/frame-mempelai-02-min.png') }}"
                                                alt="orn-left-edge">
                                        </div>
                                    </div>
                                    <div class="orn-couple-3">
                                        <div class="image-wrap" data-aos="fade-right" data-aos-duration="1000"
                                            data-aos-delay="800">
                                            <img src="{{ asset('template-7/media/template/theme-2/frame-mempelai-03-min.png') }}"
                                                alt="orn-bottom">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="couple-details">
                                <h2 class="couple-name" data-aos="fade-up" data-aos-duration="1000">
                                    {{ $event->nama_lengkap_mempelai_wanita }}</h2>
                                <p class="couple-parents" data-aos="fade-up" data-aos-duration="1000">
                                    {!! nl2br(e($event->bio_mempelai_wanita ?? '')) !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="save-date-wrap">
                <div class="save-date">
                    <div class="ornaments-wrapper">
                        <div class="bg-preview-wrap">
                            <div class="bg-preview">
                                <div class="image-wrap">
                                    <img src="{{ asset('template-7/media/template/theme-2/bg-savedate.jpg') }}"
                                        alt="BG">
                                </div>
                            </div>
                            <div class="tile">
                                <div class="tile-bottom">
                                    <div class="image-wrap">
                                        <img src="{{ asset('template-7/media/template/theme-2/lantai.png') }}"
                                            alt="Pillar Top">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-wrap">
                            <div class="bridge">
                                <div class="bridge-bottom">
                                    <div class="image-wrap">
                                        <img src="{{ asset('template-7/media/template/theme-2/jembatan.png') }}"
                                            alt="Pillar Top">
                                    </div>
                                </div>
                            </div>
                            <div class="stairs">
                                <div class="stairs-bottom">
                                    <div class="image-wrap">
                                        <img src="{{ asset('template-7/media/template/theme-2/tangga-savedate.png') }}"
                                            alt="Pillar Top">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="orn-pilar">
                            <div class="roof-top">
                                <div class="image-wrap">
                                    <img src="{{ asset('template-7/media/template/theme-2/ubin.png') }}"
                                        alt="Pillar Top">
                                </div>
                            </div>
                            <div class="pillar-wrap">
                                <div class="pillar left">
                                    <div class="image-wrap">
                                        <img src="{{ asset('template-7/media/template/theme-2/pilar.png') }}"
                                            alt="Pillar Left">
                                    </div>
                                </div>
                                <div class="pillar right">
                                    <div class="image-wrap">
                                        <img src="{{ asset('template-7/media/template/theme-2/pilar.png') }}"
                                            alt="Pillar Right">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bunga-upper left">
                            <div class="image-wrap" data-aos="fade-right" data-aos-duration="1200"
                                data-aos-delay="800">
                                <img src="{{ asset('template-7/media/template/theme-2/bunga-ubin.png') }}"
                                    alt="Pillar Top">
                            </div>
                        </div>
                        <div class="bunga-upper right">
                            <div class="image-wrap" data-aos="fade-right" data-aos-duration="1200"
                                data-aos-delay="800">
                                <img src="{{ asset('template-7/media/template/theme-2/bunga-ubin.png') }}"
                                    alt="Pillar Top">
                            </div>
                        </div>
                        <div class="orn-bunga-kiri">
                            <div class="image-wrap" data-aos="fade-right" data-aos-duration="1200"
                                data-aos-delay="800">
                                <img src="{{ asset('template-7/media/template/theme-2/vas.png') }}" alt="Pillar Top">
                            </div>
                        </div>
                        <div class="orn-bunga-kanan">
                            <div class="image-wrap" data-aos="fade-right" data-aos-duration="1200"
                                data-aos-delay="800">
                                <img src="{{ asset('template-7/media/template/theme-2/vas.png') }}" alt="Pillar Top">
                            </div>
                        </div>
                    </div>
                    <div class="save-date-head">
                        <h1 class="save-date-title" data-aos="zoom-in" data-aos-duration="1000">Countdown</h1>
                    </div>
                    <div class="save-date-body">
                        <div class="countdown">
                            <div class="count-item" data-aos="fade-down-right" data-aos-duration="1000"
                                data-aos-delay="200">
                                <h2 class="count-num count-day" id="days">0</h2>
                                <small class="count-text">Days</small>
                            </div>
                            <div class="count-item" data-aos="fade-down-left" data-aos-duration="1000"
                                data-aos-delay="300">
                                <h2 class="count-num count-hour" id="hours">0</h2>
                                <small class="count-text">Hours</small>
                            </div>
                        </div>
                    </div>
                    <div class="save-date-body">
                        <div class="countdown">
                            <div class="count-item" data-aos="fade-up-right" data-aos-duration="1000"
                                data-aos-delay="400">
                                <h2 class="count-num count-minute" id="minutes">0</h2>
                                <small class="count-text">Minutes</small>
                            </div>
                            <div class="count-item" data-aos="fade-up-left" data-aos-duration="1000"
                                data-aos-delay="500">
                                <h2 class="count-num count-second" id="seconds">0</h2>
                                <small class="count-text">Seconds</small>
                            </div>
                        </div>
                    </div>
                    <div class="add-to-calendar-wrap" data-aos="fade-up" data-aos-duration="1000"
                        data-aos-delay="500">
                        <a class="add-to-calendar"
                            href="http://www.google.com/calendar/render?action=TEMPLATE&amp;text={{ $event->nama_panggilan_mempelai_wanita }}+%26+{{ $event->nama_panggilan_mempelai_pria }}+Wedding&amp;dates={{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('Ymd') }}T{{ \Carbon\Carbon::parse($event->jam_mulai_ijab)->format('His') }}/{{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('Ymd') }}T{{ \Carbon\Carbon::parse($event->jam_selesai_ijab)->format('His') }}&amp;location={{ $event->lokasi_ijab }}&amp;details=Hai+You%27re+invited+to+our+wedding+ceremony+%7C+{{ $event->nama_panggilan_mempelai_wanita }}+%26+{{ $event->nama_panggilan_mempelai_pria }}+Wedding+%7C+{{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('dddd') }}%2C+{{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM Y') }}"
                            target="_blank" rel="nofollow" id="addToCalendar">
                            Add to Calendar </a>
                    </div>
                </div>
            </section>

            <section class="agenda-wrap">
                <div class="agenda-inner">
                    <div class="agenda-head">
                        <h2 class="agenda-title" data-aos="zoom-in" data-aos-duration="1500">Wedding Day</h2>
                    </div>
                    <div class="agenda-body">
                        <div class="event-item">
                            
                            <div class="activity-wrap ">
                                <div class="activity-item">
                                    <div class="activity-frame">

                                        <div class="frame-wrap" data-aos="zoom-in" data-aos-duration="1000"
                                            data-aos-delay="500">
                                            <img src="{{ asset('template-7/media/template/theme-2/frame-agenda.png') }}"
                                                alt class width="100">
                                        </div>
                                    </div>
                                    <div class="activity-content">
                                        <div class="activity-head">
                                            <img src="{{ asset('template-7/media/template/icons/gold/01.png') }}"
                                                alt="Agenda Icon" class="activity-icon" data-aos="zoom-in"
                                                data-aos-duration="1000" data-aos-delay="800">
                                            <h3 class="activity-title" data-aos="zoom-in" data-aos-duration="1000"
                                                data-aos-delay="800">Akad Nikah</h3>
                                            <p class="activity-time" data-aos="fade-up" data-aos-duration="1000">
                                                {{ \Carbon\Carbon::parse($event->tanggal_ijab)->formatLocalized('%A') }}</p>
                                            <p class="activity-time" data-aos="fade-up" data-aos-duration="1000" style="padding-bottom: 5px;">
                                                {{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM, Y') }}</p>
                                            <p class="activity-time" data-aos="fade-up" data-aos-duration="1000">
                                                {{ \Carbon\Carbon::parse($event->jam_mulai_ijab)->format('H:i') }} -
                                                {{ \Carbon\Carbon::parse($event->jam_selesai_ijab)->format('H:i') }}
                                            </p>
                                        </div>
                                        <div class="activity-details">
                                            <p class="activity-address" data-aos="zoom-in" data-aos-duration="1000"
                                                data-aos-delay="800">{{ $event->lokasi_ijab }}</p>
                                            @if ($event->gm_ijab != null)
                                                <div class="activity-link-wrap" data-aos="zoom-in"
                                                    data-aos-duration="1000" data-aos-delay="800"><a
                                                        href="{{ $event->gm_ijab }}" class="activity-link"
                                                        target="_blank">View Maps</a></div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="ornaments-wrapper">
                                        <div class="orn-event-frame-1">
                                            <div class="image-wrap" data-aos="fade-right" data-aos-duration="1000"
                                                data-aos-delay="500">
                                                <img src="{{ asset('template-7/media/template/theme-2/orn-acara-01.png') }}"
                                                    alt="orn-left">
                                            </div>
                                        </div>
                                        <div class="orn-event-frame-3">
                                            <div class="image-wrap" data-aos="fade-right" data-aos-duration="1000"
                                                data-aos-delay="600">
                                                <img src="{{ asset('template-7/media/template/theme-2/orn-acara-03.png') }}"
                                                    alt="orn-bottom">
                                            </div>
                                        </div>
                                        <div class="orn-event-frame-2">
                                            <div class="image-wrap" data-aos="fade-up-right" data-aos-duration="1000"
                                                data-aos-delay="550">
                                                <img src="{{ asset('template-7/media/template/theme-2/orn-acara-02.png') }}"
                                                    alt="orn-left-edge">
                                            </div>
                                        </div>
                                        <div class="orn-event-frame-5">
                                            <div class="image-wrap" data-aos="fade-left" data-aos-duration="1000"
                                                data-aos-delay="700">
                                                <img src="{{ asset('template-7/media/template/theme-2/orn-acara-04.png') }}"
                                                    alt="orn-right">
                                            </div>
                                        </div>
                                        <div class="orn-event-frame-4">
                                            <div class="image-wrap" data-aos="fade-up-left" data-aos-duration="1000"
                                                data-aos-delay="650">
                                                <img src="{{ asset('template-7/media/template/theme-2/bunga-orange-agenda.png') }}"
                                                    alt="orn-right-edge">
                                            </div>
                                        </div>
                                        <div class="orn-event-frame-6">
                                            <div class="image-wrap" data-aos="zoom-in-left" data-aos-duration="1000"
                                                data-aos-delay="750">
                                                <img src="{{ asset('template-7/media/template/theme-2/merak.png') }}"
                                                    alt="orn-peacock">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-frame">

                                        <div class="frame-wrap" data-aos="zoom-in" data-aos-duration="1000"
                                            data-aos-delay="500">
                                            <img src="{{ asset('template-7/media/template/theme-2/frame-agenda.png') }}"
                                                alt class width="100">
                                        </div>
                                    </div>
                                    <div class="activity-content">
                                        <div class="activity-head">
                                            <img src="{{ asset('template-7/media/template/icons/gold/02.png') }}"
                                                alt="Agenda Icon" class="activity-icon" data-aos="zoom-in"
                                                data-aos-duration="1000" data-aos-delay="800">
                                            <h3 class="activity-title" data-aos="zoom-in" data-aos-duration="1000"
                                                data-aos-delay="800">Resepsi</h3>
                                            <p class="activity-time" data-aos="fade-up" data-aos-duration="1000">
                                                {{ \Carbon\Carbon::parse($event->tanggal_resepsi)->formatLocalized('%A') }}</p>
                                            <p class="activity-time" data-aos="fade-up" data-aos-duration="1000" style="padding-bottom: 5px;">
                                                {{ \Carbon\Carbon::parse($event->tanggal_resepsi)->isoFormat('D MMMM, Y') }}</p>
                                            <p class="activity-time" data-aos="fade-up" data-aos-duration="1000">
                                                {{ \Carbon\Carbon::parse($event->jam_mulai_resepsi)->format('H:i') }}
                                                -
                                                {{ \Carbon\Carbon::parse($event->jam_selesai_resepsi)->format('H:i') }}
                                            </p>
                                        </div>
                                        <div class="activity-details">
                                            <p class="activity-address" data-aos="zoom-in" data-aos-duration="1000"
                                                data-aos-delay="800">{{ $event->lokasi_resepsi }}</p>
                                            @if ($event->gm_resepsi != null)
                                                <div class="activity-link-wrap" data-aos="zoom-in"
                                                    data-aos-duration="1000" data-aos-delay="800"><a
                                                        href="{{ $event->gm_resepsi }}" class="activity-link"
                                                        target="_blank">View Maps</a></div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="ornaments-wrapper">
                                        <div class="orn-event-frame-1">
                                            <div class="image-wrap" data-aos="fade-right" data-aos-duration="1000"
                                                data-aos-delay="500">
                                                <img src="{{ asset('template-7/media/template/theme-2/orn-acara-01.png') }}"
                                                    alt="orn-left">
                                            </div>
                                        </div>
                                        <div class="orn-event-frame-3">
                                            <div class="image-wrap" data-aos="fade-right" data-aos-duration="1000"
                                                data-aos-delay="600">
                                                <img src="{{ asset('template-7/media/template/theme-2/orn-acara-03.png') }}"
                                                    alt="orn-bottom">
                                            </div>
                                        </div>
                                        <div class="orn-event-frame-2">
                                            <div class="image-wrap" data-aos="fade-up-right" data-aos-duration="1000"
                                                data-aos-delay="550">
                                                <img src="{{ asset('template-7/media/template/theme-2/orn-acara-02.png') }}"
                                                    alt="orn-left-edge">
                                            </div>
                                        </div>
                                        <div class="orn-event-frame-5">
                                            <div class="image-wrap" data-aos="fade-left" data-aos-duration="1000"
                                                data-aos-delay="700">
                                                <img src="{{ asset('template-7/media/template/theme-2/orn-acara-04.png') }}"
                                                    alt="orn-right">
                                            </div>
                                        </div>
                                        <div class="orn-event-frame-4">
                                            <div class="image-wrap" data-aos="fade-up-left" data-aos-duration="1000"
                                                data-aos-delay="650">
                                                <img src="{{ asset('template-7/media/template/theme-2/bunga-orange-agenda.png') }}"
                                                    alt="orn-right-edge">
                                            </div>
                                        </div>
                                        <div class="orn-event-frame-6">
                                            <div class="image-wrap" data-aos="zoom-in-left" data-aos-duration="1000"
                                                data-aos-delay="750">
                                                <img src="{{ asset('template-7/media/template/theme-2/merak.png') }}"
                                                    alt="orn-peacock">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ornaments-wrapper">
                        <div class="orn-bottom-wrap">
                            <div class="orn-bottom-event-1">
                                <div class="image-wrap" data-aos="fade-up" data-aos-duration="1200"
                                    data-aos-delay="2200">
                                    <img src="{{ asset('template-7/media/template/theme-2/bunga-cover-1.png') }}"
                                        alt="orn-bottom-left-1">
                                </div>
                            </div>
                            <div class="orn-bottom-event-3">
                                <div class="image-wrap" data-aos="fade-up" data-aos-duration="1200"
                                    data-aos-delay="2200">
                                    <img src="{{ asset('template-7/media/template/theme-2/bunga-cover-2.png') }}"
                                        alt="orn-bottom-3">
                                </div>
                            </div>
                            <div class="orn-bottom-event-2">
                                <div class="image-wrap" data-aos="fade-up" data-aos-duration="1200"
                                    data-aos-delay="2200">
                                    <img src="{{ asset('template-7/media/template/theme-2/bunga-cover-kiri.png') }}"
                                        alt="orn-bottom-2">
                                </div>
                            </div>
                            <div class="orn-bottom-event-6">
                                <div class="image-wrap" data-aos="fade-up" data-aos-duration="1200"
                                    data-aos-delay="2200">
                                    <img src="{{ asset('template-7/media/template/theme-2/bunga-cover-kanan.png') }}"
                                        alt="orn-bottom-6">
                                </div>
                            </div>
                            <div class="orn-bottom-event-5">
                                <div class="image-wrap" data-aos="fade-up" data-aos-duration="1200"
                                    data-aos-delay="2200">
                                    <img src="{{ asset('template-7/media/template/theme-2/bunga-cover-3.png') }}"
                                        alt="orn-bottom-5">
                                </div>
                            </div>
                            <div class="orn-bottom-event-4">
                                <div class="image-wrap" data-aos="fade-up" data-aos-duration="1200"
                                    data-aos-delay="2200">
                                    <img src="{{ asset('template-7/media/template/theme-2/bunga-cover-tengah.png') }}"
                                        alt="orn-bottom-4">
                                </div>
                            </div>
                            <div class="orn-bottom-event-7">
                                <div class="image-wrap" data-aos="fade-up" data-aos-duration="1200"
                                    data-aos-delay="2200">
                                    <img src="{{ asset('template-7/media/template/theme-2/bunga-cover-4.png') }}"
                                        alt="orn-bottom-4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            @if (
                $event->order->orderDetail->product_id == 2 ||
                    $event->order->orderDetail->product_id == 3 ||
                    $event->order->orderDetail->product_id == 4)
                @if (count($photo_event) > 0)
                    <section class="photo-wrap">
                        <div class="photo-inner">
                            <div class="photo-head">
                                <h1 class="photo-title" data-aos="fade-up" data-aos-duration="1000">Potraits of Us
                                </h1>
                            </div>
                            <div class="photo-body">
                                <div class="photo-box lightgallery">
                                    @foreach ($photo_event as $gallery)
                                        <a data-aos="zoom-in" data-aos-duration="1000"
                                            href="{{ asset($gallery['path']) }}" target="_blank">
                                            <img src="{{ asset($gallery['path']) }}"
                                                alt="pexels-photo-5729132.jpeg">
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
            @endif
            {{-- Barcode --}}
            @if ($event->order->orderDetail->product_id == 2 || $event->order->orderDetail->product_id == 3 || $event->order->orderDetail->product_id == 4)
                @if (isset($invite->kode_qr))
                    <section class="rsvp-wrap" id="rsvp">
                        <div class="rsvp-inner">
                            <div class="rsvp-head">
                                <h1 class="rsvp-title aos-init aos-animate" data-aos="zoom-in"
                                    data-aos-duration="1500">QR Code
                                </h1>
                                <div class="rsvp-info">
                                    <p class="info-text">SImpan QR Code ini untuk ditunjukkan pada saat isi buku tamu
                                    </p>
                                </div>
                            </div>
                            <div class="rsvp-body">
                                <div class="rsvp-message-wrap going aos-init aos-animate" data-aos="fade-up"
                                    data-aos-duration="1200">
                                    <div class="rsvp-message-content">
                                        <img class="qr-invitation-qrcode"
                                            src="data:image/png;base64, {!! base64_encode(
                                                QrCode::format('png')->style('round')->merge('/public/img/logo-hoofey-bg-white.png', 0.3)->errorCorrection('H')->size(300)->generate($invite->kode_qr ?? 'https://hoofey.id/'),
                                            ) !!} ">
                                    </div>
                                </div>
                                <div class="rsvp-change-wrap aos-init aos-animate" data-aos="fade-up"
                                    data-aos-duration="1200">
                                    <div class="rsvp-confirm-wrap">
                                        <a class="rsvp-confirm-btn confirm"
                                            href="{{ route('export.pdf', $invite->id ?? '') }}" target="_blank">Simpan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
            @endif

            <div class="section-group top">
                @if (isset($event->angpao))
                    <section class="wedding-gift-wrap ">
                        <div class="wedding-gift-inner">
                            <div class="ornaments-wrapper">
                                <div class="orn-top">
                                    <div class="image-wrap" data-aos="fade-down-left" data-aos-duration="1200"
                                        data-aos-delay="300">
                                        <img src="{{ asset('template-7/media/template/theme-2/orn-gift-kanan.png') }}"
                                            alt="orn-right-edge">
                                    </div>
                                </div>
                                <div class="orn-bottom-left">
                                    <div class="image-wrap" data-aos="fade-up-left" data-aos-duration="1200"
                                        data-aos-delay="300">
                                        <img src="{{ asset('template-7/media/template/theme-2/orn-galeri-kanan.png') }}"
                                            alt="orn-left-edge">
                                    </div>
                                </div>
                            </div>
                            <div class="wedding-gift-head">
                                <h1 class="wedding-gift-title" data-aos="zoom-in" data-aos-duration="1500">Wedding
                                    Gift
                                </h1>
                                <p class="wedding-gift-description" data-aos="fade-up" data-aos-duration="1000">Your
                                    blessing and coming to our wedding are enough for us. However, if you want to give a
                                    gift we provide a Digital Envelope to make it easier for you. thank you</p>
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
                                            <a class="wedding-gift-page wedding-gift__next send_gift"
                                                data-id="{{ $event->order->customer_phone }}"
                                                data-value="Hai {{ $event->nama_panggilan_mempelai_pria }}, aku udah transfer nih ke Bank {{ $angpao->nama_bank ?? '' }} atas nama {{ $angpao->nama_penerima ?? '' }}. Selamat yah!">
                                                Konfirmasi <i class="fas fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>
                @endif
            </div>
            <section class="wedding-wish-wrap" data-template>
                <div class="wedding-wish-inner">
                    <div class="wedding-wish-head">
                        <h1 class="wedding-wish-title" data-aos="fade-up" data-aos-duration="1200">Wedding Wish
                        </h1>
                    </div>
                    <div class="wedding-wish-body">

                        <div class="wedding-wish-form">

                            <form action="{{ route('wishes', ['id' => $event->id]) }}" autocomplete="off"
                                method="POST">
                                @csrf
                                <div class="form-group guest-name-wrap" data-aos="fade-up" data-aos-duration="1200">
                                    <input type="text" name="name" class="form-control guest-name"
                                        placeholder="Name">
                                </div>
                                <div class="form-group guest-email-wrap" data-aos="fade-up" data-aos-duration="1200">
                                    <input type="email" name="email" class="form-control guest-name"
                                        placeholder="Email">
                                </div>
                                <div class="button-input-wrapper" data-aos="fade-up" data-aos-duration="1200">
                                    <div class="form-group guest-comment-wrap">
                                        <textarea class="form-control guest-comment" name="text" rows="1" placeholder="Give your wish..."></textarea>
                                    </div>
                                    <div class="submit-comment-wrap">
                                        <button type="submit" class="submit submit-comment" data-last>Kirim</button>
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
                                        <small
                                            class="comment-date">{{ \Carbon\Carbon::parse($guestbook->created_at)->diffForHumans() }}</small>
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

            <section class="footnote-wrap">
                <div class="footnote-inner">

                    @if (isset($event->textSection->quote))
                        <div class="quote-wrap">
                            <div class="quote">
                                <p class="quote-caption" data-aos="fade-up" data-aos-duration="1000">
                                    {!! nl2br(e($event->textSection->quote ?? '')) !!}</p>
                            </div>
                        </div>
                    @endif
                    <div class="footnote-head">
                        <p class="top-text" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="100">
                            Wedding Invitation</p>
                        <h2 class="footnote-title" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                            {{ $event->nama_panggilan_mempelai_wanita }} &
                            {{ $event->nama_panggilan_mempelai_pria }}</h2>
                        <p class="date" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="300">
                            {{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM, Y') }}</p>
                    </div>
                    <div class="footnote-body">
                        <div class="preview-container">
                        </div>
                    </div>
                    <div class="ornaments-wrapper">
                        <div class="orn-cover-top-wrap">
                            <div class="orn-cover-top-2">
                                <div class="image-wrap" data-aos="fade-up" data-aos-duration="1200"
                                    data-aos-delay="500">
                                    <img src="{{ asset('template-7/media/template/theme-2/awan-1-min.png') }}"
                                        alt="orn-cover-bottom-3">
                                </div>
                            </div>
                            <div class="orn-cover-top-3">
                                <div class="image-wrap" data-aos="fade-up" data-aos-duration="1200"
                                    data-aos-delay="500">
                                    <img src="{{ asset('template-7/media/template/theme-2/awan-2.png') }}"
                                        alt="orn-cover-bottom-2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ornaments-wrapper">
                        <div class="orn-cover-bottom-wrap">
                            <div class="orn-cover-bottom-event-1">
                                <div class="image-wrap" data-aos="fade-up" data-aos-duration="1200"
                                    data-aos-delay="500">
                                    <img src="{{ asset('template-7/media/template/theme-2/bunga-cover-1.png') }}"
                                        alt="orn-cover-bottom-left-1">
                                </div>
                            </div>
                            <div class="orn-cover-bottom-event-3">
                                <div class="image-wrap" data-aos="fade-up" data-aos-duration="1200"
                                    data-aos-delay="500">
                                    <img src="{{ asset('template-7/media/template/theme-2/bunga-cover-2.png') }}"
                                        alt="orn-cover-bottom-3">
                                </div>
                            </div>
                            <div class="orn-cover-bottom-event-2">
                                <div class="image-wrap" data-aos="fade-up" data-aos-duration="1200"
                                    data-aos-delay="500">
                                    <img src="{{ asset('template-7/media/template/theme-2/bunga-cover-kiri.png') }}"
                                        alt="orn-cover-bottom-2">
                                </div>
                            </div>
                            <div class="orn-cover-bottom-event-6">
                                <div class="image-wrap" data-aos="fade-up" data-aos-duration="1200"
                                    data-aos-delay="500">
                                    <img src="{{ asset('template-7/media/template/theme-2/bunga-cover-kanan.png') }}"
                                        alt="orn-cover-bottom-6">
                                </div>
                            </div>
                            <div class="orn-cover-bottom-event-5">
                                <div class="image-wrap" data-aos="fade-up" data-aos-duration="1200"
                                    data-aos-delay="500">
                                    <img src="{{ asset('template-7/media/template/theme-2/bunga-cover-3.png') }}"
                                        alt="orn-cover-bottom-5">
                                </div>
                            </div>
                            <div class="orn-cover-bottom-event-4">
                                <div class="image-wrap" data-aos="fade-up" data-aos-duration="1200"
                                    data-aos-delay="500">
                                    <img src="{{ asset('template-7/media/template/theme-2/bunga-cover-tengah.png') }}"
                                        alt="orn-cover-bottom-4">
                                </div>
                            </div>
                            <div class="orn-cover-bottom-event-7">
                                <div class="image-wrap" data-aos="fade-up" data-aos-duration="1200"
                                    data-aos-delay="500">
                                    <img src="{{ asset('template-7/media/template/theme-2/bunga-cover-4.png') }}"
                                        alt="orn-cover-bottom-4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>

    </section>

    @if ($event->audio_id != null)
        <section class="music-outer" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
            <div class="music-box auto" id="music-box"></div>
        </section>
    @endif
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript">
        // Music
        var MUSIC = {
            'url': "{{ asset('admin/assets/audio/' . $event->audio->path ?? '') }}",
            'box': '#music-box'
        };

        // Event
        var EVENT = {{ strtotime($event->tanggal_ijab) }};

        // Covers
        var COVERS = [{
                'position': 'MAIN',
                'details': {
                    'desktop': `<div class="picture desktop">
                            <img src="{{ asset($gallery['path']) }}" alt="">
                        </div>`,
                    'mobile': `<div class="picture mobile">
                            <img src="{{ asset($gallery['path']) }}" alt="">
                        </div>`
                },
                'element': '#cover-main'
            },
            {
                'position': 'OPENING',
                'details': {
                    'desktop': `<div class="picture desktop">
                            <img src="{{ asset($gallery['path']) }}" alt="" class="picture">
                        </div>`,
                    'mobile': `<div class="picture mobile">
                            <img src="{{ asset($gallery['path']) }}" alt="" class="picture">
                        </div>`
                },
                'element': '#cover-opening'
            },
            {
                'position': 'PANE',
                'details': {
                    'desktop': `<div class="picture desktop">
                            <img src="{{ asset($gallery['path']) }}" alt="" class="picture">
                        </div>`,
                    'mobile': `<div class="picture mobile">
                            <img src="{{ asset($gallery['path']) }}" alt="" class="picture">
                        </div>`
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

        var Gift = $('.send_gift').on('click', function() {
            let no_hp = $(this).data('id');
            let message = $(this).data('value');
            message = encodeURIComponent(message);
            let phone = no_hp.substr(0, 1);
            if (phone == 8) {
                phone = no_hp;
            } else if (phone == 0) {
                phone = no_hp.substr(1);
            } else if (phone == '+') {
                phone = no_hp.substr(3);
            } else if (phone == 6) {
                phone = no_hp.substr(2);
            }
            window.open('https://api.whatsapp.com/send?phone=62' + phone + '&text=' + message)
        });

        var hitungMundur = (function() {
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
    </script>

    <div class="alert" id="alert">
        <div class="alert-text"></div>
        <div class="alert-close fas fa-times"></div>
    </div>

    <div id="modal" class="modal modal-center"></div>

    <script src="{{ asset('template-7/src/jquery.js') }}"></script>
    <script src="{{ asset('template-7/plugin/aos/dist/aos.js') }}"></script>
    <script src="{{ asset('template-7/plugin/slick/slick.min.js') }}"></script>
    <script src="{{ asset('template-7/plugin/selectize/dist/js/standalone/selectize.min.js') }}"></script>
    <script src="{{ asset('template-7/plugin/modal-video/js/jquery-modal-video.min.js') }}"></script>
    <script src="{{ asset('template-7/plugin/lightgallery/dist/js/lightgallery.min.js') }}"></script>
    <script src="{{ asset('template-7/src/universal.js') }}"></script>
    <script src="{{ asset('template-7/src/template/template.js') }}"></script>
    <script src="{{ asset('template-7/src/template/js/theme-2.js') }}"></script>
</body>

</html>
