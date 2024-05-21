/**
 */

jQuery(document).ready(function ($) {
    /*
    $(function() {

        var toc = $("#cbtoc").tocify({
            selectors: "h2,h3,h4,h5",
            theme: "bootstrap3",
            context: '.col-md-9'
        }).data("toc-tocify");

        //prettyPrint();
        //$(".optionName").popover({ trigger: "hover" });


    });

    */
    //smooth scroll
    $('.gotome').smoothScroll(
        {
            speed: 3000
        }
    );
});