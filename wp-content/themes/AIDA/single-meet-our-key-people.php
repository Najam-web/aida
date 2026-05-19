<?php get_header(); ?>

<section class="about_sec">
    <div class="row">

        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="sidebar-left">
                <ul class="group_option">
                    <li>
                        <a href="<?php echo esc_url(site_url('/who-we-are')); ?>">
                            Who We Are 
                            <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon">
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(site_url('/meet-key-people')); ?>">
                            Meet Our Key People
                            <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon">
                        </a>
                        <ul>
                            <?php
                            $people_args = array(
                                'post_type'      => 'meet-our-key-people',
                                'posts_per_page' => -1,
                                'orderby'        => 'menu_order',
                                'order'          => 'ASC'
                            );
                            $people_query = new WP_Query($people_args);

                            if ($people_query->have_posts()) :
                                while ($people_query->have_posts()) : $people_query->the_post();
                                    $designation = get_field('designation');
                                    $active_class = (get_the_ID() == get_queried_object_id()) ? 'active' : '';
                            ?>
                                <li>
                                    <a class="<?php echo $active_class; ?>" href="<?php the_permalink(); ?>">
                                        <?php echo esc_html($designation); ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="<?php echo esc_attr($designation); ?>">
                                    </a>
                                </li>
                            <?php
                                endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(site_url('/organizational-structure')); ?>">
                            Organizational Structure 
                            <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            The Journey So Far 
                            <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon">
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Profile Content -->
        <div class="col-md-9">
            <div class="bit-cram">
                <ul>
                    <li><a href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/about/home.svg" alt="home"></a></li>
                    <li><a href="<?php echo esc_url(site_url('/who-we-are')); ?>">About Us</a></li>
                    <li><a href="<?php echo esc_url(site_url('/meet-key-people')); ?>">Meet Our Key People</a></li>
                    <li><?php the_field('designation'); ?></li>
                </ul>
            </div>

            <div class="container-fluid sec-padd profile_sec">
                <div class="col-md-12">
                    <h2 class="heading-c after-border mb-5" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="2000">
                        <?php the_field('designation'); ?>
                    </h2>
                </div>

                <div class="row g-md-5 g-4 pt-5 align-items-center">
                    <div class="col-md-4">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium', ['alt' => get_the_title()]); ?>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-8">
                        <div class="profile-info">
                            <h4><?php the_title(); ?></h4>
                            <?php if ($short_summary = get_field('short_summary')) : ?>
                                <?php echo wp_kses_post($short_summary); ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <h3 class="heading2">Profile Overview</h3>
                        <?php if ($full_content = get_field('full_content')) : ?>
                            <?php echo wp_kses_post($full_content); ?>
                        <?php else : ?>
                            <?php the_content(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<?php get_footer(); ?>
