<?php /* Template Name: Sketchbook */  ?>

<?php get_header(); ?>

<div class="main-content">
    <?php 
    while (have_posts()) {
        the_post();
        $gallery = get_post_gallery_images();
        ?>

    <section class="sketchbook">
        <a href="<?php echo get_post_type_archive_link( 'trabajo') ?>" class="trabajo__volver fa fa-arrow-left"></a>
        <h2 class="sketchbook__title section__title">
            &nbsp;
            <?php the_title() ?>&nbsp;
        </h2>
        <div class="sketchbook__slider">
            <?php 
            the_content(); 
        }
        ?>
            </ul>
        </div>
    </section>
</div>

<?php get_footer() ?>