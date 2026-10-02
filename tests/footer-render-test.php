<?php
/**
 * Prueba de integración del footer estático.
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

function get_template_part(string $slug, ?string $name = null, array $args = []): void
{
    $suffix = $name ? '-' . $name : '';
    $path = dirname(__DIR__) . '/' . $slug . $suffix . '.php';

    if (!is_file($path)) {
        throw new RuntimeException('No se encontró el template part: ' . $path);
    }

    require $path;
}

function wp_footer(): void
{
    echo '<!-- wp-footer-hook -->';
}

ob_start();
require dirname(__DIR__) . '/footer.php';
$html = (string) ob_get_clean();
$failures = [];

if (strpos($html, 'class="container footer__container"') === false) {
    $failures[] = 'El footer debe usar el container de Bootstrap.';
}

if (strpos($html, 'class="row footer__main"') === false) {
    $failures[] = 'El footer debe distribuir su contenido con la grilla Bootstrap.';
}

foreach (['footer__contact', 'footer__brand', 'footer__communication'] as $columnClass) {
    if (strpos($html, $columnClass) === false) {
        $failures[] = 'Falta una columna BEM del footer: ' . $columnClass;
    }
}

$assets = [
    'footer/icon-correo.svg',
    'footer/icon-direccion.svg',
    'footer/icon-telefono.svg',
    'footer/icon-fb.svg',
    'footer/icon-youtube.svg',
    'footer/logo-footer.svg',
];

foreach ($assets as $asset) {
    if (substr_count($html, $asset) !== 1) {
        $failures[] = 'El footer debe renderizar una vez el asset: ' . $asset;
    }
}

foreach (
    [
        'mailto:cotizacion@promixar.com',
        'mailto:arivera@promixar.com',
        'tel:+51981510607',
        'tel:+51991560276',
    ] as $contactLink
) {
    if (strpos($html, $contactLink) === false) {
        $failures[] = 'Falta el enlace funcional de contacto: ' . $contactLink;
    }
}

if (strpos($html, '© 2026 Promixar – Todos los derechos reservados') === false) {
    $failures[] = 'El footer debe mostrar el copyright estático aprobado.';
}

if (strpos($html, '<!-- wp-footer-hook -->') === false) {
    $failures[] = 'footer.php debe conservar la ejecución de wp_footer().';
}

if ($failures !== []) {
    fwrite(STDERR, implode("\n", $failures) . "\n");
    exit(1);
}

fwrite(STDOUT, "OK: el footer renderiza su grilla, contactos y recursos estáticos.\n");
