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
        content="Hoofey - Wedd  ing of  {{ $event->nama_panggilan_mempelai_wanita }} & {{ $event->nama_panggilan_mempelai_pria }}" />
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
    <link rel="stylesheet" href="{{ asset('template-7/src/template/theme-3.css') }}">
</head>

<body class="ashilla original">
    <section class="top-cover">
        <div class="inner">
            <div class="details">
                <h1 data-aos="zoom-out" data-aos-duration="1200">{{ $event->nama_panggilan_mempelai_wanita }} &
                    {{ $event->nama_panggilan_mempelai_pria }}</h1>
                @if (isset($invite->name))
                    <p data-aos="fade-up" data-aos-duration="700" data-aos-delay="700">
                        Turut mengundang Bapak/Ibu/Saudara/i
                    </p>
                    <p data-aos="fade-up" data-aos-duration="700" data-aos-delay="700">
                        {{ $invite->name }}
                    </p>
                @endif
                <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                    <a href="javascript:;" onclick="startTheJourney()" class="link" data-cf-modified->Buka
                        Undangan</a>
                </div>
            </div>
            <div class="highlight" data-aos="zoom-out" data-aos-duration="1000">
                <div class="preview-container cover-show" id="cover-opening">
                </div>
            </div>
        </div>
    </section>

    <section class="cover">
        <div class="inner">
            <div class="head" data-aos="zoom-in" data-aos-duration="1000">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 66 15.81" class="cover-orn" data-aos="fade-down"
                    data-aos-duration="1000" data-aos-delay="200">
                    <rect class="cls-1" x="17.6" y="11.15" width="11.83" height="0.19" />
                    <rect class="cls-1" x="37.43" y="11.15" width="10.84" height="0.19" />
                    <path class="cls-1"
                        d="M47.72,11.34c.67-1.73.88-2.85,2.54-3.69,1.36-.68,3-.46,4.44-.5A2.9,2.9,0,0,0,52,9.36a5.48,5.48,0,0,1,4.84-.55c1.79.57,2.81,2.54,4.75,2.95,1.78.38,4-.57,3.42-2.61-.76-2.88-4.09-.47-2.1.46.8-.93,1.41.63.3.84s-2.12-1.33-1.86-2.17c.75-2.44,4.53-.62,4.66,1.36s-2.87,3.38-4.54,3.3c-2.37-.11-3.91-2.59-6.37-2.24,1.16.22,2.7,2.05,4.1,2.62-1.87,1-3.55-.12-5.07-1.06C52,11,50,11.4,48.38,11.34Z" />
                    <path class="cls-1"
                        d="M48.28,12c1.63-1.49,6.36.35,5.69,2.72a1.89,1.89,0,0,1-2.59.83c-1.15-.91.17-2.21.7-1,.13.34-.28.41-.4.29a1.42,1.42,0,0,0,.41.29c1.3,0,.43-1.71-.33-2.4-1-.88-2.54-1.52-3.48-.75Z" />
                    <path class="cls-1"
                        d="M18.27,11.34c-.66-1.73-.87-2.85-2.53-3.69-1.36-.68-3-.46-4.44-.5A2.9,2.9,0,0,1,14,9.36a5.48,5.48,0,0,0-4.84-.55c-1.79.57-2.81,2.54-4.75,2.95-1.78.38-4-.57-3.43-2.61.77-2.88,4.1-.47,2.11.46-.81-.93-1.41.63-.31.84S4.92,9.12,4.67,8.28C3.92,5.84.13,7.66,0,9.64S2.88,13,4.55,12.94c2.36-.11,3.91-2.59,6.37-2.24-1.16.22-2.71,2.05-4.1,2.62,1.87,1,3.54-.12,5.07-1.06C14,11,16,11.4,17.62,11.34Z" />
                    <path class="cls-1"
                        d="M17.72,12c-1.63-1.49-6.37.35-5.69,2.72a1.88,1.88,0,0,0,2.58.83c1.16-.91-.16-2.21-.69-1-.14.34.28.41.4.29a1.42,1.42,0,0,1-.41.29c-1.3,0-.43-1.71.33-2.4,1-.88,2.54-1.52,3.48-.75Z" />
                    <path class="cls-1"
                        d="M28.18,10.05a2.48,2.48,0,0,1-3.36-.87C24.13,8,24.26,6.84,23.09,6c-.77-.59-2.23-1.11-3-.16a1.12,1.12,0,0,0,1.28,1.74.76.76,0,0,1-.94.56.11.11,0,0,1-.11.06,1.6,1.6,0,0,0,1.36.23c-.86,1.56-3.38-.13-3.58-1.39-.31-1.88,2.13-2.55,3.6-2.34A3.53,3.53,0,0,1,24.78,7.2c.42,1.6.79,3.06,2.76,3Z" />
                    <path class="cls-1"
                        d="M27.54,9.52C25.75,9.58,25,7.64,25,6.14c0-.78.36-1.47.11-2.23C25,3.43,24.44,2.55,24,3.34c.89.59-1.55,1.08-.81-.35s1.85-.61,2.27.28a6.07,6.07,0,0,0,.24-.59A1.41,1.41,0,0,1,25.86,4a4.23,4.23,0,0,0,.41-.36c.52,1.2-.83,2.56-.28,3.75a1.54,1.54,0,0,1-.57-1.11,3.33,3.33,0,0,0,1.74,3.15Z" />
                    <path class="cls-1"
                        d="M27.43,9.15c-.26-.26-1.67-1.32-1.38-2.38a2,2,0,0,1,2.26-1.43,1.26,1.26,0,0,1,.8,2c-.78.86-1.67-.39-.73-.73.05.15.17.28.15.49,1,.13.33-1.17-.15-1.4a1.53,1.53,0,0,0-1.75.44,1.84,1.84,0,0,0,.15,2.15c.56.63.44.44,1,1.15A1.28,1.28,0,0,1,27.43,9.15Z" />
                    <path class="cls-1"
                        d="M26.41,5.43c.45-.7,1.19-.37,1.74-.87A1.85,1.85,0,0,0,28.51,3a2.9,2.9,0,0,0-1.87,1.63,1.78,1.78,0,0,1,1-.36,1.78,1.78,0,0,0-1,.91Z" />
                    <path class="cls-1"
                        d="M26.47,3.66c0-.65-.4-1-.22-1.69a5.17,5.17,0,0,1,.53-1c1.18.58.63,1.94-.09,2.65V2.49a1,1,0,0,0-.22.75Z" />
                    <path class="cls-1"
                        d="M25.35,2.46a2.61,2.61,0,0,1-.78-1.41c0-.45.22-.65.3-1,.81.58.77,1.45.69,2.33a2,2,0,0,0-.49-.84,3,3,0,0,0,.28,1Z" />
                    <path class="cls-1"
                        d="M32.67,10.48a3.25,3.25,0,0,0-2.32-.73c-.74.13-1.32.71-2.06.86a2.2,2.2,0,0,0,1.41,0c-.63.24-.93.43-1,1.18a1.67,1.67,0,0,1-.88,1.48A2.46,2.46,0,0,0,30,12a2.54,2.54,0,0,1,2.24-1.27c-1.35-.74-2.21,1.08-3,1.74.38-.64.44-1.52,1.12-1.94a2.66,2.66,0,0,1,2.44.06Z" />
                    <path class="cls-1"
                        d="M32.82,10.1c-1-.5-1.73-1-2.95-.68-.85.21-2.35.34-2.79-.72.78.25,1.56-.57,2.36-.58a4.66,4.66,0,0,1,2.3.9,4.54,4.54,0,0,0-3.38-.08s-.08,0,0,0,0,0,0,0c.79.46,1.4.19,2.25.14a2.68,2.68,0,0,1,2,.84Z" />
                    <path class="cls-1"
                        d="M32.85,9.5c-.22-.93-1.13-1.24-1.78-1.82s-.72-1.36-1.33-1.87c.84-.45,1.82.29,2.49.85a2.38,2.38,0,0,1,.83,2.42c-.26-.64-.51-1.15-1.26-1.35.54.51,1,.87,1.1,1.63Z" />
                    <path class="cls-1"
                        d="M33.5,9.51c.46-1.13.73-2.32,2.18-2.45,1-.08,1.67.6,2.47,1-.89.3-1.13,1.24-2.09,1.46-.79.18-1.62-.09-2.41.09.33-.85,1-1.08,1.79-1.39A1.77,1.77,0,0,0,33.82,9Z" />
                    <path class="cls-1"
                        d="M33.84,10a1.81,1.81,0,0,1,2.42,1.72c0,1-1.11,1.32-1.29,2.31a21.54,21.54,0,0,1-1-2,3.43,3.43,0,0,1-.51-1c0-.37.14-.61.2-.93.18,1,1,1,1.7,1.44-.24-.76-1.18-.9-1.49-1.62Z" />
                    <path class="cls-1"
                        d="M33.12,10.77a2.16,2.16,0,0,1-.92,2.38c-.77.47-1.49.58-2,1.39a3,3,0,0,1,2.24-3.39c-.46.25-1.23.87-1.08,1.59a12.23,12.23,0,0,1,1.13-1.05,1.82,1.82,0,0,0,.4-1.26Z" />
                    <path class="cls-1"
                        d="M33.58,12a4.17,4.17,0,0,1,.78,1.82,1.49,1.49,0,0,1-1,1.25c-.47.06-.82-.63-.95-1-.26-.78.43-.57.75-1.14.16.32.52.8.35,1.1a2.65,2.65,0,0,0,.15-2Z" />
                    <path class="cls-1"
                        d="M38.57,11.23c-.47.26-1.26.75-1.83.49A2.08,2.08,0,0,0,35.85,10c.76.1,1.09,1,1.81,1h0c-.46-.34-.61-1.11-1.25-1.18.45,0,.8-.26,1.22-.05C37.79,9.85,38.81,11.09,38.57,11.23Z" />
                    <path class="cls-1"
                        d="M33.5,8.39a1.69,1.69,0,0,0,0-1.09c-.13-.31-.43-.45-.57-.75a1.59,1.59,0,0,1,.52-1.69c.6-.6.93-.17,1.39.38a2,2,0,0,1,.48,1.61c-.41,0-.66.08-.85.47a2.32,2.32,0,0,1-.65-1c-.23.7.29,1.43-.27,2.06Z" />
                    <path class="cls-1"
                        d="M37.32,10.05a2.48,2.48,0,0,0,3.36-.87C41.37,8,41.24,6.84,42.4,6c.77-.59,2.24-1.11,3-.16a1.12,1.12,0,0,1-1.28,1.74.75.75,0,0,0,.93.56.14.14,0,0,0,.12.06,1.62,1.62,0,0,1-1.37.23c.87,1.56,3.38-.13,3.59-1.39.31-1.88-2.14-2.55-3.6-2.34A3.53,3.53,0,0,0,40.71,7.2c-.42,1.6-.79,3.06-2.76,3Z" />
                    <path class="cls-1"
                        d="M38,9.52c1.8.06,2.56-1.88,2.54-3.38,0-.78-.36-1.47-.11-2.23.16-.48.68-1.36,1.07-.57-.89.59,1.56,1.08.82-.35s-1.86-.61-2.28.28a4.24,4.24,0,0,1-.23-.59A1.38,1.38,0,0,0,39.63,4c-.09-.1-.3-.22-.41-.36-.52,1.2.83,2.56.28,3.75a1.54,1.54,0,0,0,.57-1.11,3.31,3.31,0,0,1-1.73,3.15Z" />
                    <path class="cls-1"
                        d="M38.07,9.15c.25-.26,1.67-1.32,1.37-2.38a2,2,0,0,0-2.25-1.43,1.26,1.26,0,0,0-.8,2c.77.86,1.66-.39.72-.73,0,.15-.17.28-.15.49-1,.13-.32-1.17.15-1.4a1.53,1.53,0,0,1,1.75.44,1.84,1.84,0,0,1-.14,2.15c-.56.63-.45.44-1,1.15A1.44,1.44,0,0,0,38.07,9.15Z" />
                    <path class="cls-1"
                        d="M39.09,5.43c-.46-.7-1.2-.37-1.75-.87A1.88,1.88,0,0,1,37,3a2.86,2.86,0,0,1,1.86,1.63,1.75,1.75,0,0,0-1-.36,1.79,1.79,0,0,1,1,.91Z" />
                    <path class="cls-1"
                        d="M39,3.66c0-.65.4-1,.23-1.69a5.74,5.74,0,0,0-.53-1c-1.19.58-.64,1.94.09,2.65V2.49a.94.94,0,0,1,.21.75Z" />
                    <path class="cls-1"
                        d="M40.15,2.46a2.68,2.68,0,0,0,.78-1.41c0-.45-.22-.65-.3-1-.82.58-.78,1.45-.69,2.33a1.92,1.92,0,0,1,.48-.84,2.76,2.76,0,0,1-.27,1Z" />
                </svg>
                <p data-aos="fade-down" data-aos-duration="1000">THE WEDDING OF</p>
            </div>
            <div class="body highlight" data-aos="zoom-out" data-aos-duration="2000">
                <div class="preview-container cover-show" id="cover-main"></div>
            </div>
            <div class="foot" data-aos="zoom-in" data-aos-duration="1000">
                <h1 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                    {{ $event->nama_panggilan_mempelai_wanita }} & {{ $event->nama_panggilan_mempelai_pria }}</h1>
                <p class="date" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    {{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM, Y') }}</p>
            </div>
            <div class="mount-left-01"></div>
            <div class="mount-left-02"></div>
            <div class="mount-right-01"></div>
            <div class="mount-right-02"></div>
        </div>
    </section>

    <section class="save-date">
        <div class="inner">
            <div class="head">
                <p id="quote" data-aos="fade-up" data-aos-duration="1200">
                    {!! nl2br(e($event->textSection->quote ?? '')) !!}</p>
            </div>
            <div class="mount-left"></div>
            <div class="mount-center"></div>
            <div class="mount-right"></div>
        </div>
    </section>

    <section class="couple">
        <div class="inner">
            <div class="head">
                @if (isset($event->textSection->title))
                    <p class="couple-description" data-aos="fade-up" data-aos-duration="1000">
                        {!! nl2br(e($event->textSection->title ?? '')) !!}</p>
                @endif
                <!-- <h1 data-aos="zoom-in" data-aos-duration="1000">The Wedding Of</h1>
                <p data-aos="fade-up" data-aos-duration="1000">The pleasure of your company is requested at the
                    marriage of</p> -->
            </div>
            <div class="body bride-first show-picture">
                <div class="groom">
                    <div class="preview" data-aos="zoom-out" data-aos-duration="1000">
                        <div class="picture lightgallery" data-aos="zoom-in" data-aos-duration="1000"
                            data-aos-once="false">
                            <a href="{{ asset('admin/assets/images/pria/' . $event->order->invoice . '/' . $event->avatar_pria) }}"
                                target="_blank">
                                <img
                                    src="{{ asset('admin/assets/images/pria/' . $event->order->invoice . '/' . $event->avatar_pria) }}">
                            </a>
                        </div>
                    </div>
                    <div class="details">
                        <h2 data-aos="fade-up" data-aos-duration="1000">{{ $event->nama_lengkap_mempelai_pria }}</h1>
                            <p data-aos="fade-up" data-aos-duration="1000">{!! nl2br(e($event->bio_mempelai_pria ?? '')) !!}</p>
                    </div>
                </div>
                <div class="separator" data-aos="zoom-out" data-aos-duration="1000">
                    <p>&amp;</p>
                </div>
                <div class="bride">
                    <div class="preview" data-aos="zoom-out" data-aos-duration="1000">
                        <div class="picture lightgallery" data-aos="zoom-in" data-aos-duration="1000"
                            data-aos-once="false">
                            <a href="{{ asset('admin/assets/images/wanita/' . $event->order->invoice . '/' . $event->avatar_wanita) }}"
                                target="_blank">
                                <img
                                    src="{{ asset('admin/assets/images/wanita/' . $event->order->invoice . '/' . $event->avatar_wanita) }}">
                            </a>
                        </div>
                    </div>
                    <div class="details">
                        <h2 data-aos="fade-up" data-aos-duration="1000">{{ $event->nama_lengkap_mempelai_wanita }}
                        </h2>
                        <p data-aos="fade-up" data-aos-duration="1000">{!! nl2br(e($event->bio_mempelai_wanita ?? '')) !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="save-date">
        <div class="inner">
            <div class="head">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Save The Date</h1>
                <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    {{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM, Y') }}</p>
            </div>
            <div class="body">
                <div class="countdown" data-aos="zoom-out" data-aos-duration="1000">
                    <div data-aos="fade-up-right" data-aos-duration="1500" data-aos-delay="250">
                        <h2 class="count-day" id="days">12</h2>
                        <small>Hari</small>
                    </div>
                    <div data-aos="fade-down-right" data-aos-duration="1200" data-aos-delay="400">
                        <h2 class="count-hour" id="hours">12</h2>
                        <small>Jam</small>
                    </div>
                    <div data-aos="fade-down" data-aos-duration="1250" data-aos-delay="300">
                        <h2 class="count-minute" id="minutes">12</h2>
                        <small>Menit</small>
                    </div>
                    <div data-aos="fade-up-left" data-aos-duration="1200" data-aos-delay="150">
                        <h2 class="count-second" id="seconds">12</h2>
                        <small>Detik</small>
                    </div>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44.1 13.83" class="save-orn-01"
                    data-aos="fade-up" data-aos-duration="1500">
                    <path
                        d="M22.05,5.17a2.9,2.9,0,0,0-2.11.37c-.52.39-.74,1.08-1.26,1.5.4,0,.81-.38,1.09-.6a1.08,1.08,0,0,0-.33,1.33,1.46,1.46,0,0,1-.09,1.51,2.16,2.16,0,0,0,1.21-1.87,2.22,2.22,0,0,1,1.24-1.9c-1.36,0-1.29,1.73-1.68,2.59,0-.65-.27-1.37.09-2a2.37,2.37,0,0,1,1.94-.93Z" />
                    <path class="cls-1"
                        d="M22,4.82a3.35,3.35,0,0,0-2.58.65C18.85,6,17.74,6.69,17,6c.72-.12,1-1.07,1.62-1.4a4.14,4.14,0,0,1,2.16-.22,4,4,0,0,0-2.68,1.3s0,0,0,0,0,0,0,0c.81,0,1.18-.41,1.81-.8a2.4,2.4,0,0,1,1.88-.13Z" />
                    <path class="cls-1"
                        d="M21.8,4.33c-.55-.63-1.38-.5-2.13-.7s-1.11-.77-1.79-.92c.48-.7,1.55-.51,2.29-.35a2.1,2.1,0,0,1,1.62,1.56,1.6,1.6,0,0,0-1.53-.54c.63.18,1.16.26,1.52.83Z" />
                    <path class="cls-1"
                        d="M22.31,4.08C22.21,3,22,2,23,1.29c.75-.47,1.55-.2,2.35-.17-.57.59-.39,1.42-1,2s-1.31.58-1.86,1a2.27,2.27,0,0,1,.85-1.81,1.57,1.57,0,0,0-1,1.22Z" />
                    <path class="cls-1"
                        d="M22.79,4.35a1.58,1.58,0,0,1,2.58.37c.39.82-.34,1.48-.08,2.33a19.17,19.17,0,0,1-1.6-1.12c-.26-.19-.6-.29-.78-.55s-.14-.53-.21-.8c.53.69,1.21.36,1.9.44-.5-.5-1.28-.23-1.81-.67Z" />
                    <path class="cls-1"
                        d="M22.52,5.22a1.89,1.89,0,0,1,.24,2.23c-.41.68-.93,1-1,1.9a2.61,2.61,0,0,1,.38-3.56c-.25.38-.61,1.18-.2,1.69a9.8,9.8,0,0,1,.46-1.29,1.55,1.55,0,0,0-.2-1.14Z" />
                    <path class="cls-1"
                        d="M23.37,6c.45.31,1.13.62,1.34,1.11a1.31,1.31,0,0,1-.3,1.39c-.34.24-.89-.16-1.16-.42-.51-.5.11-.61.13-1.19.26.19.73.42.72.72.12-.61-.37-1.22-.7-1.65Z" />
                    <path class="cls-1"
                        d="M27,3.38c-.27.4-.68,1.1-1.24,1.12a1.81,1.81,0,0,0-1.37-1c.64-.23,1.24.31,1.8,0h0c-.49-.08-.92-.62-1.45-.42.34-.19.52-.52.93-.53C25.8,2.62,27.1,3.18,27,3.38Z" />
                    <path class="cls-1"
                        d="M21.86,3.21a1.54,1.54,0,0,0-.48-.84c-.23-.18-.52-.17-.75-.35A1.42,1.42,0,0,1,20.36.49C20.59-.22,21,0,21.6.23a1.78,1.78,0,0,1,1,1.06c-.3.19-.48.33-.48.71a2.14,2.14,0,0,1-.9-.51c.1.64.8,1,.62,1.72Z" />
                    <path class="cls-1"
                        d="M25,7.49a7.4,7.4,0,0,1,6.65-.7c1.66.66,2.79,2.15,4.6,2.39,1.27.17,3.1-.3,3.48-1.69.59-2.2-2.39-1.14-1.3-.47a4.13,4.13,0,0,0,.25-.48,1,1,0,0,1,.57.12c.07,1.21-1.74,2-2.76,1.8A13.25,13.25,0,0,1,33.24,7.1C31,6,28.26,5.65,26.1,6.76Z" />
                    <path class="cls-1"
                        d="M25.49,7.73a5.37,5.37,0,0,1,5.32-.36c1.39.51,2.38,1.67,3.75,2.18a5.39,5.39,0,0,0,4.36-.34c.94-.64,2.48-2.3,1.44-3.41.87-.93,1.23.7,1,1.35A4.08,4.08,0,0,1,39.75,9a2.65,2.65,0,0,0,1.33-.41c-.86,1-2,1.05-3.09,1.4.26.06.5.21.77.28-3.24.82-4.92-1.17-7.66-2.19a7.74,7.74,0,0,1,1.42,1.65C30.6,7.92,27.7,6.51,25.25,8Z" />
                    <path class="cls-1"
                        d="M25.61,8.22a2,2,0,0,1,2.45.09c.48.47.29.92.54,1.48.58,1.27,1.89.63,2.47,1.69a.85.85,0,0,1-.84.35,2.83,2.83,0,0,0,0-.3s-.07.09-.07.08a3.19,3.19,0,0,1,.33-.25c-.76-.69-1.33.53-2.19.09S28,9.92,27.11,9.53a3.2,3.2,0,0,1,.3,1.56c-1.81.39-.08-3.24-2.4-2.75Z" />
                    <path class="cls-1"
                        d="M28.08,7.73c1.05.6.73,1.36,1.31,2.15s1.49.41,2.06,1A4.69,4.69,0,0,0,30.76,9c-.4-.46-1.12-.59-1.6-1a1.9,1.9,0,0,1,.62,1.19,2.15,2.15,0,0,0-1.3-1.18Z" />
                    <path class="cls-1"
                        d="M31.63,9.34c.72.9.17,1.81.5,2.66s1.16,1.05,1.36,1.83a3.85,3.85,0,0,0-.74-3.9,2.37,2.37,0,0,1,.16,1.63,4,4,0,0,0-1.28-2.22Z" />
                    <path class="cls-1"
                        d="M33.32,9.42A23,23,0,0,1,35.8,11c.87.65.77,1.42.9,2.39C34.71,13,34.06,11,33,9.45c.62.65,1.45,1.17,2,1.83-.32-.57-.84-1-1.17-1.54Z" />
                    <path class="cls-1"
                        d="M36.55,10.55A5.81,5.81,0,0,1,41,12.36c-1.89.84-3.44-.55-4.84-1.64.56.23,1.27.11,1.82.4a9,9,0,0,0-2-.57Z" />
                    <path class="cls-1"
                        d="M39.29,9.9c1.19-.8,1.81-.16,3,.1-1.19,1.05-1.94.68-3.31.55A8,8,0,0,0,40,10a3.09,3.09,0,0,1-1.26.08Z" />
                    <path class="cls-1"
                        d="M44.1,7.64a4.51,4.51,0,0,1-3,1.44c.21-.17.48-.4.69-.61a1,1,0,0,0-.93,0A4.79,4.79,0,0,1,42.3,7.6,12.56,12.56,0,0,1,44.1,7.64Z" />
                    <path class="cls-1"
                        d="M19.09,7.49a7.4,7.4,0,0,0-6.65-.7c-1.66.66-2.79,2.15-4.6,2.39-1.28.17-3.11-.3-3.48-1.69C3.77,5.29,6.74,6.35,5.66,7c0-.14-.19-.27-.26-.48a1,1,0,0,0-.56.12c-.08,1.21,1.74,2,2.76,1.8A13.25,13.25,0,0,0,10.86,7.1,8.21,8.21,0,0,1,18,6.76Z" />
                    <path class="cls-1"
                        d="M18.61,7.73a5.39,5.39,0,0,0-5.33-.36C11.9,7.88,10.9,9,9.53,9.55a5.37,5.37,0,0,1-4.35-.34c-.94-.64-2.49-2.3-1.44-3.41-.88-.93-1.23.7-1,1.35A4.08,4.08,0,0,0,4.35,9,2.65,2.65,0,0,1,3,8.6c.86,1,2,1.05,3.09,1.4-.26.06-.5.21-.77.28,3.24.82,4.92-1.17,7.66-2.19a7.47,7.47,0,0,0-1.42,1.65C13.5,7.92,16.4,6.51,18.85,8Z" />
                    <path class="cls-1"
                        d="M18.49,8.22A2,2,0,0,0,16,8.31c-.48.47-.29.92-.55,1.48-.57,1.27-1.88.63-2.46,1.69a.84.84,0,0,0,.84.35,1.46,1.46,0,0,1,0-.3s.07.09.07.08a3.19,3.19,0,0,0-.33-.25c.76-.69,1.33.53,2.19.09s.3-1.53,1.17-1.92a3.21,3.21,0,0,0-.31,1.56c1.82.39.09-3.24,2.41-2.75Z" />
                    <path class="cls-1"
                        d="M16,7.73c-1,.6-.73,1.36-1.31,2.15s-1.49.41-2.07,1A4.86,4.86,0,0,1,13.34,9c.4-.46,1.12-.59,1.6-1a1.85,1.85,0,0,0-.62,1.19,2.15,2.15,0,0,1,1.3-1.18Z" />
                    <path class="cls-1"
                        d="M12.47,9.34c-.72.9-.18,1.81-.5,2.66s-1.16,1.05-1.36,1.83a3.85,3.85,0,0,1,.74-3.9,2.32,2.32,0,0,0-.17,1.63,4.07,4.07,0,0,1,1.29-2.22Z" />
                    <path class="cls-1"
                        d="M10.78,9.42A22.07,22.07,0,0,0,8.3,11c-.88.65-.77,1.42-.9,2.39C9.38,13,10,11,11.11,9.45c-.62.65-1.46,1.17-2,1.83.32-.57.84-1,1.17-1.54Z" />
                    <path class="cls-1"
                        d="M7.55,10.55a5.81,5.81,0,0,0-4.44,1.81c1.89.84,3.44-.55,4.83-1.64-.55.23-1.27.11-1.81.4a9,9,0,0,1,2-.57Z" />
                    <path class="cls-1"
                        d="M4.81,9.9c-1.19-.8-1.81-.16-3,.1,1.2,1.05,1.95.68,3.31.55a9.59,9.59,0,0,1-1-.57,3.09,3.09,0,0,0,1.26.08Z" />
                    <path class="cls-1"
                        d="M0,7.64A4.48,4.48,0,0,0,3,9.08c-.2-.17-.47-.4-.68-.61a1,1,0,0,1,.93,0A4.91,4.91,0,0,0,1.8,7.6,12.51,12.51,0,0,0,0,7.64Z" />
                </svg>
            </div>
            <div class="foot" data-aos="fade-up" data-aos-duration="1000">
                <a href="http://www.google.com/calendar/render?action=TEMPLATE&amp;text={{ $event->nama_panggilan_mempelai_wanita }}+%26+{{ $event->nama_panggilan_mempelai_pria }}+Wedding&amp;dates={{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('Ymd') }}T{{ \Carbon\Carbon::parse($event->jam_mulai_ijab)->format('His') }}/{{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('Ymd') }}T{{ \Carbon\Carbon::parse($event->jam_selesai_ijab)->format('His') }}&amp;location={{ $event->lokasi_ijab }}&amp;details=Hai+You%27re+invited+to+our+wedding+ceremony+%7C+{{ $event->nama_panggilan_mempelai_wanita }}+%26+{{ $event->nama_panggilan_mempelai_pria }}+Wedding+%7C+{{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('dddd') }}%2C+{{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM Y') }}"
                    target="_blank" rel="nofollow" id="addToCalendar">Tambah ke Kalender</a>
            </div>
            <div class="mount-left"></div>
            <div class="mount-center"></div>
            <div class="mount-right"></div>
        </div>
    </section>

    <section class="event-outer">
        <div class="inner">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 173.61 12.04" class="event-orn"
                data-aos="fade-down" data-aos-duration="1000">
                <path class="cls-1"
                    d="M166.24,6.43a3.25,3.25,0,0,0-3.17,2.05h-1.22a2.1,2.1,0,0,0-3.92,0H125.68L125.05,8a13.52,13.52,0,0,0-2.8-1.5,18.29,18.29,0,0,0-8.17-1,28.14,28.14,0,0,0-4.8.84c-.82.22-1.65.47-2.47.77s-1.66.65-2.44,1A13,13,0,0,1,99.65,9.1a4,4,0,0,1-2-.51,2.56,2.56,0,0,1-1.14-1.48A3.32,3.32,0,0,1,97.6,3.75,3.42,3.42,0,0,1,100.74,3a2.56,2.56,0,0,1,1.78,2,2,2,0,0,1-.08,1.15,1.59,1.59,0,0,1-.61.77,1.55,1.55,0,0,1-1.35.24,1.47,1.47,0,0,1-.45-.24,1.33,1.33,0,0,0,.43.3,1.66,1.66,0,0,0,1.48-.12,1.9,1.9,0,0,0,.79-.82,2.37,2.37,0,0,0,.21-1.34,3,3,0,0,0-.56-1.47A3,3,0,0,0,101,2.32,4.13,4.13,0,0,0,97,3a4.6,4.6,0,0,0-1.41,1.85c0,.09-.07.19-.1.28a4.78,4.78,0,0,1,.11-.73,19.26,19.26,0,0,1,1-3.1C97,.53,97.15,0,97.15,0A10.78,10.78,0,0,0,96,1a6.06,6.06,0,0,0-1.83,3,5,5,0,0,0,.89,3.83,6.8,6.8,0,0,0,.66.76h0a6.81,6.81,0,0,0-2.76-.65c-.6,0-1.23-.06-1.88-.13a5.8,5.8,0,0,1-1.9-.45A2.39,2.39,0,0,1,87.9,6.07a2.78,2.78,0,0,1-.05-1.93,2.11,2.11,0,0,1,1.27-1.29A2.87,2.87,0,0,1,91,2.79a2.32,2.32,0,0,1,1.3,1,1.73,1.73,0,0,1,.18,1.42,1.44,1.44,0,0,1-.85.9,1.29,1.29,0,0,1-1-.08A1.16,1.16,0,0,1,90,5.39v.06l0,.2a1.49,1.49,0,0,0,.45.65,1.69,1.69,0,0,0,1.26.37,2.07,2.07,0,0,0,1.47-1,2.59,2.59,0,0,0,.1-2.25,3.42,3.42,0,0,0-1.81-1.86,4.09,4.09,0,0,0-2.87-.13,3.54,3.54,0,0,0-1.38.81,2.67,2.67,0,0,0-.41.48,3.21,3.21,0,0,0-.42-.48A3.54,3.54,0,0,0,85,1.38a4.09,4.09,0,0,0-2.87.13,3.42,3.42,0,0,0-1.81,1.86,2.59,2.59,0,0,0,.1,2.25,2.07,2.07,0,0,0,1.47,1,1.69,1.69,0,0,0,1.26-.37,1.41,1.41,0,0,0,.45-.65l0-.2V5.39a1.26,1.26,0,0,1-.64.69,1.29,1.29,0,0,1-1,.08,1.4,1.4,0,0,1-.84-.9,1.69,1.69,0,0,1,.17-1.42,2.31,2.31,0,0,1,1.31-1,2.84,2.84,0,0,1,1.84.06,2.08,2.08,0,0,1,1.27,1.29,2.73,2.73,0,0,1-.05,1.93,2.39,2.39,0,0,1-1.26,1.28,5.8,5.8,0,0,1-1.9.45c-.65.07-1.28.08-1.88.13a6.81,6.81,0,0,0-2.76.65h0a6.8,6.8,0,0,0,.66-.76A5,5,0,0,0,79.45,4a6.06,6.06,0,0,0-1.83-3,10.78,10.78,0,0,0-1.16-1s.17.53.49,1.34a19.26,19.26,0,0,1,1,3.1,4.78,4.78,0,0,1,.11.73c0-.09,0-.19-.09-.28A4.71,4.71,0,0,0,76.59,3a4.13,4.13,0,0,0-3.93-.72,3,3,0,0,0-1.43,1.1,3.14,3.14,0,0,0-.56,1.47,2.37,2.37,0,0,0,.21,1.34,2,2,0,0,0,.79.82,1.68,1.68,0,0,0,1.49.12,1.34,1.34,0,0,0,.42-.3,1.48,1.48,0,0,1-.44.24,1.57,1.57,0,0,1-1.36-.24,1.59,1.59,0,0,1-.61-.77A2.1,2.1,0,0,1,71.09,5a2.56,2.56,0,0,1,1.78-2A3.42,3.42,0,0,1,76,3.75a3.32,3.32,0,0,1,1.11,3.36A2.56,2.56,0,0,1,76,8.59a4,4,0,0,1-2,.51A13,13,0,0,1,69.24,8c-.78-.31-1.61-.67-2.44-1s-1.65-.55-2.46-.77a28.42,28.42,0,0,0-4.81-.84,18.29,18.29,0,0,0-8.17,1A13.79,13.79,0,0,0,48.56,8l-.63.49H15.68a2.1,2.1,0,0,0-3.92,0H10.54A3.25,3.25,0,0,0,7.37,6.43C5.54,6.43,0,9.23,0,9.23S5.54,12,7.37,12A3.26,3.26,0,0,0,10.54,10h1.22a2.09,2.09,0,0,0,3.92,0H70.87a10.66,10.66,0,0,0,3.14.4,5.74,5.74,0,0,0,2.06-.45h.05c.2,0,.42-.06.68-.07a19.11,19.11,0,0,1,3.78.1,17.56,17.56,0,0,1,2,.38,8.5,8.5,0,0,1,1.57.59l.32.16.26.16.24.15.19.14.36.27s-.06-.14-.2-.41c0-.06-.07-.14-.12-.22L85,10.93l-.21-.27c-.08-.1-.18-.18-.27-.28A6,6,0,0,0,83,9.27a7.63,7.63,0,0,0-1-.4l.64.05A6.62,6.62,0,0,0,85,8.63a4.28,4.28,0,0,0,1.24-.7,3.55,3.55,0,0,0,.61-.67,3.2,3.2,0,0,0,.6.67,4.41,4.41,0,0,0,1.24.7A6.65,6.65,0,0,0,91,8.92l.64-.05a7.63,7.63,0,0,0-1,.4,6,6,0,0,0-1.57,1.11c-.09.1-.19.18-.27.28l-.2.27-.18.24c-.05.08-.08.16-.12.22-.14.27-.2.41-.2.41l.36-.27.19-.14.24-.15.26-.16.32-.16A9.08,9.08,0,0,1,91,10.33,17.56,17.56,0,0,1,93,10a19.19,19.19,0,0,1,3.79-.1c.25,0,.47.05.67.07h.05a5.74,5.74,0,0,0,2.06.45,10.66,10.66,0,0,0,3.14-.4h55.19a2.09,2.09,0,0,0,3.92,0h1.22A3.26,3.26,0,0,0,166.24,12c1.83,0,7.37-2.81,7.37-2.81S168.07,6.43,166.24,6.43ZM7.09,10.64A20.91,20.91,0,0,1,2.67,9.23a21,21,0,0,1,4.42-1.4c1.1,0,2,.63,2,1.4S8.19,10.64,7.09,10.64ZM48.8,8.35a13.33,13.33,0,0,1,2.78-1.23,18.74,18.74,0,0,1,7.83-.53,30.69,30.69,0,0,1,4.58,1c.79.22,1.57.48,2.36.77l.42.16H48.58Zm60.82-.8a30.69,30.69,0,0,1,4.58-1,18.74,18.74,0,0,1,7.83.53,13.43,13.43,0,0,1,2.79,1.23l.21.13H106.84l.42-.16C108.05,8,108.84,7.77,109.62,7.55Zm54.92,1.68c0-.77.89-1.4,2-1.4A21.15,21.15,0,0,1,171,9.23a21,21,0,0,1-4.43,1.41C165.43,10.64,164.54,10,164.54,9.23Z" />
            </svg>
            <div class="head">
                <h1 data-aos="zoom-in" data-aos-duration="1000">The Wedding Day</h1>
                <p data-aos="fade-up" data-aos-duration="1000">Save The Date </p>
            </div>
            <div class="body">
                <div class="event">
                    <div class="activities">
                        <div class="activity">
                            <div class="title">
                                <img src="{{ asset('template-7/media/template/icons/gold/01.png') }}" class="party"
                                    data-aos="fade-up" data-aos-duration="1500" data-aos-delay="200">
                                <h1 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">Akad Nikah</h1>
                                <h2 class="activity-time" data-aos="fade-up" data-aos-duration="1000">
                                    {{ \Carbon\Carbon::parse($event->tanggal_ijab)->formatLocalized('%A') }}</h2>
                                <p data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="200">
                                    {{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM, Y') }}</p>
                                <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
                                    {{ \Carbon\Carbon::parse($event->jam_mulai_ijab)->format('H:i') }} -
                                    {{ \Carbon\Carbon::parse($event->jam_selesai_ijab)->format('H:i') }}</p>
                            </div>
                            <div class="details">
                                <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                                    {{ $event->lokasi_ijab }}</p>
                                <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="700"><a
                                        href="{{ $event->gm_ijab }}" class="link" target="_blank">View Maps</a>
                                </div>
                            </div>
                        </div>
                        <div class="activity">
                            <div class="title">
                                <img src="{{ asset('template-7/media/template/icons/gold/02.png') }}" class="party"
                                    data-aos="fade-up" data-aos-duration="1500" data-aos-delay="200">
                                <h1 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">Resepsi</h1>
                                <h2 class="activity-time" data-aos="fade-up" data-aos-duration="1000">
                                    {{ \Carbon\Carbon::parse($event->tanggal_resepsi)->formatLocalized('%A') }}</h2>
                                <p data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="200">
                                    {{ \Carbon\Carbon::parse($event->tanggal_resepsi)->isoFormat('D MMMM, Y') }}</p>
                                <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
                                    {{ \Carbon\Carbon::parse($event->jam_mulai_resepsi)->format('H:i') }} -
                                    {{ \Carbon\Carbon::parse($event->jam_selesai_resepsi)->format('H:i') }}</p>
                            </div>
                            <div class="details">
                                <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                                    {{ $event->lokasi_resepsi }}</p>
                                <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="700"><a
                                        href="{{ $event->gm_resepsi }}" class="link" target="_blank">View Maps</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="event-line" data-aos="fade-up" data-aos-duration="1500"></div>
        </div>
    </section>
    @if (
        $event->order->orderDetail->product_id == 2 ||
            $event->order->orderDetail->product_id == 3 ||
            $event->order->orderDetail->product_id == 4)
        @if (count($photo_event) > 0)
            <section class="gallery">
                <div class="title" data-aos="zoom-out" data-aos-duration="1000">
                    <h1 data-aos="fade-up" data-aos-duration="1000">Galeri Foto</h1>
                </div>
                <div class="flexbin lightGallery" id="lightGallery">
                    @foreach ($photo_event as $gallery)
                        <a data-aos="zoom-in" data-aos-duration="1000" href="{{ asset($gallery['path']) }}"
                            target="_blank">
                            <img src="{{ asset($gallery['path']) }}">
                        </a>
                    @endforeach
                </div>
            </section>
        @endif
    @endif

    @if ($event->order->orderDetail->product_id == 3 || $event->order->orderDetail->product_id == 4)
        @if (isset($invite->kode_qr))
            <section class="gift">
                <div class="gift-inner">
                    <div class="gift-title">
                        <h1 data-aos="fade-up" data-aos-duration="1000" class="aos-init aos-animate">QR Code</h1>
                        <p data-aos="zoom-in-down" data-aos-duration="1000" class="aos-init aos-animate">Simpan QR
                            Code ini untuk ditunjukkan pada saat isi buku tamu.</p>
                    </div>
                    <div class="general-qrcode aos-init aos-animate" data-aos="zoom-in" data-aos-duration="1000">
                        <div class="img-qrcode">
                            <img src="data:image/png;base64, {!! base64_encode(
                                QrCode::format('png')->style('round')->merge('/public/img/logo-hoofey-bg-white.png', 0.3)->errorCorrection('H')->size(300)->generate($invite->kode_qr ?? 'https://hoofey.id/'),
                            ) !!} ">
                        </div>
                        <div class="gift-form aos-init aos-animate" data-aos="zoom-in" data-aos-duration="1000"
                            style="margin-top: 24px;">
                            <div class="gift-details">
                                <a href="{{ route('export.pdf', $invite->id ?? '') }}" target="_blank" class="gift-submit"
                                    style="text-decoration: none;">Simpan <i class="fas fa-download"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endif

    @if (count($event->angpao) > 0)
        <section class="gift">
            <div class="gift-inner">
                <div class="gift-title">
                    <h1 data-aos="fade-up" data-aos-duration="1000" class="aos-init aos-animate">Wedding Gift</h1>
                    <p data-aos="zoom-in-down" data-aos-duration="1000" class="aos-init aos-animate">Your presence is
                        more important to us than anything. However, if
                        you would like to give us a gift we provide a digital envelope to
                        make it easier for you.</p>
                </div>
                <div class="gift-form aos-init aos-animate" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="gift-details">
                        <div class="bank-detail">
                            <div class="form-group">
                                <label class="form-label center">Choose destination bank</label>
                                <select name="choose_bank" class="form-control selectized" tabindex="-1"
                                    style="display: none;">
                                    <option value="118" selected="selected">BANK BCA</option>
                                </select>
                            </div>
                            <div class="saving-books">
                                @forelse ($event->angpao as $angpao)
                                    <div class="book" data-book="{{ $angpao->id ?? '' }}" style="display: block;">
                                        <p>{{ $angpao->nama_bank ?? '' }}</p>
                                        <p>
                                            No. Rekening :
                                            <span>
                                                <strong><span
                                                        class="account-number">{{ $angpao->no_rekening ?? '' }}</span></strong>
                                                <i class="fas fa-copy copy-account" title="Copy number account"></i>
                                            </span>
                                        </p>
                                        <p>
                                            Pemilik Rekening :
                                            <span>
                                                <strong>{{ $angpao->nama_penerima ?? '' }}</strong>
                                            </span>
                                        </p>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>

                                <a data-id="{{ $event->order->customer_phone }}" data-value="Hai {{ $event->nama_panggilan_mempelai_pria }}, aku udah transfer nih ke Bank {{ $angpao->nama_bank ?? '' }} atas nama {{ $angpao->nama_penerima ?? '' }}. Selamat yah!"
                                    class="gift-submit send_gift" style="text-decoration: none;">Konfirmasi <i
                                        class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="comment-outer">
        <div class="comment-inner">
            <div class="head">
                <h1>Wedding Wish</h1>
            </div>
            <form action="{{ route('wishes', ['id' => $event->id]) }}" autocomplete="off" method="POST"
                class="comment-form">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Nama"
                        data-aos="fade-down" data-aos-duration="1000">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email"
                        data-aos="fade-down" data-aos-duration="1000">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="text" rows="1" placeholder="Berikan ucapan..."
                        style="max-height: 350px;" data-aos="fade-down" data-aos-duration="1000"></textarea>
                </div>
                <button data-aos="fade-up" data-aos-duration="1000" class="send-comment">Kirim</button>
            </form>
            <div class="comments">
                @foreach ($data_guestbook as $guestbook)
                    <div class="comment aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                        <div class="comment-head">
                            <p><strong>{{ $guestbook->name }}</strong></p>
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
            <div class="foot" data-aos="fade-up" data-aos-duration="1000">
            </div>
        </div>
    </section>

    <section class="footnote">
        <div class="inner">

            <div class="details">
                <h1 data-aos="zoom-in" data-aos-duration="1500"> {{ $event->nama_panggilan_mempelai_wanita }} &amp;
                    {{ $event->nama_panggilan_mempelai_pria }}</h1>
                <p class="date" data-aos="fade-up" data-aos-duration="1000">
                    {{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM, Y') }}</p>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44.1 13.83" class="foot-orn-01"
                    data-aos="fade-up" data-aos-duration="1500">
                    <path class="cls-1"
                        d="M22.05,5.17a2.9,2.9,0,0,0-2.11.37c-.52.39-.74,1.08-1.26,1.5.4,0,.81-.38,1.09-.6a1.08,1.08,0,0,0-.33,1.33,1.46,1.46,0,0,1-.09,1.51,2.16,2.16,0,0,0,1.21-1.87,2.22,2.22,0,0,1,1.24-1.9c-1.36,0-1.29,1.73-1.68,2.59,0-.65-.27-1.37.09-2a2.37,2.37,0,0,1,1.94-.93Z" />
                    <path class="cls-1"
                        d="M22,4.82a3.35,3.35,0,0,0-2.58.65C18.85,6,17.74,6.69,17,6c.72-.12,1-1.07,1.62-1.4a4.14,4.14,0,0,1,2.16-.22,4,4,0,0,0-2.68,1.3s0,0,0,0,0,0,0,0c.81,0,1.18-.41,1.81-.8a2.4,2.4,0,0,1,1.88-.13Z" />
                    <path class="cls-1"
                        d="M21.8,4.33c-.55-.63-1.38-.5-2.13-.7s-1.11-.77-1.79-.92c.48-.7,1.55-.51,2.29-.35a2.1,2.1,0,0,1,1.62,1.56,1.6,1.6,0,0,0-1.53-.54c.63.18,1.16.26,1.52.83Z" />
                    <path class="cls-1"
                        d="M22.31,4.08C22.21,3,22,2,23,1.29c.75-.47,1.55-.2,2.35-.17-.57.59-.39,1.42-1,2s-1.31.58-1.86,1a2.27,2.27,0,0,1,.85-1.81,1.57,1.57,0,0,0-1,1.22Z" />
                    <path class="cls-1"
                        d="M22.79,4.35a1.58,1.58,0,0,1,2.58.37c.39.82-.34,1.48-.08,2.33a19.17,19.17,0,0,1-1.6-1.12c-.26-.19-.6-.29-.78-.55s-.14-.53-.21-.8c.53.69,1.21.36,1.9.44-.5-.5-1.28-.23-1.81-.67Z" />
                    <path class="cls-1"
                        d="M22.52,5.22a1.89,1.89,0,0,1,.24,2.23c-.41.68-.93,1-1,1.9a2.61,2.61,0,0,1,.38-3.56c-.25.38-.61,1.18-.2,1.69a9.8,9.8,0,0,1,.46-1.29,1.55,1.55,0,0,0-.2-1.14Z" />
                    <path class="cls-1"
                        d="M23.37,6c.45.31,1.13.62,1.34,1.11a1.31,1.31,0,0,1-.3,1.39c-.34.24-.89-.16-1.16-.42-.51-.5.11-.61.13-1.19.26.19.73.42.72.72.12-.61-.37-1.22-.7-1.65Z" />
                    <path class="cls-1"
                        d="M27,3.38c-.27.4-.68,1.1-1.24,1.12a1.81,1.81,0,0,0-1.37-1c.64-.23,1.24.31,1.8,0h0c-.49-.08-.92-.62-1.45-.42.34-.19.52-.52.93-.53C25.8,2.62,27.1,3.18,27,3.38Z" />
                    <path class="cls-1"
                        d="M21.86,3.21a1.54,1.54,0,0,0-.48-.84c-.23-.18-.52-.17-.75-.35A1.42,1.42,0,0,1,20.36.49C20.59-.22,21,0,21.6.23a1.78,1.78,0,0,1,1,1.06c-.3.19-.48.33-.48.71a2.14,2.14,0,0,1-.9-.51c.1.64.8,1,.62,1.72Z" />
                    <path class="cls-1"
                        d="M25,7.49a7.4,7.4,0,0,1,6.65-.7c1.66.66,2.79,2.15,4.6,2.39,1.27.17,3.1-.3,3.48-1.69.59-2.2-2.39-1.14-1.3-.47a4.13,4.13,0,0,0,.25-.48,1,1,0,0,1,.57.12c.07,1.21-1.74,2-2.76,1.8A13.25,13.25,0,0,1,33.24,7.1C31,6,28.26,5.65,26.1,6.76Z" />
                    <path class="cls-1"
                        d="M25.49,7.73a5.37,5.37,0,0,1,5.32-.36c1.39.51,2.38,1.67,3.75,2.18a5.39,5.39,0,0,0,4.36-.34c.94-.64,2.48-2.3,1.44-3.41.87-.93,1.23.7,1,1.35A4.08,4.08,0,0,1,39.75,9a2.65,2.65,0,0,0,1.33-.41c-.86,1-2,1.05-3.09,1.4.26.06.5.21.77.28-3.24.82-4.92-1.17-7.66-2.19a7.74,7.74,0,0,1,1.42,1.65C30.6,7.92,27.7,6.51,25.25,8Z" />
                    <path class="cls-1"
                        d="M25.61,8.22a2,2,0,0,1,2.45.09c.48.47.29.92.54,1.48.58,1.27,1.89.63,2.47,1.69a.85.85,0,0,1-.84.35,2.83,2.83,0,0,0,0-.3s-.07.09-.07.08a3.19,3.19,0,0,1,.33-.25c-.76-.69-1.33.53-2.19.09S28,9.92,27.11,9.53a3.2,3.2,0,0,1,.3,1.56c-1.81.39-.08-3.24-2.4-2.75Z" />
                    <path class="cls-1"
                        d="M28.08,7.73c1.05.6.73,1.36,1.31,2.15s1.49.41,2.06,1A4.69,4.69,0,0,0,30.76,9c-.4-.46-1.12-.59-1.6-1a1.9,1.9,0,0,1,.62,1.19,2.15,2.15,0,0,0-1.3-1.18Z" />
                    <path class="cls-1"
                        d="M31.63,9.34c.72.9.17,1.81.5,2.66s1.16,1.05,1.36,1.83a3.85,3.85,0,0,0-.74-3.9,2.37,2.37,0,0,1,.16,1.63,4,4,0,0,0-1.28-2.22Z" />
                    <path class="cls-1"
                        d="M33.32,9.42A23,23,0,0,1,35.8,11c.87.65.77,1.42.9,2.39C34.71,13,34.06,11,33,9.45c.62.65,1.45,1.17,2,1.83-.32-.57-.84-1-1.17-1.54Z" />
                    <path class="cls-1"
                        d="M36.55,10.55A5.81,5.81,0,0,1,41,12.36c-1.89.84-3.44-.55-4.84-1.64.56.23,1.27.11,1.82.4a9,9,0,0,0-2-.57Z" />
                    <path class="cls-1"
                        d="M39.29,9.9c1.19-.8,1.81-.16,3,.1-1.19,1.05-1.94.68-3.31.55A8,8,0,0,0,40,10a3.09,3.09,0,0,1-1.26.08Z" />
                    <path class="cls-1"
                        d="M44.1,7.64a4.51,4.51,0,0,1-3,1.44c.21-.17.48-.4.69-.61a1,1,0,0,0-.93,0A4.79,4.79,0,0,1,42.3,7.6,12.56,12.56,0,0,1,44.1,7.64Z" />
                    <path class="cls-1"
                        d="M19.09,7.49a7.4,7.4,0,0,0-6.65-.7c-1.66.66-2.79,2.15-4.6,2.39-1.28.17-3.11-.3-3.48-1.69C3.77,5.29,6.74,6.35,5.66,7c0-.14-.19-.27-.26-.48a1,1,0,0,0-.56.12c-.08,1.21,1.74,2,2.76,1.8A13.25,13.25,0,0,0,10.86,7.1,8.21,8.21,0,0,1,18,6.76Z" />
                    <path class="cls-1"
                        d="M18.61,7.73a5.39,5.39,0,0,0-5.33-.36C11.9,7.88,10.9,9,9.53,9.55a5.37,5.37,0,0,1-4.35-.34c-.94-.64-2.49-2.3-1.44-3.41-.88-.93-1.23.7-1,1.35A4.08,4.08,0,0,0,4.35,9,2.65,2.65,0,0,1,3,8.6c.86,1,2,1.05,3.09,1.4-.26.06-.5.21-.77.28,3.24.82,4.92-1.17,7.66-2.19a7.47,7.47,0,0,0-1.42,1.65C13.5,7.92,16.4,6.51,18.85,8Z" />
                    <path class="cls-1"
                        d="M18.49,8.22A2,2,0,0,0,16,8.31c-.48.47-.29.92-.55,1.48-.57,1.27-1.88.63-2.46,1.69a.84.84,0,0,0,.84.35,1.46,1.46,0,0,1,0-.3s.07.09.07.08a3.19,3.19,0,0,0-.33-.25c.76-.69,1.33.53,2.19.09s.3-1.53,1.17-1.92a3.21,3.21,0,0,0-.31,1.56c1.82.39.09-3.24,2.41-2.75Z" />
                    <path class="cls-1"
                        d="M16,7.73c-1,.6-.73,1.36-1.31,2.15s-1.49.41-2.07,1A4.86,4.86,0,0,1,13.34,9c.4-.46,1.12-.59,1.6-1a1.85,1.85,0,0,0-.62,1.19,2.15,2.15,0,0,1,1.3-1.18Z" />
                    <path class="cls-1"
                        d="M12.47,9.34c-.72.9-.18,1.81-.5,2.66s-1.16,1.05-1.36,1.83a3.85,3.85,0,0,1,.74-3.9,2.32,2.32,0,0,0-.17,1.63,4.07,4.07,0,0,1,1.29-2.22Z" />
                    <path class="cls-1"
                        d="M10.78,9.42A22.07,22.07,0,0,0,8.3,11c-.88.65-.77,1.42-.9,2.39C9.38,13,10,11,11.11,9.45c-.62.65-1.46,1.17-2,1.83.32-.57.84-1,1.17-1.54Z" />
                    <path class="cls-1"
                        d="M7.55,10.55a5.81,5.81,0,0,0-4.44,1.81c1.89.84,3.44-.55,4.83-1.64-.55.23-1.27.11-1.81.4a9,9,0,0,1,2-.57Z" />
                    <path class="cls-1"
                        d="M4.81,9.9c-1.19-.8-1.81-.16-3,.1,1.2,1.05,1.95.68,3.31.55a9.59,9.59,0,0,1-1-.57,3.09,3.09,0,0,0,1.26.08Z" />
                    <path class="cls-1"
                        d="M0,7.64A4.48,4.48,0,0,0,3,9.08c-.2-.17-.47-.4-.68-.61a1,1,0,0,1,.93,0A4.91,4.91,0,0,0,1.8,7.6,12.51,12.51,0,0,0,0,7.64Z" />
                </svg>
            </div>
            <div class="mount-left-01"></div>
            <div class="mount-left-02"></div>
            <div class="mount-right-01"></div>
            <div class="mount-right-02"></div>
        </div>
    </section>

    <section class="footer">
        <div class="footer-inner">
            <p style="color: #FFFFFF !important">Powered by</p>
            <img src="{{ asset('img/logo-hoofey-light.png') }}">
        </div>
    </section>

    <section class="music-outer" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
        <div class="music-box auto" id="music-box"></div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript">
        window.MUSIC = {
            'url': "{{ asset('admin/assets/audio/' . $event->audio->path ?? '') }}",
            'box': '#music-box'
        };

        window.EVENT = {{ strtotime($event->tanggal_ijab) }};

        window.BOOKS = [
            @forelse ($event->angpao as $angpao)
                {
                    "id": {{ $angpao->id ?? '' }},
                    "title": "{{ $angpao->nama_bank ?? '' }}",
                    "credential": "{{ $angpao->no_rekening ?? '' }}"
                },
            @empty @endforelse
        ];

        const img_main_desktop = [];
        const img_main_mobile = [];
        const img_opening_desktop = [];
        const img_opening_mobile = [];
        @foreach ($photo_event as $gallery)
            img_main_desktop.push(
                `<div class="picture desktop"><img src="{{ asset($gallery['path']) }}"> </div>`);
            img_main_mobile.push(
                `<div class="picture mobile"><img src="{{ asset($gallery['path']) }}"> </div>`)
            img_opening_desktop.push(
                `<div class="picture desktop"><img src="{{ asset($gallery['path']) }}" class="picture"> </div>`);
            img_opening_mobile.push(
                `<div class="picture mobile"><img src="{{ asset($gallery['path']) }}" class="picture"> </div>`)
        @endforeach

        window.COVERS = [{
                'position': 'MAIN',
                'details': {
                    'desktop': img_main_desktop,
                    'mobile': img_main_mobile
                },
                'element': '#cover-main'
            },
            {
                'position': 'OPENING',
                'details': {
                    'desktop': img_opening_desktop,
                    'mobile': img_opening_mobile
                },
                'element': '#cover-opening'
            }
        ];

        $(document).ready(function() {
            var documentHeight = $('.top-cover').css('height');
            $('body').css('--body-height', documentHeight);
        });

        var Gift = $('.send_gift').on('click', function(){
            let no_hp = $(this).data('id');
            let message = $(this).data('value');
            message = encodeURIComponent(message);
            let phone = no_hp.substr(0,1);
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


    <script src="{{ asset('template-7/src/jquery.js') }}"></script>
    <script src="{{ asset('template-7/plugin/aos/dist/aos.js') }}"></script>
    <script src="{{ asset('template-7/plugin/slick/slick.min.js') }}"></script>
    <script src="{{ asset('template-7/plugin/selectize/dist/js/standalone/selectize.min.js') }}"></script>
    <script src="{{ asset('template-7/plugin/modal-video/js/jquery-modal-video.min.js') }}"></script>
    <script src="{{ asset('template-7/plugin/lightgallery/dist/js/lightgallery.min.js') }}"></script>
    <script src="{{ asset('template-7/src/universal.js') }}"></script>
    <script src="{{ asset('template-7/src/template/template.js') }}"></script>
</body>

</html>
