@extends('customer.event.edit')

@section('tab-content')
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
                                <input type="text" name="slug" id="slug"
                                    class="form-control slug" value="{{ $event->slug }}">
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
                        <div class="col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Pilih Template</label>
                                <select name="template" id="template" class="form-control">
                                    <option value="" selected disabled>Pilih Template</option>
                                    @foreach($list_templates as $template)
                                        <option value="{{$template->name}}"
                                        {{ $template->name == $event->template ? 'selected' : '' }}>
                                        {{ $template->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Pilih lagu</label>
                                <select name="audio_id" class="form-control" required>
                                    <option value="" selected disabled>Pilih Musik</option>
                                    @foreach ($data_audio as $audio)
                                        <option value="{{ $audio->id }}"
                                        {{ $audio->id == $event->audio_id ? 'selected' : '' }}>
                                        {{ $audio->name }}
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
                                                    alt="Foto Pria" width="100%"
                                                    class="event-avatar" style="border-radius: 10px"
                                                    id="show-pria">
                                            </div>
                                        @else
                                            <img src="https://cdn0.iconfinder.com/data/icons/social-media-network-4/48/male_avatar-512.png"
                                                class="event-avatar" alt="" width="100%" id="show-pria">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-12">
                                    <div class="form-group">
                                        <label for="AvatarPria">Foto Pria</label>
                                        <input type="file" name="avatar_pria" id="avatar_pria" class="form-control">
                                        <input type="hidden" name="image_pria">
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
                                        <textarea name="bio_mempelai_pria" id="" cols="30" rows="3" class="form-control">{{ $event->bio_mempelai_pria }}</textarea>
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
                                                    id="show-wanita">
                                            </div>
                                        @else
                                            <img src="https://cdn0.iconfinder.com/data/icons/social-media-network-4/48/male_avatar-512.png"
                                                class="event-avatar" alt="" width="100%" id="show-wanita">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-12">
                                    <div class="form-group">
                                        <label for="AvatarWanita">Foto Wanita</label>
                                        <input type="file" name="avatar_wanita" id="avatar_wanita" class="form-control">
                                        <input type="hidden" name="image_wanita">
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
                                        <textarea name="bio_mempelai_wanita" id="" cols="30" rows="3" class="form-control">{{ $event->bio_mempelai_wanita }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="TanggalIjab">Tanggal Akad</label>
                                <input type="date" name="tanggal_ijab" id="tanggal_ijab"
                                    class="form-control" value="{{ $event->tanggal_ijab }}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="TanggalIjab">Jam Mulai Akad</label>
                                <input type="time" name="jam_mulai_ijab" id="jam_mulai_ijab"
                                    class="form-control" value="{{ $event->jam_mulai_ijab }}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="TanggalIjab">Jam Selesai Akad</label>
                                <input type="time" name="jam_selesai_ijab" id="jam_selesai_ijab"
                                    class="form-control" value="{{ $event->jam_selesai_ijab }}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="TanggalIjab">Lokasi Akad</label>
                                <input type="text" name="lokasi_ijab" id=""
                                    class="form-control" value="{{ $event->lokasi_ijab }}" />
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
                                <input type="time" name="jam_selesai_resepsi"
                                    id="jam_selesai_resepsi" class="form-control"
                                    value="{{ $event->jam_selesai_resepsi }}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="TanggalResepsi">Lokasi Resepsi</label>
                                <input type="text" name="lokasi_resepsi" id=""
                                    class="form-control" value="{{ $event->lokasi_resepsi }}" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if($event->order->orderDetail->product_id == 2 || $event->order->orderDetail->product_id == 3 || $event->order->orderDetail->product_id == 4)
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <div class="group">
                                        <label for="iFrameYoutube">iFrame Youtube</label>
                                        <i class="fa fa-info-circle fa-pull-right" aria-hidden="true" {{ Popper::trigger(true, true, false)->pop('Buka Youtube klik videonya, klik bagikan/share, klik salin link/ copy link.') }}></i>
                                    </div>
                                    <textarea name="link_youtube" id="" cols="30" rows="3" class="form-control">{{ $event->link_youtube }}</textarea>
                                </div>
                            </div>
                        @endif
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <div class="group">
                                    <label for="iFrameMaps">iFrame Maps Akad</label>
                                    <i class="fa fa-info-circle fa-pull-right" aria-hidden="true" {{ Popper::trigger(true, true, false)->pop('Buka Google Maps tandai tempat acaranya, klik bagikan/share, klik salin link/ copy link.') }}></i>
                                </div>
                                <textarea name="gm_ijab" id="" cols="30" rows="3" class="form-control">{{ $event->gm_ijab }}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <div class="group">
                                    <label for="iFrameMaps">iFrame Maps Resepsi</label>
                                    <i class="fa fa-info-circle fa-pull-right" aria-hidden="true" {{ Popper::trigger(true, true, false)->pop('Buka Google Maps tandai tempat acaranya, klik bagikan/share, klik salin link/ copy link.') }}></i>
                                </div>
                                <textarea name="gm_resepsi" id="" cols="30" rows="3" class="form-control">{{ $event->gm_resepsi }}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="logo">Foto Utama</label>
                                <input type="file" name="logo" id=""
                                    class="form-control" />
                            </div>
                        </div>
                        @if ($event->order->orderDetail->product_id == 4)
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <div class="group">
                                        <label for="LinkStreaming">Link Monitor</label>
                                        <i class="fa fa-info-circle fa-pull-right" aria-hidden="true" {{ Popper::trigger(true, true, false)->pop('Pilihan ini digunakan untuk menentukan tampilan monitor.') }}></i>
                                    </div>
                                    <select id="monitor" name="monitor" class="form-control show-tick">
                                        <option value="" disabled selected>Pilih Opsi</option>
                                        <option value="Photo" {{ $event->monitor == "Photo" ? 'selected' : '' }}>Photo</option>
                                        <option value="Video" {{ $event->monitor == "Video" ? 'selected' : '' }}>Video</option>
                                    </select>
                                    <!-- <input type="text" name="link_livestreaming" class="form-control"
                                        placeholder="https://zoom.us"> -->
                                </div>
                            </div>
                        @endif
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
@endsection
