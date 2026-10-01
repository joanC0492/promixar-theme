import Swiper from "swiper";
import { A11y, Navigation, Pagination } from "swiper/modules";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

document.querySelectorAll('[data-slider="home-hero"]').forEach((slider) => {
  const previousButton = slider.querySelector(".home-hero__previous");
  const nextButton = slider.querySelector(".home-hero__next");
  const pagination = slider.querySelector(".home-hero__pagination");

  new Swiper(slider, {
    loop: true,
    modules: [
      A11y,
      //  Navigation,
      Pagination,
    ],
    slidesPerView: 1,
    speed: 650,
    watchOverflow: true,
    // navigation: {
    //   prevEl: previousButton,
    //   nextEl: nextButton,
    // },
    pagination: {
      el: pagination,
      clickable: true,
    },
    a11y: {
      prevSlideMessage: "Mostrar diapositiva anterior",
      nextSlideMessage: "Mostrar diapositiva siguiente",
      paginationBulletMessage: "Mostrar diapositiva {{index}}",
    },
  });
});
