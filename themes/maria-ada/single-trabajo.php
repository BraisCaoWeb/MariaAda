<?php get_header(); ?>

<div class="main-content">
    <?php 
    while (have_posts()) {
        the_post();
        $gallery = get_post_gallery_images();
        ?>
    <h1>
        <?php the_title() ?>
    </h1>

    <?php 
    foreach( $gallery as $image_url ) {
        $originalImageUrl = str_replace('-150x150', '', $image_url);
        $imageID = attachment_url_to_postid($originalImageUrl);
        $imageURL = wp_get_attachment_image_src($imageID, 'portafolio')[0];
        ?>
    <img src="<?php echo esc_attr($imageURL)?>" alt="">
    <?php 
    
	}
    }
?>
</div>

<?php get_footer() ?>