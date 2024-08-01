<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hoofey - Template Wedding Jawa</title>

    <link rel="stylesheet" href="{{ asset('template-6/plugin/selectize/dist/css/selectize.default.css') }}">
    <link rel="stylesheet" href="{{ asset('template-6/plugin/flexbin/flexbin.css') }}" media="all">
    <link rel="stylesheet" href="{{ asset('template-6/plugin/aos/dist/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('template-6/plugin/lightgallery/dist/css/lightgallery.css') }}">


    <link rel="stylesheet" href="{{ asset('template-6/css/universal.css') }}">
    <link rel="stylesheet" href="{{ asset('template-6/css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('template-6/css/jawa.css') }}">
    <link rel="stylesheet" href="{{ asset('template-1/css/bootstrap.min.css') }}">


    <link rel="stylesheet" href="{{ asset('template-6/plugin/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('template-6/plugin/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('template-6/plugin/modal-video/css/modal-video.min.css') }}">


</head>

<body class=" jawa original ">
    <div id="snowflakeContainer">
    <span class="snowflake"></span>
    </div>

    <!-- TOP COVER -->
    <section class="top-cover">
        <div class="inner">
            <div class="highlight">
                <div class="picture" data-aos="zoom-out" data-aos-duration="1000">
                    <img src="{{ asset('template-6/images/gallery/1.jpg') }}" alt="">
                </div>
            </div>
            <div class="details">

                <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
                    <a href="javascript:;" onclick="startTheJourney()">Buka Undangan</a>
                </div>
            </div>
            <div class="back-highlight">
                <div class="picture">
                    <img src="{{ asset('template-6/images/gallery/1.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </section>



    <!-- Cover -->
    <section class="cover">

        <div class="inner">
            <div class="clouds">
                <div class="cloud cloud-01"></div>
                <div class="cloud cloud-02"></div>
                <div class="cloud cloud-03"></div>
                <div class="cloud cloud-04"></div>
            </div>
            <div class="greet">
                <div class="details">
                    <p data-aos="fade-down" data-aos-duration="1000" data-aos-delay="400">Dua Jiwa, Satu Cinta</p>
                    {{-- <div class="logo" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="200">
                        <img src="{{ asset('template-6/images/gallery/2.jpg') }}" alt="">
                    </div> --}}
                </div>
            </div>
            <div class="highlight" data-aos="zoom-in" data-aos-duration="1000">

                <div class="orns">
                    <div class="orn orn-01"></div>
                    <div class="orn orn-02"></div>
                    <div class="orn orn-03"></div>
                    <div class="orn orn-04"></div>
                </div>
                <div class="picture-outer" id="cover-real"></div>
            </div>
            <div class="couple">
                <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">Pernikahan</p>
                <div class="title-01" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">Adam & Hawa</div>
                <p class="date" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">08 Agustus 2021</p>
            </div>
        </div>


        <div class="orns orns-01">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38.74 40.25" class="orn-01">
                <g id="Layer_2" data-name="Layer 2">
                    <g id="Слой_1" data-name="Слой 1">
                        <path class="path-01"
                            d="M19.61,40.25c-9.89,0-15.77-8.57-16.41-9.56a19.8,19.8,0,0,1-1.58-3A19.06,19.06,0,0,1,3.28,9.38,20.6,20.6,0,0,1,20.55,0H37.68a1.06,1.06,0,1,1,0,2.12H20.55a18.49,18.49,0,0,0-15.5,8.42A17,17,0,0,0,3.56,26.9,17.85,17.85,0,0,0,5,29.53c.59.9,5.89,8.77,14.84,8.6C25.52,38.06,32.2,35,33.94,29.2c1.14-3.75.48-10-3.68-12.06a8.46,8.46,0,0,0-6.44,0,1.05,1.05,0,0,1-1.36-.62,1.07,1.07,0,0,1,.63-1.36,10.47,10.47,0,0,1,8.09,0c5,2.41,6.34,9.44,4.79,14.57-2,6.74-9.66,10.35-16.13,10.44Z" />
                    </g>
                </g>
            </svg>
            <div class="orn-02"></div>
            <div class="orn-03"></div>
            <div class="orn-04"></div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38.74 40.25" class="orn-05">
                <g id="Layer_2" data-name="Layer 2">
                    <g id="Слой_1" data-name="Слой 1">
                        <path class="path-01"
                            d="M19.61,40.25c-9.89,0-15.77-8.57-16.41-9.56a19.8,19.8,0,0,1-1.58-3A19.06,19.06,0,0,1,3.28,9.38,20.6,20.6,0,0,1,20.55,0H37.68a1.06,1.06,0,1,1,0,2.12H20.55a18.49,18.49,0,0,0-15.5,8.42A17,17,0,0,0,3.56,26.9,17.85,17.85,0,0,0,5,29.53c.59.9,5.89,8.77,14.84,8.6C25.52,38.06,32.2,35,33.94,29.2c1.14-3.75.48-10-3.68-12.06a8.46,8.46,0,0,0-6.44,0,1.05,1.05,0,0,1-1.36-.62,1.07,1.07,0,0,1,.63-1.36,10.47,10.47,0,0,1,8.09,0c5,2.41,6.34,9.44,4.79,14.57-2,6.74-9.66,10.35-16.13,10.44Z" />
                    </g>
                </g>
            </svg>
        </div>

        <div class="orns orns-02">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38.74 40.25" class="orn-01">
                <g id="Layer_2" data-name="Layer 2">
                    <g id="Слой_1" data-name="Слой 1">
                        <path class="path-01"
                            d="M19.61,40.25c-9.89,0-15.77-8.57-16.41-9.56a19.8,19.8,0,0,1-1.58-3A19.06,19.06,0,0,1,3.28,9.38,20.6,20.6,0,0,1,20.55,0H37.68a1.06,1.06,0,1,1,0,2.12H20.55a18.49,18.49,0,0,0-15.5,8.42A17,17,0,0,0,3.56,26.9,17.85,17.85,0,0,0,5,29.53c.59.9,5.89,8.77,14.84,8.6C25.52,38.06,32.2,35,33.94,29.2c1.14-3.75.48-10-3.68-12.06a8.46,8.46,0,0,0-6.44,0,1.05,1.05,0,0,1-1.36-.62,1.07,1.07,0,0,1,.63-1.36,10.47,10.47,0,0,1,8.09,0c5,2.41,6.34,9.44,4.79,14.57-2,6.74-9.66,10.35-16.13,10.44Z" />
                    </g>
                </g>
            </svg>
            <div class="orn-02"></div>
            <div class="orn-03"></div>
            <div class="orn-04"></div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38.74 40.25" class="orn-05">
                <g id="Layer_2" data-name="Layer 2">
                    <g id="Слой_1" data-name="Слой 1">
                        <path class="path-01"
                            d="M19.61,40.25c-9.89,0-15.77-8.57-16.41-9.56a19.8,19.8,0,0,1-1.58-3A19.06,19.06,0,0,1,3.28,9.38,20.6,20.6,0,0,1,20.55,0H37.68a1.06,1.06,0,1,1,0,2.12H20.55a18.49,18.49,0,0,0-15.5,8.42A17,17,0,0,0,3.56,26.9,17.85,17.85,0,0,0,5,29.53c.59.9,5.89,8.77,14.84,8.6C25.52,38.06,32.2,35,33.94,29.2c1.14-3.75.48-10-3.68-12.06a8.46,8.46,0,0,0-6.44,0,1.05,1.05,0,0,1-1.36-.62,1.07,1.07,0,0,1,.63-1.36,10.47,10.47,0,0,1,8.09,0c5,2.41,6.34,9.44,4.79,14.57-2,6.74-9.66,10.35-16.13,10.44Z" />
                    </g>
                </g>
            </svg>
        </div>

        <div class="line line-01"></div>
        <div class="line line-02"></div>
        <div class="line line-03"></div>
        <div class="line line-04"></div>
        <div class="flower flower-01"></div>
        <div class="flower flower-02"></div>

    </section>


    <!-- QUOTE TOP -->
    <section class="quote-top">
        <div class="inner">
            <p data-aos="fade-up" data-aos-duration="1000">“Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia
                menciptakan
                pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan
                Dia
                menjadikan di antaramu rasa kasih dan sayang. Sungguh, pada demikian itu benar-benar terdapat
                tanda-tanda
                (kebesaran Allah) bagi kaum yang berpikir.”<br />
                <br />
                (QS. Ar-Rum ayat 21)
            </p>
        </div>
    </section>

    <!-- GUEST -->
    <section class="guest">
        <div class="inner">
            <p data-aos="fade-up" data-aos-duration="1000">Teruntuk</p>

            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400"></p>
        </div>
    </section>

    <!-- COUPLE -->
    <section class="couple">
        <div class="inner">
            <div class="head">
                <div class="title-01" data-aos="zoom-in" data-aos-duration="1200"></div>
                <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">Bismillahirrahmanirrahim<br />
                    Assalamu'alaikum Warahmatullahi Wabarakaatuh<br />
                    Maha Suci Allah yang telah menciptakan makhluk-Nya berpasang-pasangan<br />
                    Ya Allah, perkenankanlah putra-putri kami:</p>
            </div>
            <div class="body  bride-first   show-picture">
                <div class="groom">
                    <div class="picture">
                        <div class="picture-01" data-aos="zoom-in" data-aos-duration="1200">
                            <img src="{{ asset('template-6/images/couple/cowo.png') }}" alt="">
                        </div>
                    </div>
                    <div class="details">
                        <div class="title-01" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">Adam
                            Siapa
                        </div>
                        <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">Putra ketiga dari Bapak &
                            Ibu</p>
                        <p class="bio" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600"></p>
                        <div class="link-01" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800">

                        </div>
                    </div>
                </div>
                <div class="separator">
                    <p data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="500">&amp;</p>
                    <div class="orn orn-01"></div>
                    <div class="orn orn-02"></div>
                </div>
                <div class="bride">
                    <div class="picture">
                        <div class="picture-01" data-aos="zoom-in" data-aos-duration="1200">
                            <img src="{{ asset('template-6/images/couple/cewe.png') }}" alt="">
                        </div>
                    </div>
                    <div class="details">
                        <div class="title-01" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">Hawa
                            Siapa</div>
                        <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">Putri kedua dari Bapak & Ibu
                        </p>
                        <p class="bio" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600"></p>
                        <div class="link-01" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- EVENTS -->
    <section class="event-outer">
        <div class="inner">
            <div class="head">
                <div class="title-01" data-aos="zoom-in" data-aos-duration="1200"></div>
                <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">Untuk melaksanakan syariat agama-Mu,
                    mengikuti sunnah rasul-Mu dalam membentuk keluarga yang Sakinah, Mawaddah, Warahmah yang Insya Allah
                    akan
                    diselenggarakan pada hari:</p>
            </div>
            <div class="body">
                <div class="event">
                    <div class="title" data-aos="fade-right" data-aos-duration="1000">
                        <div class="title-01" data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="400">
                            Minggu<br>08 Agustus
                            2021</div>

                    </div>
                    <div class="activities">
                        <div class="activity">
                            <div class="title">
                                <img class="orn orn-party"
                                    src="{{ asset('template-6/images/template/icons/red/01.png') }}" alt=""
                                    data-aos="zoom-in" data-aos-duration="1000">
                                <h1 data-aos="fade-right" data-aos-duration="1000">Akad Nikah</h1>

                                <p class="time" data-aos="zoom-in-up" data-aos-duration="1000">09:00 - 10:00</p>
                            </div>
                            <div class="address" data-aos="zoom-in-up" data-aos-duration="1000"></div>
                        </div>
                        <div class="activity">
                            <div class="title">
                                <img class="orn orn-party"
                                    src="{{ asset('template-6/images/template/icons/red/02.png') }}" alt=""
                                    data-aos="zoom-in" data-aos-duration="1000">
                                <h1 data-aos="fade-right" data-aos-duration="1000">Resepsi</h1>

                                <p class="time" data-aos="zoom-in-up" data-aos-duration="1000">11:00 - 17:00</p>
                            </div>
                            <div class="address" data-aos="zoom-in-up" data-aos-duration="1000"></div>
                        </div>
                    </div>
                    <div class="details">
                        <div class="address" data-aos="zoom-in-up" data-aos-duration="1000">
                            <p><strong>CV. Akses Digital</strong></p>
                            <p>Jalan Kamboja No.1, Tuparev, Kedawung</p>
                            <p>Cirebon</p>
                        </div>
                        {{-- <div data-aos="fade-down" data-aos-duration="1000">
                            <div data-aos="fade-down" data-aos-duration="1000">
                                <div class="responsive-map-container">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253585.51335927355!2d108.45060414522312!3d-6.736434027302832!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdcafc805a89c901e!2sCV.%20Akses%20Digital!5e0!3m2!1sid!2sid!4v1629960568333!5m2!1sid!2sid"
                                        width="600" height="450" style="border:0;" allowfullscreen=""
                                        loading="lazy"></iframe>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="orn orn-01"></div>
            <div class="orn orn-02"></div>
        </div>
    </section>


    <!-- SAVE DATE -->
    <section class="save-date">
        <div class="inner">
            <div class="orn orn-01"></div>
            <div class="head">
                <div class="title-01" data-aos="zoom-in" data-aos-duration="1200">Hari Yang Ditunggu</div>
                <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">08 Agustus 2021</p>
                <div class="orn orn-01"></div>
                <div class="orn orn-02"></div>
            </div>
            <div class="body">
                <div class="countdown">
                    <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800">
                        <div class="title-01 count-day">0</div>
                        <small>Hari</small>
                    </div>
                    <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                        <div class="title-01 count-hour">0</div>
                        <small>Jam</small>
                    </div>
                    <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                        <div class="title-01 count-minute">0</div>
                        <small>Menit</small>
                    </div>
                    <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        <div class="title-01 count-second">0</div>
                        <small>Detik</small>
                    </div>
                </div>
            </div>
            <div class="foot" data-aos="zoom-in-up" data-aos-duration="1000" data-aos-delay="600">
                <a href="http://www.google.com/calendar/" target="_blank" rel="nofollow">Tambah Ke Kalender</a>
            </div>
        </div>
    </section>


    <!-- GALLERY -->
    <section class="gallery">
        <div class="inner">
            <div class="orn orn-01"></div>
            <div class="head">
                <div class="title-01" data-aos="zoom-in" data-aos-duration="1200">Foto - Foto</div>

                <div class="orn orn-01"></div>
                <div class="orn orn-02"></div>
            </div>
            <div class="body">
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
            </div>
        </div>
    </section>

    <!-- RSVP -->
    <section class="comment-outer">
        <div class="comment-inner">
            <div class="head">
                <h1 data-aos="fade-up" data-aos-duration="1000">RSVP</h1>
            </div>
            <form action="" class="comment-form" id="comment-form">
                <div style="display: flex; margin-bottom: 10px">
                            <div class="form-group" style="width: 50%;  margin-left: 10px;">
                                <input type="text" name="name" class="form-control" placeholder="Nama Anda..">
                            </div>
                            <div class="form-group" style="width: 50%;  margin-right: 10px;">
                                <input type="text" name="email" class="form-control" placeholder="Email Anda..">
                            </div>
                </div>
                <button data-aos="fade-up" data-aos-duration="1000" class="send-comment" style="width: 100%">Saya akan
                    hadir</button>
            </form>
        </div>
    </section>

    <!-- COMMENT -->
    <section class="comment-outer">
        <div class="comment-inner">
            <div class="head">
                <h1 data-aos="fade-up" data-aos-duration="1000">Wedding Wish</h1>
                <p data-aos="zoom-in-up" data-aos-duration="1000">Thanks for all the wedding wishes! You made a great
                    day even greater!</p>
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
                        <p><strong>biduan jogja</strong></p>
                    </div>
                    <div class="comment-body">
                        <p>selamat mas e, jgn sungkan mampir lagi ya bebs ????</p>
                    </div>
                    <div class="comment-foot">
                        <small>05 Jul 2021, 22:12</small>

                    </div>
                </div>
                <div class="comment aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                    <div class="comment-head">
                        <p><strong>Hhh</strong></p>
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
                        <p><strong>Dolly</strong></p>
                    </div>
                    <div class="comment-body">
                        <p>Wuwuuww! Happy Wedding King and kak fany ???? Semoga cepat dapat momongan, happily ever
                            after❤️
                            Miss you king, sorry cant be there yaa ????❤️❤️</p>
                    </div>
                    <div class="comment-foot">
                        <small>28 Jun 2021, 09:24</small>

                    </div>
                </div>
                <div class="comment aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                    <div class="comment-head">
                        <p><strong>Shasza Addaraby Lubis</strong></p>
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
                        <p><strong>Maymaaai</strong></p>
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

    <!-- FOOTNOTE -->
    <section class="footnote">
        <div class="inner">
            <p data-aos="fade-up" data-aos-duration="1000">Dua Jiwa, Satu Cinta</p>
            <p class="date" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">08 Agustus 2021</p>
            <div class="title-01" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">Adam & Hawa</div>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">#CHIfinallyRAN</p>
            <div class="orn orn-01"></div>
            <div class="orn orn-02"></div>
            <div class="orn orn-03"></div>
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
            <p>Made with by</p>
            <img src="{{ asset('admin-bsb/images/logo.png') }}" alt="">
        </div>
    </section>

    <!-- MUSIC -->
    <section class="music-outer" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
        <div class="music-box auto" id="music-box"></div>
    </section>


    <!-- MODAL -->
    <div id="modal" class="modal modal-center"></div>


    <!-- SCRIPT -->
    <script src="{{ asset('template-6/js/jquery.js') }}"></script>
    <script src="{{ asset('template-6/plugin/selectize/dist/js/standalone/selectize.min.js') }}"></script>
    <script src="{{ asset('template-6/plugin/slick/slick.min.js') }}"></script>
    <script src="{{ asset('template-6/plugin/aos/dist/aos.js') }}"></script>
    <script src="{{ asset('template-6/plugin/modal-video/js/jquery-modal-video.min.js') }}"></script>
    <script src="{{ asset('template-6/plugin/lightgallery/dist/js/lightgallery.min.js') }}"></script>

    <script>
        window.BACKGROUND_MUSIC = "{{ asset('admin/assets/audio/' . $event->audio->path ?? '') }}";

        const img_cover = [];
        const img_picture = [];
        @foreach ($photo_event as $gallery)
            img_cover.push(`<div class="picture desktop"><img src="{{ asset($gallery['path']) }}" alt="" class="picture">
            </div>`);
            img_picture.push(`<div class="picture mobile"><img src="{{ asset($gallery['path']) }}" alt="" class="picture">
            </div>`)
        @endforeach

        window.DESKTOP_COVERS = img_cover;
        window.MOBILE_COVERS = img_picture;

        window.COVERS = ['#cover-real'];

        const image = document.querySelector(".preview img");
        const button = document.querySelector("preview .play-btn");
        const yt_id = document.querySelector("iframe").src.match(/youtube\.com.*(\?v=|\/embed\/)(.{11})/).pop();
        if (yt_id.length == 11) {
            image.setAttribute("src", `//img.youtube.com/vi/${yt_id}/0.jpg`);
            button.setAttribute("data-video-id", yt_id);
        }
    </script>

    <script src="{{ asset('template-6/js/template.js') }}"></script>


</body>

</html>
