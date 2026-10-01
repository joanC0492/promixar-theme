<?php
/**
 * Carrusel de empresas que respaldan la experiencia de Promixar.
 *
 * Los logos se renderizan dos veces para que Swiper mantenga un recorrido
 * continuo incluso cuando todos los aliados caben en pantallas amplias.
 *
 * @package promixar-theme
 */

defined('ABSPATH') || exit;

$theme_images = rtrim(get_template_directory_uri(), '/') . '/images/trusted-companies';
$trusted_companies = [
    [
        'file' => 'logo-01.svg',
        'name' => 'AIG Construye',
        'width' => 116,
        'height' => 64,
    ],
    [
        'file' => 'logo-02.svg',
        'name' => 'Solandra',
        'width' => 192,
        'height' => 39,
    ],
    [
        'file' => 'logo-03.svg',
        'name' => 'Instituto del Mar del Perú',
        'width' => 96,
        'height' => 95,
    ],
    [
        'file' => 'logo-04.svg',
        'name' => 'Marina de Guerra del Perú',
        'width' => 109,
        'height' => 109,
    ],
    [
        'file' => 'logo-05.svg',
        'name' => 'Paltarumi',
        'width' => 174,
        'height' => 69,
    ],
    [
        'file' => 'logo-06.svg',
        'name' => 'Rey Plast',
        'width' => 119,
        'height' => 105,
    ],
    [
        'file' => 'logo-07.svg',
        'name' => 'Europlast',
        'width' => 190,
        'height' => 37,
    ],
    [
        'file' => 'logo-08.svg',
        'name' => 'SIMA Perú',
        'width' => 152,
        'height' => 59,
    ],
];
?>

<section class="trusted-companies" data-section="trusted-companies"
  aria-labelledby="trusted-companies-title">
  <h2 id="trusted-companies-title">Empresas que respaldan nuestra experiencia</h2>

  <div class="trusted-companies__slider swiper" data-slider="trusted-companies">
    <div class="swiper-wrapper">
      <?php for ($cycle = 0; $cycle < 2; $cycle++) : ?>
        <?php foreach ($trusted_companies as $company) : ?>
          <div class="trusted-companies__slide swiper-slide"<?= $cycle === 1 ? ' aria-hidden="true"' : ''; ?>>
            <img class="trusted-companies__logo"
              src="<?= esc_url($theme_images . '/' . $company['file']); ?>"
              width="<?= (int) $company['width']; ?>"
              height="<?= (int) $company['height']; ?>"
              alt="<?= $cycle === 0 ? esc_attr($company['name']) : ''; ?>"
              loading="lazy">
          </div>
        <?php endforeach; ?>
      <?php endfor; ?>
    </div>
  </div>
</section>
