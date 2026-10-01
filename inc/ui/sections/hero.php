<?php
/**
 * Sección Hero genérica
 *
 * Campos esperados en $args:
 *   @param string $eyebrow         Texto pequeño sobre el título.
 *   @param string $title           Título principal.
 *   @param string $description     Texto descriptivo (acepta HTML básico).
 *   @param string $bg_image        URL imagen de fondo (desktop).
 *   @param string $bg_image_mobile URL imagen de fondo (mobile).
 *
 * @package promixar-theme
 */

defined('ABSPATH') || exit;

$defaults = [
    'eyebrow'         => '',
    'title'           => '',
    'description'     => '',
    'bg_image'        => '',
    'bg_image_mobile' => '',
];
$args = wp_parse_args($args ?? [], $defaults);

$eyebrow         = $args['eyebrow'];
$title           = $args['title'];
$description     = $args['description'];
$bg_image        = $args['bg_image'];
$bg_image_mobile = $args['bg_image_mobile'];

$style_desktop = $bg_image        ? ' style="background-image:url(\'' . esc_url($bg_image) . '\')"' : '';
$style_mobile  = $bg_image_mobile ? ' style="background-image:url(\'' . esc_url($bg_image_mobile) . '\')"' : '';
?>

<section class="hero"<?= $style_desktop; ?>>
    <div class="hero__inner">
        <?php if (!empty($eyebrow)): ?>
            <p class="hero__eyebrow"><?= esc_html($eyebrow); ?></p>
        <?php endif; ?>

        <?php if (!empty($title)): ?>
            <h1 class="hero__title"><?= wp_kses_post($title); ?></h1>
        <?php endif; ?>

        <?php if (!empty($description)): ?>
            <div class="hero__description rte">
                <?= wp_kses_post($description); ?>
            </div>
        <?php endif; ?>
    </div>
</section>
