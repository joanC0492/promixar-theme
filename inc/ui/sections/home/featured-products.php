<?php
/**
 * Sección de productos destacados.
 *
 * Separa el producto principal, preparado como slider, de las tarjetas de
 * categorías complementarias que aparecen debajo del destacado.
 *
 * @package promixar-theme
 */

defined('ABSPATH') || exit;
?>

<section class="featured-products" id="featured-products" data-section="featured-products" aria-labelledby="featured-products-title">
  <div class="home-section__container">
    <h2 id="featured-products-title">Productos destacados</h2>

    <div class="featured-products__slider" data-slider="featured-products">
      <article class="featured-products__main-card">
        <div class="home-placeholder featured-products__media">Imagen destacada</div>
        <div class="featured-products__content">
          <p class="home-section__eyebrow">Lubricantes industriales</p>
          <h3>Aceite Tellus S2 MX 68</h3>
          <p>Lubricante hidráulico de alto rendimiento para proteger los equipos y prolongar su vida útil.</p>
          <div class="featured-products__actions">
            <a class="home-button home-button--primary" href="#contact">Cotizar producto</a>
            <a class="home-button home-button--outline" href="#technical-information">Ficha técnica</a>
          </div>
        </div>
      </article>
    </div>

    <div class="featured-products__grid">
      <article class="featured-products__category-card">
        <p class="home-section__eyebrow">Categoría</p>
        <h3>Grasas industriales</h3>
        <a href="#contact">Cotizar</a>
      </article>
      <article class="product-card">
        <div class="home-placeholder product-card__media">Producto</div>
        <h3>Grasa XHP 681 Mine</h3>
        <a href="#contact">Cotizar producto</a>
      </article>
      <article class="product-card">
        <div class="home-placeholder product-card__media">Producto</div>
        <h3>Grasa CMP Premium</h3>
        <a href="#contact">Cotizar producto</a>
      </article>
      <article class="product-card">
        <div class="home-placeholder product-card__media">Producto</div>
        <h3>Grasa Mobilgrease XHP</h3>
        <a href="#contact">Cotizar producto</a>
      </article>
    </div>
  </div>
</section>
