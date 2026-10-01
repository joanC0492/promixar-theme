<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <?php $header_data = promixar_get_header_data(); ?>
  <header class="header site-header" id="header">
    <?php
    get_template_part(
      'inc/ui/header/header',
      'top',
      ['header' => $header_data['top']]
    );

    get_template_part(
      'inc/ui/header/header',
      'main',
      ['header' => $header_data['main']]
    );
    ?>
  </header>
