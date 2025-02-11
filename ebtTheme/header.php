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
                <div id="nav-icon4" class="mobile-nav-x">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <nav class="mobile-nav-container">
                    <ul class="mobile-nav" id="trying">
                        <li class="mobile-nav-item">
                            <details class="nav-details">
                                <summary>
                                    ABOUT
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        width="40" height="40"
                                        viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M6 9l6 6 6-6" />
                                    </svg>
                                </summary>
                                <div style="margin: 10px 25px 0 0;">
                                    <a href="/about">ABOUT US</a>
                                    <a href="/beliefs">BELIEFS</a>
                                    <a href="/staff">STAFF</a>
                                    <a href="/missionaries">MISSIONARIES</a>
                                    <a href="faq">FAQ</a>
                                </div>
                            </details>
                        </li>
                        <li class="mobile-nav-item">
                            <details class="nav-details">
                                <summary>
                                    MINISTRIES
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        width="40" height="40"
                                        viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M6 9l6 6 6-6" />
                                    </svg>
                                </summary>
                                <a href="/get-involved">OUR MINISTRIES</a>
                                <a href="/classes">CLASSES</a>
                            </details>
                        </li>
                        <li class="mobile-nav-item"><a href="/events">EVENTS</a>
                        </li>
                        <li class="mobile-nav-item"><a
                                href="/contact">CONTACT</a>
                        </li>
                        <li class="mobile-nav-item"><a
                                href="/sermons">SERMONS</a>
                        </li>
                        <li class="mobile-nav-item"><a href="/giving">GIVING</a>
                        </li>
                        <li class="mobile-nav-item" style="display: none;">
                            <?php
                                if ( is_user_logged_in() ) {
                                    echo '<a href="/my-account/edit-account">YOUR ACCOUNT</a>';
                                } else {
                                    echo '<a href="/my-account/edit-account">LOGIN</a>';
                                } 
                            ?>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main class="main">