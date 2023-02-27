<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Undangan Website Pernikahan">
    <meta property="og:title"
        content="WEDDING OF {{ $event->nama_panggilan_mempelai_wanita }} & {{ $event->nama_panggilan_mempelai_pria }}" />
    <meta property="og:url" content="{{ route('see.event', ['slug' => $event->slug]) }}" />
    @if ($photo_event != null)
        <meta property="og:image" content="{{ asset($photo_event[0]['path']) }}">
        <meta property="og:image:size" content="300" />
    @endif
    <meta property="og:description" content="{{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('d M Y') }}">

    <meta property="og:image:type" content="image/jpeg" />

    <title>Hoofey - Wedding of {{ $event->nama_panggilan_mempelai_wanita }} &
        {{ $event->nama_panggilan_mempelai_pria }}
    </title>

    <link rel="icon" type="image/png" href="http://wedding.test/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="http://wedding.test/favicon-16x16.png" sizes="16x16" />

    <!-- SCRIPT -->
    <script src="{{ asset('src/jquery.js') }}"></script>
    <script src="{{ asset('plugin/selectize/dist/js/standalone/selectize.min.js') }}"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Playfair+Display:wght@400;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('plugin/selectize/dist/css/selectize.default.css') }}">
    <link rel="stylesheet" href="{{ asset('plugin/flexbin/flexbin.css') }}" media="all">
    <link rel="stylesheet" href="{{ asset('plugin/aos/dist/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('plugin/lightgallery/dist/css/lightgallery.css') }}">

    <link rel="stylesheet" href="{{ asset('template-1/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('src/universal.css') }}">
    <link rel="stylesheet" href="{{ asset('src/template/global.css') }}">
    <link rel="stylesheet" href="{{ asset('src/template/navy.css') }}">

    <link rel="stylesheet" href="{{ asset('plugin/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('plugin/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('plugin/modal-video/css/modal-video.min.css') }}">

</head>

<body class="juwita navy" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="0">
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

        .white-box {
            width: 500px;
            height: 100px;
            margin-top: 50px;
            margin-left: auto;
            margin-right: auto;

            background: rgba(255, 255, 255, 0.3);
            padding: 30px;
            -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.15);
            -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.15);
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.15);
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            -ms-border-radius: 5px;
            -o-border-radius: 5px;
            border-radius: 5px;
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
        Snowflake.prototype.update = function() {
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

    <!-- Top Cover -->
    <section class="top-cover">

        <div class="inner">
            <div class="details">
                <div>
                    <div class="text-02" data-aos="fade-up" data-aos-duration="700" data-aos-delay="700">
                        Official Wedding Invitation
                    </div>
                    <div class="text-01" data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="500">
                        {{ $event->nama_panggilan_mempelai_wanita }} & {{ $event->nama_panggilan_mempelai_pria }}
                    </div>
                    @if (app('request')->input('invite'))
                        <div class="text-02" data-aos="fade-up" data-aos-duration="700" data-aos-delay="700">
                            Turut mengundang Bapak/Ibu/Saudara/i
                        </div>
                        <div class="text-01" data-aos="fade-up" data-aos-duration="700" data-aos-delay="700">
                            {{ app('request')->input('invite') }}
                        </div>
                    @else
                        <div class="text-02" data-aos="fade-up" data-aos-duration="700" data-aos-delay="700">
                            Sesuai dengan Instruksi Menteri Dalam Negeri Nomor 39 Tahun 2021 khusunya terkait dengan
                            pembatasan kapasitas pada resepsi pernikahan, maka tanpa mengurangi rasa hormat dengan ini
                            kami memberitahukan bahwa acara hanya dihadiri oleh keluarga dan kerabat terdekat.
                        </div>
                        <div class="text-02" data-aos="fade-up" data-aos-duration="700" data-aos-delay="700"
                            style="margin-top: 15px;">
                        </div>
                        <div class="text-02" data-aos="fade-up" data-aos-duration="700" data-aos-delay="700">
                            Namun kami berharap agar sedianya Bapak/Ibu/Saudara/i berkenan memberikan restu dan doa baik
                            kepada kami.
                        </div>
                    @endif
                </div>
                <div>
                    <div data-aos="fade-up" data-aos-duration="1200" data-aos-delay="900">
                        <a href="javascript:;" onclick="startTheJourney()" class="link-01">Start The Journey</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="cover-show" id="top-cover-banner" data-aos="zoom-in" data-aos-duration="1200"
            data-aos-delay="200">
        </div>
        <section class="effects chindy juwita" data-aos="zoom-out" data-aos-duration="1500" data-aos-delay="750">
            <div><img src="{{ asset('template-6/images/template/effects/juwita/flower-01.png') }}" alt=""></div>
            <div><img src="{{ asset('template-6/images/template/effects/juwita/flower-02.png') }}" alt=""></div>
            <div><img src="{{ asset('template-6/images/template/effects/juwita/flower-03.png') }}" alt=""></div>
            <div><img src="{{ asset('template-6/images/template/effects/juwita/flower-04.png') }}" alt=""></div>
            <div><img src="{{ asset('template-6/images/template/effects/juwita/flower-02.png') }}" alt=""></div>
            <div><img src="{{ asset('template-6/images/template/effects/juwita/flower-04.png') }}" alt=""></div>
            <div><img src="{{ asset('template-6/images/template/effects/juwita/flower-01.png') }}" alt=""></div>
            <div><img src="{{ asset('template-6/images/template/effects/juwita/flower-02.png') }}" alt=""></div>
            <div><img src="{{ asset('template-6/images/template/effects/juwita/flower-03.png') }}" alt=""></div>
            <div><img src="{{ asset('template-6/images/template/effects/juwita/flower-04.png') }}" alt=""></div>
        </section>

    </section>
    <!-- COVER -->
    <section class="cover">
        <div class="cover-inner">
            <div class="cover-greet">
                <div>
                </div>
                <div>
                    <p data-aos="fade-down" data-aos-duration="1000">Wedding Invitation</p>
                </div>
            </div>
            <div class="cover-wrapper">
                <div class="cover-picture">
                    <div class="cover-show" id="cover-real" data-aos="zoom-in" data-aos-duration="1500"
                        data-aos-delay="1000">
                    </div>
                </div>
                <div class="cover-bridegroom">
                    <div>
                        <p class="date" data-aos="zoom-in-left" data-aos-duration="1000">
                            {{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM, Y') }}</p>
                        <h1 data-aos="zoom-in-up" data-aos-duration="1000">
                            {{ $event->nama_panggilan_mempelai_wanita }} &
                            {{ $event->nama_panggilan_mempelai_pria }}
                        </h1>
                    </div>
                    <div data-aos="fade-up" data-aos-duration="1000">
                        <a href="#rsvp">RSVP</a>
                    </div>
                </div>
            </div>

            <div class="cover-show" id="cover-banner" data-aos="zoom-out" data-aos-duration="1000"
                data-aos-delay="700"></div>
            <div class="orn bg-cover-01" data-aos="fade-down" data-aos-duration="1000"></div>
            <div class="orn bg-cover-02" data-aos="fade-right" data-aos-duration="1000"></div>
            <div class="orn orn-02" data-aos="fade-left" data-aos-duration="1000"></div>
        </div>
    </section>

    <!-- GREETINGS -->
    @if (app('request')->input('invite'))
        <section class="greetings">
            <div>
                <p data-aos="fade-left" data-aos-duration="1000">Hi!</p>
                <h1 data-aos="zoom-out-up" data-aos-duration="1000">{{ app('request')->input('invite') }}</h1>
                <p data-aos="fade-right" data-aos-duration="1000">you're invited to our wedding ceremony</p>
            </div>
        </section>
    @endif

    <!-- BRIDEGROOM -->
    <section class="bridegroom">
        <div class="bridegroom-inner">
            <div class="head" data-aos="fade-up">
                <h1 data-aos="fade-up" data-aos-duration="1000">بِسْمِ ٱللَّهِ ٱلرَّحْمَـٰنِ ٱلرَّحِيمِ</h1>
                <!-- <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">We cordially request your prayers and best wishes on our marriage </p> -->
            </div>

            <div class="body ">
                <div class="groom">
                    @if ($event->avatar_wanita != null)
                        <div class="bridegroom-border" data-aos="zoom-in" data-aos-duration="1200"
                            data-aos-once="false">
                            <img class="bridegroom-picture" data-aos="fade-left" data-aos-duration="1000"
                                data-aos-once="false"
                                src="{{ asset('admin/assets/images/wanita/' . $event->order->invoice . '/' . $event->avatar_wanita) }}"
                                alt="">
                        </div>
                    @endif
                    <div class="bridegroom-details">
                        <h1 data-aos="fade-up-left" data-aos-duration="1000" data-aos-delay="150">
                            {{ $event->nama_lengkap_mempelai_wanita }}
                        </h1>
                        <p data-aos="fade-up-left" data-aos-duration="1000" data-aos-delay="300">
                            {{ $event->bio_mempelai_wanita }}
                        </p>
                        <p class="bio" data-aos="fade-up-left" data-aos-duration="1000" data-aos-delay="450">
                        </p>

                    </div>
                </div>
                <div class="bridegroom-separator" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="500">
                    &amp;</div>
                <div class="bride">
                    @if ($event->avatar_pria != null)
                        <div class="bridegroom-border" data-aos="zoom-in" data-aos-duration="1000"
                            data-aos-once="false">
                            <img class="bridegroom-picture" data-aos="fade-right" data-aos-duration="1000"
                                data-aos-once="false"
                                src="{{ asset('admin/assets/images/pria/' . $event->order->invoice . '/' . $event->avatar_pria) }}"
                                alt="">
                        </div>
                    @endif
                    <div class="bridegroom-details">
                        <h1 data-aos="fade-up-right" data-aos-duration="1000" data-aos-delay="150">
                            {{ $event->nama_lengkap_mempelai_pria }}
                        </h1>
                        <p data-aos="fade-up-right" data-aos-duration="1000" data-aos-delay="300">
                            {{ $event->bio_mempelai_pria }}
                        </p>
                        <p class="bio" data-aos="fade-up-right" data-aos-duration="1000"
                            data-aos-delay="450"></p>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SAVE THE DATE -->
    <section class="save-date">
        <div class="save-date-inner">
            <div class="save-date-title">
                <h1 data-aos="zoom-out-up" data-aos-duration="1000">Save The Date</h1>
                <p data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="250">
                    {{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM, Y') }}</p>
            </div>
            <div class="separator">
                <div class="orn orn-03" data-aos="flip-right" data-aos-duration="3000"></div>
            </div>
            <div class="schedule">
                <div class="countdown">
                    <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="450">
                        <h1 id="days">0</h1>
                        <small>Hari</small>
                    </div>
                    <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="250">
                        <h1 id="hours">0</h1>
                        <small>Jam</small>
                    </div>
                    <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        <h1 id="minutes">0</h1>
                        <small>Menit</small>
                    </div>
                    <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="550">
                        <h1 id="seconds">0</h1>
                        <small>Detik</small>
                    </div>
                </div>
            </div>
            <div class="foot" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
                <a href="http://www.google.com/calendar/render?action=TEMPLATE&amp;text={{ $event->nama_panggilan_mempelai_wanita }}+%26+{{ $event->nama_panggilan_mempelai_pria }}+Wedding&amp;dates={{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('Ymd') }}T{{ \Carbon\Carbon::parse($event->jam_mulai_ijab)->format('His') }}/{{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('Ymd') }}T{{ \Carbon\Carbon::parse($event->jam_selesai_ijab)->format('His') }}&amp;location={{ $event->lokasi_ijab }}&amp;details=Hai+You%27re+invited+to+our+wedding+ceremony+%7C+{{ $event->nama_panggilan_mempelai_wanita }}+%26+{{ $event->nama_panggilan_mempelai_pria }}+Wedding+%7C+{{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('dddd') }}%2C+{{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM Y') }}"
                    target="_blank" rel="nofollow" class="link-01">Add to Calendar</a>
            </div>
        </div>
    </section>

    <!-- WRAPPER GALLERY -->
    <div class="gallery-wrapper">
        <!-- GALLERY -->
        @if ($photo_event != null)
            <section class="gallery">
                <div class="title">
                    <h1 data-aos="zoom-out-up" data-aos-duration="1000">Our Memories</h1>
                    <p data-aos="fade-up" data-aos-duration="1000">A successful marriage requires falling in love many
                        times, always with the same person</p>
                </div>
                <div class="flexbin" id="lightGallery">
                    @foreach ($photo_event as $gallery)
                        <a href="{{ asset($gallery['path']) }}" target="_blank" data-aos="zoom-in"
                            data-aos-duration="1000">
                            <img src="{{ asset($gallery['path']) }}" alt="">
                        </a>
                    @endforeach
                </div>
            </section>
        @endif
        <!-- VIDEO GALLERY -->
        @if ($event->link_youtube != null)
            <section class="video-gallery">
                <div class="inner">
                    <div class="title">
                        <h1 data-aos="zoom-out-up" data-aos-duration="1000">Clip of us</h1>
                        <p data-aos="fade-up" data-aos-duration="1000">it’s about finding the right person</p>
                    </div>
                    <div class="video-outer">
                        <div class="video">
                            <div class="preview" data-aos="zoom-in" data-aos-duration="1000">
                                <div class="div" style="display: none">
                                    {!! $event->link_youtube !!}
                                </div>
                                <img src="//img.youtube.com/vi/RmqKBZzPtjM/hqdefault.jpg" alt="">
                                <a class="play-btn" data-video-id="RmqKBZzPtjM"><i class="fas fa-play"></i></a>
                            </div>
                            <div class="title">
                                <h2 data-aos="fade-up" data-aos-duration="1000"></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

    </div>

    <!-- EVENT -->
    <section class="event-outer">
        <div class="event-inner">
            <div class="head">
                <div class="title">
                    <h1 data-aos="zoom-in-up" data-aos-duration="1000">It's Wedding Day</h1>
                    <p data-aos="fade-up" data-aos-duration="1000">True love stands by each other’s side on good days
                        and stands
                        closer on bad days</p>
                </div>
            </div>
            <div class="body">
                <div class="event">
                    <div class="title" data-aos="zoom-in-up" data-aos-duration="1000">
                        <h1 data-aos="zoom-in-left" data-aos-duration="1000">
                            {{ \Carbon\Carbon::parse($event->tanggal_ijab)->format('l') }}, <br>
                            {{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM Y') }}
                        </h1>
                    </div>
                    <div class="activities">
                        <div class="activity">
                            <div class="title">
                                <img class="orn orn-party"
                                    src="{{ asset('template-6/images/template/icons/light/01.png') }}" alt=""
                                    data-aos="zoom-in" data-aos-duration="1000">
                                <h1 data-aos="fade-right" data-aos-duration="1000">Akad Nikah</h1>

                                <p class="time" data-aos="zoom-in-up" data-aos-duration="1000">
                                    {{ \Carbon\Carbon::parse($event->jam_mulai_ijab)->format('H:i') }} -
                                    {{ \Carbon\Carbon::parse($event->jam_selesai_ijab)->format('H:i') }} WIB
                                </p>
                            </div>
                            <div class="address" data-aos="zoom-in-up" data-aos-duration="1000">
                                @if ($event->lokasi_ijab != null && $event->lokasi_ijab != $event->lokasi_resepsi)
                                    <div class="address" data-aos="zoom-in-up" data-aos-duration="1000">
                                        <p><strong>{{ $event->lokasi_ijab }}</strong></p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        @if (app('request')->input('invite'))
                            <div class="activity">
                                <div class="title">
                                    <img class="orn orn-party"
                                        src="{{ asset('template-6/images/template/icons/light/02.png') }}" alt=""
                                        data-aos="zoom-in" data-aos-duration="1000">
                                    <h1 data-aos="fade-right" data-aos-duration="1000">Resepsi</h1>

                                    <p class="time" data-aos="zoom-in-up" data-aos-duration="1000">
                                        {{ \Carbon\Carbon::parse($event->jam_mulai_resepsi)->format('H:i') }} -
                                        {{ \Carbon\Carbon::parse($event->jam_selesai_resepsi)->format('H:i') }}
                                    </p>
                                </div>
                                <div class="address" data-aos="zoom-in-up" data-aos-duration="1000">
                                    @if ($event->lokasi_resepsi != null && $event->lokasi_resepsi != $event->lokasi_ijab)
                                        <div class="address" data-aos="zoom-in-up" data-aos-duration="1000">
                                            <p><strong>{{ $event->lokasi_resepsi }}</strong></p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="details">
                        @if ($event->lokasi_resepsi == $event->lokasi_ijab)
                            <div class="address" data-aos="zoom-in-up" data-aos-duration="1000">
                                <p><strong>{{ $event->lokasi_resepsi }}</strong></p>
                            </div>
                        @endif
                        @if ($event->gm_ijab != null)
                            <div data-aos="fade-down" data-aos-duration="1000">
                                {!! $event->gm_ijab !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- RESERVATION -->
    <div class="wrapper-01">
        <!-- RESERVATION -->
        @if (app('request')->input('invite'))
            <section class="rsvp" id="rsvp">
                <div class="rsvp-inner come">
                    <div class="rsvp-confirm">
                        <h1>RSVP</h1>
                        <form action="{{ route('attending', ['id' => $event->id]) }}" autocomplete="off"
                            method="POST" class="comment-form" style="margin-top: 20px;">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" value="" placeholder="Nama Anda"
                                    required>
                                <input type="email" name="email" class="form-control" value=""
                                    placeholder="Email Anda" required>
                            </div>
                            <button type="submit" class="change-confirmation" data-aos="fade-up"
                                data-aos-duration="1000" class="send-comment">I'm Attending</button>
                        </form>
                    </div>
                </div>
            </section>
        @endif
        <!-- LIVE STREAMING -->
        @if (isset($event->link_livestreaming))
            <section class="live-streaming">
                <div class="inner">
                    <div class="head">
                        <h1>Live Streaming</h1>
                        <p>Please join and watch us become husband & wife on</p>
                    </div>
                    <div class="body">
                        <div class="streaming-info">
                            <div class="link">
                                <a href="{{ $event->link_livestreaming }}" target="_blank">Zoom</a>
                            </div>
                        </div>
                    </div>
                    <div class="orn orn-05" data-aos="zoom-in-up" data-aos-duration="1000"></div>
                </div>
            </section>
        @endif
    </div>

    <!-- COMMENT -->
    <section class="comment-outer">
        @if((count($event->angpao) > 0))
            <div class="comment-inner">
                <div class="head">
                    <h1 data-aos="fade-up" data-aos-duration="1000">Kado Pernikahan</h1>
                    <p data-aos="zoom-in-up" data-aos-duration="1000">Silahkan klik tombol dibawah ini untuk mengirimkan
                        hadiah secara online untuk kami</p>
                </div>

                @forelse ($event->angpao as $angpao)
                    <div class="col-lg-6 col-md-6">
                        <span>{{ $angpao->nama_bank ?? '' }}</span> - <span>{{ $angpao->no_rekening ?? '' }}</span>
                        <p>an. {{ $angpao->nama_penerima ?? '' }}</p>
                    </div>
                @empty
                @endforelse
                {{-- <h5 data-aos="fade-up" data-aos-duration="1000">Konfirmasi Kado Pernikahan</h5> --}}
                <a href="https://api.whatsapp.com/send?phone={{ $event->order->customer_phone }}&text=Hai {{ $event->nama_panggilan_mempelai_pria }}, aku udah transfer nih ke {{ $angpao->nama_bank ?? '' }} atas nama {{ $angpao->nama_penerima ?? '' }}. Selamat yah!"
                    data-aos="fade-up" data-aos-duration="1000" id="confirm_kado" target="_blank"
                    class="btn btn-primary">Konfirmasi</a>


            </div>
        @endif

        <div class="comment-inner">
            <div class="head">
                <h1 data-aos="fade-up" data-aos-duration="1000">Wedding Wish</h1>
                <p data-aos="zoom-in-up" data-aos-duration="1000">Thanks for all the wedding wishes! You made a great
                    day even
                    greater!</p>

            </div>
            <form action="{{ route('wishes', ['id' => $event->id]) }}" autocomplete="off" method="POST"
                class="comment-form">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" class="form-control" value="" placeholder="Nama Anda" required>
                    <input type="email" name="email" class="form-control" value="" placeholder="Email Anda" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="text" rows="1" placeholder="Write something..." style="max-height: 350px;"
                        data-aos="fade-down" data-aos-duration="1000"></textarea>
                </div>
                <button type="submit" data-aos="fade-up" data-aos-duration="1000" class="send-comment">Send</button>
            </form>

            <div class="comments">
                <!-- COMMENTS -->
                @foreach ($data_guestbook as $guestbook)
                    <div class="comment aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                        <div class="comment-head" data-aos="fade-up" data-aos-duration="1000">
                            <p><strong>{{ $guestbook->user->name }}</strong></p>
                        </div>
                        <div class="comment-body" data-aos="fade-up" data-aos-duration="1000">
                            <p>{{ $guestbook->text }}</p>
                        </div>
                        <div class="comment-foot" data-aos="fade-up" data-aos-duration="1000">
                            <small>{{ \Carbon\Carbon::parse($guestbook->created_at)->format('l, M d Y') }}</small>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="foot" data-aos="fade-up" data-aos-duration="1000">

            </div>
        </div>
    </section>

    <!-- FOOT WRAPPER -->
    <div class="foot-wrapper">

        <!-- QUOTE END -->
        <section class="quote-end">
            <div class="quote-end-inner" data-aos="fade-up" data-aos-duration="1000">
                <p>
                    "And one of His signs is that He has created for you,spouses from amongst yourselves so that you
                    might take
                    comfort in them and He has placed between you, love and mercy. In this there is surely evidence (of
                    the
                    truth)
                    for the people who carefully think.<br />
                    <br />
                    (Ar-Rum: 21)"
                </p>
            </div>
        </section>
        <!-- FOOTNOTE -->
        <section class="footnote">
            <div class="footnote-inner">
                <p data-aos="zoom-out-up" data-aos-duration="1000">
                    {{ \Carbon\Carbon::parse($event->tanggal_ijab)->isoFormat('D MMMM, Y') }}
                </p>
                <h1 data-aos="zoom-in" data-aos-duration="1000">{{ $event->nama_panggilan_mempelai_wanita }} &
                    {{ $event->nama_panggilan_mempelai_pria }}
                </h1>
            </div>
        </section>

        <div class="orn orn-06"></div>

    </div>

    <!-- Panduan Penggunaan APlikasi -->
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

    <!-- FOOTER -->
    <section class="footer">
        <div class="footer-inner">
            <p>Powered by</p>
            <img src="{{ asset('admin-bsb/images/logo.png') }}" alt="">
        </div>
    </section>

    @if ($event->audio_id != null)
        <section class="music-outer" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
            <div class="music-box" id="music-box"></div>
        </section>
    @endif

    <!-- ALERT -->
    <!--  <div class="alert" id="alert">
    <div class="alert-text"></div>
    <div class="alert-close fas fa-times"></div>
  </div> -->

    <!-- MODAL -->
    <div id="modal" class="modal modal-center"></div>

    <!-- SCRIPT -->
    <script src="{{ asset('plugin/modal-video/js/jquery-modal-video.min.js') }}"></script>
    <script src="{{ asset('plugin/slick/slick.min.js') }}"></script>
    <script src="{{ asset('plugin/aos/dist/aos.js') }}"></script>
    <script src="{{ asset('plugin/lightgallery/dist/js/lightgallery.min.js') }}"></script>

    <script>
        @if ($event->audio_id != null)
            window.BACKGROUND_MUSIC = "{{ asset('admin/assets/audio/' . $event->audio->path ?? '') }}";
        @endif

        const img_cover = [];
        const img_picture = [];
        @foreach ($photo_event as $gallery)
            img_cover.push(`<div class="picture-outer desktop"><img src="{{ asset($gallery['path']) }}" alt=""
                    class="picture">
            </div>`);
            img_picture.push(`<div class="picture-outer mobile"><img src="{{ asset($gallery['path']) }}" alt=""
                    class="picture"> </div>`)
        @endforeach

        window.DESKTOP_COVERS = img_cover;

        window.MOBILE_COVERS = img_picture;

        window.COVERS = ['#cover-real', '#cover-banner'];

        window.DESKTOP_OPENING_COVERS = img_cover;

        window.MOBILE_OPENING_COVERS = img_picture;

        window.OPENING_COVERS = ['#top-cover-banner'];

        const image = document.querySelector(".preview img");
        const button = document.querySelector(".preview .play-btn");
        const yt_id = document.querySelector("iframe").src.match(/youtube\.com.*(\?v=|\/embed\/)(.{11})/).pop();
        if (yt_id.length == 11) {
            image.setAttribute("src", `//img.youtube.com/vi/${yt_id}/0.jpg`);
            button.setAttribute("data-video-id", yt_id);
        }
    </script>

    <script src="{{ asset('src/template/template.js') }}"></script>

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
        $(document).ready(function() {
            // Send a request when the button is clicked
            $(".button").click(function() {

                $.ajax('https://api.whatsapp.com/send?phone=' + document.getElementById('phone'), {
                    data: JSON.stringify({
                        phone: $('input[name="phone"]').val(),
                        body: `Nama Pengirim: ${$('input[name="nama_pengirim"]').val()}\n` +
                            `Nominal: ${$('input[name="jumlah_nominal"]').val()}\n` +
                            `Bank Penerima: ${$('input[name="tujuan_bank"]').val()}\n`
                    }),
                    contentType: 'application/json',
                    type: 'POST'
                });
            });
        });
    </script>

</body>

</html>
