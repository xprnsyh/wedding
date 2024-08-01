<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hoofey - Template Wedding Gold</title>

    <link rel="icon" type="image/png" href="{{asset('favicon-32x32.png')}}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{asset('favicon-16x16.png')}}" sizes="16x16" />

    <link rel="stylesheet" href="{{asset('template-1/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('template-1/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('template-1/css/custom.css')}}">
</head>

<body class="boxed">

    <div id="gallery-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gallery-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <img id="galery-preview" src="" alt="">
                <div class="close" data-dismiss="modal">x</div>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <div class="menu">
        <div class="container">
            <div class="row mb-0">
                <div class="col-md-5 col-sm-5 col-5 text-right my-auto">
                    <p class="mb-0 logo bold italic float-left">SMITH & JANE <br> WEDDING</p>
                </div>
                <div class="col-md-7 col-sm-7 col-7 text-right my-auto">
                    <div class="share bold italic text-uppercase">
                        share
                        <span class="separator"></span>
                        <span class="share-social">
                            <a href="https://www.facebook.com/sharer.php?u=YOUR_WEBSITE_URL" target="_blank">
                                <img src="{{asset('template-1/img/icons/facebook.png')}}" alt="">
                            </a>
                            <a href="https://twitter.com/share?url=YOUR_WEBSITE_URL&amp;text=SOME_TEXT&amp;hashtags=HASHTAGS" target="_blank">
                                <img src="{{asset('template-1/img/icons/twitter.png')}}" alt="">
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End: Navbar -->

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="header--content">
                        <h6 class="text-uppercase bold italic spacing--2">The wedding of</h6>
                        <img class="header--img" src="{{asset('template-1/img/header-img.png')}}" alt="">
                        <h6 class="header--date text-uppercase bold italic spacing--1">November 10, <br> 2025</h6>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End: Header -->

    <!-- Bride & Groom -->
    <section id="bride-groom">
        <div class="container">
            <img class="header--flower" src="{{asset('template-1/img/header-flower.png')}}" alt="">
            <div class="divider"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-6 text-center">
                            <div class="photo groom">
                                <img src="{{asset('template-1/img/groom.png')}}" alt="">
                            </div>
                            <div class="row">
                                <div class="col-lg-8 offset-lg-2">
                                    <div class="title">
                                        <h3 class="mb-0 color--midnight font--2">John Smith</h3>
                                        <p>CEO Google</p>
                                    </div>
                                    <p class="italic mb-4">John smith is lorem ipsum dolor sit amet consect etur adipiscint elit esed adipiscing elit sed tempor. Incididunt lorem ipsum dolor sit.</p>
                                    <a href="https://instagram.com" target="_blank">
                                        <img class="social" src="{{asset('template-1/img/instagram.png')}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="center--line"></div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-6 text-center">
                            <div class="photo bride">
                                <img src="{{asset('template-1/img/bride.png')}}" alt="">
                            </div>
                            <div class="row">
                                <div class="col-lg-8 offset-lg-2">
                                    <div class="title">
                                        <h3 class="mb-0 color--midnight font--2">Amanda Jane</h3>
                                        <p>CEO Twitter</p>
                                    </div>
                                    <p class="italic mb-4">Amanda Jane is dolor lorem ipsum sit amet consectetur adipiscing elit sed eiusmod tempor incididunt lorem ipsum dolor amet.</p>
                                    <a href="https://instagram.com" target="_blank">
                                        <img class="social" src="{{asset('template-1/img/instagram.png')}}" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Bride & Groom -->

    <!-- Date -->
    <section id="date">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8 offset-lg-2 my-auto">
                    <div class="video">
                        <iframe src="https://www.youtube.com/embed/RG1llY1kxYg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="date--wrapper">
                        <div class="date--content text-center">
                            <div class="dot"></div>
                            <div class="title">
                                <h1 class="font--3 color--orange">Sunday</h1>
                                <p class="bold italic text-uppercase color--orange wedding--date">Nov 10, 2018</p>
                            </div>
                            <h5 class="italic">John smith is lorem ipsum dolor sit amet consect etur adipiscint elit
                                esed adipiscing elit sed tempor. Incididunt lorem ipsum dolor sit amet incididunt
                            lorem.</h5>
                        </div>
                        <div class="hr--line"></div>
                        <div class="row">
                            <div class="col-md-7 col-sm-7 col-7">
                                <div class="date--content content--sm text-center">
                                    <img src="{{asset('template-1/img/location.svg')}}" alt="" class="date--img">
                                    <p class="bold italic">Jl. Sriwijaya X no. 5 Jember <br class="xs--none">Jawa Timur, Indonesia</p>
                                </div>
                                <div class="vr--line"></div>
                            </div>
                            <div class="col-md-5 col-sm-5 col-5">
                                <div class="date--content content--sm text-center">
                                    <img src="{{asset('template-1/img/time.svg')}}" alt="" class="date--img">
                                    <p class="bold italic">08:00 - 13:00</p>
                                </div>
                            </div>
                        </div>
                        <div class="hr--line"></div>
                        <div class="date--content text-center" style="padding:25px;">
                            <div class="title" style="margin: 0;">
                                <ul>
                                    <li><span id="days"></span>days</li>
                                    <li><span id="hours"></span>Hours</li>
                                    <li><span id="minutes"></span>Minutes</li>
                                    <li><span id="seconds"></span>Seconds</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Date -->

    <!-- Gallery & RSVP -->
    <section id="gallery-rsvp">
        <div class="container">
            <div class="divider"></div>

            <!-- Gallery -->
            <div id="gallery">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="picture">
                                    <div class="thumb">
                                        <img src="{{asset('template-1/img/gallery/pic-1.jpg')}}" alt="">
                                    </div>
                                    <div class="overlay">
                                        <div class="caption">
                                            <h4 class="text-uppercase bold italic">Mar, 29</h4>
                                            <p class="bold italic">Lorem ipsum dolor sit.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="picture">
                                    <div class="thumb">
                                        <img src="{{asset('template-1/img/gallery/pic-2.jpg')}}" alt="">
                                    </div>
                                    <div class="overlay">
                                        <div class="caption">
                                            <h4 class="text-uppercase bold italic">Apr, 31</h4>
                                            <p class="bold italic">Adipiscing elit sed.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="picture">
                                    <div class="thumb">
                                        <img src="{{asset('template-1/img/gallery/pic-3.jpg')}}" alt="">
                                    </div>
                                    <div class="overlay">
                                        <div class="caption">
                                            <h4 class="text-uppercase bold italic">Aug, 12</h4>
                                            <p class="bold italic">Eiusmod tempor incididunt</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="picture">
                                    <div class="thumb">
                                        <img src="{{asset('template-1/img/gallery/pic-4.jpg')}}" alt="">
                                    </div>
                                    <div class="overlay">
                                        <div class="caption">
                                            <h4 class="text-uppercase bold italic">Sep, 03</h4>
                                            <p class="bold italic">Eiusmod tempor incididunt</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End: Gallery -->

            <div class="divider--lg"></div>

            <!-- RSVP -->
            <div id="rsvp">
                <div class="title--lg text-center">
                    <h1 class="font--3 color--midnight">Are you attending?</h1>
                    <h4 class="bold italic color--midnight">RSVP HERE</h4>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="rsvp--form">
                            <form action="" autocomplete="off">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Your name..." required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Email address..." required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2 col-sm-3 col-4">
                                        <div class="form-group">
                                            <input type="number" class="form-control" min="1" max="10" placeholder="Guest..." required>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-sm-5 col-8">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Phone number..." required>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-sm-4">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-block btn--rsvp">I am Attending</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End: RSVP -->

            <!-- Maps -->
            <div class="row" style="margin-bottom: 200px;">
                <div class="col-lg-8 offset-lg-2">
                    <div id="maps">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.1709416412814!2d113.7183600152305!3d-8.185528794108631!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6967ebb79e2ab%3A0xf66c79ebf24b3cff!2sJl.+Sriwijaya+10%2C+Karangrejo%2C+Sumbersari%2C+Kabupaten+Jember%2C+Jawa+Timur+68124!5e0!3m2!1sen!2sid!4v1475805927161"
                        width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <!-- End: Maps -->

            <!-- Protokol -->
            <div class="row" style="padding-bottom: 75px;">
                <div class="col-lg-10 offset-lg-1">
                    <div class="title--lg text-center">
                        <h1 class="font--3 color--midnight">Aturan Protokol Kesehatan</h1>
                    </div>
                    <div class="row text-center">
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <img src="{{asset('admin-bsb/images/protokol-1.png')}}" alt="protokol1">
                            <p>Menggunakan Masker</p>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <img src="{{asset('admin-bsb/images/protokol-2.png')}}" alt="protokol2">
                            <p>Mencuci Tangan Dengan Sabun</p>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <img src="{{asset('admin-bsb/images/protokol-3.png')}}" alt="protokol3">
                            <p>Tidak Berjabat Tangan</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End: Protokol -->

            <!-- Panduan -->
            <div class="row" style="padding-bottom: 75px;">
                <div class="col-lg-10 offset-lg-1">
                    <div class="title--lg text-center">
                        <h1 class="font--4 color--midnight">Panduan Penggunaan Aplikasi</h1>
                    </div>
                    <div class="row text-center" style="margin: 45px 0;">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <img src="{{asset('admin-bsb/images/step-1.png')}}" alt="protokol1"><br>
                            <p><b>Download Aplikasi di Google Playstore</b></p>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <img src="{{asset('admin-bsb/images/step-2.png')}}" alt="protokol2"><br>
                            <p><b>Login menggunakan email yang sudah didaftarkan</b></p>
                        </div>
                    </div>
                    <div class="row text-center" style="margin: 45px 0;">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <img src="{{asset('admin-bsb/images/step-3.png')}}" alt="protokol1"><br>
                            <p><b>Pilih menu invitation dan pilih undangan</b></p>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <img src="{{asset('admin-bsb/images/step-4.png')}}" alt="protokol2"><br>
                            <p><b>Lihat detail undangan mulai dari nama sampai lokasi pernikahan</b></p>
                        </div>
                    </div>
                    <div class="row text-center" style="margin: 45px 0;">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <img src="{{asset('admin-bsb/images/step-5.png')}}" alt="protokol1"><br>
                            <p><b>Pilih menu SCAN QR di pojok kanan atas</b></p>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <img src="{{asset('admin-bsb/images/step-6.png')}}" alt="protokol2" class="img6"><br>
                            <p><b>Scan QR Code yang telah tersedia di lokasi resepsi</b></p>
                        </div>
                    </div>
                    <div class="row text-center" style="margin: 45px 0;">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <img src="{{asset('admin-bsb/images/step-7.png')}}" alt="protokol1"><br>
                            <p><b>Setelah Scan QR kamu bisa langsung memberikan ucapan</b></p>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <img src="{{asset('admin-bsb/images/step-8.png')}}" alt="protokol2" class="img8"><br>
                            <p><b>Pilih tombol kamera untuk selfie</b></p>
                        </div>
                    </div>
                    <div class="row text-center" style="margin: 45px 0;">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <img src="{{asset('admin-bsb/images/step-9.png')}}" alt="protokol1"><br>
                            <p><b>Pilih template selfie kesukaanmu dan foto</b></p>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <img src="{{asset('admin-bsb/images/step-10.png')}}" alt="protokol2"><br>
                            <p><b>Kamu juga bisa share dan simpan foto</b></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Panduan -->

        </div>
    </section>
    <!-- End: Gallery & RSVP -->

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <h3 class="font--2 color--medwhite footer--bride">Smith & Jane</h3>
            <p class="bold italic text-uppercase color--medwhite">November 10 2018</p>
        </div>
    </footer>
    <!-- End: Footer -->
</body>

<!-- Scripts -->
<script type="text/javascript" src="{{asset('template-1/js/jquery-3.1.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('template-1/js/bootstrap.bundle.js')}}"></script>
<script type="text/javascript" src="{{asset('template-1/js/levidio.js')}}"></script>
<!-- Countdown script -->
<script>
(function () {
    const   second = 1000,
            minute = second * 60,
            hour = minute * 60,
            day = hour * 24;

    let wedding = "Nov 10, 2025 08:00:00",
        countDown = new Date(wedding).getTime(),
        x = setInterval(function() {    

            let now = new Date().getTime(),
                distance = countDown - now;

            document.getElementById("days").innerText = Math.floor(distance / (day)),
            document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
            document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
            document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);
        }, 0)
    }());
</script>

</html>