jQuery(document).ready(function ($) {
    const numberItem = rp_variable.rp_number_item_slider;

    $(".owl-carousel").owlCarousel({
        rtl: true,
        dots: true,
        margin: 10,
        loop: true,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: numberItem
            },
            1000: {
                items: numberItem
            }
        }
    });
});