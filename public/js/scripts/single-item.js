$(document).ready(function(){
    $('.single-item').slick()

    $('.multiple-items').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3
    });
});


