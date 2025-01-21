<?php get_header();
/* 
Template Name: SERMON-SINGLE
Template Post Type: sermon
*/ ?>

<h1>Sermon</h1>
<p class="breadcrumbs"><a href="/events">All Sermons</a> >
    <?php echo get_the_title($post->ID); ?></p>

<?php
echo '<div class="sermon-container">';
echo '<img src="' . get_field('graphic') . '" class="image">';
echo '<audio controls>';
    echo '<source src="' . get_field('audio_file') . '" type="audio/mp3">';
    echo 'Your browser does not support this audio element';
echo '</audio>';
echo '<a href="' . get_field('audio_file') . '" class="letter">Download</a>';
echo '</div>';
echo '<p>' . get_the_title($post->ID) . '</p>';
echo '<p>' . get_field('date_time') . '</p>';
?>

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

<section class="services page-width">
    <h2 class="heading">Join us for a service </h2>
    <div class="flex">
        <div class="flex-item">
            <h4 class="">WHEN</h4>
            <p>Sundays @ 10:45am & 6pm<br>
                Wednesdays @ 7:00pm</p>
            <a href="/visit" class="button silver">SERVICES</a>
        </div>
        <div class="flex-item">
            <h4>WHERE</h4>
            <p>16221 National Pike<br>
                Hagerstown MD, 21740</p>
            <!-- make this dynamic to google or apple maps? -->
            <a href="/visit" class="button silver">DIRECTIONS</a>
        </div>
        <div class="flex-item">
            <h4>ONLINE</h4>
            <p>Livestream for every service<br>
                Replay any service, any time</p>
            <a href="/visit" class="button silver">SOCIAL</a>
        </div>
    </div>
</section>

<?php get_footer(); ?>