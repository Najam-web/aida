<?php
   /**
   * Template Name: Executive Council
   */
   ?>
<?php get_header(); ?>

    <?php
$user_id = get_current_user_id(); 
$designation = get_user_meta($user_id, 'designation', true); 
?>
    <section class="about_sec">

        <div class="row">

            <div class="col-md-3">
                <div class="sidebar-left">
                    <ul class="group_option">
                        <li>
                            <a href="<?php echo esc_url(site_url('/'))?>who-we-are/">Who We Are <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon"></a>
                        </li>
                        <li><a href="<?php echo esc_url(site_url('/'))?>">Meet Our Key People <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg"  alt="icon"></a></li>
                        <li><a href="<?php echo esc_url(site_url('/organizational-structure'))?>">Organizational Structure <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon"></a>
                            <ul>
						   <li>
                                    <a href="<?php echo esc_url(site_url('/'))?>key-people-category/general-body/">General Body <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="General Body"></a>
                                </li>
						    <li>
                                    <a class="active" href="<?php echo esc_url(site_url('/'))?>key-people-category/executive-council/">Executive Council <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="Executive Council"></a>
                                </li>
                                <li>
                                    <a href="<?php echo esc_url(site_url('/'))?>key-people-category/president/">Chief Executive Officer <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="President"></a>
                                </li>
                                <li>
                                    <a href="<?php echo esc_url(site_url('/'))?>key-people-category/general-secretary/">Secretariat <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="General Secretary"></a>
                                </li>
                                
                               
                            </ul>
                        </li>
                        <li><a href="<?php echo esc_url(site_url('/'))?>/the-journey-so-far/">The Journey So Far <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon"></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-9">

                <div class="bit-cram">
 <ul>
                        <li><a href="<?php echo esc_url(site_url('/'))?>"><img src="<?php echo get_template_directory_uri(); ?>/images/about/home.svg" alt="home"></a></li>
                        <li><a href="<?php echo esc_url(site_url('/'))?>who-we-are/">About Us</a></li>
                        <li> <a href="<?php echo esc_url(site_url('/'))?>organizational-structure/">Organizational Structure</a> </li>
                        <li><?php single_post_title(); ?></li>
                    </ul>
                </div>

                <div class="container-fluid sec-padd org_sec">

                    <div class="col-md-12">

                        <h2 class="heading-c after-border mb-5" data-aos="fade-up"

                            data-aos-anchor-placement="top-bottom" data-aos-duration="2000"><?php single_post_title(); ?></h2>

                        <p class="mb-5 pb-4">2 Member Discoms elected from each of the 5 electricity regions in India:

                            total 10 members for a term of 3 years</p>

                    </div>

                    <div>

                        <div class="row g-md-5 g-4">

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
            'terms'    => 'aida-council-member', // replace with dynamic term if needed
        ),
    ),
);

$query = new WP_Query($args);

if ($query->have_posts()) : ?>
    <div class="row">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            
            <div class="col-md-4 col-sm-6">
                                <div class="blue_main">
                                    <div class="blue_card">
                                        <div class="strip-info">
                                            <h3><?php the_title(); ?></h3>
                                           
                            <p><b><?php the_field('designation'); ?></b></p>
                        
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
        <?php endwhile; ?>
    </div>
<?php endif; wp_reset_postdata(); ?>

                        </div>



                        <div class="category_sec">

                            Representatives of Western Region

                        </div>

<div class="row g-md-5 g-4">

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
            'terms'    => 'representatives-of-western-region', // replace with dynamic term if needed
        ),
    ),
);

$query = new WP_Query($args);

if ($query->have_posts()) : ?>
    <div class="row">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            
            <div class="col-md-4 col-sm-6">
                                <div class="blue_main">
                                    <div class="blue_card">
                                        <div class="strip-info">
                                            <h3><?php the_title(); ?></h3>
                                             <p><b><?php the_field('designation'); ?></b></p>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
        <?php endwhile; ?>
    </div>
<?php endif; wp_reset_postdata(); ?>

                        </div>



                        <div class="category_sec">

                            Representatives of Eastern Region

                        </div>



                        <div class="row g-md-5 g-4">


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
            'terms'    => 'representatives-of-eastern-region', // replace with dynamic term if needed
        ),
    ),
);

$query = new WP_Query($args);

if ($query->have_posts()) : ?>
    <div class="row">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            
            <div class="col-md-4 col-sm-6">
                                <div class="blue_main">
                                    <div class="blue_card">
                                        <div class="strip-info">
                                            <h3><?php the_title(); ?></h3>
                                           <p><b><?php the_field('designation'); ?></b></p>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
        <?php endwhile; ?>
    </div>
<?php endif; wp_reset_postdata(); ?>

                        </div>


                        <div class="category_sec">

                            Representatives of Northern Region

                        </div>



                                                <div class="row g-md-5 g-4">


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
            'terms'    => 'representatives-of-northern-region', // replace with dynamic term if needed
        ),
    ),
);

$query = new WP_Query($args);

if ($query->have_posts()) : ?>
    <div class="row">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            
            <div class="col-md-4 col-sm-6">
                                <div class="blue_main">
                                    <div class="blue_card">
                                        <div class="strip-info">
                                            <h3><?php the_title(); ?></h3>
                                            <p><b><?php the_field('designation'); ?></b></p>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
        <?php endwhile; ?>
    </div>
<?php endif; wp_reset_postdata(); ?>

                        </div>


                        <div class="category_sec">

                            Representatives of North Eastern Region

                        </div>



                        <div class="row g-md-5 g-4">


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
            'terms'    => 'representatives-of-north-eastern-region', // replace with dynamic term if needed
        ),
    ),
);

$query = new WP_Query($args);

if ($query->have_posts()) : ?>
    <div class="row">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            
            <div class="col-md-4 col-sm-6">
                                <div class="blue_main">
                                    <div class="blue_card">
                                        <div class="strip-info">
                                            <h3><?php the_title(); ?></h3>
                                            <p><b><?php the_field('designation'); ?></b></p>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
        <?php endwhile; ?>
    </div>
<?php endif; wp_reset_postdata(); ?>

                        </div>

                        <div class="category_sec">

                            Representatives of Southern Region

                        </div>



                         <div class="row g-md-5 g-4">


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
            'terms'    => 'representatives-of-southern-region', // replace with dynamic term if needed
        ),
    ),
);

$query = new WP_Query($args);

if ($query->have_posts()) : ?>
    <div class="row">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            
            <div class="col-md-4 col-sm-6">
                                <div class="blue_main">
                                    <div class="blue_card">
                                        <div class="strip-info">
                                            <h3><?php the_title(); ?></h3>
                                           <p><b><?php the_field('designation'); ?></b></p>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
        <?php endwhile; ?>
    </div>
<?php endif; wp_reset_postdata(); ?>

                        </div>

                    </div>



                </div>

            </div>

        </div>
    </section>
<?php get_footer(); ?>