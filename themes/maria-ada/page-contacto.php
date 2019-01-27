<?php /* Template Name: Contacto */ ?>


<?php get_header(); ?>

<div class="main-content">

  <section class="contacto">
    <h2 class="contacto__title section__title">&nbsp;
      <?php the_title() ?>&nbsp;</h2>
    <div class="contacto__wrapper">
      <?php 
    while (have_posts()) {
        the_post();?>
      <div class="contacto__info">
        <?php echo get_the_content() ?>
      </div>
      <div class="contacto__form">
        <?php
    echo do_shortcode('[contact-form-7 id="86" title="Contact form 1"]');
    ?>
      </div>
      <?php } ?>
    </div>
  </section>
</div>

<?php get_footer() ?>