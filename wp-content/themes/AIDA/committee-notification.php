<?php
   /**
   * Template Name: Committee Notification
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
                                            <a href="<?php echo esc_url(site_url('/'))?>notifications/" class="active">Notifications <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="tab4"></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo esc_url(site_url('/'))?>meetings/"> Upcoming meeting <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="tab4"></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo esc_url(site_url('/'))?>minutes-of-the-meetings/">Minutes of the meetings <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="tab4"></a>
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
                            echo 'Welcome, ' . esc_html( $current_user->display_name ) . ' 👋‘‹';
                        }
                        ?></li>
                    </ul>
                </div>
                <div class="container-fluid sec-padd">
                    <div class="col-md-12">
                        <h2 class="heading-c after-border mb-5 aos-init" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="2000">Notifications</h2>
                    </div>
                    <div class="row pb-4  g-4">
                        <div class="col-md-12">
                          <?php echo do_shortcode('[cms_notifications]'); ?>
                        </div>
                    </div>
                    <?php
$term = get_term_by( 'name', $community, 'community' ); // 'community' is your taxonomy
if ( $term && isset( $term->term_id ) ) {
    // ACF fields for this taxonomy term
    $meeting_category_content = get_field('meeting_category_content', 'community_' . $term->term_id);
    $download_content = get_field('download_content', 'community_' . $term->term_id);
    $download_link = get_field('download_link', 'community_' . $term->term_id);
    ?>
    
    <div class="row g-md-5 g-4">
        <?php if ( $meeting_category_content ): ?>
            <p><?php echo esc_html( $meeting_category_content ); ?></p>
        <?php endif; ?>

        <?php if ( $download_content || $download_link ): ?>
            <div class="pdf_download">
                <div class="row align-items-center justify-content-between">

                    <div class="col-md-7">
                        <div class="icon_with">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/committees/pdf.svg" alt="icon">
                            <?php if ( $download_content ): ?>
                                <p><?php echo esc_html( $download_content ); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-md-4 text-md-end text-center">
                        <?php if ( $download_link ): ?>
                            <a href="<?php echo esc_url( $download_link['url'] ); ?>" 
                               class="btn_blue" 
                               target="_blank" 
                               rel="noopener">
                                Download
                            </a>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        <?php endif; ?>
    </div>
<?php } ?>


                </div>
            </div>
        </div>

    </section>

    <?php get_footer(); ?>