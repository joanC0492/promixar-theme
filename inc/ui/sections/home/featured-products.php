<?php
/**
 * Sección de productos destacados.
 *
 * @package promixar-theme
 */

defined('ABSPATH') || exit;

$featured_images = rtrim(get_template_directory_uri(), '/') . '/images/featured-products';
$featured_main_images = rtrim(get_template_directory_uri(), '/') . '/images/featured-products-main';

$showcase_products = [
    [
        'category' => 'Lubricantes industriales',
        'title' => 'Aceite Tellus S2 MX 68',
        'description' => 'Los fluidos de Shell Tellus S2 MX ayudan a prolongar los intervalos de mantenimiento de los equipos al resistir la degradación térmica y química. Esto reduce al mínimo cualquier formación de sedimentos nocivos y proporciona una mayor confiabilidad y limpieza del sistema.',
        'scene' => 'featured-products__scene--hydraulic',
    ],
    [
        'category' => 'Lubricantes industriales',
        'title' => 'Aceite Tellus S2 MX 46',
        'description' => 'Aceite hidráulico de alta calidad desarrollado para ofrecer protección confiable frente al desgaste, conservar la limpieza del sistema y mantener un desempeño estable durante jornadas exigentes.',
        'scene' => 'featured-products__scene--maintenance',
    ],
    [
        'category' => 'Lubricantes industriales',
        'title' => 'Aceite Air Tool 100',
        'description' => 'Lubricante formulado para herramientas neumáticas sometidas a operaciones intensivas, con protección frente a la corrosión y una película resistente para condiciones de trabajo demandantes.',
        'scene' => 'featured-products__scene--pneumatic',
    ],
];

$catalog_products = [
    ['title' => 'Grasa XHP 681 Mine', 'description' => 'Grasa industrial para equipos mineros expuestos a cargas elevadas y condiciones severas.'],
    ['title' => 'Grasa CMP Premium Construction & Mining', 'description' => 'Protección de alto rendimiento para maquinaria de construcción y minería.'],
    ['title' => 'Grasa Mobilgrease XHP 222 Lithium Complex', 'description' => 'Grasa multipropósito de complejo de litio con excelente adhesión y resistencia al agua.'],
    ['title' => 'Grasa Mobilgrease XHP 462', 'description' => 'Lubricación confiable para rodamientos y componentes sometidos a servicio industrial pesado.'],
    ['title' => 'Grasa Mobilgrease XHP 461', 'description' => 'Grasa industrial estable para proteger componentes frente al desgaste y la humedad.'],
];
?>

<section class="featured-products" id="featured-products" data-section="featured-products"
  aria-labelledby="featured-products-title">
  <div class="container featured-products__container">
    <h2 class="featured-products__title" id="featured-products-title">Productos destacados</h2>

    <div class="featured-products__showcase">
      <div class="featured-products__showcase-slider swiper" data-slider="featured-products-showcase">
        <div class="featured-products__showcase-wrapper swiper-wrapper">
          <?php foreach ($showcase_products as $product) : ?>
            <article class="featured-products__showcase-slide swiper-slide">
              <div class="featured-products__showcase-media">
                <div class="featured-products__scene <?= esc_attr($product['scene']); ?>" aria-hidden="true">
                  <img class="featured-products__scene-image"
                    src="<?= esc_url($featured_main_images . '/image-card-cilindro-slider.png'); ?>" alt="" loading="lazy">
                </div>
                <img class="featured-products__showcase-image"
                  src="<?= esc_url($featured_main_images . '/card-cilindro-slider.png'); ?>"
                  alt="Cilindro de <?= esc_attr($product['title']); ?>" loading="lazy">
              </div>

              <div class="featured-products__showcase-content">
                <p class="featured-products__eyebrow"><?= esc_html($product['category']); ?></p>
                <h3 class="featured-products__product-title"><?= esc_html($product['title']); ?></h3>
                <p class="featured-products__description"><?= esc_html($product['description']); ?></p>

                <div class="featured-products__actions">
                  <a class="featured-products__action featured-products__action--quote" href="#contact">
                    <img class="featured-products__action-icon"
                      src="<?= esc_url($featured_images . '/icon-card-whatsapp.svg'); ?>" alt="" aria-hidden="true">
                    <span class="featured-products__action-label">Cotizar producto</span>
                  </a>
                  <a class="featured-products__action featured-products__action--technical"
                    href="#technical-information">
                    <img class="featured-products__action-icon"
                      src="<?= esc_url($featured_images . '/icon-card-download.svg'); ?>" alt="" aria-hidden="true">
                    <span class="featured-products__action-label">Ficha técnica</span>
                  </a>
                </div>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      </div>

      <button class="featured-products__navigation featured-products__previous" type="button"
        aria-label="Mostrar producto destacado anterior">
        <span class="featured-products__navigation-icon" aria-hidden="true">←</span>
      </button>
      <button class="featured-products__navigation featured-products__next" type="button"
        aria-label="Mostrar producto destacado siguiente">
        <span class="featured-products__navigation-icon" aria-hidden="true">→</span>
      </button>
    </div>

    <div class="featured-products__catalog">
      <article class="featured-products__category-card">
        <img class="featured-products__category-image"
          src="<?= esc_url($featured_main_images . '/featured-products-category-card.png'); ?>"
          alt="" aria-hidden="true" loading="lazy">
        <div class="featured-products__category-overlay" aria-hidden="true"></div>
        <div class="featured-products__category-content">
          <h3 class="featured-products__category-title">Grasas industriales</h3>
          <a class="featured-products__category-action" href="#contact">
            <img class="featured-products__category-icon"
              src="<?= esc_url($featured_images . '/icon-card-whatsapp.svg'); ?>" alt="" aria-hidden="true">
            <span class="featured-products__category-label">Cotizar</span>
          </a>
        </div>
      </article>

      <div class="featured-products__catalog-column">
        <div class="featured-products__catalog-slider swiper" data-slider="featured-products-catalog">
          <div class="featured-products__catalog-wrapper swiper-wrapper">
            <?php foreach ($catalog_products as $product) : ?>
              <div class="featured-products__catalog-slide swiper-slide">
                <?php
                get_template_part(
                    'inc/ui/components/product-card',
                    null,
                    [
                        'image' => $featured_images . '/barril-shell.png',
                        'image_alt' => 'Cilindro de ' . $product['title'],
                        'category' => 'Grasas industriales',
                        'title' => $product['title'],
                        'description' => $product['description'],
                        'technical_url' => '#technical-information',
                        'quote_url' => '#contact',
                        'download_icon' => $featured_images . '/icon-card-download.svg',
                        'whatsapp_icon' => $featured_images . '/icon-card-whatsapp.svg',
                    ]
                );
                ?>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

        <?php if (count($catalog_products) > 3) : ?>
          <div class="featured-products__pagination swiper-pagination" aria-label="Paginación de grasas industriales"></div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
