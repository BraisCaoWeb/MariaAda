<?php get_header(); ?>

<div class="main-content">
    <?php 
    while (have_posts()) {
        the_post();?>
    <h1>
        <?php the_title() ?>
    </h1>

    <?php   
    }
?>
</div>

<?php get_footer() ?>