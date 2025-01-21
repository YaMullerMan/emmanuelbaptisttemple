<?php get_header();
/* Template Name: SERMONS */  ?>

<div class="page-title-banner">
    <p class="page-width">Event</p>
</div>

<section class="page-width">

    <?php 
// need to figure out pagination
$posts = get_posts(array(
    'numberposts' => -1,
    'post_type' => 'sermon'
));

if($posts)
{
    echo '<ul>';
    foreach($posts as $post)
    {
        echo '<h3>' . get_the_title($post->ID) . '</h3>';
        echo '<img src="' . get_field('graphic') . '" class="image">';
        echo '<p>' . get_field('date_time') . '</p>';
        echo '<a href="' . get_permalink($post->ID) . '">View Sermon</a>';
    }
    echo '</ul>';
}
?>
</section>

<?php get_footer(); ?>