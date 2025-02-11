<?php get_header();
/* 
Template Name: SERMON-SINGLE
Template Post Type: sermon
*/ ?>

<div class="page-title-banner">
    <p class="page-width">Sermon</p>
</div>

<p class="breadcrumbs page-width"><a href="/events">All Sermons</a> >
    <?php echo get_the_title($post->ID); ?></p>

<?php
echo '<div class="sermon-container page-width">';
echo '<div class="sermon-audio">';
echo '<img src="' . get_field('graphic') . '" class="image">';
echo '<audio controls>';
echo '<source src="' . get_field('audio_file') . '" type="audio/mp3">';
echo 'Your browser does not support this audio element';
echo '</audio>';
echo '</div>';
echo '<div class="sermon-info">';
echo '<p><b>Title: </b>' . get_the_title($post->ID) . '</p>';
echo '<p><b>Speaker: </b>' . get_field('speaker') . '</p>';
echo '<p><b>Date: </b>' . get_field('date_time') . '</p>';
echo '<a href="' . get_field('audio_file') . '" class="letter">Download <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 15v4c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2v-4M17 9l-5 5-5-5M12 12.8V2.5"/></svg></a>';
echo '</div>';
echo '</div>';
?>

<section class="messages page-width" style="display: none;">
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