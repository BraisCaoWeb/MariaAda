<?php get_header(); ?>

<div class="main-content">
    <?php 
    while (have_posts()) {
        the_post();
        $gallery = get_post_gallery_images();
        ?>

    <section class="trabajo">
        <h1 class="trabajo__title">
            <?php the_title() ?>
        </h1>

        <?php 
        foreach( $gallery as $image_url ) {
            $originalImageUrl = str_replace('-150x150', '', $image_url); //Conseguir la URL de la imagen original a partir de la thumbnail
            $imageID = attachment_url_to_postid($originalImageUrl); //Conseguir la Id a partir de la URL
            $imageURL = wp_get_attachment_image_src($imageID, 'full')[0]; //Conseguir la URL en tamaño portafolio
            ?>

        <?php if (wp_get_attachment_image_src($imageID, 'portafolio')[1] > wp_get_attachment_image_src($imageID, 'portafolio')[2]) { ?>
        <img class="trabajo__image trabajo__image-horizontal" src="<?php echo esc_attr($imageURL)?>" alt="">
        <?php } else { ?>
        <img class="trabajo__image trabajo__image-vertical" src="<?php echo esc_attr($imageURL)?>" alt="">
        <?php } ?>

        <?php 
    
	    }
    }
?>
    </section>
</div>


<?php get_footer() ?>