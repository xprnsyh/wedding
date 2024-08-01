<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Builder - Hoofey</title>
    {{-- Font google icon --}}
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    {{-- Image Uploader Plugins --}}
    <link rel="stylesheet" href="{{ asset('plugin/image-uploader/image-uploader.css') }}">
    <link rel="stylesheet" href="{{ asset('css/event-builder.css') }}">
    <style>
        #photo_event_form {
            height: 230px;
            padding: 0 8px 0 15px;
            overflow-x: scroll;
        }

        #photo_event_form:hover::-webkit-scrollbar {
            opacity: 1;
        }

        #photo_event_form:hover::-webkit-scrollbar-thumb {
            border-radius: 50px;
            background: #dddddd;
        }

        #photo_event_form::-webkit-scrollbar-track {
            border-radius: 50px;
        }

        #photo_event_form::-webkit-scrollbar {
            opacity: 0;
            width: 7px;
        }

    </style>
</head>

<body>
    <div class="main-wrapper">
        {{-- Sidebar --}}
        <Aside class="sidebar-wrapper active">
            @if (auth()->user()->roles[0]->id == 1)
                <form action="{{ route('admin.event.build.store', ['slug' => $event->slug]) }}" method="POST"
                    enctype="multipart/form-data">
                @elseif (auth()->user()->roles[0]->id == 3)
                    <form action="{{ route('customer.event.build.store', ['slug' => $event->slug]) }}" method="POST"
                        enctype="multipart/form-data">
            @endif
            @csrf
            <input type="hidden" name="event_id" value="{{ $event->id }}">
            <div class="sidebar-head-list">
                <div class="sidebar-header-top">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-lg-3 col-sm-3 col-xs-3">
                            <span class="material-icons" id="slide-back">
                                arrow_back
                            </span>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-xs-6">
                            <h4>Ubah Tampilan</h4>
                        </div>
                        <div class="col-lg-3 col-sm-3 col-xs-3">
                            <button class="btn btn-pink btn-block">
                                Simpan
                            </button>
                        </div>
                    </div>
                </div>
                <div class="sidebar-body-top">
                    <ul>
                        <li id="susunan" class="active">
                            <span class="material-icons">
                                layers
                            </span>
                            <p>Susunan</p>
                        </li>
                        <li id="tema">
                            <span class="material-icons">
                                palette
                            </span>
                            <p>Tema</p>
                        </li>
                        <li id="media">
                            <span class="material-icons">
                                collections
                            </span>
                            <p>Media</p>
                        </li>
                        <li id="pengaturan">
                            <span class="material-icons">
                                settings
                            </span>
                            <p>Pengaturan</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sidebar-body-list">
                <div class="sidebar-body-wrapper">
                    <ul id="susunan-content" class="list-unstyled components d-block">
                        {{-- Hero --}}
                        <li>
                            <div class="kotak-kosong">

                            </div>
                            <span class="material-icons">
                                more_vert
                            </span>
                            <a href="#hero-submenu" data-toggle="collapse" aria-expanded="false">
                                <i class="material-icons panah float-right">
                                    chevron_right
                                </i>
                            </a>
                            <div class="list-wrapper">
                                <div class="btn-slide {{ $hero != null && $hero->display ? false : 'active' }}"
                                    id="hero-slide">
                                    <i class="material-icons">
                                        fiber_manual_record
                                    </i>
                                </div>
                                <a>Hero</a>
                            </div>
                            <ul class="collapse list-unstyled" id="hero-submenu">
                                <li>
                                    <div class="row options">
                                        <div class="col p-0 active" id="content">
                                            <span class="material-icons">
                                                border_color_outlined
                                            </span>
                                            <a>Content</a>
                                        </div>
                                        <div class="col p-0" id="background">
                                            <span class="material-icons">
                                                image
                                            </span>
                                            <a>Background</a>
                                        </div>
                                        <div class="col p-0" id="text">
                                            <span class="material-icons">
                                                text_format
                                            </span>
                                            <a>Text</a>
                                        </div>
                                        <div class="col p-0" id="layout">
                                            <span class="material-icons">
                                                view_quilt
                                            </span>
                                            <a>Layout</a>
                                        </div>
                                        <div class="col p-0" id="pengaturan">
                                            <span class="material-icons">
                                                settings
                                            </span>
                                            <a>Pengaturan</a>
                                        </div>
                                    </div>
                                    <div class="row options form d-block" id="content-hero">
                                        <input type="hidden" name="hero_container"
                                            value="{{ $hero != null && $hero->container ? $hero->container : 'container' }}">
                                        <input type="hidden" name="hero_overlay"
                                            value="{{ $hero != null && $hero->overlay ? $hero->overlay : false }}">
                                        <input type="hidden" name="hero_display"
                                            value="{{ $hero != null && $hero->display ? $hero->display : false }}">
                                        <input type="hidden" name="hero_background_fix">
                                        <input id="hero-perataan-teks" type="hidden" name="hero_perataan"
                                            value="{{ $hero !== null && $hero->perataan ? $hero->perataan : false }}">
                                        <div class="form-group">
                                            <p class="event-title">Gambar Latar</p>
                                        </div>
                                        <div class="fileUpload btn btn btn-grey">
                                            <input type="file" class="upload" name="hero_background">
                                            <span>
                                                <div class="material-icons">
                                                    add
                                                </div>
                                                <p class="event-title">Pilih Gambar</p>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="Judul" class="event-title">Judul</label>
                                            <input type="text" name="hero_teks_judul" class="form-control text-tengah"
                                                placeholder="Type here..."
                                                value="{{ $hero != null && $hero->teks_judul ? $hero->teks_judul : false }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="Teks Atas" class="event-title">Teks Atas</label>
                                            <input type="text" name="hero_teks_atas" class="form-control text-atas"
                                                placeholder="Type here..."
                                                value="{{ $hero != null && $hero->teks_atas ? $hero->teks_atas : false }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="Teks Bawah" class="event-title">Teks Bawah</label>
                                            <input type="text" name="hero_teks_bawah" class="form-control text-bawah"
                                                placeholder="Type here..."
                                                value="{{ $hero != null && $hero->teks_bawah ? $hero->teks_bawah : false }}">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        {{-- End Hero --}}
                        {{-- Invitation --}}
                        <li>
                            <div class="kotak-kosong">

                            </div>
                            <span class="material-icons">
                                more_vert
                            </span>
                            <a href="#invitation-submenu" data-toggle="collapse" aria-expanded="false">
                                <i class="material-icons panah float-right">
                                    chevron_right
                                </i>
                            </a>
                            <div class="list-wrapper">
                                <div class="btn-slide {{ $invitation != null && $invitation->display ? false : 'active' }}"
                                    id="invitation-slide">
                                    <i class="material-icons">
                                        fiber_manual_record
                                    </i>
                                </div>
                                <!-- <a href="#">About</a> -->
                                <a>Invitation</a>
                            </div>
                            <ul class="collapse list-unstyled" id="invitation-submenu">
                                <li>
                                    <div class="row options">
                                        <div class="col p-0 active" id="content">
                                            <span class="material-icons">
                                                border_color_outlined
                                            </span>
                                            <a>Content</a>
                                        </div>
                                        <div class="col p-0" id="background">
                                            <span class="material-icons">
                                                image
                                            </span>
                                            <a>Background</a>
                                        </div>
                                        <div class="col p-0" id="text">
                                            <span class="material-icons">
                                                text_format
                                            </span>
                                            <a>Text</a>
                                        </div>
                                        <div class="col p-0" id="layout">
                                            <span class="material-icons">
                                                view_quilt
                                            </span>
                                            <a>Layout</a>
                                        </div>
                                        <div class="col p-0" id="pengaturan">
                                            <span class="material-icons">
                                                settings
                                            </span>
                                            <a>Pengaturan</a>
                                        </div>
                                    </div>
                                    <div class="row options form d-block" id="content-invitation">
                                        <div class="form-group">
                                            <label for="Judul" class="event-title">Teks Atas</label>
                                            <input type="hidden" name="invitation_container"
                                                value="{{ $invitation != null && $invitation->container ? $invitation->container : 'container' }}">
                                            <input type="hidden" name="invitation_overlay"
                                                value="{{ $invitation != null && $invitation->overlay ? $invitation->overlay : false }}">
                                            <input type="hidden" name="invitation_display"
                                                value="{{ $invitation != null && $invitation->display ? $invitation->display : false }}">
                                            <input type="hidden" name="invitation_background_fix">
                                            <input id="invitation-perataan-teks" type="hidden"
                                                name="invitation_perataan"
                                                value="{{ $invitation !== null && $invitation->perataan ? $invitation->perataan : false }}">
                                            <input type="text" name="invitation_teks_atas"
                                                class="form-control text-atas" placeholder="Type here..."
                                                value="{{ $invitation !== null && $invitation->teks_atas ? $invitation->teks_atas : false }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="Teks" class="event-title">Teks Bawah</label>
                                            <textarea class="form-control text-bawah" name="invitation_teks_bawah"
                                                style="resize: none; font-size: 14px;" cols="30" rows="5"
                                                placeholder="Type here...">{{ $invitation !== null && $invitation->teks_bawah ? $invitation->teks_bawah : false }}</textarea>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        {{-- End Invitation --}}
                        {{-- Countdown --}}
                        <li>
                            <div class="kotak-kosong">

                            </div>
                            <span class="material-icons">
                                more_vert
                            </span>
                            <a href="#countdown-submenu" data-toggle="collapse" aria-expanded="false">
                                <i class="material-icons panah float-right">
                                    chevron_right
                                </i>
                            </a>
                            <div class="list-wrapper">
                                <div class="btn-slide {{ $countdown != null && $countdown->display ? false : 'active' }}"
                                    id="countdown-slide">
                                    <i class="material-icons">
                                        fiber_manual_record
                                    </i>
                                </div>
                                <!-- <a href="#">About</a> -->
                                <a>Countdown</a>
                            </div>
                            <ul class="collapse list-unstyled" id="countdown-submenu">
                                <li>
                                    <div class="row options">
                                        <div class="col p-0 active" id="content">
                                            <span class="material-icons">
                                                border_color_outlined
                                            </span>
                                            <a>Content</a>
                                        </div>
                                        <div class="col p-0" id="background">
                                            <span class="material-icons">
                                                image
                                            </span>
                                            <a>Background</a>
                                        </div>
                                        <div class="col p-0" id="text">
                                            <span class="material-icons">
                                                text_format
                                            </span>
                                            <a>Text</a>
                                        </div>
                                        <div class="col p-0" id="layout">
                                            <span class="material-icons">
                                                view_quilt
                                            </span>
                                            <a>Layout</a>
                                        </div>
                                        <div class="col p-0" id="pengaturan">
                                            <span class="material-icons">
                                                settings
                                            </span>
                                            <a>Pengaturan</a>
                                        </div>
                                    </div>
                                    <div class="row options form d-block" id="content-countdown">
                                        <div class="form-group">
                                            <div class="btn-slide active">
                                                <i class="material-icons">
                                                    fiber_manual_record
                                                </i>
                                            </div>
                                            <div class="text-btn-slide active ml-5">
                                                <p>Tampilkan Gambar</p>
                                                <p class="text-secondary">Default: "Save the Date", atau upload
                                                    gambar dibawah</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <p class="event-title">Gambar Latar</p>
                                        </div>
                                        <div class="fileUpload btn btn btn-grey">
                                            <input type="hidden" name="countdown_container"
                                                value="{{ $countdown != null && $countdown->container ? $countdown->container : 'container' }}">
                                            <input type="hidden" name="countdown_overlay"
                                                value="{{ $countdown != null && $countdown->overlay ? $countdown->overlay : false }}">
                                            <input type="hidden" name="countdown_display"
                                                value="{{ $countdown != null && $countdown->display ? $countdown->display : false }}">
                                            <input type="hidden" name="countdown_background_fix">
                                            <input id="countdown-perataan-teks" type="hidden" name="countdown_perataan"
                                                value="{{ $countdown !== null && $countdown->perataan ? $countdown->perataan : false }}">
                                            <input type="file" class="upload" name="countdown_background">
                                            <span>
                                                <div class="material-icons">
                                                    add
                                                </div>
                                                <p class="event-title">Pilih Gambar</p>
                                            </span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        {{-- End Countdown --}}
                        {{-- Maps --}}
                        <li>
                            <div class="kotak-kosong">

                            </div>
                            <span class="material-icons">
                                more_vert
                            </span>
                            <a href="#maps-submenu" data-toggle="collapse" aria-expanded="false">
                                <i class="material-icons panah float-right">
                                    chevron_right
                                </i>
                            </a>
                            <div class="list-wrapper">
                                <div class="btn-slide {{ $maps != null && $maps->display ? false : 'active' }}"
                                    id="maps-slide">
                                    <i class="material-icons">
                                        fiber_manual_record
                                    </i>
                                </div>
                                <a>Maps</a>
                            </div>
                            <ul class="collapse list-unstyled" id="maps-submenu">
                                <li>
                                    <div class="row options">
                                        <div class="col p-0 active" id="content">
                                            <span class="material-icons">
                                                border_color_outlined
                                            </span>
                                            <a>Content</a>
                                        </div>
                                        <div class="col p-0" id="background">
                                            <span class="material-icons">
                                                image
                                            </span>
                                            <a>Background</a>
                                        </div>
                                        <div class="col p-0" id="text">
                                            <span class="material-icons">
                                                text_format
                                            </span>
                                            <a>Text</a>
                                        </div>
                                        <div class="col p-0" id="layout">
                                            <span class="material-icons">
                                                view_quilt
                                            </span>
                                            <a>Layout</a>
                                        </div>
                                        <div class="col p-0" id="pengaturan">
                                            <span class="material-icons">
                                                settings
                                            </span>
                                            <a>Pengaturan</a>
                                        </div>
                                    </div>
                                    <div class="row options form d-block" id="content-maps">
                                        <div class="form-group">
                                            <label for="Judul" class="event-title">Judul</label>
                                            <input type="hidden" name="maps_container"
                                                value="{{ $maps != null && $maps->container ? $maps->container : 'container' }}">
                                            <input type="hidden" name="maps_overlay"
                                                value="{{ $maps != null && $maps->overlay ? $maps->overlay : false }}">
                                            <input type="text" class="form-control text-atas" name="maps_teks_atas"
                                                placeholder="Type here..."
                                                value="{{ $maps !== null && $maps->teks_atas ? $maps->teks_atas : false }}">
                                            <input type="hidden" name="maps_display"
                                                value="{{ $maps != null && $maps->display ? $maps->display : false }}">
                                            <input type="hidden" name="maps_background_fix">
                                            <input id="maps-perataan-teks" type="hidden" name="maps_perataan"
                                                value="{{ $maps !== null && $maps->perataan ? $maps->perataan : false }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="Text" class="event-title">Text</label>
                                            <input type="text" class="form-control text-tengah" name="maps_teks_tengah"
                                                placeholder="Type here..."
                                                value="{{ $maps !== null && $maps->teks_bawah ? $maps->teks_bawah : false }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="Iframe" class="event-title">Iframe</label>
                                            <textarea class="form-control text-bawah" name="iframe_maps"
                                                style="resize: none; font-size: 14px;" cols="30" rows="5"
                                                placeholder="Type here...">{{ $maps !== null && $maps->iframe_maps ? $maps->iframe_maps : false }}</textarea>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        {{-- End Maps --}}
                        {{-- Gallery --}}
                        <li>
                            <div class="kotak-kosong">

                            </div>
                            <span class="material-icons">
                                more_vert
                            </span>
                            <a href="#gallery-submenu" data-toggle="collapse" aria-expanded="false">
                                <i class="material-icons panah float-right">
                                    chevron_right
                                </i>
                            </a>
                            <div class="list-wrapper">
                                <div class="btn-slide {{ $gallery != null && $gallery->display ? false : 'active' }}"
                                    id="gallery-slide">
                                    <i class="material-icons">
                                        fiber_manual_record
                                    </i>
                                </div>
                                <!-- <a href="#">About</a> -->
                                <a>Gallery</a>
                            </div>
                            <ul class="collapse list-unstyled" id="gallery-submenu">
                                <li>
                                    <div class="row options">
                                        <div class="col p-0 active" id="content">
                                            <span class="material-icons">
                                                border_color_outlined
                                            </span>
                                            <a>Content</a>
                                        </div>
                                        <div class="col p-0" id="background">
                                            <span class="material-icons">
                                                image
                                            </span>
                                            <a>Background</a>
                                        </div>
                                        <div class="col p-0" id="text">
                                            <span class="material-icons">
                                                text_format
                                            </span>
                                            <a>Text</a>
                                        </div>
                                        <div class="col p-0" id="layout">
                                            <span class="material-icons">
                                                view_quilt
                                            </span>
                                            <a>Layout</a>
                                        </div>
                                        <div class="col p-0" id="pengaturan">
                                            <span class="material-icons">
                                                settings
                                            </span>
                                            <a>Pengaturan</a>
                                        </div>
                                    </div>
                                    <div class="row options form d-block" id="content-gallery">
                                        <div class="form-group">
                                            <label for="Judul" class="event-title">Judul</label>
                                            <input type="hidden" name="gallery_container"
                                                value="{{ $gallery != null && $gallery->container ? $gallery->container : 'container' }}">
                                            <input type="hidden" name="gallery_overlay"
                                                value="{{ $gallery != null && $gallery->overlay ? $gallery->overlay : false }}">
                                            <input type="hidden" name="gallery_display"
                                                value="{{ $gallery != null && $gallery->display ? $gallery->display : false }}">
                                            <input type="hidden" name="gallery_background_fix">
                                            <input id="gallery-perataan-teks" type="hidden" name="gallery_perataan"
                                                value="{{ $gallery !== null && $gallery->perataan ? $gallery->perataan : false }}">
                                            <input type="text" name="gallery_teks_atas"
                                                value="{{ $gallery !== null && $gallery->teks_atas ? $gallery->teks_atas : false }}"
                                                class="form-control text-atas" placeholder="Type here...">
                                        </div>
                                        <div class="form-group">
                                            <label for="Teks" class="event-title">Teks</label>
                                            <textarea class="form-control text-bawah" name="gallery_teks_tengah"
                                                style="resize: none; font-size: 14px;" cols="30" rows="5"
                                                placeholder="Type here...">{{ $gallery !== null && $gallery->teks_bawah ? $gallery->teks_bawah : false }}</textarea>
                                        </div>
                                        <div class="fileUpload btn btn btn-grey mt-3">
                                            <input type="file" class="upload" name="gallery_background">
                                            <span>
                                                <div class="material-icons">
                                                    add
                                                </div>
                                                <p class="event-title">Pilih Gambar</p>
                                            </span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        {{-- End Gallery --}}
                        {{-- Live Streaming --}}
                        <li>
                            <div class="kotak-kosong">

                            </div>
                            <span class="material-icons">
                                more_vert
                            </span>
                            <a href="#streaming-submenu" data-toggle="collapse" aria-expanded="false">
                                <i class="material-icons panah float-right">
                                    chevron_right
                                </i>
                            </a>
                            <div class="list-wrapper">
                                <div class="btn-slide {{ $streaming != null && $streaming->display ? false : 'active' }}"
                                    id="streaming-slide">
                                    <i class="material-icons">
                                        fiber_manual_record
                                    </i>
                                </div>
                                <a>Live Streaming</a>
                            </div>
                            <ul class="collapse list-unstyled" id="streaming-submenu">
                                <li>
                                    <div class="row options">
                                        <div class="col p-0 active" id="content">
                                            <span class="material-icons">
                                                border_color_outlined
                                            </span>
                                            <a>Content</a>
                                        </div>
                                        <div class="col p-0" id="background">
                                            <span class="material-icons">
                                                image
                                            </span>
                                            <a>Background</a>
                                        </div>
                                        <div class="col p-0" id="text">
                                            <span class="material-icons">
                                                text_format
                                            </span>
                                            <a>Text</a>
                                        </div>
                                        <div class="col p-0" id="layout">
                                            <span class="material-icons">
                                                view_quilt
                                            </span>
                                            <a>Layout</a>
                                        </div>
                                        <div class="col p-0" id="pengaturan">
                                            <span class="material-icons">
                                                settings
                                            </span>
                                            <a>Pengaturan</a>
                                        </div>
                                    </div>
                                    <div class="row options form d-block" id="content-streaming">
                                        <div class="form-group">
                                            <label for="Judul" class="event-title">Teks Atas</label>
                                            <input type="hidden" name="streaming_container"
                                                value="{{ $streaming != null && $streaming->container ? $streaming->container : 'container' }}">
                                            <input type="hidden" name="streaming_overlay"
                                                value="{{ $streaming != null && $streaming->overlay ? $streaming->overlay : false }}">
                                            <input type="hidden" name="streaming_display"
                                                value="{{ $streaming != null && $streaming->display ? $streaming->display : false }}">
                                            <input type="text" class="form-control text-atas"
                                                name="streaming_teks_atas" placeholder="Type here..."
                                                value="{{ $streaming !== null && $streaming->teks_atas ? $streaming->teks_atas : false }}">
                                            <input type="hidden" name="streaming_background_fix">
                                            <input id="streaming-perataan-teks" type="hidden" name="streaming_perataan"
                                                value="{{ $streaming !== null && $streaming->perataan ? $streaming->perataan : false }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="Teks" class="event-title">Teks Bawah</label>
                                            <input class="form-control text-tengah"
                                                style="resize: none; font-size: 14px;" cols="30" rows="5"
                                                placeholder="Type here..." name="streaming_teks_tengah"
                                                value="{{ $streaming !== null && $streaming->teks_bawah ? $streaming->teks_bawah : false }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="Teks" class="event-title">Link Streaming</label>
                                            <textarea class="form-control text-bawah" name="iframe_streaming"
                                                style="resize: none; font-size: 14px;" cols="30" rows="5"
                                                placeholder="Type here...">{{ $streaming !== null && $streaming->iframe_streaming ? $streaming->iframe_streaming : false }}</textarea>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        {{-- End Live Streaming --}}
                        {{-- Videos --}}
                        <li>
                            <div class="kotak-kosong">

                            </div>
                            <span class="material-icons">
                                more_vert
                            </span>
                            <a href="#videos-submenu" data-toggle="collapse" aria-expanded="false">
                                <i class="material-icons panah float-right">
                                    chevron_right
                                </i>
                            </a>
                            <div class="list-wrapper">
                                <div class="btn-slide {{ $videos != null && $videos->display ? false : 'active' }}"
                                    id="videos-slide">
                                    <i class="material-icons">
                                        fiber_manual_record
                                    </i>
                                </div>
                                <a>Videos</a>
                            </div>
                            <ul class="collapse list-unstyled" id="videos-submenu">
                                <li>
                                    <div class="row options">
                                        <div class="col p-0 active" id="content">
                                            <span class="material-icons">
                                                border_color_outlined
                                            </span>
                                            <a>Content</a>
                                        </div>
                                        <div class="col p-0" id="background">
                                            <span class="material-icons">
                                                image
                                            </span>
                                            <a>Background</a>
                                        </div>
                                        <div class="col p-0" id="text">
                                            <span class="material-icons">
                                                text_format
                                            </span>
                                            <a>Text</a>
                                        </div>
                                        <div class="col p-0" id="layout">
                                            <span class="material-icons">
                                                view_quilt
                                            </span>
                                            <a>Layout</a>
                                        </div>
                                        <div class="col p-0" id="pengaturan">
                                            <span class="material-icons">
                                                settings
                                            </span>
                                            <a>Pengaturan</a>
                                        </div>
                                    </div>
                                    <div class="row options form d-block" id="content-videos">
                                        <div class="form-group">
                                            <label for="Judul" class="event-title">Judul</label>
                                            <input type="hidden" name="videos_background_fix">
                                            <input id="videos_container" type="hidden" name="videos_container"
                                                value="{{ $videos != null && $videos->container ? $videos->container : 'container' }}">
                                            <input id="videos_overlay" type="hidden" name="videos_overlay"
                                                value="{{ $videos != null && $videos->overlay ? $videos->overlay : false }}">
                                            <input id="videos_display" type="hidden" name="videos_display"
                                                value="{{ $videos != null && $videos->display ? $videos->display : false }}">
                                            <input id="videos-perataan-teks" type="hidden" name="videos_perataan"
                                                value="{{ $videos !== null && $videos->perataan ? $videos->perataan : false }}">
                                            <input type="text" name="videos_teks_atas" class="form-control text-atas"
                                                placeholder="Type here..."
                                                value="{{ $videos !== null && $videos->teks_atas ? $videos->teks_atas : false }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="Teks" class="event-title">Teks</label>
                                            <input class="form-control text-tengah"
                                                style="resize: none; font-size: 14px;" cols="30" rows="5"
                                                name="videos_teks_tengah"
                                                value="{{ $videos !== null && $videos->teks_bawah ? $videos->teks_bawah : false }}"
                                                placeholder="Type here...">
                                        </div>
                                        <div class="form-group">
                                            <label for="Teks" class="event-title">Iframe Video</label>
                                            <textarea class="form-control text-bawah" name="iframe_videos"
                                                style="resize: none; font-size: 14px;" cols="30" rows="5"
                                                placeholder="Type here...">{{ $videos !== null && $videos->iframe_videos ? $videos->iframe_videos : false }}</textarea>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        {{-- End Videos --}}
                        {{-- Event --}}
                        <li>
                            <div class="kotak-kosong">

                            </div>
                            <span class="material-icons">
                                more_vert
                            </span>
                            <a href="#event-submenu" data-toggle="collapse" aria-expanded="false">
                                <i class="material-icons panah float-right">
                                    chevron_right
                                </i>
                            </a>
                            <div class="list-wrapper">
                                <div class="btn-slide {{ $_event != null && $_event->display ? false : 'active' }}"
                                    id="event-slide">
                                    <i class="material-icons">
                                        fiber_manual_record
                                    </i>
                                </div>
                                <a>Event</a>
                            </div>
                            <ul class="collapse list-unstyled" id="event-submenu">
                                <li>
                                    <div class="row options">
                                        <div class="col p-0 active" id="content">
                                            <span class="material-icons">
                                                border_color_outlined
                                            </span>
                                            <a>Content</a>
                                        </div>
                                        <div class="col p-0" id="background">
                                            <span class="material-icons">
                                                image
                                            </span>
                                            <a>Background</a>
                                        </div>
                                        <div class="col p-0" id="text">
                                            <span class="material-icons">
                                                text_format
                                            </span>
                                            <a>Text</a>
                                        </div>
                                        <div class="col p-0" id="layout">
                                            <span class="material-icons">
                                                view_quilt
                                            </span>
                                            <a>Layout</a>
                                        </div>
                                        <div class="col p-0" id="pengaturan">
                                            <span class="material-icons">
                                                settings
                                            </span>
                                            <a>Pengaturan</a>
                                        </div>
                                    </div>
                                    <div class="row options form d-block" id="content-event">
                                        <div class="form-group">
                                            <label for="Judul" class="event-title">Judul</label>
                                            <input type="hidden" name="event_background_fix">
                                            <input id="event-container" type="hidden" name="event_container"
                                                value="{{ $_event != null && $_event->container ? $_event->container : 'container' }}">
                                            <input id="event-overlay" type="hidden" name="event_overlay"
                                                value="{{ $_event != null && $_event->overlay ? $_event->overlay : false }}">
                                            <input id="event-display" type="hidden" name="event_display"
                                                value="{{ $_event != null && $_event->display ? $_event->display : false }}">
                                            <input id="event-perataan-teks" type="hidden" name="event_perataan"
                                                value="{{ $_event !== null && $_event->perataan ? $_event->perataan : false }}">
                                            <input type="text" name="event_teks_atas" class="form-control text-atas"
                                                placeholder="Type here..."
                                                value="{{ $_event !== null && $_event->teks_atas ? $_event->teks_atas : false }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="Teks" class="event-title">Teks</label>
                                            <textarea class="form-control text-bawah" name="event_teks_bawah"
                                                style="resize: none; font-size: 14px;" cols="30" rows="5"
                                                placeholder="Type here...">{{ $_event !== null && $_event->teks_bawah ? $_event->teks_bawah : false }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="btn-slide active">
                                                <i class="material-icons">
                                                    fiber_manual_record
                                                </i>
                                            </div>
                                            <div class="text-btn-slide active ml-5">
                                                <p>Tampilkan Tombol Kalender</p>
                                                <p class="text-secondary">Direct ke google calendar</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        {{-- End Event --}}
                        {{-- Comments --}}
                        <li>
                            <div class="kotak-kosong">

                            </div>
                            <span class="material-icons">
                                more_vert
                            </span>
                            <a href="#comment-submenu" data-toggle="collapse" aria-expanded="false">
                                <i class="material-icons panah float-right">
                                    chevron_right
                                </i>
                            </a>
                            <div class="list-wrapper">
                                <div class="btn-slide {{ $comment != null && $comment->display ? false : 'active' }}"
                                    id="comment-slide">
                                    <i class="material-icons">
                                        fiber_manual_record
                                    </i>
                                </div>
                                <a>Comments</a>
                            </div>
                            <ul class="collapse list-unstyled" id="comment-submenu">
                                <li>
                                    <div class="row options">
                                        <div class="col p-0 active" id="content">
                                            <span class="material-icons">
                                                border_color_outlined
                                            </span>
                                            <a>Content</a>
                                        </div>
                                        <div class="col p-0" id="background">
                                            <span class="material-icons">
                                                image
                                            </span>
                                            <a>Background</a>
                                        </div>
                                        <div class="col p-0" id="text">
                                            <span class="material-icons">
                                                text_format
                                            </span>
                                            <a>Text</a>
                                        </div>
                                        <div class="col p-0" id="layout">
                                            <span class="material-icons">
                                                view_quilt
                                            </span>
                                            <a>Layout</a>
                                        </div>
                                        <div class="col p-0" id="pengaturan">
                                            <span class="material-icons">
                                                settings
                                            </span>
                                            <a>Pengaturan</a>
                                        </div>
                                    </div>
                                    <div class="row options form d-block" id="content-comment">
                                        <div class="form-group">
                                            <label for="Judul" class="event-title">Judul</label>
                                            <input type="hidden" name="comment_container"
                                                value="{{ $comment != null && $comment->container ? $comment->container : 'container' }}">
                                            <input type="hidden" name="comment_overlay"
                                                value="{{ $comment != null && $comment->overlay ? $comment->overlay : false }}">
                                            <input type="hidden" name="comment_display"
                                                value="{{ $comment != null && $comment->display ? $comment->display : false }}">
                                            <input type="text" name="comment_teks_atas" class="form-control text-atas"
                                                placeholder="Type here..."
                                                value="{{ $comment !== null && $comment->teks_atas ? $comment->teks_atas : false }}">
                                            <input type="hidden" name="comment_background_fix">
                                            <input id="comment-perataan-teks" type="hidden" name="comment_perataan"
                                                value="{{ $comment !== null && $comment->perataan ? $comment->perataan : false }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="Teks" class="event-title">Teks</label>
                                            <textarea class="form-control text-bawah" name="comment_teks_bawah"
                                                style="resize: none; font-size: 14px;" cols="30" rows="5"
                                                placeholder="Type here...">{{ $comment !== null && $comment->teks_bawah ? $comment->teks_bawah : false }}</textarea>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        {{-- End Comments --}}
                        {{-- Footer --}}
                        <li>
                            <div class="kotak-kosong">

                            </div>
                            <span class="material-icons">
                                more_vert
                            </span>
                            <a href="#footer-submenu" data-toggle="collapse" aria-expanded="false">
                                <i class="material-icons panah float-right">
                                    chevron_right
                                </i>
                            </a>
                            <div class="list-wrapper">
                                <div class="btn-slide {{ $footer != null && $footer->display ? false : 'active' }}"
                                    id="footer-slide">
                                    <i class="material-icons">
                                        fiber_manual_record
                                    </i>
                                </div>
                                <a>Footer</a>
                            </div>
                            <ul class="collapse list-unstyled" id="footer-submenu">
                                <li>
                                    <div class="row options">
                                        <div class="col p-0 active" id="content">
                                            <span class="material-icons">
                                                border_color_outlined
                                            </span>
                                            <a>Content</a>
                                        </div>
                                        <div class="col p-0" id="background">
                                            <span class="material-icons">
                                                image
                                            </span>
                                            <a>Background</a>
                                        </div>
                                        <div class="col p-0" id="text">
                                            <span class="material-icons">
                                                text_format
                                            </span>
                                            <a>Text</a>
                                        </div>
                                        <div class="col p-0" id="layout">
                                            <span class="material-icons">
                                                view_quilt
                                            </span>
                                            <a>Layout</a>
                                        </div>
                                        <div class="col p-0" id="pengaturan">
                                            <span class="material-icons">
                                                settings
                                            </span>
                                            <a>Pengaturan</a>
                                        </div>
                                    </div>
                                    <div class="row options form d-block" id="content-footer">
                                        <div class="form-group">
                                            <label for="Judul" class="event-title">Judul</label>
                                            <input type="hidden" name="footer_container"
                                                value="{{ $footer != null && $footer->container ? $footer->container : 'container' }}">
                                            <input type="hidden" name="footer_overlay"
                                                value="{{ $footer != null && $footer->overlay ? $footer->overlay : false }}">
                                            <input type="hidden" name="footer_display"
                                                value="{{ $footer != null && $footer->display ? $footer->display : false }}">
                                            <input type="text" name="footer_teks_atas" class="form-control text-atas"
                                                placeholder="Type here..."
                                                value="{{ $footer !== null && $footer->teks_atas ? $footer->teks_atas : false }}">
                                            <input type="hidden" name="footer_background_fix">
                                            <input id="footer-perataan-teks" type="hidden" name="footer_perataan"
                                                value="{{ $footer !== null && $footer->perataan ? $footer->perataan : false }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="Teks" class="event-title">Teks</label>
                                            <textarea class="form-control text-bawah" name="footer_teks_bawah"
                                                style="resize: none; font-size: 14px;" cols="30" rows="5"
                                                placeholder="Type here...">{{ $footer !== null && $footer->teks_bawah ? $footer->teks_bawah : false }}</textarea>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        {{-- End Footer --}}
                    </ul>
                    <ul id="tema-content" class="list-unstyled components d-none">
                        <li>
                            <div class="event-title">
                                <p>Palet Warna</p>
                            </div>
                            <div class="event-content">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6 col-6 mb-3">
                                        <div class="color color-background">
                                            <div>
                                                <input type="color" name="color-background" value="#236CC1"
                                                    id="tema-color-background">
                                            </div>
                                            <p></p>
                                        </div>
                                        <div class="color-text">
                                            Background
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6 col-6 mb-3">
                                        <div class="color color-primary">
                                            <div>
                                                <input type="color" name="color-primary" value="#F17193"
                                                    id="tema-color-primary">
                                            </div>
                                            <p></p>
                                        </div>
                                        <div class="color-text">
                                            Brand Primary
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6 col-6 mb-3">
                                        <div class="color color-heading-text">
                                            <div>
                                                <input type="color" name="color-heading" value="#3E3E3E"
                                                    id="tema-color-heading-text">
                                            </div>
                                            <p></p>
                                        </div>
                                        <div class="color-text">
                                            Heading Text
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6 col-6 mb-3">
                                        <div class="color color-light">
                                            <div>
                                                <input type="color" name="color-light" value="#F7ADAF"
                                                    id="tema-color-light">
                                            </div>
                                            <p></p>
                                        </div>
                                        <div class="color-text">
                                            Brand Light
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6 col-6 mb-3">
                                        <div class="color color-body-text">
                                            <div>
                                                <input type="color" name="color-body-text" value="#999999"
                                                    id="tema-color-body-text">
                                            </div>
                                            <p></p>
                                        </div>
                                        <div class="color-text">
                                            Body Text
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6 col-6 mb-3">
                                        <div class="color color-dark">
                                            <div>
                                                <input type="color" name="color-dark" value="#F54291"
                                                    id="tema-color-dark">
                                            </div>
                                            <p></p>
                                        </div>
                                        <div class="color-text">
                                            Brand Dark
                                        </div>
                                    </div>
                                </div>
                                <div class="row options form d-block">
                                    <div class="form-group">
                                        <p class="event-title">Gambar Latar</p>
                                    </div>
                                    <div class="fileUpload btn btn btn-grey">
                                        <input type="file" class="upload">
                                        <span>
                                            <div class="material-icons">
                                                add
                                            </div>
                                            <p class="event-title">Pilih Gambar</p>
                                        </span>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="form-group w-100">
                                                <label for="Judul" class="event-title">Font Judul</label>
                                                <select name="font_judul" id="FontJudul" class="form-control">
                                                    <option value=""
                                                        {{ $hero !== null && $hero->font_judul == null ? 'selected' : false }}>
                                                        -= Choose Font Judul =-</option>
                                                    <option value="Poppins"
                                                        {{ $hero !== null && $hero->font_judul == 'Poppins' ? 'selected' : false }}>
                                                        Poppins</option>
                                                    <option value="Lato"
                                                        {{ $hero !== null && $hero->font_judul == 'Lato' ? 'selected' : false }}>
                                                        Lato</option>
                                                    <option value="Dancing Script"
                                                        {{ $hero !== null && $hero->font_judul == 'Dancing Script' ? 'selected' : false }}>
                                                        Dancing Script</option>
                                                    <option value="Merienda"
                                                        {{ $hero !== null && $hero->font_judul == 'Merienda' ? 'selected' : false }}>
                                                        Merienda</option>
                                                    <option value="Parisienne"
                                                        {{ $hero !== null && $hero->font_judul == 'Parisienne' ? 'selected' : false }}>
                                                        Parisienne</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="form-group w-100">
                                                <label for="Judul" class="event-title">Ketebalan</label>
                                                <select name="font_judul_weight" id="FontJudul" class="form-control">
                                                    <option value=""
                                                        {{ $hero !== null && $hero->font_judul_weight == null ? 'selected' : false }}>
                                                        -= Choose Font Weight =-</option>
                                                    <option value="400"
                                                        {{ $hero !== null && $hero->font_judul_weight == 400 ? 'selected' : false }}>
                                                        400</option>
                                                    <option value="500"
                                                        {{ $hero !== null && $hero->font_judul_weight == 500 ? 'selected' : false }}>
                                                        500</option>
                                                    <option value="600"
                                                        {{ $hero !== null && $hero->font_judul_weight == 600 ? 'selected' : false }}>
                                                        600</option>
                                                    <option value="700"
                                                        {{ $hero !== null && $hero->font_judul_weight == 700 ? 'selected' : false }}>
                                                        700</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="FontTeks" class="event-title">Font Teks</label>
                                        <select name="font_teks" id="FontTeks" class="form-control">
                                            <option value=""
                                                {{ $hero !== null && $hero->font_judul == null ? 'selected' : false }}
                                                disabled>-= Select Font =-</option>
                                            <option value="Poppins"
                                                {{ $hero !== null && $hero->font_teks == 'Poppins' ? 'selected' : false }}>
                                                Poppins</option>
                                            <option value="Lato"
                                                {{ $hero !== null && $hero->font_teks == 'Lato' ? 'selected' : false }}>
                                                Lato</option>
                                            <option value="Merienda"
                                                {{ $hero !== null && $hero->font_teks == 'Merienda' ? 'selected' : false }}>
                                                Merienda</option>
                                            <option value="Josefin Sans"
                                                {{ $hero !== null && $hero->font_teks == 'Josefin Sans' ? 'selected' : false }}>
                                                Josefin Sans</option>
                                            <option value="Kalam"
                                                {{ $hero !== null && $hero->font_teks == 'Kalam' ? 'selected' : false }}>
                                                Kalam</option>
                                            <option value="Handlee"
                                                {{ $hero !== null && $hero->font_teks == 'Handlee' ? 'selected' : false }}>
                                                Handlee</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul id="media-content" class="list-unstyled components d-none">
                        <li>
                            <div class="form-group mt-3">
                                <p class="event-title">Upload Gambar</p>
                            </div>
                            <div class="row options form">
                                <div class="input-images" style="width: 100%;"></div>
                                {{-- <input type="file" name="images-gallery[]" id="gallery-images" multiple="multiple"> --}}
                            </div>
                        </li>
                        <li id="photo_event_form">
                            <div class="container">
                                <div class="row">
                                    @foreach ($photo_event as $photo)
                                        <div class="col-md-4 col-6 px-1 py-1" style="position: relative">
                                            @if (auth()->user()->roles[0]->id == 1)
                                                <a href="{{ route('admin.delete.photo.event', ['id' => $photo['id']]) }}"
                                                    style="cursor: pointer; position: absolute; top: 0; right: 0; ">
                                                @elseif(auth()->user()->roles[0]->id == 3)
                                                    <a href="{{ route('customer.delete.photo.event', ['id' => $photo['id']]) }}"
                                                        style="cursor: pointer; position: absolute; top: 0; right: 0; ">

                                            @endif
                                            <i class=" material-icons"
                                                style="font-size: 16px; background: #f7adaf; color: #ffffff; padding: 5px; border-radius: 50%;"">delete</i>
                                                </a>
                                                <img src=" {{ asset($photo['path']) }}" style="width: 100%" alt="">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul id="pengaturan-content" class="list-unstyled components d-none">
                        <li class="px-0 pl-2">
                            <div class="row options form d-block">
                                <div class="form-group w-100">
                                    <label for="Bahasa" class="event-title">Bahasa</label>
                                    <select name="bahasa" id="Bahasa" class="form-control">
                                        <option value="#">Bahasa Indonesia</option>
                                    </select>
                                </div>
                                <div class="form-group w-100">
                                    <label for="Musik" class="event-title">Musik</label>
                                    <select name="audio_id" id="audio_id" class="form-control">
                                        @foreach ($data_audio as $audio)
                                            <option value="" {{ $event->audio_id == null ? 'selected' : '' }}
                                                disabled>None</option>
                                            <option value="{{ $audio->id }}"
                                                {{ $event->audio_id == $audio->id ? 'selected' : '' }}>
                                                {{ $audio->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            </form>
        </Aside>
        {{-- End Sidebar --}}

        {{-- Content --}}
        <section class="content">
            <div class="row m-0">
                <div class="col-md-2 preview-options">
                    <i class="material-icons d-none" id="slide-forward">
                        arrow_forward
                    </i>
                    <span class="material-icons active" id="desktop">
                        tv
                    </span>
                    <span class="material-icons" id="tablet">
                        tablet_android
                    </span>
                    <span class="material-icons" id="mobile">
                        phone_android
                    </span>
                </div>
                <div class="col-md-8 p-0">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control"
                            placeholder="{{ route('admin.event.build', ['slug' => $event->slug]) }}"
                            aria-label="Recipient's username" aria-describedby="basic-addon2" disabled>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary material-icons" type="button">
                                refresh
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 text-right">
                    <a href="{{ route('event-builder', ['slug' => $event->slug]) }}" target="_blank">
                        <button class="btn btn-grey">
                            Buka Website
                        </button>
                    </a>
                </div>
            </div>
            <div class="row p-0 mt-4">
                <div class="col-md-12 d-flex justify-content-center mt-4">
                    <div class="embed-responsive preview-desktop" id="preview-options-show">
                        <iframe class="embed-responsive-item"
                            src="{{ route('event-builder', ['slug' => $event->slug]) }}"></iframe>
                    </div>
                </div>
            </div>
        </section>
        {{-- End Content --}}
    </div>
    <!-- Javascript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"
        integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('plugin/image-uploader/image-uploader.js') }}"></script>
    <script>
        $('document').ready(function() {
            $(`iframe.embed-responsive-item`).contents().find('audio').remove();
        })
        $('.input-images').imageUploader({
            extensions: ['.jpg', '.jpeg', '.png', '.gif', '.svg'],
            mimes: ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml'],
            maxFiles: 9,
            maxSize: 2 * 1024 * 1024,

        });
        // Dropdown menu
        $('a .material-icons.panah').on('click', function() {
            $(this).toggleClass('rotate-90');
        });
        // console.log($('.image-uploader.has-files .uploaded-image img').attr('src'))
        // Color Picker Tema Tab
        $('input#tema-color-primary').on('change', function() {
            const color = $(this).val();
            $('.color.color-primary').css('background', color);
            $(`iframe.embed-responsive-item`).contents().find('#hero').addClass('brand-primary color-primary');
            $('input[name="hero_background_color"]').val(color);
            $('input[name="hero_background_fix"]').val(color);
            // console.log($('input[name="hero_background_fix"]').val(color));
            $(`iframe.embed-responsive-item`).contents().find('.brand-primary.color-primary').css('background',
                color);
            $(`iframe.embed-responsive-item`).contents().find('.nama-pengantin-wanita').css('color', color);
            $(`iframe.embed-responsive-item`).contents().find('.nama-pengantin-pria').css('color', color);
        });
        $('input#tema-color-background').on('change', function() {
            const color = $(this).val();
            $('.color.color-background').css('background', color);
            $(`iframe.embed-responsive-item`).contents().find('#hero').addClass(
                'brand-background color-background');
            $('input[name="hero_background_fix"]').val(color);
            $(`iframe.embed-responsive-item`).contents().find('#streaming').addClass(
                'brand-background color-background');
            $('input[name="streaming_background_fix"]').val(color);
            $(`iframe.embed-responsive-item`).contents().find('#gallery').addClass(
                'brand-background color-background');
            $('input[name="gallery_background_fix"]').val(color);
            $(`iframe.embed-responsive-item`).contents().find('#videos').addClass(
                'brand-background color-background');
            $('input[name="videos_background_fix"]').val(color);
            $(`iframe.embed-responsive-item`).contents().find('#event').addClass(
                'brand-background color-background');
            $('input[name="event_background_fix"]').val(color);
            $(`iframe.embed-responsive-item`).contents().find('#comment').addClass(
                'brand-background color-background');
            $('input[name="comment_background_fix"]').val(color);
            $(`iframe.embed-responsive-item`).contents().find('.brand-background.color-background').css(
                'background', color);
        });
        $('input#tema-color-heading-text').on('change', function() {
            const color = $(this).val();
            $('.color.color-heading-text').css('background', color);
            $(`iframe.embed-responsive-item`).contents().find('h1.text-white').removeClass('text-white');
            $(`iframe.embed-responsive-item`).contents().find('h2.text-white').removeClass('text-white');
            $(`iframe.embed-responsive-item`).contents().find('h1').css('color', color);
            $(`iframe.embed-responsive-item`).contents().find('h2').css('color', color);
        });

        // Set Font Style Tema 
        $('select[name="font_judul"]').on('change', function() {
            $(`iframe.embed-responsive-item`).contents().find('h1').css('font-family', $(this).val());
            $(`iframe.embed-responsive-item`).contents().find('h2').css('font-family', $(this).val());
            // console.log($(this).val());
        });
        $('select[name="font_judul_weight"]').on('change', function() {
            $(`iframe.embed-responsive-item`).contents().find('h1').css('font-weight', $(this).val());
            $(`iframe.embed-responsive-item`).contents().find('h2').css('font-weight', $(this).val());
            // console.log($(this).val());
        });
        $('select[name="font_teks"]').on('change', function() {
            $(`iframe.embed-responsive-item`).contents().find('p').css('font-family', $(this).val());
            $(`iframe.embed-responsive-item`).contents().find('span').css('font-family', $(this).val());
            // console.log($(this).val());
        });

        $('input#tema-color-body-text').on('change', function() {
            const color = $(this).val();
            $('.color.color-body-text').css('background', color);
            $(`iframe.embed-responsive-item`).contents().find('p.text-white').removeClass('text-white');
            $(`iframe.embed-responsive-item`).contents().find('p.text-secondary').removeClass('text-secondary');
            $(`iframe.embed-responsive-item`).contents().find('p').css('color', color);
            $(`iframe.embed-responsive-item`).contents().find('#panduan p').css('color', '#FFFFFF');

        });
        $('input#tema-color-light').on('change', function() {
            const color = $(this).val();
            $('.color.color-light').css('background', color);

            $(`iframe.embed-responsive-item`).contents().find('#footer').addClass('brand-light color-light');
            $('input[name="footer_background_fix"]').val(color);
            $(`iframe.embed-responsive-item`).contents().find('#maps').addClass('brand-light color-light');
            $('input[name="maps_background_fix"]').val(color);
            $(`iframe.embed-responsive-item`).contents().find('#panduan').addClass('brand-light color-light');
            // $('input[name="panduan_background_fix"]').val(color);
            $(`iframe.embed-responsive-item`).contents().find('.brand-light.color-light').css('background', color);
        });
        $('input#tema-color-dark').on('change', function() {
            const color = $(this).val();
            $('.color.color-dark').css('background', color);
            $(`iframe.embed-responsive-item`).contents().find('#invitation').addClass('brand-dark color-dark');
            $('input[name="invitation_background_fix"]').val(color);
            $(`iframe.embed-responsive-item`).contents().find('#countdown').addClass('brand-dark color-dark');
            $('input[name="countdown_background_fix"]').val(color);
            $(`iframe.embed-responsive-item`).contents().find('.brand-dark.color-dark').css('background', color);
        });

        $("Aside.sidebar-wrapper .sidebar-head-list .sidebar-body-top ul li").on('click', function() {
            const id = $(this).attr('id');
            const idActive = $('Aside.sidebar-wrapper .sidebar-head-list .sidebar-body-top ul li.active').attr(
                'id');
            const componentActive = $('ul.components.d-block')
            $(this).addClass('active');
            if (idActive !== id) {
                $('.sidebar-body-top ul li.active').removeClass('active');
                $(this).addClass('active');
                $(componentActive).removeClass("d-block");
                $(componentActive).addClass("d-none");
                const getIdContent = "#" + id + "-content";
                $(getIdContent).removeClass('d-none')
                $(getIdContent).addClass('d-block')
            }
        })
        // toggle sidebar
        $('#slide-back').on('click', function() {
            $('Aside.sidebar-wrapper').css('left', '-480px');
            $('Aside.sidebar-wrapper').removeClass('active');
            $('section.content').css('padding-left', '0px');
            $('section.content').css('width', '100%');
            $('section.content i.material-icons').removeClass('d-none');
        })
        $('#slide-forward').on('click', function() {
            $('#slide-forward').addClass('d-none');
            $('Aside.sidebar-wrapper').css('left', '-0px');
            $('section.content').css('padding-left', '480px');
            $('section.content').css('width', '100%');
        });

        // Iframe Mode Responsive
        $('section.content .preview-options span.material-icons').on('click', function() {
            const id = $(this).attr('id');
            const idActive = $('section.content .preview-options span.material-icons.active');
            let classPreview = 'preview-' + id;
            if (!$(this).hasClass('active')) {
                $(idActive).removeClass('active');
                $(this).addClass('active');
                if (!$('#preview-options-show').hasClass(classPreview)) {
                    $('#preview-options-show').removeClass()
                    $('#preview-options-show').addClass('embed-responsive');
                    $('#preview-options-show').addClass(classPreview);
                }
            }

        });


        $('ul li .row .col').on('click', function() {
            $('ul li .row .col.active').removeClass('active');
            $(this).addClass('active');
            const elementParent = $(this).parent().parent().parent().attr('id');
            const sectionNameParent = elementParent.split('-');
            const elementBackground = `
            <div class="row options form d-block" id="background_${sectionNameParent[0]}">
                <div class="form-group" id="background-section">
                    <label class="event-title" for="Warna">Warna</label>
                    <div class="color-list">
                        <div class="color color-bg-catur" style="background: url('http://127.0.0.1:8000/bg-catur.png'); background-position: center;
                        background-size: contain;">
                            <p></p>
                        </div>
                        <div class="color color-bg-pink" data-color="#F69699">
                            <p></p>
                        </div>
                        <div class="color color-bg-grey" data-color="#9D9D9D">
                            <p></p>
                        </div>
                        <div class="color color-bg-silver" data-color="#F2F2F2">
                            <p></p>
                        </div>
                        <div class="color color-bg-dark-grey" data-color="#3E3E3E">
                            <p></p>
                        </div>
                        <div class="color color-bg-black" data-color="#000000">
                            <p></p>
                        </div>
                        <div class="color color-bg-white" data-color="#FFFFFF">
                            <p></p>
                        </div>
                        <div class="color color-bg-color-picker text-center text-white" data-color="">
                            <div>
                                <input type="color" id="color-picker" name="${sectionNameParent[0]}_background_color" value="{{ $hero != null && $hero->background ? $hero->background : '#F17193' }}">
                            </div>
                            <p class="material-icons">
                                colorize
                            </p>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <p class="event-title">Gambar Latar</p>
                
                    <div class="fileUpload btn btn btn-grey">
                        <input type="file" class="upload" name="${sectionNameParent[0]}_background" id="upload-background">
                        <span>
                            <div class="material-icons">
                                add
                            </div>
                            <p class="event-title">Pilih Gambar</p>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <p class="event-title">Mode Gambar</p>
                    <div class="mode-gambar">
                        <span>
                            <img src="{{ asset('landscape.png') }}" alt="">
                        </span>
                        <span>
                            <img src="{{ asset('potrait.png') }}" alt="">
                        </span>
                        <span>
                            <img src="{{ asset('repeat.png') }}" alt="">
                        </span>
                        <span>
                            <img src="{{ asset('centered.png') }}" alt="">
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <p class="event-title">Overlay</p>
                    <div class="mode-overlay">
                        <span>
                            <img src="{{ asset('overlay-01.png') }}" id="soft-light" alt="">
                        </span>
                        <span>
                            <img src="{{ asset('overlay-02.png') }}" id="hard-light" alt="">
                        </span>
                        <span>
                            <img src="{{ asset('overlay-03.png') }}" id="lighten" alt="">
                        </span>
                    </div>
                </div>
            </div>
        
        `;
            const elementTeks = `
        <div class="row options form d-block" id="teks_${sectionNameParent[0]}">
            <div class="form-group">
                <p class="event-title">Perataan</p>
                <div class="perataan">
                    <div class="perataan-kiri d-inline-block">
                        <i class="material-icons">
                            format_align_left
                        </i>
                    </div>
                    <div class="perataan-tengah d-inline-block">
                        <i class="material-icons">
                            format_align_center
                        </i>
                    </div>
                    <div class="perataan-kanan d-inline-block">
                        <i class="material-icons">
                            format_align_right
                        </i>
                    </div>
                </div>
            </div>
            <div class="form-group" id="text-section">
                <label class="event-title" for="Warna">Teks Atas</label>
                <div class="color-list" id="text-atas">
                    <div class="color color-bg-catur" style="background: url('http://127.0.0.1:8000/bg-catur.png'); background-position: center;
                    background-size: contain;">
                        <p></p>
                    </div>
                    <div class="color color-bg-pink" data-color="#F69699">
                            <p></p>
                    </div>
                    <div class="color color-bg-grey" data-color="#9D9D9D">
                        <p></p>
                    </div>
                    <div class="color color-bg-silver" data-color="#F2F2F2">
                        <p></p>
                    </div>
                    <div class="color color-bg-dark-grey" data-color="#3E3E3E">
                        <p></p>
                    </div>
                    <div class="color color-bg-black" data-color="#000000">
                        <p></p>
                    </div>
                    <div class="color color-bg-white" data-color="#FFFFFF">
                        <p></p>
                    </div>
                    <div class="color color-bg-color-picker text-center text-white" data-color="">
                        <div>
                            <input type="color" id="color-picker" name="${sectionNameParent[0]}_color_teks_atas" value="#49542B">
                        </div>
                        <p class="material-icons">
                            colorize
                        </p>
                    </div>
                </div>
            </div>
            <div class="form-group" id="text-section">
                <label class="event-title" for="Warna">Teks Tengah</label>
                <div class="color-list" id="text-tengah">
                    <div class="color color-bg-catur" style="background: url('http://127.0.0.1:8000/bg-catur.png'); background-position: center;
                    background-size: contain;">
                        <p></p>
                    </div>
                    <div class="color color-bg-pink" data-color="#F69699">
                            <p></p>
                    </div>
                    <div class="color color-bg-grey" data-color="#9D9D9D">
                        <p></p>
                    </div>
                    <div class="color color-bg-silver" data-color="#F2F2F2">
                        <p></p>
                    </div>
                    <div class="color color-bg-dark-grey" data-color="#3E3E3E">
                        <p></p>
                    </div>
                    <div class="color color-bg-black" data-color="#000000">
                        <p></p>
                    </div>
                    <div class="color color-bg-white" data-color="#FFFFFF">
                        <p></p>
                    </div>
                    <div class="color color-bg-color-picker text-center text-white" data-color="">
                        <div>
                            <input type="color" id="color-picker" name="${sectionNameParent[0]}_color_teks_tengah" value="#49542B">
                        </div>
                        <p class="material-icons">
                            colorize
                        </p>
                    </div>
                </div>
            </div>
            <div class="form-group" id="text-section">
                <label class="event-title" for="Warna">Text Bawah</label>
                <div class="color-list" id="text-bawah">
                    <div class="color color-bg-catur" style="background: url('http://127.0.0.1:8000/bg-catur.png'); background-position: center;
                    background-size: contain;">
                        <p></p>
                    </div>
                    <div class="color color-bg-pink" data-color="#F69699">
                            <p></p>
                    </div>
                    <div class="color color-bg-grey" data-color="#9D9D9D">
                        <p></p>
                    </div>
                    <div class="color color-bg-silver" data-color="#F2F2F2">
                        <p></p>
                    </div>
                    <div class="color color-bg-dark-grey" data-color="#3E3E3E">
                        <p></p>
                    </div>
                    <div class="color color-bg-black" data-color="#000000">
                        <p></p>
                    </div>
                    <div class="color color-bg-white" data-color="#FFFFFF">
                        <p></p>
                    </div>
                    <div class="color color-bg-color-picker text-center text-white" data-color="">
                        <div>
                            <input type="color" id="color-picker" name="${sectionNameParent[0]}_color_teks_bawah" value="#49542B">
                        </div>
                        <p class="material-icons">
                            colorize
                        </p>
                    </div>
                </div>
            </div>
        </div>
        `;

            const elementLayout = `
            <div class="row options form d-block" id="layout_${sectionNameParent[0]}">
                <div class="form-group">
                    <p class="event-title">Ukuran Lebar</p>
                    <div class="mode-gambar layouts-options">
                        <span>
                            <img src="{{ asset('Layout-01.png') }}" class="pelebaran" id="container-fluid" alt="">
                        </span>
                        <span>
                            <img src="{{ asset('Layout-02.png') }}" class="pelebaran" id="container" alt="">
                        </span>
                    </div>
                </div>
            </div>
        `;
            const elementPengaturan = `
        <div class="row options form d-block" id="pengaturan_${sectionNameParent[0]}">
            <div class="form-group">
                <p class="event-title">Visibilitas</p>
                <div class="visibilitas-wrapper">
                    <div class="public mt-2">
                        <span class="visibilitas-logo">
                            <i class="material-icons">
                                language
                            </i>
                        </span>
                        <span class="d-inline-block ml-2">
                            <div class="visibilitas-title">
                                Selalu ditampilkan
                            </div>
                            <div class="visibilitas-text text-secondary">
                                Semua dapat melihat bagian ini
                            </div>
                        </span>
                    </div>
                    <div class="invitations mt-4">
                        <span class="visibilitas-logo">
                            <i class="material-icons">
                                people_alt
                            </i>
                        </span>
                        <span class="d-inline-block ml-2">
                            <div class="visibilitas-title">
                                Selalu ditampilkan
                            </div>
                            <div class="visibilitas-text text-secondary">
                                Semua dapat melihat bagian ini
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        `;

            if ($(this).attr('id') == 'layout') {
                if ($(`#layout_${sectionNameParent[0]}`).length == 0) {
                    $(`#${elementParent} li`).append(elementLayout);
                }
                $(`#${elementParent} li .form.d-block`).addClass('d-none');
                $(`#${elementParent} li .form.d-block`).removeClass('d-block');
                if ($(`#layout_${sectionNameParent[0]}`)) {
                    $(`#layout_${sectionNameParent[0]}`).addClass('d-block');
                    $(`#layout_${sectionNameParent[0]}`).removeClass('d-none');
                }
            }
            if ($(this).attr('id') == 'pengaturan') {
                if ($(`#pengaturan_${sectionNameParent[0]}`).length == 0) {
                    $(`#${elementParent} li`).append(elementPengaturan);
                }
                $(`#${elementParent} li .form.d-block`).addClass('d-none');
                $(`#${elementParent} li .form.d-block`).removeClass('d-block');
                if ($(`#pengaturan_${sectionNameParent[0]}`)) {
                    $(`#pengaturan_${sectionNameParent[0]}`).addClass('d-block');
                    $(`#pengaturan_${sectionNameParent[0]}`).removeClass('d-none');
                }
            }
            if ($(this).attr('id') == 'background') {
                if ($(`#background_${sectionNameParent[0]}`).length == 0) {
                    $(`#${elementParent} li`).append(elementBackground);
                }
                $(`#${elementParent} li .form.d-block`).addClass('d-none');
                $(`#${elementParent} li .form.d-block`).removeClass('d-block');
                if ($(`#background_${sectionNameParent[0]}`)) {
                    $(`#background_${sectionNameParent[0]}`).addClass('d-block');
                    $(`#background_${sectionNameParent[0]}`).removeClass('d-none');
                }

            }
            if ($(this).attr('id') == 'text') {
                if ($(`#teks_${sectionNameParent[0]}`).length == 0) {
                    $(`#${elementParent} li`).append(elementTeks);
                }
                $(`#${elementParent} li .form.d-block`).addClass('d-none');
                $(`#${elementParent} li .form.d-block`).removeClass('d-block');
                if ($(`#teks_${sectionNameParent[0]}`)) {
                    $(`#teks_${sectionNameParent[0]}`).addClass('d-block');
                    $(`#teks_${sectionNameParent[0]}`).removeClass('d-none');
                }
            }
            if ($(this).attr('id') == 'content') {
                if ($(`#content-${sectionNameParent[0]}`).length == 0) {
                    $(`#${elementParent} li`).append('');
                }
                $(`#${elementParent} li .form.d-block`).addClass('d-none');
                $(`#${elementParent} li .form.d-block`).removeClass('d-block');

                if ($(`#content-${sectionNameParent[0]}`)) {
                    // console.log(true);
                    $(`#content-${sectionNameParent[0]}`).addClass('d-block');
                    $(`#content-${sectionNameParent[0]}`).removeClass('d-none');
                }
            }
            $('.fileUpload input.upload').change(function() {
                const id = $(this).parent().parent().attr('id');
                let sectionName = "";
                //mengambil id sectionnya
                if (id == "" || id == undefined) {
                    const idName = $(this).parent().parent().parent().prev();
                    sectionName = idName.attr('id').split("-");
                    // console.log(sectionName[1])
                    if (this.files && this.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            // get loaded data and render thumbnail.
                            $(`iframe.embed-responsive-item`).contents().find(`#${sectionName[1]}`).css(
                                'background',
                                `linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.3)), url(${e.target.result})`
                            );
                            $(`iframe.embed-responsive-item`).contents().find(`#${sectionName[1]}`).css(
                                'background-size', `cover`);
                            $(`iframe.embed-responsive-item`).contents().find(`#${sectionName[1]}`).css(
                                'background-position', `center`);
                        };
                        // read the image file as a data URL.
                        reader.readAsDataURL(this.files[0]);
                    }
                }
            });

            $(`input[name="${sectionNameParent[0]}_background_color"]`).on('change', function() {
                $(`input[name="${sectionNameParent[0]}_background_fix"]`).val($(this).val());
            })
            $(`input[name="${sectionNameParent[0]}_background"]`).on('change', function() {
                $(`input[name="${sectionNameParent[0]}_background_fix"]`).val(this.files[0].name);
            })
            //Theme Color
            $('.color-list .color').on('click', function() {
                let color = $(this).attr('data-color');
                const id = $(this).parent().parent().attr('id');
                const idName = $(this).parent().parent().parent().parent().parent();
                let sectionName = idName.attr('id').split("-");
                if (color == "") {
                    $('.color-list #color-picker').on('change', function() {
                        if (id == "background-section") {
                            color = $(this).val();
                            $(`iframe.embed-responsive-item`).contents().find(`#${sectionName[0]}`)
                                .css('background', color);
                        } else {
                            color = $(this).val();
                            $(`iframe.embed-responsive-item`).contents().find(
                                `#${sectionName[0]} .${$(this).parent().parent().parent().attr('id')}`
                            ).removeClass('text-white');
                            $(`iframe.embed-responsive-item`).contents().find(
                                `#${sectionName[0]} .${$(this).parent().parent().parent().attr('id')}`
                            ).css('color', color);
                            $(`iframe.embed-responsive-item`).contents().find(
                                `#${sectionName[0]} .${$(this).parent().parent().parent().attr('id')}-status`
                            ).css('color', color);
                        }
                    });
                } else {
                    //mengambil id sectionnya
                    if (id == "background-section") {
                        $(`input[name='${sectionName[0]}_background_color']`).val(color);
                        $(`input[name='${sectionName[0]}_background_fix']`).val(color);
                        $(`iframe.embed-responsive-item`).contents().find(`#${sectionName[0]}`).css(
                            'background', color);
                    } else if (id == "text-section") {
                        const bagianTeks = $(this).parent().attr('id').split('-');
                        const bagianTeks_fix = sectionName[0] + "_color_teks" + "_" + bagianTeks[1];
                        // console.log(color);
                        $(`input[name="${bagianTeks_fix}"]`).val(color)
                        // .val(color);
                        $(`iframe.embed-responsive-item`).contents().find(
                            `#${sectionName[0]} .${$(this).parent().attr('id')}`).removeClass(
                            'text-white');
                        $(`iframe.embed-responsive-item`).contents().find(
                            `#${sectionName[0]} .${$(this).parent().attr('id')}`).css('color', color);
                        $(`iframe.embed-responsive-item`).contents().find(
                            `#${sectionName[0]} .${$(this).parent().attr('id')}-status`).css('color',
                            color);
                    }
                }
            });
            //Perataan teks active
            $('.perataan div').on('click', function() {
                $('.perataan div.active').removeClass('active');
                $(this).addClass('active');

                const idName = $(this).parent().parent().parent();
                sectionName = idName.attr('id').split("_");

                // console.log(sectionName[1]);
                if ($(this).hasClass('perataan-kiri')) {
                    $(`#${sectionName[1]}-perataan-teks`).val('text-left');
                    $(`iframe.embed-responsive-item`).contents().find(`#${sectionName[1]}`).removeAttr(
                        'class');
                    $(`iframe.embed-responsive-item`).contents().find(`#${sectionName[1]}`).addClass(
                        'd-flex align-items-center text-left');
                }
                if ($(this).hasClass('perataan-kanan')) {
                    $(`#${sectionName[1]}-perataan-teks`).val('text-right');
                    $(`iframe.embed-responsive-item`).contents().find(`#${sectionName[1]}`).removeAttr(
                        'class');
                    $(`iframe.embed-responsive-item`).contents().find(`#${sectionName[1]}`).addClass(
                        'd-flex align-items-center text-right');
                }
                if ($(this).hasClass('perataan-tengah')) {
                    $(`#${sectionName[1]}-perataan-teks`).val('text-center');
                    $(`iframe.embed-responsive-item`).contents().find(`#${sectionName[1]}`).removeAttr(
                        'class');
                    $(`iframe.embed-responsive-item`).contents().find(`#${sectionName[1]}`).addClass(
                        'd-flex align-items-center text-center');
                }
            })

            //Lebar Container 
            $('.pelebaran').on('click', function() {
                const idName = $(this).parent().parent().parent().parent().prev();
                const sectionName = idName.attr('id').split("-");
                const container = $(this).attr('id');
                console.log(sectionName);
                if ($(`input[name='${sectionNameParent[0]}_container']`).val() == 'container' &&
                    container ==
                    'container-fluid') {
                    console.log(true);
                    $(`iframe.embed-responsive-item`).contents().find(
                            `#${sectionNameParent[0]} div.container`)
                        .addClass('container-fluid');
                    $(`iframe.embed-responsive-item`).contents().find(
                            `#${sectionNameParent[0]} .container.container-fluid`)
                        .removeClass('container');
                    $(`input[name='${sectionNameParent[0]}_container']`).val('container-fluid');
                } else if ($(`input[name='${sectionNameParent[0]}_container']`).val() ==
                    'container-fluid' &&
                    container == 'container') {
                    $(`iframe.embed-responsive-item`).contents().find(
                        `#${sectionNameParent[0]} div.container-fluid`).addClass('container');
                    $(`iframe.embed-responsive-item`).contents().find(
                            `#${sectionNameParent[0]} .container-fluid`)
                        .removeClass('container-fluid');
                    $(`input[name='${sectionNameParent[0]}_container']`).val('container');
                } else if ($(`input[name='${sectionNameParent[0]}_container']`).val() == container) {
                    $(`input[name='${sectionNameParent[0]}_container']`).val(container);
                }

            })

            //Mode Overlay
            $('.mode-overlay span img').on('click', function() {
                const value = $(this).attr('id');
                $(`iframe.embed-responsive-item`).contents().find(`#${sectionNameParent[0]}`).css(
                    'background-blend-mode', value);
                $(`input[name='${sectionNameParent[0]}_overlay']`).val(value);

            })
        });



        // Button section toggler
        $('.btn-slide').on('click', function() {
            const id = $(this).attr('id');
            let element = id.split('-');
            const elementPage = $('iframe.embed-responsive-item').contents().find(`#${element[0]}`);
            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
                $(`input[name="${element[0]}_display"]`).val('d-none');
                if (element[0] == 'hero') {
                    if (elementPage.hasClass('d-flex')) {
                        $(elementPage).removeClass('d-flex');
                        $(elementPage).removeClass('d-block');
                        $(elementPage).addClass('d-none');
                    }
                } else {
                    if (elementPage.hasClass('d-block')) {
                        $(elementPage).removeClass('d-block');
                        $(elementPage).addClass('d-none');
                    }
                }
            } else {
                $(this).addClass('active');
                $(`input[name="${element[0]}_display"]`).val('');
                if (element[0] == 'hero') {
                    $(elementPage).removeClass('d-none');
                    $(elementPage).addClass('d-flex');

                } else {
                    if (elementPage.hasClass('d-none')) {
                        $(elementPage).removeClass('d-none');
                        $(elementPage).addClass('d-block');
                    }
                }
            }
            // $(this).toggleClass('active');

        });
        $('input.text-tengah').change(function() {
            const id = $(this).parent().parent().attr('id');
            //mengambil id sectionnya
            const sectionName = id.split("-")

            $(`iframe.embed-responsive-item`).contents().find(`#${sectionName[1]} .text-tengah`).html($(this)
                .val());
        });
        $('input.text-atas').change(function() {
            const id = $(this).parent().parent().attr('id');
            //mengambil id sectionnya
            const sectionName = id.split("-")

            $(`iframe.embed-responsive-item`).contents().find(`#${sectionName[1]} .text-atas`).html($(this).val());
        });
        $('.text-bawah').change(function() {
            const id = $(this).parent().parent().attr('id');
            const checkIframe = $(this).attr('name');
            //mengambil id sectionnya
            const sectionName = id.split("-")
            if (checkIframe == 'iframe_maps' || checkIframe ==
                'iframe_streaming') {
                $(`iframe.embed-responsive-item`).contents().find(`#${sectionName[1]} #${sectionName[1]}_iframe`)
                    .html($(this).val());
            } else if (checkIframe == 'iframe_videos') {
                let idYoutube = $(this).val().split('v=');
                let iframeEmbed = $(this).val().split('https://www.youtube.com/embed/');
                let iframe = '';
                if (idYoutube.length > 1) {
                    iframe =
                        `<iframe <iframe width="560" height="315" class="embed-responsive-item" src="https://www.youtube.com/embed/${idYoutube[1]}" frameborder="0" allowfullscreen></iframe>`;
                    $(this).val(iframe);
                    $(`iframe.embed-responsive-item`).contents().find(
                            `#${sectionName[1]} #${sectionName[1]}_iframe`)
                        .html(iframe);
                } else if (iframeEmbed.length > 0) {
                    iframe =
                        `<iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/${iframeEmbed[1]}" frameborder="0" allowfullscreen></iframe>`;
                    $(this).val(iframe);
                    $(`iframe.embed-responsive-item`).contents().find(
                            `#${sectionName[1]} #${sectionName[1]}_iframe`)
                        .html(iframe);
                } else {
                    idYoutube = $(this).val().split('/');
                    iframe =
                        `<iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/${idYoutube[3]}" frameborder="0" allowfullscreen></iframe>`;
                    $(this).val(iframe);
                    $(`iframe.embed-responsive-item`).contents().find(
                            `#${sectionName[1]} #${sectionName[1]}_iframe`)
                        .html(iframe);
                }
            } else {
                $(`iframe.embed-responsive-item`).contents().find(`#${sectionName[1]} .text-bawah`).not('.except')
                    .html($(this)
                        .val());
            }
        });

        $('.fileUpload input.upload').change(function() {
            const id = $(this).parent().parent().attr('id');
            let sectionName = id.split("-");
            //mengambil id sectionnya
            if ($(this).attr('name') == `${sectionName[1]}_background`) {
                // console.log(true);
                $(`input[name="${sectionName[1]}_background_fix"]`).val(this.files[0].name);
            }
            if (id == "" || id == undefined) {
                const idName = $(this).parent().parent().siblings().attr('id');
                // console.log(idName);
            } else {

                if (this.files && this.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        // get loaded data and render thumbnail.
                        $(`iframe.embed-responsive-item`).contents().find(`#${sectionName[1]}`).css(
                            'background',
                            `linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.3)), url(${e.target.result})`);
                        $(`iframe.embed-responsive-item`).contents().find(`#${sectionName[1]}`).css(
                            'background-size', `cover`);
                        $(`iframe.embed-responsive-item`).contents().find(`#${sectionName[1]}`).css(
                            'background-position', `center`);

                    };

                    // read the image file as a data URL.
                    reader.readAsDataURL(this.files[0]);
                }
            }
        });
        //theme background setting
        $('.fileUpload input.upload').change(function() {
            const id = $(this).parent().parent().attr('id');
            const isTemaContent = $(this).parent().parent().parent().parent().parent().attr('id');

            let sectionName = "";
            //mengambil id sectionnya
            if (id == "" || id == undefined) {
                const idName = $(this).parent().parent().siblings().attr('id');
                if (isTemaContent == 'tema-content') {
                    if (this.files && this.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            // get loaded data and render thumbnail.
                            $(`iframe.embed-responsive-item`).contents().find(`#hero`).css('background',
                                `url(${e.target.result})`);
                            $(`iframe.embed-responsive-item`).contents().find(`#hero`).css('background-size',
                                `cover`);
                            $(`iframe.embed-responsive-item`).contents().find(`#hero`).css(
                                'background-position', `center`);
                            $(`iframe.embed-responsive-item`).contents().find(`#streaming`).css('background',
                                `url(${e.target.result})`);
                            $(`iframe.embed-responsive-item`).contents().find(`#streaming`).css(
                                'background-size', `cover`);
                            $(`iframe.embed-responsive-item`).contents().find(`#streaming`).css(
                                'background-position', `center`);
                            $(`iframe.embed-responsive-item`).contents().find(`#gallery`).css('background',
                                `url(${e.target.result})`);
                            $(`iframe.embed-responsive-item`).contents().find(`#gallery`).css('background-size',
                                `cover`);
                            $(`iframe.embed-responsive-item`).contents().find(`#gallery`).css(
                                'background-position', `center`);
                            $(`iframe.embed-responsive-item`).contents().find(`#videos`).css('background',
                                `url(${e.target.result})`);
                            $(`iframe.embed-responsive-item`).contents().find(`#videos`).css('background-size',
                                `cover`);
                            $(`iframe.embed-responsive-item`).contents().find(`#videos`).css(
                                'background-position', `center`);
                            $(`iframe.embed-responsive-item`).contents().find(`#event`).css('background',
                                `url(${e.target.result})`);
                            $(`iframe.embed-responsive-item`).contents().find(`#event`).css('background-size',
                                `cover`);
                            $(`iframe.embed-responsive-item`).contents().find(`#event`).css(
                                'background-position', `center`);
                            $(`iframe.embed-responsive-item`).contents().find(`#comment`).css('background',
                                `url(${e.target.result})`);
                            $(`iframe.embed-responsive-item`).contents().find(`#comment`).css('background-size',
                                `cover`);
                            $(`iframe.embed-responsive-item`).contents().find(`#comment`).css(
                                'background-position', `center`);

                        };

                        // read the image file as a data URL.
                        reader.readAsDataURL(this.files[0]);
                    }
                }
            } else {
                sectionName = id.split("-")
                if (this.files && this.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        // get loaded data and render thumbnail.
                        $(`iframe.embed-responsive-item`).contents().find(`#${sectionName[1]}`).css(
                            'background',
                            `linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.3)), url(${e.target.result})`);
                        $(`iframe.embed-responsive-item`).contents().find(`#${sectionName[1]}`).css(
                            'background-size', `cover`);
                        $(`iframe.embed-responsive-item`).contents().find(`#${sectionName[1]}`).css(
                            'background-position', `center`);

                    };

                    // read the image file as a data URL.
                    reader.readAsDataURL(this.files[0])
                }
            }
        });

        // $('input#upload-background').change(function() {
        //     console.log(this);
        // })

        // $('ul#susunan-content li ul li .row .form-group input').change( function () {
        //     const id = $(this).parent().parent().attr('id');
        //     if(id === "content-invitation") {
        //         if($(this).attr('name') == "judul") {
        //             const value = $(this).val();
        //             const JudulElement = $('iframe.embed-responsive-item').contents().find('div#rsvp h1');
        //             $(JudulElement).text(value);
        //         }
        //     }
        //     if(id === "content-footer") {
        //         if($(this).attr('name') == "judul") {
        //             const value = $(this).val();
        //             const JudulElement = $('iframe.embed-responsive-item').contents().find('footer h3');
        //             $(JudulElement).text(value);
        //         }
        //     }
        // });
    </script>
</body>

</html>
