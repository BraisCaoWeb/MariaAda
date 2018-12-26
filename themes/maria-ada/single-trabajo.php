<?php get_header(); ?>

<div class="main-content">
    <?php 
    while (have_posts()) {
        the_post();
        $gallery = get_post_gallery_images();
        ?>

    <section class="trabajo">
        <h2 class="trabajo__title">
            <?php the_title() ?>
        </h2>
        <div class="trabajo__gallery">
            <?php 
        foreach( $gallery as $image_url ) {
            $originalImageUrl = substr($image_url, 0, -12) . '.jpg';//Conseguir la URL de la imagen original a partir de la thumbnail 'str_replace('-150x150', '', $image_url);'
            $imageID = attachment_url_to_postid($originalImageUrl); //Conseguir la Id a partir de la URL
            $imageURL = wp_get_attachment_image_src($imageID, 'fullhd')[0]; //Conseguir la URL en tamaño portafolio
            $img_srcset = wp_get_attachment_image_srcset( $imageID, 'full' );
            ?>

            <?php if ((wp_get_attachment_image_src($imageID, 'fullhd')[1] < wp_get_attachment_image_src($imageID, 'fullhd')[2]) OR get_field('anchura', $imageID) == 50) { ?>
            <img class="trabajo__image trabajo__image-vertical" src="<?php echo esc_attr($imageURL)?>" srcset="<?php echo esc_attr( $img_srcset );?>"
                sizes="33vw" alt="">
            <?php } else { ?>
            <img class="trabajo__image trabajo__image-horizontal" src="<?php echo esc_attr($imageURL)?>" srcset="<?php echo esc_attr( $img_srcset );?>"
                sizes="60vw" alt="">
            <?php } ?>




            <?php 
	    }
    }
?>
        </div>
    </section>
</div>

<script>
    var left = Math.floor((Math.random() * 40) + 10);
    var degrees = Math.floor((Math.random() * (3 - (-3) + 1)) + (-3));
    var title = document.querySelector('.trabajo__title');
    title.style.left = left + "%";
    title.style.transform = 'rotate(' + degrees + 'deg)';
</script>

<?php get_footer() ?>