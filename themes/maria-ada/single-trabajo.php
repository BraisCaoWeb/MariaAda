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
            $imageURL = wp_get_attachment_image_src($imageID, 'portafolio')[0]; //Conseguir la URL en tamaño portafolio
            ?>
            <div class="trabajo__image-container">
                <img class="trabajo__image" src="<?php echo esc_attr($imageURL)?>" alt="">
                <div class="trabajo__padding"></div>
            </div>
            <?php 
    
	    }
    }
?>
    </section>
</div>
<script>
var images = document.getElementsByClassName("trabajo__image");
for (i = 0; i < images.length; i++) {
  var imgWidth = images[i].naturalWidth; 
  var imgHeight = images[i].naturalHeight;
  
  images[i].parentElement.style.width = (imgWidth/imgHeight)*500 + "px"; 
  
  images[i].parentElement.style.flexGrow = (imgWidth/imgHeight)*500; 
  images[i].nextElementSibling.style.paddingBottom = (imgHeight/imgWidth)*100 + "%";
}

</script>

<?php get_footer() ?>