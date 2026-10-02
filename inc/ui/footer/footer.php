<?php
/**
 * Contenido estático del footer.
 *
 * @package promixar-theme
 */

defined('ABSPATH') || exit;

$footer_images = rtrim(get_template_directory_uri(), '/') . '/images/footer';
?>

<footer class="footer" data-section="footer">
  <div class="container footer__container">
    <div class="row footer__main">
      <div class="col-12 col-lg-4 footer__contact">
        <div class="footer__contact-item">
          <img class="footer__contact-icon" src="<?= esc_url($footer_images . '/icon-correo.svg'); ?>" alt=""
            aria-hidden="true">
          <div class="footer__contact-copy">
            <p class="footer__label">Correo electrónico</p>
            <a class="footer__link" href="mailto:cotizacion@promixar.com">cotizacion@promixar.com</a>
            <a class="footer__link" href="mailto:arivera@promixar.com">arivera@promixar.com</a>
          </div>
        </div>

        <div class="footer__contact-item">
          <img class="footer__contact-icon" src="<?= esc_url($footer_images . '/icon-direccion.svg'); ?>" alt=""
            aria-hidden="true">
          <div class="footer__contact-copy">
            <p class="footer__label">Dirección</p>
            <address class="footer__address">Sr de los Milagros Mz H<br>Lote 9 - S.M.P.</address>
          </div>
        </div>
      </div>

      <div class="col-12 col-lg-4 footer__brand">
        <img class="footer__logo" src="<?= esc_url($footer_images . '/logo-footer.svg'); ?>"
          alt="Promixar Lubricantes Industriales">
      </div>

      <div class="col-12 col-lg-4 footer__communication">
        <div class="footer__contact-item footer__contact-item--phone">
          <img class="footer__contact-icon" src="<?= esc_url($footer_images . '/icon-telefono.svg'); ?>" alt=""
            aria-hidden="true">
          <div class="footer__contact-copy">
            <p class="footer__label">Celular</p>
            <a class="footer__link" href="tel:+51981510607">+51 981 510 607</a>
            <a class="footer__link" href="tel:+51991560276">+51 991 560 276</a>
          </div>
        </div>

        <div class="footer__social">
          <p class="footer__social-label">Síguenos en:</p>
          <a class="footer__social-link" href="#" aria-label="Facebook de Promixar">
            <img class="footer__social-icon" src="<?= esc_url($footer_images . '/icon-fb.svg'); ?>" alt=""
              aria-hidden="true">
          </a>
          <a class="footer__social-link" href="#" aria-label="YouTube de Promixar">
            <img class="footer__social-icon" src="<?= esc_url($footer_images . '/icon-youtube.svg'); ?>" alt=""
              aria-hidden="true">
          </a>
        </div>
      </div>
    </div>

    <div class="footer__bottom">
      <p class="footer__copyright">© 2026 Promixar – Todos los derechos reservados</p>
    </div>
  </div>
</footer>
