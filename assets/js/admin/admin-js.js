jQuery(document).ready(function ($) {
    // Listen for change event on radio buttons within the #display_type div
    $("#display_type input[name='_rp_display_type']").on('change', function () {
        if ($("#display_type_block").is(':checked')) {
            $(".rp-number-slider-container").fadeIn('slow').style('display:flex'); // Show the input
        } else {
            $(".rp-number-slider-container").fadeOut('slow'); // Hide the input
        }
    });

    // Trigger the change event on page load to set the initial visibility
    $("#display_type input[name='_rp_display_type']:checked").trigger('change');
});