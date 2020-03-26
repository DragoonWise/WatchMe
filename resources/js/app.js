require('./bootstrap');
require('@fortawesome/fontawesome-free/js/all.js');

$(function () {

    $(".carousel").carousel({
        interval: false
    })

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

});
