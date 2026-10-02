<?php
/**
 * Prueba de integración ligera para la composición de la página de inicio.
 *
 * Renderiza el template real con sustitutos mínimos de WordPress y comprueba
 * que las diez secciones públicas aparezcan una sola vez y en el orden
 * aprobado para el diseño.
 *
 * @package promixar-theme
 */

declare(strict_types=1);

define('ABSPATH', __DIR__ . '/');

/**
 * Sustituye la carga del encabezado durante esta prueba aislada.
 */
function get_header(): void
{
}

/**
 * Sustituye la carga del pie de página durante esta prueba aislada.
 */
function get_footer(): void
{
}

/**
 * Devuelve la URL pública del tema para comprobar los assets renderizados.
 */
function get_template_directory_uri(): string
{
    return 'https://example.test/wp-content/themes/promixar-theme';
}

/**
 * Escapa URLs en el render aislado igual que WordPress.
 */
function esc_url(string $url): string
{
    return htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
}

/**
 * Escapa atributos en el render aislado igual que WordPress.
 */
function esc_attr(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

/**
 * Escapa contenido textual en el render aislado igual que WordPress.
 */
function esc_html(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

/**
 * Combina argumentos con valores predeterminados para los partials existentes.
 *
 * @param array $args     Argumentos recibidos.
 * @param array $defaults Valores predeterminados.
 * @return array Argumentos normalizados.
 */
function wp_parse_args(array $args, array $defaults = []): array
{
    return array_merge($defaults, $args);
}

/**
 * Carga un template part del tema con el mismo contrato básico de WordPress.
 *
 * @param string     $slug Ruta relativa del template part.
 * @param string|null $name Variante opcional del template part.
 * @param array      $args Datos disponibles dentro del template part.
 */
function get_template_part(string $slug, ?string $name = null, array $args = []): void
{
    $suffix = $name ? '-' . $name : '';
    $path = dirname(__DIR__) . '/' . $slug . $suffix . '.php';

    if (!is_file($path)) {
        throw new RuntimeException('No se encontró el template part: ' . $path);
    }

    require $path;
}

$expectedSections = [
    'hero-slider',
    'trusted-companies',
    'industrial-lubricants',
    'featured-products',
    'service-benefits',
    'refrigerants',
    'about-promixar',
    'technical-training',
    'after-sales-support',
    'allied-brands',
];

ob_start();
require dirname(__DIR__) . '/front-page.php';
$html = (string) ob_get_clean();

preg_match_all('/data-section="([^"]+)"/', $html, $matches);
$renderedSections = $matches[1] ?? [];

if ($renderedSections !== $expectedSections) {
    fwrite(
        STDERR,
        "La página de inicio no contiene las diez secciones esperadas en el orden aprobado.\n"
        . 'Esperado: ' . implode(', ', $expectedSections) . "\n"
        . 'Obtenido: ' . implode(', ', $renderedSections) . "\n"
    );
    exit(1);
}

$heroFailures = [];

preg_match('/<section class="home-hero".*?<\/section>/s', $html, $heroSectionMatch);
$heroHtml = $heroSectionMatch[0] ?? '';

if (strpos($html, 'class="home-hero__slider swiper"') === false) {
    $heroFailures[] = 'El hero debe renderizar el contenedor principal de Swiper.';
}

if (strpos($html, 'class="swiper-wrapper"') === false) {
    $heroFailures[] = 'El hero debe renderizar el wrapper requerido por Swiper.';
}

preg_match_all('/class="[^"]*swiper-slide[^"]*"/', $heroHtml, $heroSlides);
if (count($heroSlides[0] ?? []) !== 3) {
    $heroFailures[] = 'El hero debe renderizar exactamente tres slides de Swiper.';
}

foreach (['hero-banner-1.png', 'hero-banner-2.png', 'hero-banner-3.png'] as $banner) {
    if (strpos($html, $banner) === false) {
        $heroFailures[] = 'No se encontró el asset del hero: ' . $banner;
    }
}

foreach (['swiper-pagination', 'home-hero__previous', 'home-hero__next'] as $control) {
    if (strpos($html, $control) === false) {
        $heroFailures[] = 'No se encontró el control del hero: ' . $control;
    }
}

if ($heroFailures !== []) {
    fwrite(STDERR, implode("\n", $heroFailures) . "\n");
    exit(1);
}

$trustedCompaniesFailures = [];

preg_match('/<section class="trusted-companies".*?<\/section>/s', $html, $trustedSectionMatch);
$trustedCompaniesHtml = $trustedSectionMatch[0] ?? '';

if (strpos($trustedCompaniesHtml, 'class="trusted-companies__slider swiper"') === false) {
    $trustedCompaniesFailures[] = 'El cintillo de empresas debe renderizar un contenedor Swiper independiente.';
}

preg_match_all('/class="[^"]*trusted-companies__slide[^\"]*swiper-slide[^\"]*"/', $trustedCompaniesHtml, $trustedSlides);
if (count($trustedSlides[0] ?? []) !== 16) {
    $trustedCompaniesFailures[] = 'El cintillo debe renderizar dos ciclos de los ocho logos para mantener el movimiento continuo.';
}

foreach (range(1, 8) as $logoNumber) {
    $logo = sprintf('logo-%02d.svg', $logoNumber);

    if (substr_count($trustedCompaniesHtml, $logo) !== 2) {
        $trustedCompaniesFailures[] = 'El logo debe aparecer una vez por cada ciclo: ' . $logo;
    }
}

foreach (['swiper-button-prev', 'swiper-button-next', 'swiper-pagination'] as $forbiddenControl) {
    if (strpos($trustedCompaniesHtml, $forbiddenControl) !== false) {
        $trustedCompaniesFailures[] = 'El cintillo no debe incluir controles de navegación: ' . $forbiddenControl;
    }
}

if ($trustedCompaniesFailures !== []) {
    fwrite(STDERR, implode("\n", $trustedCompaniesFailures) . "\n");
    exit(1);
}

$industrialFailures = [];

preg_match('/<section class="industrial-lubricants".*?<\/section>/s', $html, $industrialSectionMatch);
$industrialHtml = $industrialSectionMatch[0] ?? '';

if (substr_count($industrialHtml, 'role="tab"') !== 3) {
    $industrialFailures[] = 'La sección debe renderizar tres categorías accesibles.';
}

if (substr_count($industrialHtml, 'class="industrial-lubricants__panel"') !== 3) {
    $industrialFailures[] = 'La sección debe renderizar un panel de productos por categoría.';
}

if (substr_count($industrialHtml, 'class="product-card product-card--interactive"') !== 10) {
    $industrialFailures[] = 'La sección debe componer diez instancias de la card reutilizable.';
}

if (substr_count($industrialHtml, 'industrial-lubricants__pagination') !== 1) {
    $industrialFailures[] = 'Solo la categoría con más de tres productos debe renderizar dots.';
}

foreach (['swiper-button-prev', 'swiper-button-next'] as $forbiddenControl) {
    if (strpos($industrialHtml, $forbiddenControl) !== false) {
        $industrialFailures[] = 'El catálogo no debe renderizar flechas: ' . $forbiddenControl;
    }
}

if ($industrialFailures !== []) {
    fwrite(STDERR, implode("\n", $industrialFailures) . "\n");
    exit(1);
}

$featuredFailures = [];

preg_match('/<section class="featured-products".*?<\/section>/s', $html, $featuredSectionMatch);
$featuredHtml = $featuredSectionMatch[0] ?? '';

if (strpos($featuredHtml, 'class="featured-products__title"') === false) {
    $featuredFailures[] = 'El título de productos destacados debe usar una clase BEM propia.';
}

if (strpos($featuredHtml, 'class="featured-products__showcase-slider swiper"') === false) {
    $featuredFailures[] = 'El destacado superior debe renderizar un Swiper independiente.';
}

if (substr_count($featuredHtml, 'class="featured-products__showcase-slide swiper-slide"') !== 3) {
    $featuredFailures[] = 'El slider superior debe renderizar tres productos destacados.';
}

foreach (['featured-products__previous', 'featured-products__next'] as $control) {
    if (strpos($featuredHtml, $control) === false) {
        $featuredFailures[] = 'Falta el control del slider superior: ' . $control;
    }
}

if (strpos($featuredHtml, 'class="featured-products__category-card"') === false) {
    $featuredFailures[] = 'El catálogo inferior debe incluir la tarjeta promocional de categoría.';
}

if (strpos($featuredHtml, 'class="featured-products__catalog-slider swiper"') === false) {
    $featuredFailures[] = 'El catálogo inferior debe renderizar su propio Swiper.';
}

if (substr_count($featuredHtml, 'class="featured-products__catalog-slide swiper-slide"') !== 5) {
    $featuredFailures[] = 'El catálogo inferior debe renderizar cinco productos de prueba.';
}

if (substr_count($featuredHtml, 'class="product-card product-card--interactive"') !== 5) {
    $featuredFailures[] = 'El catálogo inferior debe reutilizar cinco instancias de product-card.';
}

if (substr_count($featuredHtml, 'featured-products__pagination') !== 1) {
    $featuredFailures[] = 'El catálogo con más de tres productos debe renderizar una paginación.';
}

$featuredAssets = [
    'featured-products-main/featured-products-category-card.png' => 1,
    'featured-products-main/image-card-cilindro-slider.png' => 3,
    'featured-products-main/card-cilindro-slider.png' => 3,
];

foreach ($featuredAssets as $asset => $expectedCount) {
    if (substr_count($featuredHtml, $asset) !== $expectedCount) {
        $featuredFailures[] = 'El asset destacado debe renderizarse la cantidad esperada: ' . $asset;
    }
}

foreach (['featured-products__category-image', 'featured-products__scene-image'] as $bemClass) {
    if (strpos($featuredHtml, $bemClass) === false) {
        $featuredFailures[] = 'Falta la clase BEM para el nuevo recurso gráfico: ' . $bemClass;
    }
}

if ($featuredFailures !== []) {
    fwrite(STDERR, implode("\n", $featuredFailures) . "\n");
    exit(1);
}

fwrite(STDOUT, "OK: el home renderiza sus sliders y compone el catálogo con cards reutilizables.\n");
