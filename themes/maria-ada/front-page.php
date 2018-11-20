<?php get_header(); ?>

<div class="main-content" style="background-image: url(<?php echo get_field('imagen_portada') ?>)">
    <?php 
    while (have_posts()) {
        the_post();?>

   
    <?php   
    }
?>
</div>