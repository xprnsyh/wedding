<meta name="csrf-token" content="{{ csrf_token() }}">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" CONTENT="noindex, nofollow">
    <title>Hoofey - Wedding of {{ $event->nama_panggilan_mempelai_wanita }} & {{ $event->nama_panggilan_mempelai_pria }}
    </title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon_hoofey.ico') }}"/>
    <!-- <link rel="icon" type="image/png" href="{{ asset('favicon-16x16.png') }}" sizes="16x16" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('template-1/css/dataTables.bootstrap.min.css') }}">
    <style>
        #preview{
            width: 100%;
            margin:0px auto;
        }
</style>
    <style>
        .text-tipe{
            border-radius: 80%;
            padding: 50px,10px;
        }
    </style>

</head>


<body style="background: linear-gradient(132deg, #FBC 11.81%, #F54291 75.09%);">

    <div class="mt-5 pt-5">
        <div class="text-center">
            <img src="{{ asset('img/logo-hoofey-light.png') }}" width="160" class="mb-5">
            <div class="d-flex justify-content-center align-items-center">
                <ul class="nav nav-pills mb-0" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active text-light" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">QR Scan</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-light" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Cari Manual</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link text-light" data-bs-toggle="modal"
                            data-bs-target="#modal_create_guest">Tambah Tamu</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link text-light" id="pills-scan-camera-tab"
                            type="button" role="tab" aria-controls="pills-scan-camera"
                            aria-selected="false">Scan Camera</button>
                    </li>
                </ul>
            </div>
            <div class="container">
                <input class="form-control id_meja" name="id_meja" data-id="{{$id_meja}}" value="{{$id_meja}}" hidden>
                <!--@if (session('error'))-->
                <!--    <div class="alert alert-danger" role="alert">-->
                <!--        {{ session('error') }}-->
                <!--    </div>-->
                <!--@endif-->

                <!--@if (session('success'))-->
                <!--    <div class="alert alert-success" role="alert">-->
                <!--        {{ session()->get('pesan') }}-->
                <!--    </div>-->
                <!--@endif-->

                <!--@if ($errors->any())-->
                <!--    <div class="alert alert-warning" role="alert">-->
                <!--        <ul>-->
                <!--            @foreach ($errors->all() as $val)-->
                <!--                <li>{{ $val }}</li>-->
                <!--            @endforeach-->
                <!--        </ul>-->
                <!--    </div>-->
                <!--@endif-->
                <div class="tab-content my-5" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab" tabindex="0">
                        <div class="col-4 mx-auto">
                            <div class="card">
                                <div class="card-header d-none" id="camera-scan">
                                    <video id="preview"></video>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('guest.attending') }}" method="post"
                                        class="d-inline hidden qr_kode" id="qr_kode">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="event_id" id="event_id"
                                                value="{{ $event->id }}" hidden>
                                            <input type="text" class="form-control" name="kode_qr" id="kode_qr"
                                                autofocus>
                                        </div>
                                        <div class="d-grid mt-3">
                                            <button type="submit" name="submit" id="submit_2"
                                                class="btn btn-lg btn-block btn-primary">Cari</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="d-none" id="status_undangan" data-name="{{$status_undangan}}"></div>
                        <div class="card">
                            <div class="card-body">
                                <table id="guestlist" class="table-scroll display dt-responsive table table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Alamat</th>
                                            <th>No.Hp</th>
                                            <th style="text-align: center;">Status</th>
                                            <th class="text-right">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($invite as $key => $data_guest)
                                            <tr>
                                                <td>
                                                    {{ ++$key }}
                                                </td>
                                                <td class="name" data-name="{{ $data_guest->name }}">
                                                    {{ $data_guest->name ?? '' }}  
                                                    @if ($data_guest->tipe == 'VIP')
                                                        <span class="badge badge-pill text-bg-primary text-tipe">
                                                            {{ $data_guest->tipe }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $data_guest->address ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $data_guest->no_hp ?? '' }}
                                                </td>
                                                <td>
                                                    @switch($data_guest->status)
                                                        @case('Hadir')
                                                            <div class="text-center">
                                                                <span
                                                                    class="badge badge-pill text-bg-success">{{ $data_guest->status }}</span>
                                                                @if ($data_guest->InviteGroup->count() > 0)
                                                                    {{ $data_guest->InviteGroup->count() }} Orang
                                                                @endif
                                                                @if ($data_guest->klasifikasi == 'Sendiri')
                                                                    <p>{{ $data_guest->attended_at ? \Carbon\Carbon::parse($data_guest->attended_at)->format('d M Y H:i A') : 'Belum Hadir' }}
                                                                    </p>
                                                                @endif
                                                            </div>
                                                        @break

                                                        @case('Tidak Hadir')
                                                            <div class="text-center">
                                                                <span
                                                                    class="badge badge-pill text-bg-danger">{{ $data_guest->status }}</span>
                                                                @if ($data_guest->InviteGroup->count() > 0)
                                                                    {{ $data_guest->InviteGroup->count() }} Orang
                                                                @endif
                                                                <p>{{ $data_guest->attended_at ? \Carbon\Carbon::parse($data_guest->attended_at)->format('d M Y H:i A') : 'Belum Hadir' }}
                                                                </p>
                                                            </div>
                                                        @break

                                                        @default
                                                            <div class="text-center">
                                                                <span
                                                                    class="badge badge-pill text-bg-info">{{ $data_guest->status }}</span>
                                                                @if ($data_guest->InviteGroup->count() > 0)
                                                                    {{ $data_guest->InviteGroup->count() }} Orang
                                                                @endif
                                                                <p>{{ $data_guest->attended_at ? \Carbon\Carbon::parse($data_guest->attended_at)->format('d M Y H:i A') : 'Belum Hadir' }}
                                                                </p>
                                                            </div>
                                                    @endswitch
                                                </td>
                                                <td class="text-right">
                                                    <button class="btn btn-warning action-icon edit"
                                                        data-id="{{ $data_guest->id }}">
                                                        <i class="fa fa-pencil-square-o"></i>
                                                    </button>
                                                    @if ($data_guest->klasifikasi == 'Group')
                                                        <button class="btn btn-info action-icon show_group"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modal_show_group{{ $data_guest->id }}"
                                                            data-id="{{ $data_guest->id }}"
                                                            data-name="{{ $event->slug }}">
                                                            <i class="iconify" data-icon="bx:show"></i>
                                                        </button>
                                                    @endif
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
    </div>

    <!-- Modal Create Guest -->
    <div class="modal fade" tabindex="-1" id="modal_create_guest">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Guest Baru</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form  method="post"
                    enctype="multipart/form-data" class="new_guest">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-4 fv-row">
                            <label class="required form-label">Nama</label>
                            <input type="text" name="name" id="name" class="form-control mb-2" placeholder="Nama..."
                                required />
                        </div>
                        <div class="mb-4 fv-row">
                            <label class="required form-label">Alamat</label>
                            <input type="text" name="address" id="address" class="form-control mb-2" placeholder="Alamat..."
                                required />
                        </div>
                        <div class="mb-4 fv-row">
                            <label class="required form-label">No.Hp</label>
                            <input type="text" name="no_hp" id="phone" class="form-control mb-2" placeholder="no..."
                                required />
                        </div>
                        <input class="form-control" type="text" id="event_id" value="{{ $event->id }}" name="event_id"
                            hidden>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        <button type="submit" id="new_guest" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Show Group -->
    @foreach ($invite as $key => $data_guest)
        <div class="modal fade" tabindex="-1" id="modal_show_group{{ $data_guest->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">List Guest Group</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table id="datatable-guestgroup" class="table-scroll display dt-responsive table table-hover">
                            <thead>
                                <th>No</th>
                                <th>Name</th>
                                <th>Alamat</th>
                                <th>No.Hp</th>
                                <th style="text-align: center;">Status</th>
                            </thead>
                            <tbody id="tbody_group">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://use.fontawesome.com/e912f54b8f.js"></script>
    <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" ></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

    <script>

        var all = $('#status_undangan').data('name');
        var all_hadir = $('#all_hadir').data('name');
        $(document).ready(function() {
            $('#guestlist').DataTable({
                "pageLength": 25,
                "language": {
                    "lengthMenu": "_MENU_",
                    "search": ""
                },
                fnInitComplete: function(){
                    $('div.toolbar').html(all);
                },
                "dom": "<'d-flex justify-content-between align-items-center mb-4'<'toolbar'>f>tr" +
                    "<'d-flex justify-content-between align-items-center mt-4'lp>"
            });
        });

        $(document).on('click', '.edit', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            const parent = e.target.closest('tr');
            var id_meja = $('.id_meja').val();
            var name = parent.querySelectorAll('td')[1].innerText;

            Swal.fire({
                position: 'center',
                icon: 'warning',
                title: 'Apakah Anda Yakin ingin mengubah status \n' + name + '\n menjadi hadir ?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, ubah status',
                cancelButtonText: 'Batalkan'
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: "{{ route('guest.attending.manual') }}",
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        async: true,
                        data: {
                            ids: id,
                            id_meja : id_meja
                        },
                        success: function(data) {
                            
                            if (data['success'] == true) {
                                if (data['message'] == 'Sendiri') {
                                    if (data['tipe'] == 'VIP') {
                                        Swal.fire({
                                            position: 'center',
                                            icon: 'success',
                                            title: 'Tamu VIP',
                                            text: 'Selamat Datang '+ data['pesan'],
                                            showConfirmButton: false,
                                            timer: 2500
                                        }).then(function() {
                                            location.reload();
                                        });
                                    } else {
                                        Swal.fire({
                                            position: 'center',
                                            icon: 'success',
                                            title: 'Selamat Datang ' + data['pesan'],
                                            showConfirmButton: false,
                                            timer: 2500
                                        }).then(function() {
                                            location.reload();
                                        });
                                    }
                                } else if (data['message'] == 'Group'){
                                    sweetalert_group(data);
                                } else {
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'warning',
                                        title: 'QR Kode ' + data['pesan'] + ' sudah mengisi Buku Tamu',
                                        showConfirmButton: false,
                                        timer: 2500
                                    }).then(function() {
                                        location.reload();
                                    });
                                }
                            } else {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    title: 'Data tidak ada',
                                    showConfirmButton: false,
                                    timer: 2500
                                }).then(function() {
                                    location.reload();
                                });
                            }
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Tidak dapat mengakses server',
                                showConfirmButton: false,
                                timer: 2500
                            }).then(function() {
                                location.reload();
                            });
                        }
                    });
                } else {

                }
            });
        });

    // $(document).ready(function(){
    //       $('#qr_input').focus();
    //     });

        async function sweetalert_group(data) {
            const steps = ['1', '2', '3']
            const question = ['Nama', 'Alamat', 'No. Handphone']
            const id_invite = data['invite_id']
            var id_meja = $('.id_meja').val();
            console.log(id_meja);
            const swalQueueStep = Swal.mixin({
                confirmButtonText: 'Forward',
                cancelButtonText: 'Back',
                progressSteps: steps,
                input: 'text',
                inputAttributes: {
                    required: true
                },
                reverseButtons: true,
                validationMessage: 'This field is required'
            })

            var values = []
            let currentStep

            for (currentStep = 0; currentStep < steps.length;) {
                const result = await swalQueueStep.fire({
                    title: `${question[currentStep]}`,
                    inputValue: values[currentStep],
                    showCancelButton: currentStep > 0,
                    currentProgressStep: currentStep
                })

                if (result.value) {
                    values[currentStep] = result.value
                    currentStep++
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    currentStep--
                } else {
                    break
                }
            }

            if (currentStep === steps.length) {
                const group = {
                    name: values[0],
                    address: values[1],
                    no_hp: values[2],
                }
                $.ajax({
                    url: "{{ route('guest.attending.group') }}",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        data_group: group,
                        event_id: data['event_id'],
                        invite_id: id_invite,
                        id_meja : id_meja
                    },
                    success: function(data) {
                        if (data['success'] == true) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Selamat Datang ' + data['pesan'],
                                showConfirmButton: false,
                                timer: 2500
                            }).then(function() {
                                // location.reload();
                            });
                        } else {
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Gagal Menyimpan Data',
                                showConfirmButton: false,
                                timer: 2500
                            }).then(function() {
                                // location.reload();
                            });
                        }
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Tidak dapat mengakses server',
                            showConfirmButton: false,
                            timer: 2500
                        }).then(function() {
                            // location.reload();
                        });
                    }
                });
            }
        };

        // modal show group
        $(document).on('click', '.show_group', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var slug = $(this).data('name');
            $.ajax({
                url: "{{ route('list.group.guestbook', '') }}" + '/' + id,
                type: "get",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                async: true,
                data: {
                    id: id,
                    slug: slug,
                },
                success: function(data) {
                    if (data['success'] == true) {
                        var a = 1;
                        var table = $('#datatable-guestgroup tbody');
                        table.empty();
                        $.each(data['invite_group'], function(index, value) {
                            var date = moment(value.attended_at).format('DD MMM Y H:m A');
                            table.append("<tr>" +
                                "<td>" + index + "</td>" +
                                "<td>" + value.name + "</td>" +
                                "<td>" + value.address + "</td>" +
                                "<td>" + value.no_hp + "</td>" +
                                "<td>" + "<span class='badge badge-pill text-bg-success'>" +
                                    value.status + "</span>" +
                                "<p>" + date + "</p>" + "</td>" + "</tr>"
                            
                            );
                        });
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data tidak ada',
                            showConfirmButton: false,
                            timer: 2500
                        }).then(function() {
                            location.reload();
                        });
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Tidak dapat mengakses server',
                        showConfirmButton: false,
                        timer: 2500
                    }).then(function() {
                        location.reload();
                    });
                }
            });
        });

        //attending scan
        $('#qr_kode').on('submit', function(e) {
            e.preventDefault();
            var kode = $('#kode_qr').val();
            var id_event = $('#event_id').val();
            var id_meja = $('.id_meja').val();
            $.ajax({
                url: "{{ route('guest.attending') }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                async: true,
                data: {
                    kode_qr: kode,
                    event_id: id_event,
                    id_meja : id_meja
                },
                success: function(data) {
                    if (data['success'] == true) {
                        if (data['message'] == 'Sendiri') {
                            if (data['tipe'] == 'VIP') {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Tamu VIP',
                                    text: 'Selamat Datang '+ data['pesan'],
                                    showConfirmButton: false,
                                    timer: 2500
                                }).then(function() {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Selamat Datang ' + data['pesan'],
                                    showConfirmButton: false,
                                    timer: 2500
                                }).then(function() {
                                    location.reload();
                                });
                            }
                        } else if (data['message'] == 'Group') {
                            sweetalert_group(data);
                        } else {
                            Swal.fire({
                                position: 'center',
                                icon: 'warning',
                                title: 'QR Kode ' + data['pesan'] + ' Sudah Mengisi Buku Tamu',
                                showConfirmButton: false,
                                timer: 2500
                            }).then(function() {
                                location.reload();
                            });
                        }

                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'QR kode Tidak Terdaftar',
                            showConfirmButton: false,
                            timer: 2500
                        }).then(function() {
                            location.reload();
                        });
                    }
                },
            });
        });
        
        $(document).on('click', '#new_guest', function(e){
            e.preventDefault();
            let name = $('#name').val();
            let address = $('#address').val();
            let phone = $('#phone').val();
            let event_id = $('#event_id').val();
            let id_meja = $('.id_meja').val();
            $.ajax({
                url: "{{ route('new.guestbook', $event->slug) }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    name: name,
                    address: address,
                    phone: phone,
                    event_id: event_id,
                    id_meja : id_meja
                },
                success: function(data){
                    console.log(data['pesan']);
                    if (data['success'] == true) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Selamat Datang ' + data['pesan'],
                            showConfirmButton: false,
                            timer: 2500
                        }).then(function(){
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: data['pesan'],
                            showConfirmButton: false,
                            timer: 2500
                        }).then(function() {
                            location.reload();
                        });
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Tidak dapat mengakses server',
                        showConfirmButton: false,
                        timer: 2500
                    }).then(function() {
                        location.reload();
                    });
                }
            });
        });

        $(document).on('click', '#pills-scan-camera-tab',function(){
            // document.getElementById("kode_qr_2").focus();
            $('#camera-scan').removeClass('d-none');
            let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
            scanner.addListener('scan', function (content) {
                document.getElementById("kode_qr").value = content;
                $('#submit_2').submit();
            });

            Instascan.Camera.getCameras().then(function (cameras) {
                if (cameras.length > 0) {
                scanner.start(cameras[0]);
                } else {
                console.error('No cameras found.');
                }
            }).catch(function (e) {
                console.error(e);
            });
            // $('#camera-scan').addClass('d-none');
        })

        window.onload = function(){
            document.getElementById("kode_qr").focus();
        };
        
        
        
    </script>
</body>

</html>
