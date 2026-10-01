<?php
/**
 * Theme Functions – loader de módulos
 *
 * @package promixar-theme
 * @since 1.0.0
 * @version 2.0.0
 */

defined('ABSPATH') || exit;

$inc = get_template_directory() . '/inc';

// 1. Config (constantes, rutas)
require_once $inc . '/config/constants.php';

// 2. Helpers
require_once $inc . '/helpers/debug.php';
require_once $inc . '/helpers/acf.php';
require_once $inc . '/helpers/icons.php';

// 3. Core (theme support, menús, excerpt, cleanup)
require_once $inc . '/core/cleanup.php';
require_once $inc . '/core/theme-support.php';
require_once $inc . '/core/excerpt.php';

// 4. Navigation
require_once $inc . '/navigation/menus.php';

// 5. Assets (enqueue scripts/styles)
require_once $inc . '/assets/enqueue.php';

// 6. Data providers (uno por template)
require_once $inc . '/data/index.php';
