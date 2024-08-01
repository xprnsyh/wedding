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
    <!-- <link rel="icon" type="image/png" href="{{ asset('favicon_hoofey.ico') }}"/> -->

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style type="text/css">
        .background-iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            position: absolute;
            /* pointer-events: none; */
        }

        header {
            background: url("{{ asset('template-7/media/template/custom/minang/background-01.jpg') }}") center no-repeat;
            background-size: cover;
            color: #FFFFFF;
            position: relative;
        }

        .subscribers {
            overflow: hidden;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
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
            border-color: transparent #000 transparent transparent;
            left: 0;
            margin-left: 30px;
        }

        #arrow-right {
            border-width: 30px 0 30px 40px;
            border-color: transparent transparent transparent #000;
            right: 0;
            margin-right: 30px;
        }
        .modal-header{
            color: white;
            background-color: gold;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        // Pusher.logToConsole = false;
        
        var pusher = new Pusher('a225665b55060a844466', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('hoofey');
        channel.bind('Guestbook', function(data) {
            var id_monitor = $('.id_monitor').val();
            console.log(data['id_meja']);
            console.log(id_monitor)
            if (id_monitor == data['id_meja']) {
                if ( data['tipe'] == 'Standar') {
                    $('.greeting-name').html('<span style="text-align: center;">' + data['name'] + '</span>')
                    $('#greeting').modal('show');
                    setTimeout(function() {
                        $('#greeting').modal('hide');
                    }, 3000);
                    
                } else {
                    $('.modal-title').html('Tamu '+ data['tipe'])
                    $('.greeting-name').html('<span style="text-align: center;">' + data['name'] + '</span>')
                    $('#greeting_vip').modal('show');
                    setTimeout(function() {
                        $('#greeting_vip').modal('hide');
                    }, 3000);
                    
                    // url({{asset('img/confetti-gif-1.gif')}})
                }
            }

            
        });
    </script>
</head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>
    <input class="form-control id_monitor" value="{{ $id_monitor }}" name="id_monitor" hidden>
    @if ($event->monitor == 'Video')
        <iframe id="video" class="background-iframe" width="720" height="480"
            src="https://www.youtube.com/embed/{{ $event->link_youtube }}?autoplay=1&loop=1&controls=0"
            title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen>
        </iframe>
    @else
        <header class="subscribers">
            <div class="wrap">
                <!-- <div id="arrow-left" class="arrow"></div> -->
                <div id="slider">
                    @foreach ($data_photo as $gallery)
                        <div class="slide">
                            <div class="slide-content">
                                <a href="{{ asset($gallery['path']) }}" class="photo-link">
                                    <img src="{{ asset($gallery['path']) }}" alt="Gallery" class="photo-img">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- <div id="arrow-right" class="arrow"></div> -->
            </div>
        </header>
    @endif


    <!-- Modal Standart -->
    <div class="modal fade" id="greeting" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-5" id="standar" style="background: linear-gradient(132deg, #FBC 11.81%, #F54291 75.09%);">
                    <div class="container d-flex justify-content-center align-items-center text-center"
                        style="height: 88vh;">
                        <div>
                            <img src="{{ asset('template-7/media/template/custom/minang/ic-spirals-of-vines.png') }}"
                                class="mb-5" width="300" height="100">
                            <h3 class="greeting-title" style="font-size: 72px;">Selamat Datang</h3>
                            <h3 class="greeting-title" style="font-size: 72px;">Bapak/Ibu</h3>
                            <p class="greeting-name" style="font-weight: 600; font-size: 120px;"></p>
                            <img src="{{ asset('template-7/media/template/custom/minang/ic-spirals-of-vines.png') }}"
                                class="mt-5" width="300" height="100">
                        </div>
                    </div>
                </div>
                <!-- <div class="modal-body p-5 d-none" id="vip">
                    <div class="container d-flex justify-content-center align-items-center text-center"
                        style="height: 88vh;">
                        <div>
                            <img src="http://127.0.0.1:8000/template-7/media/template/custom/minang/ic-spirals-of-vines.png"
                                class="mb-5" width="300" height="100">
                            <h3 class="greeting-title" style="font-size: 72px;">Selamat Datang</h3>
                            <h3 class="greeting-title" style="font-size: 72px;">Bapak/Ibu</h3>
                            
                            <p class="greeting-name" style="font-weight: 600; font-size: 120px;"></p>
                            <img src="http://127.0.0.1:8000/template-7/media/template/custom/minang/ic-spirals-of-vines.png"
                                class="mt-5" width="300" height="100">
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Modal VIP -->
    <div class="modal fade" id="greeting_vip" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" id="modal_content">
                    <div class="container d-flex justify-content-center align-items-center text-center" id="show_tipe">
                        <h4 class="modal-title" style="font-weight: 600; font-size: 42px; text-align: center;"></h4>
                    </div>
                </div>
                <div class="modal-body p-5" id="standar">
                    <div class="container d-flex justify-content-center align-items-center text-center"
                        style="height: 88vh;">
                        <div>
                            <img src="{{ asset('template-7/media/template/custom/minang/ic-spirals-of-vines.png') }}"
                                class="mb-5" width="300" height="100">
                            <h3 class="greeting-title" style="font-size: 72px;">Selamat Datang</h3>
                            <h3 class="greeting-title" style="font-size: 72px;">Bapak/Ibu</h3>
                            <p class="greeting-name" style="font-weight: 600; font-size: 120px;"></p>
                            <img src="{{ asset('template-7/media/template/custom/minang/ic-spirals-of-vines.png') }}"
                                class="mt-5" width="300" height="100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- <div class="modal fade wrapper show" id="myModal" role="dialog" style="display: block;">
        <div class="modal-dialog">
            <div class="modal-content content">
                <div class="modal-header">
                    <h4 class="modal-title" style="text-align: center;"></h4>
                </div>
                <div class="modal-body">
                    <p style="text-align: center;">Selamat Datang Bapak/Ibu/Saudara/i</p>
                    <p class="message" style="text-align: center; "></p>
                </div>
            </div>
        </div>
    </div> --}}



    <!-- Scripts -->
    <script type="text/javascript" src="http://127.0.0.1:8000/template-1/js/jquery-3.1.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
        var wrapper = document.getElementById("myModals");
        let sliderImages = document.querySelectorAll(".slide"),
            arrowLeft = document.querySelector("#arrow-left"),
            arrowRight = document.querySelector("#arrow-right"),
            current = 0;

        function reset() {
            for (let i = 0; i < sliderImages.length; i++) {
                sliderImages[i].style.display = "none";
            }
        }

        function startSlide() {
            reset();
            sliderImages[0].style.display = "block";
            setInterval(slideRight, 5000); // Mengganti slide setiap 5 detik
        }

        function slideLeft() {
            reset();
            sliderImages[current - 1].style.display = "block";
            current--;
        }

        function slideRight() {
            reset();
            if (current === sliderImages.length - 1) {
                current = -1;
            }
            sliderImages[current + 1].style.display = "block";
            current++;
        }

        // arrowLeft.addEventListener("click", function() {
        //     if (current === 0) {
        //         current = sliderImages.length;
        //     }
        //     slideLeft();
        // });

        // arrowRight.addEventListener("click", function() {
        //     if (current === sliderImages.length - 1) {
        //         current = -1;
        //     }
        //     slideRight();
        // });

        startSlide();
    </script>
</body>



</html>
