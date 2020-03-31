require('./bootstrap');
require('@fortawesome/fontawesome-free/js/all.js');

$(function () {

    // Carousel options
    $(".carousel").carousel({
        interval: false
    })

    // Subscription buttons
    $("#credit_card_btn").on('click', function (e) {
        e.preventDefault();
        $("#credit_block").show();
        $("#paypal_block").hide();
    })
    $("#paypal_btn").on('click', function (e) {
        e.preventDefault();
        $("#paypal_block").show();
        $("#credit_block").hide();
    })

    // Favorite buttons
    $(".fav-btn").on("click", function (e) {
        $.ajax({
            method: 'post',
            url: $(this).parent().attr('action'),
            data: $(this).parent().serialize(),
            success: function () {
                if ($(this).hasClass('fas')) {
                    $(this).removeClass('fas').addClass('far')
                } else {
                    $(this).removeClass('far').addClass('fas')
                }
            }
        });
        e.preventDefault();
    })

});
