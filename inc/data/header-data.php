<?php
/**
 * Data provider para el encabezado global del sitio.
 *
 * @package promixar-theme
 */

defined('ABSPATH') || exit;

/**
 * Devuelve todos los datos editables usados por el header.
 *
 * @return array{
 *   top: array{
 *     quotation_email: array{url: string, title: string, target: string},
 *     commercial_email: array{url: string, title: string, target: string},
 *     location: string,
 *     social_text: string,
 *     facebook: array{url: string, title: string, target: string},
 *     youtube: array{url: string, title: string, target: string}
 *   },
 *   main: array{
 *     phone: array{url: string, title: string, target: string},
 *     whatsapp: array{url: string, title: string, target: string}
 *   }
 * }
 */
function promixar_get_header_data(): array
{
  $locations = get_nav_menu_locations();
  $header_menu_id = (int) ($locations['header-menu'] ?? 0);
  $header_menu_context = $header_menu_id > 0
    ? 'nav_menu_' . $header_menu_id
    : 'option';

  return [
    'top' => [
      'quotation_email' => get_acf_link(get_field('header_top_correo_cotizaciones', 'option')),
      'commercial_email' => get_acf_link(get_field('header_top_correo_comercial', 'option')),
      'location' => (string) get_field('header_top_ubicacion', 'option'),
      'social_text' => (string) get_field('header_top_texto_rrss', 'option'),
      'facebook' => get_acf_link(get_field('header_top_facebook', 'option')),
      'youtube' => get_acf_link(get_field('header_top_youtube', 'option')),
    ],
    'main' => [
      'phone' => get_acf_link(get_field('header_main_telefono', $header_menu_context)),
      'whatsapp' => get_acf_link(get_field('header_main_whatsapp', $header_menu_context)),
    ],
  ];
}
