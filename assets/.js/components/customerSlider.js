import $ from 'jquery'

export function customerSlider() {
    const slider = $('.our-customers__wrapper');

    slider.slick({
        slidesToShow: 2,
        slidesToScroll: 2,
        dots: true,
        appendDots: $('.our-customers__dots'),
        prevArrow: $('.our-customers__left'),
        nextArrow: $('.our-customers__right'),
        infinite: false,
        adaptiveHeight: true,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    })
}