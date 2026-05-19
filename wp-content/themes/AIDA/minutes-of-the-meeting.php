<?php
   /**
   * Template Name: Minutes
   */
   ?>
    <?php get_header(); ?>
    
     <section class="about_sec">
        <div class="row">
            <div class="col-md-3">
                <div class="sidebar-left">
                    <ul class="group_option">
                        <li>
                            
                            <ul>
                                <li>
                                    <ul>
                                        <li>
                                            <a href="<?php echo esc_url(site_url('/'))?>notifications/" >Notifications <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="tab4"></a>
                                        </li>
                                        
                                        <li>
                                            <a href="<?php echo esc_url(site_url('/'))?>meetings/" > Upcoming meeting <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="tab4"></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo esc_url(site_url('/'))?>minutes-of-the-meetings/"class="active" >Minutes of the meetings <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="tab4"></a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="bit-cram flex_f justify-content-between">
         <?php
$user_id = get_current_user_id();
$community = get_user_meta($user_id, 'cms_community', true);
?>

<ul class="breadcrumb">
    <li>
        <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/images/about/home.svg" alt="home">
        </a>
    </li>

    <?php 
    if (!empty($community)) {

        if (is_array($community)) {
            echo '<li>' . esc_html(implode(' / ', $community)) . '</li>';
        } else {
            echo '<li>' . esc_html($community) . '</li>';
        }

    }
    ?>
</ul>

                    <ul>
                        <li> <?php
                        if ( is_user_logged_in() ) {
                            $current_user = wp_get_current_user();
                            echo 'Welcome, ' . esc_html( $current_user->display_name ) . ' 👋';
                        }
                        ?></li>
                    </ul>
                </div>
                <div class="container-fluid sec-padd">
                    <div class="col-md-12">
                        <h2 class="heading-c after-border mb-5 aos-init" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="2000">Minutes of the meetings</h2>
                    </div>
                    <div class="row pb-4  g-4">
                        <div class="col-md-12">
                            <?php echo do_shortcode('[cms_minutes]'); ?>
                        </div>
                    </div>
                  

                </div>
            </div>
        </div>

    </section>

    <?php get_footer(); ?>