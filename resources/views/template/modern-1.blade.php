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
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
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
    <link rel="stylesheet" href="{{ asset('template-7/src/template/theme-1.css') }}">
</head>

<body class="hany-sigit original" data-template="chitra">


    <section class="kat-page__side-to-side">

        <section class="primary-pane">
            <div class="inner">
                <div class="details">
                    <h1 data-aos="zoom-out" data-aos-duration="1200" class="aos-init aos-animate">
                        {{ $event->nama_panggilan_mempelai_wanita ?? 'Hawa' }} &
                        {{ $event->nama_panggilan_mempelai_pria ?? 'Adam' }}
                    </h1>
                    @if (isset($invite->name))
                        <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100"
                            class="aos-init aos-animate">Hai {{ $invite->name }}</p>
                    @endif
                </div>
                <div class="highlight" data-aos="zoom-out" data-aos-duration="1000">
                    <div class="preview-container cover-show" id="cover-pane">
                    </div>
                </div>
            </div>
        </section>

        <section class="secondary-pane">
            <section class="top-cover">
                <div class="inner">
                    <div class="details">
                        <h1 data-aos="zoom-out" data-aos-duration="1200" class="aos-init aos-animate">
                            {{ $event->nama_panggilan_mempelai_wanita ?? 'Hawa' }} &
                            {{ $event->nama_panggilan_mempelai_pria ?? 'Adam' }}
                        </h1>
                        @if (isset($invite->name))
                            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100"
                                class="aos-init aos-animate">Hai {{ $invite->name }}</p>
                        @endif
                        <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400"
                            class="aos-init aos-animate">
                            <a href="javascript:;" onclick="startTheJourney()" class="link" id="startToExplore">Open
                                Invitation</a>
                        </div>
                    </div>
                    <div class="highlight" data-aos="zoom-out" data-aos-duration="1000">
                        <div class="preview-container cover-show" id="cover-opening">
                        </div>
                    </div>
                </div>
            </section>

            <section class="cover-wrapper">
                <div class="cover-inner">
                    <div class="cover-picture-wrap">
                        <div class="cover-picture-slider cover-show" id="cover-main">
                        </div>
                    </div>
                    <div class="cover-details" data-aos="zoom-in" data-aos-duration="1000">
                        <p class="top-text" data-aos="fade-up" data-aos-duration="1200">WEDDING INVITATION</p>
                        <h1 class="prime-title" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="100">
                            {{ $event->nama_panggilan_mempelai_wanita ?? 'Hawa' }} &
                            {{ $event->nama_panggilan_mempelai_pria ?? 'Adam' }}</h1>
                        <p class="save-date-event" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                            @php
                            $now = \Carbon\Carbon::now();
                            @endphp
                            @if($event->tanggal_ijab > $now)
                                {{ $event->tanggal_ijab ? \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM, Y') : '24-11-2024' }}
                            @else
                                {{ $event->tanggal_resepsi ? \Carbon\Carbon::parse($event->tanggal_resepsi)->isoFormat('D MMMM, Y') : '24-11-2024' }}
                            @endif
                        </p>
                    </div>
                </div>
            </section>

            <section class="couple-wrap">
                <div class="couple">
                    <div class="texture-outer top bottom" data-aos="zoom-out" data-aos-duration="1000">
                        <div class="background"></div>
                    </div>
                    <div class="couple-head">
                        <!-- <h1 class="couple-title" data-aos="zoom-in" data-aos-duration="1000">The Wedding Of</h1> -->
                        @if (isset($event->textSection->title))
                            <p class="couple-description" data-aos="fade-up" data-aos-duration="1000">
                                {!! nl2br(e($event->textSection->title ?? 'The Wedding Of'),
                                ) !!}</p>
                        @endif
                    </div>
                    <div class="couple-body bride-first show-picture">
                        <div class="couple-info groom">
                            <div class="couple-preview-wrap">
                                <div class="couple-preview lightgallery" data-aos="zoom-in" data-aos-duration="1500"
                                    data-aos-once="false">
                                    <a class="img-wrap"
                                        href="{{ asset('admin/assets/images/pria/' . $event->order->invoice . '/' . $event->avatar_pria) }}"
                                        target="_blank">
                                        <img class="img"
                                            src="{{ asset('admin/assets/images/pria/' . $event->order->invoice . '/' . $event->avatar_pria) }}"
                                            alt>
                                    </a>
                                </div>
                                <div class="texture-outer top bottom" data-aos="zoom-in-right"
                                    data-aos-duration="1500" data-aos-delay="300" data-aos-once="false">
                                    <div class="orn-bunga-couple kiri"></div>
                                </div>
                                <div class="texture-outer top bottom" data-aos="zoom-in-left"
                                    data-aos-duration="1500" data-aos-delay="300" data-aos-once="false">
                                    <div class="orn-daun kanan"></div>
                                </div>
                            </div>
                            <div class="couple-details">
                                <h2 class="couple-name" data-aos="fade-up" data-aos-duration="1000">
                                    {{ $event->nama_lengkap_mempelai_pria }}</h1>
                                    <p class="couple-parents" data-aos="fade-up" data-aos-duration="1000">
                                        {!! nl2br(e($event->bio_mempelai_pria ?? '')) !!}</p>
                            </div>
                        </div>
                        <div class="separator-wrap">
                            <div class="separator" data-aos="zoom-in" data-aos-duration="1500">
                                <h2 class="couple-separator">&amp;</h2>
                            </div>
                        </div>
                        <div class="couple-info bride">
                            <div class="couple-preview-wrap">
                                <div class="couple-preview lightgallery" data-aos="zoom-in" data-aos-duration="1500"
                                    data-aos-once="false">
                                    <a class="img-wrap"
                                        href="{{ asset('admin/assets/images/wanita/' . $event->order->invoice . '/' . $event->avatar_wanita) }}"
                                        target="_blank">
                                        <img class="img"
                                            src="{{ asset('admin/assets/images/wanita/' . $event->order->invoice . '/' . $event->avatar_wanita) }}"
                                            alt>
                                    </a>
                                </div>
                                <div class="texture-outer top bottom" data-aos="zoom-in-left"
                                    data-aos-duration="1500" data-aos-delay="300" data-aos-once="false">
                                    <div class="orn-bunga-couple kanan"></div>
                                </div>
                                <div class="texture-outer top bottom" data-aos="zoom-in-right"
                                    data-aos-duration="1500" data-aos-delay="300" data-aos-once="false">
                                    <div class="orn-daun kiri"></div>
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
                <div class="texture-outer top bottom" data-aos="zoom-out" data-aos-duration="1000">
                    <div class="background"></div>
                </div>
                <div class="save-date" data-aos="zoom-out" data-aos-duration="1200">
                    <div class="save-date-head">
                        <h1 class="save-date-title" data-aos="zoom-in" data-aos-duration="1000">Save The Date</h1>
                    </div>
                    <div class="save-date-body">
                        <div class="countdown">
                            <div class="count-item" data-aos="fade-up" data-aos-duration="1200"
                                data-aos-delay="100">
                                <h2 class="count-num count-day" id="days">12</h2>
                                <small class="count-text">Days</small>
                            </div>
                            <div class="count-item" data-aos="fade-up" data-aos-duration="1200"
                                data-aos-delay="300">
                                <h2 class="count-num count-hour" id="hours">7</h2>
                                <small class="count-text">Hours</small>
                            </div>
                            <div class="count-item" data-aos="fade-up" data-aos-duration="1200"
                                data-aos-delay="500">
                                <h2 class="count-num count-minute" id="minutes">3</h2>
                                <small class="count-text">Minutes</small>
                            </div>
                            <div class="count-item" data-aos="fade-up" data-aos-duration="1200"
                                data-aos-delay="700">
                                <h2 class="count-num count-second" id="seconds">42</h2>
                                <small class="count-text">Seconds</small>
                            </div>
                        </div>
                    </div>
                    <div class="add-to-calendar-wrap" data-aos="fade-up" data-aos-duration="1000"
                        data-aos-delay="1100">
                        <a class="add-to-calendar"
                            href="http://www.google.com/calendar/render?action=TEMPLATE&amp;text={{ $event->nama_panggilan_mempelai_wanita }}+%26+{{ $event->nama_panggilan_mempelai_pria }}+Wedding&amp;dates={{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('Ymd') }}T{{ \Carbon\Carbon::parse($event->jam_mulai_ijab)->format('His') }}/{{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('Ymd') }}T{{ \Carbon\Carbon::parse($event->jam_selesai_ijab)->format('His') }}&amp;location={{ $event->lokasi_ijab }}&amp;details=Hai+You%27re+invited+to+our+wedding+ceremony+%7C+{{ $event->nama_panggilan_mempelai_wanita }}+%26+{{ $event->nama_panggilan_mempelai_pria }}+Wedding+%7C+{{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('dddd') }}%2C+{{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM Y') }}"
                            target="_blank" rel="nofollow" id="addToCalendar">
                            Add to Calendar </a>
                    </div>
                </div>
            </section>

            <section class="agenda-wrap">
                <div class="agenda-inner">
                    <div class="texture-outer top bottom" data-aos="zoom-out" data-aos-duration="1000">
                        <div class="background"></div>
                    </div>
                    <div class="agenda-head">
                        <h1 class="agenda-title" data-aos="zoom-in" data-aos-duration="1500">The Wedding Day</h1>
                        <p class="agenda-description" data-aos="fade-up" data-aos-duration="1200">Save The Date</p>
                    </div>
                    <div class="agenda-body">
                        <div class="event-item" data-aos="fade-up" data-aos-duration="1200">
                            <!-- <div class="event-head">
                                <h1 class="event-day" data-aos="fade-up" data-aos-duration="1000">
                                    {{ \Carbon\Carbon::parse($event->tanggal_ijab)->formatLocalized('%A') }}</h1>
                                <p class="event-date" data-aos="fade-up" data-aos-duration="1000">
                                    {{ $event->tanggal_ijab ? \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM, Y') : '24-11-2024' }}
                                </p>
                            </div> -->
                            <div class="event-content">
                                <div class="activity-wrap ">
                                    <div class="activity-item">
                                        <div class="activity-head">
                                            <img src="{{ asset('template-7/media/template/icons/cream/01.png') }}" alt="Wedding Icons"
                                                class="activity-icon"
                                                    data-aos="fade-up" data-aos-duration="1500" data-aos-delay="200">
                                            <h1 class="activity-title" data-aos="fade-up" data-aos-duration="1000">
                                                Akad Nikah</h1>
                                            <h1 class="event-day" data-aos="fade-up" data-aos-duration="1000">
                                                {{ \Carbon\Carbon::parse($event->tanggal_ijab)->formatLocalized('%A') }}</h1>
                                            <p class="event-date" data-aos="fade-up" data-aos-duration="1000">
                                                {{ $event->tanggal_ijab ? \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM, Y') : '24-11-2024' }}
                                            </p>
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
                                                    data-aos-duration="1000"><a href="{{ $event->gm_ijab }}"
                                                        class="activity-link" target="_blank">View Maps</a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="activity-item">
                                        <div class="activity-head">
                                        <img src="{{ asset('template-7/media/template/icons/cream/02.png') }}" alt="Wedding Icons"
                                                class="activity-icon"
                                                    data-aos="fade-up" data-aos-duration="1500" data-aos-delay="200">
                                            <h1 class="activity-title" data-aos="fade-up" data-aos-duration="1000">
                                                Resepsi</h1>
                                            <h1 class="event-day" data-aos="fade-up" data-aos-duration="1000">
                                                {{ \Carbon\Carbon::parse($event->tanggal_resepsi)->formatLocalized('%A') }}</h1>
                                            <p class="event-date" data-aos="fade-up" data-aos-duration="1000">
                                                {{ $event->tanggal_resepsi ? \Carbon\Carbon::parse($event->tanggal_resepsi)->isoFormat('D MMMM, Y') : '' }}
                                            </p>
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
                                                    data-aos-duration="1000"><a href="{{ $event->gm_resepsi }}"
                                                        class="activity-link" target="_blank">View Maps</a></div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @if ($event->order->orderDetail->product_id == 2 || $event->order->orderDetail->product_id == 3 || $event->order->orderDetail->product_id == 4)
                @if (count($photo_event) > 0)
                    <section class="gallery-wrap">
                        <div class="gallery-inner">
                            <div class="gallery-head">
                                <h1 class="gallery-title" data-aos="fade-up" data-aos-duration="1000">Photo Gallery
                                </h1>
                            </div>
                            <div class="gallery-body">
                                <div class="gallery-chitra__slider-wrap">
                                    <div class="gallery-chitra__slider-for" data-aos="fade-up"
                                        data-aos-duration="1200">
                                        @foreach ($photo_event as $gallery)
                                            <div class="gallery-chitra__slider-for__item">
                                                <div class="img-wrap">
                                                    <img src="{{ asset($gallery['path']) }}"
                                                        alt="{{ asset($gallery['path']) }}" class="img">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="gallery-chitra__slider-nav" data-aos="fade-up"
                                        data-aos-duration="1200">
                                        @foreach ($photo_event as $gallery)
                                            <div class="gallery-chitra__slider-nav__item" data-aos="fade-left"
                                                data-aos-duration="1000" data-aos-delay="0">
                                                <div class="img-wrap">
                                                    <img src="{{ asset($gallery['path']) }}"
                                                        alt="{{ asset($gallery['path']) }}" class="img">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
            @endif

            {{-- Barcode --}}
            @if ($event->order->orderDetail->product_id == 2 || $event->order->orderDetail->product_id == 3 || $event->order->orderDetail->product_id == 4)
                @if (isset($invite->kode_qr))
                    <section class="rsvp-wrap" id="rsvp" >
                        <div class="rsvp-inner">
                            <div class="rsvp-head">
                                <h1 class="rsvp-title" data-aos="fade-up" data-aos-duration="1000">QR Code
                                </h1>
                                <p class="rsvp-description" data-aos="fade-up" data-aos-duration="1200">SImpan QR Code
                                    ini untuk ditunjukkan pada saat isi buku tamu</p>
                            </div>
                            <div class="rsvp-body">
                                <div class="rsvp-chitra__qrcard-wrap">
                                    <div class="rsvp-chitra__qrcard-img-wrap aos-init aos-animate"
                                        data-aos="fade-up" data-aos-duration="1200">
                                        <img src="data:image/png;base64, {!! base64_encode(
                                                    QrCode::format('png')->style('round')->merge('/public/img/logo-hoofey-bg-white.png', 0.3)->errorCorrection('H')->size(300)->generate($invite->kode_qr ?? 'https://hoofey.id/'),
                                                ) !!} "
                                            alt="E-Invitation" class="rsvp-chitra__qrcard-img">
                                    </div>
                                    <div class="rsvp-chitra__confirm-wrap aos-init aos-animate" data-aos="fade-up"
                                        data-aos-duration="1200">
                                        <a href="{{ route('export.pdf', $invite->id ?? '') }}" target="_blank"
                                            class="rsvp-chitra__confirm-btn download" download="">Simpan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
            @endif

            @if (count($event->angpao) > 0)
                <section class="wedding-gift-wrap">
                    <div class="wedding-gift-inner">
                        <div class="wedding-gift-head">
                            <h1 class="wedding-gift-title aos-init aos-animate" data-aos="zoom-in"
                                data-aos-duration="1500">Wedding Gift</h1>
                            <p class="wedding-gift-description aos-init aos-animate" data-aos="fade-up"
                                data-aos-duration="1000">Your blessing and coming to our wedding are enough for us.
                                However, if you want to give a gift we provide a Digital Envelope to make it easier for you.
                                thank you</p>
                        </div>
                        <div class="wedding-gift-body">
                            <div class="wedding-gift-form">
                                    <div class="wedding-gift-details wedding-gift__first-slide wedding-gift-slide">

                                        <div class="wedding-gift-select-bank-wrap">
                                            <select name="select_bank" id="selectBank" class="form-control selectized"
                                                tabindex="-1" style="display: none;">
                                                <option value="2221" selected="selected">BANK BCA</option>
                                            </select>
                                        </div>

                                        <div class="wedding-gift-bank-wrap">
                                            @forelse ($event->angpao as $angpao)
                                            <div class="bank-item show" id="savingBook{{ $angpao->id ?? '' }}">
                                                <div class="bank-detail">
                                                    <h3 class="bank-name">{{ $angpao->nama_bank ?? '' }}</h3>
                                                    <div>
                                                        <small class="bank-account-number-label">Account Number</small>
                                                        <h4 class="bank-account-number" data-copy="{{ $angpao->no_rekening ?? '' }}">{{ $angpao->no_rekening ?? '' }} <i
                                                                class="fas fa-clone fa-flip-horizontal"></i></h4>
                                                    </div>
                                                    <div>
                                                        <small class="bank-account-name-label">Account Name</small>
                                                        <h4 class="bank-account-name">{{ $angpao->nama_penerima ?? '' }}</h4>
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
            <section class="wedding-wish-wrap" data-template="chitra">
                <div class="wedding-wish-inner">
                    <div class="wedding-wish-head">
                        <h1 class="wedding-wish-title" data-aos="fade-up" data-aos-duration="1200">Wedding Wish</h1>
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
                                <div class="chitra-comment-box-wrap" data-aos="fade-up" data-aos-duration="1200">
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
                <div class="quote-wrap">
                    <div class="quote-inner">
                        <p class="quote-caption" data-aos="fade-up" data-aos-duration="1000"> {!! nl2br(e($event->textSection->quote ?? '')) !!}
                        </p>
                    </div>
                </div>
                <div class="footnote">
                    <div class="logo-wrap" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="500">
                        <img src="{{ asset('template-7/media/template/theme-1/logo-white.png') }}" alt="Logo"
                            class="logo">
                    </div>
                    <h1 class="footnote-title" data-aos="fade-up" data-aos-duration="1500">
                        {{ $event->nama_panggilan_mempelai_wanita ?? 'Hawa' }} &
                        {{ $event->nama_panggilan_mempelai_pria ?? 'Adam' }}</h1>
                    <p class="save-date-event" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                        {{ $event->tanggal_ijab ? \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM, Y') : '24-11-2024' }}
                    </p>
                </div>
            </section>
        </section>
    </section>

    <section class="music-outer" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
        <div class="music-box auto" id="music-box"></div>
    </section>
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
                    'desktop': `<div class="picture desktop cover-img-wrap">
                            <img src="{{ asset($gallery['path']) }}" alt="" class="cover-img">
                        </div>
                        <div class="picture desktop cover-img-wrap">
                            <img src="{{ asset($gallery['path']) }}" alt="" class="cover-img">
                        </div>
                        <div class="picture desktop cover-img-wrap">
                            <img src="{{ asset($gallery['path']) }}" alt="" class="cover-img">
                        </div>`,
                    'mobile': `<div class="picture mobile cover-img-wrap">
                            <img src="{{ asset($gallery['path']) }}" alt="" class="cover-img">
                        </div>
                        <div class="picture mobile cover-img-wrap">
                            <img src="{{ asset($gallery['path']) }}" alt="" class="cover-img">
                        </div>
                        <div class="picture mobile cover-img-wrap">
                            <img src="{{ asset($gallery['path']) }}" alt="" class="cover-img">
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

        var Gift = $('.send_gift').on('click', function(){
            let no_hp = $(this).data('id');
            let message = $(this).data('value');
            console.log(no_hp)
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

        // Gallery Single Slider
        window.GALLERY_SINGLE_SLIDER = true;

        // On Ready
        $(document).ready(function() {

            if (typeof gallerySingleSlider === 'function') gallerySingleSlider();

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
    <script src="{{ asset('template-7/src/template/js/theme-1.js') }}"></script>
</body>

</html>
