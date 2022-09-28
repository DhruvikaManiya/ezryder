 
$('.htslider').owlCarousel({
    loop:false,
    margin:10,
    dots:true,
    autoplay:false,    
 // animateIn: 'fadeIn',
 //  animateOut: 'fadeOut', 
touchDrag  : true,
navText: ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"],
     mouseDrag  : true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:1,
            nav:false
        },
        1000:{
            items:1,
            nav:true,
            // loop:false
        }
    }
});
 
//fixed navbar
$(window).scroll(function () {

    if ($(window).scrollTop() >= 100) {
         $('body').addClass('fixed');
    } else {
        $('body').removeClass('fixed');
    }
});