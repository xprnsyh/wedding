

@extends('customer.event.edit')

@section('tab-content')
<div class="row">
    <div class="col-12 mt-3">
        <div class="card">
            <div class="card-body">
                <div class="card-toolbar">
                    <div class="row">
                        <div class="col-6">
                            <div class="justify-content-end align-items-center d-none" data-sil-table-toolbar="selected">
                                <div class="fw-bold m-2">
                                    <span class="m-2" data-sil-table-select="selected_count"></span>Selected
                                </div>
                                <button type="button" class="btn btn-danger" data-sil-table-select="delete_selected">Delete
                                    Selected</button>
                            </div>
                        </div>
                    </div>
                </div>
                <table id="datatables-send-link"
                    class="table-scroll display dt-responsive table table-hover">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" class="sil" value="1" id="check-all-sil" />
                            </th>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No.Hp</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($event->invite as $key => $guest)
                            <tr>
                                <td>
                                    <input class="sil" type="checkbox"
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
                                    <!-- <input type="text" id="link_invitation_wa"
                                        class="form-check-input link_wa" hidden
                                        value="{{ route('see.event', ['slug' => $event->slug]) }}?invite={{ $guest->rand_code }}-{{ $guest->name }}">
                                    <link itemprop="thumbnailUrl" href="{{ asset('public/admin/assets/images/events/T5yq-1696662435/_1697515472.png') }}">
                                    <span itemprop="thumbnail" itemscope itemtype="http://schema.org/ImageObject">
                                        <link itemprop="url" href="{{ route('see.event', ['slug' => $event->slug]) }}?invite={{ $guest->rand_code }}-{{ $guest->name }}">
                                    </span> -->
                                    <a class="action-icon send send_invitation_link" title="send-link"
                                        data-id="{{ route('see.event', ['slug' => $event->slug]) }}?invite={{ $guest->rand_code }}-{{ $guest->name }}"
                                        data-target="_blank">
                                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
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
