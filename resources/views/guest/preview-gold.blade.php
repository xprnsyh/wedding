<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hoofey - Wedding of {{$event->nama_panggilan_mempelai_wanita}} & {{$event->nama_panggilan_mempelai_pria}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="Undangan Website Pernikahan">
    <meta property="og:title" content="WEDDING OF {{$event->nama_panggilan_mempelai_wanita }} & {{$event->nama_panggilan_mempelai_pria }}" />
    <meta property="og:url" content="{{route('see.event',[ 'slug' => $event->slug])}}" />
    @if($photo_event != null)
    <meta property="og:image" content="{{asset($photo_event[0]['path'])}}">
    <meta property="og:image:size" content="300" />
    @endif
    <meta property="og:description" content="{{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('d M Y')}}">

    <meta property="og:image:type" content="image/jpeg" />


    <link rel="icon" type="image/png" href="{{asset('favicon-32x32.png')}}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{asset('favicon-16x16.png')}}" sizes="16x16" />

    <link rel="stylesheet" href="{{asset('template-1/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('template-1/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('template-1/css/custom.css')}}">
</head>

<body class="boxed">
    @if($event->audio_id != null)
    <audio autoplay hidden loop>
        <source src="{{asset('admin/assets/audio/' . $event->audio->path ?? '')}}" type="audio/mpeg">
    </audio>
    @endif

          <style>
        #snowflakeContainer {
          position: absolute;
          left: 0px;
          top: 0px;
          display: none;
        }

        .snowflake {
          position: fixed;
          background-color: #CCC;
          user-select: none;
          z-index: 1000;
          pointer-events: none;
          border-radius: 50%;
          width: 10px;
          height: 10px;
        }
      </style>

          <div id="snowflakeContainer">
            <span class="snowflake"></span>
          </div>

      <script>
        // Array to store our Snowflake objects
        var snowflakes = [];

        // Global variables to store our browser's window size
        var browserWidth;
        var browserHeight;

        // Specify the number of snowflakes you want visible
        var numberOfSnowflakes = 50;

        // Flag to reset the position of the snowflakes
        var resetPosition = false;

        // Handle accessibility
        var enableAnimations = false;
        var reduceMotionQuery = matchMedia("(prefers-reduced-motion)");

        // Handle animation accessibility preferences
        function setAccessibilityState() {
          if (reduceMotionQuery.matches) {
            enableAnimations = false;
          } else {
            enableAnimations = true;
          }
        }
        setAccessibilityState();

        reduceMotionQuery.addListener(setAccessibilityState);

        //
        // It all starts here...
        //
        function setup() {
          if (enableAnimations) {
            window.addEventListener("DOMContentLoaded", generateSnowflakes, false);
            window.addEventListener("resize", setResetFlag, false);
          }
        }
        setup();

        //
        // Constructor for our Snowflake object
        //
        function Snowflake(element, speed, xPos, yPos) {
          // set initial snowflake properties
          this.element = element;
          this.speed = speed;
          this.xPos = xPos;
          this.yPos = yPos;
          this.scale = 1;

          // declare variables used for snowflake's motion
          this.counter = 0;
          this.sign = Math.random() < 0.5 ? 1 : -1;

          // setting an initial opacity and size for our snowflake
          this.element.style.opacity = (.1 + Math.random()) / 3;
        }

        //
        // The function responsible for actually moving our snowflake
        //
        Snowflake.prototype.update = function () {
          // using some trigonometry to determine our x and y position
          this.counter += this.speed / 5000;
          this.xPos += this.sign * this.speed * Math.cos(this.counter) / 40;
          this.yPos += Math.sin(this.counter) / 40 + this.speed / 30;
          this.scale = .5 + Math.abs(10 * Math.cos(this.counter) / 20);

          // setting our snowflake's position
          setTransform(Math.round(this.xPos), Math.round(this.yPos), this.scale, this.element);

          // if snowflake goes below the browser window, move it back to the top
          if (this.yPos > browserHeight) {
            this.yPos = -50;
          }
        }

        //
        // A performant way to set your snowflake's position and size
        //
        function setTransform(xPos, yPos, scale, el) {
          el.style.transform = `translate3d(${xPos}px, ${yPos}px, 0) scale(${scale}, ${scale})`;
        }

        //
        // The function responsible for creating the snowflake
        //
        function generateSnowflakes() {

          // get our snowflake element from the DOM and store it
          var originalSnowflake = document.querySelector(".snowflake");

          // access our snowflake element's parent container
          var snowflakeContainer = originalSnowflake.parentNode;
          snowflakeContainer.style.display = "block";

          // get our browser's size
          browserWidth = document.documentElement.clientWidth;
          browserHeight = document.documentElement.clientHeight;

          // create each individual snowflake
          for (var i = 0; i < numberOfSnowflakes; i++) {

            // clone our original snowflake and add it to snowflakeContainer
            var snowflakeClone = originalSnowflake.cloneNode(true);
            snowflakeContainer.appendChild(snowflakeClone);

            // set our snowflake's initial position and related properties
            var initialXPos = getPosition(50, browserWidth);
            var initialYPos = getPosition(50, browserHeight);
            var speed = 5 + Math.random() * 40;

            // create our Snowflake object
            var snowflakeObject = new Snowflake(snowflakeClone,
              speed,
              initialXPos,
              initialYPos);
            snowflakes.push(snowflakeObject);
          }

          // remove the original snowflake because we no longer need it visible
          snowflakeContainer.removeChild(originalSnowflake);

          moveSnowflakes();
        }

        //
        // Responsible for moving each snowflake by calling its update function
        //
        function moveSnowflakes() {

          if (enableAnimations) {
            for (var i = 0; i < snowflakes.length; i++) {
              var snowflake = snowflakes[i];
              snowflake.update();
            }
          }

          // Reset the position of all the snowflakes to a new value
          if (resetPosition) {
            browserWidth = document.documentElement.clientWidth;
            browserHeight = document.documentElement.clientHeight;

            for (var i = 0; i < snowflakes.length; i++) {
              var snowflake = snowflakes[i];

              snowflake.xPos = getPosition(50, browserWidth);
              snowflake.yPos = getPosition(50, browserHeight);
            }

            resetPosition = false;
          }

          requestAnimationFrame(moveSnowflakes);
        }

        //
        // This function returns a number between (maximum - offset) and (maximum + offset)
        //
        function getPosition(offset, size) {
          return Math.round(-1 * offset + Math.random() * (size + 2 * offset));
        }

        //
        // Trigger a reset of all the snowflakes' positions
        //
        function setResetFlag(e) {
          resetPosition = true;
        }
      </script>

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
                    <p class="mb-0 logo bold italic float-left">{{strtoupper($event->nama_panggilan_mempelai_wanita)}} & {{strtoupper($event->nama_panggilan_mempelai_pria)}} <br> WEDDING</p>
                </div>
                <div class="col-md-7 col-sm-7 col-7 text-right my-auto">
                    <div class="share">
                        share
                        <span class="separator"></span>
                        <span class="share-social">
                            <a href="https://www.facebook.com/sharer.php?u=https://hoofey.id/{{$event->slug}}" target="_blank">
                                <img src="{{asset('template-1/img/icons/facebook.png')}}" alt="">
                            </a>
                            <a href="https://twitter.com/share?url=https://hoofey.id/{{$event->slug}}&amp;text=SOME_TEXT&amp;hashtags=HASHTAGS" target="_blank">
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
                        <h1 class="font--2 color--white ">{{$event->nama_panggilan_mempelai_wanita}}</h1>
                        <h1 class="font--2 color--white ">& </h1>
                        <h1 class="font--2 color--white ">{{$event->nama_panggilan_mempelai_pria}}</h1>
                        <br>
                        <h6 class="header--date text-uppercase bold italic spacing--1">{{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('M d Y')}}</h6>
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
                            @if($event->avatar_wanita != null)
                            <div class="photo groom">
                                <img src="{{asset($event->avatar_wanita)}}" alt="">
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-lg-8 offset-lg-2">
                                    <div class="title">
                                        <h3 class="mb-0 color--midnight font--2">{{$event->nama_lengkap_mempelai_wanita}}</h3>

                                    </div>
                                    <p class="italic mb-4">{{$event->bio_mempelai_wanita}}</p>
                                    <a href="https://instagram.com" target="_blank">
                                        <img class="social" src="{{asset('template-1/img/instagram.png')}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="center--line"></div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-6 text-center">
                            @if($event->avatar_pria != null)
                            <div class="photo groom">
                                <img src="{{asset($event->avatar_pria)}}" alt="">
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-lg-8 offset-lg-2">
                                    <div class="title">
                                        <h3 class="mb-0 color--midnight font--2">{{$event->nama_lengkap_mempelai_pria}}</h3>

                                    </div>
                                    <p class="italic mb-4">{{$event->bio_mempelai_pria}}</p>
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
                    @if($event->link_youtube != null)
                    <div class="video">
                        {!!$event->link_youtube!!}
                    </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="date--wrapper">
                        <div class="date--content text-center">
                            <div class="dot"></div>
                            <h5 class="italic">Dengan memanjatkan puji syukur serta memohon ridho dan rahmat
                                Allah Subhanahu Wa Ta'ala, kami bermaksud menyelenggarakan resepsi pernikahan Putra-Putri kami yang InshaAllah
                                akan diselenggarakan pada
                            </h5>
                            <div class="title">
                                <h1 class="font--3 color--orange">{{ \Carbon\Carbon::parse($event->tanggal_ijab)->dayName}}</h1>
                                <p class="bold italic text-uppercase color--orange wedding--date">{{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('M d Y')}}</p>
                            </div>
                        </div>
                        <div class="hr--line"></div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-6">
                                <div class="date--content content--sm text-center">
                                    <h3 class="font--3 color-orange">Akad Nikah</h3>
                                    <img src="{{asset('template-1/img/time.svg')}}" alt="" class="date--img">
                                    <p class="bold italic">{{ \Carbon\Carbon::parse($event->jam_mulai_ijab)->format('H:i')}} - {{ \Carbon\Carbon::parse($event->jam_selesai_ijab)->format('H:i')}} WIB</p>
                                </div>
                                <div class="vr--line"></div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-6">
                                <div class="date--content content--sm text-center">
                                    <h3 class="font--3 color-orange">Resepsi</h3>
                                    <img src="{{asset('template-1/img/time.svg')}}" alt="" class="date--img">
                                    <p class="bold italic">{{ \Carbon\Carbon::parse($event->jam_mulai_resepsi)->format('H:i')}} - {{ \Carbon\Carbon::parse($event->jam_selesai_resepsi)->format('H:i')}} WIB</p>
                                </div>
                            </div>
                            <div class="hr--line"></div>
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="date--content content--sm text-center">
                                    <h3 class="font--3 color-orange">Lokasi</h3>
                                    <img src="{{asset('template-1/img/location.svg')}}" alt="" class="date--img">
                                    <p class="bold italic">{{$event->lokasi_ijab}}</p>
                                </div>
                                <div class="vr--line"></div>
                            </div>
                            <div class="hr--line"></div>
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="date--content text-center" style="padding:25px;">
                                    <h3 class="font--3 color-orange">Countdown to Our Wedding Day</h3>
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
            </div>
        </div>
    </section>
    <!-- End: Date -->

    <!-- Gallery & RSVP -->
    <section id="gallery-rsvp">
        <div class="container">
            <div class="divider"></div>

            <!-- Gallery -->
            @if($photo_event != null)
            <div id="gallery">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="row">
                            @foreach($photo_event as $gallery)
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="picture">
                                    <div class="thumb">
                                        <img src="{{asset($gallery['path'])}}">
                                    </div>
                                    <!-- <div class="overlay">
                                        <div class="caption">
                                            <h4 class="text-uppercase bold italic">{{ \Carbon\Carbon::parse($gallery['date'])->format('M, d Y')}}</h4>
                                            <p class="bold italic">{{$gallery['name']}}</p>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endif
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
                            <form action="{{route('attending',[ 'id' => $event->id])}}" autocomplete="off" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" placeholder="Your name..." required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Email address..." required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-block btn--rsvp">I am Attending</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @include('layouts.alert')
                    </div>

                </div>
            </div>
            <!-- End: RSVP -->

            <!-- Maps -->
            @if($event->gm_ijab != null)
            <div class="row" style="margin-bottom: 200px;">
                <div class="col-lg-8 offset-lg-2">
                    <div id="maps">
                        {!!$event->gm_ijab!!}
                    </div>
                </div>
            </div>
            @endif
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
            <h3 class="font--2 color--medwhite footer--bride">{{$event->nama_panggilan_mempelai_wanita}} & {{$event->nama_panggilan_mempelai_pria}}</h3>
            <p class="bold italic text-uppercase color--medwhite">{{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('M d Y')}}</p>
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
    (function() {
        const second = 1000,
            minute = second * 60,
            hour = minute * 60,
            day = hour * 24;

        let wedding = "{{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('M d Y')}} {{ \Carbon\Carbon::parse($event->jam_mulai_ijab)->format('H:i')}}",
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
