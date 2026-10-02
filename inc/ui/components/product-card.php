<?php
/**
 * Card reutilizable para productos del catálogo.
 *
 * @package promixar-theme
 */

defined('ABSPATH') || exit;

$card = wp_parse_args(
    $args ?? [],
    [
        'image' => '',
        'image_alt' => '',
        'category' => '',
        'title' => '',
        'description' => '',
        'technical_url' => '#',
        'quote_url' => '#',
        'download_icon' => '',
        'whatsapp_icon' => '',
    ]
);
?>

<article class="product-card product-card--interactive">
  <div class="product-card__media" tabindex="0">
    <img class="product-card__image" src="<?= esc_url($card['image']); ?>"
      alt="<?= esc_attr($card['image_alt']); ?>" loading="lazy">

    <div class="product-card__overlay">
      <p class="product-card__description"><?= esc_html($card['description']); ?></p>
    </div>
  </div>

  <div class="product-card__content">
    <p class="product-card__category"><?= esc_html($card['category']); ?></p>
    <h3 class="product-card__title"><?= esc_html($card['title']); ?></h3>

    <div class="product-card__actions">
      <a class="product-card__action product-card__action--technical"
        href="<?= esc_url($card['technical_url']); ?>">
        <img class="product-card__action-icon" src="<?= esc_url($card['download_icon']); ?>" alt="" aria-hidden="true">
        <span class="product-card__action-label">Ficha técnica</span>
      </a>

      <a class="product-card__action product-card__action--quote"
        href="<?= esc_url($card['quote_url']); ?>">
        <img class="product-card__action-icon" src="<?= esc_url($card['whatsapp_icon']); ?>" alt="" aria-hidden="true">
        <span class="product-card__action-label">Cotizar producto</span>
      </a>
    </div>
  </div>
</article>
