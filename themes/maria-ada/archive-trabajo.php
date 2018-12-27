<?php get_header(); ?>

<div class="main-content">
    <section class="portfolio">
        <h2 class="portfolio__title section__title">&nbsp;Portafolio&nbsp;</h2>
        <div class="portfolio__gallery">

            <?php 
    while (have_posts()) {
        the_post();
        $imageURL = get_the_post_thumbnail_url();
        $imageID = attachment_url_to_postid($imageURL);
        ?>

            <!--  <div class="portfolio-item-wrapper"> -->
            <div class="portfolio-item">
                <a href="<?php echo get_permalink() ?>" class="portfolio-item__link">
                    <span class="portfolio-item__title">
                        <?php the_title() ?>
                    </span>
                    <img class="portfolio-item__image" src="<?php echo esc_attr(wp_get_attachment_image_src($imageID, 'portafolio_miniatura')[0]);?>"
                        alt="">
                </a>
            </div>
            <!-- </div> -->
            <?php   
    }
    ?>
        </div>
    </section>
</div>

<?php get_footer() ?>