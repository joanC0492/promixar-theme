<?php
/**
 * Barra superior del encabezado.
 *
 * @package promixar-theme
 */

defined('ABSPATH') || exit;

$header = isset($args['header']) && is_array($args['header'])
  ? $args['header']
  : [];

$quotation_email = $header['quotation_email'] ?? [];
$commercial_email = $header['commercial_email'] ?? [];
$location = (string) ($header['location'] ?? '');
$social_text = (string) ($header['social_text'] ?? '');
$facebook = $header['facebook'] ?? [];
$youtube = $header['youtube'] ?? [];
$has_emails = !empty($quotation_email['url']) || !empty($commercial_email['url']);
?>

<div class="header-top">
  <div class="container header-top__container">
    <?php if ($has_emails) : ?>
      <div class="header-top__emails">
        <?= promixar_get_icon_svg('correo', 'header-top__contact-icon'); ?>

        <?php if (!empty($quotation_email['url'])) : ?>
          <a href="<?= esc_url($quotation_email['url']); ?>"
            <?php if (!empty($quotation_email['target'])) : ?>target="<?= esc_attr($quotation_email['target']); ?>"<?php endif; ?>>
            <?= esc_html($quotation_email['title']); ?>
          </a>
        <?php endif; ?>

        <?php if (!empty($quotation_email['url']) && !empty($commercial_email['url'])) : ?>
          <span class="header-top__separator" aria-hidden="true"></span>
        <?php endif; ?>

        <?php if (!empty($commercial_email['url'])) : ?>
          <a href="<?= esc_url($commercial_email['url']); ?>"
            <?php if (!empty($commercial_email['target'])) : ?>target="<?= esc_attr($commercial_email['target']); ?>"<?php endif; ?>>
            <?= esc_html($commercial_email['title']); ?>
          </a>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php if ($location !== '') : ?>
      <div class="header-top__location">
        <?= promixar_get_icon_svg('ubicacion', 'header-top__contact-icon'); ?>
        <span><?= esc_html($location); ?></span>
      </div>
    <?php endif; ?>

    <?php if ($social_text !== '' || !empty($facebook['url']) || !empty($youtube['url'])) : ?>
      <div class="header-top__social">
        <?php if ($social_text !== '') : ?>
          <span class="header-top__social-text"><?= esc_html($social_text); ?></span>
        <?php endif; ?>

        <div class="header-top__social-links">
          <?php if (!empty($facebook['url'])) : ?>
            <a class="header-top__social-link" href="<?= esc_url($facebook['url']); ?>"
              aria-label="<?= esc_attr($facebook['title'] ?: 'Facebook'); ?>"
              <?php if (!empty($facebook['target'])) : ?>target="<?= esc_attr($facebook['target']); ?>" rel="noopener noreferrer"<?php endif; ?>>
              <?= promixar_get_icon_svg('facebook', 'header-top__social-icon'); ?>
            </a>
          <?php endif; ?>

          <?php if (!empty($youtube['url'])) : ?>
            <a class="header-top__social-link" href="<?= esc_url($youtube['url']); ?>"
              aria-label="<?= esc_attr($youtube['title'] ?: 'YouTube'); ?>"
              <?php if (!empty($youtube['target'])) : ?>target="<?= esc_attr($youtube['target']); ?>" rel="noopener noreferrer"<?php endif; ?>>
              <?= promixar_get_icon_svg('youtube', 'header-top__social-icon'); ?>
            </a>
          <?php endif; ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>
