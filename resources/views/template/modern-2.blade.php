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

    <link rel="stylesheet" href="{{ asset('template-7/src/template/theme-4.css') }}">
</head>

<body class="syanin original">
    <section class="top-cover">
        <div class="inner">
            <div class="details">
                <h1 data-aos="zoom-in-down" data-aos-duration="1200">{{ $event->nama_panggilan_mempelai_wanita ?? 'Hawa' }} &amp;
                    {{ $event->nama_panggilan_mempelai_pria ?? 'Adam' }}</h1>
                @if (isset($invite->name))
                    <p data-aos="fade-up" data-aos-duration="700" data-aos-delay="700">
                        Turut mengundang Bapak/Ibu/Saudara/i
                    </p>
                    <p data-aos="fade-up" data-aos-duration="700" data-aos-delay="700">
                        {{ $invite->name }}
                    </p>
                @endif
                <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="1300">
                    <a href="javascript:;" onclick="startTheJourney()" class="link">Buka Undangan</a>
                </div>
            </div>
        </div>
        <div class="cover-show" id="cover-opening" data-aos="zoom-out" data-aos-duration="1200" data-aos-delay="100">
        </div>
    </section>

    <section class="cover" id="start">
        <div class="inner">
            <div class="cover-greet">
                <div class="orn-01" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="600"></div>
                <p data-aos="fade-down" data-aos-duration="1000" data-aos-delay="300">The Wedding of</p>
            </div>
            <div class="cover-highlight">
                <div class="highlight-inner" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="orn-02 o-01" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="250"></div>
                    <div class="orn-02 o-02" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="350"></div>
                    <div class="orn-02 o-03" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="450"></div>
                    <div class="orn-02 o-04" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="550"></div>
                    <div class="preview" id="cover-main"></div>
                </div>
            </div>
            <div class="cover-couple">
                <h1 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="450">
                    {{ $event->nama_panggilan_mempelai_wanita ?? 'Hawa' }} &amp; {{ $event->nama_panggilan_mempelai_pria ?? 'Adam' }}</h1>
                <p class="date" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                    {{ $event->tanggal_ijab ? \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM, Y') : '24-11-2024' }}</p>
            </div>
        </div>
    </section>

    {{-- <section class="guest">
        <div class="texture-outer top bottom" data-aos="zoom-in" data-aos-duration="1200">
            <div class="texture-line"></div>
        </div>
    </section> --}}

    <section class="couple">
        <div class="inner">
            <div class="head">
                <!-- <h1 data-aos="zoom-in" data-aos-duration="1000" class="aos-init aos-animate">The Wedding Of</h1>
                <p data-aos="fade-up" data-aos-duration="1000" class="aos-init aos-animate">The pleasure of your
                    company is requested at the marriage of -->
                @if (isset($event->textSection->title))
                    <p class="couple-description" data-aos="fade-up" data-aos-duration="1000">
                        {!! nl2br(e($event->textSection->title ?? 'The Wedding Of'),
                        ) !!}</p>
                @endif
            </div>
            <div class="body bride-first">
                <div class="groom">
                    <div class="preview">
                        <div class="picture" data-aos="zoom-out" data-aos-duration="1300" data-aos-once="false">
                            <img src="{{ asset('admin/assets/images/pria/' . $event->order->invoice . '/' . $event->avatar_pria) }}"
                                alt>
                        </div>
                    </div>
                    <div class="details">
                        <h2 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                            {{ $event->nama_lengkap_mempelai_pria }}</h2>
                        <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">{!! nl2br(e($event->bio_mempelai_pria ?? '')) !!}
                        </p>
                    </div>
                </div>
                <div class="separator  show-picture " data-aos="zoom-in" data-aos-duration="1500">
                    <p>&amp;</p>
                </div>
                <div class="bride">
                    <div class="preview">
                        <div class="picture" data-aos="zoom-out" data-aos-duration="1300" data-aos-once="false">
                            <img
                                src="{{ asset('admin/assets/images/wanita/' . $event->order->invoice . '/' . $event->avatar_wanita) }}">
                        </div>
                    </div>
                    <div class="details">
                        <h2 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                            {{ $event->nama_lengkap_mempelai_wanita }}
                        </h2>
                        <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">{!! nl2br(e($event->bio_mempelai_wanita ?? '')) !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="save-date">
        <div class="inner">
            <div class="head">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Save The Date</h1>
            </div>
            <div class="body">
                <div class="countdown">
                    <div data-aos="fade-right" data-aos-duration="1000" data-aos-delay="400">
                        <h2 class="count-day" id="days">0</h2>
                        <p>Days</p>
                    </div>
                    <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                        <h2 class="count-hour" id="hours">0</h2>
                        <p>Hours</p>
                    </div>
                    <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
                        <h2 class="count-minute" id="minutes">0</h2>
                        <p>Minutes</p>
                    </div>
                    <div data-aos="fade-left" data-aos-duration="1000" data-aos-delay="300">
                        <h2 class="count-second" id="seconds">0</h2>
                        <p>Seconds</p>
                    </div>
                </div>
            </div>
            <div class="foot" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="700">
                <a href="http://www.google.com/calendar/render?action=TEMPLATE&amp;text={{ $event->nama_panggilan_mempelai_wanita }}+%26+{{ $event->nama_panggilan_mempelai_pria }}+Wedding&amp;dates={{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('Ymd') }}T{{ \Carbon\Carbon::parse($event->jam_mulai_ijab)->format('His') }}/{{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('Ymd') }}T{{ \Carbon\Carbon::parse($event->jam_selesai_ijab)->format('His') }}&amp;location={{ $event->lokasi_ijab }}&amp;details=Hai+You%27re+invited+to+our+wedding+ceremony+%7C+{{ $event->nama_panggilan_mempelai_wanita }}+%26+{{ $event->nama_panggilan_mempelai_pria }}+Wedding+%7C+{{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('dddd') }}%2C+{{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM Y') }}"
                    target="_blank" rel="nofollow" id="addToCalendar">Add to Calendar</a>
            </div>
        </div>
    </section>

    <section class="event-outer">
        <div class="inner">
            <div class="orn-09" data-aos="zoom-in-up" data-aos-duration="1000"></div>
            <div class="head">
                <h1 data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="200">The Wedding Day</h1>
            </div>
            <div class="body">
                <div class="event">
                    <div class="activities">
                        <div class="activity">
                            <div class="title">
                                <img src="{{ asset('template-7/media/template/icons/gold/01.png') }}" class="party"
                                    data-aos="fade-up" data-aos-duration="1500" data-aos-delay="200">
                                <h1 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">Akad Nikah</h1>
                                <div class="dates">
                                    <h2 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
                                        {{ \Carbon\Carbon::parse($event->tanggal_ijab)->formatLocalized('%A') }}</h2>
                                    <h2 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
                                        {{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM, Y') }}</h2>
                                </div>
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
                                <div class="dates">
                                    <h2 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
                                        {{ \Carbon\Carbon::parse($event->tanggal_resepsi)->formatLocalized('%A') }}</h2>
                                    <h2 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
                                        {{ \Carbon\Carbon::parse($event->tanggal_resepsi)->isoFormat('D MMMM, Y') }}</h2>
                                </div>
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
            <div class="orn-11" data-aos="zoom-in-down" data-aos-duration="1000"></div>
        </div>
    </section>

    <section class="gift">
        <div class="gift-inner">
            <div class="gift-title">
                <div class="orn-09" data-aos="zoom-in-up" data-aos-duration="1000"></div>
                <p class="quote-caption" id="quote" data-aos="fade-up" data-aos-duration="1200">
                    {!! nl2br(e($event->textSection->quote ?? '')) !!}</p>
                <div class="orn-11" data-aos="zoom-in-down" data-aos-duration="1000"></div>
            </div>
        </div>
    </section>

    @if (
        $event->order->orderDetail->product_id == 2 ||
            $event->order->orderDetail->product_id == 3 ||
            $event->order->orderDetail->product_id == 4)
        @if (count($photo_event) > 0)
            <section class="gallery">
                <div class="title">
                    <h1 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="0">Photo Gallery</h1>
                    <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200"></p>
                </div>
                <div class="flexbin" id="lightGallery">
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
    {{-- Barcode --}}
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
                <h1 data-aos="fade-up" data-aos-duration="1000">Wedding Wish</h1>
                <p data-aos="zoom-in-up" data-aos-duration="1000"></p>
            </div>
            <form action="{{ route('wishes', ['id' => $event->id]) }}" autocomplete="off" method="POST"
                class="comment-form">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Name"
                        data-aos="fade-down" data-aos-duration="1000">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email"
                        data-aos="fade-down" data-aos-duration="1000">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="text" rows="1" placeholder="Give your wish..."
                        style="max-height: 350px;" data-aos="fade-down" data-aos-duration="1000"></textarea>
                </div>
                <button type="submit" data-aos="fade-up" data-aos-duration="1000"
                    class="send-comment">Send</button>
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
        </div>
    </section>

    <section class="footnote">
        <div class="inner">
            <div class="details">
                <h1 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    {{ $event->nama_panggilan_mempelai_wanita }} &amp; {{ $event->nama_panggilan_mempelai_pria }}</h1>
                <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    {{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM, Y') }}
                </p>
            </div>
            <div class="orn-03" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600"></div>
        </div>
    </section>

    <section class="footer">
        <div class="footer-inner ">
            <p>Powered by</p>
            <img src="{{ asset('img/logo-hoofey-light.png') }}" alt="">
        </div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript">
        // Music
        
        const is_music = document.querySelector('[data-id="show_music"]');

        var MUSIC = {
            'url': "{{ asset('admin/assets/audio/' . $event->audio->path?? '') }}",
            'box': '#music-box'
        };
        
        window.EVENT = {{ strtotime($event->tanggal_ijab) }};;
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
                `<div class="picture-outer desktop"><img src="{{ asset($gallery['path']) }}" class="picture"> </div>`);
                img_opening_mobile.push(
                `<div class="picture-outer mobile"><img src="{{ asset($gallery['path']) }}" class="picture"> </div>`)
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
