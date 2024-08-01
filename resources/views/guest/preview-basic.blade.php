<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hoofey - Wedding {{ $event->nama_panggilan_mempelai_wanita }} &
        {{ $event->nama_panggilan_mempelai_pria }}
    </title>

    <link rel="icon" type="image/png" href="{{ asset('favicon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ asset('favicon-16x16.png') }}" sizes="16x16" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Niconne&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/bootstrap.min.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body style="background: #E5DED5;">
    <div class="container">
        <!-- Header -->
        <header>
            <div id="intro-v2" class="style-satu-v2 color-satu niconne">
                <div class="position-absolute top-50 start-50 translate-middle text-center align-items-center">
                    <h2 class="display-4 m-0" data-aos="fade-up-right" data-aos-delay="150" data-aos-duration="1000">
                        Undangan Pernikahan</h2>
                    <h1 class="display-1 m-0" data-aos="fade-up-left" data-aos-delay="250" data-aos-duration="1000">
                        {{ $event->nama_panggilan_mempelai_wanita }} & {{ $event->nama_panggilan_mempelai_pria }}
                    </h1>
                    <h4 class="display-4 font-weight-light font-italic m-0" data-aos="fade-up" data-aos-delay="350"
                        data-aos-duration="1000">
                        {{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('M d Y') }}</h4>
                </div>
            </div>

        </header>
        <!-- End: Header -->

        <!-- Date -->
        <section id="bride-groom">
            <div class="style-satu-v2 p-5">
                <div class="text-center poppins">
                    <div class="color-dua">
                        <div class="d-flex justify-content-center">
                            <div class="col-md-8">
                                <div class="text">
                                    <p class="h3 fst-italic">Bismillahirrahmanirrahim</p>
                                    <p class="fs-6 my-4 lh-sm fw-light fst-italic">Dengan memanjatkan puji syukur serta
                                        memohon ridho dan rahmat Allah Subhanahu Wa Ta'ala, kami bermaksud
                                        menyelenggarakan
                                        resepsi pernikahan Putra-Putri kami yang Insha Allah akan diselenggarakan
                                    </p>
                                </div>

                                <div class="contdown">
                                    <div class="border border-2 rounded-3">
                                        <div class="px-5 py-3">
                                            <div class="row color-dua">
                                                <div class="col m-0">
                                                    <div class="display-4" id="days">30</div>
                                                    <h5>Hari</h4>
                                                </div>
                                                <div class="col m-0">
                                                    <div class="display-4 d-lg-block d-none">:</div>
                                                </div>
                                                <div class="col m-0">
                                                    <div class="display-4" id="hours">1</div>
                                                    <h5>Jam</h5>
                                                </div>
                                                <div class="col m-0">
                                                    <div class="display-4 d-lg-block d-none">:</div>
                                                </div>
                                                <div class="col  m-0">
                                                    <div class="display-4" id="minutes">25</div>
                                                    <h5>Menit</h5>
                                                </div>
                                                <div class="col m-0">
                                                    <div class="display-4 d-lg-block d-none">:</div>
                                                </div>
                                                <div class="col m-0">
                                                    <div class="display-4" id="seconds">34</div>
                                                    <h5>Detik</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="button">
                                    <a class="btn btn-outline-light btn-lg mt-3">Simpan Tanggal</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End: Date -->

        <!-- Bride & Groom -->
        <section>
            <div class="style-dua-v2 color-satu">
                <div id="aksen1-v2" class="bg-image">
                    <div class="text-center niconne py-5">
                        <div class="d-flex justify-content-center">
                            <div class="col-lg-8">
                                <div class="d-flex justify-content-between">
                                    <div class="col" data-aos="zoom-in-right" data-aos-delay="100">
                                        <div class="">
                                            <img src="{{ asset('template/image/amanda.png') }}" width="150"
                                                class="rounded-circle" alt="...">
                                        </div>
                                        <h1 class="my-4">
                                            Tiyas
                                        </h1>
                                        <p class="fst-italic fw-light poppins">Putri dari
                                            Bapak Rully Wijaya
                                            & Ibu Dina Dayani</p>
                                    </div>
                                    <div class="col align-self-center h1" data-aos="fade-up" data-aos-delay="200">&
                                    </div>
                                    <div class="col" data-aos="zoom-in-left" data-aos-delay="300">
                                        <div class="">
                                            <img src="{{ asset('template/image/johnie.png') }}" width="150"
                                                class="rounded-circle" alt="...">
                                        </div>
                                        <h1 class="my-4">Bayu</h1>
                                        <p class="fst-italic fw-light poppins">Putra dari
                                            Bapak Rully Wijaya
                                            & Ibu Dina Dayani</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End: Bride & Groom -->
        {{-- Video --}}
        <section id="aksen2-v2" data-aos="fade-left">
            <div class="style-satu-v2 color-dua p-5">
                <div class="text-center niconne">
                    <div class="d-flex justify-content-center mb-5">
                        <div class="col-lg-8">
                            <iframe src="https://www.youtube.com/embed/EIRMMFfiePs" title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- End: Video --}}

        <!-- Event -->
        <section data-aos="fade-left">
            <div class="style-dua-v2 color-dua p-5">
                <div class="text-center niconne">
                    <div class="d-flex justify-content-center">
                        <div class="col-lg-8">
                            <div class="d-flex justify-content-between">
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <h1>
                                        Akad Nikah
                                    </h1>
                                    <div class="my-4 fst-italic fw-light poppins">
                                        <p class="">Rabu, 02 Desember 2020</p>
                                        <p>Pukul 08:00 s/d 09:00 WIB</p>
                                        <p>Cirebon</p>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12 col-sm-12 ">
                                    <h1>Resepsi Pernikahan</h1>
                                    <div class="my-4 fst-italic fw-light poppins">
                                        <p class="">Rabu, 02 Desember 2020</p>
                                        <p>Pukul 08:00 s/d 09:00 WIB</p>
                                        <p>Cirebon</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End: Event -->


        <!-- Lokasi -->
        <section>
            <div class="style-satu-v2 color-satu">
                <div id="aksen3" class="bg-image">
                    <div class="text-center niconne">
                        <div class="d-flex justify-content-center">
                            <div class="col-lg-8">
                                <img class="" src="{{ asset('template/image/aksen.png') }}" width="100" alt="">
                                <h3 class="display-4">Lokasi Acara</h3>
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31698.905775494924!2d108.5479977!3d-6.725459000000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ee26e53c5dd51%3A0xa8c4fb14a4597af0!2sGrage%20Mall%20Cirebon!5e0!3m2!1sid!2sid!4v1629089735247!5m2!1sid!2sid"
                                    width="100%" height="420" style="border:0;" allowfullscreen=""
                                    loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End: Lokasi -->

        <!-- Gallery & RSVP & Ucapan -->
        <section>
            <div id="aksen4" class="bg-image style-satu-v2 color-satu">
                <div class="text-center niconne">
                    <div class="d-flex justify-content-center">
                        <div class="col-lg-8">
                            <div class="gallery">
                                <img class="" src="{{ asset('template/image/aksen.png') }}" width="100" alt="">
                                <h3 class="display-4">Gallery</h3>

                                <div class="row my-5">
                                    <div class="col-lg-4">
                                        <img src="{{ asset('template/image/pic-1.jpg') }}" class="img-thumbnail"
                                            alt="...">
                                    </div>
                                    <div class="col-lg-4">
                                        <img src="{{ asset('template/image/pic-2.jpg') }}" class="img-thumbnail"
                                            alt="...">
                                    </div>
                                    <div class="col-lg-4">
                                        <img src="{{ asset('template/image/pic-3.jpg') }}" class="img-thumbnail"
                                            alt="...">
                                    </div>
                                </div>
                            </div>
                            <div class="my-5"></div>
                            <div class="rsvp">
                                <h3 class="display-3">
                                    Reservasi
                                </h3>
                                <p class="fs-4">Dimohon untuk mengisi form berikut untuk konfirmasi kehadiran</p>

                                <div class="d-flex justify-content-center poppins">
                                    <div class="col-md-10">
                                        <div class="row text-start my-4">
                                            <div class="col-md-6 my-2">
                                                <label for="FormInputNama" class="fs-6">Nama</label>
                                                <input type="text" class="form-control" id="FormInputNama"
                                                    placeholder="Nama anda...">
                                            </div>
                                            <div class="col-md-6 my-2">
                                                <label for="FormInputEmail" class="fs-6">Alamat Email</label>
                                                <input type="email" class="form-control" id="FormInputEmail"
                                                    placeholder="Email anda..">
                                            </div>
                                        </div>
                                        <div class="d-grid my-3">
                                            <button class="btn btn-primary" type="button">Saya akan hadir</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="aksen5" class="bg-image style-satu-v2 color-satu">
                <div class="text-center niconne">
                    <div class="d-flex justify-content-center">
                        <div class="col-lg-8">
                            <div class="ucapan my-5">
                                <h3 class="display-3">
                                    Ucapan Untuk Mempelai
                                </h3>
                                <p class="fs-4">Berikan ucapan dan doa restu</p>
                                <div class="d-flex justify-content-center poppins">
                                    <div class="col-md-10">
                                        <div class="row text-start my-4">
                                            <div class="col-md-6 my-2">
                                                <label for="FormInputNama" class="fs-6">Nama</label>
                                                <input type="text" class="form-control" id="FormInputNama"
                                                    placeholder="Nama anda...">
                                            </div>
                                            <div class="col-md-6 my-2">
                                                <label for="FormInputEmail" class="fs-6">Alamat Email</label>
                                                <input type="email" class="form-control" id="FormInputEmail"
                                                    placeholder="Email anda..">
                                            </div>
                                            <div class="col-md-12 my-2">
                                                <label for="FormInputEmail" class="fs-6">Ucapan & Doa untuk
                                                    mempelai</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1"
                                                    rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="d-grid my-3">
                                            <button class="btn btn-primary" type="button">Kirim Ucapan</button>
                                        </div>

                                        <div class="komen text-start mt-5">
                                            <div class="list-group">
                                                <a href="#" class="list-group-item list-group-item-action p-4"
                                                    aria-current="true">
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <h5 class="mb-1">Jamal N Friends</h5>
                                                        <small>3 days ago</small>
                                                    </div>
                                                    <p class="mt-3 mb-1">Some placeholder content in a paragraph.</p>
                                                </a>
                                                <a href="#" class="list-group-item list-group-item-action p-4"
                                                    aria-current="true">
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <h5 class="mb-1">Jamal N Friends</h5>
                                                        <small>3 days ago</small>
                                                    </div>
                                                    <p class="mt-3 mb-1">Some placeholder content in a paragraph.</p>
                                                </a>
                                                <a href="#" class="list-group-item list-group-item-action p-4"
                                                    aria-current="true">
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <h5 class="mb-1">Jamal N Friends</h5>
                                                        <small>3 days ago</small>
                                                    </div>
                                                    <p class="mt-3 mb-1">Some placeholder content in a paragraph.</p>
                                                </a>
                                                <a href="#" class="list-group-item list-group-item-action p-4"
                                                    aria-current="true">
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <h5 class="mb-1">Jamal N Friends</h5>
                                                        <small>3 days ago</small>
                                                    </div>
                                                    <p class="mt-3 mb-1">Some placeholder content in a paragraph.</p>
                                                </a>
                                            </div>
                                            <div class="d-grid my-3">
                                                <button class="btn btn-primary" type="button">Lihat Semua</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End: Gallery & RSVP & Ucapan -->

        <div class="style-dua-v2 py-5 poppins">
            <!-- Protokol -->
            <div class="row" style="padding-bottom: 75px;">
                <div class="col-lg-10 offset-lg-1">
                    <div class="my-5 text-center">
                        <h1>Aturan Protokol Kesehatan</h1>
                    </div>
                    <div class="row text-center">
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <img src="{{ asset('admin-bsb/images/protokol-1.png') }}" alt="protokol1">
                            <p class="mt-2">Menggunakan Masker</p>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <img src="{{ asset('admin-bsb/images/protokol-2.png') }}" alt="protokol2">
                            <p class="mt-2">Mencuci Tangan Dengan Sabun</p>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <img src="{{ asset('admin-bsb/images/protokol-3.png') }}" alt="protokol3">
                            <p class="mt-2">Tidak Berjabat Tangan</p>
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
                            <img src="{{ asset('admin-bsb/images/step-1.png') }}" alt="protokol1"><br>
                            <p class="mt-2"><b>Download Aplikasi di Google Playstore</b></p>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <img src="{{ asset('admin-bsb/images/step-2.png') }}" alt="protokol2"><br>
                            <p class="mt-2"><b>Login menggunakan email yang sudah didaftarkan</b></p>
                        </div>
                    </div>
                    <div class="row text-center" style="margin: 45px 0;">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <img src="{{ asset('admin-bsb/images/step-3.png') }}" alt="protokol1"><br>
                            <p class="mt-2"><b>Pilih menu invitation dan pilih undangan</b></p>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <img src="{{ asset('admin-bsb/images/step-4.png') }}" alt="protokol2"><br>
                            <p class="mt-2"><b>Lihat detail undangan mulai dari nama sampai lokasi pernikahan</b></p>
                        </div>
                    </div>
                    <div class="row text-center" style="margin: 45px 0;">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <img src="{{ asset('admin-bsb/images/step-5.png') }}" alt="protokol1"><br>
                            <p class="mt-2"><b>Pilih menu SCAN QR di pojok kanan atas</b></p>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <img src="{{ asset('admin-bsb/images/step-6.png') }}" alt="protokol2" class="img6"><br>
                            <p class="mt-2"><b>Scan QR Code yang telah tersedia di lokasi resepsi</b></p>
                        </div>
                    </div>
                    <div class="row text-center" style="margin: 45px 0;">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <img src="{{ asset('admin-bsb/images/step-7.png') }}" alt="protokol1"><br>
                            <p class="mt-2"><b>Setelah Scan QR kamu bisa langsung memberikan ucapan</b></p>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <img src="{{ asset('admin-bsb/images/step-8.png') }}" alt="protokol2" class="img8"><br>
                            <p class="mt-2"><b>Pilih tombol kamera untuk selfie</b></p>
                        </div>
                    </div>
                    <div class="row text-center" style="margin: 45px 0;">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <img src="{{ asset('admin-bsb/images/step-9.png') }}" alt="protokol1"><br>
                            <p class="mt-2"><b>Pilih template selfie kesukaanmu dan foto</b></p>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <img src="{{ asset('admin-bsb/images/step-10.png') }}" alt="protokol2"><br>
                            <p class="mt-2"><b>Kamu juga bisa share dan simpan foto</b></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Panduan -->
        </div>

        <!-- Footer -->
        <footer class="bg-white poppins">
            <div class="row text-center">
                <div class="col-sm-12 p-4">
                    <p class="m-0">
                        Made by <br>
                        <a href="https://hoofey.id" class="pt-0"><img src="{{ asset('admin-bsb/images/logo.png') }}"
                                alt="hoofeylogo" width="5%" /></a>
                    </p>

                </div>
            </div>
        </footer>
        <!-- End: Footer -->
    </div>
</body>

<!-- Scripts -->
<script type="text/javascript" src="{{ asset('template-1/js/jquery-3.1.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('template-1/js/bootstrap.bundle.js') }}"></script>
<script type="text/javascript" src="{{ asset('template-1/js/levidio.js') }}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- Countdown script -->
<script>
    (function() {
        const second = 1000,
            minute = second * 60,
            hour = minute * 60,
            day = hour * 24;

        let wedding =
            "{{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('M d Y') }} {{ \Carbon\Carbon::parse($event->jam_mulai_ijab)->format('H:i') }}",
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
<script>
    AOS.init();
</script>

</html>
