<?php
/**
 * Catálogo introductorio de lubricantes industriales.
 *
 * Incluye la navegación visual por categorías y una primera cuadrícula de
 * productos. Los filtros y datos dinámicos se conectarán en otra etapa.
 *
 * @package promixar-theme
 */

defined('ABSPATH') || exit;
?>

<section class="industrial-lubricants" id="industrial-lubricants" data-section="industrial-lubricants" aria-labelledby="industrial-lubricants-title">
  <div class="home-section__container industrial-lubricants__layout">
    <header class="industrial-lubricants__intro">
      <p class="home-section__eyebrow">Portafolio especializado</p>
      <h2 id="industrial-lubricants-title">Lubricantes industriales</h2>
      <p>Distribución exclusiva en presentaciones para cilindros y equipos industriales.</p>
    </header>

    <div class="industrial-lubricants__catalog">
      <div class="industrial-lubricants__tabs" role="tablist" aria-label="Categorías de lubricantes">
        <button type="button" role="tab" aria-selected="true">Hidráulicos</button>
        <button type="button" role="tab" aria-selected="false">Engranajes</button>
        <button type="button" role="tab" aria-selected="false">Perforación</button>
      </div>

      <div class="industrial-lubricants__products">
        <article class="product-card">
          <div class="home-placeholder product-card__media">Producto</div>
          <p class="product-card__brand">Shell Tellus</p>
          <h3>Aceite Tellus S2 MX 32</h3>
          <a href="#contact">Cotizar producto</a>
        </article>
        <article class="product-card">
          <div class="home-placeholder product-card__media">Producto</div>
          <p class="product-card__brand">Shell Tellus</p>
          <h3>Aceite Tellus S2 MX 46</h3>
          <a href="#contact">Cotizar producto</a>
        </article>
        <article class="product-card">
          <div class="home-placeholder product-card__media">Producto</div>
          <p class="product-card__brand">Shell Tellus</p>
          <h3>Aceite Tellus S2 MX 68</h3>
          <a href="#contact">Cotizar producto</a>
        </article>
      </div>
    </div>
  </div>
</section>
