<?php get_header();
/* Template Name: HOME */  ?>

<section style="padding-bottom: 0;">
    <div class="hero">
        <div class="text-container page-width">
            <h1 class="hxl">Welcome to Emmanuel</h1>
            <p class="large">Join us at 10:45 every Sunday for bible
                preaching,<br>
                worship,
                and encouragement.</p>
            <a href="/visit" class="button">VISIT</a>
        </div>
    </div>
</section>

<section style="padding: 0">
    <custom-slider class="slider__container">
        <div class="slider__slides">
            <?php 
            $posts = get_posts(array(
                'numberposts' => -1,
                'post_type' => 'slide'
            ));

            $index = 0;

            if($posts) {
                foreach($posts as $post) {
                    if ($index == 0) {
                        $class = "active";
                        if (get_field('image') != "") {
                            $class = "active flex-item";
                        }
                    } else {
                        $class = null;
                        if (get_field('image') != "") {
                            $class = "flex-item";
                        }
                    }
                    echo '<div class="slider__slide ' . $class . '" style="background-image: url(' . get_field('background_image') . ')" data-index="' . $index . '">';
                    echo '<div class="slider__slide-content page-width ' . $class . '">';
                    if (get_field('image')) echo '<div>';
                    if (get_field('heading') != "") echo '<h2 style="color:' . get_field('heading_color') . ' ">' . get_field('heading') . '</h2>';
                    if (get_field('text') != "") echo '<p style="color:' . get_field('text_color') . ' ">' . get_field('text') . '</p>';
                    if (get_field('button_text') != "") {
                    echo '<a class="button" href="' . get_field('button_link') . '">' . get_field('button_text') . '</a>';
                    }
                    if (get_field('image') != "") echo '</div><img src="' . get_field('image') . '">';
                    echo '</div>';
                    echo '</div>';
                    $index++;
                }
            }
            ?>
        </div>
        <a class="slider__previous" style="display: none;"
            role="button">&#10096</a>
        <a class="slider__next" style="display: none" role="button">&#10097</a>
        <div class="slider__dots-container"></div>
    </custom-slider>
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

<section class="ministries page-width">
    <h2 class="heading">Our ministries</h2>
    <div class="flex">
        <div class="flex-item flex-center">
            <a href="/visit" class="">
                <img
                    src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-bus.png">
                <p>BUS</p>
            </a>
        </div>
        <div class="flex-item flex-center">
            <a href="/visit" class="">
                <img
                    src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-bus.png">
                <p>YOUTH</p>
            </a>
        </div>
        <div class="flex-item flex-center">
            <a href="/visit" class="">
                <img
                    src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-bus.png">
                <p>ESL</p>
            </a>
        </div>
        <div class="flex-item flex-center">
            <a href="/visit" class="">
                <img
                    src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-bus.png">
                <p>SCHOOL</p>
            </a>
        </div>
        <div class="flex-item flex-center">
            <a href="/visit" class="">
                <img
                    src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-bus.png">
                <p>MUSIC</p>
            </a>
        </div>
    </div>
</section>

<section class="graphic page-width">
    <img
        src="<?php echo get_stylesheet_directory_uri(); ?>/images/newtoebt.png">
</section>

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