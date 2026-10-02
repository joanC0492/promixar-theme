<?php
/**
 * Plantilla principal de la página de inicio.
 *
 * Compone las secciones estáticas del home en el mismo orden del diseño.
 * Los datos dinámicos y la integración con ACF se incorporarán en una fase
 * posterior sin modificar la responsabilidad de cada template part.
 *
 * Template Name: Inicio
 *
 * @package promixar-theme
 */
get_header();
?>

<main class="main home-page" id="main">
  <?php
  get_template_part('inc/ui/sections/home/hero-slider');
  get_template_part('inc/ui/sections/home/trusted-companies');
  get_template_part('inc/ui/sections/home/industrial-lubricants');
  get_template_part('inc/ui/sections/home/featured-products');
  get_template_part('inc/ui/sections/home/service-benefits');
  get_template_part('inc/ui/sections/home/refrigerants');
  // get_template_part('inc/ui/sections/home/about-promixar');
  // get_template_part('inc/ui/sections/home/technical-training');
  // get_template_part('inc/ui/sections/home/after-sales-support');
  // get_template_part('inc/ui/sections/home/allied-brands');
  ?>
</main>

<?php get_footer(); ?>
