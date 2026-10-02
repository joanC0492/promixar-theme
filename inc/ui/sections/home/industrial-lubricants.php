<?php
/**
 * Catálogo de lubricantes industriales organizado por categorías.
 *
 * @package promixar-theme
 */

defined('ABSPATH') || exit;

$theme_images = rtrim(get_template_directory_uri(), '/') . '/images/featured-products';
$shared_card = [
  'image' => $theme_images . '/barril-shell.png',
  'image_alt' => 'Cilindro de lubricante industrial Shell',
  'technical_url' => '#technical-information',
  'quote_url' => '#contact',
  'download_icon' => $theme_images . '/icon-card-download.svg',
  'whatsapp_icon' => $theme_images . '/icon-card-whatsapp.svg',
];

$product_categories = [
  'hydraulics' => [
    'label' => 'Hidráulicos',
    'products' => [
      [
        'category' => 'Lubricantes industriales',
        'title' => 'Aceite Tellus S2 MX 32',
        'description' => 'Aceite hidráulico diseñado para proteger equipos industriales y mantener un desempeño confiable.',
      ],
      [
        'category' => 'Lubricantes industriales',
        'title' => 'Aceite Tellus S2 MX 46',
        'description' => 'Aceite hidráulico de alto rendimiento para sistemas sometidos a jornadas de trabajo exigentes.',
      ],
      [
        'category' => 'Lubricantes industriales',
        'title' => 'Aceite Tellus S2 MX 68',
        'description' => 'Protección hidráulica estable para ayudar a prolongar la vida útil de los componentes.',
      ],
    ],
  ],
  'gears' => [
    'label' => 'Engranajes',
    'products' => [
      [
        'category' => 'Engranajes',
        'title' => 'Aceite Omala S2 GX 100',
        'description' => 'Lubricante formulado para proteger engranajes industriales frente al desgaste y la corrosión.',
      ],
      [
        'category' => 'Engranajes',
        'title' => 'Aceite Omala S2 GX 150',
        'description' => 'Protección confiable para transmisiones y engranajes que trabajan bajo cargas elevadas.',
      ],
      [
        'category' => 'Engranajes',
        'title' => 'Aceite Omala S2 GX 220',
        'description' => 'Rendimiento estable para sistemas cerrados de engranajes industriales de servicio pesado.',
      ],
      [
        'category' => 'Engranajes',
        'title' => 'Aceite Omala S2 GX 320',
        'description' => 'Película lubricante resistente para componentes sometidos a presión y operación continua.',
      ],
      [
        'category' => 'Engranajes',
        'title' => 'Aceite Omala S2 GX 460',
        'description' => 'Lubricación de alta viscosidad para engranajes industriales que requieren máxima protección.',
      ],
    ],
  ],
  'drilling' => [
    'label' => 'Perforación',
    'products' => [
      [
        'category' => 'Lubricantes industriales',
        'title' => 'Aceite Air Tool 100',
        'description' => 'Desarrollado para cumplir con los requerimientos especiales de lubricación de herramientas neumáticas, incluyendo las de percusión sujetas a las más arduas condiciones.',
      ],
      [
        'category' => 'Lubricantes industriales',
        'title' => 'Aceite Air Tool 150',
        'description' => 'Protección especializada para herramientas neumáticas utilizadas en operaciones de perforación exigentes.',
      ],
    ],
  ],
];
?>

<section class="industrial-lubricants" id="industrial-lubricants" data-section="industrial-lubricants"
  aria-labelledby="industrial-lubricants-title">
  <div class="container industrial-lubricants__container">
    <div class="row industrial-lubricants__row">
      <header class="col-12 col-lg-3 industrial-lubricants__intro">
        <h2 id="industrial-lubricants-title" class="industrial-lubricants__title">Lubricantes industriales</h2>
        <p>Distribución exclusiva en <strong>presentaciones de Cilindro 55 Gls</strong></p>
      </header>

      <div class="col-12 col-lg-9 industrial-lubricants__catalog">
        <h3 class="industrial-lubricants__catalog-title">Lubricantes para cada necesidad</h3>

        <div class="industrial-lubricants__tabs" role="tablist" aria-label="Categorías de lubricantes">
          <?php foreach ($product_categories as $category_key => $category): ?>
            <?php $is_active = $category_key === 'hydraulics'; ?>
            <button class="industrial-lubricants__tab" id="industrial-tab-<?= esc_attr($category_key); ?>" type="button"
              role="tab" aria-selected="<?= $is_active ? 'true' : 'false'; ?>"
              aria-controls="industrial-panel-<?= esc_attr($category_key); ?>" tabindex="<?= $is_active ? '0' : '-1'; ?>"
              data-category="<?= esc_attr($category_key); ?>">
              <?= esc_html($category['label']); ?>
            </button>
          <?php endforeach; ?>
        </div>

        <div class="industrial-lubricants__panels">
          <?php foreach ($product_categories as $category_key => $category): ?>
            <?php $is_active = $category_key === 'hydraulics'; ?>
            <div class="industrial-lubricants__panel" id="industrial-panel-<?= esc_attr($category_key); ?>"
              role="tabpanel" aria-labelledby="industrial-tab-<?= esc_attr($category_key); ?>"
              data-category-panel="<?= esc_attr($category_key); ?>" <?= $is_active ? '' : ' hidden'; ?>>
              <div class="industrial-lubricants__slider swiper" data-slider="industrial-products">
                <div class="swiper-wrapper">
                  <?php foreach ($category['products'] as $product): ?>
                    <div class="industrial-lubricants__slide swiper-slide">
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

                <?php if (count($category['products']) > 3): ?>
                  <div class="industrial-lubricants__pagination swiper-pagination"
                    aria-label="Seleccionar grupo de productos"></div>
                <?php endif; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>
