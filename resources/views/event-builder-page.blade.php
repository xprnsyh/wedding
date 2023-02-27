<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoofey - Wedding of
        {{ $event->nama_panggilan_mempelai_pria . ' & ' . $event->nama_panggilan_mempelai_wanita }}</title>
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('plugin/swipebox/js/swipebox.min.css') }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@300;400;500;600&family=Dancing+Script:wght@400;500;600&family=Fleur+De+Leah&family=Lato:wght@400;700&family=Josefin+Sans:wght@200;300;400&family=Kalam:wght@300;400&family=Handlee&family=Parisienne&display=swap');

        * {
            margin: 0;
            padding: 0;
            text-decoration: none;
            box-sizing: border-box;
            font-family: "Poppins";
        }

        .btn.btn-primary {
            background: #f54291;
            border-radius: 8px;
            padding: 12px 20px;
            border-color: #f54291;
            font-size: 16px;
        }

        #countdown,
        #footer,
        #panduan {
            background: #3E3E3E;
        }

        .color-background {
            background: #ffffff;
        }

        .color-primary {
            background: #F17193;
        }

        .color-light {
            background: #F7ADAF;
        }

        .color-heading-text {
            background: #3E3E3E;
        }

        .color-body-text {
            background: #999999;
        }

        .color-dark {
            background: #F54291;
        }

        section {
            padding: 48px 0;
        }

        section#hero {
            background: linear-gradient(132.17deg, #FFBBCC 11.81%, #F54291 75.09%);
            padding: 105px 0;
        }

        #hero .text-tengah {
            font-size: 120px !important;
            font-weight: normal;
            font-family: 'Fleur De Leah';
        }

        h1 {
            font-style: normal;
            font-weight: bold;
            font-size: 32px;
            color: #3E3E3E;
        }

        h2 {
            font-size: 30px;
            font-weight: 400;
            color: #3E3E3E;
        }

        h2.title-akad {
            font-size: 28px;
        }

        h3 {
            font-weight: normal !important;
            font-size: 20px;
            color: #3E3E3E;
        }

        p.text {
            font-size: 20px;
            color: #3E3E3E;
        }

        p.text-secondari {
            color: #646464;
            font-size: 16px;
        }

        .text-grey {
            color: #646464;
            font-size: 20px;
            line-height: 25px;
        }

        #married img.profile {
            width: 120px;
            height: 120px;
            object-fit: cover;
            object-position: top;
            border-radius: 50%;
        }

        .dan {
            font-size: 86px;
            font-weight: 600;
            color: #3E3E3E;
        }

        .nama-pengantin-wanita,
        .nama-pengantin-pria {
            font-style: normal;
            font-weight: bold;
            font-size: 24px;
            color: #3E3E3E;
            /* color: linear-gradient(132.17deg, #FFBBCC 11.81%, #F54291 75.09%); */
        }

        section#countdown h1 {
            font-style: normal;
            font-weight: bold;
            font-size: 32px;
            color: #ffffff;
        }

        section#countdown .time {
            font-style: normal;
            font-weight: 500;
            font-size: 36px;
            line-height: 44px;
            text-align: center;
        }

        #countdown .savethedate {
            width: 200px;
            padding: 15px 0;
        }

        p.date-events {
            font-size: 72px !important;
        }

        iframe {
            max-width: 100%;
            height: 330px;
            border-radius: 10px;
        }

        #gallery #lightGallery img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            object-position: center
        }

        #comment .btn.btn-grey {
            background: #646464;
            color: #ffffff;
        }

        #comment p.comment-text {
            font-size: 13px;
            color: #3e3e3e;
        }

        #comment p.comment-name {
            font-style: normal;
            font-weight: normal;
            font-size: 14px;
            line-height: 20px;
            color: #3e3e3e;
        }

        #comment p.comment-date {
            font-size: 11px;
            color: #646464;
        }

        #panduan {
            font-family: Poppins;
        }

        #panduan p.title {
            font-size: 32px;
            line-height: 48px;
        }

        #panduan p.panduan-text {
            font-style: normal;
            font-weight: 500;
            font-size: 27px;
            line-height: 45px;
        }

        #panduan .panduan-text-8 {
            margin-left: -80px;
        }

        footer span {
            font-style: normal;
            font-weight: normal;
            font-size: 14px;
            line-height: 21px;
            color: #6F6F6F;
            margin-bottom: 8px
        }

        footer img {
            width: 115px;
            height: 34px;
        }

        /* Responsive */

        @media (max-width: 991px) {
            #panduan .panduan-text {
                font-size: 16px !important;
            }

            #panduan .title {
                font-size: 30px !important;
            }

            #panduan .panduan-text-8 {
                margin-left: 0px;
            }
        }

        @media (max-width: 768px) {
            #hero .text-tengah {
                font-size: 95px !important;
            }

            .nama-pengantin-wanita,
            .nama-pengantin-pria {
                font-size: 20px !important;
            }

            iframe {
                max-width: 100%;
                height: 250px !important;
                border-radius: 10px;
            }
        }

        @media (max-width: 576px) {
            #hero .text-tengah {
                font-size: 75px !important;
            }

            p.date-events {
                font-size: 72px !important;
                font-family: Source Sans Pro;
            }

            section#countdown .time {
                font-size: 30px !important;
            }

            section#countdown .time {
                font-size: 30px !important;
            }

            section#countdown .time p {
                margin-bottom: 0px;
            }

            #countdown .savethedate {
                width: 140px;
            }

            #married img.profile {
                max-width: 100% !important;
                height: auto;
            }

            .dan {
                font-size: 75px !important;
            }

            #panduan .row .col-md-6.d-flex {
                justify-content: center;
            }

            #panduan .panduan-text {
                text-align: center !important;
                font-size: 22px !important;
                margin: 20px 0;
            }
        }

        @media (max-width: 400px) {
            section {
                padding: 30px 0;
            }

            #gallery #lightGallery img {
                height: 100px;
            }

            .py-3 {
                padding: 7px 0 !important;
            }

            .py-4 {
                padding: 0px !important;
            }

            section#countdown h2,
            section#countdown .time {
                font-size: 20px !important;
            }


            #hero .text-tengah {
                font-size: 55px !important;
            }

            h1 {
                font-size: 20px !important;
            }

            h2 {
                font-size: 18px !important;
            }

            #hero h2 {
                font-size: 20px !important;
            }

            p.date-events {
                font-size: 72px !important;
                font-family: Source Sans Pro;
            }

            #married img.profile {
                border-radius: 20px !important;
            }

            .nama-pengantin-wanita,
            .nama-pengantin-pria {
                font-size: 16px !important;
                margin-bottom: 8px;
            }

            #event .py-5,
            #event .py-4 {
                padding: 1rem !important;
            }

            #panduan .panduan-text {
                font-size: 18px !important;
            }

            #panduan .title {
                font-size: 24px !important;
            }

            .dan {
                font-size: 55px !important;
            }

            #panduan img {
                max-width: 80% !important;
            }

            footer img {
                width: 80px;
                height: 25px;
            }

            p.text {
                font-size: 16px;
                color: #3E3E3E;
            }

            p.text-secondari,
            .text-grey,
            .text-secondary {
                color: #646464;
                font-size: 13px;
            }

            #streaming_iframe a p {
                font-size: 14px;
            }
        }

    </style>
</head>

<body>
    @if ($event->audio_id != null)
        <audio autoplay hidden loop>
            <source src="{{ asset('admin/assets/audio/' . $event->audio->path ?? '') }}" type="audio/mpeg">
        </audio>
    @endif
    <section id="hero"
        class="aling-items-center {{ $hero != null && $hero->perataan ? $hero->perataan : 'text-center' }} {{ $hero != null && $hero->display ? $hero->display : 'd-flex' }}"
        style="background: {{ $hero != null && $hero->background ? $hero->background : false }}; height: 100vh; background-blend-mode: {{ $hero != null && $hero->overlay ? $hero->overlay : 'hard-light' }}">
        <div class="{{ $hero != null && $hero->container ? $hero->container : 'container' }}"
            style="display: grid; align-items: center;">
            <div>
                <div class="py-3">
                    <h2 class="text-atas"
                        style="color: {{ $hero != null && $hero->color_teks_atas !== null ? $hero->color_teks_atas : '#ffffff' }}; font-family: {{ $hero != null && $hero->font_judul ? $hero->font_judul : 'Poppins' }}; font-weight: {{ $hero != null && $hero->font_judul_weight ? $hero->font_judul_weight : '500' }}">
                        {{ $hero != null && $hero->teks_atas ? $hero->teks_atas : 'Hadiri pernikahan' }}
                    </h2>
                </div>
                <div class="py-3">
                    <h1 class="text-tengah"
                        style="font-size: 72px; color: {{ $hero != null && $hero->color_teks_tengah !== null ? $hero->color_teks_tengah : '#ffffff' }}; font-family: {{ $hero != null && $hero->font_judul ? $hero->font_judul : 'Fleur De Leah' }}; font-weight: {{ $hero != null && $hero->font_judul_weight ? $hero->font_judul_weight : false }}">
                        {{ $hero != null && $hero->teks_judul ? $hero->teks_judul : $event->nama_panggilan_mempelai_pria . ' & ' . $event->nama_panggilan_mempelai_wanita }}

                    </h1>
                </div>
                <div class="py-3">
                    <h2 class="text-bawah"
                        style="color: {{ $hero != null && $hero->color_teks_bawah !== null ? $hero->color_teks_bawah : '#ffffff' }}; font-family: {{ $hero != null && $hero->font_judul ? $hero->font_judul : 'Poppins' }}; font-weight: {{ $hero != null && $hero->font_judul_weight ? $hero->font_judul_weight : '500' }}">
                        {{ $hero != null && $hero->teks_bawah ? $hero->teks_bawah : 'Pada tanggal:' }}
                    </h2>
                </div>
                <div class="date-hero py-3">
                    <h2 class="text-bawah except"
                        style="color: {{ $hero != null && $hero->color_teks_bawah !== null ? $hero->color_teks_bawah : '#ffffff' }}; font-family: {{ $hero != null && $hero->font_judul ? $hero->font_judul : 'Poppins' }}; font-weight: {{ $hero != null && $hero->font_judul_weight ? $hero->font_judul_weight : '500' }}">
                        {{ date_format(new DateTime($event->tanggal_ijab), 'd . m . Y') }}
                    </h2>
                </div>
            </div>
        </div>
    </section>
    <section id="invitation"
        class="{{ $invitation != null && $invitation->perataan ? $invitation->perataan : 'text-center' }} {{ $invitation != null && $invitation->display ? $invitation->display : 'd-block' }}"
        style="background: {{ $invitation != null && $invitation->background ? $invitation->background : false }}; background-blend-mode: {{ $invitation != null && $invitation->overlay ? $invitation->overlay : 'hard-light' }}">
        <div class="{{ $invitation != null && $invitation->container ? $invitation->container : 'container' }}">
            <div class="py-3">
                <p class="text text-atas"
                    style="color: {{ $invitation != null && $invitation->color_teks_atas !== null ? $invitation->color_teks_atas : false }}; font-family: {{ $invitation != null && $invitation->font_teks ? $invitation->font_teks : 'Poppins' }};">
                    {{ $invitation != null && $invitation->teks_atas ? $invitation->teks_atas : 'Halo,' }}
                </p>
            </div>
            <div class="py-3">
                <h1 class="text-tengah"
                    style="color: {{ $invitation != null && $invitation->color_teks_tengah !== null ? $invitation->color_teks_tengah : false }}; font-family: {{ $invitation != null && $invitation->font_judul ? $invitation->font_judul : 'Poppins' }}; font-weight: {{ $invitation != null && $invitation->font_judul_weight ? $invitation->font_judul_weight : '600' }}">
                    {{ app('request')->input('invite') ? app('request')->input('invite') : '' }}
                </h1>
            </div>
            <div class="py-3">
                <p class="text text-bawah"
                    style="color: {{ $invitation != null && $invitation->color_teks_bawah !== null ? $invitation->color_teks_bawah : false }}; font-family: {{ $invitation != null && $invitation->font_teks ? $invitation->font_teks : 'Poppins' }};">
                    {{ $invitation != null && $invitation->teks_bawah ? $invitation->teks_bawah : 'Kamu diundang ke acara pernikahan' }}
                </p>
            </div>
        </div>
    </section>
    <section id="married" class="married text-center">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8 offset-lg-2 my-auto">
                    <div class="py-3">
                        <h1 class="text-atas"
                            style="font-family: {{ $hero != null && $hero->font_judul ? $hero->font_judul : 'Poppins' }};">
                            We are Getting Married</h1>
                        <p class="text-grey text-bawah"
                            style="font-family: {{ $hero != null && $hero->font_teks ? $hero->font_teks : 'Poppins' }};">
                            Hormat kami</p>
                    </div>
                    <div class="tengah py-4">
                        <div
                            class="row justify-content-center {{ $event->avatar_wanita && $event->avatar_pria ? false : 'align-items-center' }}">
                            <div class="col-md-5 col-xs-5 col-5">
                                @if ($event->avatar_wanita)
                                    <div>
                                        <img src="{{ asset('admin/assets/images/wanita/' . $event->order->invoice . '/' . $event->avatar_wanita) }}"
                                            alt="" class="profile" id="pengantin-wanita">
                                    </div>
                                @endif
                                <div class="nama-pengantin-wanita pt-3">
                                    <span id="nama-pengantin-wanita"
                                        style="font-family: {{ $invitation != null && $invitation->font_teks ? $invitation->font_teks : 'Poppins' }};">{{ $event->nama_lengkap_mempelai_wanita }}</span>
                                </div>
                                <div class="bio-wanita">
                                    <p class="text-secondary" id="bio-wanita"
                                        style="font-family: {{ $hero != null && $hero->font_teks ? $hero->font_teks : 'Poppins' }};">
                                        {{ $event->bio_mempelai_wanita }}</p>
                                </div>
                            </div>
                            <div
                                class="dan-wrapper col-md-2 col-xs-1 col-1 d-flex justify-content-center align-items-center">
                                <span class="dan">&</span>
                            </div>
                            <div class="col-md-5 col-xs-5 col-5">
                                @if ($event->avatar_pria)
                                    <div>
                                        <img src="{{ asset('admin/assets/images/pria/' . $event->order->invoice . '/' . $event->avatar_pria) }}"
                                            alt="" class="profile" id="pengantin-pria">
                                    </div>
                                @endif
                                <div class="nama-pengantin-pria pt-3">
                                    <span id="nama-pengantin-pria"
                                        style="font-family: {{ $invitation != null && $invitation->font_teks ? $invitation->font_teks : 'Poppins' }};">{{ $event->nama_lengkap_mempelai_pria }}</span>
                                </div>
                                <div class="bio-pria">
                                    <p class="text-secondary" id="bio-pria"
                                        style="font-family: {{ $invitation != null && $invitation->font_teks ? $invitation->font_teks : 'Poppins' }};">
                                        {{ $event->bio_mempelai_pria }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="countdown"
        class="{{ $countdown != null && $countdown->perataan ? $countdown->perataan : 'text-center' }} {{ $countdown != null && $countdown->display ? $countdown->display : 'd-block' }}"
        style="background: {{ $countdown != null && $countdown->background ? $countdown->background : false }}; background-blend-mode: {{ $countdown != null && $countdown->overlay ? $countdown->overlay : 'hard-light' }}">
        <div class="{{ $countdown != null && $countdown->container ? $countdown->container : 'container' }}">
            <div class="row">
                <div class="col-12">
                    <div class="atas">
                        <h1 class="text-atas"
                            style="color: {{ $countdown != null && $countdown->color_teks_atas !== null ? $countdown->color_teks_atas : '#ffffff' }}; font-family: {{ $countdown != null && $countdown->font_judul ? $countdown->font_judul : 'Poppins' }}; font-weight: {{ $countdown != null && $countdown->font_judul_weight ? $countdown->font_judul_weight : '600' }}">
                            {{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('d F Y') }}
                        </h1>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="tengah" style="padding: 25px 0; justify-content-center">
                                <img src="{{ asset('savethedate.svg') }}" alt="Save The Date" class="savethedate">
                            </div>
                        </div>
                    </div>
                    <div class="bawah">
                        <div class="row justify-content-center">
                            <div class="div col-lg-10 col-12">
                                <div class="row">
                                    <div class="col-md-3 col-xs-3 col-4 text-white time mt-2">
                                        <p id="days" class="text-tengah"
                                            style="color: {{ $countdown != null && $countdown->color_teks_tengah !== null ? $countdown->color_teks_tengah : '#ffffff' }}; font-family: {{ $countdown != null && $countdown->font_teks ? $countdown->font_teks : 'Poppins' }};">
                                            0</p>
                                        <p class="text-bawah"
                                            style="color: {{ $countdown != null && $countdown->color_teks_bawah !== null ? $countdown->color_teks_bawah : '#ffffff' }}; font-family: {{ $countdown != null && $countdown->font_teks ? $countdown->font_teks : 'Poppins' }};">
                                            Hari</p>
                                    </div>
                                    <div class="col-md-3 col-xs-3 col-4 text-white time mt-2">
                                        <p id="hours" class="text-tengah"
                                            style="color: {{ $countdown != null && $countdown->color_teks_tengah !== null ? $countdown->color_teks_tengah : '#ffffff' }}; font-family: {{ $countdown != null && $countdown->font_teks ? $countdown->font_teks : 'Poppins' }};">
                                            0</p>
                                        <p class="text-bawah"
                                            style="color: {{ $countdown != null && $countdown->color_teks_bawah !== null ? $countdown->color_teks_bawah : '#ffffff' }}; font-family: {{ $countdown != null && $countdown->font_teks ? $countdown->font_teks : 'Poppins' }};">
                                            Jam</p>
                                    </div>
                                    <div class="col-md-3 col-xs-3 col-4 text-white time mt-2">
                                        <p id="minutes" class="text-tengah"
                                            style="color: {{ $countdown != null && $countdown->color_teks_tengah !== null ? $countdown->color_teks_tengah : '#ffffff' }}">
                                            0</p>
                                        <p class="text-bawah"
                                            style="color: {{ $countdown != null && $countdown->color_teks_bawah !== null ? $countdown->color_teks_bawah : '#ffffff' }}; font-family: {{ $countdown != null && $countdown->font_teks ? $countdown->font_teks : 'Poppins' }};">
                                            Menit</p>
                                    </div>
                                    <div class="col-md-3 col-xs-3 col-12 text-white time mt-2">
                                        <p id="seconds" class="text-tengah"
                                            style="color: {{ $countdown != null && $countdown->color_teks_tengah !== null ? $countdown->color_teks_tengah : '#ffffff' }}; font-family: {{ $countdown != null && $countdown->font_teks ? $countdown->font_teks : 'Poppins' }};">
                                            0</p>
                                        <p class="text-bawah"
                                            style="color: {{ $countdown != null && $countdown->color_teks_bawah !== null ? $countdown->color_teks_bawah : '#ffffff' }}; font-family: {{ $countdown != null && $countdown->font_teks ? $countdown->font_teks : 'Poppins' }};">
                                            Detik</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="maps"
        class="{{ $maps != null && $maps->perataan ? $maps->perataan : 'text-center' }} {{ $maps != null && $maps->display ? $maps->display : 'd-block' }}"
        style="background: {{ $maps != null && $maps->background ? $maps->background : false }}; background-blend-mode: {{ $maps != null && $maps->overlay ? $maps->overlay : 'hard-light' }}; font-family: {{ $maps != null && $maps->font_judul ? $maps->font_judul : 'Poppins' }}">
        <div class="{{ $maps != null && $maps->container ? $maps->container : 'container' }}">
            <div class="row">
                <div class="col-12 my-auto">
                    <div class="atas">
                        <h1 class="text-atas"
                            style="color: {{ $maps != null && $maps->color_teks_atas ? $maps->color_teks_atas : false }}; font-family: {{ $maps != null && $maps->font_judul ? $maps->font_judul : 'Poppins' }}; font-weight: {{ $maps != null && $maps->font_judul_weight ? $maps->font_judul_weight : '600' }}">
                            {{ $maps != null && $maps->teks_atas ? $maps->teks_atas : 'Lokasi Pernikahan' }}</h1>
                        <p class="text-grey text-tengah"
                            style="color: {{ $maps != null && $maps->color_teks_bawah ? $maps->color_teks_bawah : '#646464' }}; font-family: {{ $maps != null && $maps->font_teks ? $maps->font_teks : 'Poppins' }};">
                            {{ $maps != null && $maps->teks_bawah ? $maps->teks_bawah : 'Maps lokasi pernikahan bisa dilihat dibawah ini' }}
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-12 my-auto">
                            <div class="tengah pt-5">
                                <div id="maps_iframe">
                                    {!! $maps != null && $maps->iframe_maps ? $maps->iframe_maps : $event->gm_ijab !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="gallery"
        class="{{ $gallery != null && $gallery->perataan ? $gallery->perataan : 'text-center' }} {{ $gallery != null && $gallery->display ? $gallery->display : 'd-block' }}"
        style="background: {{ $gallery != null && $gallery->background ? $gallery->background : false }}; background-blend-mode: {{ $gallery != null && $gallery->overlay ? $gallery->overlay : 'hard-light' }}">
        <div class="{{ $gallery != null && $gallery->container ? $gallery->container : 'container' }}">
            <div class="row">
                <div class="col-12 col-lg-8 offset-lg-2 my-auto">
                    <div class="py-3">
                        <h1 class="text-atas"
                            style="color: {{ $gallery != null && $gallery->color_teks_atas !== null ? $gallery->color_teks_atas : false }}; font-family: {{ $gallery != null && $gallery->font_judul ? $gallery->font_judul : 'Poppins' }}; font-weight: {{ $gallery != null && $gallery->font_judul_weight ? $gallery->font_judul_weight : '600' }}">
                            {{ $gallery != null && $gallery->teks_atas ? $gallery->teks_atas : 'Momen Kami' }}
                        </h1>
                        <p class="text-grey text-bawah"
                            style="color: {{ $gallery != null && $gallery->color_teks_bawah !== null ? $gallery->color_teks_bawah : false }}; font-family: {{ $gallery != null && $gallery->font_teks ? $gallery->font_teks : 'Poppins' }};">
                            {{ $gallery != null && $gallery->teks_bawah ? $gallery->teks_bawah : 'Berikut gallery kami beruda' }}
                        </p>
                    </div>
                </div>
            </div>
            @if ($photo_event == null)
                <div class="py-4" id="lightGallery">
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-danger">There's no galleries. Please upload photo from media</div>
                        </div>
                    </div>
                </div>
            @else
                <div class="py-4" id="lightGallery">
                    <div class="row d-flex justify-content-center pt-3 px-1">
                        @foreach ($photo_event as $photo)
                            <div class="col-md-3 col-6 px-1 py-1">
                                <a rel="gallery-1" href="{{ asset($photo['path']) }}" class="swipebox">
                                    <img src="{{ asset($photo['path']) }}" width="100" class="gallery-image"
                                        alt="">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
    {{-- @if ($event->link_livestreaming != null) --}}
    <section id="streaming"
        class="{{ $streaming != null && $streaming->perataan ? $streaming->perataan : 'text-center' }} {{ $streaming != null && $streaming->display ? $streaming->display : 'd-block' }}"
        style="background: {{ $streaming != null && $streaming->background ? $streaming->background : false }}; background-blend-mode: {{ $streaming != null && $streaming->overlay ? $streaming->overlay : 'hard-light' }}">
        <div class="{{ $streaming != null && $streaming->container ? $streaming->container : 'container' }}">
            <div class="row">
                <div class="col-12">
                    <div class="atas">
                        <h1 class="text-atas"
                            style="color: {{ $streaming != null && $streaming->color_teks_atas !== null ? $streaming->color_teks_atas : '#3E3E3E' }}; font-family: {{ $streaming != null && $streaming->font_judul ? $streaming->font_judul : 'Poppins' }}; font-weight: {{ $streaming != null && $streaming->font_judul_weight ? $streaming->font_judul_weight : '600' }}">
                            {{ $streaming != null && $streaming->teks_atas ? $streaming->teks_atas : 'Live Streaming' }}
                        </h1>
                        <p class="text-grey text-tengah"
                            style="color: {{ $streaming != null && $streaming->color_teks_bawah !== null ? $streaming->color_teks_bawah : '#646464' }}; font-family: {{ $streaming != null && $streaming->font_teks ? $streaming->font_teks : 'Poppins' }};">
                            {{ $streaming != null && $streaming->teks_bawah ? $streaming->teks_bawah : 'Klik tombol dibawah untuk melihat streaming pernikahan' }}
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-12 my-auto">
                            <div class="tengah pt-2">
                                <div>
                                    <a href="{{ $streaming != null && $streaming->iframe_streaming ? $streaming->iframe_streaming : $event->link_livestreaming }}"
                                        style="font-size: 16px;" target="_blank" class="btn btn-primary">
                                        <p
                                            style="font-family: {{ $streaming != null && $streaming->font_teks ? $streaming->font_teks : 'Poppins' }}; margin-bottom: 0px;">
                                            Tonton Streaming
                                        </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- @endif --}}
    <section id="videos"
        class="{{ $videos != null && $videos->perataan ? $videos->perataan : 'text-center' }} {{ $videos != null && $videos->display ? $videos->display : 'd-block' }}"
        style="padding-bottom: 4rem !important; background: {{ $videos != null && $videos->background ? $videos->background : false }}; background-blend-mode: {{ $videos != null && $videos->overlay ? $videos->overlay : 'hard-light' }}">
        <div class="{{ $videos != null && $videos->container ? $videos->container : 'container' }}">
            <div class="row">
                <div class="col-12">
                    <div class="atas">
                        <h1 class="text-atas"
                            style="color: {{ $videos != null && $videos->color_teks_atas ? $videos->color_teks_atas : false }}; font-family: {{ $videos != null && $videos->font_judul ? $videos->font_judul : 'Poppins' }}; font-weight: {{ $videos != null && $videos->font_judul_weight ? $videos->font_judul_weight : '600' }}">
                            {{ $videos != null && $videos->teks_atas ? $videos->teks_atas : 'Videos' }}
                        </h1>
                        <p class="text-grey text-tengah"
                            style="color: {{ $videos != null && $videos->color_teks_bawah ? $videos->color_teks_bawah : false }}; font-family: {{ $videos != null && $videos->font_teks ? $videos->font_teks : 'Poppins' }};">
                            {{ $videos != null && $videos->teks_bawah ? $videos->teks_bawah : 'Berikut momen kami dalam bentuk video' }}
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="tengah pt-5">
                                <div id="videos_iframe">
                                    {!! $videos != null && $videos->iframe_videos ? $videos->iframe_videos : $event->link_youtube !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="event"
        class="py-5 {{ $_event != null && $_event->perataan ? $_event->perataan : 'text-center' }} {{ $_event != null && $_event->display ? $_event->display : 'd-block' }}"
        style="background: {{ $_event != null && $_event->background ? $_event->background : false }}; background-blend-mode: {{ $_event != null && $_event->overlay ? $_event->overlay : false }}">
        <div class="{{ $_event != null && $_event->container ? $_event->container : 'container' }}">
            <div class="row">
                <div class="col-lg-12 atas">
                    <h1 class="text-atas"
                        style="color: {{ $_event != null && $_event->color_teks_atas ? $_event->color_teks_atas : false }}; font-family: {{ $_event != null && $_event->font_judul ? $_event->font_judul : 'Poppins' }}; font-weight: {{ $_event != null && $_event->font_judul_weight ? $_event->font_judul_weight : '600' }}">
                        {{ $_event != null && $_event->teks_atas ? $_event->teks_atas : 'Jadwal Pernikahan' }}
                    </h1>
                    <p class="text-grey text-bawah"
                        style="color: {{ $_event != null && $_event->color_teks_bawah ? $_event->color_teks_bawah : false }}; font-family: {{ $_event != null && $_event->font_teks ? $_event->font_teks : 'Poppins' }};">
                        {{ $_event != null && $_event->teks_bawah ? $_event->teks_bawah : 'Berikut tanggal pernikahan kami' }}
                    </p>
                </div>
                <div class="col-12 col-lg-8 offset-lg-2 my-auto">
                    <div class="row py-5">
                        <div class="col-md-6 col-xs-6 col-6 text-right" style="padding-right: 7.5px;">
                            <p class="date-events text-bawah-status mb-0"
                                style="color: {{ $_event != null && $_event->color_teks_bawah ? $_event->color_teks_bawah : false }}; font-family: {{ $_event != null && $_event->font_teks ? $_event->font_teks : 'Poppins' }};">
                                {{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('d') }}</p>
                        </div>
                        <div class="col-md-6 col-xs-6 col-6 d-flex align-items-center text-left"
                            style="padding-left: 7.5px; font-family: Source Sans Pro;">
                            <div>
                                <p class="text-grey text-bawah-status m-0" id="day-ijab"
                                    style="color: {{ $_event != null && $_event->color_teks_bawah ? $_event->color_teks_bawah : false }}; font-family: {{ $_event != null && $_event->font_teks ? $_event->font_teks : 'Poppins' }};">
                                    {{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('l') }}
                                </p>
                                <p class="text-grey text-bawah-status m-0"
                                    style="color: {{ $_event != null && $_event->color_teks_bawah ? $_event->color_teks_bawah : false }}; font-family: {{ $_event != null && $_event->font_teks ? $_event->font_teks : 'Poppins' }};">
                                    {{ \Carbon\Carbon::parse($event->tanggal_ijab)->monthName }}</p>
                                <p class="text-grey text-bawah-status m-0"
                                    style="color: {{ $_event != null && $_event->color_teks_bawah ? $_event->color_teks_bawah : false }}; font-family: {{ $_event != null && $_event->font_teks ? $_event->font_teks : 'Poppins' }};">
                                    {{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('Y') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-6 col-12 text-center py-4">
                            <h2 class="title-akad text-bawah-status"
                                style="color: {{ $_event != null && $_event->color_teks_bawah ? $_event->color_teks_bawah : false }}; font-family: {{ $_event != null && $_event->font_judul ? $_event->font_judul : 'Poppins' }}; font-weight: {{ $_event != null && $_event->font_judul_weight ? $_event->font_judul_weight : '600' }}">
                                Akad Nikah</h2>
                            <p class="text-secondari m-2 text-bawah-status"
                                style="color: {{ $_event != null && $_event->color_teks_bawah ? $_event->color_teks_bawah : false }}; font-family: {{ $_event != null && $_event->font_teks ? $_event->font_teks : 'Poppins' }};">
                                {{ $event->jam_mulai_ijab . ' - ' . $event->jam_selesai_ijab }}</p>
                            <p class="text-secondari m-0 text-bawah-status"
                                style="color: {{ $_event != null && $_event->color_teks_bawah ? $_event->color_teks_bawah : false }}; font-family: {{ $_event != null && $_event->font_teks ? $_event->font_teks : 'Poppins' }};">
                                {{ $event->lokasi_ijab }}</p>
                        </div>
                        <div class="col-md-6 col-xs-6 col-12 text-center py-4">
                            <h2 class="title-akad text-bawah-status"
                                style="color: {{ $_event != null && $_event->color_teks_bawah ? $_event->color_teks_bawah : false }}; font-family: {{ $_event != null && $_event->font_judul ? $_event->font_judul : 'Poppins' }}; font-weight: {{ $_event != null && $_event->font_judul_weight ? $_event->font_judul_weight : '600' }}">
                                Resepsi</h2>
                            <p class="text-secondari my-2 text-bawah-status"
                                style="color: {{ $_event != null && $_event->color_teks_bawah ? $_event->color_teks_bawah : false }}; font-family: {{ $_event != null && $_event->font_teks ? $_event->font_teks : 'Poppins' }};">
                                {{ $event->jam_mulai_resepsi . ' - ' . $event->jam_selesai_resepsi }}</p>
                            <p class="text-secondari my-0 text-bawah-status"
                                style="color: {{ $_event != null && $_event->color_teks_bawah ? $_event->color_teks_bawah : false }}; font-family: {{ $_event != null && $_event->font_teks ? $_event->font_teks : 'Poppins' }};">
                                {{ $event->lokasi_resepsi }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="comment"
        class="{{ $comment != null && $comment->perataan ? $comment->perataan : 'text-center' }} {{ $comment != null && $comment->display ? $comment->display : 'd-block' }}"
        style="background: {{ $comment != null && $comment->background ? $comment->background : false }}; background-blend-mode: {{ $comment != null && $comment->overlay ? $comment->overlay : false }}">
        <div class="{{ $comment != null && $comment->container ? $comment->container : 'container' }}">
            <div class="atas">
                <h1 class="text-atas"
                    style="color: {{ $comment != null && $comment->color_teks_atas ? $comment->color_teks_atas : false }}; font-family: {{ $comment != null && $comment->font_judul ? $comment->font_judul : 'Poppins' }}; font-weight: {{ $comment != null && $comment->font_judul_weight ? $comment->font_judul_weight : '600' }}">
                    {{ $comment != null && $comment->teks_atas ? $comment->teks_atas : 'Ucapan Tamu' }}
                </h1>
                <p class="text-grey text-bawah"
                    style="color: {{ $comment != null && $comment->color_teks_bawah ? $comment->color_teks_bawah : false }}; font-family: {{ $comment != null && $comment->font_teks ? $comment->font_teks : 'Poppins' }};">
                    {{ $comment != null && $comment->teks_bawah ? $comment->teks_bawah : 'Berikan ucapan dan doa terbaikmu' }}
                </p>
            </div>
            <div class="row py-5">
                <div class="col-12 col-lg-8 offset-lg-2 my-auto">
                    <form action="{{ route('wishes', ['id' => $event->id]) }}" autocomplete="off" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="Nama" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="email" placeholder="Email" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="text" placeholder="Pesan anda....."
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="text-left">
                                    <button class="btn btn-grey">Send Wish</button>
                                </div>
                                <div class="pt-5">
                                    @if ($data_guestbook)
                                        @foreach ($data_guestbook as $guestbook)
                                            <div id="comment-wrapper" class="text-left">
                                                <p class="comment-name mb-2"
                                                    style="font-weight: bold; color: {{ $comment != null && $comment->color_teks_bawah ? $comment->color_teks_bawah : false }}; font-family: {{ $comment != null && $comment->font_teks ? $comment->font_teks : 'Poppins' }};">
                                                    {{ $guestbook->user->name }}</p>
                                                <p class="comment-text mb-1"
                                                    style="color: {{ $comment != null && $comment->color_teks_bawah ? $comment->color_teks_bawah : false }}; font-family: {{ $comment != null && $comment->font_teks ? $comment->font_teks : 'Poppins' }};">
                                                    {{ $guestbook->text }}</p>
                                                <p class="comment-date text-secondary mb-3"
                                                    style="color: {{ $comment != null && $comment->color_teks_bawah ? $comment->color_teks_bawah : false }}; font-family: {{ $comment != null && $comment->font_teks ? $comment->font_teks : 'Poppins' }};">
                                                    {{ $guestbook->created_at->diffForHumans() }}</p>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section id="footer"
        class="{{ $footer != null && $footer->perataan ? $footer->perataan : 'text-center' }} {{ $footer != null && $footer->display ? $footer->display : 'd-block' }}"
        style="background: {{ $footer != null && $footer->background ? $footer->background : false }}; background-blend-mode: {{ $footer != null && $footer->overlay ? $footer->overlay : false }}">
        <div class="{{ $footer != null && $footer->container ? $footer->container : 'container' }}">
            <div class="row align-items-center">
                <div class="col-12 p-0 col-lg-8 offset-lg-2 my-auto">
                    <p class="m-0 text-atas"
                        style="color: {{ $footer != null && $footer->color_teks_atas ? $footer->color_teks_atas : '#ffffff' }}; color: {{ $footer != null && $footer->font_teks ? $footer->font_teks : 'Poppins' }};">
                        {{ $footer != null && $footer->teks_atas ? $footer->teks_atas : 'Hormat Kami' }}</p>
                    <h1 class="text-bawah"
                        style="color: {{ $footer != null && $footer->color_teks_bawah ? $footer->color_teks_bawah : '#ffffff' }}; font-family: {{ $footer != null && $footer->font_judul ? $footer->font_judul : 'Poppins' }}; font-weight: {{ $footer != null && $footer->font_judul_weight ? $footer->font_judul_weight : '600' }}">
                        {{ $footer != null && $footer->teks_bawah ? $footer->teks_bawah : $event->nama_panggilan_mempelai_pria . ' & ' . $event->nama_panggilan_mempelai_wanita }}
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Panduan -->
    <section id="panduan">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-10 offset-lg-1 my-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="title text-white">Tata Cara Penggunaan Aplikasi Hoofey</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-10 offset-1 col-lg-10 offset-lg-1 my-auto">
                    <div class="row panduan-wrapper">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 py-4">
                            <div class="row">
                                <div class="col-md-6 d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('admin-bsb/images/step-1.png') }}" alt="protokol1"
                                        style="max-width: 100%">
                                </div>
                                <div class="col-md-6 d-flex align-items-center px-1">
                                    <p class="panduan-text text-white">Download Aplikasi Hoofey di Playstore</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 py-4">
                            <div class="row">
                                <div class="col-md-6 d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('admin-bsb/images/step-2.png') }}" alt="protokol1"
                                        style="max-width: 100%">
                                </div>
                                <div class="col-md-6 d-flex align-items-center px-1">
                                    <p class="panduan-text text-white">Login menggunakan akun yang sudah dikirim ke
                                        email kamu</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 py-4">
                            <div class="row">
                                <div class="col-md-6 d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('admin-bsb/images/step-3.png') }}" alt="protokol1"
                                        style="max-width: 100%">
                                </div>
                                <div class="col-md-6 d-flex align-items-center px-1">
                                    <p class="panduan-text text-white">Pilih menu invitation dan pilih undangan</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 py-4">
                            <div class="row">
                                <div class="col-md-6 d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('admin-bsb/images/step-4.png') }}" alt="protokol1"
                                        style="max-width: 100%">
                                </div>
                                <div class="col-md-6 d-flex align-items-center px-1">
                                    <p class="panduan-text text-white">Lihat detail undangan mulai dari nama sampai
                                        lokasi pernikahan</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 py-4">
                            <div class="row">
                                <div class="col-md-6 d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('admin-bsb/images/step-5.png') }}" alt="protokol1"
                                        style="max-width: 100%">
                                </div>
                                <div class="col-md-6 d-flex align-items-center px-1">
                                    <p class="panduan-text text-white">Pilih menu SCAN QR di pojok kanan atas</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 py-4 d-flex align-items-end">
                            <div class="row">
                                <div class="col-md-6 d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('admin-bsb/images/step-6.png') }}" alt="protokol1"
                                        style="max-width: 100%">
                                </div>
                                <div class="col-md-6 d-flex align-items-center px-1">
                                    <p class="panduan-text text-white">Scan QR Code yang telah tersedia di tempat
                                        pernikahan</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 py-4">
                            <div class="row">
                                <div class="col-md-6 d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('admin-bsb/images/step-7.png') }}" alt="protokol1"
                                        style="max-width: 100%">
                                </div>
                                <div class="col-md-6 d-flex align-items-center px-1">
                                    <p class="panduan-text text-white">Setelah Scan QR kamu bisa langsung mengucapkan
                                        pesan</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 py-4">
                            <div class="row">
                                <div class="col-lg-8 col-md-6 d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('admin-bsb/images/step-8.png') }}" alt="protokol1"
                                        style="max-width: 100%">
                                </div>
                                <div class="col-lg-6 col-md-6 d-flex align-items-center px-1 panduan-text-8">
                                    <p class="panduan-text text-white">Pilih tombol camera untuk selfie</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 py-4">
                            <div class="row">
                                <div class="col-md-6 d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('admin-bsb/images/step-9.png') }}" alt="protokol1"
                                        style="max-width: 100%">
                                </div>
                                <div class="col-md-6 d-flex align-items-center px-1">
                                    <p class="panduan-text text-white">Pilih template selfie kesukaanmu dan foto</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 py-4">
                            <div class="row">
                                <div class="col-md-6 d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('admin-bsb/images/step-10.png') }}" alt="protokol1"
                                        style="max-width: 100%">
                                </div>
                                <div class="col-md-6 d-flex align-items-center px-1">
                                    <p class="panduan-text text-white">Kamu juga bisa share dan simpan photo</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Panduan -->
    <!-- Footer -->
    <footer class="page-footer text-center py-3">
        <div class="black-text center-align"><span>Made by</span></div>
        <div class="center-align"><a href="https://hoofey.id"><img src="{{ asset('admin-bsb/images/logo.png') }}"
                    alt="hoofeylogo" width="5%" /></a></div>
    </footer>
    <!-- End: Footer -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"
        integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('plugin/swipebox/js/jquery.swipebox.min.js') }}"></script>
    <!-- Countdown script -->
    <script>
        (function() {

            $('.swipebox').swipebox();

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
</body>

</html>
