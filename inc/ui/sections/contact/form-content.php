<?php
/**
 * Sección Form + Content – Contact
 *
 * @package promixar-theme
 *
 * @param string $title          Título de la sección.
 * @param string $description    Texto descriptivo (acepta HTML básico).
 * @param string $email          Dirección de email de contacto.
 * @param string $phone          Número de teléfono.
 * @param string $address        Dirección física.
 * @param string $linkedin_url   URL del perfil de LinkedIn.
 * @param string $form_shortcode Shortcode del formulario de contacto.
 */

defined('ABSPATH') || exit;

$defaults = [
  'title' => '',
  'description' => '',
  'email' => '',
  'phone' => '',
  'address' => '',
  'linkedin_url' => '',
  'form_shortcode' => '',
];
$args = wp_parse_args($args ?? [], $defaults);

$title = $args['title'];
$description = $args['description'];
$email = $args['email'];
$phone = $args['phone'];
$address = $args['address'];
$linkedin_url = $args['linkedin_url'];
$form_shortcode = $args['form_shortcode'];
?>

<?php if (!empty($form_shortcode)): ?>
  <section class="contact-form-content padding-top padding-bottom">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="content">
            <?php if (!empty($title)): ?>
              <h2><?= wp_kses_post($title); ?></h2>
            <?php endif; ?>

            <?php if (!empty($description)): ?>
              <div class="rte">
                <?= wp_kses_post($description); ?>
              </div>
            <?php endif; ?>

            <?php if (!empty($email) || !empty($phone) || !empty($address)): ?>
              <ul class="contact-details">
                <?php if (!empty($email)): ?>
                  <li>
                    <a href="mailto:<?= esc_url($email); ?>">
                      <?= esc_html($email); ?>
                    </a>
                  </li>
                <?php endif; ?>
                <?php if (!empty($phone)): ?>
                  <li><?= esc_html($phone); ?></li>
                <?php endif; ?>
                <?php if (!empty($address)): ?>
                  <li><?= esc_html($address); ?></li>
                <?php endif; ?>
              </ul>
            <?php endif; ?>

            <?php if (!empty($linkedin_url)): ?>
              <ul class="socials">
                <li>
                  <a href="<?= esc_url($linkedin_url); ?>" target="_blank" rel="noopener noreferrer">
                    LinkedIn
                  </a>
                </li>
              </ul>
            <?php endif; ?>
          </div>
        </div>

        <div class="col">
          <div class="form-holder">
            <?= do_shortcode($form_shortcode); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
