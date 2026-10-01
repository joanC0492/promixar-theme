<?php
/**
 * Helpers de debug (solo en entorno de desarrollo)
 *
 * @package promixar-theme
 */

defined('ABSPATH') || exit;

/**
 * Vuelca una variable formateada en pantalla.
 * Sólo actúa cuando WP_DEBUG está activo.
 *
 * @param mixed $var  Variable a inspeccionar.
 * @param bool  $die  Si es true finaliza la ejecución tras el dump.
 * @return void
 */
function dd($var, bool $die = true): void
{
    if (!defined('WP_DEBUG') || !WP_DEBUG) {
        return;
    }

    echo '<pre style="background:#1e1e2e;color:#cdd6f4;padding:1rem;border-radius:4px;overflow:auto;font-size:.85rem">';
    echo esc_html(print_r($var, true));
    echo '</pre>';

    if ($die) {
        exit;
    }
}
