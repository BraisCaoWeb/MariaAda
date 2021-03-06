<?php /* Template Name: Trabajo */ ?>


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

            <?php if (get_field('anchura', $imageID) == 100){ ?>
            <div class="trabajo__image trabajo__image-horizontal">
                <a href="<?php echo esc_attr($imageURL)?>" data-lightbox="<?php the_title() ?>">
                    <img src="<?php echo esc_attr($imageURL)?>" srcset="<?php echo esc_attr( $img_srcset );?>" sizes="60vw"
                        alt="">
                </a>
            </div>
            <?php } else if (get_field('anchura', $imageID) == 50) { ?>
            <div class="trabajo__image trabajo__image-mitad">
                <a href="<?php echo esc_attr($imageURL)?>" data-lightbox="<?php the_title() ?>">
                    <img src="<?php echo esc_attr($imageURL)?>" srcset="<?php echo esc_attr( $img_srcset );?>" sizes="50vw"
                        alt="">
                </a>
            </div>
            <?php } else if ((wp_get_attachment_image_src($imageID, 'fullhd')[1] < wp_get_attachment_image_src($imageID, 'fullhd')[2])) { ?>
            <div class="trabajo__image trabajo__image-vertical">
                <a href="<?php echo esc_attr($imageURL)?>" data-lightbox="<?php the_title() ?>">
                    <img src="<?php echo esc_attr($imageURL)?>" srcset="<?php echo esc_attr( $img_srcset );?>" sizes="50vw"
                        alt="">
                </a>
            </div>
            <?php }  else if ((wp_get_attachment_image_src($imageID, 'fullhd')[1] >= wp_get_attachment_image_src($imageID, 'fullhd')[2])) { ?>
            <div class="trabajo__image trabajo__image-horizontal">
                <a href="<?php echo esc_attr($imageURL)?>" data-lightbox="<?php the_title() ?>">
                    <img src="<?php echo esc_attr($imageURL)?>" srcset="<?php echo esc_attr( $img_srcset );?>" sizes="60vw"
                        alt="">
                </a>
            </div>
            <?php } 

            if ($i == 1) { ?>
            <div class="trabajo__texto">
                <p>
                    <?php echo get_field('descripcion') ?>
                </p>
            </div>
            <?php }
        } ?>

            <?php if (get_field('video_trabajo') != "") { ?>
            <div class="trabajo__video">
                <?php echo get_field('video_trabajo'); ?>
            </div>
            <?php } ?>

            <?php if (get_the_excerpt() != "") { ?>
            <div class="trabajo__derechos">
                <?php the_excerpt(); ?>
            </div>
            <?php } 
    }
?>
        </div>
    </section>
</div>

<?php get_footer() ?>