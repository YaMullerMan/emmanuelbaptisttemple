<?php get_header();
/* Template Name: MISSIONARIES */  ?>

<div class="page-title-banner">
    <p class="page-width">Missionaries</p>
</div>

<section class="page-width">
    <?php the_content(); ?>

    <?php 
$posts = get_posts(array(
    'numberposts' => -1,
    'post_type' => 'missionary'
    // 'meta_key' => 'location',
    // 'meta_value' => 'melbourne'
));

if($posts)
{
    echo '<ul>';
    foreach($posts as $post)
    {
        echo '<h3>' . get_the_title($post->ID) . '</h3>';
        echo '<img src="' . get_field('photo') . '" class="image">';
        echo '<a src="' . get_field('letter') . '" class="letter">Next Letter</a>';
        echo '<p>' . get_field('country') . '</p>';
        echo '<p>' . get_field('description') . '</p>';
    }
    echo '</ul>';
}
?>
</section>

<?php get_footer(); ?>