import Swiper from "swiper";
import { Autoplay } from "swiper/modules";

const NORMAL_SPEED = 4300;
const HOVER_PLAYBACK_RATE = 0.8;

document
  .querySelectorAll('[data-slider="trusted-companies"]')
  .forEach((slider) => {
    const reducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)");

    const swiper = new Swiper(slider, {
      modules: [Autoplay],
      loop: true,
      slidesPerView: "auto",
      spaceBetween: 36,
      speed: NORMAL_SPEED,
      allowTouchMove: true,
      autoplay: reducedMotion.matches
        ? false
        : {
            delay: 0,
            disableOnInteraction: false,
            pauseOnMouseEnter: false,
          },
      breakpoints: {
        768: {
          spaceBetween: 56,
        },
        1200: {
          spaceBetween: 76,
        },
        1600: {
          spaceBetween: 92,
        },
      },
    });

    const wrapper = slider.querySelector(".swiper-wrapper");
    let playbackRate = 1;

    const updatePlaybackRate = () => {
      wrapper.getAnimations().forEach((animation) => {
        animation.updatePlaybackRate(playbackRate);
      });
    };

    wrapper.addEventListener("transitionrun", () => {
      window.requestAnimationFrame(updatePlaybackRate);
    });

    slider.addEventListener("pointerenter", () => {
      playbackRate = HOVER_PLAYBACK_RATE;
      updatePlaybackRate();
    });

    slider.addEventListener("pointerleave", () => {
      playbackRate = 1;
      updatePlaybackRate();
    });

    reducedMotion.addEventListener("change", ({ matches }) => {
      if (matches) {
        swiper.autoplay.stop();
        return;
      }

      swiper.autoplay.start();
    });
  });
