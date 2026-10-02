<?php
/**
 * Cintillo de beneficios del servicio.
 *
 * @package promixar-theme
 */

defined('ABSPATH') || exit;

$service_benefits_images = rtrim(get_template_directory_uri(), '/') . '/images/service-benefits';
$service_benefits = [
    ['icon' => 'benefits-logo-01.svg', 'label' => 'Entregas express'],
    ['icon' => 'benefits-logo-02.svg', 'label' => 'Stock permanente'],
    ['icon' => 'benefits-logo-03.svg', 'label' => 'Garantía certificada'],
    ['icon' => 'benefits-logo-04.svg', 'label' => 'Soporte post-venta'],
];
?>

<section class="service-benefits" data-section="service-benefits" aria-label="Beneficios del servicio">
  <div class="container service-benefits__container">
    <ul class="row service-benefits__list">
      <?php foreach ($service_benefits as $benefit) : ?>
        <li class="col-12 col-sm-6 col-xl-3 service-benefits__item">
          <div class="service-benefits__item-content">
            <img class="service-benefits__icon"
              src="<?= esc_url($service_benefits_images . '/' . $benefit['icon']); ?>" alt="" aria-hidden="true"
              loading="lazy">
            <p class="service-benefits__label"><?= esc_html($benefit['label']); ?></p>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>
