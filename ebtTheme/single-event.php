<?php get_header();
/* 
Template Name: EVENT-SINGLE
Template Post Type: event
*/ ?>

<div class="page-title-banner">
    <p class="page-width">Event</p>
</div>

<section class="page-width">
    <a href="/events">All events</a>

    <?php
echo '<h3>' . get_the_title($post->ID) . '</h3>';
echo '<img src="' . get_field('graphic') . '" class="image">';
echo '<p>' . get_field('information') . '</p>';
echo '<p>' . get_field('date_time') . '</p>';

the_content();
?>
</section>

<?php get_footer(); ?>