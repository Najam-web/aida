<?php get_header(); ?>

<section class="about_sec">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="sidebar-left">
                <ul class="group_option">
                    <li><a href="<?php echo site_url('/about-us'); ?>">Who We Are <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon"></a></li>
                    <li><a href="<?php echo esc_url(site_url('/'))?>meet-key-people/">Meet Our Key People <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon"></a></li>
                    <li>
                        <a href="<?php echo site_url('/organizational-structure'); ?>">Organizational Structure <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon"></a>
                        <ul>
                            <?php
                            // These can be made dynamic if needed
                            $terms = get_terms(array(
                                'taxonomy' => 'key_people_category',
                                'hide_empty' => false,
                            ));
                            foreach($terms as $term) {
                                $active = is_tax('key_people_category', $term->slug) ? 'class="active"' : '';
                                echo '<li><a href="' . get_term_link($term) . '" ' . $active . '>' . $term->name . ' <img src="' . get_template_directory_uri() . '/images/about/arrow-right.svg" alt="' . esc_attr($term->name) . '"></a></li>';
                            }
                            ?>
                        </ul>
                    </li>
                    <li><a href="<?php echo esc_url(site_url('/'))?>the-journey-so-far/">The Journey So Far <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon"></a></li>
                </ul>
            </div>
        </div>

        <!-- Main content -->
        <div class="col-md-9">
            <div class="bit-cram">
                <ul>
                    <li><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/about/home.svg" alt="home"></a></li>
                    <li><a href="<?php echo site_url('/about-us'); ?>">About Us</a></li>
                    <li><a href="<?php echo site_url('/organizational-structure'); ?>">Organizational Structure</a></li>
                    <li><?php single_term_title(); ?></li>
                </ul>
            </div>

            <div class="container-fluid sec-padd profile_sec">
                <div class="col-md-12">
                    <h2 class="heading-c after-border mb-5" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="2000">
                        <?php single_term_title(); ?>
                    </h2>
                    <p class="mb-5"><?php echo term_description(); ?></p>
                </div>

                <div>
                    <div class="row g-md-5 g-4 pt-5">
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                            <?php
                            $designation = get_field('designation');
                            $organisation = get_field('organisation');
                            $mobile = get_field('mobile');
                            $email = get_field('email');
                            ?>
                            <div class="col-md-4 col-sm-6">
                                <div class="team_card">
                                    <?php if ( $designation ) : ?>
                                        <div class="post"><?php echo esc_html( $designation ); ?></div>
                                    <?php endif; ?>

                                    <div class="team-info">
                                        <?php if ( has_post_thumbnail() ) : ?>
                                            <?php the_post_thumbnail( 'medium', array( 'alt' => get_the_title() ) ); ?>
                                        <?php endif; ?>

                                        <h2><?php the_title(); ?></h2>

                                        <?php if ( $designation ) : ?>
                                            <p><b><?php echo esc_html( $designation ); ?></b></p>
                                        <?php endif; ?>

                                        <?php if ( $organisation ) : ?>
                                            <p><b><?php echo esc_html( $organisation ); ?></b></p>
                                        <?php endif; ?>

                                        <?php if ( $mobile ) : ?>
                                            <p><b>Mobile : </b> <?php echo esc_html( $mobile ); ?></p>
                                        <?php endif; ?>

                                        <?php if ( $email ) : ?>
                                            <p><b>Email : </b> <a href="mailto:<?php echo antispambot( $email ); ?>"><?php echo antispambot( $email ); ?></a></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; else : ?>
                            <p>No key people found in this category.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
