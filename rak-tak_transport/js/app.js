jQuery(document).ready(function($) {

    $('.slider_show').slick({
        slidesToShow: 3,
        prevArrow: "<div class='slick-prev'> <img src='images/prev.png'> </div>",
        nextArrow: "<div class='slick-next'> <img src='images/next.png'> </div>"
                
        
    });

    $('.news').slick({
        slidesToShow: 3,
        prevArrow: "<div class='slick-prev'> <img src='images/prev.png'> </div>",
        nextArrow: "<div class='slick-next'> <img src='images/next.png'> </div>"
        
    });
 // Works
        $('.works').slick({
        dots: true,
        arrows: false,
        vertical: true,
        slidesToShow: 1,
        verticalSwiping: true
    });

   

    
});
