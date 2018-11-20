<?php get_header(); ?>

<div class="main-content">
    <?php 
    while (have_posts()) {
        the_post();
        $imageURL = get_the_post_thumbnail_url();
        $imageID = attachment_url_to_postid($imageURL);
        ?>
        <div class="portfolio-container">
            <div class="portfolio-item">
                <span class="portfolio-item__title">
                    <?php the_title() ?>
                </span>
                <img class="portfolio-item__image" src="<?php echo wp_get_attachment_image_src($imageID, 'medium_large')[0];?>" alt="">
            </div>
        </div>
    <h1>
        
    </h1>
    

    <?php   
    }
?>
</div>

<?php get_footer() ?>