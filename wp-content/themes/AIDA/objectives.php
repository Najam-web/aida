<?php
/**
 * Template Name: Objectives
 */
get_header();
?>


    <section class="about_sec">

        <div class="row">

            <div class="col-md-3">

                <div class="sidebar-left">
                <ul class="group_option">
                    <li>
                        <a href="<?php echo site_url('/who-we-are'); ?>">Who We Are <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon"></a>
                        <ul>
                            <li>
                                <a  href="<?php echo site_url('/vision'); ?>">Vision <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="tab4"></a>
                            </li>
                            <li>
                                <a class="active" href="<?php echo site_url('/objectives'); ?>" class="active">Our Objectives <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="tab4"></a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="<?php echo site_url('/meet-key-people'); ?>">Meet Our Key People <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon"></a></li>
                    <li><a href="<?php echo site_url('/organizational-structure'); ?>">Organizational Structure <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon"></a></li>
                    <li><a href="<?php echo site_url('/the-journey-so-far'); ?>">The Journey So Far <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon"></a></li>
                </ul>
            </div>

            </div>

            <div class="col-md-9">

                <div class="bit-cram">

                    <ul>

                        <li><a href="<?php echo esc_url(site_url('/'))?>who-we-are/"><img src="<?php echo get_template_directory_uri(); ?>/images/about/home.svg" alt="home"></a></li>

                        <li><a href="<?php echo esc_url(site_url('/'))?>who-we-are/">About Us</a></li>

                        <li> Our Objectives </li>

                    </ul>

                </div>

                <div class="container-fluid sec-padd">





                    <div class="col-md-12">

                        <h2 class="heading-c after-border mb-5" data-aos="fade-up"

                            data-aos-anchor-placement="top-bottom" data-aos-duration="2000">Our Objectives</h2>

                    </div>

            <?php
$args = array(
    'post_type'      => 'objective',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC'
);
$objectives = new WP_Query($args);

if ($objectives->have_posts()) :
    echo '<ul class="main-list">';
    $count = 1;
    while ($objectives->have_posts()) : $objectives->the_post();
        $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
        ?>
        <li>
            <div class="row g-md-5 g-4 align-items-center section-row">
                <div class="col-md-7 <?php echo ($count % 2 == 0) ? 'order-md-2' : 'order-md-1'; ?>">
                    <div class="title section-title"><?php echo $count . '. ' . get_the_title(); ?></div>
                    
                    <?php the_content(); ?>
                </div>
                <div class="col-md-5 <?php echo ($count % 2 == 0) ? 'order-md-1' : 'order-md-2'; ?>">
                    <?php if ($image_url) : ?>
                        <img src="<?php echo esc_url($image_url); ?>" class="img-fluid rounded" alt="<?php the_title_attribute(); ?>" />
                    <?php endif; ?>
                </div>
            </div>
        </li>
        <?php
        $count++;
    endwhile;
    echo '</ul>';
endif;
wp_reset_postdata();
?>

                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>
