<?php
/**
 * Presentación comercial de refrigerantes industriales.
 *
 * @package promixar-theme
 */

defined('ABSPATH') || exit;

$refrigerants_images = rtrim(get_template_directory_uri(), '/') . '/images/refrigerants';
$shared_images = rtrim(get_template_directory_uri(), '/') . '/images/featured-products';
$refrigerant_products = [
  [
    'category' => 'Refrigerantes',
    'title' => 'Refrigerante Coolant 50/50 Mobil',
    'description' => 'Refrigerante industrial formulado para brindar control térmico y proteger los componentes críticos del sistema.',
  ],
  [
    'category' => 'Refrigerantes',
    'title' => 'Refrigerante Coolant 50/50 Mobil',
    'description' => 'Protección confiable contra sobrecalentamiento, corrosión e incrustaciones en operaciones de alto rendimiento.',
  ],
];

$shared_card = [
  'image' => $refrigerants_images . '/refrigerants-refrigerante.png',
  'image_alt' => 'Cilindro negro de refrigerante industrial Mobil',
  'technical_url' => '#technical-information',
  'quote_url' => '#contact',
  'download_icon' => $shared_images . '/icon-card-download.svg',
  'whatsapp_icon' => $shared_images . '/icon-card-whatsapp.svg',
];

$refrigerants_wrapper_classes = 'refrigerants__wrapper swiper-wrapper';

if (count($refrigerant_products) === 2) {
  $refrigerants_wrapper_classes = 'refrigerants__wrapper refrigerants__wrapper--two swiper-wrapper';
}
?>

<section class="refrigerants" id="refrigerants" data-section="refrigerants"
  aria-labelledby="refrigerants-title">
  <div class="container refrigerants__container">
    <div class="row refrigerants__row">
      <div class="col-12 col-xl-5 refrigerants__content">
        <h2 class="refrigerants__title" id="refrigerants-title">Refrigerantes</h2>
        <p class="refrigerants__description">
          Nuestros refrigerantes industriales están formulados para ofrecer un óptimo control térmico en motores y
          sistemas de alto rendimiento, protegiendo los componentes críticos contra sobrecalentamiento, corrosión y
          formación de incrustaciones.
        </p>

        <a class="refrigerants__cta" href="#contact">
          <img class="refrigerants__cta-icon" src="<?= esc_url($shared_images . '/icon-card-whatsapp.svg'); ?>" alt=""
            aria-hidden="true">
          <span class="refrigerants__cta-label">Solicitar cotización</span>
        </a>
      </div>

      <div class="col-12 col-xl-7 refrigerants__catalog">
        <div class="refrigerants__slider swiper" data-slider="refrigerants-products">
          <div class="<?= esc_attr($refrigerants_wrapper_classes); ?>">
            <?php foreach ($refrigerant_products as $product): ?>
              <div class="refrigerants__slide swiper-slide">
                <?php
                get_template_part(
                  'inc/ui/components/product-card',
                  null,
                  array_merge($shared_card, $product)
                );
                ?>
              </div>
            <?php endforeach; ?>
          </div>

          <?php if (count($refrigerant_products) > 3): ?>
            <div class="refrigerants__pagination swiper-pagination" aria-label="Seleccionar grupo de refrigerantes">
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
