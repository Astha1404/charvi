$(document).ready(function (){
    $('.main-carousel').owlCarousel({
        items:1,
        nav:false,
        dots:false,
        loop:true,
        revind:true,
        smartspeed:450,
        autoplay:true,
        autoplayTimeout:2000,
        margin:30,
        animateIn: 'animate__backInLeft',
        animateOut: 'animate__backOutRight'
    });
    let prev = '<span style="font-size:70px;padding: 0px 20px;"><div class="menu-overlay-next"></div><i class="fas fa-chevron-right"></i></span>';
    let next = '<span style="font-size:70px;padding: 0px 20px;"><div class="menu-overlay-prev"></div><i class="fas fa-chevron-left"></i></span>';
    $('.menulist-carousel').owlCarousel({
        center:true,
        loop:true,
        stagePadding:50,
        nav:true,
        navText:[next,prev],
        responsive:{
            200:
            {
                items:2,
                margin:10,
                stagePadding:0
            },
            400:
            {
                items:2,
                margin:10,
                stagePadding:20
            },
            600:
            {
                items:3,
                margin:10,
                stagePadding:40
            },
            1000:
            {
                items:5,
                margin:20,
                stagePadding:50
            }
        }
    })
});