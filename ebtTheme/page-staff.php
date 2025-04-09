<?php get_header();
/* Template Name: STAFF */  ?>

<div class="page-title-banner">
    <p class="page-width">Staff</p>
</div>

<section class="page-width">
    <h1 class="h2 title">Pastoral Staff</h1>
    <?php
$width = "";
$category_id = get_cat_ID('officer');
$posts = get_posts(array(
    'numberposts' => -1,
    'post_type' => 'staff',
    'cat' => -$category_id,
    'meta_key' => 'page_position',
    'orderby' => 'meta_value',
    'order' => 'ASC'
));

if($posts)
{
    echo '<ul class="staff-items__container">';
    foreach($posts as $post)
    {
        if (str_contains(get_field('position') , 'Senior')) {
            $width = " full";
        }
        echo '<div class="staff-item' . $width . '">';
        echo '<img src="' . get_field('photo') . '">';
        echo '<div class="staff-item__info">';
        echo '<p class="h4">' . get_the_title($post->ID) . '</p>';
        echo '<p class="position">' . get_field('position') . '</p>';
        echo '<p class="phone-email">' . get_field('phone_number') . ' | ' . get_field('email') . '</p>';
        echo '<p>' . get_field('bio') . '</p>';
        echo '</div>';
        echo '</div>';
        $width = "";
    }
    echo '</ul>';
}
?>

    <hr>
    <h2>Church Officers and Deacons</h2>

    <?php $category_id=get_cat_ID('officer');
        $posts=get_posts(array( 'numberposts'=> -1,
        'post_type' => 'staff',
        'cat' => $category_id,
        'meta_key' => 'page_position',
        'orderby' => 'meta_value',
        'order' => 'ASC'
        ));

        if($posts)
        {
        echo '<ul class="officer-items__container">';
            foreach($posts as $post)
            {
            if (str_contains(get_the_title($post->ID) , 'Deacon')) {
            $width = " full";
            }
            echo '<div class="officer-item' . $width . '">';
                echo '<img src="' . get_field('photo') . '">';
                if (str_contains(get_the_title($post->ID) , 'Deacon')) {
                echo '<p>' . get_field('bio') . '</p>';
                } else {
                echo '<p class="h4">' . get_the_title($post->ID) . '</p>';
                }
                echo '<p class="positon">' . get_field('position') . '</p>';
                echo '<p>' . get_field('email') . '</p>';
                echo '</div>';
            $width = "";
            }
            echo '</ul>';
        }
        ?>
</section>

<?php get_footer(); ?>