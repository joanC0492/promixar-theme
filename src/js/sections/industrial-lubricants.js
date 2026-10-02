import Swiper from "swiper";
import { A11y, Pagination } from "swiper/modules";
import "swiper/css";
import "swiper/css/pagination";

document
  .querySelectorAll('[data-section="industrial-lubricants"]')
  .forEach((section) => {
    const tabs = Array.from(
      section.querySelectorAll('.industrial-lubricants__tab[role="tab"]'),
    );
    const panels = Array.from(
      section.querySelectorAll('.industrial-lubricants__panel[role="tabpanel"]'),
    );

    const initializeSlider = (panel) => {
      const slider = panel.querySelector('[data-slider="industrial-products"]');

      if (slider.swiper) {
        slider.swiper.update();
        slider.swiper.slideTo(0);
        return slider.swiper;
      }

      const pagination = slider.querySelector(
        ".industrial-lubricants__pagination",
      );

      return new Swiper(slider, {
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
            spaceBetween: 24,
          },
        },
        a11y: {
          paginationBulletMessage: "Mostrar grupo de productos {{index}}",
        },
      });
    };

    const activateTab = (activeTab, moveFocus = false) => {
      const category = activeTab.dataset.category;

      tabs.forEach((tab) => {
        const isActive = tab === activeTab;
        tab.setAttribute("aria-selected", String(isActive));
        tab.tabIndex = isActive ? 0 : -1;
      });

      panels.forEach((panel) => {
        const isActive = panel.dataset.categoryPanel === category;
        panel.hidden = !isActive;

        if (isActive) {
          initializeSlider(panel);
        }
      });

      if (moveFocus) {
        activeTab.focus();
      }
    };

    tabs.forEach((tab, index) => {
      tab.addEventListener("click", () => activateTab(tab));
      tab.addEventListener("keydown", (event) => {
        let nextIndex = null;

        if (event.key === "ArrowRight") {
          nextIndex = (index + 1) % tabs.length;
        } else if (event.key === "ArrowLeft") {
          nextIndex = (index - 1 + tabs.length) % tabs.length;
        } else if (event.key === "Home") {
          nextIndex = 0;
        } else if (event.key === "End") {
          nextIndex = tabs.length - 1;
        }

        if (nextIndex === null) {
          return;
        }

        event.preventDefault();
        activateTab(tabs[nextIndex], true);
      });
    });

    const initialTab = tabs.find(
      (tab) => tab.getAttribute("aria-selected") === "true",
    );

    if (initialTab) {
      activateTab(initialTab);
    }
  });
