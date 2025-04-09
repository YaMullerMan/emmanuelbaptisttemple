<?php get_header();
/* Template Name: MINISTRIES */  ?>

<div class="page-title-banner">
    <p class="page-width">Ministries</p>
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

        if($posts)
        {
            echo '<ul class="ministries-navigation">';
            $index = 0;
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
            $index = 0;
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
                echo '<div class="ministry-flex">';
                echo '<p style="display: inline-block">' . get_field('leader_name') . '</p>';
                echo '<img src="' . get_field('leader_image') . '" class="ministry-leader">';
                echo '</div>';
                echo '</div>';
                echo '<p>' . get_field('description') . '</p>';
                echo '<div class="ministry-images">';
                echo '<img src="' . get_field('image_1') . '" class="ministry-image">';
                echo '<img src="' . get_field('image_2') . '" class="ministry-image">';
                echo '</div>';
                echo '</div>';
                $index++;
            }
            echo '</div>';
        }
        ?>
    </div>
</section>

<section class="events">
    <div class="page-width">
        <h2 class="heading">Upcoming Events</h2>
        <div class="flex">
            <?php 
                $posts = get_posts(array(
                    'numberposts' => 3,
                    'post_type' => 'event'
                ));

                if($posts)
                {
                    foreach($posts as $post)
                    {
                        echo '<div class="flex-item"><a href="' . get_permalink($post->ID) . '">';
                        echo '<img src="' . get_field('graphic') . '">';
                        echo '<p>' . get_the_title($post->ID) . ': ' . get_field('date_time') . '</p>';
                        echo '</a></div>';
                    }
                }
                ?>
        </div>
        <a href="/events" class="button tan">ALL EVENTS</a>
    </div>
</section>

<?php get_footer(); ?>