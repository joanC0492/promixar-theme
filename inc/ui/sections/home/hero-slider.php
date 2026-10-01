<?php
/**
 * Hero principal de la página de inicio.
 *
 * Contiene los tres mensajes principales del home y la estructura requerida
 * por Swiper para navegación táctil, botones y paginación.
 *
 * @package promixar-theme
 */

defined('ABSPATH') || exit;

$theme_images = rtrim(get_template_directory_uri(), '/') . '/images';
?>

<section class="home-hero" data-section="hero-slider" aria-labelledby="home-hero-title">
  <div class="home-hero__slider swiper" data-slider="home-hero">
    <div class="swiper-wrapper">
      <article class="home-hero__slide home-hero__slide--lubricants swiper-slide">
        <img class="home-hero__background" src="<?= esc_url($theme_images . '/hero-banner-1.png'); ?>"
          alt="" fetchpriority="high" aria-hidden="true">

        <div class="container home-hero__container">
          <div class="row home-hero__row">
            <div class="col-12 col-lg-5 home-hero__content">
              <h1 id="home-hero-title">Soluciones en lubricación para el sector industrial</h1>
              <p>Stock inmediato en presentaciones industriales para operaciones exigentes.</p>

              <div class="home-hero__actions">
                <a class="home-hero__button home-hero__button--primary" href="#contact">
                  <img src="<?= esc_url($theme_images . '/icon-whatsapp.svg'); ?>" alt="" aria-hidden="true">
                  <span>Cotizar</span>
                </a>
                <a class="home-hero__button home-hero__button--secondary" href="#industrial-lubricants">
                  Ver productos
                </a>
              </div>
            </div>

            <div class="col-12 col-lg-7 home-hero__media home-hero__media--lubricants">
              <img src="<?= esc_url($theme_images . '/hero-banner-1-image.png'); ?>"
                alt="Lubricantes industriales Shell Air Tool Oil, Tellus y Omala">
            </div>
          </div>
        </div>
      </article>

      <article class="home-hero__slide home-hero__slide--greases swiper-slide">
        <img class="home-hero__background" src="<?= esc_url($theme_images . '/hero-banner-2.png'); ?>"
          alt="" loading="lazy" aria-hidden="true">

        <div class="container home-hero__container">
          <div class="row home-hero__row justify-content-center">
            <div class="col-12 col-lg-9 home-hero__content home-hero__content--centered">
              <h2>Grasas industriales para operaciones exigentes</h2>
              <p>Máxima protección para maquinaria en condiciones extremas.</p>

              <div class="home-hero__actions">
                <a class="home-hero__button home-hero__button--primary" href="#contact">
                  <img src="<?= esc_url($theme_images . '/icon-whatsapp.svg'); ?>" alt="" aria-hidden="true">
                  <span>Cotizar</span>
                </a>
                <a class="home-hero__button home-hero__button--secondary" href="#industrial-lubricants">
                  Ver productos
                </a>
              </div>
            </div>
          </div>
        </div>
      </article>

      <article class="home-hero__slide home-hero__slide--refrigerants swiper-slide">
        <img class="home-hero__background" src="<?= esc_url($theme_images . '/hero-banner-3.png'); ?>"
          alt="" loading="lazy" aria-hidden="true">

        <div class="container home-hero__container">
          <div class="row home-hero__row align-items-center">
            <div class="col-12 col-lg-6 home-hero__media home-hero__media--refrigerants">
              <img src="<?= esc_url($theme_images . '/hero-banner-3-image.png'); ?>"
                alt="Cilindro de lubricante Mobil para flotas industriales" loading="lazy">
            </div>

            <div class="col-12 col-lg-5 offset-lg-1 home-hero__content home-hero__content--refrigerants">
              <h2>Protege tu flota y equipos frente a altas temperaturas</h2>
              <p>Refrigerantes industriales que prolongan la vida útil de motores y equipos.</p>

              <div class="home-hero__actions">
                <a class="home-hero__button home-hero__button--primary" href="#contact">
                  <img src="<?= esc_url($theme_images . '/icon-whatsapp.svg'); ?>" alt="" aria-hidden="true">
                  <span>Cotizar</span>
                </a>
                <a class="home-hero__button home-hero__button--secondary" href="#industrial-lubricants">
                  Ver productos
                </a>
              </div>
            </div>
          </div>
        </div>
      </article>
    </div>

    <button class="home-hero__navigation home-hero__previous swiper-button-prev" type="button"
      aria-label="Mostrar diapositiva anterior"></button>
    <button class="home-hero__navigation home-hero__next swiper-button-next" type="button"
      aria-label="Mostrar diapositiva siguiente"></button>

    <div class="home-hero__pagination swiper-pagination" aria-label="Seleccionar diapositiva"></div>
  </div>
</section>
