
//SERVICE SLIDER from ariva
jQuery(document).ready(function ($) {
    //SERVICE SLIDER
    if ($(".ts-service-slide").length > 0) {
    
        $(".ts-service-slide").owlCarousel({
            items: 3,
            autoPlay: 6000,
            slideSpeed: 3000,
            navigation: false,
            pagination: true,
            singleItem: false,
            itemsCustom: [[0, 1],[320,1], [480, 1], [768, 2], [992, 2], [1200, 3]]
        });
    }
});