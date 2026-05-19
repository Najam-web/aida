<?php
/**
 * Template Name: Annual Activity Calendar Archive
 */
get_header(); ?>
<?php
    $banner_image = get_field('banner_image');
?>
<section class="inner_banner" style="background-image: url('<?php echo esc_url($banner_image ? $banner_image : get_template_directory_uri() . '/images/media/resources-banner.webp'); ?>');">
    <div class="container-fluid">
        <div class="banner-text">
            <div class="row">
                <div class="col-md-6">
                    <h1><?php single_post_title(); ?></h1>
                    <?php if (get_field('banner_text')): ?>
                        <p><?php the_field('banner_text'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="about_sec">
    <div class="row">
        <div class="col-md-3">
            <div class="sidebar-left">
                <ul class="group_option">
                    <li>
                        <a href="/resource">Resources <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon"></a>
                        <ul>
                            <li><a href="<?php echo site_url(); ?>
/resources-category/committee-recommendations/">Committee Recommendations <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt=""></a></li>
                            <li><a href="<?php echo site_url(); ?>
/annual-activity-calendar" class="active">Annual Activity Calander <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt=""></a></li>
                            <li><a href="#">Others <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt=""></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-md-9">
            <div class="bit-cram">
                <ul>
                    <li><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/about/home.svg" alt="home"></a></li>
                    <li><a href="/resource">Resources</a></li>
                    <li><?php single_post_title(); ?></li>
                </ul>
            </div>

            <div class="container-fluid sec-padd">
                <div class="row g-md-5 g-4">
                    <div class="commi_div">
                        <div class="comm_img" style="background: #F7A209;">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/resources/cal.svg" alt="Policy Icon">
                        </div>
                        <div>
                            <?php
$title = single_post_title('', false); // Get title without echoing
$words = explode(' ', $title);
$first_line = implode(' ', array_slice($words, 0, 2));
$second_line = implode(' ', array_slice($words, 2));

echo '<h5>' . esc_html($first_line) . '</h5>';
if (!empty($second_line)) {
    echo '<h5>' . esc_html($second_line) . '</h5>';
}
?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <p><?php the_field('calander_banner_text'); ?></p>
                    </div>
                </div>
                <div class="sec-padd-t">
                    <div class="row">
                           <div class="col-md-4">
							    <?php 
$image = get_field('calander_image_img');
if( !empty( $image ) ): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                    <?php endif; ?>
                                
                            </div>
                       <div class="col-md-8">
                                <div class="row g-4">
                                  <?php
$args = array(
    'post_type' => 'activitycalendar',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC'
);

$query = new WP_Query($args);

if ( $query->have_posts() ) :
    while ( $query->have_posts() ) : $query->the_post();

  
?>
    <div class="col-md-12">
        <div class="card_calender">
            <div class="date-box">
                <div>
                  <?php
$date = get_field('data'); // e.g., returns "2025-08-06"

if ($date) {
    $formatted_month = date('F', strtotime($date)); // Full month name
    $formatted_day = date('d', strtotime($date));   // Day with leading zero

    echo '<h4>' . esc_html($formatted_month) . '</h4>';
    echo '<h4>' . esc_html($formatted_day) . '</h4>';
}
?>

                </div>
            </div>
            <div class="content">
               <?php the_field('contant'); ?>
            </div>
        </div>
    </div>
<?php
    endwhile;
    wp_reset_postdata();
endif;
?>

                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
