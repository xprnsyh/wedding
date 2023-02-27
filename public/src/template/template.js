function startTheJourney() {
    $('.top-cover').eq(0).addClass('hide');
    setTimeout(function () {
        $('body').eq(0).css('overflow', 'visible');
        $('.top-cover').eq(0).css('display', 'none');
    }, 900);
    setTimeout(playMusic, 900);
}
var $alert = $('#alert');
var $alertClose = $('#alert .alert-close');
var $alertText = $('#alert .alert-text');

function hideAlert() {
    if ($alert.hasClass('show')) {
        $alert.removeClass('show');
    }
    if ($alert.hasClass('success')) {
        $alert.removeClass('success');
    }
    if ($alert.hasClass('error')) {
        $alert.removeClass('error');
    }
    $alert.addClass('hide');
}

function showAlert(message, status) {
    if ($alert.hasClass('hide')) {
        $alert.removeClass('hide');
    }
    $alert.addClass('show');
    $alert.addClass(status);
    $alertText.text(message);
    setTimeout(hideAlert, 3000);
}
var $modal = $('#modal');
var $modalContents = $('.modal-content');

function openModal() {
    $modal.html('');
    if ($modal.css('display') == 'none') {
        $modal.css('display', 'flex');
    }
    $modalContents.each(function (i, modal) {
        $(modal).hide();
    });
    $('html').css('overflow', 'hidden');
}

function closeModal() {
    if ($modal.css('display') == 'flex') {
        $modal.css('display', 'none');
    }
    $('html').css('overflow', 'scroll');
    $modal.html('');
}
$(document).on('click', '.close-modal', function (e) {
    e.preventDefault();
    closeModal();
});

function copyToClipboard(text) {
    var dummy = document.createElement("textarea");
    document.body.appendChild(dummy);
    dummy.value = text;
    dummy.select();
    document.execCommand("copy");
    document.body.removeChild(dummy);
    showAlert('Berhasil di salin ke papan klip', 'success');
}

function urlify(text) {
    var lineBreak = '';
    var urlRegex = /(https?:\/\/[^\s]+)/g;
    return text.replace(urlRegex, function (url) {
        var finalURL = url;
        if (url.indexOf('<br>') > -1) {
            finalURL = url.replace(/<br>/g, '');
            lineBreak = '<br>';
        }
        return '<a href="' + finalURL + '" target="_blank">' + finalURL + '</a>' + lineBreak;
    });
}
$(document).on('click', '.copy-account', function (e) {
    e.preventDefault();
    var book = $(this).closest('.book');
    var number = $(book).find('.account-number');
    copyToClipboard(number.html());
});
var numberFormat = new Intl.NumberFormat('ID', {});
$('img').on('dragstart', function (e) {
    e.preventDefault();
});
$(document).on('keyup focus', 'textarea', function (e) {
    e.preventDefault();
    this.style.height = '1px';
    this.style.height = (this.scrollHeight) + 'px';
}).on('focusout', 'textarea', function (e) {
    e.preventDefault();
    this.style.height = 24 + 'px';
});

function ajaxCall(data, callback) {
    $.ajax({
        type: 'post',
        dataType: 'json',
        data: data,
        success: function (result) {
            if (result.error === false) {
                callback(result);
            } else {
                showAlert(result.message, 'error');
            }
        },
    });
}

function ajaxMultiPart(data, beforeSend, callback) {
    $.ajax({
        type: 'post',
        dataType: 'json',
        contentType: false,
        processData: false,
        data: data,
        beforeSend: beforeSend,
        success: function (result) {
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
$(document).on('click', '[data-modal]', function (e) {
    e.preventDefault();
    var element = this;
    var modal = $(element).data('modal');
    var data = {
        'status': 'modal',
        'modal': modal
    }
    if (modal == 'delete_comment') {
        var comment = $(element).data('comment');
        data['comment'] = comment;
    }
    ajaxCall(data, function (result) {
        if (result.modal != '') {
            openModal();
            $modal.append(result['modal']);
        }
    });
});
$(document).on('click', '[data-delete]', function (e) {
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
    ajaxCall(data, function (result) {
        if (result.callback == 'comment') {
            closeModal();
            showAlert(result.message, 'success');
            allComments();
        }
    });
});

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
var isCoverPlayed = false;
var coverSetup = (function setup(windowWidth) {
    if (typeof windowWidth == 'undefined') {
        windowWidth = $(window).width();
    }
    if (window.DESKTOP_COVERS != '' || window.MOBILE_COVERS != '') {
        $('.cover-inner').addClass('covers');
    } else {
        $('.cover-inner').removeClass('covers');
    }
    if (windowWidth > '1020' && windowWidth < '1030') {
        isCoverPlayed = false;
    }
    if (!isCoverPlayed) {
        $('.cover-show').each(function (i, slider) {
            if ($(slider).hasClass('slick-initialized')) {
                $(slider).slick('unslick');
            }
        });
        $.each(window.COVERS, function (i, cover) {
            $(cover).html('');
        });
        $.each(window.OPENING_COVERS, function (i, cover) {
            $(cover).html('');
        });
    }
    var smallScreen = window.matchMedia("(max-width: 1024px)");
    if (!smallScreen.matches) {
        if (!isCoverPlayed) {
            if (window.DESKTOP_COVERS != '') {
                $('.cover-inner').removeClass('mobile').addClass('desktop');
                $.each(window.COVERS, function (i, cover) {
                    $(cover).append(window.DESKTOP_COVERS);
                    $(cover).slick(sliderOptions());
                });
                isCoverPlayed = true;
            }
            if (window.DESKTOP_OPENING_COVERS != '') {
                $.each(window.OPENING_COVERS, function (i, cover) {
                    $(cover).append(window.DESKTOP_OPENING_COVERS);
                    $(cover).slick(sliderOptions());
                });
            }
        }
    } else {
        if (!isCoverPlayed) {
            if (window.MOBILE_COVERS != '') {
                $('.cover-inner').removeClass('desktop').addClass('mobile');
                $.each(window.COVERS, function (i, cover) {
                    $(cover).append(window.MOBILE_COVERS);
                    $(cover).slick(sliderOptions());
                });
                isCoverPlayed = true;
            }
            if (window.MOBILE_OPENING_COVERS != '') {
                $.each(window.OPENING_COVERS, function (i, cover) {
                    $(cover).append(window.MOBILE_OPENING_COVERS);
                    $(cover).slick(sliderOptions());
                });
            }
        }
    }
    return setup;
}());
var countdown = (function count() {
    var schedule = window.SCHEDULE_EVENT;
    var event = new Date(schedule * 1000).getTime();
    var start = setInterval(rundown, 1000);

    function rundown() {
        var now = new Date().getTime();
        var distance = event - now;
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

function attendanceToggle(input) {
    var attendanceCome = $('.attendance-value.come');
    var attendanceNotCome = $('.attendance-value.not-come');
    $(attendanceCome).html('Datang');
    $(attendanceNotCome).html('Ga Datang');
    if ($(input).is(':checked')) {
        if ($(input).next('.attendance-value.come').length > 0) {
            $(attendanceCome).html('<i class="fas fa-smile"></i> Datang');
            $('#rsvp-guest-amount').slideDown();
        }
        if ($(input).next('.attendance-value.not-come').length > 0) {
            $(attendanceNotCome).html('<i class="fas fa-sad-tear"></i> Ga Datang');
            $('#rsvp-guest-amount').slideUp();
        }
    }
}
$(document).on('change', '[name="attendance"]', function (e) {
    e.preventDefault();
    attendanceToggle(this);
})
// $(document).on('click', '.change-confirmation', function(e) {
//     e.preventDefault();
//     $('.rsvp-inner').find('.rsvp-form').fadeIn();
//     $('.rsvp-inner').find('.rsvp-confirm').hide();
// });
$(document).on('click', '[data-quantity="plus"]', function (e) {
    e.preventDefault();
    var fieldName = $(this).attr('data-field');
    var $input = $('input[name="' + fieldName + '"]');
    var currentVal = parseInt($input.val());
    var bool = $input.prop('readonly');
    if (!bool) {
        if (!isNaN(currentVal)) {
            if (currentVal < $input.prop('max')) {
                $input.val(currentVal + 1);
            }
        } else {
            $input.val(1);
        }
    }
});
$(document).on('click', '[data-quantity="minus"]', function (e) {
    e.preventDefault();
    var fieldName = $(this).attr('data-field');
    var $input = $('input[name="' + fieldName + '"]');
    var currentVal = parseInt($input.val());
    var bool = $input.prop('readonly');
    if (!bool) {
        if (!isNaN(currentVal)) {
            $input.val(currentVal - 1);
            if (currentVal <= 0) {
                $input.val(0);
            }
        } else {
            $input.val(0);
        }
    }
});
$(document).on('change', '[data-quantity="control"]', function (e) {
    e.preventDefault();
    var max = $(this).prop('max');
    var value = $(this).val();
    if (value > max) {
        $(this).val(max);
    }
});
$(document).on('change', '[name="nominal"]', function (e) {
    e.preventDefault();
    var val = $(this).val();
    var input = $('.insert-nominal');
    $(input).slideUp();
    if (parseInt(val) <= 0) {
        if ($(this).is(':checked') == true) {
            $(input).slideDown();
            $(input).find('[name="inserted_nominal"]').val('').focus();
        }
    }
    $(input).find('[name="inserted_nominal"]').val(val);
});
$(document).on('keyup keydown change', '[name="inserted_nominal"]', function (e) {
    if ($(this).val().length > 16) {
        var val = $(this).val().substr(0, $(this).val().length - 1);
        $(this).val(val);
    };
});
$(document).on('submit', '#rsvp-form', function (e) {
    e.preventDefault();
    var data = $(this).serialize();
    ajaxCall(data, function (result) {
        $('.rsvp-inner').find('.rsvp-form').fadeOut();
        $('.rsvp-inner').find('.rsvp-confirm').fadeIn();
        showAlert(result.message, 'success');
        window.location.reload();
    });
    return false;
});

function chooseBank(select) {
    var num = $(select).val();
    $.each($('.account-number'), function (i, el) {
        var parent = $(el).closest('.book');
        $(parent).hide();
        if ($(el).html() == num) {
            $(parent).fadeIn();
        }
    });
}
$(document).on('change', 'select[name="choose_bank"]', function (e) {
    e.preventDefault();
    chooseBank(this);
});
$(document).on('click', 'div[data-upload="gift-picture"]', function (e) {
    e.preventDefault();
    $('#gift-form input[name="picture"]').click();
});
$(document).on('change', '#gift-form input[name="picture"]', function (e) {
    e.preventDefault();
    if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = function (er) {
            $('[data-image="uploaded-gift"]').fadeIn();
            $('[data-image="uploaded-gift"]').attr('src', er.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    }
});
$(document).on('click', '.gift-next', function (e) {
    e.preventDefault();
    var form = $('#gift-form');
    if ($(form).find('[name="name"]').val() == '') {
        $(form).find('[name="name"]').focus();
        return;
    }
    if ($(form).find('[name="account_name"]').val() == '') {
        $(form).find('[name="account_name"]').focus();
        return;
    }
    if ($(form).find('[name="message"]').val() == '') {
        $(form).find('[name="message"]').focus();
        return;
    }
    if ($(form).find('[name="inserted_nominal"]').val() <= 0) {
        $('.insert-nominal').slideDown();
        $(form).find('[name="inserted_nominal"]').focus();
        return;
    }
    $('.gift-details').hide();
    $('.gift-picture').fadeIn();
});
$(document).on('click', '.gift-back', function (e) {
    e.preventDefault();
    $('.gift-picture').hide();
    $('.gift-details').fadeIn();
});
$(document).on('submit', '#gift-form', function (e) {
    var data = new FormData(this);
    ajaxMultiPart(data, function () {
        $('.gift-next').prop('disabled', true);
        $('.gift-submit').prop('disabled', true);
        $('.gift-submit').html('<i class="fas fa-spinner fa-spin"></i>');
    }, function (result) {
        $(this).trigger('reset');
        showAlert(result.message, 'success');
        setTimeout(function () {
            window.location.reload(true);
        }, 1000);
    });
    return false;
});
var allComments = (function comment() {
    var data = {
        'status': 'all_comments',
    }
    ajaxCall(data, function (result) {
        $('.comments').html('');
        $('.comments').append(result.comments);
        if (result.more != '') {
            $('.comment-inner .foot').html('');
            $('.comment-inner .foot').append(result.more);
        }
    });
    return comment;
}());
$(document).on('submit', '#comment-form', function (e) {
    e.preventDefault();
    var form = $(this);
    var data = $(this).serialize();
    var comment = $(this).find('[name="comment"]');
    if (comment.val() == '') {
        comment.focus();
    } else {
        ajaxCall(data, function (result) {
            $(form).trigger('reset');
            showAlert(result.message, 'success');
            allComments();
        });
    }
    return false;
});
$(document).on('click', '.more-comment', function (e) {
    e.preventDefault();
    var lastComment = $(this).data('last-comment');
    var data = {
        'status': 'more_comments',
        'last_comment': lastComment,
    }
    $(this).html('Loading... <i class="fas fa-spinner fa-spin"></i>');
    ajaxCall(data, function (result) {
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
var backgroundMusic = document.createElement("audio");
backgroundMusic.autoplay = true;
backgroundMusic.loop = true;
backgroundMusic.load();
backgroundMusic.src = window.BACKGROUND_MUSIC;
var isMusicAttemptingToPlay = false
var isMusicPlayed = false
$(document).on('scroll click', function () {
    if (!isMusicAttemptingToPlay && !isMusicPlayed) {
        isMusicAttemptingToPlay = true;
        setTimeout(playMusic, 1000);
    }
});
var pauseMusic = function () {
    isMusicAttemptingToPlay = false;
    var promise = backgroundMusic.pause();
    isMusicPlayed = false;
    pauseBoxAnimation();
}
var playMusic = (function music() {
    isMusicAttemptingToPlay = false
    var promise = backgroundMusic.play();
    if (promise !== undefined) {
        promise.then(_ => {
            isMusicPlayed = true;
            playBoxAnimation();
        }).catch(error => {
            isMusicPlayed = false;
            pauseBoxAnimation();
        });
    }
    return music;
}());

function playBoxAnimation() {
    var box = $('#music-box');
    if (!$(box).hasClass('playing')) {
        $(box).addClass('playing');
    }
    if ($(box).css('animationPlayState') != 'running') {
        $(box).css('animationPlayState', 'running');
    }
}

function pauseBoxAnimation() {
    var box = $('#music-box');
    if ($(box).hasClass('playing')) {
        if ($(box).css('animationPlayState') == 'running') {
            $(box).css('animationPlayState', 'paused');
        }
    }
}
$(document).on('click', '#music-box', function (e) {
    e.preventDefault();
    if (isMusicPlayed) {
        pauseMusic();
        isMusicAttemptingToPlay = true;
    } else {
        playMusic();
    }
});
$(function () {
    var books = window.SAVING_BOOKS;
    var template = '';
    var allBank = [];
    for (var i = 0; i < books.length; i++) {
        template = {
            'title': books[i]['bank'],
            'text': books[i]['number_account'],
        }
        allBank.push(template);
    }
    var options = {
        maxItems: 1,
        valueField: 'text',
        labelField: 'text',
        searchField: ['text', 'title'],
        options: allBank,
        create: false,
        render: {
            item: function (item, escape) {
                return '<div>' +
                    (item.title ? '<p>' + escape(item.title) + '</p>' : '') +
                    '</div>';
            },
            option: function (item, escape) {
                var label = item.title || item.text;
                var caption = item.title ? item.text : null;
                return '<div class="item">' +
                    '<p style="font-size: 14px;"><strong>' + escape(label) + '</strong></p>' +
                    '</div>';
            }
        },
    };
    if ($('select[name="choose_bank"]').length > 0) {
        var select = $('select[name="choose_bank"]').selectize(options);
        var selectize = $(select)[0].selectize;
        if (allBank.length > 0) {
            selectize.setValue(allBank[0]['text'], 1);
        }
        $(".selectize-input input").attr('readonly', 'readonly');
    }
});
$(document).on('click', '.play-btn', function (e) {
    e.preventDefault();
    if (isMusicPlayed) {
        pauseMusic();
        isMusicAttemptingToPlay = true;
    }
});
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
        listType: null,
        loop: 0,
        modestbranding: null,
        mute: 0,
        origin: null,
        playsinline: null,
        rel: 0,
        showinfo: 1,
        start: 0,
        wmode: 'transparent',
        theme: 'dark',
        nocookie: false,
    }
});
AOS.init({
    disable: false,
    startEvent: 'DOMContentLoaded',
    initClassName: 'aos-init',
    animatedClassName: 'aos-animate',
    useClassNames: false,
    disableMutationObserver: false,
    debounceDelay: 0,
    throttleDelay: 0,
    offset: 10,
    delay: 0,
    duration: 400,
    easing: 'ease',
    once: true,
    mirror: false,
    anchorPlacement: 'top-bottom',
});
$(function () {
    lightGallery(document.getElementById('lightGallery'));
});
(function showGalleries() {
    $('.lightgallery').each(function (i, gallery) {
        lightGallery(gallery);
    });
})();
var originalWidth = $(window).width();
$(window).on('resize', function () {
    var resized = false;
    var newWidth = $(window).width();
    if (originalWidth !== newWidth) {
        originalWidth = $(window).width();
        resized = true;
    }
    if (resized === true) { }
});
$(document).ready(function () {
    $('p').each(function (i, el) {
        el.innerHTML = urlify(el.innerHTML);
    });
    $.each($('textarea'), function (i, textarea) {
        textarea.style.height = '1px';
    });
    $('[data-quantity="control"]').each(function (i, input) {
        var max = $(input).prop('max');
        var value = $(input).val();
        if (value > max) {
            $(input).val(max);
        }
    });
    $('[name="nominal"]').each(function (i, el) {
        if ($(el).is(':checked')) {
            if ($(this).val() <= 0) {
                $('.insert-nominal').slideDown();
                $('.insert-nominal').find('[name="inserted_nominal"]').focus();
            }
        }
    });
    var select = $('select[name="choose_bank"]');
    chooseBank(select);
    $.each($('input[name="attendance"]'), function (i, input) {
        attendanceToggle(input);
    });
    var rsvpInner = $('.rsvp-inner');
    if ($(rsvpInner).hasClass('come')) {
        $(rsvpInner).find('.rsvp-form').fadeOut();
        $(rsvpInner).find('.rsvp-confirm').fadeIn();
    }
    if ($(rsvpInner).hasClass('not-come')) {
        $(rsvpInner).find('.rsvp-form').fadeOut();
        $(rsvpInner).find('.rsvp-confirm').fadeIn();
    }
    if ($(rsvpInner).hasClass('no-news')) {
        $(rsvpInner).find('.rsvp-form').fadeIn();
        $(rsvpInner).find('.rsvp-confirm').fadeOut();
    }
});
