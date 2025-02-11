<?php get_header();
/* Template Name: GET-INVOLVED */  ?>

<div class="page-title-banner">
    <p class="page-width">Get Involved</p>
</div>

<section class="ministries page-width">
    <div class="ministries-container">
        <?php 
        $posts = get_posts(array(
            'numberposts' => -1,
            'post_type' => 'ministry'
            // 'meta_key' => 'location',
            // 'meta_value' => 'melbourne'
        ));

        $index = 0;

        if($posts)
        {
            echo '<ul class="ministries-navigation">';
            foreach($posts as $post)
            {
                if ($index == 0) {
                    $class = "active";
                } else {
                    $class = null;
                }
                echo '<div class="ministry-icon ' . $class . '" data-ministry="' . get_the_ID() . '">';
                echo '<img src="' . get_field('icon') . '">';
                echo '</div>';
                $index++;
            }
            echo '</ul>';
            echo '<div class="ministries-content">';
            foreach($posts as $post)
            {
                if ($index == 0) {
                    $class = "active";
                } else {
                    $class = null;
                }
                echo '<div class="ministry-item ' . $class . '" data-ministry="' . get_the_ID() . '">';
                echo '<div class="ministry-item-top">';
                echo '<h3 class="ministry-title">' . get_the_title($post->ID) . '</h3>';
                echo '<div>';
                echo '<p style="display: inline-block">' . get_field('leader_name') . '</p>';
                echo '<img src="' . get_field('leader_image') . '" class="ministry-leader">';
                echo '</div>';
                echo '</div>';
                echo '<p>' . get_field('description') . '</p>';
                echo '<img src="' . get_field('image_1') . '" class="ministry-image">';
                echo '</div>';
                $index++;
            }
            echo '</div>';
        }
        ?>
    </div>
</section>

<?php get_footer(); ?>