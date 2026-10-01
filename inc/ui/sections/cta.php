<?php
/**
 * Sección CTA (Call To Action) genérica
 *
 * @package promixar-theme
 *
 * @param string $title       Título del CTA.
 * @param string $description Texto descriptivo.
 * @param string $btn_label   Texto del botón.
 * @param string $btn_url     URL del botón.
 */

defined('ABSPATH') || exit;

$defaults = [
  'title' => '',
  'description' => '',
  'btn_label' => '',
  'btn_url' => '',
];
$args = wp_parse_args($args ?? [], $defaults);

$title = $args['title'];
$description = $args['description'];
$btn_label = $args['btn_label'];
$btn_url = $args['btn_url'];
?>

<section class="cta">
  <div class="container">
    <?php if (!empty($title)): ?>
      <h2><?= wp_kses_post($title); ?></h2>
    <?php endif; ?>

    <?php if (!empty($description)): ?>
      <p><?= wp_kses_post($description); ?></p>
    <?php endif; ?>

    <?php if (!empty($btn_label) && !empty($btn_url)): ?>
      <a class="btn" href="<?= esc_url($btn_url); ?>">
        <?= esc_html($btn_label); ?>
      </a>
    <?php endif; ?>
  </div>
</section>
