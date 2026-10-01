<?php
/**
 * Enqueue de estilos y scripts
 *
 * @package promixar-theme
 */

defined('ABSPATH') || exit;

add_action('wp_enqueue_scripts', function () {
  $app_css_path = THEME_DIR . '/public/css/app.min.css';
  $main_js_path = THEME_DIR . '/public/js/main.min.js';
  $app_css_version = is_file($app_css_path)
    ? (string) filemtime($app_css_path)
    : THEME_VERSION;
  $main_js_version = is_file($main_js_path)
    ? (string) filemtime($main_js_path)
    : THEME_VERSION;

  // CSS
  wp_enqueue_style(
    'style',
    get_stylesheet_uri(),
    [],
    THEME_VERSION,
    'all'
  );
  // wp_enqueue_style(
  //   'accordion',
  //   THEME_CSS . '/accordion.css',
  //   ['style'],
  //   THEME_VERSION,
  //   'all'
  // );
  wp_enqueue_style(
    'theme-app',
    THEME_URL . '/public/css/app.min.css',
    [],
    $app_css_version,
    'all'
  );

  // JavaScript
  // wp_enqueue_script(
  //   'accordion-js',
  //   THEME_JS . '/accordion.min.js',
  //   [],
  //   THEME_VERSION,
  //   true
  // );
  wp_enqueue_script(
    'theme-main',
    THEME_URL . '/public/js/main.min.js',
    [],
    $main_js_version,
    true
  );
});

add_action('wp_enqueue_scripts', function () {
  wp_dequeue_style('wp-block-library');
  wp_dequeue_style('wp-block-library-theme');
}, 100);
