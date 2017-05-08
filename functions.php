<?php
/**
 * ALPS functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ALPS
 */

if ( ! function_exists( 'alps_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function alps_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a them`` based on ALPS, use a find and replace
	 * to change 'alps' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'alps', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'alps' ),
        'footer' => esc_html__( 'Footer Menu', 'alps')
	) );


	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'alps_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'alps_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function alps_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'alps_content_width', 640 );
}
add_action( 'after_setup_theme', 'alps_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function alps_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'alps' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'alps' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'alps_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function alps_scripts() {


	wp_enqueue_style( 'alps-style', get_stylesheet_uri() );

	wp_enqueue_style( 'alps-fonts', 'https://fonts.googleapis.com/css?family=Nunito|Open+Sans');

	wp_enqueue_style( 'alps-stamp-icons', get_template_directory_uri() . '/inc/icon-picker/css/stamp-icons.min.css');

    wp_enqueue_style( 'alps-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');

    wp_enqueue_style( 'alps-buttons', get_template_directory_uri() . '/css/button.css');

    wp_enqueue_style( 'alps-normalize', get_template_directory_uri() . '/css/normalize.css');

    wp_enqueue_style( 'alps-drawer', get_template_directory_uri() . '/css/drawer.css');

    wp_enqueue_style( 'alps-searchbar', get_template_directory_uri() . '/css/searchbar.css');

	wp_enqueue_style( 'alps-grid-system', get_template_directory_uri(). '/css/grid-system.css');

    wp_enqueue_script( 'alps-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '20160604', true );

    wp_deregister_script('jquery');

    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);

    wp_enqueue_script( 'alps-drawer', get_template_directory_uri() . '/js/drawer.js', array('jquery'), '3', true );

    wp_enqueue_script( 'alps-classie', get_template_directory_uri() . '/js/classie.js', array('jquery'), '3', true );

    wp_enqueue_script( 'alps-iscroll', get_template_directory_uri() . '/js/iscroll.js', array(), '5.2',true );

    wp_enqueue_script( 'alps-uisearch', get_template_directory_uri() . '/js/uisearch.js', array('jquery'), '1.0.0' ,true );

    wp_enqueue_script( 'alps-bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), '3', true);

	wp_enqueue_script( 'alps-jspdf', 'https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js', array(), '1.3.4', true);

	wp_enqueue_script( 'alps-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

}
add_action( 'wp_enqueue_scripts', 'alps_scripts' );

function alps_admin_enqueue() {
	wp_register_script('alps-admin-custom', get_template_directory_uri() . '/js/admin-script.js', array(), '1.0.0', true);
	wp_enqueue_script('alps-admin-custom');
}
add_action('admin_enqueue_scripts', 'alps_admin_enqueue');

function accordion_editor_styles() {
    add_editor_style(get_template_directory_uri() . '/css/editor-style.css');
    add_editor_style(get_template_directory_uri() . '/css/font-awesome.min.css');
}
add_action( 'init', 'accordion_editor_styles');

/**
 * Custom template tags for this theme.
 */
//require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

function alps_customizer_style() {
    wp_register_style( 'customizer_stylesheet', get_template_directory_uri() . '/css/admin-style.css', '1.0.0');
    wp_enqueue_style( 'customizer_stylesheet' );
}
add_action( 'admin_enqueue_scripts', 'alps_customizer_style', 10);

function alps_customizer_script() {
    wp_register_script( 'customizer_script', get_template_directory_uri() . '/js/alps-customizer.js',
        array('jquery', 'jquery-ui-draggable'), '1.0.2', true);
    wp_enqueue_script( 'customizer_script' );
}
add_action( 'customize_controls_enqueue_scripts', 'alps_customizer_script');

function alps_make_protocol_relative_url( $url ) {
    return preg_replace( '(https?://)', '//', $url );
}

function remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
    remove_menu_page( 'edit.php' );
}
add_action('admin_menu', 'remove_admin_menus');


function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function get_breadcrumb() {
    echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
    if (is_category() || is_single()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        the_category(' &bull; ');
            if (is_single()) {
                echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
                the_title();
            }
    } elseif (is_page()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        echo the_title();
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}

// Field Array
$prefix = 'course_';
$custom_meta_fields = array(
	array(
	    'label' => 'Sessions/Days',
	    'desc'  => 'Number of days spinner',
	    'id'    => $prefix.'days',
	    'type'  => 'number',
	    'min'   => '0',
	),
	array(
			'label' => 'Lectures',
			'desc'  => 'Number of lectures spinner',
			'id'    => $prefix.'lectures',
			'type'  => 'number',
			'min'   => '0',
	),
	array(
		'label' => 'Level',
		'desc'	=> 'Course difficulty',
		'id'	=> $prefix.'level',
		'type'	=> 'radio',
		'options' => array (
			'Beginner' => array (
				'label' => 'Beginner',
				'value' => 'Beginner'
			),
			'Intermediate' => array (
				'label' => 'Intermediate',
				'value' => 'Intermediate'
			),
			'Advance' => array (
				'label' => 'Advance',
				'value' => 'Advance'
			),
			'Expert' => array (
				'label' => 'Expert',
				'value' => 'Expert'
			)
		)
	)
);

function register_custom_meta_box() {
	$types = array('public-course', 'in-house-course');
	foreach ($types as $type) {
	 	add_meta_box($type.'_outline', __('Outline', 'wysiwyg') , 'course_outline', $type);
	 	add_meta_box($type.'_module', __('Module', 'wysiwyg') , 'course_module', $type);
		add_meta_box(
	        $type.'_custom_fields', // $id
	        'Custom Fields', // $title
	        'show_course_custom_fields', // $callback
	        $type);
  }
}

add_action('admin_init', 'register_custom_meta_box');

// The Callback
function show_course_custom_fields() {
	global $custom_meta_fields, $post;
	// Use nonce for verification
	echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';
	    // Begin the field table and loop
	    echo '<table class="form-table">';
	    foreach ($custom_meta_fields as $field) {
	        // get value of this field if it exists for this post
	        $meta = get_post_meta($post->ID, $field['id'], true);
	        // begin a table row with
	        echo '<tr>
	                <th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
	                <td>';
	                switch($field['type']) {
										case 'number':
											$value = $meta != '' ? $meta : '1';
											    echo '<div id="'.$field['id'].'"></div>
											            <input type="'.$field['type'].'" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$value.'" min="1"/>
											            <br /><span class="description">'.$field['desc'].'</span>';
											break;
										case 'radio':
											foreach( $field['options'] as $option ) {
												echo '<input type="radio" name="'.$field['id'].'" id="'.$option['value'].'" value="'.$option['value'].'"'. ($meta == $option['value'] ? ' checked="checked"' : '') .'/>
													  <label for="'.$option['value'].'">'.$option['label'].'</label><br/>';
											}
											break;
	                } //end switch

	        echo '</td></tr>';
	    } // end foreach
	    echo '</table>'; // end table

}
function course_outline($post) {
	$content = get_post_meta($post->ID, 'course_outline_wysiwyg', true);
	wp_editor(htmlspecialchars_decode($content) , 'course_outline_wysiwyg', array("media_buttons" => true));
}
function course_module($post) {
	$content = get_post_meta($post->ID, 'course_module_wysiwyg', true);
	wp_editor(htmlspecialchars_decode($content) , 'course_module_wysiwyg', array("media_buttons" => true));
}
function custom_wysiwyg_save_postdata($post_id) {
	global $custom_meta_fields;

     // verify nonce
     if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))
         return $post_id;
     // check autosave
     if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
         return $post_id;
     // check permissions
     if ('page' == $_POST['post_type']) {
         if (!current_user_can('edit_page', $post_id))
             return $post_id;
         } elseif (!current_user_can('edit_post', $post_id)) {
             return $post_id;
     }

     // loop through fields and save the data
     foreach ($custom_meta_fields as $field) {
         $old = get_post_meta($post_id, $field['id'], true);
         $new = $_POST[$field['id']];
         if ($new && $new != $old) {
             update_post_meta($post_id, $field['id'], $new);
         } elseif ('' == $new && $old) {
             delete_post_meta($post_id, $field['id'], $old);
         }
     } // end foreach

    $data = $_POST['course_outline_wysiwyg'];
    update_post_meta($post_id, 'course_outline_wysiwyg', $data);
    $data = $_POST['course_module_wysiwyg'];
    update_post_meta($post_id, 'course_module_wysiwyg', $data);

 }
add_action('save_post', 'custom_wysiwyg_save_postdata');

function custom_mce_buttons_2($buttons) {
	array_unshift( $buttons, 'styleselect');
	return $buttons;
}
add_filter('mce_buttons_2', 'custom_mce_buttons_2');



function custom_mce_before_init_insert_formats( $init_array ) {
	// Define the style_formats array
	$style_formats = array(
		// Each array child is a format with it's own settings
        array(
            'title' => 'Accordion Container', // Title to show in dropdown
            'selector' => 'ul', // Element to add class to
            'classes' => 'accordion', // CSS class to add
            'wrapper' => true
        ),
        array(
            'title' => 'Accordion Header', // Title to show in dropdown
            'selector' => '.accordion h3', // Element to add class to
            'classes' => 'accordion__header' // CSS class to add
        ),
        array(
            'title' => 'Accordion Content', // Title to show in dropdown
            'selector' => '.accordion__header + ul', // Element to add class to
            'classes' => 'accordion__content', // CSS class to add
            'wrapper' => true
        )
	);
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );

	return $init_array;

}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'custom_mce_before_init_insert_formats' );


/**
 *  Custom Post-Type "Course"
 */
function alps_custom_post_type () {

    $types = array(

        array(
            'type' => 'in-house-course',
            'singular' => 'In House Course',
            'plural' => 'In House Courses'
        ),

        array(
            'type' => 'public-course',
            'singular' => 'Public Course',
            'plural' => 'Public Courses'
        )
        // ,

        // array(
        //     'type' => 'faq',
        //     'single' => 'FAQ',
        //     'plural' => 'FAQs'
        // )

    );

    foreach($types as $t) {
        $type = $t['type'];
        $singular = $t['singular'];
        $plural = $t['plural'];

        $labels = array(
            'name' => $plural,
            'singular_name' => $singular,
            'add_new' => 'Add New',
            'add_new_item' => 'Add New',
            'edit_item' => 'Edit',
            'new_item' => 'New',
            'view_item' => 'View',
            'search_item' => 'Search',
            'not_found' => 'No ' .$plural. ' found',
            'not_found_in_trash' => 'No ' .$plural. ' in trash',
            'parent_item_colon' => ''
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'has_archives' => false,
            'menu_icon' => 'dashicons-laptop',
            'publicly_queryable' => true,
            'query_var' => true,
            'rewrite' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => true,
            'supports' => array(
                'title',
                'editor',
				'thumbnail',
				'excerpt'
            ),
            'menu_position' => 5
        );
        register_post_type($type, $args);
    }
}
add_action('init', 'alps_custom_post_type');

function alps_cpt_search( $query ) {

    if ( is_search() && $query->is_main_query() && $query->get( 's' ) ){
        $query->set('post_type', array('public-course', 'in-house-course'));
    }

    return $query;
};

add_filter('pre_get_posts', 'alps_cpt_search');

function __search_by_title_only( $search, &$wp_query )
{
    global $wpdb;
    if(empty($search)) {
        return $search; // skip processing - no search term in query
    }
    $q = $wp_query->query_vars;
    $n = !empty($q['exact']) ? '' : '%';
    $search =
    $searchand = '';
    foreach ((array)$q['search_terms'] as $term) {
        $term = esc_sql($wpdb->esc_like($term));
        $search .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
        $searchand = ' AND ';
    }
    if (!empty($search)) {
        $search = " AND ({$search}) ";
        if (!is_user_logged_in())
            $search .= " AND ($wpdb->posts.post_password = '') ";
    }
    return $search;
}
add_filter('posts_search', '__search_by_title_only', 500, 2);
// function change_default_title( $title ){
//     $screen = get_current_screen();
//     if  ( 'course' == $screen->post_type ) {
//         $title = 'Course';
//     } elseif ( 'faq' == $screen->post_type ) {
//         $title = 'Question';
//     }
//     return $title;
// }
// add_filter( 'enter_title_here', 'change_default_title' );
