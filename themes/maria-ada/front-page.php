<?php get_header(); ?>

<div class="main-content" style="background-image: url(<?php echo get_field('imagen_portada')?>)">
    <img class="imagen-portada" src="<?php echo get_field('imagen_portada')?>" alt="">
    <?php 
    while (have_posts()) {
        the_post();?>


    <?php   
    }
?>
</div>

<script>
    var header = document.querySelector('.site-header');
    header.style.boxShadow = 'none';
</script>

<?php get_footer() ?>