<?php
/**
 * Theme Support
 *
 * @package promixar-theme
 */

defined('ABSPATH') || exit;

add_action('after_setup_theme', function () {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support(
    'html5',
    [
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption'
    ]
  );

  add_theme_support('custom-logo', [
    'height' => 100,
    'width' => 380,
    'flex-height' => true,
    'flex-width' => true,
    'unlink-homepage-logo' => false,
  ]);
});
