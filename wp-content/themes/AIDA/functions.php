<?php
/**
 * Twenty Twenty functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

/**
 * Table of Contents:
 * Theme Support
 * Required Files
 * Register Styles
 * Register Scripts
 * Register Menus
 * Custom Logo
 * WP Body Open
 * Register Sidebars
 * Enqueue Block Editor Assets
 * Enqueue Classic Editor Styles
 * Block Editor Settings
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Twenty Twenty 1.0
 */
/* Register Title*/

function aida_filter_wp_title( $title, $sep ) {

    global $paged, $page;

 

    if ( is_feed() )

        return $title;

 

    // Add the site name.

    $title .= get_bloginfo( 'name' );

 

    // Add the site description for the home/front page.

    $site_description = get_bloginfo( 'description', 'display' );

    if ( $site_description && ( is_home() || is_front_page() ) )

        $title = "$title $sep $site_description";

 

    // Add a page number if necessary.

    if ( $paged >= 2 || $page >= 2 )

        $title = "$title $sep " . sprintf( __( 'Page %s', 'twentytwelve' ), max( $paged, $page ) );

 

    return $title;

}

add_filter( 'wp_title', 'aida_filter_wp_title', 10, 2 );

/* functions file Resolve6

     * Loads the Options Panel

     *

     * If you're loading from a child theme use stylesheet_directory

     * instead of template_directory

     */



     define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/');

     require_once dirname(__FILE__) . '/inc/options-framework.php';



     /*

      * Helper function to return the theme option value. If no value has been saved, it returns $default.

      * Needed because options are saved as serialized strings.

      *

      * This code allows the theme to work without errors if the Options Framework plugin has been disabled.

      */



     if (!function_exists('of_get_option')) { 

        function of_get_option($name, $default = false) {

             $optionsframework_settings = get_option('optionsframework');

             // Gets the unique option id

             $option_name = $optionsframework_settings['id'];

             if (get_option($option_name)) {

             $options = get_option($option_name);

             }

             if (isset($options[$name])) {

             return $options[$name];

             } else {

             return $default;

             }

          } 

     }

/* Register menu bar*/

     function register_menus(){
        register_nav_menus(array(
          'primary-menu' => 'Primary Menu',
          'footer-menu' => 'Footer Menu',
         ));

     }
     add_action('init', 'register_menus');
     
     
require_once get_template_directory() . '/class-bootstrap-5-wp-navwalker.php';


/*Register featured images*/

      if ( function_exists( 'add_theme_support' ) ) {

        add_theme_support( 'post-thumbnails' );

      }

      function add_class_on_a_tag($classes, $item, $args)
{
    if (isset($args->add_a_class)) {
        $classes['class'] = $args->add_a_class;
    }
return $classes;
}

add_filter('nav_menu_link_attributes', 'add_class_on_a_tag', 1, 3);

function add_link_atts($atts)
{

    $atts['class'] = "nav-link";

    return $atts;

}

add_filter('nav_menu_link_attributes', 'add_link_atts');

function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
  if (in_array('current-menu-item', $classes) ){
    $classes[] = 'active ';
  }
  return $classes;
}

 // Register Custom Post Type

 // Register Custom Post Type

    function custom_post_type() {
        $labels = array(
        
        'name'                  => _x( 'Our Members', 'Post Type General Name', 'aida' ),
        
        'singular_name'         => _x( 'Our Members', 'Post Type Singular Name', 'aida' ),
        
        'menu_name'             => __( 'Our Members', 'aida' ),
        
        'name_admin_bar'        => __( 'Our Member', 'aida' ),
        
        'archives'              => __( 'Item Archives', 'aida' ),
        
        'parent_item_colon'     => __( 'Parent Members:', 'aida' ),
        
        'all_items'             => __( 'All Members', 'aida' ),
        
        //'add_new_item'          => __( 'Add New Members', 'aida' ),
        
        'add_new'               => __( 'Add Members', 'aida' ),
        
        'new_item'              => __( 'New Members', 'aida' ),
        
        'edit_item'             => __( 'Edit Members', 'aida' ),
        
        'update_item'           => __( 'Update Members', 'aida' ),
        
        'view_item'             => __( 'View Members', 'aida' ),
        
        'search_items'          => __( 'Search Members', 'aida' ),
        
        'not_found'             => __( 'Not found', 'aida' ),
        
        'not_found_in_trash'    => __( 'Not found in Trash', 'aida' ),
        
        'featured_image'        => __( 'Featured Image', 'aida' ),
        
        'set_featured_image'    => __( 'Set featured image', 'aida' ),
        
        'remove_featured_image' => __( 'Remove featured image', 'aida' ),
        
        'use_featured_image'    => __( 'Use as featured image', 'aida' ),
        
        'insert_into_item'      => __( 'Insert into item', 'aida' ),
        
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'aida' ),
        
        'items_list'            => __( 'Items list', 'aida' ),
        
        'items_list_navigation' => __( 'Items list navigation', 'aida' ),
        
        'filter_items_list'     => __( 'Filter items list', 'aida' ),
        
        );
        
        $args = array(
        
        'label'                 => __( 'Our Members', 'aida' ),
        
        'description'           => __( 'Post Type Description', 'aida' ),
        
        'labels'                => $labels,
        
        'supports'              => array( 'title','thumbnail','editor','page-attributes'),
        
        //'taxonomies'            => array( 'category', 'post_tag' ),
        
        'hierarchical'          => false,
        
        'public'                => true,
        
        'show_ui'               => true,
        
        'show_in_menu'          => true,
        
        'menu_position'         => 8,
        
        'menu_icon'             => 'dashicons-welcome-write-blog',
        
        'show_in_admin_bar'     => true,
        
        'show_in_nav_menus'     => true,
        
        'can_export'            => true,
        
        'has_archive'           => true,    
        
        'exclude_from_search'   => false,
        
        'publicly_queryable'    => true,
        
        'capability_type'       => 'page',
        
        );
        
        register_post_type( 'members', $args );
		
		
		 $labels = array(
        
        'name'                  => _x( 'Members of the Association', 'Post Type General Name', 'aida' ),
        
        'singular_name'         => _x( 'Members of the Association', 'Post Type Singular Name', 'aida' ),
        
        'menu_name'             => __( 'Members of the Association', 'aida' ),
        
        'name_admin_bar'        => __( 'Members of the Association', 'aida' ),
        
        'archives'              => __( 'Item Archives', 'aida' ),
        
        'parent_item_colon'     => __( 'Parent Members:', 'aida' ),
        
        'all_items'             => __( 'All Members', 'aida' ),
        
        //'add_new_item'          => __( 'Add New Members', 'aida' ),
        
        'add_new'               => __( 'Add Members', 'aida' ),
        
        'new_item'              => __( 'New Members', 'aida' ),
        
        'edit_item'             => __( 'Edit Members', 'aida' ),
        
        'update_item'           => __( 'Update Members', 'aida' ),
        
        'view_item'             => __( 'View Members', 'aida' ),
        
        'search_items'          => __( 'Search Members', 'aida' ),
        
        'not_found'             => __( 'Not found', 'aida' ),
        
        'not_found_in_trash'    => __( 'Not found in Trash', 'aida' ),
        
        'featured_image'        => __( 'Featured Image', 'aida' ),
        
        'set_featured_image'    => __( 'Set featured image', 'aida' ),
        
        'remove_featured_image' => __( 'Remove featured image', 'aida' ),
        
        'use_featured_image'    => __( 'Use as featured image', 'aida' ),
        
        'insert_into_item'      => __( 'Insert into item', 'aida' ),
        
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'aida' ),
        
        'items_list'            => __( 'Items list', 'aida' ),
        
        'items_list_navigation' => __( 'Items list navigation', 'aida' ),
        
        'filter_items_list'     => __( 'Filter items list', 'aida' ),
        
        );
        
        $args = array(
        
        'label'                 => __( 'Members of the Association', 'aida' ),
        
        'description'           => __( 'Post Type Description', 'aida' ),
        
        'labels'                => $labels,
        
        'supports'              => array( 'title','thumbnail','page-attributes'),
        
        //'taxonomies'            => array( 'category', 'post_tag' ),
        
        'hierarchical'          => false,
        
        'public'                => true,
        
        'show_ui'               => true,
        
        'show_in_menu'          => true,
        
        'menu_position'         => 8,
        
        'menu_icon'             => 'dashicons-welcome-write-blog',
        
        'show_in_admin_bar'     => true,
        
        'show_in_nav_menus'     => true,
        
        'can_export'            => true,
        
        'has_archive'           => true,    
        
        'exclude_from_search'   => false,
        
        'publicly_queryable'    => true,
        
        'capability_type'       => 'page',
        
        );
        
        register_post_type( 'members', $args );
		
		
		$labels = array(
        
        'name'                  => _x( 'Our Objectives', 'Post Type General Name', 'aida' ),
        
        'singular_name'         => _x( 'Our Objectives', 'Post Type Singular Name', 'aida' ),
        
        'menu_name'             => __( 'Our Objectives', 'aida' ),
        
        'name_admin_bar'        => __( 'Our Objectives', 'aida' ),
        
        'archives'              => __( 'Item Archives', 'aida' ),
        
        'parent_item_colon'     => __( 'Parent Objectives:', 'aida' ),
        
        'all_items'             => __( 'All Objectives', 'aida' ),
        
        //'add_new_item'          => __( 'Add New Objectives', 'aida' ),
        
        'add_new'               => __( 'Add Objectives', 'aida' ),
        
        'new_item'              => __( 'New Objectives', 'aida' ),
        
        'edit_item'             => __( 'Edit Members', 'aida' ),
        
        'update_item'           => __( 'Update Objectives', 'aida' ),
        
        'view_item'             => __( 'View Objectives', 'aida' ),
        
        'search_items'          => __( 'Search Objectives', 'aida' ),
        
        'not_found'             => __( 'Not found', 'aida' ),
        
        'not_found_in_trash'    => __( 'Not found in Trash', 'aida' ),
        
        'featured_image'        => __( 'Featured Image', 'aida' ),
        
        'set_featured_image'    => __( 'Set featured image', 'aida' ),
        
        'remove_featured_image' => __( 'Remove featured image', 'aida' ),
        
        'use_featured_image'    => __( 'Use as featured image', 'aida' ),
        
        'insert_into_item'      => __( 'Insert into item', 'aida' ),
        
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'aida' ),
        
        'items_list'            => __( 'Items list', 'aida' ),
        
        'items_list_navigation' => __( 'Items list navigation', 'aida' ),
        
        'filter_items_list'     => __( 'Filter items list', 'aida' ),
        
        );
        
        $args = array(
        
        'label'                 => __( 'Our Objectives', 'aida' ),
        
        'description'           => __( 'Post Type Description', 'aida' ),
        
        'labels'                => $labels,
        
        'supports'              => array( 'title','thumbnail','editor','page-attributes'),
        
        //'taxonomies'            => array( 'category', 'post_tag' ),
        
        'hierarchical'          => false,
        
        'public'                => true,
        
        'show_ui'               => true,
        
        'show_in_menu'          => true,
        
        'menu_position'         => 8,
        
        'menu_icon'             => 'dashicons-welcome-write-blog',
        
        'show_in_admin_bar'     => true,
        
        'show_in_nav_menus'     => true,
        
        'can_export'            => true,
        
        'has_archive'           => true,    
        
        'exclude_from_search'   => false,
        
        'publicly_queryable'    => true,
        
        'capability_type'       => 'page',
        
        );
        
        register_post_type( 'objective', $args );
		
	 $labels = array(
        
        'name'                  => _x( 'Key People', 'Post Type General Name', 'aida' ),
        
        'singular_name'         => _x( 'Key People', 'Post Type Singular Name', 'aida' ),
        
        'menu_name'             => __( 'Key People', 'aida' ),
        
        'name_admin_bar'        => __( 'Key People', 'aida' ),
        
        'archives'              => __( 'Item Archives', 'aida' ),
        
        'parent_item_colon'     => __( 'Parent Key People:', 'aida' ),
        
        'all_items'             => __( 'All Key People', 'aida' ),
        
        //'add_new_item'          => __( 'Add New Key People', 'aida' ),
        
        'add_new'               => __( 'Add Key People', 'aida' ),
        
        'new_item'              => __( 'New Key People', 'aida' ),
        
        'edit_item'             => __( 'Edit Key People', 'aida' ),
        
        'update_item'           => __( 'Update Key People', 'aida' ),
        
        'view_item'             => __( 'View Key People', 'aida' ),
        
        'search_items'          => __( 'Search Key People', 'aida' ),
        
        'not_found'             => __( 'Not found', 'aida' ),
        
        'not_found_in_trash'    => __( 'Not found in Trash', 'aida' ),
        
        'featured_image'        => __( 'Featured Image', 'aida' ),
        
        'set_featured_image'    => __( 'Set featured image', 'aida' ),
        
        'remove_featured_image' => __( 'Remove featured image', 'aida' ),
        
        'use_featured_image'    => __( 'Use as featured image', 'aida' ),
        
        'insert_into_item'      => __( 'Insert into item', 'aida' ),
        
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'aida' ),
        
        'items_list'            => __( 'Items list', 'aida' ),
        
        'items_list_navigation' => __( 'Items list navigation', 'aida' ),
        
        'filter_items_list'     => __( 'Filter items list', 'aida' ),
        
        );
        
        $args = array(
        
        'label'                 => __( 'Our Key People', 'aida' ),
        
        'description'           => __( 'Post Type Description', 'aida' ),
        
        'labels'                => $labels,
        
        'supports'              => array( 'title','thumbnail','editor','page-attributes'),
        
        //'taxonomies'            => array( 'category', 'post_tag' ),
        
        'hierarchical'          => false,
        
        'public'                => true,
        
        'show_ui'               => true,
        
        'show_in_menu'          => true,
        
        'menu_position'         => 8,
        
        'menu_icon'             => 'dashicons-welcome-write-blog',
        
        'show_in_admin_bar'     => true,
        
        'show_in_nav_menus'     => true,
        
        'can_export'            => true,
        
        'has_archive'           => true,    
        
        'exclude_from_search'   => false,
        
        'publicly_queryable'    => true,
        
        'capability_type'       => 'page',
        
        );
        
        register_post_type( 'meet-our-key-people', $args );
		
		
        
        
        $labels = array(
        
        'name'                  => _x( 'Blogs', 'Post Type General Name', 'aida' ),
        
        'singular_name'         => _x( 'Blogs', 'Post Type Singular Name', 'aida' ),
        
        'menu_name'             => __( 'Blogs', 'aida' ),
        
        'name_admin_bar'        => __( 'Blogs', 'aida' ),
        
        'archives'              => __( 'Item Archives', 'aida' ),
        
        'parent_item_colon'     => __( 'Parent Blog:', 'aida' ),
        
        'all_items'             => __( 'All Blogs', 'aida' ),
        
        //'add_new_item'          => __( 'Add New Solution', 'aida' ),
        
        'add_new'               => __( 'Add Blog', 'aida' ),
        
        'new_item'              => __( 'New Blog', 'aida' ),
        
        'edit_item'             => __( 'Edit Blog', 'aida' ),
        
        'update_item'           => __( 'Update Blog', 'aida' ),
        
        'view_item'             => __( 'View Blog', 'aida' ),
        
        'search_items'          => __( 'Search Blog', 'aida' ),
        
        'not_found'             => __( 'Not found', 'aida' ),
        
        'not_found_in_trash'    => __( 'Not found in Trash', 'aida' ),
        
        'featured_image'        => __( 'Featured Image', 'aida' ),
        
        'set_featured_image'    => __( 'Set featured image', 'aida' ),
        
        'remove_featured_image' => __( 'Remove featured image', 'aida' ),
        
        'use_featured_image'    => __( 'Use as featured image', 'aida' ),
        
        'insert_into_item'      => __( 'Insert into item', 'aida' ),
        
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'aida' ),
        
        'items_list'            => __( 'Items list', 'aida' ),
        
        'items_list_navigation' => __( 'Items list navigation', 'aida' ),
        
        'filter_items_list'     => __( 'Filter items list', 'aida' ),
        
        );
        
        $args = array(
        
        'label'                 => __( 'Blogs', 'aida' ),
        
        'description'           => __( 'Post Type Description', 'aida' ),
        
        'labels'                => $labels,
        
        'supports'              => array( 'title','thumbnail','editor'),
        
        //'taxonomies'            => array( 'category', 'post_tag' ),
        
        'hierarchical'          => true,
        
        'public'                => true,
        
        'show_ui'               => true,
        
        'show_in_menu'          => true,
        
        'menu_position'         => 8,
        
        'menu_icon'             => 'dashicons-welcome-write-blog',
        
        'show_in_admin_bar'     => true,
        
        'show_in_nav_menus'     => true,
        
        'can_export'            => true,
        
        'has_archive'           => true,    
        
        'exclude_from_search'   => false,
        
        'publicly_queryable'    => true,
        
        'capability_type'       => 'page',
        
        );
        
        register_post_type( 'blog', $args );
        
        
         $labels = array(
        'name'               => _x('News', 'post type general name', 'aida'),
        'singular_name'      => _x('News', 'post type singular name', 'aida'),
        'menu_name'          => _x('News', 'admin menu', 'aida'),
        'name_admin_bar'     => _x('News', 'add new on admin bar', 'aida'),
        'add_new'            => _x('Add New', 'discom', 'aida'),
        'add_new_item'       => __('Add New News', 'aida'),
        'new_item'           => __('New News', 'aida'),
        'edit_item'          => __('Edit News', 'aida'),
        'view_item'          => __('View News', 'aida'),
        'all_items'          => __('All News', 'aida'),
        'search_items'       => __('Search News', 'aida'),
        'not_found'          => __('No News found.', 'aida'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'new'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
          'supports'              => array( 'title','thumbnail','editor'),
        'show_in_rest'       => true,
        'taxonomies'         => array('news') // ← Attach your taxonomy
    );

    register_post_type('news', $args);
    
    
     $labels = array(
        'name'               => _x('Newsletter', 'post type general name', 'aida'),
        'singular_name'      => _x('Newsletter', 'post type singular name', 'aida'),
        'menu_name'          => _x('Newsletter', 'admin menu', 'aida'),
        'name_admin_bar'     => _x('Newsletter', 'add new on admin bar', 'aida'),
        'add_new'            => _x('Add Newsletter', 'discom', 'aida'),
        'add_new_item'       => __('Add New Newsletter', 'aida'),
        'new_item'           => __('New Newsletter', 'aida'),
        'edit_item'          => __('Edit Newsletter', 'aida'),
        'view_item'          => __('View Newsletter', 'aida'),
        'all_items'          => __('All Newsletters', 'aida'),
        'search_items'       => __('Search Newsletters', 'aida'),
        'not_found'          => __('No News found.', 'aida'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'newsletter'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
          'supports'              => array( 'title','thumbnail','editor'),
        'show_in_rest'       => true,
        'taxonomies'         => array('newsletter') // ← Attach your taxonomy
    );

    register_post_type('newsletpost', $args);
		
		
		 $labels = array(
        
        'name'                  => _x( 'Committees Members', 'Post Type General Name', 'aida' ),
        
        'singular_name'         => _x( 'Committees Members', 'Post Type Singular Name', 'aida' ),
        
        'menu_name'             => __( 'Committees Members', 'aida' ),
        
        'name_admin_bar'        => __( 'Committees Members', 'aida' ),
        
        'archives'              => __( 'Item Archives', 'aida' ),
        
        'parent_item_colon'     => __( 'Parent Committees Member:', 'aida' ),
        
        'all_items'             => __( 'All Committees Members', 'aida' ),
        
        //'add_new_item'          => __( 'Add New Solution', 'aida' ),
        
        'add_new'               => __( 'Add Committees Member', 'aida' ),
        
        'new_item'              => __( 'New Committees Member', 'aida' ),
        
        'edit_item'             => __( 'Edit Committees Member', 'aida' ),
        
        'update_item'           => __( 'Update Committees Member', 'aida' ),
        
        'view_item'             => __( 'View Committees Member', 'aida' ),
        
        'search_items'          => __( 'Search Committees Member', 'aida' ),
        
        'not_found'             => __( 'Not found', 'aida' ),
        
        'not_found_in_trash'    => __( 'Not found in Trash', 'aida' ),
        
        'featured_image'        => __( 'Featured Image', 'aida' ),
        
        'set_featured_image'    => __( 'Set featured image', 'aida' ),
        
        'remove_featured_image' => __( 'Remove featured image', 'aida' ),
        
        'use_featured_image'    => __( 'Use as featured image', 'aida' ),
        
        'insert_into_item'      => __( 'Insert into item', 'aida' ),
        
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'aida' ),
        
        'items_list'            => __( 'Items list', 'aida' ),
        
        'items_list_navigation' => __( 'Items list navigation', 'aida' ),
        
        'filter_items_list'     => __( 'Filter items list', 'aida' ),
        
        );
        
        $args = array(
        
        'label'                 => __( 'Committees Members', 'aida' ),
        
        'description'           => __( 'Post Type Description', 'aida' ),
        
        'labels'                => $labels,
        
        'supports'              => array( 'title','thumbnail','editor'),
        
        //'taxonomies'            => array( 'category', 'post_tag' ),
        
        'hierarchical'          => true,
        
        'public'                => true,
        
        'show_ui'               => true,
        
        'show_in_menu'          => true,
        
        'menu_position'         => 8,
        
        'menu_icon'             => 'dashicons-welcome-write-blog',
        
        'show_in_admin_bar'     => true,
        
        'show_in_nav_menus'     => true,
        
        'can_export'            => true,
        
        'has_archive'           => true,    
        
        'exclude_from_search'   => false,
        
        'publicly_queryable'    => true,
        
        'capability_type'       => 'page',
        
        );
        
        register_post_type( 'committees-member', $args );


         $labels = array(
        
        'name'                  => _x( 'Resources', 'Post Type General Name', 'aida' ),
        
        'singular_name'         => _x( 'Resources', 'Post Type Singular Name', 'aida' ),
        
        'menu_name'             => __( 'Resources', 'aida' ),
        
        'name_admin_bar'        => __( 'Resources', 'aida' ),
        
        'archives'              => __( 'Item Archives', 'aida' ),
        
        'parent_item_colon'     => __( 'Parent Resources:', 'aida' ),
        
        'all_items'             => __( 'All Resources', 'aida' ),
        
        //'add_new_item'          => __( 'Add New Resources', 'aida' ),
        
        'add_new'               => __( 'Add Resources', 'aida' ),
        
        'new_item'              => __( 'New Resources', 'aida' ),
        
        'edit_item'             => __( 'Edit Resources', 'aida' ),
        
        'update_item'           => __( 'Update Resources', 'aida' ),
        
        'view_item'             => __( 'View Resources', 'aida' ),
        
        'search_items'          => __( 'Search Resources', 'aida' ),
        
        'not_found'             => __( 'Not found', 'aida' ),
        
        'not_found_in_trash'    => __( 'Not found in Trash', 'aida' ),
        
        'featured_image'        => __( 'Featured Image', 'aida' ),
        
        'set_featured_image'    => __( 'Set featured image', 'aida' ),
        
        'remove_featured_image' => __( 'Remove featured image', 'aida' ),
        
        'use_featured_image'    => __( 'Use as featured image', 'aida' ),
        
        'insert_into_item'      => __( 'Insert into item', 'aida' ),
        
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'aida' ),
        
        'items_list'            => __( 'Items list', 'aida' ),
        
        'items_list_navigation' => __( 'Items list navigation', 'aida' ),
        
        'filter_items_list'     => __( 'Filter items list', 'aida' ),
        
        );
        
        $args = array(
        
        'label'                 => __( 'Resources', 'aida' ),
        
        'description'           => __( 'Post Type Description', 'aida' ),
        
        'labels'                => $labels,
        
        'supports'              => array( 'title','thumbnail','editor'),
        
        //'taxonomies'            => array( 'category', 'post_tag' ),
        
        'hierarchical'          => true,
        
        'public'                => true,
        
        'show_ui'               => true,
        
        'show_in_menu'          => true,
        
        'menu_position'         => 8,
        
        'menu_icon'             => 'dashicons-welcome-write-blog',
        
        'show_in_admin_bar'     => true,
        
        'show_in_nav_menus'     => true,
        
        'can_export'            => true,
        
        'has_archive'           => true,    
        
        'exclude_from_search'   => false,
        
        'publicly_queryable'    => true,
        
        'capability_type'       => 'page',
        
        );
        
        register_post_type( 'resources', $args );
  }
        
        add_action('init', 'custom_post_type', 0 );


add_action('init', 'create_committees_taxonomies', 0);

// create two taxonomies, genres and writers for the post type "book"
function create_committees_taxonomies()
{
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name' => _x('Committees Category', 'taxonomy general name', 'aida') ,
        'singular_name' => _x('Committees Category', 'taxonomy singular name', 'aida') ,
        'search_items' => __('Search Committees Category', 'aida') ,
        'all_items' => __('All Committees Category', 'aida') ,
        'parent_item' => __('Parent Committees Category', 'aida') ,
        'parent_item_colon' => __('Parent Committees Category:', 'aida') ,
        'edit_item' => __('Edit Committees Category', 'aida') ,
        'update_item' => __('Update Committees Category', 'aida') ,
        'add_new_item' => __('Add New Committees Category', 'aida') ,
        'new_item_name' => __('New Committees Category Name', 'aida') ,
        'menu_name' => __('Committees Category', 'aida') ,
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'committees'
        ) ,
    );

    register_taxonomy('committees-category', array('committees-member'), $args);


}

add_action('pre_get_posts', function($query) {
    if (!is_admin() && $query->is_main_query() && is_tax('committees-category')) {
        $query->set('post_type', 'committees-member');
    }
});


add_action('init', 'create_resources_taxonomies', 0);

// create two taxonomies, genres and writers for the post type "book"
function create_resources_taxonomies()
{
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name' => _x('Resources Category', 'taxonomy general name', 'aida') ,
        'singular_name' => _x('Resources Category', 'taxonomy singular name', 'aida') ,
        'search_items' => __('Search Resources Category', 'aida') ,
        'all_items' => __('All Resources Category', 'aida') ,
        'parent_item' => __('Parent Resources Category', 'aida') ,
        'parent_item_colon' => __('Parent Resources Category:', 'aida') ,
        'edit_item' => __('Edit Resources Category', 'aida') ,
        'update_item' => __('Update Resources Category', 'aida') ,
        'add_new_item' => __('Add New Resources Category', 'aida') ,
        'new_item_name' => __('New Resources Category Name', 'aida') ,
        'menu_name' => __('Resources Category', 'aida') ,
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'resources-category'
        ) ,
    );

    register_taxonomy('resources-category', array('resources'), $args);


}

add_action('init', 'create_post_taxonomies', 0);

// create two taxonomies, genres and writers for the post type "book"
function create_post_taxonomies()
{
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name' => _x('Blog Category', 'taxonomy general name', 'aida') ,
        'singular_name' => _x('Blog Category', 'taxonomy singular name', 'aida') ,
        'search_items' => __('Search Blog Category', 'aida') ,
        'all_items' => __('All Blog Category', 'aida') ,
        'parent_item' => __('Parent Blog Category', 'aida') ,
        'parent_item_colon' => __('Parent Blog Category:', 'aida') ,
        'edit_item' => __('Edit Blog Category', 'aida') ,
        'update_item' => __('Update Blog Category', 'aida') ,
        'add_new_item' => __('Add New Blog Category', 'aida') ,
        'new_item_name' => __('New Blog Category Name', 'aida') ,
        'menu_name' => __('Blog Category', 'aida') ,
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'blogs'
        ) ,
    );

    register_taxonomy('blog-category', array(
        'post'
    ) , $args);

}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
   add_theme_support( 'woocommerce' );
}   

add_filter( 'wc_add_to_cart_message', 'remove_add_to_cart_message' );

function remove_add_to_cart_message() {
    return;
}

function woocommerce_template_loop_category_title( $category ) {
	?>
	<h4 class="mt-4">
		<?php
		echo esc_html( $category->name );

		if ( $category->count > 0 ) {
		echo apply_filters( 'woocommerce_subcategory_count_html', ' ', $category ); // WPCS: XSS ok.
		}

	?>
</h4>
	<?php
}

function woocommerce_template_loop_product_title() {
    echo wp_kses_post( '<h4 class="mt-4">' . get_the_title() . '</h4>' );
}

add_filter( 'template_include', function( $template ) {

    if ( ! is_singular() )
        return $template; // not single

    if ( 'solution' !== get_post_type() )
        return $template; // wrong post type

    if ( 0 === get_post()->post_parent )
        return $template; // not a child

    return locate_template( 'single-child-solution.php' );
});


function wpb_widgets_init() {
 
	
    }
 
add_action( 'widgets_init', 'wpb_widgets_init' );




function modify_shop_product_image ( $img, $product, $size, $attr, $placeholder ) {
    $alt_tag = 'alt=';
    $pos = stripos( $img, 'alt=' ) + strlen( $alt_tag ) + 1;
    return substr_replace($img, $product->get_name(), $pos, 0);
}

add_action( 'woocommerce_product_get_image', 'modify_shop_product_image', 10, 5 );

add_action( 'widgets_init', 'wpb_widgets_init' );

function mu_hide_plugins_network( $plugins ) {
    if( in_array( 'woo-smart-compare/wpc-smart-compare.php', array_keys( $plugins ) ) ) {
        unset( $plugins['woo-smart-compare/wpc-smart-compare.php'] );
    }
    return $plugins;
}add_filter( 'all_plugins', 'mu_hide_plugins_network' );

function hide_acf_pro_from_plugin_list($plugins) {
  // Replace 'advanced-custom-fields-pro' with the correct plugin folder name if needed
  unset($plugins['advanced-custom-fields-pro/acf.php']);
  return $plugins;
}

add_action('init', 'register_discom_post_type');
function register_discom_post_type() {
    $args = array(
        'public' => true,
        'label'  => 'DISCOMs',
        'menu_icon' => 'dashicons-building',
        'supports' => ['title'],
        'show_in_rest' => true,
    );
    register_post_type('discom', $args);
}

add_action('init', 'register_committee_registration_post_type');
function register_committee_registration_post_type() {
    $args = array(
        'public' => true,
        'label'  => 'Committee Registrations',
        'menu_icon' => 'dashicons-clipboard',
        'supports' => ['title', 'editor'],
        'show_in_menu' => true,
        'show_ui' => true, // ✅ ADD THIS LINE
        'show_in_rest' => true,
    );
    register_post_type('committee-registration', $args);
}

function handle_register_committee_form() {
    $data = [
        'full_name'   => sanitize_text_field($_POST['full_name']),
        'designation' => sanitize_text_field($_POST['designation']),
        'email'       => sanitize_email($_POST['email']),
        'phone'       => sanitize_text_field($_POST['phone']),
        'discom'      => sanitize_text_field($_POST['discom']),
        'committee'   => sanitize_text_field($_POST['committee']),
        'login_id'    => sanitize_text_field($_POST['login_id']),
        'password'    => sanitize_text_field($_POST['password']),
    ];

    // Save to Dashboard as custom post
    $post_title = $data['full_name'] . ' - ' . $data['email'];
    $post_content = "";
    foreach ($data as $key => $value) {
        $post_content .= ucfirst(str_replace('_', ' ', $key)) . ": " . $value . "\n";
    }

    wp_insert_post([
        'post_title'   => $post_title,
        'post_content' => $post_content,
        'post_type'    => 'committee-registration',
        'post_status'  => 'publish'
    ]);

    // Send email
    $to = 'your-email@aida-india.org';
    $subject = 'New Committee Registration';
    $headers = ["Content-Type: text/plain; charset=UTF-8"];
    wp_mail($to, $subject, $post_content, $headers);

    wp_redirect(add_query_arg('success', 1, wp_get_referer()));
    exit;
}
add_action('admin_post_nopriv_register_committee_form', 'handle_register_committee_form');
add_action('admin_post_register_committee_form', 'handle_register_committee_form');


// Handle Custom Registration Form
add_action('init', 'handle_custom_user_registration');
function handle_custom_user_registration() {
    if (isset($_POST['custom_register'])) {
        $full_name  = sanitize_text_field($_POST['full_name']);
        $designation = sanitize_text_field($_POST['designation']);
        $email      = sanitize_email($_POST['email']);
        $phone      = sanitize_text_field($_POST['phone']);
        $discom     = sanitize_text_field($_POST['discom']);
        $committee  = sanitize_text_field($_POST['committee']);

        // Email check
        if (!is_email($email)) {
            echo "<p style='color:red;'>Invalid email address format.</p>";
            return;
        }
        if (email_exists($email)) {
            echo "<p style='color:red;'>Email already exists. Please use a different one.</p>";
            return;
        }

        // Generate login credentials
        $username = sanitize_user(strtolower(current(explode('@', $email))) . rand(1000, 9999));
        $password = wp_generate_password(10, true);

        // Create user
        $user_id = wp_create_user($username, $password, $email);

        if (!is_wp_error($user_id)) {
            // Save custom fields
            update_user_meta($user_id, 'full_name', $full_name);
            update_user_meta($user_id, 'designation', $designation);
            update_user_meta($user_id, 'phone', $phone);
            update_user_meta($user_id, 'discom', $discom);
            update_user_meta($user_id, 'committee', $committee);

            // ✅ Flag to mark user as custom registered
            update_user_meta($user_id, 'custom_registered', 'yes');

            // Send email to admin
            $admin_email = get_option('admin_email');
            $admin_subject = "New User Registration - AIDA";
            $admin_message = "A new user registered:\n\n" .
                "Name: $full_name\nDesignation: $designation\nEmail: $email\nPhone: $phone\nDiscom: $discom\nCommittee: $committee\nUsername: $username\nPassword: $password\n";
            wp_mail($admin_email, $admin_subject, $admin_message);

            // Send email to user
            $user_subject = "Your AIDA Login Details";
            $user_message = "Hello $full_name,\n\nThank you for registering.\nYour login credentials are:\n\nUsername: $username\nPassword: $password\n\nLogin here: " . wp_login_url();
            wp_mail($email, $user_subject, $user_message);

            // Redirect to login page
            wp_redirect('https://aida-india.org/login.html');
            exit;
        } else {
            echo "<p style='color:red;'>Error: " . $user_id->get_error_message() . "</p>";
        }
    }
}


add_action('template_redirect', 'restrict_dashboard_to_custom_registered_users');
function restrict_dashboard_to_custom_registered_users() {
    if (is_page('dashboard')) { // 'dashboard' is the page slug
        if (!is_user_logged_in()) {
            wp_redirect('https://aida-india.org/login.html');
            exit;
        }

        $user_id = get_current_user_id();
        $custom = get_user_meta($user_id, 'custom_registered', true);

        if ($custom !== 'yes') {
            wp_redirect('https://aida-india.org/login.html');
            exit;
        }
    }
}

add_shortcode('custom_registration_form', 'render_custom_form');
function render_custom_form() {
    ob_start();
    ?>
    <form method="post" action="">
    <div class="row g-md-5 g-4">
        <div class="col-md-6">
            <div class="form-group">
                <label>Full Name:</label>
                <input type="text" name="full_name" class="form-control" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Designation:</label>
                <input type="text" name="designation" class="form-control">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Email Address:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Phone Number:</label>
                <input type="tel" name="phone" class="form-control">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Select Your DISCOM:</label>
                <select name="discom" class="form-select">
                    <option value="AIDA 1">AIDA 1</option>
                    <option value="AIDA 2">AIDA 2</option>
                    <option value="AIDA 3">AIDA 3</option>
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Select Your Committee:</label>
                <select name="committee" class="form-select">
                    <option value="Committee 1">Committee 1</option>
                    <option value="Committee 2">Committee 2</option>
                    <option value="Committee 3">Committee 3</option>
                </select>
            </div>
        </div>

        <div class="col-md-12 mt-3">
            <input type="submit" name="custom_register" value="Register" class="btn btn-primary">
        </div>
    </div>
</form>

    <?php
    return ob_get_clean();
}


function register_activity_calendar_cpt() {
    $labels = array(
        'name'                  => _x('Activity Calendar', 'Post Type General Name', 'aida'),
        'singular_name'         => _x('Activity Item', 'Post Type Singular Name', 'aida'),
        'menu_name'             => __('Activity Calendar', 'aida'),
        'name_admin_bar'        => __('Activity Calendar', 'aida'),
        'add_new_item'          => __('Add New Activity', 'aida'),
        'edit_item'             => __('Edit Activity', 'aida'),
        'new_item'              => __('New Activity', 'aida'),
        'view_item'             => __('View Activity', 'aida'),
        'all_items'             => __('All Activities', 'aida'),
        'search_items'          => __('Search Activities', 'aida'),
    );

    $args = array(
        'label'                 => __('Activity Calendar', 'aida'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'public'                => true,
        'has_archive'           => true,
        'rewrite'               => array('slug' => 'activity-calendar'),
        'show_in_rest'          => true, // for Gutenberg or REST API
        'menu_icon'             => 'dashicons-calendar',
    );

    register_post_type('activitycalendar', $args);
}
add_action('init', 'register_activity_calendar_cpt');


function register_news_taxonomy() {
    $labels = array(
        'name'              => _x('News Categories', 'taxonomy general name', 'aida'),
        'singular_name'     => _x('News Category', 'taxonomy singular name', 'aida'),
        'search_items'      => __('Search News Categories', 'aida'),
        'all_items'         => __('All News Categories', 'aida'),
        'parent_item'       => __('Parent News Category', 'aida'),
        'parent_item_colon' => __('Parent News Category:', 'aida'),
        'edit_item'         => __('Edit News Category', 'aida'),
        'update_item'       => __('Update News Category', 'aida'),
        'add_new_item'      => __('Add New News Category', 'aida'),
        'new_item_name'     => __('New News Category Name', 'aida'),
        'menu_name'         => __('News Categories', 'aida'),
    );

    $args = array(
        'hierarchical'      => true, // Set to false for a tag-like taxonomy
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'news-category'),
        'show_in_rest'      => true,
    );

    register_taxonomy('news_category', array('news'), $args);
}
add_action('init', 'register_news_taxonomy');


// Register Event CPT
// Register Organizational CPT
function register_organizational_cpt() {
    $labels = array(
        'name'               => __( 'Organizational Structure', 'aida' ),
        'singular_name'      => __( 'Organizational Structure', 'aida' ),
        'menu_name'          => __( 'Organizational Structure', 'aida' ),
        'add_new'            => __( 'Add New', 'aida' ),
        'add_new_item'       => __( 'Add New Organizational Structure', 'aida' ),
        'edit_item'          => __( 'Edit Organizational Structure', 'aida' ),
        'new_item'           => __( 'New Organizational Structure', 'aida' ),
        'all_items'          => __( 'All Organizational Structures', 'aida' ),
        'view_item'          => __( 'View Organizational Structure', 'aida' ),
        'search_items'       => __( 'Search Organizational Structures', 'aida' ),
        'not_found'          => __( 'No Organizational Structures found', 'aida' ),
        'not_found_in_trash' => __( 'No Organizational Structures found in Trash', 'aida' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array( 'slug' => 'organizational' ),
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'menu_icon'          => 'dashicons-groups',
        'show_in_rest'       => true, // Gutenberg + REST API support
        'taxonomies'         => array( 'organizational_category' ),
    );

    register_post_type( 'organizational', $args );
}
add_action( 'init', 'register_organizational_cpt' );


// Register Organizational Categories
function register_organizational_categories() {
    $labels = array(
        'name'              => __( 'Organizational Categories', 'aida' ),
        'singular_name'     => __( 'Organizational Category', 'aida' ),
        'search_items'      => __( 'Search Organizational Categories', 'aida' ),
        'all_items'         => __( 'All Organizational Categories', 'aida' ),
        'parent_item'       => __( 'Parent Organizational Category', 'aida' ),
        'edit_item'         => __( 'Edit Organizational Category', 'aida' ),
        'update_item'       => __( 'Update Organizational Category', 'aida' ),
        'add_new_item'      => __( 'Add New Organizational Category', 'aida' ),
        'new_item_name'     => __( 'New Organizational Category', 'aida' ),
        'menu_name'         => __( 'Categories', 'aida' ),
    );

    register_taxonomy( 'organizational_category', array( 'organizational' ), array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'rewrite'           => array( 'slug' => 'organizational-category' ),
        'show_in_rest'      => true,
    ));
}
add_action( 'init', 'register_organizational_categories' );



function register_event_cpt() {
    $labels = array(
        'name'               => __( 'Events', 'aida' ),
        'singular_name'      => __( 'Event', 'aida' ),
        'menu_name'          => __( 'Events', 'aida' ),
        'add_new'            => __( 'Add New Event', 'aida' ),
        'add_new_item'       => __( 'Add New Event', 'aida' ),
        'edit_item'          => __( 'Edit Event', 'aida' ),
        'new_item'           => __( 'New Event', 'aida' ),
        'all_items'          => __( 'All Events', 'aida' ),
        'view_item'          => __( 'View Event', 'aida' ),
        'search_items'       => __( 'Search Events', 'aida' ),
        'not_found'          => __( 'No events found', 'aida' ),
        'not_found_in_trash' => __( 'No events found in Trash', 'aida' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array( 'slug' => 'events' ),
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'menu_icon'          => 'dashicons-calendar-alt',
        'show_in_rest'       => true, // Gutenberg support
        'taxonomies'         => array( 'event_category' ), // link taxonomy
    );

    register_post_type( 'event', $args );
}
add_action( 'init', 'register_event_cpt' );

function register_speaker_cpt() {
    $labels = array(
        'name'               => __( 'Speakers', 'aida' ),
        'singular_name'      => __( 'Speaker', 'aida' ),
        'menu_name'          => __( 'Speakers', 'aida' ),
        'add_new'            => __( 'Add New Speaker', 'aida' ),
        'add_new_item'       => __( 'Add New Speaker', 'aida' ),
        'edit_item'          => __( 'Edit Speaker', 'aida' ),
        'new_item'           => __( 'New Speaker', 'aida' ),
        'all_items'          => __( 'All Speakers', 'aida' ),
        'view_item'          => __( 'View Speaker', 'aida' ),
        'search_items'       => __( 'Search Speakers', 'aida' ),
        'not_found'          => __( 'No events found', 'aida' ),
        'not_found_in_trash' => __( 'No events found in Trash', 'aida' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array( 'slug' => 'speaker' ),
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'menu_icon'          => 'dashicons-calendar-alt',
        'show_in_rest'       => true, // Gutenberg support
        ///'taxonomies'         => array( 'event_category' ), 
    );

    register_post_type( 'speaker', $args );
}
add_action( 'init', 'register_speaker_cpt' );



// Register Event Categories
function register_event_categories() {
    $labels = array(
        'name'              => __( 'Event Categories', 'aida' ),
        'singular_name'     => __( 'Event Category', 'aida' ),
        'search_items'      => __( 'Search Event Categories', 'aida' ),
        'all_items'         => __( 'All Event Categories', 'aida' ),
        'parent_item'       => __( 'Parent Event Category', 'aida' ),
        'edit_item'         => __( 'Edit Event Category', 'aida' ),
        'update_item'       => __( 'Update Event Category', 'aida' ),
        'add_new_item'      => __( 'Add New Event Category', 'aida' ),
        'new_item_name'     => __( 'New Event Category', 'aida' ),
        'menu_name'         => __( 'Categories', 'aida' ),
    );

    register_taxonomy( 'event_category', array( 'event' ), array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'rewrite'           => array( 'slug' => 'event-category' ),
        'show_in_rest'      => true,
    ));
}
add_action( 'init', 'register_event_categories' );



add_filter('cmm_discom_options', function($opts){
    return [
        'AIDA' => 'All India Discoms Association (AIDA)',
        'BRPL' => 'BSES Rajdhani Power Limited',
        'BYPL' => 'BSES Yamuna Power Limited',
        'TPDDL'=> 'Tata Power Delhi Distribution Limited',
        // add as needed...
    ];
});

function custom_login_links_update() {
    // Remove default login/register links using CSS
    echo '<style>.login #nav { display: none; }</style>';

    // Add custom links
    echo '<div style="text-align:center; margin-top: 10px;">
            <a href="' . esc_url(site_url('/login')) . '">Log in</a> |
            <a href="https://aida-india.org/committee-registration">Register</a>
         </div>';
}
add_action('login_footer', 'custom_login_links_update');

function custom_login_logo() {
    ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url('https://aida-india.org/wp-content/themes/AIDA/images/Aida-logo.svg'); /* Update path */
            background-size: contain;
            width: 100%;
            height: 80px;
        }
    </style>
    <?php
}
add_action('login_enqueue_scripts', 'custom_login_logo');

function custom_login_logo_url() {
    return home_url(); // Clicking the logo goes to your homepage
}
add_filter('login_headerurl', 'custom_login_logo_url');

function custom_login_logo_url_title() {
    return 'AIDA - All India Discoms Association';
}
add_filter('login_headertext', 'custom_login_logo_url_title');


add_action('admin_menu', function() {
    remove_menu_page('edit.php?post_type=acf-field-group');
}, 99);

function create_subscribers_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . "subscribers";

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        email varchar(255) NOT NULL UNIQUE,
        subscribed_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
add_action('after_setup_theme', 'create_subscribers_table');

// Shortcode to display subscribe form
function my_subscribe_form() {
    ob_start(); ?>
    
    <form id="subscribeForm">
        <div class="input-group">
            <input type="email" name="subscriber_email" class="form-control form-control-sm"
                placeholder="Enter your email address" required>
            <button type="submit" class="btn btn-sm btn-primary">Subscribe</button>
        </div>
        <div id="subscribeMessage" style="margin-top:10px;"></div>
    </form>

    <script type="text/javascript">
jQuery(document).ready(function($){
    $('#subscribeForm').on('submit', function(e){
        e.preventDefault();

        var email = $('input[name="subscriber_email"]').val();
        $('#subscribeMessage').html("<div style='color:blue;'>⏳ Processing...</div>");

        $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'POST',
            dataType: 'json', // 🔑 this makes response JSON
            data: {
                action: 'handle_subscription_form',
                subscriber_email: email
            },
            success: function(response){
                if (response.success) {
                    $('#subscribeMessage').html("<div style='color:green;'>" + response.data + "</div>");
                } else {
                    $('#subscribeMessage').html("<div style='color:red;'>" + response.data + "</div>");
                }
            },
            error: function() {
                $('#subscribeMessage').html("<div style='color:red;'>❌ Something went wrong. Try again.</div>");
            }
        });
    });
});
</script>

    
    <?php
    return ob_get_clean();
}
add_shortcode('subscribe_form', 'my_subscribe_form');

function handle_subscription_form_ajax() {
    $email = sanitize_email($_POST['subscriber_email']);

    if (!is_email($email)) {
        wp_send_json_error("Invalid email address!");
    }

    if (email_exists($email)) {
        wp_send_json_error("⚠️ You are already subscribed!");
    } else {
        // Create WP user as Subscriber
        $username = sanitize_user(current(explode('@', $email)));
        $random_password = wp_generate_password(12, false);
        $user_id = wp_create_user($username, $random_password, $email);

        if (!is_wp_error($user_id)) {
            wp_update_user([
                'ID' => $user_id,
                'role' => 'subscriber'
            ]);

            // Notify admin
            $admin_email = get_option('admin_email');
            $subject = "New WP Subscriber";
            $message = "A new subscriber registered: $email";
            wp_mail($admin_email, $subject, $message);

            wp_send_json_success("✅ Thanks for subscribing!");
        } else {
            wp_send_json_error("❌ Could not create subscriber.");
        }
    }
}
add_action('wp_ajax_handle_subscription_form', 'handle_subscription_form_ajax');
add_action('wp_ajax_nopriv_handle_subscription_form', 'handle_subscription_form_ajax');



function register_streamer_cpt() {
	
	   $labels = array(
        'name'               => 'Supporting Organizations',
        'singular_name'      => 'Supporting Organization',
        'menu_name'          => 'Supporting Organizations',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Supporting Organization',
        'edit_item'          => 'Edit Supporting Organization',
        'new_item'           => 'New Supporting Organization',
        'view_item'          => 'View Supporting Organization',
        'search_items'       => 'Search Supporting Organizations',
        'not_found'          => 'No Supporting Organizations found',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array('title','thumbnail'),
        'rewrite'            => array('slug' => 'supporting-organizations'),
        'show_in_rest'       => true,
    );

    register_post_type('supporting_organizations', $args);
	
    $labels = array(
        'name'               => __( 'Streamers', 'aida' ),
        'singular_name'      => __( 'Streamer', 'aida' ),
        'menu_name'          => __( 'Streamers', 'aida' ),
        'add_new'            => __( 'Add New Streamer', 'aida' ),
        'add_new_item'       => __( 'Add New Streamer', 'aida' ),
        'edit_item'          => __( 'Edit Streamer', 'aida' ),
        'new_item'           => __( 'New Streamer', 'aida' ),
        'all_items'          => __( 'All Streamers', 'aida' ),
        'view_item'          => __( 'View Streamer', 'aida' ),
        'search_items'       => __( 'Search Streamers', 'aida' ),
        'not_found'          => __( 'No events found', 'aida' ),
        'not_found_in_trash' => __( 'No events found in Trash', 'aida' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array( 'slug' => 'streamer' ),
        'supports'           => array( 'title', 'editor'),
        'menu_icon'          => 'dashicons-welcome-write-blog',
        'show_in_rest'       => true, // Gutenberg support
        'taxonomies'         => array( 'streamer_category' ), // link taxonomy
    );

    register_post_type( 'streamer', $args );
}
add_action( 'init', 'register_streamer_cpt' );


// Step 1: Logged-in user के लिए hook
add_action('admin_post_create_folder', 'handle_create_folder');

// Step 2: अगर guest भी folder बना सकते हैं तो ये भी add करो
add_action('admin_post_nopriv_create_folder', 'handle_create_folder');

function handle_create_folder() {
    // Folder name ले लो
    if (isset($_POST['folder_name'])) {
        $folder_name = sanitize_text_field($_POST['folder_name']);
        
        // Example: wp-content/uploads/folders में create करो
        $upload_dir = wp_upload_dir();
        $base_dir = $upload_dir['basedir'] . '/folders/';

        if (!file_exists($base_dir)) {
            wp_mkdir_p($base_dir);
        }

        $new_folder = $base_dir . $folder_name;

        if (!file_exists($new_folder)) {
            wp_mkdir_p($new_folder);
            wp_redirect(admin_url('admin.php?page=folder-manager&msg=success'));
        } else {
            wp_redirect(admin_url('admin.php?page=folder-manager&msg=exists'));
        }
        exit;
    }
}

// Prevent duplicate email subscriptions in Contact Form 7 (Flamingo check)
add_filter( 'wpcf7_validate_email*', 'cf7_unique_email_validation_filter', 20, 2 );
add_filter( 'wpcf7_validate_email', 'cf7_unique_email_validation_filter', 20, 2 );

function cf7_unique_email_validation_filter( $result, $tag ) {
    $tag = new WPCF7_FormTag( $tag );

    // check for your email field
    if ( 'email-id' == $tag->name ) {
        $email = isset($_POST[$tag->name]) ? sanitize_email($_POST[$tag->name]) : '';

        if ( ! empty( $email ) ) {
            global $wpdb;

            // Flamingo saves data in wp_posts (Inbound Messages)
            $exists = $wpdb->get_var( $wpdb->prepare(
                "SELECT COUNT(*) FROM {$wpdb->posts} p
                 INNER JOIN {$wpdb->postmeta} pm ON p.ID = pm.post_id
                 WHERE p.post_type = 'flamingo_inbound'
                 AND pm.meta_key = '_field_email-id'
                 AND pm.meta_value = %s",
                $email
            ));

            if ( $exists > 0 ) {
                $result->invalidate( $tag, "This email is already subscribed." );
            }
        }
    }

    return $result;
}


function members_custom_category() {

    $labels = array(
        'name'              => 'Member Categories',
        'singular_name'     => 'Member Category',
        'search_items'      => 'Search Member Categories',
        'all_items'         => 'All Member Categories',
        'edit_item'         => 'Edit Member Category',
        'update_item'       => 'Update Member Category',
        'add_new_item'      => 'Add New Member Category',
        'new_item_name'     => 'New Member Category',
        'menu_name'         => 'Member Categories',
    );

    $args = array(
        'hierarchical'      => true, // Works like categories
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'member-category'),
    );

    register_taxonomy('member_category', array('members'), $args);
}
add_action('init', 'members_custom_category');


add_filter('pre_get_document_title', function ($title) {

    if (is_tax('committees-category')) {
        $term = get_queried_object();

        if ($term && isset($term->term_id)) {
            $meta_title = get_field('meta_title', 'term_' . $term->term_id);

            if (!empty($meta_title)) {
                return $meta_title;
            }
        }
    }

    return $title;
});


add_action('wp_head', function () {

    if (is_tax('committees-category')) {
        $term = get_queried_object();

        if ($term && isset($term->term_id)) {
            $meta_description = get_field('meta_description', 'term_' . $term->term_id);

            if (!empty($meta_description)) {
                echo '<meta name="description" content="' . esc_attr($meta_description) . '">' . "\n";
            }
        }
    }
}, 1);



/**
 * Add Display Order field (Add term)
 */
add_action('resources-category_add_form_fields', function () {
    ?>
    <div class="form-field">
        <label for="category_order">Display Order</label>
        <input type="number" name="category_order" id="category_order" value="0">
        <p class="description">Lower number = shows first</p>
    </div>
    <?php
});

/**
 * Edit term field
 */
add_action('resources-category_edit_form_fields', function ($term) {
    $order = get_term_meta($term->term_id, 'category_order', true);
    ?>
    <tr class="form-field">
        <th scope="row">
            <label for="category_order">Display Order</label>
        </th>
        <td>
            <input type="number" name="category_order" id="category_order"
                   value="<?php echo esc_attr($order !== '' ? $order : 0); ?>">
            <p class="description">Lower number = shows first</p>
        </td>
    </tr>
    <?php
});

/**
 * Save term meta
 */
add_action('created_resources-category', 'save_resources_category_order');
add_action('edited_resources-category', 'save_resources_category_order');

function save_resources_category_order($term_id) {
    if (isset($_POST['category_order'])) {
        update_term_meta($term_id, 'category_order', intval($_POST['category_order']));
    }
}


// REALTIME ACTIVE VISITOR COUNTER

function custom_realtime_visitors_script() {
    ?>
    <script>
    jQuery(document).ready(function($){

        function updateVisitors() {
            $.ajax({
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                type: "POST",
                data: { action: "update_active_visitors" },
                success: function(response) {
                    $("#live-visitor-count").text(response);
                },
                error: function() {
                    console.log("AJAX Error");
                }
            });
        }

        updateVisitors();
        setInterval(updateVisitors, 10000);

    });
    </script>
    <?php
}
add_action('wp_footer', 'custom_realtime_visitors_script');


// AJAX HANDLER
function update_active_visitors() {

    if (is_admin()) {
        wp_die();
    }

    $ip = $_SERVER['REMOTE_ADDR'];

    $visitors = get_transient('active_visitors');

    if (!$visitors) {
        $visitors = array();
    }

    $visitors[$ip] = time();

    foreach ($visitors as $user_ip => $timestamp) {
        if (time() - $timestamp > 60) {
            unset($visitors[$user_ip]);
        }
    }

    set_transient('active_visitors', $visitors, 120);

    echo count($visitors);
    wp_die();
}

add_action('wp_ajax_nopriv_update_active_visitors', 'update_active_visitors');
add_action('wp_ajax_update_active_visitors', 'update_active_visitors');

function aida_inaugraul_session_popup() {

    // Load only on this exact URL path
    if ( trim($_SERVER['REQUEST_URI'], '/') !== 'resources-category/inaugraul-session' ) {
        return;
    }
    ?>
    
    <!-- Popup Modal -->
    <div class="modal fade" id="imagePopup" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 bg-transparent">
                <div class="modal-body text-center p-0 position-relative">
                    <button type="button" class="btn-close position-absolute top-0 end-0 m-3 bg-white"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                    <img id="popupImage" src="" class="img-fluid rounded" alt="Popup Image">
                </div>
            </div>
        </div>
    </div>

    <style>
        .gallery-thumb{
            cursor:pointer;
            transition:0.3s ease;
        }
        .gallery-thumb:hover{
            transform:scale(1.03);
        }
        #imagePopup .modal-dialog{
            max-width:900px;
        }
    </style>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const thumbs = document.querySelectorAll(".gallery-thumb");
        const popupImage = document.getElementById("popupImage");
        const modalEl = document.getElementById("imagePopup");

        if (!thumbs.length || !modalEl) return;

        const imageModal = new bootstrap.Modal(modalEl);

        thumbs.forEach(function(img){
            img.addEventListener("click", function(){
                popupImage.src = this.src;
                popupImage.alt = this.alt;
                imageModal.show();
            });
        });
    });
    </script>

    <?php
}
add_action('wp_footer', 'aida_inaugraul_session_popup');

function cms_user_community_column($columns) {
    $columns['cms_community'] = 'Communities';
    return $columns;
}
add_filter('manage_users_columns', 'cms_user_community_column');

function cms_user_community_column_content($value, $column_name, $user_id) {
    if ($column_name == 'cms_community') {
        $communities = get_user_meta($user_id, 'cms_community', true);

        if (is_array($communities) && !empty($communities)) {
            return implode(', ', $communities);
        }

        return '-';
    }

    return $value;
}
add_action('manage_users_custom_column', 'cms_user_community_column_content', 10, 3);

/* -----------------------------
   Admin: Edit User Communities (Checkboxes)
------------------------------ */
function cms_edit_user_communities_field($user) {
    if (!current_user_can('administrator')) {
        return;
    }

    $saved_communities = get_user_meta($user->ID, 'cms_community', true);

    if (!is_array($saved_communities)) {
        $saved_communities = array();
    }

    $all_communities = array(
        'Capacity Building',
        'Commercial Aspects of Discom Functioning',
        'Planning and Procurement of Bulk Power/ Capacity',
        'Policy Related Matters',
        'Regulatory Matters',
        'Smart Grid Technologies',
        'Specifications and Procurement Practices'
    );
    ?>

    <h3>Assigned Communities</h3>
    <table class="form-table">
        <tr>
            <th>committees</th>
            <td>
                <?php foreach ($all_communities as $community): ?>
                    <label style="display:block; margin-bottom:8px;">
                        <input 
                            type="checkbox" 
                            name="cms_community[]" 
                            value="<?php echo esc_attr($community); ?>"
                            <?php checked(in_array($community, $saved_communities)); ?>
                        >
                        <?php echo esc_html($community); ?>
                    </label>
                <?php endforeach; ?>
            </td>
        </tr>
    </table>

    <?php
}
add_action('show_user_profile', 'cms_edit_user_communities_field');
add_action('edit_user_profile', 'cms_edit_user_communities_field');


/* -----------------------------
   Save Updated Communities
------------------------------ */
function cms_save_user_communities_field($user_id) {
    if (!current_user_can('edit_user', $user_id)) {
        return false;
    }

    $communities = isset($_POST['cms_community'])
        ? array_map('sanitize_text_field', $_POST['cms_community'])
        : array();

    update_user_meta($user_id, 'cms_community', $communities);
}
add_action('personal_options_update', 'cms_save_user_communities_field');
add_action('edit_user_profile_update', 'cms_save_user_communities_field');