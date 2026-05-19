<?php
/**
 * Template Name: Vision
 */
get_header();
?>

<section class="about_sec">
    <div class="row">
        <div class="col-md-3">
                    <div class="sidebar-left">
                    <ul class="group_option">
                        <li>
                            <a href="<?php echo esc_url(site_url('/'))?>who-we-are/" >Who We Are <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg"

                                    alt="icon"></a>
                            <ul>
                                <li>
                                    <a href="<?php echo esc_url(site_url('/'))?>vision/" class="active">Vision <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="tab4"></a>
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

        <div class="col-md-9">
            <div class="bit-cram">
                <ul>
                    <li><a href="<?php echo site_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/about/home.svg" alt="home"></a></li>
                    <li><a href="<?php echo esc_url(site_url('/'))?>who-we-are/">About Us</a></li>
                    <li> Vision </li>
                </ul>
            </div>

            <div class="container-fluid sec-padd">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-Vision" role="tabpanel">
                        <div class="row g-md-5 g-4">
                            <div class="col-md-7">
                                <h2 class="heading-c after-border mb-5" data-aos="fade-up" data-aos-duration="2000">Vision</h2>
                                <?php the_field('left_content'); ?>
                            </div>
                            <div class="col-md-5">
                                <?php 
                                $right_image = get_field('right_image'); 
                                if ($right_image) :
                                    $img_url = is_array($right_image) ? $right_image['url'] : $right_image;
                                    $img_alt = is_array($right_image) ? $right_image['alt'] : 'Vision';
                                ?>
                                    <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>" class="img-fluid">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
