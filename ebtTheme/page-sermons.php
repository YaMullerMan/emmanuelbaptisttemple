<?php get_header();
/* Template Name: SERMONS */  ?>

<div class="page-title-banner">
    <p class="page-width">Sermons</p>
</div>

<section class="page-width">

    <h1 class="h2 title">Find a Sermon</h1>

    <div class="search__container">
        <div>
            <form id="ajax-search-form" role="search" method="get">
                <div class="input-with-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18"
                        height="18" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round"
                        class="icon">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <input type="search" id="ajax-search" name="s"
                        placeholder="Search..." size="45" />
                </div>
                <div class="button input"
                    onclick="this.nextElementSibling.nextElementSibling.classList.toggle('visible')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18"
                        height="18" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round">
                        <line x1="4" y1="21" x2="4" y2="14"></line>
                        <line x1="4" y1="10" x2="4" y2="3"></line>
                        <line x1="12" y1="21" x2="12" y2="12"></line>
                        <line x1="12" y1="8" x2="12" y2="3"></line>
                        <line x1="20" y1="21" x2="20" y2="16"></line>
                        <line x1="20" y1="12" x2="20" y2="3"></line>
                        <line x1="1" y1="14" x2="7" y2="14"></line>
                        <line x1="9" y1="8" x2="15" y2="8"></line>
                        <line x1="17" y1="16" x2="23" y2="16"></line>
                    </svg>
                </div>
                <input type="hidden" name="post_type" value="sermon" />

                <div class="dates">
                    <label for="start-date">Start:</label>
                    <input type="date" id="start-date" name="start_date">
                    <label for="end-date">End:</label>
                    <input type="date" id="end-date" name="end_date">
                </div>

                <button type="submit" class="button silver">SEARCH</button>
            </form>
        </div>
    </div>

    <?php 
// need to figure out pagination and search functionality
$posts = get_posts(array(
    'numberposts' => -1,
    'post_type' => 'sermon'
));

if($posts)
{
    echo '<ul class="sermons__container" id="search-results">';
    foreach($posts as $post)
    {
        echo '<div class="sermons__sermon">';
        echo '<img src="' . get_field('graphic') . '" class="image">';
        echo '<div class="sermons__info">';
        echo '<p class="h5">' . get_the_title($post->ID) . '</p>';
        echo '<p class="sermons__details">' . get_field('date_time') . ' | ' . get_field('speaker')  . '</p>';
        echo '</div>';
        echo '<a href="' . get_permalink($post->ID) . '" class="sermons__link"></a>';
        echo '</div>';
    }
    echo '</ul>';
}
?>
</section>

<?php get_footer(); ?>