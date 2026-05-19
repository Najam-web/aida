<?php
 /**
  * A unique identifier is defined to store the options in the database and reference them from the theme.
  * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
  * If the identifier changes, it'll appear as if the options have been reset.
  */
 function optionsframework_option_name() {
     // This gets the theme name from the stylesheet
     $themename = wp_get_theme();
     $themename = preg_replace("/\W/", "_", strtolower($themename));
     $optionsframework_settings = get_option('optionsframework');
     $optionsframework_settings['id'] = $themename;
     update_option('optionsframework', $optionsframework_settings);
 }
 /**
  * Defines an array of options that will be used to generate the settings page and be saved in the database.
  * When creating the 'id' fields, make sure to use all lowercase and no spaces.
  *
  * If you are making your theme translatable, you should replace 'options_framework_theme'
  * with the actual text domain for your theme.  Read more:
  * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
  */
 function optionsframework_options() {
     // Background Defaults
     $background_color = '#fff';
     $background_defaults = array(
	 'color' => '#f9f6f1',
	 'image' => get_stylesheet_directory_uri() . '/images/body-bg.jpg',
	 'repeat' => 'repeat',
	 'position' => 'left top',
	 'attachment' => 'scroll'
     );
     // Pull all the categories into an array
     $options_categories = array();
     $options_categories_obj = get_categories();
     foreach ($options_categories_obj as $category) {
	 $options_categories[$category->cat_ID] = $category->cat_name;
     }
     // Pull all the posts into an array

     $options_posts = array();

     $options_posts_obj = get_posts();

     $options_posts[''] = 'Select a post:';

     foreach ($options_posts_obj as $post) {

	 $options_posts[$post->ID] = $post->post_title;

     }

      $options = array();
      $options[] = array(

	 'name' => __('Top Header', 'options_framework_theme'),

	 'type' => 'heading');

      $options[] = array(

	 'name' => __('Top Logo 1', 'options_framework_theme'),

	 'desc' => __('Upload an image to be displayed as Left Logo', 'options_framework_theme'),

	 'id' => 'uploader_left',

	 'type' => 'upload'); 
	 
      $options[] = array(

	 'name' => __('Favicon', 'options_framework_theme'),

	 'desc' => __('Upload an image to be displayed as Favicon', 'options_framework_theme'),

	 'id' => 'uploader_favicon',

	 'type' => 'upload');  
	 
	  $options[] = array(

	 'name' => __('Footer Section', 'options_framework_theme'),

	 'type' => 'heading');
	 
	 $options[] = array(

	 'name' => __('Footer Logo', 'options_framework_theme'),

	 'desc' => __('Upload an image to be displayed as Footer Logo', 'options_framework_theme'),

	 'id' => 'uploader_footer',

	 'type' => 'upload'); 
	 
	  $options[] = array(

	 'name' => __('Footer 1', 'options_framework_theme'),

	 'desc' => __('Footer 1 to be displayed on footer', 'options_framework_theme'),

	 'id' => 'footer_1',

	 'type' => 'text');
	 
	 $options[] = array(

	 'name' => __('Footer 2', 'options_framework_theme'),

	 'desc' => __('Footer 2 to be displayed on footer', 'options_framework_theme'),

	 'id' => 'footer_2',

	 'type' => 'text');
	 
	 
	 
	  $options[] = array(

	 'name' => __('Copyright', 'options_framework_theme'),

	 'desc' => __('Bottom Copyright to be displayed on footer', 'options_framework_theme'),

	 'id' => 'copyright_foo',

	 'type' => 'text');


     $options[] = array(

	 'name' => __('Social Icon', 'options_framework_theme'),

	 'type' => 'heading');
     

	 $options[] = array(

	 'name' => __('LinkedIn', 'options_framework_theme'),

	 'desc' => __('Url to be displayed on Header Social', 'options_framework_theme'),

	 'id' => 'lin_id',

	 'type' => 'text');


	 $options[] = array(

	 'name' => __('Facebook', 'options_framework_theme'),

	 'desc' => __('Url to be displayed on Header Social', 'options_framework_theme'),

	 'id' => 'face_id',

	 'type' => 'text');

	 $options[] = array(

	 'name' => __('Twitter', 'options_framework_theme'),

	 'desc' => __('Url to be displayed on Header Social', 'options_framework_theme'),

	 'id' => 'twi_id',

	 'type' => 'text');
	 
	 $options[] = array(

	 'name' => __('YouTube', 'options_framework_theme'),

	 'desc' => __('Url to be displayed on Header Social', 'options_framework_theme'),

	 'id' => 'utube_id',

	 'type' => 'text');
	 
	 
     return $options;

 }