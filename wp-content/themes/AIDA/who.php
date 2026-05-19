<?php
   /**
   * Template Name: About Us
   */
   ?>
    <?php get_header(); ?>
 <section class="about_sec">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
                <div class="sidebar-left">
                    <ul class="group_option">
                        <li>
                            <a href="<?php echo esc_url(site_url('/'))?>who-we-are/" class="active">Who We Are <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg"

                                    alt="icon"></a>
                            <ul>
                                <li>
                                    <a href="<?php echo esc_url(site_url('/'))?>vision/">Vision <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="tab4"></a>
                                </li>
                                <li>
                                    <a href="<?php echo esc_url(site_url('/'))?>objectives/">Our Objectives <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg"

                                            alt="tab4"></a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="<?php echo esc_url(site_url('/'))?>meet-key-people/">Meet Our Key People <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon"></a></li>
                        <li><a href="<?php echo esc_url(site_url('/'))?>organizational-structure/">Organizational Structure <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon"></a></li>
                        <li><a href="<?php echo esc_url(site_url('/'))?>the-journey-so-far/">The Journey So Far <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon"></a></li>
                    </ul>
                </div>
            </div>
        <!-- Main Content -->
        <div class="col-md-9">
            <!-- Breadcrumb -->
            <div class="bit-cram">
                <ul>
                    <li><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/about/home.svg" alt="Home"></a></li>
                    <li><a href="<?php echo site_url('/who-we-are'); ?>">About Us</a></li>
                    <li><?php the_title(); ?></li>
                </ul>
            </div>
            <div class="container-fluid sec-padd">
                <div class="row g-md-5 g-4">
                    <div class="col-md-12">
                        <h2 class="heading-c mb-3" data-aos="fade-up" data-aos-duration="2000"><?php the_title(); ?></h2>
                        <h4 class="subtitle after-border"><?php the_field('sub_title'); ?></h4>
                      
                    </div>
                    <div class="col-md-7">
                          <?php the_field('left_content'); ?>
                       
                    </div>
                    <div class="col-md-5">
                         <?php 
                        $right_image = get_field('right_image');
                        if ($right_image) :
                        ?>
                            <img src="<?php echo esc_url($right_image['url']); ?>" alt="<?php echo esc_attr($right_image['alt']); ?>" class="img-fluid rounded shadow-sm">
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Vision & Objectives -->
                <div class="row g-md-5 g-4 sec-padd-t alter_color">
                    <div class="col-md-6">
                        <div class="card-div">
                            <div class="img-div">
                                <?php $vision_icon = get_field('vision_img'); ?>
                                <?php if ($vision_icon): ?>
                                    <img src="<?php echo esc_url($vision_icon['url']); ?>" alt="<?php echo esc_attr($vision_icon['alt']); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="content-div">
                                <h3><?php the_field('vision_title'); ?></h3>
                                <!--<a class="c_btn" href="<?php the_field('vision_link'); ?>">Read More</a>-->
                                <a class="c_btn" href="/vision/">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-div">
                            <div class="img-div">
                                <?php $objectives_icon = get_field('objectives_image'); ?>
                                <?php if ($objectives_icon): ?>
                                    <img src="<?php echo esc_url($objectives_icon['url']); ?>" alt="<?php echo esc_attr($objectives_icon['alt']); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="content-div">
                                <h3><?php the_field('objectives_title'); ?></h3>
                                <!--<a class="c_btn" href="<?php the_field('objectives_link'); ?>">Read More</a>-->
                                 <a class="c_btn" href="/objectives/">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .container-fluid -->
        </div>
    </div>
</section>
<?php get_footer(); ?>