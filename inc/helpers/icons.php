<?php
/**
 * Renderizado seguro de iconos SVG incluidos en el tema.
 *
 * @package promixar-theme
 */

defined('ABSPATH') || exit;

/**
 * Devuelve un icono SVG inline desde una lista cerrada de archivos locales.
 *
 * Los SVG son recursos controlados por el tema. Al insertarlos inline pueden
 * heredar el color CSS mediante currentColor.
 *
 * @param string $icon  Nombre lógico del icono.
 * @param string $class Clase CSS adicional.
 * @return string
 */
function promixar_get_icon_svg(string $icon, string $class = ''): string
{
  $icons = [
    'correo' => 'icon-correo.svg',
    'ubicacion' => 'icon-ubicacion.svg',
    'facebook' => 'icon-facebook.svg',
    'youtube' => 'icon-youtube.svg',
    'telefono' => 'icon-telefono.svg',
    'whatsapp' => 'icon-whatsapp.svg',
  ];

  if (!isset($icons[$icon])) {
    return '';
  }

  $path = THEME_DIR . '/images/header/' . $icons[$icon];

  if (!is_readable($path)) {
    return '';
  }

  $svg = file_get_contents($path);

  if ($svg === false) {
    return '';
  }

  $attributes = sprintf(
    'class="%s" data-icon="%s" aria-hidden="true" focusable="false"',
    esc_attr(trim('icon ' . $class)),
    esc_attr($icon)
  );

  return (string) preg_replace('/<svg\b/', '<svg ' . $attributes, $svg, 1);
}
