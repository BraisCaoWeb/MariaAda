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
        $originalImageUrl = str_replace('-150x150', '', $image_url); //Conseguir la URL de la imagen original a partir de la thumbnail
        $imageID = attachment_url_to_postid($originalImageUrl); //Conseguir la Id a partir de la URL
        $imageURL = wp_get_attachment_image_src($imageID, 'portafolio')[0]; //Conseguir la URL en tamaño portafolio
        ?>
    <img src="<?php echo esc_attr($imageURL)?>" alt="">
    <?php 
    
	}
    }
?>
</div>

<?php get_footer() ?>