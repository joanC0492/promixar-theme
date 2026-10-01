<?php
/**
 * Helpers para ACF
 *
 * @package promixar-theme
 */

defined('ABSPATH') || exit;

/**
 * Devuelve la URL de una imagen ACF (array o ID) o una cadena vacía.
 *
 * @param  array|int|string $image Valor del campo ACF image.
 * @return string
 */
function get_image_url($image): string
{
  if (empty($image)) {
    return '';
  }

  if (is_array($image)) {
    return (string) ($image['url'] ?? '');
  }

  if (is_numeric($image)) {
    $url = wp_get_attachment_url((int) $image);
    return $url ? (string) $url : '';
  }

  return (string) $image;
}

/**
 * Normaliza un campo ACF de tipo Link.
 *
 * Siempre devuelve un array con las tres claves, sin importar si el campo
 * está vacío o si ACF devuelve false.
 *
 * Uso: get_acf_link(get_field('cta_link'))
 *
 * @param  mixed $link Valor del campo ACF link.
 * @return array{url: string, title: string, target: string}
 */
function get_acf_link($link): array
{
  $defaults = ['url' => '', 'title' => '', 'target' => ''];

  if (empty($link) || !is_array($link)) {
    return $defaults;
  }

  return [
    'url' => (string) ($link['url'] ?? ''),
    'title' => (string) ($link['title'] ?? ''),
    'target' => (string) ($link['target'] ?? ''),
  ];
}
