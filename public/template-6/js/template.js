/*
    ++++++++++ ATTENTION!!! ++++++++++
    Before including this file
    make sure if your had included JQUERY too
*/

/*  ================================================

    GENERAL CONFIGURATION

============================================= */

// ---------- SnowFlake (Function) --------------------------------------------------
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

// ---------- Start Your Journey (Function) --------------------------------------------------
function startTheJourney() {
    $('.top-cover').eq(0).addClass('hide');

    setTimeout(function() {
        $('body').eq(0).css('overflow', 'visible');
        $('.top-cover').eq(0).css('display', 'none');
    }, 900);

    setTimeout(playMusic, 900);
    setTimeout(function() {
        $('#open-modal').modal('show');
    }, 900);
}

// ---------- ALERT --------------------------------------------------
var $alert = $('#alert'); // alert
var $alertClose = $('#alert .alert-close'); // alert close
var $alertText = $('#alert .alert-text'); // Alert Text

// ---------- Hide Alert (Function) --------------------------------------------------
function hideAlert() {
    if ($alert.hasClass('show')) {
        $alert.removeClass('show'); // removing show class
    }
    if ($alert.hasClass('success')) {
        $alert.removeClass('success'); // removing show class
    }
    if ($alert.hasClass('error')) {
        $alert.removeClass('error'); // removing show class
    }
    $alert.addClass('hide'); // hiding alert
}

// ---------- Show Alert (Function) --------------------------------------------------
function showAlert(message, status) {
    if ($alert.hasClass('hide')) {
        $alert.removeClass('hide'); // removing hide class
    }
    $alert.addClass('show');
    $alert.addClass(status);
    $alertText.text(message);
    setTimeout(hideAlert, 3000);
}

// ---------- MODAL ---------------------------------------------------------------------------------
var $modal = $('#modal');
var $modalContents = $('.modal-content');

// ---------- Open Modal (Function) --------------------------------------------------
function openModal() {
    $modal.html('');
    if ($modal.css('display') == 'none') {
        $modal.css('display', 'flex');
    }
    $modalContents.each(function(i, modal) {
        $(modal).hide();
    });
    $('html').css('overflow', 'hidden');
}

// ---------- Close Modal (Function) --------------------------------------------------
function closeModal() {
    if ($modal.css('display') == 'flex') {
        $modal.css('display', 'none');
    }
    $('html').css('overflow', 'scroll');
    $modal.html('');
}

// ---------- Close Modal [ON CLICK] --------------------------------------------------
$(document).on('click', '.close-modal', function(e) {
    e.preventDefault();
    closeModal();
});

// ---------- Copy to  (Function) --------------------------------------------------
function copyToClipboard(text) {
    var dummy = document.createElement("textarea");
    // to avoid breaking orgain page when copying more words
    // cant copy when adding below this code
    // dummy.style.display = 'none'
    document.body.appendChild(dummy);
    //Be careful if you use texarea. setAttribute('value', value), which works with "input" does not work with "textarea". – Eduard
    dummy.value = text;
    dummy.select();
    document.execCommand("copy");
    document.body.removeChild(dummy);
    showAlert('Berhasil di salin ke papan klip', 'success');
}

// ---------- URLify  (Function) --------------------------------------------------
function urlify(text) {
    var lineBreak = '';
    var urlRegex = /(https?:\/\/[^\s]+)/g;
    return text.replace(urlRegex, function(url) {
        var finalURL = url;
        if (url.indexOf('<br>') > -1) {
            finalURL = url.replace(/<br>/g, '');
            lineBreak = '<br>';
        }
        return '<a href="' + finalURL + '" target="_blank">' + finalURL + '</a>' + lineBreak;
    });
    // or alternatively
    // return text.replace(urlRegex, '<a href="$1">$1</a>')
}

// ---------- Copy Account [ON CLICK] ---------------------------------------------------------------
$(document).on('click', '.copy-account', function(e) {
    e.preventDefault();
    var book = $(this).closest('.book');
    var number = $(book).find('.account-number');
    copyToClipboard(number.html());
});

// ---------- Number Format (Variables) ---------------------------------------------------------------
var numberFormat = new Intl.NumberFormat('ID', {
    // style: 'currency',
    // currency: 'IDR',
});

// ---------- Disabled Dragging an image [ON DRAGSTART] -----------------------------------------------
$('img').on('dragstart', function(e) {
    e.preventDefault();
});

// ---------- Textarea [ON KEY, FOCUS] -----------------------------------------------------------------
$(document).on('keyup focus', 'textarea', function(e) {
    e.preventDefault();
    this.style.height = '1px';
    this.style.height = (this.scrollHeight) + 'px';
}).on('focusout', 'textarea', function(e) {
    e.preventDefault();
    this.style.height = 24 + 'px';
});




/*  ================================================

    CALLING

============================================= */

// ---------- Sending Data (Only) By AJAX --------------------------------------------------
function ajaxCall(data, callback) {
    $.ajax({
        type: 'post',
        dataType: 'json',
        data: data,
        success: function(result) {
            if (result.error === false) {
                callback(result);
            } else {
                showAlert(result.message, 'error');
            }
        },
    });
}

// ---------- Sending Data And Media BY AJAX --------------------------------------------------
function ajaxMultiPart(data, beforeSend, callback) {
    $.ajax({
        type: 'post',
        dataType: 'json',
        contentType: false,
        processData: false,
        data: data,
        beforeSend: beforeSend,
        success: function(result) {
            if (result.error === false) {
                callback(result);
            } else {
                showAlert(result.message, 'error');
                $('.gift-next').prop('disabled', false);
                $('.gift-submit').prop('disabled', false);
                $('.gift-submit').html('Konfirmasi');
            }
        },
    });
}

// ---------- Calling Modal [ON CLICK] --------------------------------------------------
$(document).on('click', '[data-modal]', function(e) {
    e.preventDefault();
    var element = this;
    var modal = $(element).data('modal');
    var data = {
        'status': 'modal',
        'modal': modal
    }

    // Delete Comment
    if (modal == 'delete_comment') {
        var comment = $(element).data('comment');
        data['comment'] = comment;
    }

    ajaxCall(data, function(result) {
        if (result.modal != '') {
            openModal();
            $modal.append(result['modal']);
        }

    });

});

// ---------- Deleting [ON CLICK] --------------------------------------------------
$(document).on('click', '[data-delete]', function(e) {
    e.preventDefault();
    var element = this;
    var status = $(element).data('delete');
    var data = {
        'status': status
    };

    if (status == 'delete_comment') {
        var comment = $(element).data('comment');
        data['comment'] = comment;
    }

    ajaxCall(data, function(result) {
        if (result.callback == 'comment') {
            closeModal();
            showAlert(result.message, 'success');
            allComments();
        }
    });

});




/*  ================================================

    COVERS

============================================= */
// ---------- Slider Options (Function) --------------------------------------------------
function sliderOptions() {
    return {
        centerMode: true,
        slidesToShow: 1,
        variableWidth: true,
        autoplay: true,
        autoplaySpeed: 3000,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        dots: false,
        arrows: false,
        pauseOnFocus: false,
        pauseOnHover: false,
        draggable: false,
        touchMove: false
    };
};

// Is Cover Played
var isCoverPlayed = false;
// ---------- Cover Setup (Function) --------------------------------------------------
var coverSetup = (function setup(windowWidth) {
    // If Window Width is undefined
    if (typeof windowWidth == 'undefined') {
        windowWidth = $(window).width();
    }

    // If Desktop or Mobile Cover is not empty
    if (window.DESKTOP_COVERS != '' || window.MOBILE_COVERS != '') {
        // Add Class to cover-inner
        $('.cover-inner').addClass('covers');
    } else {
        // Remove class 'covers'
        $('.cover-inner').removeClass('covers');
    }

    // If it is okay
    if (windowWidth > '1020' && windowWidth < '1030') {
        isCoverPlayed = false;
    }

    // If the cover is not played
    if (!isCoverPlayed) {
        // Unslick the slider
        $('.cover-show').each(function(i, slider) {
            if ($(slider).hasClass('slick-initialized')) {
                $(slider).slick('unslick');
            }
        });

        // Remove all elements inside cover show
        $.each(window.COVERS, function(i, cover) {
            $(cover).html('');
        });

        // Remove all elements inside cover show
        $.each(window.OPENING_COVERS, function(i, cover) {
            $(cover).html('');
        });

    }

    // Small screen
    var smallScreen = window.matchMedia("(max-width: 1024px)");
    if (!smallScreen.matches) {
        // If the cover is not played
        if (!isCoverPlayed) {
            // If the desktop cover is not empty
            if (window.DESKTOP_COVERS != '') {
                // Add class desktop to cover-inner
                $('.cover-inner').removeClass('mobile').addClass('desktop');
                $.each(window.COVERS, function(i, cover) {
                    // Append new cover elements into cover show
                    $(cover).append(window.DESKTOP_COVERS);
                    // Start the slider
                    $(cover).slick(sliderOptions());
                });
                // Played the cover
                isCoverPlayed = true;
            }

            // OPENING
            if (window.DESKTOP_OPENING_COVERS != '') {
                $.each(window.OPENING_COVERS, function(i, cover) {
                    // Append new cover elements into cover show
                    $(cover).append(window.DESKTOP_OPENING_COVERS);
                    // Start the slider
                    $(cover).slick(sliderOptions());
                });
            }
        }
    } else {
        // If the cover is not played
        if (!isCoverPlayed) {
            // If the mobile cover is not empty
            if (window.MOBILE_COVERS != '') {
                // Add class mobile to cover-inner
                $('.cover-inner').removeClass('desktop').addClass('mobile');
                $.each(window.COVERS, function(i, cover) {
                    // Append new cover elements into cover show
                    $(cover).append(window.MOBILE_COVERS);
                    // Start the slider
                    $(cover).slick(sliderOptions());
                });
                // Played the cover
                isCoverPlayed = true;
            }

            // OPENING
            if (window.MOBILE_OPENING_COVERS != '') {
                $.each(window.OPENING_COVERS, function(i, cover) {
                    // Append new cover elements into cover show
                    $(cover).append(window.MOBILE_OPENING_COVERS);
                    // Start the slider
                    $(cover).slick(sliderOptions());
                });
            }
        }
    }

    // return the setup
    return setup;
}());




/*  ================================================

    SAVE THE DATE

============================================= */

// ----------- COUNTDOWN (Function) ------------------------------------------------------
var countdown = (function count() {
    var schedule = window.SCHEDULE_EVENT;
    var event = new Date(schedule * 1000).getTime();
    var start = setInterval(rundown, 1000);

    function rundown() {
        var now = new Date().getTime();
        var distance = event - now;
        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        if (distance < 0) {
            clearInterval(start);
            $('.count-day').text('0');
            $('.count-hour').text('0');
            $('.count-minute').text('0');
            $('.count-second').text('0');
        } else {
            $('.count-day').text(days);
            $('.count-hour').text(hours);
            $('.count-minute').text(minutes);
            $('.count-second').text(seconds);
        }
    }
    return count;
}());



/*  ================================================

    RSVP

============================================= */

// ---------- Quantity Control [ON CHANGE] --------------------------------------------------
$(document).on('change', '[data-quantity="control"]', function(e) {
    e.preventDefault();
    var max = $(this).prop('max');
    var value = $(this).val();
    if (value > max) {
        $(this).val(max);
    }
});

// ---------- RSVP Form [ON SUBMIT] --------------------------------------------------
$(document).on('submit', '#rsvp-form', function(e) {
    e.preventDefault();
    var data = $(this).serialize();
    ajaxCall(data, function(result) {
        // $('.rsvp-inner').find('.rsvp-form').fadeOut();
        // $('.rsvp-inner').find('.rsvp-confirm').fadeIn();
        showAlert(result.message, 'success');
        window.location.reload();
    });
    return false;
});

// ---------- All Comments (Function) --------------------------------------------------
var allComments = (function comment() {
    var data = {
        'status': 'all_comments',
    }
    ajaxCall(data, function(result) {
        $('.comments').html('');
        $('.comments').append(result.comments);
        if (result.more != '') {
            $('.comment-inner .foot').html('');
            $('.comment-inner .foot').append(result.more);
        }
    });
    return comment;
}());

// ---------- Comment Form [ON SUBMIT] --------------------------------------------------
$(document).on('submit', '#comment-form', function(e) {
    e.preventDefault();
    var form = $(this);
    var data = $(this).serialize();
    var comment = $(this).find('[name="comment"]');
    if (comment.val() == '') {
        comment.focus();
    } else {
        ajaxCall(data, function(result) {
            $(form).trigger('reset');
            showAlert(result.message, 'success');
            allComments();
        });
    }
    return false;
});

// ---------- More Comment --------------------------------------------------
$(document).on('click', '.more-comment', function(e) {
    e.preventDefault();
    var lastComment = $(this).data('last-comment');
    var data = {
        'status': 'more_comments',
        'last_comment': lastComment,
    }
    $(this).html('Loading... <i class="fas fa-spinner fa-spin"></i>');
    ajaxCall(data, function(result) {
        $('.comment-inner .foot').html('');
        $('.more-comment').html('Show more comments');
        if (result.comments != '') {
            $('.comments').append(result.comments);
        }
        if (result.more != '') {
            $('.comment-inner .foot').append(result.more);
        }
    });
});



/*  ================================================

    Music

============================================= */
var backgroundMusic = document.createElement("audio");
backgroundMusic.autoplay = true;
backgroundMusic.loop = true;
backgroundMusic.load();
backgroundMusic.src = window.BACKGROUND_MUSIC;

var isMusicAttemptingToPlay = false
var isMusicPlayed = false

// ---------- Trigger Music to play when document is scroled or clicked --------------------------------------------------
$(document).on('scroll click', function() {
    if (!isMusicAttemptingToPlay && !isMusicPlayed) {
        isMusicAttemptingToPlay = true;
        setTimeout(playMusic, 1000);
    }
});

// ---------- Pause Music (Function) --------------------------------------------------
var pauseMusic = function() {
    isMusicAttemptingToPlay = false;
    var promise = backgroundMusic.pause();
    isMusicPlayed = false;
    pauseBoxAnimation();
}

// ---------- Play Music (Function) --------------------------------------------------
var playMusic = (function music() {
    isMusicAttemptingToPlay = false
    var promise = backgroundMusic.play();
    if (promise !== undefined) {
        promise.then(_ => {
            isMusicPlayed = true;
            // console.log('Audio berhasil diputar');
            playBoxAnimation();
        }).catch(error => {
            isMusicPlayed = false;
            // console.log('Tidak dapat memutar audio');
            pauseBoxAnimation();
        });
    }
    return music;
}());

// ---------- Playing Box Animation (Function) --------------------------------------------------
function playBoxAnimation() {
    var box = $('#music-box');
    if (!$(box).hasClass('playing')) {
        $(box).addClass('playing');
    }
    if ($(box).css('animationPlayState') != 'running') {
        $(box).css('animationPlayState', 'running');
    }
}

// ---------- Pause Box Animation (Function) --------------------------------------------------
function pauseBoxAnimation() {
    var box = $('#music-box');
    if ($(box).hasClass('playing')) {
        if ($(box).css('animationPlayState') == 'running') {
            $(box).css('animationPlayState', 'paused');
        }
    }
}

// ---------- Music Box [ON CLICK] --------------------------------------------------
$(document).on('click', '#music-box', function(e) {
    e.preventDefault();
    if (isMusicPlayed) {
        pauseMusic();
        isMusicAttemptingToPlay = true;
    } else {
        playMusic();
    }
});




/*  ================================================

    THIRD PARTY

============================================= */


// ---------- Pause Audio When Click Video ---------------------------------------------------------------
$(document).on('click', '.play-btn', function(e) {
    e.preventDefault();

    if (isMusicPlayed) {
        pauseMusic();
        isMusicAttemptingToPlay = true;
    }

});

// ---------- Modal Video ---------------------------------------------------------------
$('.play-btn').modalVideo({
    youtube: {
        autoplay: 1,
        cc_load_policy: 1,
        color: null,
        controls: 1,
        disableks: 0,
        enablejsapi: 0,
        end: null,
        fs: 1,
        h1: null,
        iv_load_policy: 1,
        // list: null,
        listType: null,
        loop: 0,
        modestbranding: null,
        mute: 0,
        origin: null,
        // playlist: null,
        playsinline: null,
        rel: 0,
        showinfo: 1,
        start: 0,
        wmode: 'transparent',
        theme: 'dark',
        nocookie: false,
    }
});

// ---------- AOS (Animation) ------------------------------------------------------
AOS.init({
    // Global settings:
    disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
    startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
    initClassName: 'aos-init', // class applied after initialization
    animatedClassName: 'aos-animate', // class applied on animation
    useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
    disableMutationObserver: false, // disables automatic mutations' detections (advanced)
    debounceDelay: 0, // the delay on debounce used while resizing window (advanced)
    throttleDelay: 0, // the delay on throttle used while scrolling the page (advanced)

    // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
    offset: 10, // offset (in px) from the original trigger point
    delay: 0, // values from 0 to 3000, with step 50ms
    duration: 400, // values from 0 to 3000, with step 50ms
    easing: 'ease', // default easing for AOS animations
    once: true, // whether animation should happen only once - while scrolling down
    mirror: false, // whether elements should animate out while scrolling past them
    anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation
});

// ---------- LIGHTGALLERY --------------------------------------------------
$(function() {
    lightGallery(document.getElementById('lightGallery'));
});



/*  ================================================

    WINDOW [ON RESIZE]

============================================= */
// Window Width
var originalWidth = $(window).width();

// ---------- Window On Resize --------------------------------------------------
$(window).on('resize', function() {
    var resized = false;
    // Mew Width
    var newWidth = $(window).width();
    // Check if there is a changes
    if (originalWidth !== newWidth) {
        originalWidth = $(window).width();
        resized = true;
    }
    // If it is resized
    if (resized === true) {
        // Cover Setup
        // coverSetup(newWidth);
    }

});




/*  ================================================

    DOCUMENT [ON READY]

============================================= */
$(document).ready(function() {

    // ---------- URLify --------------------------------------------------
    $('p').each(function(i, el) {
        el.innerHTML = urlify(el.innerHTML);
    });

    // ---------- Make Textarea getting small --------------------------------------------------
    $.each($('textarea'), function(i, textarea) {
        textarea.style.height = '1px';
    });


    // ---------- Attendance Toggling --------------------------------------------------
    $.each($('input[name="attendance"]'), function(i, input) {
        attendanceToggle(input);
    });


});
