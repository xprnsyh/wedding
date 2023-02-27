<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{asset('favicon-32x32.png')}}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{asset('favicon-16x16.png')}}" sizes="16x16" />
    
    <title>Hoofey - Template Wedding Silver</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('template-4/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('template-4/css/styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('template-4/css/ekko-lightbox.css')}}">
    <style type="text/css">
    .label-alert{
        margin-top: 5px;
        font-size: 12px!important;
        text-transform: none!important;
        color: #f85959;
        font-weight: 400!important;
    }
    .required{
        border: 1px solid #f85959!important;
    }
</style>
</head>

<body class="boxed">
    <div id="moments-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="moments-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <img id="moments-preview" src="" alt="">
                <div class="close" data-dismiss="modal">x</div>
            </div>
        </div>
    </div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand font-primary" href="#">
                <i>
                    <img class="floral" src="{{asset('template-4/img/floral.png')}}" width="50">
                    Jennifer & Lawrense
                </i>
            </a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <span class="nav-link">
                        <button class="btn btn--nav">
                            <img src="{{asset('template-4/img/share.svg')}}" alt="" class="share--icon mr-md-2"> <span class="xs-none">Share</span> 
                            <div class="social">
                                <a href="https://plus.google.com/share?url=http://your-website.com" target="_blank">
                                    <img class="gplus" src="{{asset('template-4/img/share-gplus.svg')}}" alt="">
                                </a>
                                <a href="https://twitter.com/share?url=http://your-website.com&amp;text=Your%20Website%20Name&amp;hashtags=yourwebsite" target="_blank">
                                    <img class="twitter" src="{{asset('template-4/img/share-twitter.svg')}}" alt="">
                                </a>
                                <a href="http://www.facebook.com/sharer.php?u=http://your-website.com" target="_blank">
                                    <img class="fb" src="{{asset('template-4/img/share-fb.svg')}}" alt="">
                                </a>
                            </div>
                        </button>
                    </span>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Header -->
    <header>
        <div class="container text-center">
            <img class="floral" src="{{asset('template-4/img/ornament-1.png')}}">
            <h1 class="font-primary">Jennifer<br><span>&</span>Lawrense</h1>
            <div class="wedding-date">
                Thursday, May 23 2018
            </div>
        </div>
    </header>
    <!-- End: Header -->

    <!-- Invitation -->
    <section id="invitation">
      <div class="container">
        <div class="row">
            <div class="col-12 my-auto">
                <h1 class="text-center section-title font-primary pb-5">Save the Date</h1>
            </div>
        </div>
        <div class="row pt-4">
            <div class="col-12 col-md-6 pl-0 pl-md-5">
                <div class="image-card pl-0 pl-md-5">
                    <center>
                        <img src="{{asset('template-4/img/lawrense.jpg')}}" alt="">
                        <p class="font-primary bride-name">Lawrense Stone</p>
                        <p class="bride-info">John smith is lorem ipsum dolor sit amet<br>consect etur adipiscint elit esed<br>adipiscing elit sed tempor.</p>
                    </center>
                </div>
            </div>
            <div class="col-12 col-md-6 pl-0 pt-5 pt-md-0 pr-md-5">
                <div class="image-card pr-0 pr-md-5">
                    <center>
                        <img src="{{asset('template-4/img/jennifer.jpg')}}" alt="">
                        <p class="font-primary bride-name">Jennifer Hill</p>
                        <p class="bride-info">Jennifer Hill is lorem ipsum dolor sit amet<br>consect etur adipiscint elit esed<br>adipiscing elit sed tempor.</p>
                    </center>
                </div>
            </div>
        </div>
        <center>
            <img class="ornament" src="{{asset('template-4/img/floral-yellow.png')}}">
        </center>
        <div class="infos">
            <div class="row">
                <div class="col-12 col-md-6 offset-md-3 info-header">
                    <p class="text-center">
                        request the pleasure of your company<br>to celebrate the marriage
                    </p>  
                </div>
            </div>

            <div class="row info-content">
                <div class="col-12 col-md-6" id="info-content-1">
                    <div class="info-date">
                        <div class="row">
                            <div class="col-12">
                                <img src="{{asset('template-4/img/calendar.svg')}}">
                            </div>
                            <div class="col-12">
                                Thursday,<br>May 23 2018<br>At 10.00 AM
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6" id="info-content-2">
                    <div class="info-place">
                        <div class="row">
                            <div class="col-12">
                                <img src="{{asset('template-4/img/university.svg')}}">
                            </div>
                            <div class="col-12">
                                Rootpixel Hall<br>JL. Sriwijaya X-2<br>Jember, Jawa Timur.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12 col-md-6 offset-md-3 info-header">
                    <div class="countdown">
                        <ul>
                            <li><span id="days"></span><b>days</b></li>
                            <li><span id="hours"></span><b>Hours</b></li>
                            <li><span id="minutes"></span><b>Minutes</b></li>
                            <li><span id="seconds"></span><b>Seconds</b></li>
                        </ul>
                    </div> 
                </div>
            </div>
            
        </div>
    </div>
</section>
<!-- End: Invitation -->

<!-- Description -->
<section id="description">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 my-auto">
                <h6>Our Story</h6>
                <h2 class="section-title pb-3">Lorem Ipsum<br>consectetur adipiscing</h2>
                <p class="pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
                <a class="smooth-scroll" data-scroll href="#moments">
                    <button class="btn btn--demo">
                        Our Moment
                    </button>
                </a>
            </div>
            <div class="col-12 col-lg-6 my-auto pt-4 pt-md-5 pt-lg-0 xs-center">
                <div class="row">
                    <div class="col-6">
                        <div class="image-card">
                            <img src="{{asset('template-4/img/couple-1.jpg')}}" alt="">
                        </div>
                    </div>
                    <div class="col-6 pt-4">
                        <div class="image-card">
                            <img src="{{asset('template-4/img/couple-5.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-6">
                        <div class="image-card">
                            <img src="{{asset('template-4/img/couple-4.jpg')}}" alt="">
                        </div>
                    </div>
                    <div class="col-6 pt-4">
                        <div class="image-card">
                            <img src="{{asset('template-4/img/couple-2.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End: Description -->

<!-- Video -->
<section id="video">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-7 my-auto">
                <div class="video">
                    <iframe src="https://www.youtube.com/embed/srPr1BNEBAA" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-12 col-lg-5 sm-center pt-3 pt-md-0 pl-0 pl-md-5 my-auto">
                <h6>Our Story</h6>
                <h2 class="section-title pb-3">Lorem Ipsum<br>consectetur adipiscing</h2>
                <p class="pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>
        </div>
    </div>
</section>
<!-- End: Video -->


<!-- Quote -->
<section id="quote">
    <div class="container">
        <div class="row">
            <div class="col-12 my-auto">
                <center>
                    <img class="floral" src="{{asset('template-4/img/bells.png')}}">
                </center>
                <h3 class="text-center section-title">
                    Lorem dolor set cut labore<br>et dolore magna minim veniam<br>consectetur elit, sed do <br>tcommodo consequat.
                </h3>
                <center>
                    <a class="smooth-scroll" data-scroll href="#rsvp">
                        <button class="btn btn--demo no-fill-bordered">
                            Yes, take me there!
                        </button>
                    </a>
                </center>
            </div>
        </div>
    </div>
</section>
<!-- End: Quote -->

<!-- Moments -->
<section id="moments">
    <div class="container">
        <div class="row">
            <div class="col-12 my-auto text-center">
                <h6 class="font-primary">Our Moments</h6>
                <h2 class="section-title pb-3">More than<br>a thousand words</h2>
            </div>
        </div>
        <div class="row pt-5">
           <div class="col-12 my-auto xs-center">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3 pt-0 pt-md-4">
                    <div class="image-card">
                        <img src="{{asset('template-4/img/gallery1-2.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 pt-4 pt-md-0">
                    <div class="image-card">
                        <img src="{{asset('template-4/img/gallery2-1.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 pt-4">
                    <div class="image-card">
                        <img src="{{asset('template-4/img/gallery2-2.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 pt-4 pt-md-0">
                    <div class="image-card">
                        <img src="{{asset('template-4/img/couple-3.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- End: Moments -->

<!-- RSVP -->
<section id="rsvp">
    <div class="container">
        <div class="row">
            <div class="col-10 offset-1">
                <div class="subscribe--box">
                    <div class="row">
                        <div class="col-12 col-lg-6" id="maps">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.1709416412814!2d113.7183600152305!3d-8.185528794108631!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6967ebb79e2ab%3A0xf66c79ebf24b3cff!2sJl.+Sriwijaya+10%2C+Karangrejo%2C+Sumbersari%2C+Kabupaten+Jember%2C+Jawa+Timur+68124!5e0!3m2!1sen!2sid!4v1475805927161"
                            width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="rsvp-form">
                                <h1 class="font-primary text-center pt-3">Are you Attending?</h1>
                                <form class="pt-4" action="" method="POST" autocomplete="off">
                                    <div class="row">
                                        <div class="col-md-12 my-auto">
                                            <div class="form-group">
                                                <input id="name" name="name" type="text" class="form-control" placeholder="Your name..." value="" required maxlength="50">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 my-auto">
                                            <div class="form-group">
                                                <input id="email" name="email" type="email" class="form-control" placeholder="Email address..." value="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pb-4">
                                        <div class="col-md-5 my-auto">
                                            <div class="form-group">
                                                <input id="email" name="email" type="number" class="form-control" placeholder="Guest.." value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-7 my-auto">
                                            <div class="form-group">
                                                <input id="email" name="email" type="text" class="form-control" placeholder="Your Phone..." value="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <center>
                                        <button type="submit" class="btn subscribe--btn">I Am Attending</button>
                                    </center>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End RSVP -->

<!-- Protokol -->
<section id="protokol">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="title--lg text-center" style="margin-bottom:75px;">
                    <h1 class="font--3 color--midnight">Aturan Protokol Kesehatan</h1>
                </div>
                <div class="row text-center">
                    <div class="col-sm-12 col-md-12 col-lg-4" id="masker">
                        <img src="{{asset('admin-bsb/images/protokol-1.png')}}" alt="protokol1">
                        <p>Menggunakan Masker</p>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4" id="cuci-tangan">
                        <img src="{{asset('admin-bsb/images/protokol-2.png')}}" alt="protokol2">
                        <p>Mencuci Tangan Dengan Sabun</p>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4" id="jabat-tangan">
                        <img src="{{asset('admin-bsb/images/protokol-3.png')}}" alt="protokol3">
                        <p>Tidak Berjabat Tangan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Protokol -->

<!-- Panduan -->
<section id="panduan">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="title--lg text-center">
                    <h1 class="font--1 color--midnight">Panduan Penggunaan Aplikasi</h1>
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
    </div>
</section>
<!-- End Panduan -->

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 xs-center">
                Copyright 2020 Hoofey - All Rights Reserved
            </div>
            <div class="col-sm-4 text-right xs-center">

            </div>
        </div>
    </div>
</footer>
<!-- End: Footer -->

<!-- Scripts -->
<script type="text/javascript" src="{{asset('template-4/js/jquery-3.1.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('template-4/js/bootstrap.bundle.js')}}"></script>
<script type="text/javascript" src="{{asset('template-4/js/script.js')}}"></script>
<script type="text/javascript" src="{{asset('template-4/js/smooth-scroll.polyfills.min.js')}}"></script>
<script type="text/javascript">
    $('document').ready(function(){
        $('.btn--nav').on('click',function(){
            $('.social').toggle(200).css('display','inline-block');
        });
        var scroll = new SmoothScroll('a.smooth-scroll');
    });

    // Countdown script
    (function () {
        const   second = 1000,
                minute = second * 60,
                hour = minute * 60,
                day = hour * 24;

        let wedding = "Jan 1, 2021 08:00:00",
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
</body>
</html>