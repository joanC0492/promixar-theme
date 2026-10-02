<?php
/**
 * Prueba de integración del bloque de refrigerantes.
 *
 * @package promixar-theme
 */

declare(strict_types=1);

define('ABSPATH', __DIR__ . '/');

function get_template_directory_uri(): string
{
    return 'https://example.test/wp-content/themes/promixar-theme';
}

function esc_url(string $url): string
{
    return htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
}

function esc_attr(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function esc_html(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function wp_parse_args(array $args, array $defaults = []): array
{
    return array_merge($defaults, $args);
}

function get_template_part(string $slug, ?string $name = null, array $args = []): void
{
    $suffix = $name ? '-' . $name : '';
    $path = dirname(__DIR__) . '/' . $slug . $suffix . '.php';

    if (!is_file($path)) {
        throw new RuntimeException('No se encontró el template part: ' . $path);
    }

    require $path;
}

ob_start();
require dirname(__DIR__) . '/inc/ui/sections/home/refrigerants.php';
$html = (string) ob_get_clean();
$failures = [];

if (strpos($html, 'class="container refrigerants__container"') === false) {
    $failures[] = 'La sección debe usar el container de Bootstrap.';
}

if (strpos($html, 'class="row refrigerants__row"') === false) {
    $failures[] = 'La sección debe distribuir su contenido con la grilla Bootstrap.';
}

if (strpos($html, 'class="refrigerants__slider swiper"') === false) {
    $failures[] = 'El catálogo debe renderizar un Swiper independiente.';
}

if (strpos($html, 'refrigerants__wrapper--two') === false) {
    $failures[] = 'Dos productos deben activar la variante que reparte el catálogo en dos columnas.';
}

if (substr_count($html, 'class="refrigerants__slide swiper-slide"') !== 2) {
    $failures[] = 'El catálogo debe renderizar sus dos refrigerantes como diapositivas.';
}

if (substr_count($html, 'class="product-card product-card--interactive"') !== 2) {
    $failures[] = 'La sección debe reutilizar dos instancias de product-card.';
}

if (substr_count($html, 'refrigerants/refrigerants-refrigerante.png') !== 2) {
    $failures[] = 'Las dos cards deben usar el producto real de refrigerantes.';
}

foreach (['refrigerants__title', 'refrigerants__description', 'refrigerants__cta'] as $bemClass) {
    if (strpos($html, $bemClass) === false) {
        $failures[] = 'Falta la clase BEM de contenido: ' . $bemClass;
    }
}

foreach (['swiper-button-prev', 'swiper-button-next', 'refrigerants__pagination'] as $forbiddenControl) {
    if (strpos($html, $forbiddenControl) !== false) {
        $failures[] = 'Dos productos no deben mostrar controles del slider: ' . $forbiddenControl;
    }
}

if ($failures !== []) {
    fwrite(STDERR, implode("\n", $failures) . "\n");
    exit(1);
}

fwrite(STDOUT, "OK: refrigerantes usa la grilla y compone dos cards reutilizables.\n");
