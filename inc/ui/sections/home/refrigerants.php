<?php
/**
 * Presentación comercial de refrigerantes industriales.
 *
 * Combina una llamada a la acción con dos tarjetas de producto para conservar
 * la jerarquía visual observada en el diseño de referencia.
 *
 * @package promixar-theme
 */

defined('ABSPATH') || exit;
?>

<section class="refrigerants" data-section="refrigerants" aria-labelledby="refrigerants-title">
  <div class="home-section__container refrigerants__layout">
    <div class="refrigerants__content">
      <p class="home-section__eyebrow">Control térmico industrial</p>
      <h2 id="refrigerants-title">Refrigerantes</h2>
      <p>Formulados para proteger motores y sistemas de alto rendimiento contra el sobrecalentamiento, la corrosión y las incrustaciones.</p>
      <a class="home-button home-button--primary" href="#contact">Solicitar cotización</a>
    </div>

    <div class="refrigerants__products">
      <article class="product-card product-card--dark">
        <div class="home-placeholder product-card__media">Producto</div>
        <h3>Refrigerante Coolant 50/50</h3>
        <a href="#contact">Cotizar producto</a>
      </article>
      <article class="product-card product-card--dark">
        <div class="home-placeholder product-card__media">Producto</div>
        <h3>Refrigerante Coolant 50/50 Mobil</h3>
        <a href="#contact">Cotizar producto</a>
      </article>
    </div>
  </div>
</section>
