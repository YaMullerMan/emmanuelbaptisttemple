<?php get_header();
/* Template Name: HOME */  ?>

<section style="padding-bottom: 0;">
    <div class="hero">
        <div class="text-container page-width">
            <h1 class="hxl" style="color: red;">Welcome to Emmanuel</h1>
            <p class="large">Join us at 10:45 every Sunday for bible
                preaching,<br>
                worship,
                and encouragement.</p>
            <a href="/visit" class="button">VISIT US!</a>
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
            <a href="https://maps.apple.com/?address=16221%20US-40,%20Hagerstown,%20MD%20%2021740,%20United%20States&auid=4255441777652422849&ll=39.651317,-77.806931&lsp=9902&q=Emmanuel%20Baptist%20Temple&t=m"
                class="button silver">DIRECTIONS</a>
        </div>
        <div class="flex-item">
            <h4>ONLINE</h4>
            <p>Livestream for every service<br>
                Replay any service, any time</p>
            <a href="/watch" class="button silver">LIVESTREAM</a>
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
        <?php 
            $posts = get_posts(array(
                'numberposts' => -1,
                'post_type' => 'ministry',
                'meta_key' => 'home_page',
                'meta_value' => true,
                // 'orderby' => 'meta_value',
                'order' => 'ASC'
            ));

            if($posts)
            {
                foreach($posts as $post)
                {
                    // echo '<div class="flex-item flex-center"><a href="' . get_permalink($post->ID) . '">';
                    echo '<div class="flex-item flex-center"><a href="/ministries?id=' . get_the_ID() . '">';
                    echo '<img src="' . get_field('icon') . '">';
                    echo '<p>' . get_the_title($post->ID) . '</p>';
                    echo '</div>'; //</a>
                }
            }
        ?>
    </div>
</section>

<section class="graphic page-width">
    <img
        src="<?php echo get_stylesheet_directory_uri(); ?>/images/newtoebt.png">
</section>

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

<section class="messages page-width">
    <h2 class="heading">Recent Messages</h2>
    <smooth-slider class="slider-container messages">
        <div class="wrapper">
            <div class="slider__container" data-id="1">
                <div class="slides">
                    <?php 
                    $posts = get_posts(array(
                        'numberposts' => 4,
                        'post_type' => 'sermon'
                    ));

                    if($posts)
                    {
                        foreach($posts as $post)
                        {
                            echo '<div class="slide"><a href="' . get_permalink($post->ID) . '">';
                            echo '<img src="' . get_field('graphic') . '" width="350px">';
                            echo '</a></div>';
                        }
                    }
                ?>
                </div>
            </div>
            <div class="navigation">
                <span class="backward" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                        height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2.5"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M15 18l-6-6 6-6" />
                    </svg>
                </span>
                <span class="forward" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                        height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2.5"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 18l6-6-6-6" />
                    </svg>
                </span>
            </div>
        </div>
    </smooth-slider>
</section>

<?php get_footer(); ?>