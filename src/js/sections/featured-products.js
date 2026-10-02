import Swiper from "swiper";
import { A11y, Navigation, Pagination } from "swiper/modules";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

document
  .querySelectorAll('[data-section="featured-products"]')
  .forEach((section) => {
    const showcaseSlider = section.querySelector(
      '[data-slider="featured-products-showcase"]',
    );
    const catalogSlider = section.querySelector(
      '[data-slider="featured-products-catalog"]',
    );

    if (showcaseSlider) {
      new Swiper(showcaseSlider, {
        modules: [A11y, Navigation],
        slidesPerView: 1,
        loop: true,
        speed: 650,
        watchOverflow: true,
        navigation: {
          prevEl: section.querySelector(".featured-products__previous"),
          nextEl: section.querySelector(".featured-products__next"),
        },
        a11y: {
          prevSlideMessage: "Mostrar producto destacado anterior",
          nextSlideMessage: "Mostrar producto destacado siguiente",
        },
      });
    }

    if (catalogSlider) {
      const pagination = section.querySelector(
        ".featured-products__pagination",
      );

      new Swiper(catalogSlider, {
        modules: [A11y, Pagination],
        slidesPerView: 1,
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
            slidesPerView: 2,
            slidesPerGroup: 2,
            spaceBetween: 20,
          },
          1200: {
            slidesPerView: 3,
            slidesPerGroup: 3,
            spaceBetween: 28,
          },
        },
        a11y: {
          paginationBulletMessage: "Mostrar grupo de productos {{index}}",
        },
      });
    }
  });
