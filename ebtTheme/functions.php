<?php

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

// in case we want the parent theme stylsheet
function ebtTheme_enqueue_styles() {
	wp_enqueue_style( 
		'ebtTheme-parent-style', 
		get_parent_theme_file_uri( 'style.css' )
	);
}

add_action( 'wp_enqueue_scripts', 'ebtTheme_enqueue_styles' );

// add featured image option to post editor
add_theme_support('post-thumbnails', array(
	'post',
	'page',
	'custom-post-type-name',
));


/*  DISABLE GUTENBERG STYLE IN HEADER| WordPress 5.9 */
function wps_deregister_styles() {
    wp_dequeue_style( 'global-styles' );
}
add_action( 'wp_enqueue_scripts', 'wps_deregister_styles', 100 );


// search for custom post types (results go to search page)
function custom_search_filter($query) {
    if (!is_admin() && $query->is_search() && $query->is_main_query()) {
        // Define custom post types to search
        $query->set('post_type', array('sermon'));
    }
    return $query;
}
add_filter('pre_get_posts', 'custom_search_filter');

// include the metafields of the custom post types
// function custom_search_include_meta($search, $query) {
//     if ($query->is_search() && !is_admin() && $query->is_main_query()) {
//         global $wpdb;

//         // Get the search query
//         $search_term = esc_sql($query->get('s'));

//         if (!empty($search_term)) {
//             $search = "
//                 AND (
//                     ({$wpdb->posts}.post_title LIKE '%{$search_term}%')
//                     OR ({$wpdb->posts}.post_content LIKE '%{$search_term}%')
//                     OR EXISTS (
//                         SELECT * FROM {$wpdb->postmeta}
//                         WHERE {$wpdb->posts}.ID = {$wpdb->postmeta}.post_id
//                         AND {$wpdb->postmeta}.meta_value LIKE '%{$search_term}%'
//                     )
//                 )
//             ";
//         }
//     }
//     return $search;
// }
// add_filter('posts_search', 'custom_search_include_meta', 10, 2);



// do it with ajax, return results on the same page
function ajax_search_results() {
    $paged = isset($_POST['paged']) ? absint($_POST['paged']) : 1;
    $start_date = isset($_POST['start_date']) ? sanitize_text_field($_POST['start_date']) : '';
    $end_date = isset($_POST['end_date']) ? sanitize_text_field($_POST['end_date']) : '';

    $meta_query = array(); // Initialize meta query array

    // if text search query is empty, return all posts
    if (empty($_POST['s'])) {
        $meta_query[] = array(
            'key'     => 'date_time',
            'value'   => array($start_date . ' 00:00:00', $end_date . ' 23:59:59'),
            'compare' => 'BETWEEN',
        );
    }
    
    // Add date range filters if both dates are provided
    if (!empty($start_date) && !empty($end_date)) {
        $meta_query[] = array(
            'key'     => 'date_time', // Custom field key
            'value'   => array($start_date . ' 00:00:00', $end_date . ' 23:59:59'),
            'compare' => 'BETWEEN',
            'type'    => 'DATETIME',
        );
    } elseif (!empty($start_date)) { // Filter only by start date
        $meta_query[] = array(
            'key'     => 'date_time',
            'value'   => $start_date . ' 00:00:00',
            'compare' => '>=',
            'type'    => 'DATETIME',
        );
    } elseif (!empty($end_date)) { // Filter only by end date
        $meta_query[] = array(
            'key'     => 'date_time',
            'value'   => $end_date . ' 23:59:59',
            'compare' => '<=',
            'type'    => 'DATETIME',
        );
    }

    $search_query = new WP_Query(array(
        'post_type'      => isset($_POST['post_type']) ? sanitize_text_field($_POST['post_type']) : 'post',
        's'              => sanitize_text_field($_POST['s']),
        'posts_per_page' => 5,
        'paged'          => $paged,
        'meta_query'     => $meta_query, // Apply date range filter
    ));

    if ($search_query->have_posts()) {
        while ($search_query->have_posts()) {
            $search_query->the_post();
            ?>
            <li class="sermons__sermon">
                <img src="<?php echo get_field('graphic'); ?>" class="image">
                <div class="sermons__info">
                    <p class="h5"> <?php echo get_the_title($post->ID) ?></p>
                    <p class="sermons__details"><?php echo get_field('date_time') . ' | ' . get_field('speaker'); ?></p>
                </div>
                <a href="<?php get_permalink($post->ID) ?>" class="sermons__link"></a>
            </li>
        <?php   
        }

        // Pagination
        $total_pages = $search_query->max_num_pages;
        if ($total_pages > 1) {
            echo '<div class="ajax-pagination">';
            for ($i = 1; $i <= $total_pages; $i++) {
                echo '<a href="#" class="page-link" data-page="' . $i . '">' . $i . '</a> ';
            }
            echo '</div>';
        }
    } else {
        echo '<p>No results found. <a href="'.home_url().'/sermons" style="display: inline-block; text-decoration: underline;">Back to Sermons</a></p>';
    }

    wp_die();
}
add_action('wp_ajax_ajax_search', 'ajax_search_results');
add_action('wp_ajax_nopriv_ajax_search', 'ajax_search_results');


function enqueue_ajax_search_script() {
    wp_enqueue_script('ajax-search', get_template_directory_uri() . '/js/script.js', array('jquery'), null, true);
    wp_localize_script('ajax-search', 'ajaxurl', admin_url('admin-ajax.php'));
}
add_action('wp_enqueue_scripts', 'enqueue_ajax_search_script');

function register_footer_menu() {
    register_nav_menu('footer-menu', __('Footer Menu'));
}
add_action('init', 'register_footer_menu');

// remove certain admin items for certain user IDs
function remove_plugin_admin_menu() {
    $allowed_user = 1;
    if (get_current_user_id() !== $allowed_user) {
        remove_menu_page('edit.php?post_type=wpstream_product');
        remove_menu_page('edit.php?post_type=wpstream_product_vod');
    }
}
add_action( 'admin_menu', 'remove_plugin_admin_menu', 999);