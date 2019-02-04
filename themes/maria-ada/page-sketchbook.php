<?php /* Template Name: Sketchbook */  ?>

<?php get_header(); ?>

<div class="main-content">
    <?php 
    while (have_posts()) {
        the_post();
        $gallery = get_post_gallery_images();
        ?>

    <section class="sketchbook">
        <a href="<?php echo get_post_type_archive_link( 'trabajo') ?>" class="trabajo__volver fa fa-arrow-left"></a>
        <h2 class="sketchbook__title section__title">
            &nbsp;
            <?php the_title() ?>&nbsp;
        </h2>
        <div class="sketchbook__slider">
            <ul id="lightSlider">
                <?php 
            
        foreach( $gallery as $image_url ) {
            $originalImageUrl = substr($image_url, 0, -12) . '.jpg';//Conseguir la URL de la imagen original a partir de la thumbnail 'str_replace('-150x150', '', $image_url);'
            $imageID = attachment_url_to_postid($originalImageUrl); //Conseguir la Id a partir de la URL
            $imageURL = wp_get_attachment_image_src($imageID, 'fullhd')[0]; //Conseguir la URL en tamaño portafolio (1080p)
            $img_srcset = wp_get_attachment_image_srcset( $imageID, 'full' );
            ?>

                <li class="sketchbook__slide">
                    <img src="<?php echo esc_attr($imageURL)?>" class="sketchbook__image" srcset="<?php echo esc_attr( $img_srcset );?>"
                        sizes="60vw" alt="">
                </li>
                <?php } 
        }
        ?>
            </ul>
        </div>
    </section>
</div>
<script type="text/javascript">
    jQuery(function ($) {
        $(document).ready(function () {
            $("#lightSlider").lightSlider();
        });
    });
</script>
<?php get_footer() ?>