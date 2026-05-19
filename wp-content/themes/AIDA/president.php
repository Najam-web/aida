<?php

/**
 * Template Name: President
 */
?>
<?php get_header(); ?>
<section class="about_sec">
    <div class="row">
        <div class="col-md-3">
            <div class="sidebar-left">
                <ul class="group_option">
                    <li>
                        <a href="<?php echo esc_url(site_url('/')) ?>who-we-are/">Who We Are <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon"></a>
                    </li>
                    <li><a href="<?php echo esc_url(site_url('/')) ?>">Meet Our Key People <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon"></a></li>
                    <li><a href="<?php echo esc_url(site_url('/organizational-structure')) ?>">Organizational Structure <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon"></a>
                        <ul>
                            <li>
                                <a href="<?php echo esc_url(site_url('/')) ?>key-people-category/general-body/">General Body <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="General Body"></a>
                            </li>
                            <li>
                                <a href="<?php echo esc_url(site_url('/')) ?>key-people-category/executive-council/">Executive Council <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="Executive Council"></a>
                            </li>
                            <li>
                                <a class="active" href="<?php echo esc_url(site_url('/')) ?>key-people-category/president/">Chief Executive Officer <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="President"></a>
                            </li>
                            <li>
                                <a href="<?php echo esc_url(site_url('/')) ?>key-people-category/general-secretary/">Secretariat <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="General Secretary"></a>
                            </li>


                        </ul>
                    </li>
                    <li><a href="<?php echo esc_url(site_url('/')) ?>the-journey-so-far/">The Journey So Far <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon"></a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="bit-cram">
                <ul>
                    <li><a href="<?php echo esc_url(site_url('/')) ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/about/home.svg" alt="home"></a></li>
                    <li><a href="<?php echo esc_url(site_url('/')) ?>who-we-are/">About Us</a></li>
                    <li> <a href="<?php echo esc_url(site_url('/')) ?>organizational-structure/">Organizational Structure</a> </li>
                    <li><?php single_post_title(); ?></li>
                </ul>
            </div>
            <div class="container-fluid sec-padd profile_sec">
                <div class="col-md-12">
                    <h2 class="heading-c after-border mb-5" data-aos="fade-up"
                        data-aos-anchor-placement="top-bottom" data-aos-duration="2000"><?php single_post_title(); ?>
                    </h2>
                    <!-- <p class="mb-5"></p> -->
                </div>
                <div>
                    <div class="row g-md-5 g-4 pt-5">
                        <?php
                        $args = array(
                            'post_type'      => 'organizational',
                            'posts_per_page' => -1,
                            'orderby'        => 'menu_order',
                            'order'          => 'ASC',
                            'tax_query'      => array(
                                array(
                                    'taxonomy' => 'organizational_category',
                                    'field'    => 'slug',
                                    'terms'    => 'president', // replace with dynamic term if needed
                                ),
                            ),
                        );

                        $query = new WP_Query($args);

                        if ($query->have_posts()) : ?>
                            <div class="row">
                                <?php while ($query->have_posts()) : $query->the_post(); ?>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="team_card">

                                            <!-- Show Designation (ACF field) -->
                                            <?php if ($designation = get_field('designation')) : ?>
                                                <div class="post"><?php echo esc_html($designation); ?></div>
                                            <?php endif; ?>

                                            <div class="team-info">
                                                <!-- Featured Image -->
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <?php the_post_thumbnail('medium', array('alt' => get_the_title())); ?>
                                                <?php endif; ?>

                                                <!-- Name -->
                                                <h2><?php the_title(); ?></h2>

                                                <!-- Designation -->
                                                <?php if ($designation) : ?>
                                                    <p><b><?php echo esc_html($designation); ?></b></p>
                                                <?php endif; ?>

                                                <!-- Sub Title -->
                                                <?php if ($sub_title = get_field('sub_title')) : ?>
                                                    <p><b><?php echo esc_html($sub_title); ?></b></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif;
                        wp_reset_postdata(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>