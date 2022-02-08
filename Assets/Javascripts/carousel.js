$(document).ready(function (){
    $('.main-carousel').owlCarousel({
        items:1,
        nav:false,
        dots:false,
        loop:true,
        revind:true,
        autoplay:true,
        autoplayTimeout:4000,
        margin:100,
        animateIn: 'animate__backInLeft',
        animateOut: 'animate__backOutRight'
    });
});