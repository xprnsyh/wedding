@extends('layouts.adminv2')
@section('css-add')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
    <style>
        .tooltip1 {
            position: relative;
            background: #f54593;
            padding: 5px 12px;
            margin: 5px;
            font-size: 15px;
            border-radius: 100%;
            color: #000;
            }

            .tooltip1:before,
            .tooltip1:after {
            position: absolute;
            content: '';
            opacity: 0;
            transition: all 0.4s ease;
            }

            .tooltip1:before {
            border-width: 10px 8px 0 8px;
            border-style: solid;
            border-color:  #f54593 transparent transparent transparent;
            top: -15px;
            transform: translateY(20px);
            }

            .tooltip1:after {
            content: attr(data-tooltip);
            background: #f54593;
            width: 240px;
            height: 75px;
            font-size: 13px;
            font-weight: 300;
            top: -75px;
            left: -10px;
            padding: 10px;
            border-radius: 5px;
            letter-spacing: 1px;
            transform: translateY(20px);
            }

            .tooltip1:hover::before,
            .tooltip1:hover::after {
            opacity: 1;
            transform: translateY(-2px);
            }

            @keyframes shake {
            0% {
                transform: rotate(2deg);
            }
            50% {
            transform: rotate(-3deg);
            }
            70% {
                transform: rotate(3deg);
            }

            100% {
                transform: rotate(0deg);
            }
            }

            #tooltip_maps:hover {
            animation: shake 500ms ease-in-out forwards;
            }

        .img {
            display: block;
            max-width: 100%;
        }
        .preview {
            overflow: hidden;
            width: 240px;
            height: 240px;
            margin: 10px;
            border: 1px solid red;
        }
        .modal-lg {
            max-width: 1000px !important;
        }
    </style>
@endsection
@section('breadcrumb')
    <div>
        <div class="col-12 p-0">
            <div aria-label="breadcrumb" class="breadcrumb-wrapper">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="url('/')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">
                                <g clip-path="url(#clip0_3045_293)">
                                    <path
                                        d="M11.8471 6.94216V10.9806C11.8471 11.1265 11.7938 11.2527 11.6872 11.3592C11.5807 11.4658 11.4545 11.5191 11.3086 11.5191H8.07786V8.28831H5.92401V11.5191H2.69324C2.54741 11.5191 2.42121 11.4658 2.31464 11.3592C2.20807 11.2527 2.15478 11.1265 2.15478 10.9806V6.94216C2.15478 6.93655 2.15618 6.92814 2.15899 6.91692C2.16179 6.9057 2.16319 6.89729 2.16319 6.89168L7.00094 2.9037L11.8387 6.89168C11.8443 6.90289 11.8471 6.91972 11.8471 6.94216ZM13.7233 6.36163L13.2017 6.98423C13.1568 7.03471 13.0979 7.06556 13.025 7.07677H12.9997C12.9268 7.07677 12.8679 7.05714 12.8231 7.01788L7.00094 2.16331L1.17882 7.01788C1.11151 7.06275 1.0442 7.08238 0.976896 7.07677C0.90398 7.06556 0.845086 7.03471 0.800214 6.98423L0.278579 6.36163C0.233707 6.30554 0.214076 6.23963 0.219685 6.16391C0.225294 6.08819 0.256143 6.02789 0.312233 5.98302L6.36151 0.943359C6.541 0.797526 6.75414 0.724609 7.00094 0.724609C7.24773 0.724609 7.46087 0.797526 7.64036 0.943359L9.69324 2.65971V1.01908C9.69324 0.940555 9.71848 0.876052 9.76896 0.825571C9.81944 0.77509 9.88395 0.74985 9.96247 0.74985H11.5779C11.6564 0.74985 11.7209 0.77509 11.7714 0.825571C11.8218 0.876052 11.8471 0.940555 11.8471 1.01908V4.45177L13.6896 5.98302C13.7457 6.02789 13.7766 6.08819 13.7822 6.16391C13.7878 6.23963 13.7682 6.30554 13.7233 6.36163Z"
                                        fill="#F54291" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_3045_293">
                                        <rect width="14" height="11.0385" fill="white" transform="translate(0 0.480469)" />
                                    </clipPath>
                                </defs>
                            </svg></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><a
                            href="{{ route('admin.list.event') }}">Event</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a
                            href="{{ route('admin.create.event') }}">Create</a></li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="content p-card">
        <section class="events">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                    <div class="card">
                        @include('layouts.alert')
                        <div class="card-body">
                            <form action="{{ route('admin.store.event') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="Invoice">Pilih Invoice</label>
                                            <select id="order_id" name="order_id" class="form-control" required>
                                                <option value="">None</option>
                                                @foreach ($orders as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ old('order_id') == $value->id ? 'selected' : false }}>
                                                        {{ $value->invoice }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-12">
                                                <div class="form-group img-mempelai">
                                                    <img src="https://cdn0.iconfinder.com/data/icons/social-media-network-4/48/male_avatar-512.png"
                                                        width="100%" alt="Foto Mempelai Pria" style="border-radius: 10px" id="show-pria" class="show-image" />
                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-md-12">
                                                <div class="form-group">
                                                    <label for="AvatarPria">Foto Pria</label>
                                                    <input type="file" name="avatar_pria" id="avatar_pria" class="form-control"
                                                        value="{{ old('avatar_pria') ?? old('avatar_pria') }}">
                                                    <input type="hidden" name="image_pria">
                                                </div>
                                                <div class="form-group ">
                                                    <label for="NamaPanggilanPria">Nama Lengkap Mempelai Pria</label>
                                                    <input type="text" name="nama_lengkap_mempelai_pria"
                                                        value="{{ old('nama_lengkap_mempelai_pria') ?? old('nama_lengkap_mempelai_pria') }}"
                                                        class="form-control" placeholder="Full Name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="NamaPanggilanPria">Nama Panggilan Mempelai
                                                        Pria</label>
                                                    <input type="text" name="nama_panggilan_mempelai_pria"
                                                        value="{{ old('nama_panggilan_mempelai_pria') ?? old('nama_panggilan_mempelai_pria') }}"
                                                        class="form-control" placeholder="Name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="NamaPanggilanPria">Bio Mempelai Pria</label>
                                                    <textarea name="bio_mempelai_pria" id="" cols="30" rows="3"
                                                        class="form-control" required>{{ old('bio_mempelai_pria') ?? old('bio_mempelai_pria') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-12">
                                                <div class="form-group img-mempelai">
                                                    <img src="https://cdn0.iconfinder.com/data/icons/social-media-network-4/48/male_avatar-512.png"
                                                        width="100%" alt="Foto Mempelai Wanita"
                                                        style="border-radius: 10px" id="show-wanita"/>
                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-md-12">
                                                <div class="form-group">
                                                    <label for="AvatarWanita">Foto Wanita</label>
                                                    <input type="file" name="avatar_wanita" id="avatar_wanita" class="form-control"
                                                        value="{{ old('avatar_wanita') ?? old('avatar_wanita') }}">
                                                    <input type="hidden" name="image_wanita">
                                                </div>
                                                <div class="form-group">
                                                    <label for="NamaPanggilanPria">Nama Lengkap Mempelai
                                                        Wanita</label>
                                                    <input type="text" name="nama_lengkap_mempelai_wanita"
                                                        value="{{ old('nama_lengkap_mempelai_wanita') ?? old('nama_lengkap_mempelai_wanita') }}"
                                                        class="form-control" placeholder="Full Name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="NamaPanggilanPria">Nama Panggilan Mempelai
                                                        Wanita</label>
                                                    <input type="text" name="nama_panggilan_mempelai_wanita"
                                                        value="{{ old('nama_panggilan_mempelai_wanita') ?? old('nama_panggilan_mempelai_wanita') }}"
                                                        class="form-control" placeholder="Please fill here..." required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="NamaPanggilanPria">Bio Mempelai Wanita</label>
                                                    <textarea name="bio_mempelai_wanita" id="" cols="30" rows="3"
                                                        class="form-control" required>{{ old('bio_mempelai_wanita') ?? old('bio_mempelai_wanita') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    {{-- Data Pilihan Template --}}
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Pilih Template</label>
                                            <select name="template" id="template" class="form-control" required>
                                                <option value="" selected disabled>Pilih Template</option>
                                                @foreach($list_templates as $template)
                                                <option value="{{ $template->name }}" {{ old('template') == $template->name ? 'selected' : '' }}>{{ $template->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{-- Data Audio --}}
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="audio">Audio</label>
                                            <select id="audio_id" name="audio_id" class="form-control show-tick" required>
                                                <option value="" selected disabled>Pilih Musik</option>
                                                @foreach ($audio as $a)
                                                    <option value="{{ $a->id }}"
                                                        {{ old('audio') == $a->id ? 'selected' : false }}>
                                                        {{ $a->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="TanggalIjab">Tanggal Akad</label>
                                            <input type="date" name="tanggal_ijab" id="tanggal_ijab" class="form-control"
                                                value="{{ old('tanggal_ijab') ?? old('tanggal_ijab') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="TanggalIjab">Jam Mulai Akad</label>
                                            <input type="time" name="jam_mulai_ijab" id="jam_mulai_ijab"
                                                class="form-control"
                                                value="{{ old('jam_mulai_ijab') ?? old('jam_mulai_ijab') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="JamSelesaiIjab">Jam Selesai Akad</label>
                                            <input type="time" name="jam_selesai_ijab" id="jam_selesai_ijab"
                                                class="form-control"
                                                value="{{ old('jam_selesai_ijab') ?? old('jam_selesai_ijab') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="LokasiIjab">Lokasi Akad</label>
                                            <input type="text" name="lokasi_ijab" id="" class="form-control"
                                                value="{{ old('lokasi_ijab') ?? old('lokasi_ijab') }}" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="TanggalResepsi">Tanggal Resepsi</label>
                                            <input type="date" name="tanggal_resepsi" id="tanggal_resepsi"
                                                class="form-control"
                                                value="{{ old('tanggal_resepsi') ?? old('tanggal_resepsi') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="JamMulaiResepsi">Jam Mulai Resepsi</label>
                                            <input type="time" name="jam_mulai_resepsi" id="jam_mulai_resepsi"
                                                class="form-control"
                                                value="{{ old('jam_mulai_resepsi') ?? old('jam_mulai_resepsi') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="TanggalResepsi">Jam Selesai Resepsi</label>
                                            <input type="time" name="jam_selesai_resepsi" id="jam_selesai_resepsi"
                                                class="form-control"
                                                value="{{ old('jam_selesai_resepsi') ?? old('jam_selesai_resepsi') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="TanggalResepsi">Lokasi Resepsi</label>
                                            <input type="text" name="lokasi_resepsi" id="" class="form-control"
                                                value="{{ old('lokasi_resepsi') ?? old('lokasi_resepsi') }}" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div class="group">
                                                <label for="iFrameYoutube">iFrame Youtube</label>
                                                <i class="fa fa-info-circle fa-pull-right" aria-hidden="true" {{ Popper::trigger(true, true, false)->pop('Buka Youtube klik videonya, klik bagikan/share, klik salin link/ copy link.') }}></i>
                                            </div>
                                            <textarea name="link_youtube" id="" cols="30" rows="3"
                                                class="form-control">{{ old('link_youtube') ?? old('link_youtube') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div class="group">
                                                <label for="iFrameMaps">iFrame Maps Akad/Janji Pernikahan</label>
                                                <i class="fa fa-info-circle fa-pull-right" aria-hidden="true" {{ Popper::trigger(true, true, false)->pop('Buka Google Maps tandai tempat acaranya, klik bagikan/share, klik salin link/ copy link.') }}></i>
                                            </div>
                                            <textarea name="gm_ijab" id="" cols="30" rows="3"
                                                class="form-control">{{ old('gm_ijab') ?? old('gm_ijab') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div class="group">
                                                <label for="iFrameMaps">iFrame Maps Resepsi</label>
                                                <i class="fa fa-info-circle fa-pull-right" aria-hidden="true" {{ Popper::trigger(true, true, false)->pop('Buka Google Maps tandai tempat acaranya, klik bagikan/share, klik salin link/ copy link.') }}></i>
                                            </div>
                                            <textarea name="gm_resepsi" id="" cols="30" rows="3"
                                                class="form-control">{{ old('gm_resepsi') ?? old('gm_resepsi') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="logo">Foto Utama</label>
                                            <input type="file" name="logo" id="" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div class="group">
                                                <label for="LinkStreaming">Link Monitor</label>
                                                <i class="fa fa-info-circle fa-pull-right" aria-hidden="true" {{ Popper::trigger(true, true, false)->pop('Pilihan ini digunakan untuk menentukan tampilan monitor.') }}></i>
                                            </div>
                                            <select id="monitor" name="monitor" class="form-control show-tick">
                                                <option value="" disabled selected>Pilih Opsi</option>
                                                <option value="Photo">Photo</option>
                                                <option value="Video">Video</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- LinkLiveStreaming -->
                                    <!-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="LinkLiveStreaming">Link Live Streaming</label>
                                            <input type="text" name="link_livestreaming" placeholder="placeholder="
                                                https://zoom.us"" class="form-control" />
                                        </div>
                                    </div> -->
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                        <button type="submit" class="btn btn-block btn-primary">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    {{-- <div class="container-fluid">
        <div class="page-title">
            <h3>New Event</h3>
        </div>
        <div class="row clearfix">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="card card-event-new">
                    <div class="body">
                        @include('layouts.alert')
                        <form action="{{ route('admin.store.event') }}" method="post" enctype="multipart/form-data"
                            class="form-event">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Invoice</label>
                                        <select id="order_id" name="order_id" class="form-control show-tick">
                                            <option value="">None</option>
                                            @foreach ($orders as $value)
                                                <option value="{{ $value->id }}"
                                                    {{ old('order_id') == $value->id ? 'selected' : false }}>
                                                    {{ $value->invoice }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://cdn0.iconfinder.com/data/icons/social-media-network-4/48/male_avatar-512.png"
                                                        class="event-avatar" alt="">
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label for="AvatarPria">Foto Pria</label>
                                                        <input type="file" name="avatar_pria" id="" class="form-control"
                                                            placeholder="Name"
                                                            value="{{ old('avatar_pria') ?? old('avatar_pria') }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="NamaPanggilanPria">Nama Panggilan Mempelai Pria</label>
                                                        <input type="text" name="nama_panggilan_mempelai_pria" id=""
                                                            class="form-control" placeholder="Name"
                                                            value="{{ old('nama_panggilan_mempelai_pria') ?? old('nama_panggilan_mempelai_pria') }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="NamaLengkapPria">Nama Lengkap Mempelai Pria</label>
                                                        <input type="text" name="nama_lengkap_mempelai_pria" id=""
                                                            class="form-control" placeholder="Full Name"
                                                            value="{{ old('nama_lengkap_mempelai_pria') ?? old('nama_lengkap_mempelai_pria') }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="NamaLengkapPria">Bio Mempelai Pria</label>
                                                        <input type="text" name="bio_mempelai_pria" id=""
                                                            class="form-control" placeholder="Bio"
                                                            value="{{ old('bio_mempelai_pria') ?? old('bio_mempelai_pria') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://cdn0.iconfinder.com/data/icons/social-media-network-4/48/male_avatar-512.png"
                                                        class="event-avatar" alt="">
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label for="AvatarWanita">Foto Wanita</label>
                                                        <input type="file" name="avatar_wanita" id="" class="form-control"
                                                            placeholder="Name"
                                                            value="{{ old('avatar_wanita') ?? old('avatar_wanita') }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="NamaPanggilanWanita">Nama Panggilan Mempelai
                                                            Wanita</label>
                                                        <input type="text" name="nama_panggilan_mempelai_wanita" id=""
                                                            class="form-control" placeholder="Name"
                                                            value="{{ old('nama_panggilan_mempelai_wanita') ?? old('nama_panggilan_mempelai_wanita') }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="NamaLengkapWanita">Nama Lengkap Mempelai Wanita</label>
                                                        <input type="text" name="nama_lengkap_mempelai_wanita" id=""
                                                            class="form-control" placeholder="Full Name"
                                                            value="{{ old('nama_lengkap_mempelai_wanita') ?? old('nama_lengkap_mempelai_wanita') }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="NamaLengkapWanita">Bio Mempelai Wanita</label>
                                                        <input type="text" name="bio_mempelai_wanita" id=""
                                                            class="form-control" placeholder="Bio"
                                                            value="{{ old('bio_mempelai_wanita') ?? old('bio_mempelai_wanita') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Pilih Template</label>
                                        <select name="template" id="template" class="form-control">
                                            <option value="">None</option>
                                            <option value="Gold" {{ old('template') == 'Gold' ? 'selected' : false }}>
                                                Gold</option>
                                            <option value="Soft" {{ old('template') == 'Soft' ? 'selected' : false }}>
                                                Soft</option>
                                            <option value="Prime" {{ old('template') == 'Prime' ? 'selected' : false }}>
                                                Prime
                                            </option>
                                            <option value="Silver"
                                                {{ old('template') == 'Silver' ? 'selected' : false }}>Silver
                                            </option>
                                            <option value="Chocolate"
                                                {{ old('template') == 'Chocolate' ? 'selected' : false }}>
                                                Chocolate
                                            </option>
                                            <option value="Pink" {{ old('template') == 'Pink' ? 'selected' : false }}>
                                                Pink</option>
                                            <option value="Crystal"
                                                {{ old('template') == 'Crystal' ? 'selected' : false }}>Crystal
                                            </option>
                                            <option value="Grey" {{ old('template') == 'Grey' ? 'selected' : false }}>
                                                Grey</option>
                                            <option value="Bronze"
                                                {{ old('template') == 'Bronze' ? 'selected' : false }}>Bronze
                                            </option>
                                            <option value="Blue" {{ old('template') == 'Blue' ? 'selected' : false }}>
                                                Blue</option>
                                            <option value="Camel" {{ old('template') == 'Camel' ? 'selected' : false }}>
                                                Camel
                                            </option>
                                            <option value="Ruby" {{ old('template') == 'Ruby' ? 'selected' : false }}>
                                                Ruby</option>
                                            <option value="Goldy" {{ old('template') == 'Goldy' ? 'selected' : false }}>
                                                Goldy
                                            </option>
                                            <option value="Navy" {{ old('template') == 'Navy' ? 'selected' : false }}>
                                                Navy</option>
                                            <option value="Natural"
                                                {{ old('template') == 'Natural' ? 'selected' : false }}>Natural
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label>Tanggal Ijab</label>
                                                <input type="date" name="tanggal_ijab" id="tanggal_ijab"
                                                    class="form-control"
                                                    value="{{ old('tanggal_ijab') ?? old('tanggal_ijab') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label>Jam Mulai Ijab</label>
                                                <input type="time" name="jam_mulai_ijab" id="jam_mulai_ijab"
                                                    class="form-control"
                                                    value="{{ old('jam_mulai_ijab') ?? old('jam_mulai_ijab') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label>Jam Selesai Ijab</label>
                                                <input type="time" name="jam_selesai_ijab" id="jam_selesai_ijab"
                                                    class="form-control"
                                                    value="{{ old('jam_selesai_ijab') ?? old('jam_selesai_ijab') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label>Lokasi Ijab</label>
                                                <textarea type="text" name="lokasi_ijab" id="lokasi_ijab"
                                                    class="form-control no-resize"
                                                    placeholder="Location">{{ old('lokasi_ijab') ?? old('lokasi_ijab') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label>Tanggal Resepsi</label>
                                                <input type="date" name="tanggal_resepsi" id="tanggal_resepsi"
                                                    class="form-control"
                                                    value="{{ old('tanggal_resepsi') ?? old('tanggal_resepsi') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label>Jam Mulai Resepsi</label>
                                                <input type="time" name="jam_mulai_resepsi" id="jam_mulai_resepsi"
                                                    class="form-control"
                                                    value="{{ old('jam_mulai_resepsi') ?? old('jam_mulai_resepsi') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label>Jam Selesai Resepsi</label>
                                                <input type="time" name="jam_selesai_resepsi" id="jam_selesai_resepsi"
                                                    class="form-control"
                                                    value="{{ old('jam_selesai_resepsi') ?? old('jam_selesai_resepsi') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label>Lokasi Resepsi</label>
                                                <textarea type="text" name="lokasi_resepsi" id="lokasi_resepsi"
                                                    class="form-control no-resize"
                                                    placeholder="Location">{{ old('lokasi_resepsi') ?? old('lokasi_resepsi') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-9 col-sm-12">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-12">
                                                    <div class="form-group">
                                                        <label>iFrame Youtube</label>
                                                        <input type="text" name="link_youtube" class="form-control"
                                                            value="{{ old('link_youtube') ?? old('link_youtube') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-12">
                                                    <div class="form-group">
                                                        <label>iFrame Maps</label>
                                                        <input type="text" name="gm_ijab" class="form-control"
                                                            value="{{ old('gm_ijab') ?? old('gm_ijab') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Logo</label>
                                                        <input type="file" name="logo" class="form-control"
                                                            value="{{ old('logo') ?? old('logo') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="row" style="height: 80px;">
                                                <div class="col-md-12"
                                                    style="height: 100%; display: flex; justify-content: end; align-items: flex-end">

                                                    <button type="submit" class="btn btn-pink waves-effect">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    <!-- Modal -->
    <div class="modal fade" id="modal_pria" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="img-container">
                        <div class="row">
                            <div class="col-md-8">
                                <img class="img" id="img_pria" src="https://avatars0.githubusercontent.com/u/3456749">
                            </div>
                            <div class="col-md-6">
                                <div class="preview" id="preview_pria"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="crop_pria">Crop</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_wanita" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="img-container">
                        <div class="row">
                            <div class="col-md-8">
                                <img class="img" id="img_wanita" src="https://avatars0.githubusercontent.com/u/3456749">
                            </div>
                            <div class="col-md-4">
                                <div class="preview" id="preview_wanita"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="crop_wanita">Crop</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('add-js')
<script src="https://use.fontawesome.com/e912f54b8f.js"></script>

<script>
        
    /*------------------------------------------
    --------------------------------------------
    Image Change Event
    --------------------------------------------
    --------------------------------------------*/
    $("body").on("change", "#avatar_pria", function(e){
        var $modal = $('#modal_pria');
        var image = document.getElementById('img_pria');
        var cropper;
        var files = e.target.files;
        var done = function (url) {
            image.src = url;
            $modal.modal('show');
        };

        var reader;
        var file;
        var url;

        if (files && files.length > 0) {
            file = files[0];

            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function (e) {
                    done(reader.result);
                };
            reader.readAsDataURL(file);
            }
        }

        $modal.on('shown.bs.modal', function () {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 3,
                preview: '#preview_pria'
            });
        }).on('hidden.bs.modal', function () {
            cropper.destroy();
            cropper = null;
        });

        

        $("#crop_pria").click(function(){
            canvas = cropper.getCroppedCanvas({
                width: 480,
                height: 480,
            });

            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result; 
                    $("input[name='image_pria']").val(base64data);
                    $("#show-pria").show();
                    $("#show-pria").attr("src",base64data);
                    $("#modal_pria").modal('toggle');
                }
            });
        });
        
    });

    $("body").on("change", "#avatar_wanita", function(e){
        var $modal = $('#modal_wanita');
        var image = document.getElementById('img_wanita');
        var cropper;
        var files = e.target.files;
        var done = function (url) {
            image.src = url;
            $modal.modal('show');
        };

        var reader;
        var file;
        var url;

        if (files && files.length > 0) {
            file = files[0];

            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function (e) {
                    done(reader.result);
                };
            reader.readAsDataURL(file);
            }
        }

        $modal.on('shown.bs.modal', function () {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 3,
                preview: '#preview_wanita'
            });
        }).on('hidden.bs.modal', function () {
            cropper.destroy();
            cropper = null;
        });

        $("#crop_wanita").click(function(){
            canvas = cropper.getCroppedCanvas({
                width: 480,
                height: 480,
            });

            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result; 
                    $("input[name='image_wanita']").val(base64data);
                    $("#show-wanita").show();
                    $("#show-wanita").attr("src",base64data);
                    $("#modal_wanita").modal('toggle');
                }
            });
        });

    });
    
        
</script>
@endsection
