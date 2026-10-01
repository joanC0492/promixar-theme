<?php
/**
 * Prueba de integración ligera para el encabezado del sitio.
 *
 * @package promixar-theme
 */

declare(strict_types=1);

define('ABSPATH', __DIR__ . '/');

$bodyOpenCalls = 0;

function get_stylesheet_directory_uri(): string
{
    return 'https://example.test/wp-content/themes/promixar-theme';
}

function get_template_directory(): string
{
    return dirname(__DIR__);
}

function add_action(string $hook, callable $callback, int $priority = 10): void
{
}

function add_filter(string $hook, callable $callback, int $priority = 10): void
{
}

function remove_action(string $hook, string $callback, int $priority = 10): void
{
}

function language_attributes(): void
{
    echo 'lang="es"';
}

function bloginfo(string $show): void
{
    if ($show === 'charset') {
        echo 'UTF-8';
    }
}

function wp_head(): void
{
}

function wp_get_document_title(): string
{
    return 'Promixar';
}

function body_class(): void
{
    echo 'class="home"';
}

function wp_body_open(): void
{
    global $bodyOpenCalls;
    $bodyOpenCalls++;
}

function get_nav_menu_locations(): array
{
    return ['header-menu' => 3];
}

function get_field(string $name, $context = false)
{
    $fields = [
        'option' => [
            'header_top_correo_cotizaciones' => [
                'url' => 'mailto:cotizacion@promixar.com',
                'title' => 'cotizacion@promixar.com',
                'target' => '',
            ],
            'header_top_correo_comercial' => [
                'url' => 'mailto:arivera@promixar.com',
                'title' => 'arivera@promixar.com',
                'target' => '',
            ],
            'header_top_ubicacion' => 'Lima - Perú',
            'header_top_texto_rrss' => 'Síguenos en',
            'header_top_facebook' => [
                'url' => 'https://facebook.com/promixar',
                'title' => 'Facebook',
                'target' => '_blank',
            ],
            'header_top_youtube' => [
                'url' => 'https://youtube.com/@promixar',
                'title' => 'YouTube',
                'target' => '_blank',
            ],
        ],
        'nav_menu_3' => [
            'header_main_telefono' => [
                'url' => 'tel:+51981510607',
                'title' => '+51 981 510 607',
                'target' => '',
            ],
            'header_main_whatsapp' => [
                'url' => 'https://wa.me/51981510607',
                'title' => 'COTIZAR',
                'target' => '_blank',
            ],
        ],
    ];

    return $fields[(string) $context][$name] ?? false;
}

function esc_url(string $url): string
{
    return htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
}

function esc_html(string $text): string
{
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

function esc_attr(string $text): string
{
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

function the_custom_logo(): void
{
    echo '<a class="custom-logo-link" href="/"><img class="custom-logo" src="logo.svg" alt="Promixar"></a>';
}

function wp_nav_menu(array $args = []): void
{
    $class = esc_attr((string) ($args['menu_class'] ?? 'menu'));
    echo '<ul class="' . $class . '"><li><a href="/lubricantes">Lubricantes</a></li></ul>';
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

require dirname(__DIR__) . '/functions.php';

ob_start();
require dirname(__DIR__) . '/header.php';
$html = (string) ob_get_clean();

$expectedFragments = [
    'class="header-top"',
    'class="container header-top__container"',
    'class="header-main"',
    'class="header-main__shell"',
    'class="container header-main__container"',
    'class="custom-logo"',
    'cotizacion@promixar.com',
    'arivera@promixar.com',
    'Lima - Perú',
    'Síguenos en',
    'https://facebook.com/promixar',
    'https://youtube.com/@promixar',
    'tel:+51981510607',
    '+51 981 510 607',
    'https://wa.me/51981510607',
    'COTIZAR',
    'Lubricantes',
    'data-icon="correo"',
    'data-icon="ubicacion"',
    'data-icon="telefono"',
    'data-icon="whatsapp"',
    'class="header-main__menu-toggle"',
    'aria-expanded="false"',
    'aria-controls="header-primary-navigation"',
    'id="header-primary-navigation"',
];

$failures = [];

if ($bodyOpenCalls !== 1) {
    $failures[] = 'wp_body_open() debe ejecutarse exactamente una vez.';
}

foreach ($expectedFragments as $fragment) {
    if (strpos($html, $fragment) === false) {
        $failures[] = 'No se encontró en el HTML: ' . $fragment;
    }
}

if (strpos($html, '<details') !== false) {
    $failures[] = 'La navegación de escritorio no debe quedar dentro de un details cerrado.';
}

if ($failures !== []) {
    fwrite(STDERR, implode("\n", $failures) . "\n");
    exit(1);
}

fwrite(STDOUT, "OK: el header renderiza sus datos, componentes y acciones principales.\n");
