<?php
/**
 * Data provider para la página Contact
 *
 * Campos ACF esperados en la página:
 *   hero_eyebrow, hero_title, hero_description, hero_bg_image, hero_bg_image_mobile
 *   contact_section_title, contact_section_description
 *   contact_email, contact_phone, contact_address
 *   contact_linkedin_url, contact_form_shortcode
 *
 * @package promixar-theme
 *
 * @return array{hero: array, form_content: array}
 */

defined('ABSPATH') || exit;

function get_contact_page_data(): array
{
  return [
    'hero' => get_section_hero_data(),
    'form_content' => [
      'title' => (string) get_field('contact_section_title'),
      'description' => (string) get_field('contact_section_description'),
      'email' => (string) get_field('contact_email'),
      'phone' => (string) get_field('contact_phone'),
      'address' => (string) get_field('contact_address'),
      'linkedin_url' => (string) get_field('contact_linkedin_url'),
      'form_shortcode' => (string) get_field('contact_form_shortcode'),
    ],
  ];
}
