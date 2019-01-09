<?php get_header(); ?>

<div class="main-content">

    <section class="sobre-mi">
        <?php 
    while (have_posts()) {
        the_post();?>
        <h2 class="sobre-mi__title section__title">&nbsp;
            <?php the_title() ?>&nbsp;</h2>
        <div class="sobre-mi__wrapper">
            <div class="sobre-mi__description">
                <div class="description__miniature">
                    <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="Person on a tour" class="description__img">
                </div>
                <div class="description__text">
                    <p>
                        <?php the_content() ?>
                    </p>
                </div>
                <div class="description__cv">
                    <p>
                        <?php echo get_field('curriculum') ?>
                    </p>
                </div>
            </div>
        </div>
        <?php } ?>
    </section>
</div>

<?php get_footer() ?>