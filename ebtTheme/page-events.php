<?php get_header();
/* Template Name: EVENTS */  ?>

<div class="page-title-banner">
    <p class="page-width">Events</p>
</div>

<section class="page-width">

    <?php 
        $posts = get_posts(array(
        'numberposts' => -1,
        'post_type' => 'event'
        // 'meta_key' => 'location',
        // 'meta_value' => 'melbourne'
    ));

if($posts)
{
    echo '<ul>';
    foreach($posts as $post)
    {
        echo '<h3>' . get_the_title($post->ID) . '</h3>';
        echo '<img src="' . get_field('graphic') . '" class="image">';
        echo '<a href="' . get_permalink($post->ID) . '">More info</a>';
        echo '<p>' . get_field('information') . '</p>';
        echo '<p>' . get_field('date_time') . '</p>';
    }
    echo '</ul>';
}
?>
</section>

<?php get_footer(); ?>