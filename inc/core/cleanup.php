<?php
/**
 * Limpieza de WordPress (emojis, block library CSS)
 *
 * @package promixar-theme
 */

defined('ABSPATH') || exit;

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
