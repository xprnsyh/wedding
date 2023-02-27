<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hoofey - Template Wedding Camel</title>

    <link rel="icon" type="image/png" href="http://wedding.test/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="http://wedding.test/favicon-16x16.png" sizes="16x16" />

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Noto+Sans+JP:wght@400;500;900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('template-6/plugin/flexbin/flexbin.css') }}" media="all">
    <link rel="stylesheet" href="{{ asset('template-6/plugin/aos/dist/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('template-6/plugin/lightgallery/dist/css/lightgallery.css') }}">

    <link rel="stylesheet" href="{{ asset('template-6/css/universal.css') }}">
    <link rel="stylesheet" href="{{ asset('template-6/css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('template-6/css/biasa-01.css') }}">
    <link rel="stylesheet" href="{{ asset('template-1/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('template-6/plugin/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('template-6/plugin/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('template-6/plugin/modal-video/css/modal-video.min.css') }}">


</head>

<body class="senandika camel" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="0">

    <!-- Top Cover -->
    <section class="top-cover">

        <div class="inner">
            <div class="details">
                <div>
                    <div class="text-02" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="700">
                        Udangan Pernikahan
                    </div>
                    <div class="text-01" data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="500">
                        Adam &amp; Hawa </div>
                </div>
                <div>
                    <div data-aos="fade-up" data-aos-duration="1200" data-aos-delay="900">
                        <a href="javascript:;" onclick="startTheJourney()" class="link-01">Buka Undangan</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="cover-show" id="top-cover-banner" data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="200">
        </div>
    </section>

    <!-- COVER -->
    <section class="cover">

        <div class="cover-inner">
            {{-- <div class="cover-greet">
                <img class="logo" data-aos="fade-down" data-aos-duration="1000"
                    src="{{ asset('template-6/images/cover/196554ca04121b0086185b00d1461888855cd7eb98a51a6667f6443619d6b253.png') }}"
                    alt="">
            </div> --}}
            <div class="cover-picture">
                <div class="cover-show" id="cover-real" data-aos="zoom-in" data-aos-duration="1500"
                    data-aos-delay="300"></div>
            </div>
            <div class="cover-bridegroom" data-aos="zoom-out" data-aos-duration="1000">
                <p class="text-01" data-aos="fade-down" data-aos-duration="1000">Undangan Pernikahan</p>
                <h1 data-aos="zoom-out" data-aos-duration="1000">Adam &amp; Hawa</h1>
                <!-- <p class="text-02" data-aos="fade-up" data-aos-duration="1000">#twoDtogether</p> -->
                <div data-aos="fade-up" data-aos-duration="1000">
                    <p class="text-03" data-aos="fade-up" data-aos-duration="1000">December 31<sup>st</sup>, 2021</p>
                </div>
            </div>

            <div class="cover-show" id="cover-banner" data-aos="zoom-in" data-aos-duration="1000"></div>
        </div>

    </section>

    <!-- GREETINGS -->
    <section class="greetings">
        <div data-aos="zoom-in" data-aos-duration="1000">
            <p data-aos="fade-down" data-aos-duration="1000">Hello..</p>
            <h1 data-aos="zoom-in" data-aos-duration="1000">fanny</h1>
            <p data-aos="fade-up" data-aos-duration="1000">you're invited to our wedding</p>
        </div>
    </section>

    <!-- BRIDEGROOM -->
    <section class="bridegroom">
        <div class="bridegroom-inner">
            <div class="head">
                <h1 data-aos="fade-down" data-aos-duration="1000">The Wedding of</h1>
                <p data-aos="fade-up" data-aos-duration="1000">the pleasure of your company is requested</p>
            </div>
            <div class="body ">
                <div class="groom">
                    <div class="bridegroom-border" data-aos="zoom-in" data-aos-duration="1000" data-aos-once="false">
                        <img class="bridegroom-picture" data-aos="zoom-out-right" data-aos-duration="1000"
                            data-aos-once="false" src="{{ asset('template-6/images/couple/cowo.png') }}" alt="">
                    </div>
                    <div class="bridegroom-details">
                        <h1 data-aos="zoom-in" data-aos-duration="1000">Adam Siapa</h1>
                        <p data-aos="fade-up" data-aos-duration="1000">The Son of <br />
                            Mr. Haris Sustyanto and Mrs. Bella Ayu</p>
                        <p class="bio" data-aos="fade-up" data-aos-duration="1000"></p>
                    </div>
                </div>
                <div class="bridegroom-separator" data-aos="zoom-out" data-aos-duration="1000">&amp;</div>
                <div class="bride">
                    <div class="bridegroom-border" data-aos="zoom-in" data-aos-duration="1000" data-aos-once="false">
                        <img class="bridegroom-picture" data-aos="zoom-out-left" data-aos-duration="1000"
                            data-aos-once="false" src="{{ asset('template-6/images/couple/cewe.png') }}" alt="">
                    </div>
                    <div class="bridegroom-details">
                        <h1 data-aos="zoom-in" data-aos-duration="1000">Hawa Siapa</h1>
                        <p data-aos="fade-up" data-aos-duration="1000">The Daughter of<br />
                            Mr. Ilham Cakra and Mrs. Farhana Dzu Hasna</p>
                        <p class="bio" data-aos="fade-up" data-aos-duration="1000"></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SAVE THE DATE -->
    <section class="save-date">
        <div class="save-date-inner">
            <div class="schedule">
                <div class="title">
                    <h1><span>Save</span> The Date</h1>
                </div>
                <div class="countdown">
                    <div>
                        <h1 class="count-day">0</h1>
                        <small>Hari</small>
                    </div>
                    <div>
                        <h1 class="count-hour">0</h1>
                        <small>Jam</small>
                    </div>
                    <div>
                        <h1 class="count-minute">0</h1>
                        <small>Menit</small>
                    </div>
                    <div>
                        <h1 class="count-second">0</h1>
                        <small>Detik</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- GALLERY -->
    <section class="gallery">
        <div class="title">
            <h1>Picts of us</h1>
            <p>A successful marriage requires falling in love many times, always with the same person</p>
        </div>
        <div class="flexbin" id="lightGallery">
            <a href="{{ asset('template-6/images/gallery/1.jpg') }}" target="_blank" data-aos="zoom-in"
                data-aos-duration="1000">
                <img src="{{ asset('template-6/images/gallery/1.jpg') }}" alt="">
            </a>
            <a href="{{ asset('template-6/images/gallery/2.jpg') }}" target="_blank" data-aos="zoom-in"
                data-aos-duration="1000">
                <img src="{{ asset('template-6/images/gallery/2.jpg') }}" alt="">
            </a>
            <a href="{{ asset('template-6/images/gallery/3.jpg') }}" target="_blank" data-aos="zoom-in"
                data-aos-duration="1000">
                <img src="{{ asset('template-6/images/gallery/3.jpg') }}" alt="">
            </a>
        </div>
    </section>

    <!-- EVENT -->
    <section class="event-outer">
        <div class="event-inner">
            <div class="head">
                <div class="title">
                    <h1>It's Wedding Day</h1>
                    <p>True love stands by each other’s side on good days and stands closer on bad days</p>
                </div>
                <div class="cover-show" id="cover-event"></div>
            </div>
            <div class="body">
                <div class="event">
                    <div class="title">
                        <h1>Friday, <br> December 31<sup>st</sup> 2021</h1>
                        <p></p>
                    </div>
                    <div class="activities">
                        <div class="activity">
                            <div class="title">
                                <img class="orn orn-party"
                                    src="{{ asset('template-6/images/template/icons/gray/01.png') }}" alt="">
                                <h1>Akad Nikah</h1>
                                <p></p>
                            </div>
                            <div class="address">
                                <p>09:00 - 10:00</p>
                            </div>
                        </div>
                        <div class="activity">
                            <div class="title">
                                <img class="orn orn-party"
                                    src="{{ asset('template-6/images/template/icons/gray/02.png') }}" alt="">
                                <h1>Resepsi</h1>
                                <p></p>
                            </div>
                            <div class="address">
                                <p>11:00 - 17:00</p>
                            </div>
                        </div>
                    </div>
                    <div class="details">
                        <div class="address">
                            <p><strong>CV. Akses Digital</strong></p>
                            <p>Jalan Kamboja No.1, Tuparev, Kedawung</p>
                            <p>Cirebon</p>
                        </div>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.4854533251482!2d108.54085311477169!3d-6.710454095148622!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ee32b1f74ad8d%3A0xdcafc805a89c901e!2sCV.%20Akses%20Digital!5e0!3m2!1sid!2sid!4v1629772286745!5m2!1sid!2sid"
                            width="600" height="450" frameborder="0" style="border:0"></iframe>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    {{-- RSVP --}}
    <!-- RESERVATION -->
    <section class="rsvp">
        <!-- ORNAEMENT -->
        <div class="rsvp-orn"></div>
        <!-- INNER -->
        <div class="rsvp-inner come">
            <div class="rsvp-confirm">
                <h1>Konfirmasi Kedatangan</h1>
                <div class="body">
                    <form class="comment-form">
                        <div style="display: flex; margin-bottom: 10px">
                            <div class="form-group" style="width: 50%;  margin-right: 10px;">
                                <input type="text" name="email" class="form-control" placeholder="Email Anda..">
                            </div>
                            <div class="form-group" style="width: 50%;  margin-left: 10px;">
                                <input type="text" name="name" class="form-control" placeholder="Nama Anda..">
                            </div>
                        </div>
                        <button type="submit" data-aos="fade-up" data-aos-duration="1000" class="send-comment"
                            style="width: 100%">Saya akan hadir</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- COMMENT -->
    <section class="comment-outer">
        <div class="comment-inner">
            <div class="head">
                <h1>Wedding Wish</h1>
                <p>Thanks for all the wedding wishes! You made a great day even greater!</p>
            </div>
            <form action="" class="comment-form" id="comment-form">
                <div style="display: flex; margin-bottom: 10px">
                    <div class="form-group" style="width: 50%;  margin-right: 10px;">
                        <input type="text" name="email" class="form-control" placeholder="Email Anda..">
                    </div>
                    <div class="form-group" style="width: 50%;  margin-left: 10px;">
                        <input type="text" name="name" class="form-control" placeholder="Nama Anda..">
                    </div>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="comment" rows="1" placeholder="Write something..."
                        style="max-height: 350px;" data-aos="fade-down" data-aos-duration="1000"></textarea>
                </div>
                <button data-aos="fade-up" data-aos-duration="1000" class="send-comment">Send</button>
            </form>

            <div class="comments">
                <div class="comment aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                    <div class="comment-head">
                        <p><strong>Parjo</strong></p>
                    </div>
                    <div class="comment-body">
                        <p>selamat mas e, semoga samawa ????</p>
                    </div>
                    <div class="comment-foot">
                        <small>05 Jul 2021, 22:12</small>

                    </div>
                </div>
                <div class="comment aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                    <div class="comment-head">
                        <p><strong>Parker</strong></p>
                    </div>
                    <div class="comment-body">
                        <p>Selamat</p>
                    </div>
                    <div class="comment-foot">
                        <small>02 Jul 2021, 09:59</small>

                    </div>
                </div>
                <div class="comment aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                    <div class="comment-head">
                        <p><strong>Sumanto</strong></p>
                    </div>
                    <div class="comment-body">
                        <p>Wuwuuww! Happy Wedding Adam and Hawa ???? Semoga cepat dapat momongan, happily ever
                            after❤️
                            Miss you king, sorry cant be there yaa ????❤️❤️</p>
                    </div>
                    <div class="comment-foot">
                        <small>28 Jun 2021, 09:24</small>

                    </div>
                </div>
                <div class="comment aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                    <div class="comment-head">
                        <p><strong>Lucinta Lubis</strong></p>
                    </div>
                    <div class="comment-body">
                        <p>Happy wedding</p>
                    </div>
                    <div class="comment-foot">
                        <small>27 Jun 2021, 13:45</small>

                    </div>
                </div>
                <div class="comment aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                    <div class="comment-head">
                        <p><strong>Mei-mei</strong></p>
                    </div>
                    <div class="comment-body">
                        <p>MasyaAllah Barakallah Cindyy Fanny! Finally halal jugaa yaa guisss. semoga jadi pasangan yg
                            saling mengasihi satu sama lain sampai ke Jannah-Nya. Aamiin allahumma aamiin✨</p>
                    </div>
                    <div class="comment-foot">
                        <small>27 Jun 2021, 10:56</small>

                    </div>
                </div>
            </div>
            <div class="foot aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000"><button
                    class="more-comment" data-last-comment="601">Show more comments</button></div>
        </div>
    </section>

    <!-- QUOTE END -->
    <section class="quote-end">
        <div class="quote-end-inner">
            <p>
                "And one of His signs is that He has created for you,<br />
                spouses from amongst yourselves so that you might<br />
                take comfort in them and He has placed between you,<br />
                love and mercy. In this there is surely evidence<br />
                (of the truth) for the people who carefully think.<br />
                <br />
                (Ar-Rum: 21)"
            </p>
        </div>
    </section>

    <!-- FOOTNOTE -->
    <section class="footnote">
        <div class="footnote-inner">
            <h1>Adam &amp; Hawa</h1>
            <p>December 31<sup>st</sup>, 2021</p>
        </div>
    </section>

    {{-- Panduan Penggunaan APlikasi --}}
    <div class="wrapper-01">
        <!-- background -->
        <section class="rsvp">
            <!-- INNER -->
            <div class="container">
                <!-- Panduan -->
                <div class="row" style="padding-bottom: 75px;">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="title--lg text-center">
                            <h2 class="font--4 color--midnight">Panduan Penggunaan Aplikasi</h2>
                        </div>
                        <div class="row text-center" style="margin: 45px 0;">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <img src="{{ asset('admin-bsb/images/step-1.png') }}" alt="protokol1"><br>
                                <p><b>Download Aplikasi di Google Playstore</b></p>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <img src="{{ asset('admin-bsb/images/step-2.png') }}" alt="protokol2"><br>
                                <p><b>Login menggunakan email yang sudah didaftarkan</b></p>
                            </div>
                        </div>
                        <div class="row text-center" style="margin: 45px 0;">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <img src="{{ asset('admin-bsb/images/step-3.png') }}" alt="protokol1"><br>
                                <p><b>Pilih menu invitation dan pilih undangan</b></p>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <img src="{{ asset('admin-bsb/images/step-4.png') }}" alt="protokol2"><br>
                                <p><b>Lihat detail undangan mulai dari nama sampai lokasi pernikahan</b></p>
                            </div>
                        </div>
                        <div class="row text-center" style="margin: 45px 0;">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <img src="{{ asset('admin-bsb/images/step-5.png') }}" alt="protokol1"><br>
                                <p><b>Pilih menu SCAN QR di pojok kanan atas</b></p>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <img src="{{ asset('admin-bsb/images/step-6.png') }}" alt="protokol2"
                                    class="img6"><br>
                                <p><b>Scan QR Code yang telah tersedia di lokasi resepsi</b></p>
                            </div>
                        </div>
                        <div class="row text-center" style="margin: 45px 0;">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <img src="{{ asset('admin-bsb/images/step-7.png') }}" alt="protokol1"><br>
                                <p><b>Setelah Scan QR kamu bisa langsung memberikan ucapan</b></p>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <img src="{{ asset('admin-bsb/images/step-8.png') }}" alt="protokol2"
                                    class="img8"><br>
                                <p><b>Pilih tombol kamera untuk selfie</b></p>
                            </div>
                        </div>
                        <div class="row text-center" style="margin: 45px 0;">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <img src="{{ asset('admin-bsb/images/step-9.png') }}" alt="protokol1"><br>
                                <p><b>Pilih template selfie kesukaanmu dan foto</b></p>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <img src="{{ asset('admin-bsb/images/step-10.png') }}" alt="protokol2"><br>
                                <p><b>Kamu juga bisa share dan simpan foto</b></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="download">
                                <h2>Download Aplikasi</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="download">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a href="https://play.google.com/store/apps/details?id=com.aksesdigital.hoofey"
                                            target="_blank"><img
                                                src="{{ asset('admin-bsb/images/image-download.png') }}" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="download">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h3>Terima Kasih</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Panduan -->
            </div>
        </section>
    </div>
    {{-- Panduan Penggunaan APlikasi --}}

    <!-- FOOTER -->
    <section class="footer">
        <div class="footer-inner">
            <p class="margin: auto;">Made with by</p>
            <img src="{{ asset('admin-bsb/images/logo.png') }}" alt="">
        </div>
    </section>

    @if($event->audio_id != null)
    <section class="music-outer" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
        <div class="music-box" id="music-box"></div>
    </section>
    @endif

    <!-- ALERT -->
    {{-- <div class="alert" id="alert">
        <div class="alert-text"></div>
        <div class="alert-close fas fa-times"></div>
    </div> --}}

    <!-- MODAL -->
    <div id="modal" class="modal modal-center"></div>

    <!-- SCRIPT -->
    <script src="src/jquery.js"></script>
    <script src="plugin/slick/slick.min.js"></script>
    <script src="plugin/modal-video/js/jquery-modal-video.min.js"></script>
    <script src="plugin/aos/dist/aos.js"></script>
    <script src="plugin/lightgallery/dist/js/lightgallery.min.js"></script>

    <script src="{{ asset('template-6/js/jquery.js') }}"></script>
    <script src="{{ asset('template-6/plugin/slick/slick.min.js') }}"></script>
    <script src="{{ asset('template-6/plugin/aos/dist/aos.js') }}"></script>
    <script src="{{ asset('template-6/plugin/modal-video/js/jquery-modal-video.min.js') }}"></script>
    <script src="{{ asset('template-6/plugin/lightgallery/dist/js/lightgallery.min.js') }}"></script>

    <script>
                       window.BACKGROUND_MUSIC = "https:\/\/wedding.test\/admin\/assets\/audio\/Isyana-Sarasvati-Rayhan-Maditra.mp3";

        window.DESKTOP_COVERS =
            "<div class=\"picture-outer desktop\">\n <img src=\"https:\/\/wedding.test\/template-6\/images\/cover\/cover1.png\" alt=\"\" class=\"picture\">\n <\/div><div class=\"picture-outer desktop\">\n <img src=\"https:\/\/wedding.test\/template-6\/images\/cover\/cover2.png\" alt=\"\" class=\"picture\">\n <\/div>";

        window.MOBILE_COVERS =
            "<div class=\"picture-outer mobile\">\n <img src=\"https:\/\/wedding.test\/template-6\/images\/cover\/cover1.png\" alt=\"\" class=\"picture\">\n <\/div><div class=\"picture-outer mobile\">\n <img src=\"https:\/\/wedding.test\/template-6\/images\/cover\/cover2.png\" alt=\"\" class=\"picture\">\n <\/div>";

        window.COVERS = ['#cover-real', '#cover-banner'];

        window.DESKTOP_OPENING_COVERS =
            "<div class=\"picture-outer desktop\">\n <img src=\"https:\/\/wedding.test\/template-6\/images\/cover\/cover1.png\" alt=\"\" class=\"picture\">\n <\/div><div class=\"picture-outer desktop\">\n <img src=\"https:\/\/wedding.test\/template-6\/images\/cover\/cover2.png\" alt=\"\" class=\"picture\">\n <\/div>";

        window.MOBILE_OPENING_COVERS =
            "<div class=\"picture-outer mobile\">\n <img src=\"https:\/\/wedding.test\/template-6\/images\/cover\/cover1.png\" alt=\"\" class=\"picture\">\n <\/div><div class=\"picture-outer mobile\">\n <img src=\"https:\/\/wedding.test\/template-6\/images\/cover\/cover2.png\" alt=\"\" class=\"picture\">\n <\/div>";

        window.OPENING_COVERS = ['#top-cover-banner'];
    </script>

    <script src="{{ asset('template-6/js/template.js') }}"></script>

</body>

</html>
