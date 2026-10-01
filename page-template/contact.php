<?php
/*
    Template name: contact
*/

get_header();
$data = get_contact_page_data();
?>

<section class="main">
  <?php
  // HERO
  get_template_part(
    'inc/ui/sections/hero',
    null,
    $data['hero']
  );

  // Section | Form + Content
  get_template_part(
    'inc/ui/sections/contact/form-content',
    null,
    $data['form_content']
  );
  ?>
</section>

<?php get_footer(); ?>
