if($('.blog-categories__slider')){
  const blogCatSwiper = new Swiper ('.blog-categories__slider',{
    loop: true,
    slidesPerView: 'auto', // Allow slides to fit content
  spaceBetween: 10,      // Optional: Add spacing between slides
  breakpoints: {
    768: {
      slidesPerView: 6, // For larger screens, show exactly 6 slides
    },
    320: {
      slidesPerView: 'auto', // For smaller screens, fit to content
    },
  },
  navigation: {
    nextEl: '.blog-cat__next',
    prevEl: '.blog-cat__prev',
  },
  });
}
if($('.articles-related__slider')){
  const blogCatSwiper = new Swiper ('.articles-related__slider',{
    loop: true,
    slidesPerView: 'auto', // Allow slides to fit content
  spaceBetween: 10,      // Optional: Add spacing between slides
  breakpoints: {
    768: {
      slidesPerView: 4, // For larger screens, show exactly 6 slides
    },
    320: {
      slidesPerView: 'auto', // For smaller screens, fit to content
    },
  },
  navigation: {
    nextEl: '.article-related-slider__next',
    prevEl: '.article-related-slider__prev',
  },
  });
}