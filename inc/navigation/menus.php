<?php
/**
 * Registro de menús de navegación
 *
 * @package promixar-theme
 */

defined('ABSPATH') || exit;

add_action('after_setup_theme', function () {
  register_nav_menus([
    'header-menu' => __('Header Menu', THEME_TEXT_DOMAIN),
    'footer-menu' => __('Footer Menu', THEME_TEXT_DOMAIN),
  ]);
});
