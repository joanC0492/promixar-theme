<?php
/**
 * Índice de data providers
 * Carga automáticamente todos los archivos *-data.php de este directorio.
 *
 * @package promixar-theme
 */

defined('ABSPATH') || exit;

// Mappers de sección reutilizables (deben cargarse antes que los providers de página)
foreach (glob(__DIR__ . '/sections/*-data.php') as $file) {
  require_once $file;
}

// Providers de página
foreach (glob(__DIR__ . '/*-data.php') as $file) {
  require_once $file;
}
