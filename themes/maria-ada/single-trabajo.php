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
            $originalImageUrl = substr($image_url, 0, -12) . '.jpg';//Conseguir la URL de la imagen original a partir de la thumbnail 'str_replace('-150x150', '', $image_url);' //!HAY QUE BUSCAR UNA FORMA DE QUE SEA UNIVERSAL Y NO DEPENDA DE QUE SEA 150X150
            $imageID = attachment_url_to_postid($originalImageUrl); //Conseguir la Id a partir de la URL
            $imageURL = wp_get_attachment_image_src($imageID, 'fullhd')[0]; //Conseguir la URL en tamaño portafolio
            ?>

        <?php if ((wp_get_attachment_image_src($imageID, 'fullhd')[1] < wp_get_attachment_image_src($imageID, 'fullhd')[2]) OR get_field('anchura', $imageID) == 50) { ?>
        <img class="trabajo__image trabajo__image-vertical" src="<?php echo esc_attr($imageURL)?>" alt="">
        <?php } else { ?>
        <img class="trabajo__image trabajo__image-horizontal" src="<?php echo esc_attr($imageURL)?>" alt="">
        <?php } ?>

        <?php 
    
	    }
    }
?>
    </section>
</div>


<?php get_footer() ?>