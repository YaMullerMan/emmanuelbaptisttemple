<?php get_header();
/* Template Name: HEAVEN */  ?>

<div class="page-title-banner">
    <p class="page-width">Heaven</p>
</div>

<section class="page-width">
    <?php the_content() ?>
</section>

<a href="/contact" class="button" style="margin: 35px auto">CONTACT</a>

<section class="messages page-width">
    <h2 class="heading">Recent Messages</h2>
    <div class="flex">
        <?php 
            $posts = get_posts(array(
                'numberposts' => 4,
                'post_type' => 'sermon'
            ));

            if($posts)
            {
                foreach($posts as $post)
                {
                    echo '<div class="flex-item"><a href="' . get_permalink($post->ID) . '">';
                    echo '<img src="' . get_field('graphic') . '">';
                    echo '</a></div>';
                }
            }
            ?>
    </div>
</section>

<?php get_footer(); ?>