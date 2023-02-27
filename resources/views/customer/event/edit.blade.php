@extends('layouts.adminv2')
@section('css-add')
    {{-- Datatables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="{{ asset('plugin/image-uploader/image-uploader.css') }}" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
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
                            href="{{ route('customer.list.event') }}">Event</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Edit</a></li>
                </ol>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        <section class="events">
            <div class="tab-events d-flex justify-content-between align-items-center">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="active" id="pills-data-tab" data-toggle="pill" href="#pills-data" role="tab"
                            aria-controls="pills-data" aria-selected="true"><span class="iconify"
                                data-icon="bx:bx-user"></span> Data</a>
                    </li>
                    <li class="nav-item">
                        <a id="pills-photos-tab" data-toggle="pill" href="#pills-photos" role="tab"
                            aria-controls="pills-photos" aria-selected="false"><span class="iconify"
                                data-icon="bx:bx-image-add"></span>
                            Photos</a>
                    </li>
                    <li class="nav-item">
                        <a id="pills-guestbook-tab" data-toggle="pill" href="#pills-guestbook" role="tab"
                            aria-controls="pills-guestbook" aria-selected="false"><span class="iconify"
                                data-icon="bx:bx-user-pin"></span>
                            GuestBook</a>
                    </li>
                    <li class="nav-item">
                        <a id="pills-invitation-tab" data-toggle="pill" href="#pills-invitation" role="tab"
                            aria-controls="pills-invitation" aria-selected="false"><span class="iconify"
                                data-icon="bx:bx-link"></span> Link</a>
                    </li>
                    <li class="nav-item">
                        <a id="pills-message-tab" data-toggle="pill" href="#pills-message" role="tab"
                            aria-controls="pills-message" aria-selected="false"><span class="iconify"
                                data-icon="bx:bx-message-rounded"></span>
                            Message</a>
                    </li>
                    <li class="nav-item">
                        <a id="pills-qrcode-tab" data-toggle="pill" href="#pills-qrcode" role="tab"
                            aria-controls="pills-qrcode" aria-selected="false"><span class="iconify"
                                data-icon="bx:bx-qr"></span> QR Code</a>
                    </li>
                    <li class="nav-item">
                        <a id="pills-angpao-tab" data-toggle="pill" href="#pills-angpao" role="tab"
                            aria-controls="pills-angpao" aria-selected="false"><span class="iconify"
                                data-icon="fa6-solid:rupiah-sign"></span> Angpao</a>
                    </li>
                </ul>
                <ul style="list-style: none">
                    <li>
                        <div class="btn-group">
                            <a href="{{ route('customer.event.build', $event->slug) }}" class="btn btn-primary"
                                target="_blank">
                                <span class="    iconify" data-icon="bx:bx-layout"></span>
                                Builder
                            </a>
                            <a href="{{ route('see.event', ['slug' => $event->slug]) }}" class="btn btn-primary blue">
                                <span class="iconify" data-icon="bx:bx-link-external"></span>
                                Preview
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-data" role="tabpanel" aria-labelledby="pills-data">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    @include('layouts.alert')
                                    <form action="{{ route('customer.update.event', ['id' => $event->id]) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" name="order_id"
                                                        value="{{ $event->order_id }}">
                                                    <label for="Invoice">Pilih Invoice</label>
                                                    <select id="order_id" name="order_id" class="form-control show-tick"
                                                        disabled>
                                                        <option value="">None</option>
                                                        @foreach ($orders as $value)
                                                            <option value="{{ $value->id }}"
                                                                {{ $value->id == $event->order_id ? 'selected' : ' ' }}>
                                                                {{ $value->invoice }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="Slug">Slug</label>
                                                    <input type="text" name="slug" id="slug" class="form-control"
                                                        value="{{ $event->slug }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="Code Event">Code Event</label>
                                                    <input type="text" class="form-control" name="code_event"
                                                        id="code_event" value="{{ $event->code_event }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Pilih Template</label>
                                                    <select name="template" id="template" class="form-control">
                                                        <option value="">None</option>
                                                        <option value="Gold"
                                                            {{ $event->template == 'Gold' ? 'selected' : '' }}>
                                                            Gold</option>
                                                        <option value="Soft"
                                                            {{ $event->template == 'Soft' ? 'selected' : '' }}>
                                                            Soft</option>
                                                        <option value="Prime"
                                                            {{ $event->template == 'Prime' ? 'selected' : '' }}>
                                                            Prime</option>
                                                        <option value="Silver"
                                                            {{ $event->template == 'Silver' ? 'selected' : '' }}>
                                                            Silver</option>
                                                        {{-- <option value="Chocolate"
                                                            {{ $event->template == 'Chocolate' ? 'selected' : '' }}>
                                                            Chocolate</option>
                                                        <option value="Pink"
                                                            {{ $event->template == 'Pink' ? 'selected' : '' }}>
                                                            Pink</option>
                                                        <option value="Crystal"
                                                            {{ $event->template == 'Crystal' ? 'selected' : '' }}>
                                                            Crystal</option>
                                                        <option value="Grey"
                                                            {{ $event->template == 'Grey' ? 'selected' : '' }}>
                                                            Grey</option>
                                                        <option value="Bronze"
                                                            {{ $event->template == 'Bronze' ? 'selected' : '' }}>
                                                            Bronze</option>
                                                        <option value="Blue"
                                                            {{ $event->template == 'Blue' ? 'selected' : '' }}>
                                                            Blue</option> --}}
                                                        <option value="Camel"
                                                            {{ $event->template == 'Camel' ? 'selected' : '' }}>
                                                            Camel</option>
                                                        <option value="Ruby"
                                                            {{ $event->template == 'Ruby' ? 'selected' : '' }}>
                                                            Ruby</option>
                                                        <option value="Goldy"
                                                            {{ $event->template == 'Goldy' ? 'selected' : '' }}>
                                                            Goldy</option>
                                                        <option value="Navy"
                                                            {{ $event->template == 'Navy' ? 'selected' : '' }}>
                                                            Navy</option>
                                                        <option value="Natural"
                                                            {{ $event->template == 'Natural' ? 'selected' : '' }}>
                                                            Natural</option>
                                                        <option value="Custom"
                                                            {{ $event->template == 'Custom' ? 'selected' : '' }}>
                                                            Custom</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Pilih lagu</label>
                                                    <select name="audio_id" class="form-control" required>
                                                        @foreach ($data_audio as $audio)
                                                            <option value="{{ $audio->id }}">{{ $audio->name }}
                                                            </option>
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
                                                            @if (isset($event->avatar_pria))
                                                                <div class="img-event-wrapper">
                                                                    <i class="fa fa-trash" id="delete_photo_pria"
                                                                        data-id="{{ $event->id }}"></i>
                                                                    <img src="{{ asset('admin/assets/images/pria/' . $event->order->invoice . '/' . $event->avatar_pria) }}"
                                                                        alt="Foto Pria" width="100%" class="event-avatar"
                                                                        style="border-radius: 10px" id="photo_pria">
                                                                </div>
                                                            @else
                                                                <img src="https://cdn0.iconfinder.com/data/icons/social-media-network-4/48/male_avatar-512.png"
                                                                    class="event-avatar" alt="" width="100%">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-9 col-md-12">
                                                        <div class="form-group">
                                                            <label for="AvatarPria">Foto Pria</label>
                                                            <input type="file" name="avatar_pria" id=""
                                                                class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="NamaPanggilanPria">Nama Lengkap Mempelai
                                                                Pria</label>
                                                            <input type="text" name="nama_lengkap_mempelai_pria"
                                                                value="{{ $event->nama_lengkap_mempelai_pria }}"
                                                                class="form-control" placeholder="Full Name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="NamaPanggilanPria">Nama Panggilan Mempelai
                                                                Pria</label>
                                                            <input type="text" name="nama_panggilan_mempelai_pria"
                                                                value="{{ $event->nama_panggilan_mempelai_pria }}"
                                                                class="form-control" placeholder="Name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="NamaPanggilanPria">Bio Mempelai Pria</label>
                                                            <textarea name="bio_mempelai_pria" id="" cols="30" rows="3"
                                                                class="form-control">{{ $event->bio_mempelai_pria }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-12">
                                                        <div class="form-group img-mempelai">
                                                            @if (isset($event->avatar_wanita))
                                                                <div class="img-event-wrapper">
                                                                    <i class="fa fa-trash" id="delete_photo_wanita"
                                                                        data-id="{{ $event->id }}"></i>
                                                                    <img src="{{ asset('admin/assets/images/wanita/' . $event->order->invoice . '/' . $event->avatar_wanita) }}"
                                                                        alt="Foto Mempelai Wanita" width="100%"
                                                                        class="event-avatar" style="border-radius: 10px"
                                                                        id="photo_wanita">
                                                                </div>
                                                            @else
                                                                <img src="https://cdn0.iconfinder.com/data/icons/social-media-network-4/48/male_avatar-512.png"
                                                                    class="event-avatar" alt="" width="100%">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-9 col-md-12">
                                                        <div class="form-group">
                                                            <label for="AvatarWanita">Foto Wanita</label>
                                                            <input type="file" name="avatar_wanita" id=""
                                                                class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="NamaPanggilanPria">Nama Lengkap Mempelai
                                                                Wanita</label>
                                                            <input type="text" name="nama_lengkap_mempelai_wanita"
                                                                value="{{ $event->nama_lengkap_mempelai_wanita }}"
                                                                class="form-control" placeholder="Full Name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="NamaPanggilanPria">Nama Panggilan Mempelai
                                                                Wanita</label>
                                                            <input type="text" name="nama_panggilan_mempelai_wanita"
                                                                value="{{ $event->nama_panggilan_mempelai_wanita }}"
                                                                class="form-control" placeholder="Bio">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="NamaPanggilanPria">Bio Mempelai Wanita</label>
                                                            <textarea name="bio_mempelai_wanita" id="" cols="30" rows="3"
                                                                class="form-control">{{ $event->bio_mempelai_wanita }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="TanggalIjab">Tanggal Ijab</label>
                                                    <input type="date" name="tanggal_ijab" id="tanggal_ijab"
                                                        class="form-control" value="{{ $event->tanggal_ijab }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="TanggalIjab">Jam Mulai Ijab</label>
                                                    <input type="time" name="jam_mulai_ijab" id="jam_mulai_ijab"
                                                        class="form-control" value="{{ $event->jam_mulai_ijab }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="TanggalIjab">Jam Selesai Ijab</label>
                                                    <input type="time" name="jam_selesai_ijab" id="jam_selesai_ijab"
                                                        class="form-control" value="{{ $event->jam_selesai_ijab }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="TanggalIjab">Lokasi Ijab</label>
                                                    <input type="text" name="lokasi_ijab" id="" class="form-control"
                                                        value="{{ $event->lokasi_ijab }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="TanggalIjab">Tanggal Resepsi</label>
                                                    <input type="date" name="tanggal_resepsi" id="tanggal_resepsi"
                                                        class="form-control" value="{{ $event->tanggal_resepsi }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="TanggalResepsi">Jam Mulai Resepsi</label>
                                                    <input type="time" name="jam_mulai_resepsi" id="jam_mulai_resepsi"
                                                        class="form-control" value="{{ $event->jam_mulai_resepsi }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="TanggalResepsi">Jam Selesai Resepsi</label>
                                                    <input type="time" name="jam_selesai_resepsi" id="jam_selesai_resepsi"
                                                        class="form-control"
                                                        value="{{ $event->jam_selesai_resepsi }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="TanggalResepsi">Lokasi Resepsi</label>
                                                    <input type="text" name="lokasi_resepsi" id="" class="form-control"
                                                        value="{{ $event->lokasi_resepsi }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="iFrameYoutube">iFrame Youtube</label>
                                                    <textarea name="link_youtube" id="" cols="30" rows="3" class="form-control">{{ $event->link_youtube }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="iFrameMaps">iFrame Maps</label>
                                                    <textarea name="gm_ijab" id="" cols="30" rows="3" class="form-control">{{ $event->gm_ijab }}</textarea>
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
                                                        placeholder="https://zoom.us">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label for=""></label>
                                                    <button type="submit" class="btn btn-block btn-primary">
                                                        Save
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade photos" id="pills-photos" role="tabpanel" aria-labelledby="pills-photos-tab">
                    <form action="{{ route('customer.store.photo', ['id' => $event->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="input-images"></div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <button type="submit" class="btn btn-block btn-primary">Upload</button>
                            </div>
                        </div>
                        <div class="row list-image">
                            @isset($event->photos)
                                @foreach ($event->photos as $photo)
                                    <div class=" col-lg-2 col-md-3 col-sm-4 col-6 mt-3 px-2 image-photo-wrapper ">
                                        <a href="{{ route('customer.delete.photo.event', ['id' => $photo->id]) }}">
                                            <span class="material-icons"> clear </span>
                                        </a>
                                        <img src="{{ asset($photo->path) }}" alt="" class="image-photo" />
                                    </div>
                                @endforeach
                            @endisset
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="pills-guestbook" role="tabpanel" aria-labelledby="pills-guestbook-tab">
                    <div class="row">
                        <div class="col-12 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            {{-- <a href="/admin/newevents.html" class="btn btn-linear-primary mb-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15"
                                                viewBox="0 0 14 15" fill="none" style="margin-right: 10px">
                                                <g clip-path="url(#clip0_3033_2213)">
                                                    <path
                                                        d="M14 6.54545V8.45455C14 8.7197 13.9072 8.94508 13.7216 9.13068C13.536 9.31629 13.3106 9.40909 13.0455 9.40909H8.90909V13.5455C8.90909 13.8106 8.81629 14.036 8.63068 14.2216C8.44508 14.4072 8.2197 14.5 7.95455 14.5H6.04545C5.7803 14.5 5.55492 14.4072 5.36932 14.2216C5.18371 14.036 5.09091 13.8106 5.09091 13.5455V9.40909H0.954545C0.689394 9.40909 0.464015 9.31629 0.278409 9.13068C0.092803 8.94508 0 8.7197 0 8.45455V6.54545C0 6.2803 0.092803 6.05492 0.278409 5.86932C0.464015 5.68371 0.689394 5.59091 0.954545 5.59091H5.09091V1.45455C5.09091 1.18939 5.18371 0.964015 5.36932 0.778409C5.55492 0.592803 5.7803 0.5 6.04545 0.5H7.95455C8.2197 0.5 8.44508 0.592803 8.63068 0.778409C8.81629 0.964015 8.90909 1.18939 8.90909 1.45455V5.59091H13.0455C13.3106 5.59091 13.536 5.68371 13.7216 5.86932C13.9072 6.05492 14 6.2803 14 6.54545Z"
                                                        fill="white" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_3033_2213">
                                                        <rect width="14" height="14" fill="white"
                                                            transform="translate(0 0.5)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            New Event
                                        </a>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.pdf.event', ['invoice' => $event->order->invoice]) }}"
                                                class="btn btn-outline-grey mb-4 ml-2">
                                                <i class="fa fa-download mr-2" aria-hidden="true"
                                                    style="font-size: 1.5em; vertical-align: -3px"></i>
                                                Download
                                            </a>
                                            <a href="#" class="btn btn-outline-grey mb-4">
                                                <i class="fa fa-upload mr-2" aria-hidden="true"
                                                    style="font-size: 1.5em; vertical-align: -3px"></i>
                                                Upload
                                            </a>
                                        </div>
                                        <a href="#" class="btn btn-outline-grey mb-4 ml-2">
                                            <i class="fa fa-ellipsis-v mr-2" aria-hidden="true"
                                                style="font-size: 1.5em; vertical-align: -3px"></i>
                                            Lainnya
                                        </a> --}}
                                        </div>
                                    </div>
                                    <table id="datatables-guestbook"
                                        class="table-scroll display dt-responsive table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($event->invite as $key => $guest)
                                                <tr>
                                                    <td>
                                                        {{ ++$key }}
                                                    </td>
                                                    <td>
                                                        {{ $guest->name }}
                                                    </td>
                                                    <td>
                                                        {{ $guest->email }}
                                                    </td>
                                                    <td>
                                                        @switch($guest->pivot->status)
                                                            @case('Hadir')
                                                                <span
                                                                    class="badge badge-pill badge-success">{{ $guest->pivot->status }}</span>
                                                            @break

                                                            @case('Tidak Hadir')
                                                                <span
                                                                    class="badge badge-pill badge-danger">{{ $guest->pivot->status }}</span>
                                                            @break

                                                            @default
                                                                <span
                                                                    class="badge badge-pill badge-orange">{{ $guest->pivot->status }}</span>
                                                        @endswitch
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-message" role="tabpanel" aria-labelledby="pills-message-tab">
                    <div class="row">
                        <div class="col-12 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            {{-- <a href="{{ route('customer.add.guest', ['id', $event->id]) }}"
                                                class="btn btn-linear-primary mb-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15"
                                                    viewBox="0 0 14 15" fill="none" style="margin-right: 10px">
                                                    <g clip-path="url(#clip0_3033_2213)">
                                                        <path
                                                            d="M14 6.54545V8.45455C14 8.7197 13.9072 8.94508 13.7216 9.13068C13.536 9.31629 13.3106 9.40909 13.0455 9.40909H8.90909V13.5455C8.90909 13.8106 8.81629 14.036 8.63068 14.2216C8.44508 14.4072 8.2197 14.5 7.95455 14.5H6.04545C5.7803 14.5 5.55492 14.4072 5.36932 14.2216C5.18371 14.036 5.09091 13.8106 5.09091 13.5455V9.40909H0.954545C0.689394 9.40909 0.464015 9.31629 0.278409 9.13068C0.092803 8.94508 0 8.7197 0 8.45455V6.54545C0 6.2803 0.092803 6.05492 0.278409 5.86932C0.464015 5.68371 0.689394 5.59091 0.954545 5.59091H5.09091V1.45455C5.09091 1.18939 5.18371 0.964015 5.36932 0.778409C5.55492 0.592803 5.7803 0.5 6.04545 0.5H7.95455C8.2197 0.5 8.44508 0.592803 8.63068 0.778409C8.81629 0.964015 8.90909 1.18939 8.90909 1.45455V5.59091H13.0455C13.3106 5.59091 13.536 5.68371 13.7216 5.86932C13.9072 6.05492 14 6.2803 14 6.54545Z"
                                                            fill="white" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_3033_2213">
                                                            <rect width="14" height="14" fill="white"
                                                                transform="translate(0 0.5)" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                New Message
                                            </a> --}}
                                            <div class="btn-group">
                                                <a href="{{ route('customer.pdf.event', ['invoice' => $event->order->invoice]) }}"
                                                    class="btn btn-outline-grey mb-4">
                                                    <i class="fa fa-download mr-2" aria-hidden="true"
                                                        style="font-size: 1.5em; vertical-align: -3px"></i>
                                                    Download
                                                </a>
                                                <a href="#" class="btn btn-outline-grey mb-4">
                                                    <i class="fa fa-upload mr-2" aria-hidden="true"
                                                        style="font-size: 1.5em; vertical-align: -3px"></i>
                                                    Upload
                                                </a>
                                            </div>
                                            <a href="#" class="btn btn-outline-grey mb-4 ml-2">
                                                <i class="fa fa-ellipsis-v mr-2" aria-hidden="true"
                                                    style="font-size: 1.5em; vertical-align: -3px"></i>
                                                Lainnya
                                            </a>
                                        </div>
                                    </div>
                                    <table id="datatables-message"
                                        class="table-scroll display dt-responsive table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Message</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data_guestbook as $key => $guest)
                                                <tr>
                                                    <td>
                                                        {{ ++$key }}
                                                    </td>
                                                    <td>
                                                        {{ $guest->user->name }}
                                                    </td>
                                                    <td>
                                                        {{ $guest->text }}
                                                    </td>
                                                    <td>
                                                        {{-- <a href="{{ route('customer.edit.event', ['invoice' => $event->order->invoice]) }}"
                                                            class="action-icon edit">
                                                            <i class="fa fa-pencil-square-o"></i>
                                                        </a> --}}

                                                        <a href="{{ route('customer.delete.ucapan', ['id' => $guest->id]) }}"
                                                            class="action-icon object-group">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-invitation" role="tabpanel" aria-labelledby="pills-invitation-tab">
                    <section class="events">
                        <div class="row">
                            <div class="col-lg-7 col-md-7 col-sm-12 mt-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h1 class="form-title">Template Pesan</h1>
                                        <h2 class="form-text-secondary mt-2">
                                            Buat isi pesan yang berbeda-beda sesuai kebutuhan.
                                        </h2>
                                        <div class="message-wrapper">
                                            <p class="message-body" id="message-body" style="font-size: 12px">
                                                <b>Assalamu'alaikum Wr. Wb.</b> <br />
                                                Bismillahirrahmanirrahim. <br />
                                                <br />
                                                Dengan memohon Rahmat dan Ridho Allah SWT. Tanpa
                                                mengurangi rasa hormat, Kami bermaksud ingin
                                                memberitahukan kepada Bapak/Ibu/Saudara/i dan
                                                Rekan-rekan bahwa kami akan melangsungkan Pernikahan
                                                yang Insya Allah akan dilaksanakan pada: <br />
                                                <br />
                                                Hari, tanggal: Saturday, 14 Nov 2021 <br />
                                                Invitation : $invitation_link <br />
                                                <br />
                                                Dikarenakan situasi pandemi Covid-19 belum membaik,
                                                Kami memutuskan untuk merayakannya hanya bersama
                                                keluarga dan beberapa teman-teman dekat. Kami
                                                memohon maaf tidak dapat mengundang
                                                Bapak/Ibu/Saudara/i dan Rekan-rekan sekalian menjadi
                                                bagian dihari bahagia kami. Dan yang paling penting
                                                tetap jaga kesahatan. <br />
                                                <br />
                                                Terimakasih atas pengertiannya dan memohon do'a
                                                restu dari Bapak/Ibu/Saudara/i dan rekan-rekan
                                                sekalian. <br />
                                                Wassalamu'alaikum Wr. Wb. <br />
                                                Kami yang berbahagia, <br />
                                                <b>Pria & Wanita </b>
                                            </p>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 col-sm-8 col-12">
                                                <button class="btn btn-block btn-primary blue mt-3" id="btn_copy" disabled>
                                                    Copy to Clipboard
                                                </button>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-12">
                                                <button class="btn btn-block btn-primary yellow mt-3" data-toggle="modal"
                                                    id="editButtonInvitation" data-target="#editInvitationText">
                                                    <span class="iconify" data-icon="bx:bx-edit"
                                                        style="font-size: 20px; vertical-align: -4px"></span>
                                                    Edit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-12 mt-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h1 class="form-title">Generate Link Invitation</h1>
                                        <h2 class="form-text-secondary mt-2">
                                            Buat link invitation yang berbeda-beda sesuai
                                            kebutuhan.
                                        </h2>
                                        <div style="margin: 24px 0">
                                            <div class="form-group">
                                                <label for="NamaTamu">Nama Tamu</label>
                                                <input type="text" name="nama_tamu" class="form-control" id="nama_tamu"
                                                    placeholder="Please fill here.." />
                                            </div>
                                            <div class="form-group">
                                                <label for="NamaTamu">Link</label>
                                                <input type="text" name="link_invitation" class="form-control"
                                                    id="link_invitation"
                                                    value="{{ route('see.event', $event->slug) }}?invite=" />
                                            </div>
                                        </div>
                                        <button class="btn btn-block btn-primary blue mt-3" id="btn_copy_invitation">
                                            Copy to Clipboard
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="tab-pane fade" id="pills-qrcode" role="tabpanel" aria-labelledby="pills-qrcode-tab">
                    <section class="events">
                        <div class="row">
                            <div class="col-12">
                                <div class="btn-group btn-grid-list">
                                    <a class="btn btn-outline-grey" data-target="list">
                                        <span class="fa fa-list"></span>
                                        List
                                    </a>
                                    <a class="btn btn-outline-grey active" data-target="grid">
                                        <span class="fa fa-th-large"></span>
                                        Grid
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row grid" id="grid">
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt-3">
                                <div class="card">
                                    <div class="headerpink"></div>
                                    <div class="card-body text-center">
                                        <h3>Kehadiran</h3>
                                        {!! QrCode::size(250)->generate($event->code_event) !!}
                                        <p>{{ $event->code_event }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt-3">
                                <div class="card">
                                    <div class="headerpink"></div>
                                    <div class="card-body text-center">
                                        <h3>Undangan</h3>
                                        @php
                                            $link = 'https://hoofey.id/s/' . $event->id;
                                        @endphp
                                        {!! QrCode::size(250)->generate($link) !!}
                                        <p>{{ $link }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="list">
                            <div class="col-12">
                                <div class="table-responsive mt-3">
                                    <table class="table bg-light table-qrcode">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Acara</th>
                                                <th scope="col">Code Event</th>
                                                <th scope="col">QR Code</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Undangan</td>
                                                <td>{{ $event->code_event }}</td>
                                                <td>{!! QrCode::size(30)->generate($event->code_event) !!}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Kehadiran</td>
                                                <td>{{ $link }}</td>
                                                <td>{!! QrCode::size(30)->generate($link) !!}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="tab-pane fade" id="pills-angpao" role="tabpanel" aria-labelledby="pills-angpao-tab">
                    <div class="row">
                        <div class="col-12 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="#" class="btn btn-linear-primary mb-4" data-toggle="modal"
                                                data-target="#addAngpao">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15"
                                                    viewBox="0 0 14 15" fill="none" style="margin-right: 10px">
                                                    <g clip-path="url(#clip0_3033_2213)">
                                                        <path
                                                            d="M14 6.54545V8.45455C14 8.7197 13.9072 8.94508 13.7216 9.13068C13.536 9.31629 13.3106 9.40909 13.0455 9.40909H8.90909V13.5455C8.90909 13.8106 8.81629 14.036 8.63068 14.2216C8.44508 14.4072 8.2197 14.5 7.95455 14.5H6.04545C5.7803 14.5 5.55492 14.4072 5.36932 14.2216C5.18371 14.036 5.09091 13.8106 5.09091 13.5455V9.40909H0.954545C0.689394 9.40909 0.464015 9.31629 0.278409 9.13068C0.092803 8.94508 0 8.7197 0 8.45455V6.54545C0 6.2803 0.092803 6.05492 0.278409 5.86932C0.464015 5.68371 0.689394 5.59091 0.954545 5.59091H5.09091V1.45455C5.09091 1.18939 5.18371 0.964015 5.36932 0.778409C5.55492 0.592803 5.7803 0.5 6.04545 0.5H7.95455C8.2197 0.5 8.44508 0.592803 8.63068 0.778409C8.81629 0.964015 8.90909 1.18939 8.90909 1.45455V5.59091H13.0455C13.3106 5.59091 13.536 5.68371 13.7216 5.86932C13.9072 6.05492 14 6.2803 14 6.54545Z"
                                                            fill="white" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_3033_2213">
                                                            <rect width="14" height="14" fill="white"
                                                                transform="translate(0 0.5)" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                New Angpao
                                            </a>

                                        </div>
                                    </div>
                                    <table id="datatables-message"
                                        class="table-scroll display dt-responsive table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Bank</th>
                                                <th>Nomor Rekening</th>
                                                <th>Nama Penerima</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($event->angpao as $key => $angpao)
                                                <tr>
                                                    <td>
                                                        {{ ++$key }}
                                                    </td>
                                                    <td>
                                                        {{ $angpao->nama_bank }}
                                                    </td>
                                                    <td>
                                                        {{ $angpao->no_rekening }}
                                                    </td>
                                                    <td>
                                                        {{ $angpao->nama_penerima }}
                                                    </td>
                                                    <td>
                                                        <a href="#" class="action-icon edit" data-toggle="modal"
                                                            data-target="#editAngpao{{ $angpao->id }}">
                                                            <i class="fa fa-pencil-square-o"></i>
                                                        </a>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="editAngpao{{ $angpao->id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="editInvitationTextLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <form
                                                                    action="{{ route('customer.update.angpao', ['id' => $angpao->id]) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="editInvitationTextLabel">Tambah Angpao
                                                                            </h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <label>Nama Bank</label>
                                                                                <input type="text" name="nama_bank"
                                                                                    class="form-control"
                                                                                    value="{{ $angpao->nama_bank }}"
                                                                                    required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>No Rekening</label>
                                                                                <input type="text" name="no_rekening"
                                                                                    class="form-control"
                                                                                    value="{{ $angpao->no_rekening }}"
                                                                                    required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Nama Penerima</label>
                                                                                <input type="text" name="nama_penerima"
                                                                                    class="form-control"
                                                                                    value="{{ $angpao->nama_penerima }}"
                                                                                    required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-text-primary"
                                                                                data-dismiss="modal">Tutup</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Simpan</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>

                                                        <a href="{{ route('customer.delete.angpao', ['id' => $angpao->id]) }}"
                                                            class="action-icon object-group">
                                                            <i class="fa fa-trash"></i>
                                                        </a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addAngpao" tabindex="-1" role="dialog" aria-labelledby="editInvitationTextLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('customer.store.angpao') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editInvitationTextLabel">Tambah Angpao</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" value="{{ $event->id }}" name="event_id">
                        <div class="form-group">
                            <label>Nama Bank</label>
                            <input type="text" name="nama_bank" class="form-control" placeholder="Contoh: Bank Mandiri"
                                required>
                        </div>
                        <div class="form-group">
                            <label>No Rekening</label>
                            <input type="text" name="no_rekening" class="form-control" placeholder="Contoh: 809070605040"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Nama Penerima</label>
                            <input type="text" name="nama_penerima" class="form-control"
                                placeholder="Contoh: Nama Mempelai Wanita/Pria" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-text-primary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('add-js')
    <script src="https://use.fontawesome.com/e912f54b8f.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
    <script src="{{ asset('plugin/image-uploader/image-uploader.js') }}"></script>
    <script>
        let invitationText = "";
        $("#datatables-guestbook").DataTable();
        $("#datatables-message").DataTable();
        $(".input-images").imageUploader({
            maxSize: 2 * 1024 * 1024,
            maxFiles: 10,
            mimes: ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml']
        });

        // delete photo 
        $('#delete_photo_wanita').click(function() {
            const id = $(this).attr('data-id')
            $.ajax({ //create an ajax request to display.php
                type: "GET",
                url: "/customer/photo/" + id + "/avatar/wanita",
                success: function(data) {
                    alert('berhasil dihapus');
                    $('#photo_wanita').attr('src',
                        'https://cdn0.iconfinder.com/data/icons/social-media-network-4/48/male_avatar-512.png'
                    )
                    $('#delete_photo_wanita').css('display', 'none')
                }
            })
        })
        $('#delete_photo_pria').click(function() {
            const id = $(this).attr('data-id')
            $.ajax({ //create an ajax request to display.php
                type: "GET",
                url: "/customer/photo/" + id + "/avatar/pria",
                success: function(data) {
                    alert('berhasil dihapus');
                    $('#photo_pria').attr('src',
                        'https://cdn0.iconfinder.com/data/icons/social-media-network-4/48/male_avatar-512.png'
                    )
                    $('#delete_photo_pria').css('display', 'none')
                }
            })
        })

        //Invitation Link & Copy
        $('#nama_tamu').keyup(function() {
            const nama_tamu = document.getElementById('nama_tamu').value;
            const link = "{{ route('see.event', $event->slug) }}";
            const link_complete = link + '?invite=' + encodeURI(nama_tamu);
            document.getElementById('link_invitation').value = link_complete;
        });

        $('#editButtonInvitation').click(function() {
            console.log(true);
            const nama_tamu = document.getElementById('nama_tamu').value;
            /* Get the text field */
            const copyText = document.getElementById('link_invitation');

            /* Select the text field */
            $('#btn_copy').removeAttr('disabled');
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */
            let full_text = "Assalamu'alaikum Wr. Wb \n" +
                "Bismillahirrahmanirrahim. \n \n" +
                "Dear " + nama_tamu + ", \n" +
                "Dengan memohon Rahmat dan Ridho Allah SWT. Tanpa mengurangi rasa hormat, Kami bermaksud ingin memberitahukan kepada Bapak/Ibu/Saudara/i dan Rekan-Rekan bahwa Kami akan melangsungkan Pernikahan yang Insya Allah akan dilaksanakan pada:" +
                "\n\n🗓️ Hari, tanggal: {{ \Carbon\Carbon::parse($event->tanggal_ijab)->dayName }}, {{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('d M Y') }}" +
                "\n✉️ Invitation : " + copyText.value + "\n\n" +
                "Dikarenakan situasi pandemi Covid-19 yang belum membaik, Kami memutuskan untuk merayakannya hanya bersama keluarga dan beberapa teman-teman dekat. Kami memohon maaf tidak dapat mengundang Bapak/Ibu/Saudara/i dan Rekan-Rekan sekalian menjadi bagian dihari bahagia Kami. Dan yang paling penting tetap jaga kesehatan." +
                "\n\nTerima kasih atas pengertiannya dan mohon doa restu dari Bapak/Ibu/Saudara/i dan Rekan-Rekan sekalian." +
                "\nWassalamu'alaikum Wr.Wb." +
                "\n\nKami yang berbahagia,\n" +
                "{{ $event->nama_panggilan_mempelai_wanita }} & {{ $event->nama_panggilan_mempelai_pria }}";
            $('#invitation_text_form').val(full_text);
            invitationText = full_text;
            $('#invitation_text_form').change(function() {
                invitationText = $(this).val();
            });
        })

        // copy to clipboard
        $('#btn_copy_invitation').click(function() {
            const link = $('#link_invitation').val();
            navigator.clipboard.writeText(link);
        });
        $('#btn_copy').click(function() {
            const nama_tamu = document.getElementById('nama_tamu').value;
            /* Get the text field */
            const copyText = document.getElementById('link_invitation');

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            document.execCommand(copyText.value);
            navigator.clipboard.writeText(invitationText);
        });
        //List or Grid
        $(".btn-grid-list .btn").click(function() {
            const value = $(this).attr("data-target");
            $(".btn-grid-list .btn").removeClass("active");
            $(this).addClass("active");
            if (value == "grid") {
                $("#list").removeClass("d-flex");
                $("#list").addClass("d-none");
                $("#grid").removeClass("d-none");
                $("#grid").addClass("d-flex");
            } else {
                $("#grid").removeClass("d-flex");
                $("#grid").addClass("d-none");
                $("#list").removeClass("d-none");
                $("#list").addClass("d-flex");
            }
        });
    </script>
@endsection
