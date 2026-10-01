<?php
/**
 * Comprueba que los assets compilados invaliden la caché al cambiar.
 *
 * @package promixar-theme
 */

declare(strict_types=1);

define('ABSPATH', __DIR__ . '/');
define('THEME_VERSION', '1.0.0');
define('THEME_URL', 'https://example.test/theme');
define('THEME_DIR', dirname(__DIR__));

$actions = [];
$enqueuedStyles = [];
$enqueuedScripts = [];

function add_action(string $hook, callable $callback, int $priority = 10): void
{
    global $actions;
    $actions[$hook][] = $callback;
}

function get_stylesheet_uri(): string
{
    return THEME_URL . '/style.css';
}

function wp_enqueue_style(string $handle, string $src, array $deps, $version, string $media): void
{
    global $enqueuedStyles;
    $enqueuedStyles[$handle] = ['src' => $src, 'version' => $version];
}

function wp_enqueue_script(string $handle, string $src, array $deps, $version, bool $footer): void
{
    global $enqueuedScripts;
    $enqueuedScripts[$handle] = ['src' => $src, 'version' => $version];
}

function wp_dequeue_style(string $handle): void
{
}

require dirname(__DIR__) . '/inc/assets/enqueue.php';

foreach ($actions['wp_enqueue_scripts'] ?? [] as $callback) {
    $callback();
}

$expectedCssVersion = (string) filemtime(THEME_DIR . '/public/css/app.min.css');
$expectedJsVersion = (string) filemtime(THEME_DIR . '/public/js/main.min.js');
$actualCssVersion = (string) ($enqueuedStyles['theme-app']['version'] ?? '');
$actualJsVersion = (string) ($enqueuedScripts['theme-main']['version'] ?? '');

$failures = [];

if ($actualCssVersion !== $expectedCssVersion) {
    $failures[] = "Versión CSS esperada: {$expectedCssVersion}; obtenida: {$actualCssVersion}.";
}

if ($actualJsVersion !== $expectedJsVersion) {
    $failures[] = "Versión JS esperada: {$expectedJsVersion}; obtenida: {$actualJsVersion}.";
}

if ($failures !== []) {
    fwrite(STDERR, implode("\n", $failures) . "\n");
    exit(1);
}

fwrite(STDOUT, "OK: CSS y JS usan versiones basadas en sus archivos compilados.\n");
