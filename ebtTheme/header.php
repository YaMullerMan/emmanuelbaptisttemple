<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- start wp_head() -->
    <?php wp_head(); ?>
    <!-- end wp_head() -->
    <link rel="stylesheet"
        href="<?php echo get_stylesheet_directory_uri(); ?>/pages.css">
    <link rel="stylesheet"
        href="<?php echo get_stylesheet_directory_uri(); ?>/slider.css">
    <link rel="stylesheet"
        href="<?php echo get_stylesheet_directory_uri(); ?>/slider-fade.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<body <?php body_class(); ?>>
    <?php wp_body_open(); // put here for plugin hook ?>
    <a class="skip-link screen-reader-text"
        href="#primary"><?php esc_html_e( 'Skip to content', 'ebtthemeparent' ); ?>
    </a>
    <?php // include "announcement-bar.php"; ?>
    <div class="announcement-bar">
        <!-- make this a custom field on home template -->
        <p class="announcement-bar-text"></p>
    </div>
    <header class="header">
        <div class="header-container page-width">
            <?php the_custom_logo(); 
            // take away "display site title" in admin too ?>

            <div class="header-right flex">
                <nav id="nav" class="nav-items-container">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'menu_class'        => 'primary-menu',
                        )
                    );
                    ?>
                </nav>
                <!-- not sure what this was for <p>X</p> -->
            </div>
        </div>
    </header>
    <main class="main">