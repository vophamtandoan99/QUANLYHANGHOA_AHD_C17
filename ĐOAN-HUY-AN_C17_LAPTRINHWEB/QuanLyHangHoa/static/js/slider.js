$(document).ready(function() {
  $('.team_slide').owlCarousel({
        loop: true,
        margin: 15,
        autoplay: true,
        autoplayTimeout: 2000,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            500: {
                items: 1,
                nav: false
            },
            1000: {
                items: 3,
                loop: true
            }
        }
    });

})