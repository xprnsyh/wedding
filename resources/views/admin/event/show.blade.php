@extends('layouts.admin')
@section('css-add')
    <!-- JQuery DataTable Css -->
    <link href="{{ asset('admin-bsb/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}"
        rel="stylesheet">
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('admin-bsb/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="{{ asset('admin-bsb/plugins/dropzone/dropzone.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">

        <!-- END PAGE TITLE -->

        <div class="row clearfix">

            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-6">
                                <h4 style="font-weight:500; font-size:20px;">Event
                                    {{ $event->nama_panggilan_mempelai_pria }} &
                                    {{ $event->nama_panggilan_mempelai_wanita }}</h4>
                            </div>

                            <div class="col-xs-12 col-sm-6 align-right">

                                <a href="{{ route('preview.event', ['invoice' => $event->order->invoice]) }}"
                                    class="btn btn-info waves-effect">
                                    <i class="material-icons">pageview</i>
                                    <span>Preview</span>
                                </a>
                            </div>

                        </div>
                    </div>

                    <div class="body">
                        @include('layouts.alert')

                        <ul class="nav nav-tabs tab-nav-right" role="tablist">
                            <li role="presentation" class="active"><a href="#Event" data-toggle="tab">Event</a></li>
                            <li role="presentation"><a href="#Guest" data-toggle="tab">Guest</a></li>
                            <li role="presentation"><a href="#QRCode" data-toggle="tab">QR Code</a></li>
                        </ul>

                        <div class="tab-content">
                            <div role="presentation" class="tab-pane fade in active" id="Event">
                                <div class="row clearfix">

                                    {{-- Data Invoice Event --}}
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <b>Invoice</b>
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
                                            <br>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <b>Pilih Template</b>
                                                <select name="template" id="template" class="form-control">
                                                    <option value="Gold">Gold</option>
                                                    <option value="Soft">Soft</option>
                                                    <option value="Prime">Prime</option>
                                                    <option value="Silver">Silver</option>
                                                    <option value="Chocolate">Chocolate</option>
                                                    <option value="Pink">Pink</option>
                                                    <option value="Crystal">Crystal</option>
                                                    <option value="Grey">Grey</option>
                                                    <option value="Camel">Camel</option>
                                                    <option value="Ruby">Ruby</option>
                                                    <option value="Goldy">Goldy</option>
                                                    <option value="Navy">Navy</option>
                                                    <option value="Natural">Natural</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Data Mempelai Pria --}}
                                    <div class="col-md-12 col-sm-12">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <b>Nama Panggilan Mempelai Pria</b>
                                                    <input type="text" name="nama_panggilan_mempelai_pria"
                                                        id="nama_panggilan_mempelai_pria" class="form-control"
                                                        value="{{ $event->nama_panggilan_mempelai_pria }}" disabled>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <b>Nama Lengkap Mempelai Pria</b>
                                                    <input type="text" name="nama_lengkap_mempelai_pria"
                                                        id="nama_lengkap_mempelai_pria" class="form-control"
                                                        value="{{ $event->nama_lengkap_mempelai_pria }}" disabled>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <b>Bio Pria</b>
                                                    <textarea type="text" name="bio_mempelai_pria" id="bio_mempelai_pria"
                                                        class="form-control no-resize"
                                                        disabled>{{ $event->bio_mempelai_pria }}</textarea>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    {{-- Data Mempelai Wanita --}}
                                    <div class="col-md-12 col-sm-12">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <b>Nama Panggilan Mempelai Wanita</b>
                                                    <input type="text" name="nama_panggilan_mempelai_wanita"
                                                        id="nama_panggilan_mempelai_wanita" class="form-control"
                                                        value="{{ $event->nama_panggilan_mempelai_wanita }}" disabled>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <b>Nama Lengkap Mempelai Wanita</b>
                                                    <input type="text" name="nama_lengkap_mempelai_wanita"
                                                        id="nama_lengkap_mempelai_wanita" class="form-control"
                                                        value="{{ $event->nama_lengkap_mempelai_wanita }}" disabled>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <b>Bio Wanita</b>
                                                    <textarea type="text" name="bio_mempelai_wanita"
                                                        id="bio_mempelai_wanita" class="form-control no-resize"
                                                        disabled>{{ $event->bio_mempelai_wanita }}</textarea>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    {{-- Data Acara --}}
                                    <div class="col-md-12 col-sm-12">
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <b>Tanggal Ijab</b>
                                                    <input type="date" name="tanggal_ijab" id="tanggal_ijab"
                                                        class="form-control" value="{{ $event->tanggal_ijab }}" disabled>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <b>Jam Mulai Ijab</b>
                                                    <input type="time" name="jam_mulai_ijab" id="jam_mulai_ijab"
                                                        class="form-control" value="{{ $event->jam_mulai_ijab }}" disabled>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <b>Jam Selesai Ijab</b>
                                                    <input type="time" name="jam_selesai_ijab" id="jam_selesai_ijab"
                                                        class="form-control" value="{{ $event->jam_selesai_ijab }}"
                                                        disabled>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <b>Lokasi Ijab</b>
                                                    <textarea type="text" name="lokasi_ijab" id="lokasi_ijab"
                                                        class="form-control no-resize"
                                                        disabled>{{ $event->lokasi_ijab }}</textarea>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <b>Tanggal Resepsi</b>
                                                    <input type="date" name="tanggal_resepsi" id="tanggal_resepsi"
                                                        class="form-control" value="{{ $event->tanggal_resepsi }}"
                                                        disabled>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <b>Jam Mulai Resepsi</b>
                                                    <input type="time" name="jam_mulai_resepsi" id="jam_mulai_resepsi"
                                                        class="form-control" value="{{ $event->jam_mulai_resepsi }}"
                                                        disabled>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <b>Jam Selesai Resepsi</b>
                                                    <input type="time" name="jam_selesai_resepsi" id="jam_selesai_resepsi"
                                                        class="form-control" value="{{ $event->jam_selesai_resepsi }}"
                                                        disabled>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <b>Lokasi Resepsi</b>
                                                    <textarea type="text" name="lokasi_resepsi" id="lokasi_resepsi"
                                                        class="form-control no-resize"
                                                        disabled>{{ $event->lokasi_resepsi }}</textarea>

                                                </div>
                                            </div>
                                        </div>

                                        <a href="{{ route('admin.edit.event', ['invoice' => $event->order->invoice]) }}"
                                            class="btn btn-primary waves-effect">Edit</a>


                                    </div>




                                </div>
                            </div>

                            <div role="presentation" class="tab-pane fade in" id="Guest">
                                <br>
                                <div class="card" id="tabel_guest">
                                    <div class="header">
                                        <div class="row clearfix">
                                            <div class="col-xs-12 col-sm-6">
                                                <h4><b>Buku Tamu</b></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="body">
                                        <div class="row clearfix">

                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover js-exportable">
                                                    <thead>
                                                        <tr>

                                                            <th>No</th>
                                                            <th>Name</th>
                                                            <th>Phone</th>
                                                            <th>Email</th>
                                                            <th>Address</th>
                                                            <th>Message</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($event->guests as $key => $guest)
                                                            <tr>

                                                                <td>
                                                                    {{ ++$key }}
                                                                </td>
                                                                <td>
                                                                    {{ $guest->name }}
                                                                </td>
                                                                <td>
                                                                    {{ $guest->phone }}
                                                                </td>
                                                                <td>
                                                                    {{ $guest->email }}
                                                                </td>
                                                                <td>
                                                                    {{ $guest->address }}
                                                                </td>
                                                                <td>
                                                                    {{ $guest->pivot->text }}
                                                                </td>

                                                            </tr>


                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <a href="#" id="sembunyi_tabel_guest" class="btn bg-orange waves-effect">Sembunyikan Tabel
                                    Buku Tamu</a>
                                <a href="#" id="tampil_tabel_guest" class="btn bg-green waves-effect">Tampilkan Tabel Buku
                                    Tamu</a>

                            </div>
                            <div role="presentation" class="tab-pane fade in" id="QRCode">
                                <br>
                                <div class="card" id="tabel_guest">
                                    <div class="header">
                                        <div class="row clearfix">
                                            <div class="col-xs-12 col-sm-6">
                                                <h4><b>QR Code</b></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="body">
                                        <div class="row clearfix">

                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover js-exportable">
                                                    <thead>
                                                        <tr>

                                                            <th>No</th>
                                                            <th>Code Event</th>
                                                            <th>QR Code</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr>

                                                            <td>
                                                                1
                                                            </td>
                                                            <td>
                                                                {{ $event->code_event }}
                                                            </td>
                                                            <td>
                                                                {!! QrCode::size(250)->generate($event->code_event) !!}

                                                            </td>


                                                        </tr>




                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <a href="#" id="sembunyi_tabel_guest" class="btn bg-orange waves-effect">Sembunyikan Tabel
                                    Buku Tamu</a>
                                <a href="#" id="tampil_tabel_guest" class="btn bg-green waves-effect">Tampilkan Tabel Buku
                                    Tamu</a>

                            </div>
                        </div>








                    </div>



                </div>
            </div>



        </div>
    </div>
@endsection
@section('js')

    <script>
        $(function() {
            $('#tampil').show();
            $('#sembunyi').hide();
            $('#submit').hide();
            $('#form-edit').hide();

            $('#tampil_tabel_foto').show();
            $('#sembunyi_tabel_foto').hide();
            $('#tabel_foto').hide();

            $('#tampil_tabel_guest').show();
            $('#sembunyi_tabel_guest').hide();
            $('#tabel_guest').hide();


            // form edit
            $('#tampil').click(function() {
                $('#sembunyi').show();
                $('#tampil').hide();
                $('#submit').show();


                $('#form-edit').show();
            });
            $('#sembunyi').click(function() {
                $('#tampil').show();
                $('#sembunyi').hide();
                $('#submit').hide();

                $('#form-edit').hide();
            });

            //tabel foto
            $('#tampil_tabel_foto').click(function() {
                $('#sembunyi_tabel_foto').show();
                $('#tampil_tabel_foto').hide();
                $('#tabel_foto').show();
            });
            $('#sembunyi_tabel_foto').click(function() {
                $('#tampil_tabel_foto').show();
                $('#sembunyi_tabel_foto').hide();

                $('#tabel_foto').hide();
            });

            //tabel guest
            $('#tampil_tabel_guest').click(function() {
                $('#sembunyi_tabel_guest').show();
                $('#tampil_tabel_guest').hide();
                $('#tabel_guest').show();
            });
            $('#sembunyi_tabel_guest').click(function() {
                $('#tampil_tabel_guest').show();
                $('#sembunyi_tabel_guest').hide();

                $('#tabel_guest').hide();
            });

            table = $('#tampil_tabel_guest').DataTable({
                searching: false
            });




        });
    </script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('admin-bsb/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin-bsb/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('admin-bsb/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin-bsb/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('admin-bsb/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('admin-bsb/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin-bsb/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin-bsb/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin-bsb/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>

    <script src="{{ asset('admin-bsb/js/pages/tables/jquery-datatable.js') }}"></script>

@stop
