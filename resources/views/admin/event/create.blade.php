@extends('layouts.adminv2')
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
                                            <select name="order_id" id="order_id" class="form-control">
                                                <option value="">
                                                    -= Select Invoice =-
                                                </option>
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
                                                        width="100%" alt="Foto Mempelai Pria" style="border-radius: 10px" />
                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-md-12">
                                                <div class="form-group">
                                                    <label for="AvatarPria">Foto Pria</label>
                                                    <input type="file" name="avatar_pria" id="" class="form-control"
                                                        value="{{ old('avatar_pria') ?? old('avatar_pria') }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="NamaPanggilanPria">Nama Lengkap Mempelai Pria</label>
                                                    <input type="text" name="nama_lengkap_mempelai_pria"
                                                        value="{{ old('nama_lengkap_mempelai_pria') ?? old('nama_lengkap_mempelai_pria') }}"
                                                        class="form-control" placeholder="Full Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="NamaPanggilanPria">Nama Panggilan Mempelai
                                                        Pria</label>
                                                    <input type="text" name="nama_panggilan_mempelai_pria"
                                                        value="{{ old('nama_panggilan_mempelai_pria') ?? old('nama_panggilan_mempelai_pria') }}"
                                                        class="form-control" placeholder="Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="NamaPanggilanPria">Bio Mempelai Pria</label>
                                                    <textarea name="bio_mempelai_pria" id="" cols="30" rows="3"
                                                        class="form-control">{{ old('bio_mempelai_pria') ?? old('bio_mempelai_pria') }}</textarea>
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
                                                        style="border-radius: 10px" />
                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-md-12">
                                                <div class="form-group">
                                                    <label for="AvatarWanita">Foto Wanita</label>
                                                    <input type="file" name="avatar_wanita" id="" class="form-control"
                                                        value="{{ old('avatar_wanita') ?? old('avatar_wanita') }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="NamaPanggilanPria">Nama Lengkap Mempelai
                                                        Wanita</label>
                                                    <input type="text" name="nama_lengkap_mempelai_wanita"
                                                        value="{{ old('nama_lengkap_mempelai_wanita') ?? old('nama_lengkap_mempelai_wanita') }}"
                                                        class="form-control" placeholder="Full Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="NamaPanggilanPria">Nama Panggilan Mempelai
                                                        Wanita</label>
                                                    <input type="text" name="nama_panggilan_mempelai_wanita"
                                                        value="{{ old('nama_panggilan_mempelai_wanita') ?? old('nama_panggilan_mempelai_wanita') }}"
                                                        class="form-control" placeholder="Please fill here...">
                                                </div>
                                                <div class="form-group">
                                                    <label for="NamaPanggilanPria">Bio Mempelai Wanita</label>
                                                    <textarea name="bio_mempelai_wanita" id="" cols="30" rows="3"
                                                        class="form-control">{{ old('bio_mempelai_wanita') ?? old('bio_mempelai_wanita') }}</textarea>
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
                                            <select name="template" id="template" class="form-control">
                                                <option value="">None</option>
                                                <option value="Gold"
                                                    {{ old('template') == 'Gold' ? 'selected' : false }}>
                                                    Gold</option>
                                                <option value="Soft"
                                                    {{ old('template') == 'Soft' ? 'selected' : false }}>
                                                    Soft</option>
                                                <option value="Prime"
                                                    {{ old('template') == 'Prime' ? 'selected' : false }}>
                                                    Prime
                                                </option>
                                                <option value="Silver"
                                                    {{ old('template') == 'Silver' ? 'selected' : false }}>Silver
                                                </option>
                                                <option value="Chocolate"
                                                    {{ old('template') == 'Chocolate' ? 'selected' : false }}>
                                                    Chocolate
                                                </option>
                                                <option value="Pink"
                                                    {{ old('template') == 'Pink' ? 'selected' : false }}>
                                                    Pink</option>
                                                <option value="Crystal"
                                                    {{ old('template') == 'Crystal' ? 'selected' : false }}>Crystal
                                                </option>
                                                <option value="Grey"
                                                    {{ old('template') == 'Grey' ? 'selected' : false }}>
                                                    Grey</option>
                                                <option value="Bronze"
                                                    {{ old('template') == 'Bronze' ? 'selected' : false }}>Bronze
                                                </option>
                                                <option value="Blue"
                                                    {{ old('template') == 'Blue' ? 'selected' : false }}>
                                                    Blue</option>
                                                <option value="Camel"
                                                    {{ old('template') == 'Camel' ? 'selected' : false }}>
                                                    Camel
                                                </option>
                                                <option value="Ruby"
                                                    {{ old('template') == 'Ruby' ? 'selected' : false }}>
                                                    Ruby</option>
                                                <option value="Goldy"
                                                    {{ old('template') == 'Goldy' ? 'selected' : false }}>
                                                    Goldy
                                                </option>
                                                <option value="Navy"
                                                    {{ old('template') == 'Navy' ? 'selected' : false }}>
                                                    Navy</option>
                                                <option value="Natural"
                                                    {{ old('template') == 'Natural' ? 'selected' : false }}>Natural
                                                </option>
                                                <option value="Custom"
                                                    {{ old('template') == 'Custom' ? 'selected' : false }}>Custom
                                                </option>

                                                {{-- <option value="Basic">Basic</option>
                                            <option value="Regular">Regular</option> --}}
                                            </select>
                                        </div>
                                    </div>
                                    {{-- Data Audio --}}
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="audio">Audio</label>
                                            <select id="audio_id" name="audio_id" class="form-control show-tick">
                                                <option value="">None</option>
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
                                            <label for="TanggalIjab">Tanggal Ijab</label>
                                            <input type="date" name="tanggal_ijab" id="tanggal_ijab" class="form-control"
                                                value="{{ old('tanggal_ijab') ?? old('tanggal_ijab') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="TanggalIjab">Jam Mulai Ijab</label>
                                            <input type="time" name="jam_mulai_ijab" id="jam_mulai_ijab"
                                                class="form-control"
                                                value="{{ old('jam_mulai_ijab') ?? old('jam_mulai_ijab') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="JamSelesaiIjab">Jam Selesai Ijab</label>
                                            <input type="time" name="jam_selesai_ijab" id="jam_selesai_ijab"
                                                class="form-control"
                                                value="{{ old('jam_selesai_ijab') ?? old('jam_selesai_ijab') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="LokasiIjab">Lokasi Ijab</label>
                                            <input type="text" name="lokasi_ijab" id="" class="form-control"
                                                value="{{ old('lokasi_ijab') ?? old('lokasi_ijab') }}" />
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
                                                value="{{ old('jam_mulai_resepsi') ?? old('jam_mulai_resepsi') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="TanggalResepsi">Jam Selesai Resepsi</label>
                                            <input type="time" name="jam_selesai_resepsi" id="jam_selesai_resepsi"
                                                class="form-control"
                                                value="{{ old('jam_selesai_resepsi') ?? old('jam_selesai_resepsi') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="TanggalResepsi">Lokasi Resepsi</label>
                                            <input type="text" name="lokasi_resepsi" id="" class="form-control"
                                                value="{{ old('lokasi_resepsi') ?? old('lokasi_resepsi') }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="iFrameYoutube">iFrame Youtube</label>
                                            <textarea name="link_youtube" id="" cols="30" rows="3"
                                                class="form-control">{{ old('link_youtube') ?? old('link_youtube') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="iFrameMaps">iFrame Maps</label>
                                            <textarea name="gm_ijab" id="" cols="30" rows="3"
                                                class="form-control">{{ old('gm_ijab') ?? old('gm_ijab') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="logo">Logo</label>
                                            <input type="file" name="logo" id="" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="LinkStreaming">Link Streaming</label>
                                            <input type="text" name="link_livestreaming" class="form-control"
                                                placeholder="Please fill here....">
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-lg-13 col-md-3 col-sm-6 col-12">
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
@endsection
