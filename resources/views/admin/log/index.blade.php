@extends('layouts.adminv2')
@section('css-add')
    <!-- JQuery DataTable Css -->
    {{-- <link href="{{ asset('admin-bsb/plugins/DataTables/datatables.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" />
    <!-- Bootstrap Css -->
    {{-- <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" />
<link href="{{asset('css/custom.css')}}" rel="stylesheet" /> --}}
    {{-- <!-- <script src="{{ mix('js/app.js') }}"></script> --> --}}
    {{-- <!-- <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script> --> --}}
    {{-- <link src="{{ asset('admin-bsb/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" /> --}}
@endsection
@section('content')
    <div class="container">

        <!-- PAGE TITLE -->
        <div class="page-title">
            <h3 style="font-weight: 500;">Log Activity</h3>
        </div>
        <!-- END PAGE TITLE -->
        @role('admin')
            <div class="row">

                {{-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Data hasil export excel hanya dibatasi 10,000 data terbaru.
            </div>
        </div> --}}
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="card">
                        {{-- <div class="card-header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <h4 style="font-weight:500; font-size:20px;">Mencari aktivitas berdasarkan IP</h4>
                                </div>
                                <div class="col-xs-12 col-sm-6 align-right">
                                    <a href="{{ route('admin.export.log') }}" class="btn btn-info waves-effect"
                                        style="padding: 8px 16px;">
                                        <i class="material-icons">download</i> <span>Export Log Activity</span>
                                    </a>
                                </div>
                            </div>
                        </div> --}}
                        <div class="card-body">
                            @include('layouts.alert')
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover display" id="data">
                                    <thead>
                                        <tr>
                                            <th>Waktu</th>
                                            <th>IP</th>
                                            <th>Nama</th>
                                            <th>Event</th>
                                            <th>Extra</th>
                                            <th>URL</th>
                                            <th>Method</th>
                                            <th>Agent</th>


                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Waktu</th>
                                            <th>IP</th>
                                            <th>Nama</th>
                                            <th>Event</th>
                                            <th>Extra</th>
                                            <th>URL</th>
                                            <th>Method</th>
                                            <th>Agent</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endrole
    </div>
@endsection

@section('add-js')
    <!-- Waves -->
    {{-- <script type="text/javascript" src="{{ asset('admin-bsb/plugins/node-waves/waves.js') }}"></script> --}}

    <!-- Sweetalert -->
    {{-- <script type="text/javascript" src="{{ asset('admin-bsb/plugins/sweetalert/sweetalert.min.js') }}"></script> --}}
    <!-- Jquery DataTable Plugin Js -->
    {{-- <script type="text/javascript" src="{{ asset('admin-bsb/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>

    <script type="text/javascript" src="{{ asset('admin-bsb/plugins/DataTables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin-bsb/plugins/DataTables/js/dataTables.bootstrap4.min.js') }}"></script> --}}

    <script src="https://use.fontawesome.com/e912f54b8f.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('#data').DataTable({
                paging: true,
                processing: true,
                serverSide: true,
                searching: true,
                ordering: false,
                sorting: true,
                ajax: {
                    url: "{{ route('admin.ambil.data.log') }}",
                    type: "POST",
                    'data': function(d) {
                        d._token = "{{ csrf_token() }}";
                    },
                },
                columns: [{
                        "data": "created_at",
                        "name": 'created_at',
                        orderable: false,
                    },
                    {
                        "data": "ip",
                        "name": 'ip',
                        searchable: true
                    },

                    {
                        "data": "user",
                        "name": 'user',
                        orderable: false,
                    },
                    {
                        "data": "event",
                        "name": 'event',
                        orderable: false,
                    },
                    {
                        "data": "extra",
                        "name": 'extra',
                        orderable: false,
                    },
                    {
                        "data": "url",
                        "name": 'url',
                        orderable: false,
                    },
                    {
                        "data": "method",
                        "name": 'method',
                        orderable: false,
                    },
                    {
                        "data": "agent",
                        "name": 'agent',
                        orderable: false,
                    }
                ],
            });
        });
    </script>
@endsection
