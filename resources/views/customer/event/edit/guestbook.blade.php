

@extends('customer.event.edit')

@section('tab-content')
<div class="row">
    <div class="col-12 mt-3">
        <div class="card">
            <div class="card-body">
                <div class="card-toolbar">
                    <div class="row">
                        <div class="col-6">
                            <a href="#" class="btn btn-linear-primary mb-4" data-toggle="modal"
                                data-target="#modal_import_guest_list">
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
                                Import Daftar Tamu
                            </a>
                            <div class="btn-group">
                                <a href="{{ route('guestbook.attending.pdf', ['id' => $event->id]) }}"
                                    class="btn btn-linear-green mb-4 ml-2" target="_blank">
                                    <i class="fa fa-download mr-2" aria-hidden="true"
                                        style="font-size: 1.5em; vertical-align: -3px"></i>
                                    Download
                                </a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex justify-content-end " data-gb-table-toolbar="base">
                                <a class="btn btn-linear-primary" data-toggle="modal" data-target="#modal_create_guest">
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
                                Tambah Tamu</a>
                            </div>
                            <div class="justify-content-end align-items-center d-none" data-gb-table-toolbar="selected">
                                <div class="fw-bold m-2">
                                    <span class="m-2" data-gb-table-select="selected_count"></span>Selected
                                </div>
                                <button type="button" class="btn btn-danger" data-gb-table-select="delete_selected">Delete
                                    Selected</button>
                            </div>
                        </div>
                    </div>
                </div>
                <table id="datatables-guestlist"
                    class="table-scroll display dt-responsive table table-hover">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" class="gb-all" value="1"
                                    id="check-all-gb" />
                            </th>
                            <th>No</th>
                            <th>Name</th>
                            <th>No.Hp</th>
                            <th>Tipe</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($event->invite as $key => $guest)
                            <tr>
                                <td>
                                    <input class="gb" type="checkbox"
                                        value="{{ $guest->id }}" />
                                </td>
                                <td>
                                    {{ ++$key }}
                                </td>
                                <td>
                                    {{ $guest->name ?? '' }}
                                </td>
                                <td>
                                    {{ $guest->no_hp ?? '' }}
                                </td>
                                <td>
                                    {{ $guest->tipe ?? '' }}
                                </td>
                                <td>
                                    @switch($guest->status)
                                        @case('Hadir')
                                            <span
                                                class="badge badge-pill badge-success">{{ $guest->status }}</span>
                                        @break

                                        @case('Tidak Hadir')
                                            <span
                                                class="badge badge-pill badge-danger">{{ $guest->status }}</span>
                                        @break

                                        @default
                                            <span
                                                class="badge badge-pill badge-orange">{{ $guest->status }}</span>
                                    @endswitch
                                </td>
                                <td>
                                    <input type="text" id='copys'
                                        value="{{ route('see.event', ['slug' => $event->slug]) }}?invite={{ $guest->rand_code }}-{{ $guest->name }}"
                                        hidden>
                                    <!-- <button value="{{ route('see.event', $event->slug) }}?invite={{ $guest->rand_code }}&nama={{ $guest->name }}"
                                                    id="buttoncopy">Copy Link</button> -->
                                    <a class="action-icon copy copies_btn_link" href="#"
                                        title="copy link"
                                        data-id="{{ route('see.event', ['slug' => $event->slug]) }}?invite={{ $guest->rand_code }}-{{ $guest->name }}">
                                        <i class="fa fa-files-o" aria-hidden="true"></i>
                                    </a>
                                    @if ($event->order->orderDetail->product_id == 3 || $event->order->orderDetail->product_id == 4)
                                        <a class="action-icon download mt-3" target="_blank" title="download QR Code"
                                            href="{{ route('export.pdf', $guest->id) }}">
                                            <i class="fa fa-download"
                                                aria-hidden="true"></i>
                                        </a>
                                    @endif
                                    <a class="action-icon object-group delete mt-3" title="delete" href="{{ route('delete.guest.list', $event->slug) }}?id={{$guest->id}}">
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
@endsection
