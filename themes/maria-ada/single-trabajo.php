<?php get_header(); ?>

<div class="main-content">
    <?php 
    while (have_posts()) {
        the_post();
        $gallery = get_post_gallery_images();
        ?>

    <section class="trabajo">
        <a href="<?php echo get_post_type_archive_link( 'trabajo') ?>" class="trabajo__volver fa fa-arrow-left"></a>
        <h2 class="trabajo__title section__title">
            &nbsp;
            <?php the_title() ?>&nbsp;
        </h2>
        <div class="trabajo__gallery">
            <?php 
            $i = 0;
        foreach( $gallery as $image_url ) {
            $i++;
            $originalImageUrl = substr($image_url, 0, -12) . '.jpg';//Conseguir la URL de la imagen original a partir de la thumbnail 'str_replace('-150x150', '', $image_url);'
            $imageID = attachment_url_to_postid($originalImageUrl); //Conseguir la Id a partir de la URL
            $imageURL = wp_get_attachment_image_src($imageID, 'fullhd')[0]; //Conseguir la URL en tamaño portafolio (1080p)
            $img_srcset = wp_get_attachment_image_srcset( $imageID, 'full' );

            ?>

            <?php if ((wp_get_attachment_image_src($imageID, 'fullhd')[1] >= wp_get_attachment_image_src($imageID, 'fullhd')[2]) OR get_field('anchura', $imageID) == 100){ ?>
            <div class="trabajo__image trabajo__image-horizontal">
                <img src="<?php echo esc_attr($imageURL)?>" srcset="<?php echo esc_attr( $img_srcset );?>" sizes="60vw"
                    alt="">
            </div>
            <?php } else if ((wp_get_attachment_image_src($imageID, 'fullhd')[1] < wp_get_attachment_image_src($imageID, 'fullhd')[2]) OR get_field('anchura', $imageID) == 50) { ?>
            <div class="trabajo__image trabajo__image-vertical">
                <img src="<?php echo esc_attr($imageURL)?>" srcset="<?php echo esc_attr( $img_srcset );?>" sizes="33vw"
                    alt="">
            </div>
            <?php } 

            if ($i == 1) { ?>
            <div class="trabajo__texto">
                <p>
                    <?php the_excerpt() ?>
                </p>
            </div>
            <?php }
	    }
    }
?>
        </div>
    </section>
</div>

<?php get_footer() ?>