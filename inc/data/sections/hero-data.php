<?php
/**
 * Mapper de la sección Hero (reutilizable por cualquier página)
 *
 * Requiere que la página tenga clonado el grupo "Section | Hero".
 *
 * Si el clone usa prefijo en ACF (Display → Prefix Field Names), pasar
 * el prefijo como argumento. Ejemplo con clone llamado "hero":
 *   get_section_hero_data('hero_')  →  lee "hero_hero_eyebrow", etc.
 * Sin prefijo (seamless):
 *   get_section_hero_data()         →  lee "hero_eyebrow", etc.
 *
 * @package promixar-theme
 *
 * @param  string $prefix  Prefijo que ACF antepone al clonar (incluir el guion bajo final).
 * @return array{eyebrow: string, title: string, description: string, bg_image: string, bg_image_mobile: string}
 */

defined('ABSPATH') || exit;

function get_section_hero_data(string $prefix = ''): array
{
  return [
    'eyebrow' => (string) get_field($prefix . 'hero_eyebrow'),
    'title' => (string) get_field($prefix . 'hero_title'),
    'description' => (string) get_field($prefix . 'hero_description'),
    'bg_image' => get_image_url(get_field($prefix . 'hero_bg_image')),
    'bg_image_mobile' => get_image_url(get_field($prefix . 'hero_bg_image_mobile')),
  ];
}
