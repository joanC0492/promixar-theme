(function () {
  document
    .querySelectorAll(".header-main__navigation")
    .forEach((navigation) => {
      const toggle = navigation.querySelector(".header-main__menu-toggle");

      if (!toggle) {
        return;
      }

      const closeMenu = () => {
        navigation.classList.remove("is-open");
        toggle.setAttribute("aria-expanded", "false");
      };

      toggle.addEventListener("click", () => {
        const isOpen = navigation.classList.toggle("is-open");
        toggle.setAttribute("aria-expanded", isOpen ? "true" : "false");
      });

      navigation.addEventListener("click", (event) => {
        if (event.target.closest("a") && window.innerWidth <= 1024) {
          closeMenu();
        }
      });

      window.addEventListener("resize", () => {
        if (window.innerWidth > 1024) {
          closeMenu();
        }
      });
    });
})();
