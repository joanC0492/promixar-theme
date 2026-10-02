<?php
/**
 * Prueba de render para la card reutilizable de producto.
 *
 * @package promixar-theme
 */

declare(strict_types=1);

define('ABSPATH', __DIR__ . '/');

function wp_parse_args(array $args, array $defaults = []): array
{
    return array_merge($defaults, $args);
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

$component = dirname(__DIR__) . '/inc/ui/components/product-card.php';

if (!is_file($component)) {
    fwrite(STDERR, "No existe el componente reutilizable product-card.php.\n");
    exit(1);
}

$args = [
    'image' => 'https://example.test/product.png',
    'image_alt' => 'Cilindro de prueba',
    'category' => 'Categoría de prueba',
    'title' => 'Producto de prueba',
    'description' => 'Descripción técnica de prueba.',
    'technical_url' => 'https://example.test/ficha.pdf',
    'quote_url' => 'https://example.test/cotizar',
    'download_icon' => 'https://example.test/download.svg',
    'whatsapp_icon' => 'https://example.test/whatsapp.svg',
];

ob_start();
require $component;
$html = (string) ob_get_clean();

$expectations = [
    'class="product-card product-card--interactive"' => 'La card debe exponer su bloque BEM y su variante interactiva.',
    'class="product-card__overlay"' => 'La card debe incluir el contenido de hover.',
    'Cilindro de prueba' => 'La card debe renderizar el texto alternativo recibido.',
    'Categoría de prueba' => 'La card debe renderizar la categoría recibida.',
    'Producto de prueba' => 'La card debe renderizar el nombre recibido.',
    'Descripción técnica de prueba.' => 'La card debe renderizar la descripción recibida.',
    'https://example.test/ficha.pdf' => 'La card debe enlazar la ficha técnica recibida.',
    'https://example.test/cotizar' => 'La card debe enlazar la cotización recibida.',
];

$failures = [];

foreach ($expectations as $needle => $failure) {
    if (strpos($html, $needle) === false) {
        $failures[] = $failure;
    }
}

if ($failures !== []) {
    fwrite(STDERR, implode("\n", $failures) . "\n");
    exit(1);
}

fwrite(STDOUT, "OK: la card reutilizable renderiza sus datos, acciones y contenido de hover.\n");
