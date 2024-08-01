@extends('layouts.adminv2')
@section('css-add')
    {{-- Datatables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="{{ asset('plugin/image-uploader/image-uploader.css') }}" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
    <style>
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12"
                                fill="none">
                                <g clip-path="url(#clip0_3045_293)">
                                    <path
                                        d="M11.8471 6.94216V10.9806C11.8471 11.1265 11.7938 11.2527 11.6872 11.3592C11.5807 11.4658 11.4545 11.5191 11.3086 11.5191H8.07786V8.28831H5.92401V11.5191H2.69324C2.54741 11.5191 2.42121 11.4658 2.31464 11.3592C2.20807 11.2527 2.15478 11.1265 2.15478 10.9806V6.94216C2.15478 6.93655 2.15618 6.92814 2.15899 6.91692C2.16179 6.9057 2.16319 6.89729 2.16319 6.89168L7.00094 2.9037L11.8387 6.89168C11.8443 6.90289 11.8471 6.91972 11.8471 6.94216ZM13.7233 6.36163L13.2017 6.98423C13.1568 7.03471 13.0979 7.06556 13.025 7.07677H12.9997C12.9268 7.07677 12.8679 7.05714 12.8231 7.01788L7.00094 2.16331L1.17882 7.01788C1.11151 7.06275 1.0442 7.08238 0.976896 7.07677C0.90398 7.06556 0.845086 7.03471 0.800214 6.98423L0.278579 6.36163C0.233707 6.30554 0.214076 6.23963 0.219685 6.16391C0.225294 6.08819 0.256143 6.02789 0.312233 5.98302L6.36151 0.943359C6.541 0.797526 6.75414 0.724609 7.00094 0.724609C7.24773 0.724609 7.46087 0.797526 7.64036 0.943359L9.69324 2.65971V1.01908C9.69324 0.940555 9.71848 0.876052 9.76896 0.825571C9.81944 0.77509 9.88395 0.74985 9.96247 0.74985H11.5779C11.6564 0.74985 11.7209 0.77509 11.7714 0.825571C11.8218 0.876052 11.8471 0.940555 11.8471 1.01908V4.45177L13.6896 5.98302C13.7457 6.02789 13.7766 6.08819 13.7822 6.16391C13.7878 6.23963 13.7682 6.30554 13.7233 6.36163Z"
                                        fill="#F54291" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_3045_293">
                                        <rect width="14" height="11.0385" fill="white"
                                            transform="translate(0 0.480469)" />
                                    </clipPath>
                                </defs>
                            </svg></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><a
                            href="{{ route('admin.list.event') }}">Event</a></li>
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
                <ul class="nav nav-pills mb-3">
                    <li class="nav-item">
                        <a href="{{ route('admin.edit.event', ['invoice' => $event->order->invoice]) }}">
                            <span class="iconify" data-icon="bx:bx-user"></span>
                            Data
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.edit.text', ['invoice' => $event->order->invoice]) }}">
                            <span class="iconify" data-icon="bx:message-rounded-edit"></span>
                            Text Section
                        </a>
                    </li>
                    @if (
                        $event->order->orderDetail->product_id == 2 ||
                            $event->order->orderDetail->product_id == 3 ||
                            $event->order->orderDetail->product_id == 4)
                        <li class="nav-item">
                            <a href="{{ route('admin.edit.photos', ['invoice' => $event->order->invoice]) }}">
                                <span class="iconify" data-icon="bx:bx-image-add"></span>
                                Photos
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{ route('admin.edit.guestbooks', ['invoice' => $event->order->invoice]) }}">
                            <span class="iconify" data-icon="bx:bx-user-pin"></span>
                            GuestBook
                        </a>
                    </li>
                    @if (
                        $event->order->orderDetail->product_id == 2 ||
                            $event->order->orderDetail->product_id == 3 ||
                            $event->order->orderDetail->product_id == 4)
                        <li class="nav-item">
                            <a
                                href="{{ route('admin.edit.templatemessage', ['invoice' => $event->order->invoice]) }}">
                                <span class="iconify" data-icon="entypo:new-message"></span>
                                Template Message
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.edit.sendlink', ['invoice' => $event->order->invoice]) }}">
                                <span class="iconify" data-icon="tabler:message-check"></span>
                                Send Invitation Link
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.edit.angpao', ['invoice' => $event->order->invoice]) }}">
                                <span class="iconify" data-icon="fa6-solid:rupiah-sign"></span>
                                Angpao
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{ route('admin.edit.greetings', ['invoice' => $event->order->invoice]) }}">
                            <span class="iconify" data-icon="bx:bx-message-rounded"></span>
                            Wedding greetings
                        </a>
                    </li>
                </ul>

                <ul style="list-style: none">
                    <li>
                        <div class="btn-group">
                            <a href="{{ route('see.event', ['slug' => $event->slug]) }}" class="btn btn-primary blue">
                                <span class="iconify" data-icon="bx:bx-link-external"></span>
                                Preview
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
            @yield('tab-content')
        </section>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addAngpao" tabindex="-1" role="dialog" aria-labelledby="editInvitationTextLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('admin.store.angpao') }}" method="post">
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
                            <input type="text" name="nama_bank" class="form-control"
                                placeholder="Contoh: Bank Mandiri" required>
                        </div>
                        <div class="form-group">
                            <label>No Rekening</label>
                            <input type="text" name="no_rekening" class="form-control"
                                placeholder="Contoh: 809070605040" required>
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

    <!-- Modal Import Guest List -->

    <div class="modal fade" tabindex="-1" id="modal_import_guest_list">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('import.guest.list') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h3 class="modal-title">Import Guest List</h3>
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <span class="svg-icon svg-icon-1"></span>
                        </div>
                    </div>

                    <div class="modal-body d-grid gap-5">
                        <div>
                            <h3>1. Download Contoh File</h3>
                            <div class="d-grid gap-1">
                                <label class="form-label gray-600">Tekan Tombol Download dibawah untuk mendapatakan contoh
                                    file</label>
                                <a href="{{ route('sample.guest.list') }}" class="btn btn-success">Download</a>
                            </div>
                        </div>
                        <input type="hidden" value="{{ $event->id }}" name="event_id">
                        <div>
                            <h3>2. Upload File</h3>
                            <div class="">
                                <label class="form-label required gray-600">File dalam format .xls, atau .xlsx. Maks. 2
                                    MB</label>
                                <input type="file" class="form-control" name="document_file" required />
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Add Guest -->
    <div class="modal fade" tabindex="-1" id="modal_create_guest">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Add Guest</h3>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-1"></span>
                    </div>
                </div>
                <form action="{{ route('create.guest', $event->slug) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="required form-label required">Name</label>
                            <input type="text" name="name" class="form-control mb-2" placeholder="Mawar A"
                                value="" required />
                        </div>
                        <div class="form-group">
                            <div class="group">
                                <label class="form-label required">No.HP</label>
                            </div>
                            <input type="text" name="no_hp" class="form-control mb-2" placeholder="081234..."
                                value="" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Address</label>
                            <input type="text" name="address" class="form-control mb-2"
                                placeholder="Jl.Bunga Kopi..." value="" />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Type</label>
                            <select class="form-select mb-2" data-control="select2" name="tipe" required>
                                <option value="" selected disabled>--Pilih Opsi--</option>
                                <option value="Standar">Standar</option>
                                <option value="VIP">VIP</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <select class="form-select mb-2" data-control="select2" name="klasifikasi" required>
                                <option value="" selected disabled>--Pilih Opsi--</option>
                                <option value="Sendiri">Sendiri</option>
                                <option value="Group">Group</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Upload Pria -->

    <div class="modal fade" id="modal_pria" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="img-container">
                        <div class="row">
                            <div class="col-md-8">
                                <img class="img" id="img_pria"
                                    src="https://avatars0.githubusercontent.com/u/3456749">
                            </div>
                            <div class="col-md-4">
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

    <!-- Modal Upload Wanita -->

    <div class="modal fade" id="modal_wanita" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="img-container">
                        <div class="row">
                            <div class="col-md-8">
                                <img class="img" id="img_wanita"
                                    src="https://avatars0.githubusercontent.com/u/3456749">
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
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    <script src="https://use.fontawesome.com/e912f54b8f.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="https://unpkg.com/@popperjs/core@2"></script> -->
    <script src="{{ asset('plugin/image-uploader/image-uploader.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        let invitationText = "";
        var guestlist_table = new DataTable("#datatables-guestlist");
        var sendlink_table = new DataTable("#datatables-send-link");
        var message_table = new DataTable("#datatables-message");
        $(".input-images").imageUploader({
            maxSize: 5 * 1024 * 1024,
            maxFiles: 8,
            mimes: ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml']
        });

        // upload image

        $("body").on("change", "#avatar_pria", function(e) {
            var $modal = $('#modal_pria');
            var image = document.getElementById('img_pria');
            var cropper;
            var files = e.target.files;
            var done = function(url) {
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
                    reader.onload = function(e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }

            $modal.on('shown.bs.modal', function() {
                cropper = new Cropper(image, {
                    aspectRatio: 1,
                    viewMode: 3,
                    preview: '#preview_pria'
                });
            }).on('hidden.bs.modal', function() {
                cropper.destroy();
                cropper = null;
            });



            $("#crop_pria").click(function() {
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
                        $("#show-pria").attr("src", base64data);
                        $("#modal_pria").modal('toggle');
                        console.log(base64data);
                    }
                });
            });

        });

        $("body").on("change", "#avatar_wanita", function(e) {
            var $modal = $('#modal_wanita');
            var image = document.getElementById('img_wanita');
            var cropper;
            var files = e.target.files;
            var done = function(url) {
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
                    reader.onload = function(e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }

            $modal.on('shown.bs.modal', function() {
                cropper = new Cropper(image, {
                    aspectRatio: 1,
                    viewMode: 3,
                    preview: '#preview_wanita'
                });
            }).on('hidden.bs.modal', function() {
                cropper.destroy();
                cropper = null;
            });

            $("#crop_wanita").click(function() {
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
                        $("#show-wanita").attr("src", base64data);
                        $("#modal_wanita").modal('toggle');
                    }
                });
            });

        });


        // delete photo data
        $('#delete_photo_wanita').click(function() {
            const id = $(this).attr('data-id')
            $.ajax({ //create an ajax request to display.php
                type: "GET",
                url: "/admin/photo/" + id + "/avatar/wanita",
                success: function(data) {
                    alert('berhasil dihapus');
                    $('#show-wanita').attr('src',
                        'https://cdn0.iconfinder.com/data/icons/social-media-network-4/48/male_avatar-512.png'
                    )
                    $('#delete_photo_wanita').css('display', 'none')
                }
            })
        });

        $('#delete_photo_pria').click(function() {
            const id = $(this).attr('data-id')
            $.ajax({ //create an ajax request to display.php
                type: "GET",
                url: "/admin/photo/" + id + "/avatar/pria",
                success: function(data) {
                    alert('berhasil dihapus');
                    $('#show-pria').attr('src',
                        'https://cdn0.iconfinder.com/data/icons/social-media-network-4/48/male_avatar-512.png'
                    )
                    $('#delete_photo_pria').css('display', 'none')
                }
            })
        });


        //textSection
        $('#btn_text_section_quote_save').on('click', function(e) {
            e.preventDefault();
            var id = $('#event_id').val();
            var message = $('#quote').val();
            console.log(message);
            $.ajax({
                url: "{{ route('admin.textSection.quote.store', ['event_id' => $event->id]) }}",
                type: "post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: id,
                    quote: message,
                },
                success: function(data_template_message) {
                    if (data_template_message['success'] == true) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: data_template_message['message'],
                            showConfirmButton: false,
                            timer: 2000
                        });
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: data_template_message['message'],
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                }
            });
        });

        $('#btn_text_section_title_save').on('click', function(e) {
            e.preventDefault();
            var id = $('#event_id').val();
            var message = $('#title').val();
            $.ajax({
                url: "{{ route('admin.textSection.title.store', ['event_id' => $event->id] ) }}",
                type: "post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: id,
                    title: message,
                },
                success: function(data_template_message) {
                    if (data_template_message['success'] == true) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: data_template_message['message'],
                            showConfirmButton: false,
                            timer: 2000
                        });
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: data_template_message['message'],
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                }
            });
        });

        //GuesList

        //Invitation Link & Copy
        // $('#nama_tamu').keyup(function() {
        //     const nama_tamu = document.getElementById('nama_tamu').value;
        //     const link = "{{ route('see.event', $event->slug) }}";
        //     const link_complete = link + '?invite=' + encodeURI(nama_tamu);
        //     document.getElementById('link_invitation').value = link_complete;
        // });

        guestlist_table.on('click', '.copies_btn_link', function(e) {
            let link = $(this).data('id');
            let nama_tamus = $(this).data('name') + ':';
            
            nama_tamus = encodeURIComponent(nama_tamus);
            link = link  + nama_tamus;
            navigator.clipboard.writeText(link);
            Swal.fire({
                toast : true,
                icon : 'success',
                title : 'Copied',
                position : 'top-end',
                showConfirmButton : false,
                timer : 800,
                timerProgressBar : true
            });
        });


        //Template Message

        $('#btn_template_message_save').on('click', function(e) {
            e.preventDefault();
            var id = $('#event_id').val();
            var message = $('#message').val();
            $.ajax({
                url: "{{ route('admin.textSection.template.store', ['event_id' => $event->id]) }}",
                type: "post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: id,
                    message: message,
                },
                success: function(data_template_message) {
                    if (data_template_message['success'] == true) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: data_template_message['message'],
                            showConfirmButton: false,
                            timer: 2000
                        });
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: data_template_message['message'],
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                }
            });
        });

        $('#btn_copy_message').on('click', function(e) {
            var message_content = $('#message').val();
            navigator.clipboard.writeText(message_content)
        });

        //Send Message with Link

        sendlink_table.on('click', '.send_invitation_link', function(e) {
            let parent = e.target.closest('tr');
            let no_hp = parent.querySelectorAll('td')[3].innerText;
            let phone = no_hp.substr(0, 1);
            if (phone == 8) {
                phone = no_hp;
            } else if (phone == 0) {
                phone = no_hp.substr(1);
            } else if (phone == '+') {
                phone = no_hp.substr(3);
            } else if (phone == 6) {
                phone = no_hp.substr(2);
            }
            var message = $('#message').val();
            message = encodeURIComponent(message);
            let link = $(this).data('id');
            let nama_tamus = $(this).data('name');
            nama_tamus = encodeURIComponent(nama_tamus);
            window.open('https://api.whatsapp.com/send?phone=62' + phone + '&text=' + message +
                '%0A%0A' + 'Berikut adalah link undangannya:%0A%0A' + link, '_blank')
        });

        $(document).ready(function() {
            var table_send_link = document.querySelector('#datatables-send-link');
            var checkboxesSendLink = table_send_link.querySelectorAll('[type="checkbox"]');
            var deleteSelectedSendLink = document.querySelector('[data-sil-table-select="delete_selected"]');


            checkboxesSendLink.forEach(c => {
                // Checkbox on click event
                c.addEventListener('click', function() {
                    setTimeout(function() {
                        toogleToolbarsSendLink();
                    }, 50);
                });
            });

            deleteSelectedSendLink.addEventListener('click', function() {
                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    position: 'center',
                    icon: 'warning',
                    title: 'Apakah kamu yakin menghapus data terpilih?',
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Iya, Hapus!",
                    cancelButtonText: "Batalkan",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }

                }).then(function(result) {
                    if (result.value) {
                        var allids = [];
                        checkboxesSendLink.forEach(c => {
                            if (c.checked) {
                                allids.push(c.value);
                            }
                        });
                        var joinallids = allids.join(",");
                        $.ajax({
                            url: "{{ route('delete.guest', $event->slug) }}",
                            type: "delete",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                id: joinallids
                            },
                            success: function(data) {
                                if (data['success'] == true) {
                                    Swal.fire({
                                        title: "Kamu berhasil menghapus data terpilih!.",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok",
                                        customClass: {
                                            confirmButton: "btn fw-bold btn-primary",
                                        }
                                    }).then(function() {
                                        // Remove header checked box
                                        // const headerCheckbox = table_send_link.querySelectorAll(
                                        //     '[type="checkbox"]')[0];
                                        // headerCheckbox.checked = false;
                                    });
                                } else {
                                    Swal.fire({
                                        title: "Data terpilih tidak terhapus.",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok",
                                        customClass: {
                                            confirmButton: "btn fw-bold btn-primary",
                                        }
                                    })
                                }
                            },
                            error: function(data) {
                                Swal.fire({
                                    title: data.responseText,
                                    icon: "warning",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok",
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-primary",
                                    }
                                })
                                // alert(data.responseText);
                                // location.reload();
                            }
                        });
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: "Data terpilih tidak jadi dihapus.",
                            confirmButtonText: "Ok",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        });
                    }
                });
            });


            function toogleToolbarsSendLink() {
                const toolbarBaseSendLink = document.querySelector('[data-sil-table-toolbar="base"]');
                const toolbarSelectedSendLink = document.querySelector('[data-sil-table-toolbar="selected"]');
                const selectedCountSendLink = document.querySelector('[data-sil-table-select="selected_count"]');

                // Select refreshed checkbox DOM elements
                const allCheckboxesSendLink = table_send_link.querySelectorAll('tbody [type="checkbox"]');

                // Detect checkboxes state & count
                let checkedState = false;
                let count = 0;

                // Count checked boxes
                allCheckboxesSendLink.forEach(c => {
                    if (c.checked) {
                        checkedState = true;
                        count++;
                    }
                });

                // Toggle toolbars
                if (checkedState) {
                    selectedCountSendLink.innerHTML = count;
                    // toolbarBaseSendLink.classList.add('d-none');
                    // toolbarBaseSendLink.classList.remove('d-flex');
                    // toolbarSelectedSendLink.classList.remove('d-none');
                    // toolbarSelectedSendLink.classList.add('d-flex');
                } else {
                    // toolbarSelectedSendLink.classList.remove('d-flex');
                    // toolbarSelectedSendLink.classList.add('d-none');
                    // toolbarBaseSendLink.classList.remove('d-none');
                    // toolbarBaseSendLink.classList.add('d-flex');
                }
            };


            // $('[data-gb-table-select="delete_selected"]').click(function() {
            //     // Untuk menambahkan code hapus selected
            // });
        });

        //Angpao

        // $( "#list_bank" ).change(function() {
        //     var selectedValue = $(this).children("option:selected").val();
        //     var sel = $( "#list_bank option:selected" ).val();
        //     console.log(selectedValue);
        //     console.log(sel);

        // });

        // $(document).on('shown.bs.modal', '#addAngpao', function() {
        //     console.log("CHANGE");
        //     //var id = $("#customer>option:selected").val();
        //     var id = $('#list_bank').find(":selected").text();
        //     alert(id);
        // });

        // var a;
        // var sa;

        // $('#exporttype').change(function(){
        //     a = $('#exporttype :selected').attr('value');
        //     var id = $('#exporttype').find(":selected").text();
        //     console.log(a)
        //     console.log(id)
        // });

        // $('#list_bank').change(function(){
        //     sa = $('#list_bank :selected').attr('value')

        //     console.log(sa);
        // })


        // $('#tambah_angpao').on('click',function(){
        //     $.ajax({
        //         url: "{{ route('admin.index.list_bank') }}",
        //         type: "get",
        //         headers : {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         success: function(data){
        //             console.log(data);
        //         }
        //     })
        // });

        // $('#list_bank').select2({
        //     templateResult : formatState
        // });

        // function formatState (data) {
        //     if (!data) {
        //         return data['name'];
        //     }
        //     var baseUrl = "/admin/assets.images/list_bank";
        //     var $state = $(
        //         '<span><img src="' + baseUrl + '/' + data['logo_url'] + '.png" class="" /> ' + data['name'] + '</span>'
        //     );
        //     return $state;
        // };
        // Mengambil URL saat ini
        var currentUrl = window.location.href;

        $(document).ready(function() {
            var currentUrl = window.location.href;
            $('.nav-item a').each(function() {
                var linkUrl = $(this).attr('href');
                if (currentUrl === linkUrl) {
                    $(this).addClass('active');
                }
            });
        });
    </script>
@endsection
