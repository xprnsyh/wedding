@extends('layouts.adminv2')
@section('css-add')
    {{-- Datatables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" />
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
                </ol>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        <section class="orders">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('layouts.alert')
                            <div class="row">
                                <div class="col-12">
                                    <a href="{{ route('customer.create.event') }}" class="btn btn-linear-primary mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15"
                                            fill="none" style="margin-right: 10px">
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
                                </div>
                            </div>
                            <table id="datatables" class="display dt-responsive table table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th>Invoice</th>
                                        <th>Link-Monitor</th>
                                        <th>Link-Meja Tamu</th>
                                        <th>Mempelai Pria</th>
                                        <th>Acara Ijab</th>
                                        <th width="130">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($events as $event)
                                        <tr>
                                            <td>
                                                <a
                                                    href="{{ route('customer.edit.event', ['invoice' => $event->order->invoice]) }}">
                                                    {{ $event->order->invoice ?? ''}}
                                                </a>
                                            </td>
                                            <td>
                                                @if ($event->order->orderDetail->product_id == 4)
                                                    <a  href="/s/{{ $event->id }}/{{ 1 }}"
                                                        target="_blank" title="Monitor 1"><iconify-icon icon="lucide:monitor-play"></iconify-icon></a>
                                                    <a  href="/s/{{ $event->id }}/{{ 2 }}"
                                                        target="_blank" title="Monitor 2" class="m-3"><iconify-icon icon="lucide:monitor-play"></iconify-icon></a>
                                                @else
                                                    <a href="#" title="Monitor"><iconify-icon icon="lucide:monitor-play"></iconify-icon></a>
                                                @endif
                                                    
                                            </td>
                                            <td>
                                                @if ($event->order->orderDetail->product_id == 3 || $event->order->orderDetail->product_id == 4)
                                                    <a href="{{ route('list.guestbook', [ 'slug' => $event->slug, 'id_meja' => 1 ]) }}" target="_blank" title="Meja tamu 1"><iconify-icon icon="guidance:information-desk-people"></iconify-icon></a>
                                                    <a href="{{ route('list.guestbook', [ 'slug' => $event->slug, 'id_meja' => 2 ]) }}" class="m-3" target="_blank" title="Meja tamu 2"><iconify-icon icon="guidance:information-desk-people"></iconify-icon></a>
                                                @else
                                                    <a href="#" title="Meja tamu"><iconify-icon icon="guidance:information-desk-people"></iconify-icon></a>
                                                @endif
                                                    
                                            </td>
                                            <td>{{ $event->nama_lengkap_mempelai_pria ?? ''}}</td>
                                            <td>{{ $event->tanggal_ijab ?? ''}}</td>
                                            <td>
                                               <a href="{{ route('customer.edit.event', ['invoice' => $event->order->invoice]) }}"
                                                    class="action-icon edit" title="edit">
                                                    <i class="fa fa-pencil-square-o"></i>
                                                </a> 
                                                <a href="{{ route('see.event', ['slug' => $event->slug ?? '']) }}"
                                                    class="action-icon object-group" target="_blank" title="preview">
                                                    <i class="fa fa-eye"></i>
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
        </section>
    </div>
    {{-- <div class="container-fluid">
    <div class="page-title">
        <h3><i class="material-icons">library_books</i> My Events</h3>
    </div>
    <div class="row clearfix">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="info-box bg-pink">
                <div class="content">
                    <div class="text font-bold text-center">
                        <i class="material-icons">library_books</i>
                        <p>Jumlah Event</p>
                    </div>
                    @if (count($events) > 0)
                    <div class="number">{{$events->count()}}</div>
                    @else
                    <div class="number">0</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6">
                            <h4>Events</h4>
                        </div>
                        <div class="col-xs-12 col-sm-6 align-right">

                            <a href="{{route('customer.create.event')}}" class="btn btn-info waves-effect">
                                <i class="material-icons">add</i>
                                <span>New Event</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="body">
                    @include('layouts.alert')
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example">
                            <thead>
                                <tr>
                                    <th>Invoice #</th>
                                    <th>Nama Lengkap Mempelai Pria</th>
                                    <th>Acara Ijab</th>
                                    <th width="130">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                <tr>
                                    <td>
                                        <a href="{{route('customer.show.event', [ 'invoice' => $event->order->invoice ])}}">
                                            {{$event->order->invoice}}
                                        </a>
                                    </td>
                                    <td>{{$event->nama_lengkap_mempelai_pria}}</td>
                                    <td>{{$event->tanggal_ijab}}</td>
                                    <td>
                                        <a href="{{route('customer.edit.event', [ 'invoice' => $event->order->invoice ])}}" class="btn btn-warning btn-circle waves-effect waves-circle waves-float">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <a href="{{route('see.event',[ 'slug' => $event->slug ?? '' ])}}" class="btn btn-success btn-circle waves-effect waves-circle waves-float" target="_blank">
                                            <i class="material-icons">open_in_new</i>
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
</div> --}}
@endsection
@section('add-js')
    <script src="https://use.fontawesome.com/e912f54b8f.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#datatables").DataTable({
                responsive: true
            });
        });
    </script>
@endsection
