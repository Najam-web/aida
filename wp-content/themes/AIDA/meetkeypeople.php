<?php
/**
 * Template Name: Meet Key People
 */
get_header();
?>


    <section class="about_sec">

        <div class="row">

            <div class="col-md-3">

                <div class="sidebar-left">
    <ul class="group_option">

        <li>
            <a href="<?php echo esc_url(site_url('/'))?>who-we-are/">Who We Are 
                <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon">
            </a>
        </li>

        <li>
            <a class="active" href="<?php echo esc_url(get_post_type_archive_link('meet-key-people')); ?>">
                Meet Our Key People 
                <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon">
            </a>
            <ul>
                <?php
                $people_args = array(
    'post_type'      => 'meet-our-key-people',
    'posts_per_page' => -1,
    'orderby'        => 'date',  // Order by publish date/time
    'order'          => 'ASC'   // DESC = latest first, ASC = oldest first
);

                $people_query = new WP_Query($people_args);
                if ($people_query->have_posts()) :
                    while ($people_query->have_posts()) : $people_query->the_post();
                        $designation = get_field('designation');
                ?>
                    <li>
                        <a href="<?php the_permalink(); ?>">
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

            <div class="col-md-9">

                <div class="bit-cram">

                    <ul>

                        <li><a href="<?php echo esc_url(site_url('/'))?>who-we-are/"><img src="<?php echo get_template_directory_uri(); ?>/images/about/home.svg" alt="home"></a></li>

                        <li><a href="<?php echo esc_url(site_url('/'))?>who-we-are/">About Us</a></li>

                        <li> Meet Our Key People </li>

                    </ul>

                </div>

                <div class="container-fluid sec-padd  profile_sec">

                    <div class="col-md-12">

                        <h2 class="heading-c after-border mb-5" data-aos="fade-up"

                            data-aos-anchor-placement="top-bottom" data-aos-duration="2000">Meet Our Key People</h2>

                    </div>

<?php $args = array( 'post_type' => 'meet-our-key-people', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'date' ); $query = new WP_Query($args); if ($query->have_posts()) : ?> <div class="row g-md-5 g-4 pt-5"> <?php while ($query->have_posts()) : $query->the_post(); ?> <div class="col-md-4 col-sm-6"> <div class="team_card"> <?php if ($designation = get_field('designation')) : ?> <div class="post"><?php echo esc_html($designation); ?></div> <?php endif; ?> <div class="team-info"> <a href="<?php the_permalink(); ?>"> <?php if (has_post_thumbnail()) : ?> <?php the_post_thumbnail('medium', ['alt' => get_the_title()]); ?> <?php endif; ?> <h2><?php the_title(); ?></h2> </a> <?php if ($short_summary = get_field('short_summary')) : ?> <p><?php echo wp_kses_post($short_summary); ?></p> <?php endif; ?> </div> </div> </div> <?php endwhile; ?> </div> <?php endif; wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>
