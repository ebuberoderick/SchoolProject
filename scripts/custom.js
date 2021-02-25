$(document).ready(function() {
    setInterval(() => {
        d = new Date();
        var hour = d.getHours();
        var mins = d.getMinutes();
        var sec = d.getSeconds();
        if (hour < 10) {
            if (mins < 10) {
                if (sec < 10) {
                    var fTime = '0' + hour + ':' + '0' + mins + ':' + '0' + sec;
                } else {
                    var fTime = '0' + hour + ':' + '0' + mins + ':' + sec;
                }
            } else {
                if (sec < 10) {
                    var fTime = '0' + hour + ':' + mins + ':' + '0' + sec;
                } else {
                    var fTime = '0' + hour + ':' + mins + ':' + sec;
                }
            }
        } else {
            if (mins < 10) {
                if (sec < 10) {
                    var fTime = hour + ':' + '0' + mins + ':' + '0' + sec;
                } else {
                    var fTime = hour + ':' + '0' + mins + ':' + sec;
                }
            } else {
                if (sec < 10) {
                    var fTime = hour + ':' + mins + ':' + '0' + sec;
                } else {
                    var fTime = hour + ':' + mins + ':' + sec;
                }
            }
        }
        $('.timeStamp').html(fTime);
    }, 100);
    $('.drop').on('click', function() {
        $(this).siblings().toggle('display');
        $(this).children('.fa').toggleClass('arr_row');
    });
    $('.tTable').on('click', function() {
        $('.form').css("display", "block");
    });
    $('.tTable').on('click', function() {
        $id = $(this).attr('id');
        $('.' + $id).css('display', 'block');
        $('.' + $id).siblings().css('display', 'none');
    });
    $('.call').change(function() {
        state = $(this).val();
        if (state == "on") {
            $(this).attr('value', 'off');
            $('.rmove').attr('checked', "checked");
        } else {
            $(this).attr('value', 'on');
            $('.rmove').removeAttr('checked');
        }
        // alert(state);
    });
    $('.bar').on('click', function() {
        $('.menu').css('margin-left', '0px');
        $('.over-lay').toggle('display');
    });
    $('.times').on('click', function() {
        $('.menu').css('margin-left', '-280px');
        $('.over-lay').toggle('display');
    });

    function screenFunction(screenSize) {
        if (screenSize.matches) {
            $('.menu').css('margin-left', '-280px');
            $('.main_body').css('margin-left', '0px ');
            $('.bar').css('display', 'block');
            $('.times').css('display', 'block');
        } else {
            $('.menu').css('margin-left', '0px');
            $('.main_body').css('margin-left', '280px ');
            $('.bar').css('display', 'none');
            $('.times').css('display', 'none');
            $('.over-lay').css('display', 'none');
        }
    }
    var screenSize = window.matchMedia("(max-width: 1229px)")
    screenFunction(screenSize)
    screenSize.addListener(screenFunction);

    function screenFunction2(messageScreen) {
        if (messageScreen.matches) {
            $('.divf').css('display', 'none');
            $('.dnap').css('display', 'block');
            $('.headView').css('order', '2');
            $('.bodyView').css('order', '1');
            $('.addshowAssess').addClass('showAssess');
        } else {
            $('.divf').css('display', 'block');
            $('.dnap').css('display', 'none');
            $('.headView').css('order', '-1');
            $('.bodyView').css('order', '1');
            $('.addshowAssess').removeClass('showAssess');
        }
    }
    var messageScreen = window.matchMedia("(max-width: 767px)")
    screenFunction2(messageScreen)
    messageScreen.addListener(screenFunction2);
    $('.active').click();
    $('.parentImg').slick({
        dots: false,
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        prevArrow: '<i class="rounded-circle white-text teal waves-effect waves-blue z-depth-3  fa fa-angle-left" style="z-index:1;position:absolute;padding:7px 11px;cursor:pointer;left:-15px;top:35px"></i>',
        nextArrow: '<i class="rounded-circle white-text teal waves-effect waves-blue  z-depth-3 fa fa-angle-right" style="z-index:0;position:absolute;padding:7px 11px;cursor:pointer;right:-15px;bottom:39px"></i>',
        autoplaySpeed: 2000,
    });
    $('.persentToday').slick({
        dots: false,
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        infinite: true,
        prevArrow: '<i class="rounded-circle white-text teal waves-effect waves-blue z-depth-3  fa fa-angle-left" style="z-index:1;position:absolute;padding:7px 11px;cursor:pointer;left:-15px;top:19px"></i>',
        nextArrow: '<i class="rounded-circle white-text teal waves-effect waves-blue  z-depth-3 fa fa-angle-right" style="z-index:0;position:absolute;padding:7px 11px;cursor:pointer;right:-15px;bottom:19px"></i>',
        autoplaySpeed: 2000,
        responsive: [{
            breakpoint: 600,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
            }
        }, {
            breakpoint: 400,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
            }
        }, ]
    });
    $('select').formSelect();
    // $('.tr').pushpin({});
    $('.dnap').on('click', () => {
        $('.divf').toggle('display');
        $('.divs').toggle('display');
    })
    $('.studentFileBtn').on('click', function() {
        $('#studentFile').trigger('click');
    });
    $('.materialboxed').materialbox({

    });
});