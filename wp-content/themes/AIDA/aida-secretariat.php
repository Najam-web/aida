<?php
   /**
   * Template Name: AIDA Secretariat
   */
   ?>
    <?php get_header(); ?>
<section class="about_sec">
        <div class="row">
            <div class="col-md-3">
                <div class="sidebar-left">
                      <ul class="group_option">
                        <li>
                            <a href="<?php echo esc_url(site_url('/'))?>contact-us/" class="activ_tab">Contact Us
                                <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon"></a>
                            <ul class="group_option">
                                <li>

                                    <ul class="group_option">
                                        <li><a href="<?php echo esc_url(site_url('/'))?>aida-secretariat/" class="activ_tab">AIDA Secretariat <img
                                                    src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="icon"></a>
                                        </li>
                                        <li><a href="<?php echo esc_url(site_url('/'))?>aida-members/">Aida Members <img
                                                    src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="icon"></a></li>
                                        <!--<li><a target="_blank" href="<?php echo esc_url(site_url('/'))?>wp-content/uploads/2025/08/Vacancy-Circular-1.pdf">Work With-->
                                        <!--        Us <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="icon"></a></li>-->
                                    </ul>

                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="bit-cram">
                    <ul>
                        <li><a href="<?php echo esc_url(site_url('/'))?>contact-us/"><img src="<?php echo get_template_directory_uri(); ?>/images/about/home.svg" alt="home"></a></li>
                        <li> Contact Us </li>
                    </ul>
                </div>
                <div class="container-fluid sec-padd event_sec">
                    <div class="commited_sec event_sec">
                        <div class="row g-md-5 g-4">
                            <?php
    $box_title_1 = get_field('box_title_1',414);
    $box_image_1 = get_field('box_image_1',414);
    $box_url_1 = get_field('box_url_1',414);
    $box_add = get_field('address',439);
    ?>

    <?php if ($box_title_1 && $box_image_1 && $box_url_1): ?>
        <!--<div class="col-md-6">-->
        <!--    <a href="<?php echo esc_html($box_url_1); ?>">-->
        <!--        <div class="card-box">-->
        <!--            <div class="card-icon">-->
        <!--                <img src="<?php echo esc_url($box_image_1['url']); ?>" alt="Policy Icon">-->
        <!--            </div>-->
        <!--            <div>-->
        <!--                <h5><?php echo esc_html($box_title_1); ?></h5>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </a>-->
        <!--</div>-->
    <?php endif; ?> 
                        </div>
                    </div>
                    <div class="row g-md-5 g-4 pt-5">
                        <div class="col-md-12">
                            <div class="form_main address_info">
                                <div class="row g-md-5 g-4">
                                    <div class="col-md-12">
                                        
                                        <?php the_field('address'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php get_footer(); ?>