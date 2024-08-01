<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{asset('favicon-32x32.png')}}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{asset('favicon-16x16.png')}}" sizes="16x16" />
    
    <title>Hoofey - Template Wedding Prime</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('template-3/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('template-3/css/dripicons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('template-3/css/styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('template-3/css/ekko-lightbox.css')}}">
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
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand font-primary" href="#">
                <i>
                    <img class="floral" src="{{asset('template-3/img/floral.png')}}" width="50">
                    Axel & Rose
                </i>
            </a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <span class="nav-link">
                        <button class="btn btn--nav">
                            <img src="{{asset('template-3/img/share.svg')}}" alt="" class="share--icon mr-md-2"> <span class="xs-none">Share</span> 
                            <div class="social">
                                <a href="https://plus.google.com/share?url=http://your-website.com" target="_blank">
                                    <img class="gplus" src="{{asset('template-3/img/share-gplus.svg')}}" alt="">
                                </a>
                                <a href="https://twitter.com/share?url=http://your-website.com&amp;text=Your%20Website%20Name&amp;hashtags=yourwebsite" target="_blank">
                                    <img class="twitter" src="{{asset('template-3/img/share-twitter.svg')}}" alt="">
                                </a>
                                <a href="http://www.facebook.com/sharer.php?u=http://your-website.com" target="_blank">
                                    <img class="fb" src="{{asset('template-3/img/share-fb.svg')}}" alt="">
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
            <span id="wedding-date">12 December 2018</span>
            <img class="floral" src="{{asset('template-3/img/floral.png')}}">
            <h1 class="font-primary">Axel & Rose</h1>
            <p class="text-center">We're getting married. Lorem ipsum dolor sit amet consectetur adipiscing elit sed eiusmod.</p>

            <a class="smooth-scroll" data-scroll href="#rsvp">
                <button class="btn btn--demo">
                    I Want To Come
                </button>
            </a>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
          <polygon fill="#FAFAFA" points="0,100 100,0 100,100"/>
        </svg>

      </header>
      <!-- End: Header -->

      <!-- Couple -->
      <section id="couple" class="bg--white">
        <div class="container">
            <div class="couple">
                <img src="{{asset('template-3/img/floral-border-left.png')}}" class="floral--top-left">
                <div class="row">
                    <div class="col-12">
                        <h4 class="text-center font-primary">Save the Date<br>Lorem & Ipsum Dolor</h4>
                        <hr class="short">
                    </div>
                </div>
                <div class="row pt-2 pb-2">
                    <div class="col-12 col-md-6 my-auto mx-auto" style="position: relative;">
                        <img src="{{asset('template-3/img/connector.png')}}" class="bride--connector">
                        <center><img src="{{asset('template-3/img/axel.jpg')}}" class="bride--photo"></center>
                        <p class="bride--name">Axel Bridge</p>
                        <div class="bride--info">
                            <div class="bride--desc">
                                Lorem ipsum dolor sit amet consectetur adipiscing elit sed eiusmod.
                            </div>
                            <center>
                                <div class="bride--socials">
                                    <a href="http://www.instagram.com/" target="_blank">
                                        <img class="instagram" src="{{asset('template-3/img/instagram.png')}}" alt="">
                                    </a>
                                    <a href="http://www.facebook.com/" class="pl-1" target="_blank">
                                        <img class="fb" src="{{asset('template-3/img/facebook.png')}}" alt="">
                                    </a>
                                </div>
                            </center>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 my-auto mx-auto pt-5 pt-md-0">
                        <center><img src="{{asset('template-3/img/rose.jpg')}}" class="bride--photo"></center>
                        <p class="bride--name">Roselie Queen</p>
                        <div class="bride--info">
                            <div class="bride--desc">
                                Lorem ipsum dolor sit amet consectetur adipiscing elit sed eiusmod.
                            </div>
                            <center>
                                <div class="bride--socials">
                                    <a href="http://www.instagram.com/" target="_blank">
                                        <img class="instagram" src="{{asset('template-3/img/instagram.png')}}" alt="">
                                    </a>
                                    <a href="http://www.facebook.com/" class="pl-1" target="_blank">
                                        <img class="fb" src="{{asset('template-3/img/facebook.png')}}" alt="">
                                    </a>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
                <img src="{{asset('template-3/img/floral-bottom-right.png')}}" class="floral--bottom-right">
            </div>
        </div>
    </section>
    <!-- End: Couple -->

    <!-- Video -->
    <section id="video" class="no-padding bg--white">
        <div class="container">
            <div class="row">
                <div class="col-md-7 my-auto">
                    <div class="video">
                        <iframe src="https://www.youtube.com/embed/RG1llY1kxYg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-5 sm-center pt-3 pt-md-0 pl-0 pl-md-5 my-auto">
                    <h3 class="mb-4 font-primary">About Us</h3>
                    <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipiscing elit sed <br class="xs-none"> eiusmod tempor incididunt sed tempor. Lorem ipsum dolor sit amet consectetur adipiscing elit sed eiusmod.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Video -->

    <!-- Location -->
    <section id="location" class="bg--white">
        <div class="container">
            <div class="row">
                <div class="col-md-5 sm-center my-auto">
                    <h3 class="mb-4 font-primary">Saturday 12 December 2018<br>Jember, East Java</h3>
                    <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipiscing elit sed <br class="xs-none"> eiusmod tempor incididunt sed tempor. Lorem ipsum dolor sit amet consectetur adipiscing elit sed eiusmod.</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="event">
                                <div class="row">
                                    <div class="col-md-1 col-sm-3 col-2 pr-0">
                                        <i class="event--icon dripicons dripicons-location"></i>
                                    </div>
                                    <div class="col-md-11 col-sm-9 col-10 pl-0" id="countdown">
                                        <p class="event--title"><b>12:00 AM at Grage Hall</b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-1">
                        <div class="col-12">
                            <a data-scroll href="#rsvp">
                                <button class="btn btn--demo">
                                    Yes, take me there!
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 my-auto pt-5 pt-md-0">
                    <div class="image-card">
                        <img src="{{asset('template-3/img/hall.jpg')}}"></img>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12" id="countdown">
                    <ul>
                        <li><span id="days"></span><b>days</b></li>
                        <li><span id="hours"></span><b>Hours</b></li>
                        <li><span id="minutes"></span><b>Minutes</b></li>
                        <li><span id="seconds"></span><b>Seconds</b></li>
                    </ul>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
          <polygon fill="#F8F7F2" points="0,100 100,0 100,100"/>
        </svg>
      </section>
      <!-- End: Video -->

      <!-- Description -->
      <section id="description">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 my-auto xs-center">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="image-card">
                                <img src="{{asset('template-3/img/couple-1.jpg')}}" alt="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="image-card small mt-5 mt-md-0">
                                <img src="{{asset('template-3/img/couple-2.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 my-auto">
                    <h1 class="pt-5 pt-md-0 mb-4 font-primary">Hear Our Story</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <div class="divider--sm"></div>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
          <polygon fill="#FAFAFA" points="0,100 100,0 100,100"/>
        </svg>
      </section>
      <!-- End: Description -->


      <!-- galleries -->
      <section id="galleries" class="no-padding pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 my-auto">
                    <h1 class="mb-4 font-primary text-center">Gallery</h1>
                    <center>
                        <img class="floral" src="{{asset('template-3/img/floral.png')}}">
                    </center>
                </div>
            </div>

            <!-- Grid row -->
            <div class="gallery pt-4" id="gallery">

                <!-- Grid column -->
                <a href="{{asset('template-3/img/gallery1-1.jpg')}}" data-toggle="lightbox" data-gallery="gallery">
                    <div class="mb-3 pics all 2">
                        <img class="img-fluid" src="{{asset('template-3/img/gallery1-1.jpg')}}" alt="Card image cap">
                    </div>    
                </a>
                <!-- Grid column -->

                <!-- Grid column -->
                <a href="{{asset('template-3/img/gallery2-2.jpg')}}" data-toggle="lightbox" data-gallery="gallery">
                    <div class="mb-3 pics all 1">
                        <img class="img-fluid" src="{{asset('template-3/img/gallery2-2.jpg')}}" alt="Card image cap">
                    </div>
                </a>
                <!-- Grid column -->

                <!-- Grid column -->
                <a href="{{asset('template-3/img/gallery2-1.jpg')}}" data-toggle="lightbox" data-gallery="gallery">
                    <div class="mb-3 pics all 1">
                        <img class="img-fluid" src="{{asset('template-3/img/gallery2-1.jpg')}}" alt="Card image cap">
                    </div>
                </a>
                <!-- Grid column -->

                <!-- Grid column -->
                <a href="{{asset('template-3/img/gallery1-2.jpg')}}" data-toggle="lightbox" data-gallery="gallery">
                    <div class="mb-3 pics all 2">
                        <img class="img-fluid" src="{{asset('template-3/img/gallery1-2.jpg')}}" alt="Card image cap">
                    </div>
                </a>
                <!-- Grid column -->

                <!-- Grid column -->
                <a href="{{asset('template-3/img/gallery1-3.jpg')}}" data-toggle="lightbox" data-gallery="gallery">
                    <div class="mb-3 pics all 2">
                        <img class="img-fluid" src="{{asset('template-3/img/gallery1-3.jpg')}}" alt="Card image cap">
                    </div>
                </a>
                <!-- Grid column -->

                <!-- Grid column -->
                <a href="{{asset('template-3/img/gallery2-3.jpg')}}" data-toggle="lightbox" data-gallery="gallery">
                    <div class="mb-3 pics all 1">
                        <img class="img-fluid" src="{{asset('template-3/img/gallery2-3.jpg')}}" alt="Card image cap">
                    </div>
                </a>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
    </section>
    <!-- End: galleries -->

    <section id="rsvp">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 xs-none">
                    <div class="image-card">
                        <img src="{{asset('template-3/img/rsvp.jpg')}}">
                    </div>
                </div>

                <div class="col-12 col-md-5">
                    <h1 class="font-primary">RSVP</h1>
                    <div class="subscribe--box">
                        <img src="{{asset('template-3/img/floral-border-left-2.png')}}" class="floral--top-left">
                        <form action="" method="POST" autocomplete="off">
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
                            <div class="row">
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
                            <button type="submit" id="btn-submit" class="btn subscribe--btn">I Am Attending</button>
                        </form>
                        <img src="{{asset('template-3/img/floral-bottom-right-2.png')}}" class="floral--bottom-right">
                    </div>
                </div>
            </div>

            <!-- Maps -->
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div id="maps">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.1709416412814!2d113.7183600152305!3d-8.185528794108631!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6967ebb79e2ab%3A0xf66c79ebf24b3cff!2sJl.+Sriwijaya+10%2C+Karangrejo%2C+Sumbersari%2C+Kabupaten+Jember%2C+Jawa+Timur+68124!5e0!3m2!1sen!2sid!4v1475805927161"
                        width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <!-- End: Maps -->

            <!-- Protokol -->
            <div class="row" style="padding: 75px 0;">
                <div class="col-lg-10 offset-lg-1">
                    <div class="title--lg text-center" style="margin-bottom:75px;">
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
            <!-- End Protokol -->

            <!-- Panduan -->
            <div class="row" style="padding-bottom: 75px;">
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
            <!-- End Panduan -->
            
        </div>
    </section>

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
    <script type="text/javascript" src="{{asset('template-3/js/jquery-3.1.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template-3/js/bootstrap.bundle.js')}}"></script>
    <script type="text/javascript" src="{{asset('template-3/js/script.js')}}"></script>
    <script type="text/javascript" src="{{asset('template-3/js/smooth-scroll.polyfills.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template-3/js/circletype.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template-3/js/ekko-lightbox.min.js')}}"></script>
    <script type="text/javascript">
        $('document').ready(function(){
            $('.btn--nav').on('click',function(){
                $('.social').toggle(200).css('display','inline-block');
            });
            var scroll = new SmoothScroll('a.smooth-scroll');

            new CircleType(document.getElementById('wedding-date'))
            .radius(94);
        });

        $(document).on("click", '[data-toggle="lightbox"]', function(event) {
          event.preventDefault();
          $(this).ekkoLightbox();
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