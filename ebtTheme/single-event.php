<?php get_header();
/* 
Template Name: EVENT-SINGLE
Template Post Type: event
*/ ?>

<div class="page-title-banner">
    <p class="page-width">Event - <?php echo get_the_title($post->ID); ?> </p>
</div>

<section class="page-width">
    <a href="/events" style="margin-top: 10px;">
        <-- Back to all events</a>

            <div class="center">
                <?php
        echo '<h3 class="h2 title">' . get_the_title($post->ID) . '</h3>';
        echo '<img src="' . get_field('graphic') . '" class="image" style="margin: auto;">';
        echo '<p><b>' . get_field('date_time') . '</b></p>';
        echo '<p>' . get_field('information') . '</p>';

        the_content();
    ?>
            </div>
</section>

<?php get_footer(); ?>