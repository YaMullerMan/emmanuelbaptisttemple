<?php get_header();
/* Template Name: EVENTS */  ?>

<div class="page-title-banner">
    <p class="page-width">Events</p>
</div>

<section class="page-width">

    <h1 class="h2 title">Join us for an event!</h1>

    <?php 
        $posts = get_posts(array(
        'numberposts' => -1,
        'post_type' => 'event'
        // 'meta_key' => 'location',
        // 'meta_value' => 'melbourne'
    ));

if($posts)
{
    echo '<ul class="grid events">';
    foreach($posts as $post)
    {
        echo '<div class="grid-item">';
        echo '<p class="h4">' . get_the_title($post->ID) . '</p>';
        echo '<img src="' . get_field('graphic') . '" class="image">';
        echo '<a href="' . get_permalink($post->ID) . '">More information</a>';
        // echo '<p>' . get_field('information') . '</p>';
        echo '<p>' . get_field('date_time') . '</p>';
        echo '</div>';
    }
    echo '</ul>';
}
?>
</section>

<?php get_footer(); ?>