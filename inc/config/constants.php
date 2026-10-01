<?php
/**
 * Constantes del tema
 *
 * @package promixar-theme
 */

defined('ABSPATH') || exit;

// === Versión y dominio ===
define('THEME_VERSION', '1.0.0');
define('THEME_TEXT_DOMAIN', 'promixar-theme');

// === URLs (para html, enqueue) ===
define('THEME_URL', get_stylesheet_directory_uri());
define('THEME_IMG', THEME_URL . '/images');
define('THEME_FONTS', THEME_URL . '/fonts');
define('THEME_JS', THEME_URL . '/libraries/js');
define('THEME_CSS', THEME_URL . '/libraries/css');

// === Rutas del sistema de ficheros (para require_once, file_exists, glob) ===
define('THEME_DIR', get_template_directory());
define('THEME_INC_DIR', THEME_DIR . '/inc');

// === Alias de compatibilidad ===
defined('URL') || define('URL', THEME_URL); // Obtener la URL del tema
defined('IMG') || define('IMG', THEME_IMG); // Obtener la URL de la carpeta de imágenes del tema
defined('JS') || define('JS', THEME_JS); // Obtener la URL de la carpeta de scripts del tema
defined('CSS') || define('CSS', THEME_CSS); // Obtener la URL de la carpeta de estilos del tema
