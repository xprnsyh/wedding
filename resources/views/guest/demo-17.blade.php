<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navy</title>

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

    <link rel="stylesheet" href="{{ asset('src/universal.css') }}">
    <link rel="stylesheet" href="{{ asset('src/template/global.css') }}">
    <link rel="stylesheet" href="{{ asset('src/template/navy.css') }}">

    <link rel="stylesheet" href="{{ asset('plugin/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('plugin/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('plugin/modal-video/css/modal-video.min.css') }}">

</head>

<body class=" juwita navy  " data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="0">
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
    <!-- Top Cover -->
    <section class="top-cover">

        <div class="inner">
            <div class="details">
                <div>
                    <div class="text-01" data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="500">
                        Adam & Hawa </div>
                    <div class="text-02" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="700"></div>
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
            <div><img src="{{ asset('') }}template-navy/media/template/effects/juwita/flower-01.png" alt=""></div>
            <div><img src="{{ asset('') }}template-navy/media/template/effects/juwita/flower-02.png" alt=""></div>
            <div><img src="{{ asset('') }}template-navy/media/template/effects/juwita/flower-03.png" alt=""></div>
            <div><img src="{{ asset('') }}template-navy/media/template/effects/juwita/flower-04.png" alt=""></div>
            <div><img src="{{ asset('') }}template-navy/media/template/effects/juwita/flower-02.png" alt=""></div>
            <div><img src="{{ asset('') }}template-navy/media/template/effects/juwita/flower-04.png" alt=""></div>
            <div><img src="{{ asset('') }}template-navy/media/template/effects/juwita/flower-01.png" alt=""></div>
            <div><img src="{{ asset('') }}template-navy/media/template/effects/juwita/flower-02.png" alt=""></div>
            <div><img src="{{ asset('') }}template-navy/media/template/effects/juwita/flower-03.png" alt=""></div>
            <div><img src="{{ asset('') }}template-navy/media/template/effects/juwita/flower-04.png" alt=""></div>
        </section>

    </section>



    <!-- COVER -->
    <section class="cover">

        <div class="cover-inner">
            <div class="cover-greet">
                <div>
                    <p data-aos="fade-down" data-aos-duration="1000">Wedding Invitation</p>
                    <p data-aos="fade-up" data-aos-duration="1000">#twoDtogether</p>
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
                        <p class="date" data-aos="zoom-in-left" data-aos-duration="1000">December
                            31<sup>st</sup>, 2021</p>
                        <h1 data-aos="zoom-in-up" data-aos-duration="1000">Adam & Hawa</h1>
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

    <!-- BRIDEGROOM -->
    <section class="bridegroom">
        <div class="bridegroom-inner">
            <div class="head" data-aos="fade-up">
                <h1 data-aos="fade-up" data-aos-duration="1000">The Wedding of</h1>
                <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">the pleasure of your company is
                    requested
                </p>
            </div>
            <div class="body ">
                <div class="groom">
                    <div class="bridegroom-border" data-aos="zoom-in" data-aos-duration="1200" data-aos-once="false">
                        <img class="bridegroom-picture" data-aos="fade-left" data-aos-duration="1000"
                            data-aos-once="false" src="{{ asset('') }}template-navy/media/public/couple/adam.png" alt="">
                    </div>
                    <div class="bridegroom-details">
                        <h1 data-aos="fade-up-left" data-aos-duration="1000" data-aos-delay="150">Adam</h1>
                        <p data-aos="fade-up-left" data-aos-duration="1000" data-aos-delay="300">The Son of Mr. Haris
                            Sustyanto and
                            Mrs. Bella Ayu</p>
                        <p class="bio" data-aos="fade-up-left" data-aos-duration="1000" data-aos-delay="450">
                        </p>
                        <div data-aos="fade-up-left" data-aos-duration="1000" data-aos-delay="600">
                            <a href="https://www.instagram.com/adam" target="_blank"><i class="fab fa-instagram"></i>
                                <em>@adam</em></a>
                        </div>
                    </div>
                </div>
                <div class="bridegroom-separator" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="500">
                    &amp;</div>
                <div class="bride">
                    <div class="bridegroom-border" data-aos="zoom-in" data-aos-duration="1000" data-aos-once="false">
                        <img class="bridegroom-picture" data-aos="fade-right" data-aos-duration="1000"
                            data-aos-once="false" src="{{ asset('') }}template-navy/media/public/couple/hawa.png" alt="">
                    </div>
                    <div class="bridegroom-details">
                        <h1 data-aos="fade-up-right" data-aos-duration="1000" data-aos-delay="150">Hawa</h1>
                        <p data-aos="fade-up-right" data-aos-duration="1000" data-aos-delay="300">The Daughter of Mr.
                            Ilham Cakra
                            and Mrs. Farhana Dzu Hasna</p>
                        <p class="bio" data-aos="fade-up-right" data-aos-duration="1000"
                            data-aos-delay="450"></p>
                        <div data-aos="fade-up-right" data-aos-duration="1000" data-aos-delay="600">
                            <a href="https://www.instagram.com/hawa" target="_blank"><i class="fab fa-instagram"></i>
                                <em>@hawa</em></a>
                        </div>
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
                <p data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="250">December 31<sup>st</sup>, 2021</p>
            </div>
            <div class="separator">
                <div class="orn orn-03" data-aos="flip-right" data-aos-duration="3000"></div>
            </div>
            <div class="schedule">
                <div class="countdown">
                    <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="450">
                        <h1 class="count-day">0</h1>
                        <small>Hari</small>
                    </div>
                    <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="250">
                        <h1 class="count-hour">0</h1>
                        <small>Jam</small>
                    </div>
                    <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        <h1 class="count-minute">0</h1>
                        <small>Menit</small>
                    </div>
                    <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="550">
                        <h1 class="count-second">0</h1>
                        <small>Detik</small>
                    </div>
                </div>
            </div>
            <div class="foot" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
                <a href="#"
                    target="_blank" rel="nofollow" class="link-01">Add to Calendar</a>
            </div>
        </div>
    </section>

    <!-- WRAPPER GALLERY -->
    <div class="gallery-wrapper">

        <!-- GALLERY -->
        <section class="gallery">
            <div class="title">
                <h1 data-aos="zoom-out-up" data-aos-duration="1000">Picts of us</h1>
                <p data-aos="fade-up" data-aos-duration="1000">A successful marriage requires falling in love many
                    times, always
                    with the same person</p>
            </div>
            <div class="flexbin" id="lightGallery">
                <a data-aos="zoom-in" data-aos-duration="1000" href="{{ asset('') }}template-navy/media/public/gallery/1.jpg" target="_blank">
                    <img src="{{ asset('') }}template-navy/media/public/gallery/1.jpg" alt="">
                </a>
                <a data-aos="zoom-in" data-aos-duration="1000" href="{{ asset('') }}template-navy/media/public/gallery/2.jpg" target="_blank">
                    <img src="{{ asset('') }}template-navy/media/public/gallery/2.jpg" alt="">
                </a>
                <a data-aos="zoom-in" data-aos-duration="1000" href="{{ asset('') }}template-navy/media/public/gallery/3.jpg" target="_blank">
                    <img src="{{ asset('') }}template-navy/media/public/gallery/3.jpg" alt="">
                </a>
                <a data-aos="zoom-in" data-aos-duration="1000" href="{{ asset('') }}template-navy/media/public/gallery/4.jpg" target="_blank">
                    <img src="{{ asset('') }}template-navy/media/public/gallery/4.jpg" alt="">
                </a>
                <a data-aos="zoom-in" data-aos-duration="1000" href="{{ asset('') }}template-navy/media/public/gallery/5.jpg" target="_blank">
                    <img src="{{ asset('') }}template-navy/media/public/gallery/5.jpg" alt="">
                </a>
                <a data-aos="zoom-in" data-aos-duration="1000" href="{{ asset('') }}template-navy/media/public/gallery/6.jpg" target="_blank">
                    <img src="{{ asset('') }}template-navy/media/public/gallery/6.jpg" alt="">
                </a>
            </div>
        </section>
        <!-- VIDEO GALLERY -->
        <section class="video-gallery">
            <div class="inner">
                <div class="title">
                    <h1 data-aos="zoom-out-up" data-aos-duration="1000">Clip of us</h1>
                    <p data-aos="fade-up" data-aos-duration="1000">it’s about finding the right person</p>
                </div>
                <div class="video-outer">
                    <div class="video">
                        <div class="preview" data-aos="zoom-in" data-aos-duration="1000">
                            <img src="//img.youtube.com/vi/RmqKBZzPtjM/hqdefault.jpg" alt="">
                            <button class="play-btn" data-video-id="RmqKBZzPtjM"><i
                                    class="fas fa-play"></i></button>
                        </div>
                        <div class="title">
                            <h2 data-aos="fade-up" data-aos-duration="1000">Pre wedding</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
                        <h1 data-aos="zoom-in-left" data-aos-duration="1000">Friday, <br> December 31<sup>st</sup> 2021
                        </h1>

                    </div>
                    <div class="activities">
                        <div class="activity">
                            <div class="title">
                                <img class="orn orn-party" src="{{ asset('') }}template-navy/media/template/icons/light/01.png" alt=""
                                    data-aos="zoom-in" data-aos-duration="1000">
                                <h1 data-aos="fade-right" data-aos-duration="1000">Akad Nikah</h1>

                                <p class="time" data-aos="zoom-in-up" data-aos-duration="1000">09:00 - 10:00
                                </p>
                            </div>
                            <div class="address" data-aos="zoom-in-up" data-aos-duration="1000"></div>
                        </div>
                        <div class="activity">
                            <div class="title">
                                <img class="orn orn-party" src="{{ asset('') }}template-navy/media/template/icons/light/02.png" alt=""
                                    data-aos="zoom-in" data-aos-duration="1000">
                                <h1 data-aos="fade-right" data-aos-duration="1000">Resepsi</h1>

                                <p class="time" data-aos="zoom-in-up" data-aos-duration="1000">11:00 - 17:00
                                </p>
                            </div>
                            <div class="address" data-aos="zoom-in-up" data-aos-duration="1000"></div>
                        </div>
                    </div>
                    <div class="details">
                        <div class="address" data-aos="zoom-in-up" data-aos-duration="1000">
                            <p><strong>JW Marriott Hotel Medan</strong></p>
                            <p>Jalan Putri Hijau No.10, Kesawan, Kecamatan Medan Barat</p>
                            <p>Kota Medan</p>
                        </div>
                        <div data-aos="fade-down" data-aos-duration="1000">
                            <a href="https://maps.google.com/?cid=6086364269873275390" target="_blank">View Maps</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- RESERVATION -->
    <div class="wrapper-01">
        <!-- RESERVATION -->
        <section class="rsvp" id="rsvp">
            <!-- INNER -->
            <div class="rsvp-inner come">
                <div class="rsvp-confirm">
                    <div class="head">
                        <h1 data-aos="zoom-in-up" data-aos-duration="1000">RSVP</h1>
                    </div>
                    <form action="" autocomplete="off" method="POST" class="comment-form" style="margin-top: 20px;">
                        <!-- @csrf -->
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" value="" placeholder="Nama Anda"
                                required>
                            <input type="email" name="email" class="form-control" value="" placeholder="Email Anda"
                                required>
                        </div>
                        <button class="change-confirmation" data-aos="fade-up" data-aos-duration="1000"
                            class="send-comment">
                            Saya akan hadir
                        </button>
                    </form>
                </div>
            </div>
        </section><!-- LIVE STREAMING -->
        <section class="live-streaming">
            <div class="inner">
                <div class="head">
                    <h1>Live Streaming</h1>
                    <p>Please join and watch us become husband &amp; wife on</p>
                </div>
                <div class="body">
                    <div class="streaming-info">
                        <div class="link">
                            <a href="">Zoom</a>
                        </div>
                    </div>
                </div>
                <div class="orn orn-05" data-aos="zoom-in-up" data-aos-duration="1000"></div>
            </div>
        </section>

        <!-- COMMENT -->
        <section class="comment-outer">
            <div class="comment-inner">
                <div class="head">
                    <h1 data-aos="fade-up" data-aos-duration="1000">Wedding Wish</h1>
                    <p data-aos="zoom-in-up" data-aos-duration="1000">Thanks for all the wedding wishes! You made a
                        great day even
                        greater!</p>
                </div>
                <form action="" class="comment-form" id="comment-form">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" value="" placeholder="Nama Anda"
                            required>
                        <input type="email" name="email" class="form-control" value="" placeholder="Email Anda"
                            required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="comment" rows="1" placeholder="Write something..."
                            style="max-height: 350px;" data-aos="fade-down" data-aos-duration="1000"></textarea>
                    </div>
                    <button data-aos="fade-up" data-aos-duration="1000" class="send-comment">Send</button>
                </form>
                <div class="comments">
                    <!-- COMMENTS -->
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
                        comfort in them and He has placed between you, love and mercy. In this there is surely evidence
                        (of the
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
                    <p data-aos="zoom-out-up" data-aos-duration="1000">December 31<sup>st</sup>, 2021</p>
                    <h1 data-aos="zoom-in" data-aos-duration="1000">Daffin & Danela</h1>
                </div>
            </section>

            <div class="orn orn-06"></div>

        </div>

        <!-- FOOTER -->
        <section class="footer">
            <div class="footer-inner">
                <p>Powered by</p>
                <img src="" alt="">
            </div>
        </section>

        <!-- MUSIC -->
        <!-- <section class="music-outer" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
      <div class="music-box" id="music-box"></div>
    </section> -->
        <!-- ALERT -->
        <div class="alert" id="alert">
            <div class="alert-text"></div>
            <div class="alert-close fas fa-times"></div>
        </div>

        <!-- MODAL -->
        <div id="modal" class="modal modal-center"></div>

        <!-- SCRIPT -->
        <script src="{{ asset('plugin/modal-video/js/jquery-modal-video.min.js') }}"></script>
        <script src="{{ asset('plugin/slick/slick.min.js') }}"></script>
        <script src="{{ asset('plugin/aos/dist/aos.js') }}"></script>
        <script src="{{ asset('plugin/lightgallery/dist/js/lightgallery.min.js') }}"></script>

        <script>
            // window.BACKGROUND_MUSIC = "";
            // window.SCHEDULE_EVENT = 1640916000;

            window.DESKTOP_COVERS = "";
            window.MOBILE_COVERS = "";
            window.COVERS = ['#cover-real', '#cover-banner'];

            window.DESKTOP_OPENING_COVERS = "";
            window.MOBILE_OPENING_COVERS = "";
            window.OPENING_COVERS = ['#top-cover-banner'];
        </script>

        <script src="{{ asset('src/template/template.js') }}"></script>

</body>

</html>
