<?php
/**
 * Navegación principal del encabezado.
 *
 * @package promixar-theme
 */

defined('ABSPATH') || exit;

$header = isset($args['header']) && is_array($args['header'])
  ? $args['header']
  : [];

$phone = $header['phone'] ?? [];
$whatsapp = $header['whatsapp'] ?? [];
?>

<div class="header-main">
  <div class="header-main__shell">
    <div class="container header-main__container">
      <div class="header-main__brand">
        <?php the_custom_logo(); ?>
      </div>

      <div class="header-main__navigation">
        <button class="header-main__menu-toggle" type="button" aria-expanded="false"
          aria-controls="header-primary-navigation" aria-label="Abrir o cerrar el menú principal">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </button>

        <nav class="header-main__nav" id="header-primary-navigation" aria-label="Navegación principal">
          <?php
          wp_nav_menu([
            'theme_location' => 'header-menu',
            'container' => false,
            'menu_class' => 'header-main__menu',
            'fallback_cb' => false,
            'depth' => 2,
          ]);
          ?>
        </nav>
      </div>

      <div class="header-main__actions">
        <?php if (!empty($phone['url'])) : ?>
          <a class="header-button header-button--phone" href="<?= esc_url($phone['url']); ?>"
            <?php if (!empty($phone['target'])) : ?>target="<?= esc_attr($phone['target']); ?>"<?php endif; ?>>
            <?= promixar_get_icon_svg('telefono', 'header-button__icon'); ?>
            <span><?= esc_html($phone['title']); ?></span>
          </a>
        <?php endif; ?>

        <?php if (!empty($whatsapp['url'])) : ?>
          <a class="header-button header-button--whatsapp" href="<?= esc_url($whatsapp['url']); ?>"
            <?php if (!empty($whatsapp['target'])) : ?>target="<?= esc_attr($whatsapp['target']); ?>" rel="noopener noreferrer"<?php endif; ?>>
            <?= promixar_get_icon_svg('whatsapp', 'header-button__icon'); ?>
            <span><?= esc_html($whatsapp['title']); ?></span>
          </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
