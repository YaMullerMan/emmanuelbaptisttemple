<?php get_header();
/* Template Name: CLASSES */  ?>

<div class="page-title-banner">
    <p class="page-width">Classes</p>
</div>

<section class="page-width classes">
    <h1 class="h2 title">Find your class</h1>
    <p>Use the categories above to jump to a class or scroll down through to see
        all of our available classes that meet every Sunday morning at 9:45am.
        With every class our goal is for it to be a smaller, intimate group of
        your church family that you can connect and grow with. Enjoy different
        forms of Bible study, prayer time, and sometimes breakfast! Below you
        will find a short description of each class, pictures, teacher contact
        info and current series.</p>
    <div class="flex categories" id="categories">
        <p class="flex-item">Married couples</p>
        <p class="flex-item">Young adults</p>
        <p class="flex-item">Men</p>
        <p class="flex-item">Women</p>
        <p class="flex-item">Spanish</p>
        <p class="flex-item">New believer</p>
    </div>
</section>


<section class="classes page-width">
    <div class="flex">
        <?php 
$posts = get_posts(array(
    'numberposts' => -1,
    'post_type' => 'class'
    // 'meta_key' => 'location',
    // 'meta_value' => 'melbourne'
));

if($posts)
{
    echo '<ul class="classes-container">';
    foreach($posts as $post)
    {
        echo '<div class="flex">';
        echo '<img src="' . get_field('graphic') . '" class="image">';
        echo '<div class="">';
        echo '<h3>' . get_the_title($post->ID) . '</h3>';
        echo '<p><b>' . get_field('teacher_name') . '</b></p>';
        echo '<p>' . get_field('description') . '</p>';
        echo '</div>';
        echo '</div>';
    }
    echo '</ul>';
}
?>
    </div>
</section>

<?php get_footer(); ?>