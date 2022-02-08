$(document).ready(function (){
    let prev = '<span style="font-size:70px;padding: 0px 20px 0px 20px;"><div class="menu-overlay-next"></div><i class="fas fa-chevron-right"></i></span>';
    let next = '<span style="font-size:70px;padding: 0px 20px 0px 20px;"><div class="menu-overlay-prev"></div><i class="fas fa-chevron-left"></i></span>';
    $('.menulist-carousel').owlCarousel({
        loop:false,
        nav:false,
        navText:[next,prev],
        responsive:{
            200:
            {
                items:2,
                margin:250,
                stagePadding:0
            },
            400:
            {
                items:2,
                margin:150,
                stagePadding:0
            },
            600:
            {
                items:3,
                margin:270,
                stagePadding:0
            },
            900:
            {
                items:4,
                margin:270,
                stagePadding:0
            },
            1000:
            {
                items:5,
                margin:270,
                stagePadding:0
            },
            1200:
            {
                items:6,
                margin:270,
                stagePadding:0
            },
            2000:
            {
                items:7,
                margin:270,
                stagePadding:0
            }
        }
    })
});