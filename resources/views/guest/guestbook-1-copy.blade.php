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
    <link rel="icon" type="image/png" href="{{ asset('favicon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ asset('favicon-16x16.png') }}" sizes="16x16" />

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('template-1/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('template-1/css/dripicons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('template-1/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('template-1/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('template-1/css/styles.css') }}">
    <style type="text/css">
    body {
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    overflow: hidden;
  }

  .background-iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    pointer-events: none;
  }

  .content {
    position: relative;
    z-index: 1;
    text-align: center;
    color: white;
  }

        header:after {
            display: none;
        }

        #subscribers {
            padding-top: 120px;

        }

        .subscriber-list {
            padding: 20px;
            border-radius: 5px;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
        }

        /* Dark Style */
        .subscriber-list.dark {
            background-color: #1d1d1d;
            color: #999;
        }

        .subscriber-list.dark input,
        .subscriber-list.dark select {
            color: #ddd;
            padding: 6px 10px;
            background: #666;
            border: 0;
        }

        .subscriber-list.dark input:focus,
        .subscriber-list.dark select:focus {
            outline: none;
            box-shadow: none;
        }

        .subscriber-list.dark td {
            color: #aaa !important;
            font-weight: 400 !important;
            border-color: #333 !important;
        }

        .subscriber-list.dark th {
            font-weight: 600 !important;
            color: #EEE !important;
            border-color: #333 !important;
        }

        /* Light Style */
        .subscriber-list.light {
            background-color: #fff;
            color: #4d4d4d;
        }

        .subscriber-list.light input,
        .subscriber-list.light select {
            color: #4d4d4d;
            padding: 6px 10px;
            background: #eee;
            border: 0;
        }

        .subscriber-list.light input:focus,
        .subscriber-list.light select:focus {
            outline: none;
            box-shadow: none;
        }

        .subscriber-list.light td {
            color: #4d4d4d !important;
            font-weight: 400 !important;
            border-color: #eee !important;
        }

        .subscriber-list.light th {
            font-weight: 600 !important;
            color: #2d2d2d !important;
            border-color: #ccc !important;
        }

        .video_box {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }

        .modals {
            z-index: 99;
            width: 400px;
            margin: auto;
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 2147483647;
        }

        .wrapper {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 2147483647;
        }

        .content {
            position: relative;
            margin: 10% auto;
            width: max-content;
            padding: 10%;
            background-color: #FFF;
        }
        .slide-content {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            width: 100%;
            height: 100vh;
            overflow-x: hidden;
        }

        .wrap {
            position: relative;
        }

        .slide {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .slide-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .slide-content span {
            font-size: 5rem;
            color: #fff;
        }

        .arrow {
            cursor: pointer;
            position: absolute;
            top: 50%;
            margin-top: -35px;
            width: 0;
            height: 0;
            border-style: solid;
        }

        #arrow-left {
            border-width: 30px 40px 30px 0;
            border-color: transparent #fff transparent transparent;
            left: 0;
            margin-left: 30px;
        }

        #arrow-right {
            border-width: 30px 0 30px 40px;
            border-color: transparent transparent transparent #fff;
            right: 0;
            margin-right: 30px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;
        var pusher = new Pusher('a225665b55060a844466', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('hoofey');
        channel.bind('Guestbook', function(data) {

            if (JSON.stringify(data.tipe) == 'Standar') {

            } else {
                $('.modal-title').html('<span style="alignt-text: center;">Tamu Undangan ' + JSON.stringify(data.tipe) + '</span>');
            }
            $('.message').html('<span>' + JSON.stringify(data.name) + '</span>')

                $('#myModal').modal('show');
                // wrapper.style.display = "block";
                setTimeout(function(){
                    // wrapper.style.display = "none";
                    $('#myModal').modal('hide');
                }, 3000);
            });
        </script>
    </head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <body>




    <!-- Subscribers -->
    <header id="subscribers">
        <div class="container">
            <div class="container-body">
                        <div class="card col-md-6 col-xl-4">
                            <div class="card-body">
                                <div class="row">
                                    <form action="{{ route('guest.attending') }}" method="post" class="d-inline hidden qr_kode" id="qr_kode" >
                                    @csrf
                                        <div class="form-group">
                                            <input type="text" name="event_id" id="event_id" value="{{ $event->id }}" hidden>
                                            <input type="text" name="kode_qr" id="kode_qr" autofocus>
                                        </div>
                                        <button type="submit" name="submit" id="submit" class="btn btn-block btn-primary">Cari</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> -->

            </div>
        </div>
        @if($event->monitor == "Video")
        <div class="row m-5 video_box">
            <iframe id="video" class="video-yt" width="720" height="480"
                src="https://www.youtube.com/embed/{{$event->link_youtube}}?playlist={{$event->link_youtube}}&loop=1"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
        </div>
        @else
        <div class="wrap">
            <div id="arrow-left" class="arrow"></div>
            <div id="slider">
                @foreach($data_photo as $gallery)
                    <div class="slide">
                        <div class="slide-content">
                            <a href="{{ asset($gallery['path']) }}" class="photo-link">
                                <img src="{{ asset($gallery['path']) }}" alt="Gallery"
                                    class="photo-img">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div id="arrow-right" class="arrow"></div>
            </div>
        @endif
    </header>

    <footer style="background-color: #F7F7F7;padding: 20px 0;font-size: 12px;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td align="center" style="color: #111">Copyright 2021 Wedding Invitation by hoofey.id - All Rights
                    Reserved</td>
            </tr>
        </table>
    </footer>
    <!-- End: Subscribers -->


    <div class="modal fade wrapper" id="myModal" role="dialog" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content content">
                <div class="modal-header">
                    <h4 class="modal-title" style="text-align: center;"></h4>
                </div>
                <div class="modal-body">
                    <p>Selamat Datang Bapak/Ibu/Saudara/i</p>
                    <p class="message"></p>
                </div>
            </div>
        </div>

    </div>



    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('template-1/js/jquery-3.1.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template-1/js/bootstrap.bundle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template-1/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template-1/js/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template-1/js/dataTables.buttons.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template-1/js/jszip.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template-1/js/buttons.html5.min.js') }}"></script>

    <script type="text/javascript">
        var vid = document.getElementById("video");
        var wrapper = document.getElementById("myModals");

        $(document).ready(function() {
            $('#subscribers-table').DataTable();
        });

        async function sweetalert_group(data, id_event) {
            const steps = ['1', '2', '3']
            const question = ['Nama', 'Alamat', 'No. Handphone']
            const id_invite = data['invite_id']
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
                        event_id: id_event,
                        invite_id: id_invite
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
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Gagal Menyimpan Data',
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
            }
        };

        $('#qr_kode').on('submit', function(e) {
            e.preventDefault();
            var kode = $('#kode_qr').val();
            var id_event = $('#event_id').val();
            $.ajax({
                url: "{{ route('guest.attending') }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                async: true,
                data: {
                    kode_qr: kode,
                    event_id: id_event
                },
                success: function(data) {
                    if (data['success'] == true) {
                        if (data['message'] == 'Sendiri') {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Selamat Datang ' + data['pesan'],
                                showConfirmButton: false,
                                timer: 2500
                            }).then(function() {
                                location.reload();
                            });
                        } else {
                            sweetalert_group(data, id_event);

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


        // Slide Foto
        let sliderImages = document.querySelectorAll(".slide"),
        arrowLeft = document.querySelector("#arrow-left"),
        arrowRight = document.querySelector("#arrow-right"),
        current = 0;

        // Clear all images
        function reset() {
            for (let i = 0; i < sliderImages.length; i++) {
                sliderImages[i].style.display = "none";
            }
        }

        // Init slider
        function startSlide() {
            reset();
            sliderImages[0].style.display = "block";
        }

        // Show prev
        function slideLeft() {
            reset();
            sliderImages[current - 1].style.display = "block";
            current--;
        }

        // Show next
        function slideRight() {
            reset();
            sliderImages[current + 1].style.display = "block";
            current++;
        }

        // Left arrow click
        arrowLeft.addEventListener("click", function() {
            if (current === 0) {
                current = sliderImages.length;
            }
            ideLeft();
        });

        // Right arrow click
        arrowRight.addEventListener("click", function() {
            if (current === sliderImages.length - 1) {
                current = -1;
            }
            slideRight();
        });

        startSlide();
    </script>
</body>


</html>
