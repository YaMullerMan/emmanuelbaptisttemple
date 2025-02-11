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
    echo '<ul class="missionaries-container">';
    foreach($posts as $post)
    {
        echo '<div class="missionary-item">';
        echo '<img src="' . get_field('photo') . '" class="image">';
        echo '<h3 class="h4">' . get_the_title($post->ID) . '</h3>';
        echo '<a src="' . get_field('letter') . '" class="letter">View Letter <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 15v4c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2v-4M17 9l-5 5-5-5M12 12.8V2.5"/></svg></a>';
        echo '<p>' . get_field('country') . '</p>';
        echo '<p>' . get_field('description') . '</p>';
        echo '</div>';
    }
    echo '</ul>';
}
?>
</section>

<?php get_footer(); ?>