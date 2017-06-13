<?php
/**
 * ALPS functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ALPS
 */
add_action('init', 'start_session', 1);
add_action('wp_logout', 'end_session');
add_action('wp_login', 'end_session');

function start_session() {
    if(!session_id()) {
        session_start();
    }
}

function end_session() {
    session_destroy ();
}


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

	wp_deregister_script('jquery');

	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);

	wp_enqueue_style( 'alps-fonts', 'https://fonts.googleapis.com/css?family=Nunito|Open+Sans');

	wp_enqueue_style( 'alps-bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');

	wp_enqueue_script( 'alps-bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', '3.3.7', true);

	wp_enqueue_style( 'alps-font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

	if ( !is_404() ) {
		
		wp_enqueue_script( 'google-recaptcha', 'https://www.google.com/recaptcha/api.js', array(), null, false);

		wp_enqueue_style( 'alps-submit-loading', get_template_directory_uri() . '/css/waitMe.min.css');

		wp_enqueue_script( 'alps-submit-loading', get_template_directory_uri() . '/js/waitMe.min.js');

		wp_enqueue_script( 'alps-page-loader', get_template_directory_uri() .'/js/form-submission-handler.js');

		wp_enqueue_style( 'alps-buttons', get_template_directory_uri() . '/css/button.min.css');

		wp_enqueue_style( 'alps-drawer', get_template_directory_uri() . '/css/drawer.min.css');

		wp_enqueue_script( 'alps-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '20160604', true );

		wp_enqueue_script('alps-inquire', get_template_directory_uri() . '/js/form-submission.js', array(), '1.0.0', true);

		wp_enqueue_script( 'alps-drawer', get_template_directory_uri() . '/js/drawer.min.js', array('jquery'), '3', true );

		wp_enqueue_script( 'alps-iscroll', get_template_directory_uri() . '/js/iscroll.min.js', array(), '5.2',true );

		wp_enqueue_script( 'alps-bs-validator', get_template_directory_uri() . '/js/validator.min.js', array('jquery'), '0.11', true);

		wp_enqueue_script( 'alps-sticky-kit', get_template_directory_uri() . '/js/sticky-kit.js', array('jquery'), '1.1.2', true);

	}
	wp_enqueue_script( 'alps-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

}
add_action( 'wp_enqueue_scripts', 'alps_scripts' );


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


function customizer_style() {
    wp_enqueue_style( 'customizer_stylesheet', get_template_directory_uri().'/css/admin-style.css', '1.0.0');
	wp_enqueue_script('jquery-ui-datepicker');
	wp_enqueue_script('admin-edit-post', get_template_directory_uri().'/js/admin-edit-post.js', array('jquery', 'jquery-ui-datepicker'), null, true);
}
add_action( 'admin_enqueue_scripts', 'customizer_style', 10);


function customizer_script() {
    wp_register_script( 'customizer_script', get_template_directory_uri()
			.'/js/admin-general-customizer.js', array('jquery', 'jquery-ui-draggable'), '1.0.2', true);
    wp_enqueue_script( 'customizer_script' );
}
add_action( 'customize_controls_enqueue_scripts', 'customizer_script');


/**
* Remove "Comments" on Admin Dashboard
**/
function remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
    remove_menu_page( 'edit.php' );
}
add_action('admin_menu', 'remove_admin_menus');


/**
* Allow SVG type to be uploaded
**/
function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/**
* Custom Fields Array
* - Sessions
* - Lectures
* - Level
**/
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
	),
	array(
		'label' => 'Featured Course',
		'desc' 	=> 'Featured Course',
		'id'	=> $prefix.'featured',
		'type'	=> 'radio',
		'options' => array (
			'True' => array (
				'label' => 'True',
				'value' => 'True'
			),
			'False' => array (
				'label' => 'False',
				'value' => 'False',
			)
		)
	)
);


$custom_repeatable_datepicker = array(
	array(
		'label' => 'Dates for (AM) class',
		'desc'  => 'Pick a date',
		'id'    => $prefix.'day_schedule',
		'type'  => 'repeatable_datepicker'
	),
	array(
		'label' => 'Dates (PM) class',
		'desc'  => 'Pick a date',
		'id'    => $prefix.'night_schedule',
		'type'  => 'repeatable_datepicker'
	)
);


function register_custom_meta_box() {
	$types = array('public-course', 'in-house-training', 'team-building');
	foreach ($types as $type) {
		add_meta_box($type.'_outline', __('Outline', 'wysiwyg') , 'course_outline', $type);
		add_meta_box($type.'_module', __('Module', 'wysiwyg') , 'course_module', $type);
		add_meta_box(
			$type.'_custom_fields', // $id
			'Custom Fields', // $title
			'show_course_custom_fields', // $callback
			$type);
	}
	add_meta_box(
		'public-course_repeatable_datepicker',
		'Dates',
		'show_public_course_custom_fields',
		'public-course'
	);
}
add_action('admin_init', 'register_custom_meta_box');


function show_public_course_custom_fields () {
	global $custom_repeatable_datepicker, $post;
	echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';
	// Begin the field table and loop
	echo '<table class="form-table">';
	foreach ($custom_repeatable_datepicker as $field) {
		// get value of this field if it exists for this post
		$meta = get_post_meta($post->ID, $field['id'], true);
		if(!empty($meta)) {
			$meta = array_filter($meta, 'blank_filter');
		}
		// begin a table row with
		echo '<tr>
			<th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
			<td>';
			switch($field['type']) {
				case 'repeatable_datepicker':
					echo '<a class="repeatable-add button" href="#">Add</a>
							<ul id="'.$field['id'].'-repeatable" class="custom_repeatable">';
					$i = 0;
					if ($meta) :
						foreach($meta as $row) :
							echo '<li><input type="text" class="datepicker" name="'.$field['id'].'['.$i.']" id="'.$field['id'].'['.$i.']" value="'.$row.'" size="30" />
									<a class="repeatable-remove button" href="#">Delete</a></li>';
							$i++;
						endforeach;
					else :
						echo '<li><input type="text" class="datepicker" name="'.$field['id'].'['.$i.']" id="'.$field['id'].'['.$i.']" value="" size="30" />
									<a class="repeatable-remove button" href="#">Delete</a></li>';
					endif;
					echo '</ul>
						<span class="description">'.$field['desc'].'</span>';
				break;
			}
		echo '</td></tr>';
	} // end foreach
	echo '</table>'; // end table
}


function blank_filter($item) {
	date_default_timezone_set('Asia/Manila');
	try {
		$event_date = new DateTime($item. ', 12:00 am');
	} catch (Exception $e) {
		return false;
	}
	$now = new DateTime();
	if($item === '' || ($event_date < $now)) {
		return false;
	}
	return true;
}


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
							$value = $meta != '' ? $meta : $field['min'];
							    echo '<div id="'.$field['id'].'"></div>
							            <input type="'.$field['type'].'" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$value.'" min="'.$field['min'].'"/>
							            <br /><span class="description">'.$field['desc'].'</span>';
							break;
						case 'radio':
							foreach( $field['options'] as $option ) :
								echo '<input type="radio" name="'.$field['id'].'" id="'.$option['value'].'" value="'.$option['value'].'"'. ($meta == $option['value'] ? ' checked="checked"' : '') .'/>
									  <label for="'.$option['value'].'">'.$option['label'].'</label><br/>';
							endforeach;
							break;
	                } //end switch
	        echo '</td></tr>';
	    } // end foreach
	    echo '</table>'; // end table
}


/**
* WYSIWYG Editor for Course Ouline
**/
function course_outline($post) {
	$content = get_post_meta($post->ID, 'course_outline_wysiwyg', true);
	wp_editor(htmlspecialchars_decode($content) , 'course_outline_wysiwyg', array("media_buttons" => true));
}


/**
* WYSIWYG Editor for Course Module
**/
function course_module($post) {
	$content = get_post_meta($post->ID, 'course_module_wysiwyg', true);
	wp_editor(htmlspecialchars_decode($content) , 'course_module_wysiwyg', array("media_buttons" => true));
}


/**
* Save the data from Custom wysiwyg editor
**/
function custom_wysiwyg_save_postdata($post_id) {
	global $custom_meta_fields;
	global $custom_repeatable_datepicker;

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

	save_custom_meta_data($post_id, $custom_meta_fields);
	save_custom_meta_data($post_id, $custom_repeatable_datepicker);

	//  WYSIWYG Editor 
	$data = $_POST['course_outline_wysiwyg'];
	update_post_meta($post_id, 'course_outline_wysiwyg', $data);
	$data = $_POST['course_module_wysiwyg'];
	update_post_meta($post_id, 'course_module_wysiwyg', $data);

 }
add_action('save_post', 'custom_wysiwyg_save_postdata');


function save_custom_meta_data($post_id, $fields) {
	// loop through fields and save the data
	foreach ($fields as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	} // end foreach
}


/**
 *  Custom Post-Type
 */
function custom_post_type () {
    $types = array(
        array(
            'type' => 'in-house-training',
            'singular' => 'In-House Training',
            'plural' => 'In-House Trainings'
        ),
        array(
            'type' => 'public-course',
            'singular' => 'Public Course',
            'plural' => 'Public Courses'
        )
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
			'shows_in_nav_menus' => true,
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
add_action('init', 'custom_post_type');


/**
* Make search query return custom post type results.
**/
function filter_search( $query ) {
    if ( is_search() && $query->is_main_query() && $query->get( 's' ) ){
        $query->set('post_type', array('public-course', 'in-house-training'));
    }
    return $query;
};
add_filter('pre_get_posts', 'filter_search');

function search_by_title_only( $search, &$wp_query ){
    global $wpdb;
    if( ! is_admin() && empty( $search ) && $wp_query->is_search() && $wp_query->is_main_query() ) {
        $search .=" AND 0=1 ";
        return $search; // skip processing - no search term in query
    }
    $q = $wp_query->query_vars;
    $n = !empty($q['exact']) ? '' : '%';
    $search = $searchand = '';
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
add_filter('posts_search', 'search_by_title_only', 500, 2);


function add_post_columns($columns) {
	global $custom_meta_fields;
	foreach($custom_meta_fields as $field) {
		$columns[$field['id']] = __($field['label'], 'alps');
	}

    return $columns;
}
add_filter('manage_public-course_posts_columns' , 'add_post_columns');
add_filter('manage_in-house-training_posts_columns', 'add_post_columns');


function custom_columns( $column, $post_id ) {
	echo get_post_meta($post_id, $column, true);
}
add_action('manage_pages_custom_column' , 'custom_columns', 10, 2 );


function add_post_columns_sortable($columns) {
	global $custom_meta_fields;
	foreach($custom_meta_fields as $field) {
		$columns[$field['id']] = $field['id'];
	}

    return $columns;
}
add_filter('manage_edit-public-course_sortable_columns' , 'add_post_columns_sortable');
add_filter('manage_edit-in-house-training_sortable_columns', 'add_post_columns_sortable');


function manage_wp_posts_pre_get_posts( $query ) {

	$orderby = $query->get('orderby');

	if($orderby == 'course_lectures' || $orderby == 'course_days') {
		$query->set( 'meta_key', $orderby);
		$query->set( 'orderby', 'meta_value_num' );
	} else if($orderby == 'course_level' || $orderby == 'course_featured') {
		$query->set( 'meta_key', $orderby);
		$query->set( 'orderby', 'meta_value' );
	}
      
}
add_action( 'pre_get_posts', 'manage_wp_posts_pre_get_posts');


function add_custom_types_to_tax( $query ) {
	if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {

		// Get all your post types
		$post_types = get_post_types();

		$query->set( 'post_type', $post_types );
		return $query;
	}
}
add_filter( 'pre_get_posts', 'add_custom_types_to_tax' );

/*
 add category
 */
function add_taxonomies_to_pages() {
	register_taxonomy_for_object_type( 'post_tag', 'page' );
	register_taxonomy_for_object_type( 'category', 'page' );
}
add_action( 'init', 'add_taxonomies_to_pages' );

if ( ! is_admin() ) {
	add_action( 'pre_get_posts', 'category_and_tag_archives' );
}
function category_and_tag_archives( $wp_query ) {
	$my_post_array = array('post','page');
	if ( $wp_query->get( 'category_name' ) || $wp_query->get( 'cat' ) )
		$wp_query->set( 'post_type', $my_post_array );

	if ( $wp_query->get( 'tag' ) )
		$wp_query->set( 'post_type', $my_post_array );
}