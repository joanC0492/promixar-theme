import Swiper from "swiper";
import { A11y, Pagination } from "swiper/modules";
import "swiper/css";
import "swiper/css/pagination";

document
  .querySelectorAll('[data-section="refrigerants"]')
  .forEach((section) => {
    const slider = section.querySelector('[data-slider="refrigerants-products"]');

    if (!slider) {
      return;
    }

    const pagination = section.querySelector(".refrigerants__pagination");

    new Swiper(slider, {
      modules: [A11y, Pagination],
      slidesPerView: "auto",
      slidesPerGroup: 1,
      spaceBetween: 16,
      speed: 550,
      centerInsufficientSlides: true,
      watchOverflow: true,
      pagination: pagination
        ? {
            el: pagination,
            clickable: true,
            bulletElement: "button",
          }
        : false,
      breakpoints: {
        768: {
          slidesPerGroup: 2,
          spaceBetween: 24,
        },
        1200: {
          slidesPerGroup: 3,
          spaceBetween: 28,
        },
      },
      a11y: {
        paginationBulletMessage: "Mostrar grupo de refrigerantes {{index}}",
      },
    });
  });
