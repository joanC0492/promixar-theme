<?php
/**
 * Configuración del excerpt
 *
 * @package promixar-theme
 */

defined('ABSPATH') || exit;

add_filter('excerpt_length', fn($length) => 30);
