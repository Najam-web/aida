<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="<?php echo of_get_option('uploader_favicon'); ?>" sizes="32x32" />
<link rel="icon" href="<?php echo of_get_option('uploader_favicon'); ?>" sizes="192x192" />
<link rel="apple-touch-icon" href="<?php echo of_get_option('uploader_favicon'); ?>" />
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
    	<?php wp_head(); ?>
	
	<!-- Google tag (gtag.js) -->

<script async src="https://www.googletagmanager.com/gtag/js?id=G-MH57CMBC8P"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-MH57CMBC8P'); </script>
</head>

 <body <?php body_class(); ?>>

    <header class="web_header">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a <?php if(is_front_page() || is_home()){?> href="<?php the_permalink(); ?>" <?php }else{?>  href="<?php echo esc_url(site_url('/'))?>"<?php }?> class="navbar-brand"><img src="<?php echo of_get_option('uploader_left'); ?>" alt="aida logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary-menu',
                'container' => false,
                'menu_class' => 'navbar-nav ms-auto',
                'fallback_cb' => '__return_false',
                'depth' => 2,
                'walker' => new Bootstrap_5_WP_Navwalker(),
            ));
            ?>
        </div>
            </div>
        </nav>
    </header>
    <?php if (!is_front_page()) {
    get_template_part('banner-inner');
} ?>
