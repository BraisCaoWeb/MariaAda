<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Maria_Ada
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header id="masthead" class="site-header">
        <div class="site-header__container">
            <div class="site-header__logo-wrapper">
                <div class="site-header__logo">
                    <a href="<?php echo site_url()?>">
                        <?php bloginfo('name') ?>
                    </a>
                    <span class="site-header__logo-sub">
                        <?php bloginfo('description') ?>
                    </span>
                </div>
            </div>

            <div class="site-header__menu">
                <nav class="navigation">
                    <?php 
                    wp_nav_menu( array(
                        'theme_location' => 'headerMenuLocation'
                    ) );
                    ?>
                </nav>
            </div>


            <div class="site-header__social">
                <a href="" class="slink">
                    <i class="fab fa-caralibro-square"></i>
                </a>
                <a href="" class="slink">
                    <i class="fab fa-linkedinn-in"></i>
                </a>
                <a href="" class="slink">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>

            <div class="site-header__footer">
                <span class="copyright">Copyright
                    <?php echo date("Y"); ?> María Adá</span>
                <span class="designer">Web Design by Brais Cao</span>
            </div>
        </div>
    </header><!-- #masthead -->