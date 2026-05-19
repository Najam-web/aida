<?php
   /**
   * Template Name: Home
   */
   ?>
    <?php get_header(); ?>
    <style>
        .web_header li a {
            color: var(--bs-white);
        }

        .web_header li .dropdown-item {
            color: var(--bs-black);
        }
    </style>
        <section class="banner_sec" data-aos="fade-up">
            <div class="swiper banner-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide position-relative">
                        <?php 
$image = get_field('banner_img');
if( !empty( $image ) ): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            <?php endif; ?>
                                <div class="slider_content">
                                    <h2><?php echo esc_html( get_field('banner_title') ); ?></h2>
                                    <p>
                                        <?php echo esc_html( get_field('banner_subtitle') ); ?>
                                    </p>
                                </div>
                    </div>
                </div>
                <div class="swiper-pagination white_pagi"></div>
            </div>
        </section>
         <marquee onMouseOver="this.stop()" onMouseOut="this.start()" class="bg_marquee">
        <div class="home_marquee">
               <p class="special_p">
   <?php
$args = array(
    'post_type'      => 'streamer',
    'posts_per_page' => -1,
    'order'          => 'DESC',
    'orderby'        => 'date'
);

$streamer_query = new WP_Query($args);

if ($streamer_query->have_posts()) :
    while ($streamer_query->have_posts()) : $streamer_query->the_post(); 
        
        $event_text = get_field('streamer');
        $event_url  = get_field('streamer_link');

        if ($event_text && $event_url) {
            echo '<b></b><span><a href="' . esc_url($event_url) . '" target="_blank" rel="noopener">' . esc_html($event_text) . '</a></span>';
        }

    endwhile;

    wp_reset_postdata();
else :
    echo '<span>No events found.</span>';
endif;
?>


            </p>

        </div>
    </marquee>
        <section class="pt-5 mb-5" data-aos="fade-up" data-aos-duration="1000">
            <div class="container-fluid">
                <div class="row g-4 g-md-5">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                         <a href="/aida-members/">
                        <div class="border-box">
                         
                            <div class="content-left">
                                <h3><?php echo esc_html( get_field('box_1') ); ?></h3>
                            </div>
                            <div>
                                <?php 
$image = get_field('box_icon_1');
if( !empty( $image ) ): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                    <?php endif; ?>


                            </div>
                             
                        </div>
                         </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6  col-12">
                        <a href="/upcoming-events/">
                        <div class="border-box">
                            <div class="content-left">
                                <h3><?php echo esc_html( get_field('box_2') ); ?></h3>

                            </div>
                            <div>
                                <?php 
$image = get_field('box_icon_2');
if( !empty( $image ) ): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                    <?php endif; ?>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                         <a href="/committees/">
                        <div class="border-box">
                            <div class="content-left">
                                <h3><?php echo esc_html( get_field('box_3') ); ?></h3>

                            </div>
                            <div>
                                <?php 
$image = get_field('box_icon_3');
if( !empty( $image ) ): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                    <?php endif; ?>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                         <a href="/latest-news/">
                        <div class="border-box">
                            <div class="content-left">
                                <h3><?php echo esc_html( get_field('box_4') ); ?></h3>

                            </div>
                            <div>
                                <?php 
$image = get_field('box_icon_4');
if( !empty( $image ) ): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                    <?php endif; ?>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>



        <section class="sec-padd  black_p light-bg" data-aos="fade-right" data-aos-duration="2000">

            <div class="container-fluid">

                <div class="row g-md-5 g-4 flex-column-reverse flex-md-row">

                    <div class="col-md-6">

                        <div class="w_95">
                            <?php the_field('left_content'); ?>

                        </div>

                        <div class="mt-5">

                            <a class="c_btn yellow_btn" data-aos="flip-down" data-aos-duration="1000" href="<?php echo esc_url(site_url('/who-we-are'))?>"><span>Discover More</span></a>

                        </div>

                    </div>

                    <div class="col-md-6">
                        <?php 
$image = get_field('right_image');
if( !empty( $image ) ): ?>
                            <img class="r_45 scale-effect w-100" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            <?php endif; ?>
                    </div>

                </div>

            </div>

        </section>



   <section class="sec-padd vision_sec" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="2000">

            <div class="container-fluid">

                <h2 class="heading-c after-border text-center mb-5"><?php the_field('sub_title_vision'); ?> </h2>

                <div class="col-md-7 mx-auto text-center">

                    <p><?php the_field('sub_content_4'); ?></p>

                </div>
 

            </div>

        </section>






        <section class="sec-padd sec_obj" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="2000">

            <div class="container-fluid">

                <h2 class="heading-c after-border text-center mb-5"><?php the_field('top_content_3'); ?></h2>

                <div class="col-md-7 mx-auto pb-5 mb-md-4">

                    <p>
                        <?php the_field('top_content_2'); ?>
                    </p>

                </div>

                <div class="row g-md-4 g-0 ">

                    <div class="col-md-4">

                        <div class="text-center bulb_img m-show">

                            <img src="<?php echo get_template_directory_uri(); ?>/images/home/bulb.webp" alt="Knowledge">

                        </div>

                        <div class="objbox">

                            <div class="obj-text">

                                <h3><?php the_field('left_image_content_1'); ?></h3>



                            </div>

                            <div class="objimg ">

                                <?php 
$image = get_field('left_image_1');
if( !empty( $image ) ): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                    <?php endif; ?>

                            </div>

                        </div>

                        <div class="objbox">

                            <div class="obj-text">

                                <h3><?php the_field('left_image_content_2'); ?></h3>



                            </div>

                            <div class="objimg">

                                <?php 
$image = get_field('left_image_2');
if( !empty( $image ) ): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                    <?php endif; ?>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-4 ">

                        <div class="text-center bulb_img m-hide">

                            <?php 
$image = get_field('left_image_6');
if( !empty( $image ) ): ?>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php endif; ?>

                        </div>

                        <div class="objbox">

                            <div class="obj-text">

                                <h3><?php the_field('bottom_image_content'); ?></h3>



                            </div>

                            <div class="objimg">

                                <?php 
$image = get_field('left_image_3');
if( !empty( $image ) ): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                    <?php endif; ?>
                            </div>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="objbox">

                            <div class="obj-text">

                                <h3><?php the_field('right_image_content_1'); ?></h3>



                            </div>

                            <div class="objimg">

                                <?php 
$image = get_field('left_image_5');
if( !empty( $image ) ): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                    <?php endif; ?>

                            </div>

                        </div>

                        <div class="objbox">

                            <div class="obj-text">

                                <h3><?php the_field('right_image_content_2'); ?></h3>



                            </div>

                            <div class="objimg">

                                <?php 
$image = get_field('left_image_4');
if( !empty( $image ) ): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                    <?php endif; ?>

                            </div>

                        </div>

                    </div>



                </div>

            </div>

        </section>



        <section class="sec-padd organ_sec animated-zigzag-bg" id="org-structure">

            <div class="container-fluid">

                <div class="row g-md-5 g-4 align-items-center">

                    <div class="col-md-8">

                        <h2 class="heading-c after-border"><?php the_field('title'); ?></h2>

                    </div>

                    <div class="col-md-4 m-hide">

                        <div class="mt-5 text-md-end">

                            <a class="c_btn yellow_btn" href="<?php echo esc_url(site_url('/organizational-structure'))?>"><span>View More</span></a>

                        </div>

                    </div>

                </div>

                <div class="row g-4 pt-5">

                    <div class="swiper slider4 pb-5 mt-md-5" data-aos="zoom-in-left" data-aos-duration="2000">

                        <div class="swiper-wrapper">

                            <div class="swiper-slide">

                                <div class="img-card">

                                    <?php 
$image = get_field('organization_image_1');
if( !empty( $image ) ): ?>
                                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                        <?php endif; ?>

                                            <h3><?php the_field('organization_image_title_1'); ?></h3>



                                </div>

                            </div>

                            <div class="swiper-slide">

                                <div class="img-card">

                                    <?php 
$image = get_field('organization_image_2');
if( !empty( $image ) ): ?>
                                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                        <?php endif; ?>

                                            <h3><?php the_field('organization_image_title_2'); ?></h3>



                                </div>

                            </div>

                            <div class="swiper-slide">

                                <div class="img-card">

                                    <?php 
$image = get_field('organization_image_3');
if( !empty( $image ) ): ?>
                                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                        <?php endif; ?>

                                            <h3><?php the_field('organization_image_title_3'); ?></h3>



                                </div>

                            </div>

                            <div class="swiper-slide">

                                <div class="img-card">

                                    <?php 
$image = get_field('organization_image_4');
if( !empty( $image ) ): ?>
                                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                        <?php endif; ?>

                                            <h3><?php the_field('organization_image_title_4'); ?></h3>



                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination white_pagi"></div>
                    </div>
                    <div class="col-md-4 m-show text-center">
                        <div class="mt-5 text-md-end">
                            <a class="c_btn yellow_btn" href="<?php echo esc_url(site_url('/organizational-structure'))?>"><span>View More</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="sec-padd arrow_outer">

            <div class="container-fluid">

                <h2 class="heading-c after-border text-center mb-5" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="2000">Our Members</h2>

                <div class="row g-4 pt-4">

                    <div class="swiper slider04">

                        <div class="swiper-wrapper">

                           <?php
$args = array(
    'post_type'      => 'members',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'title',
    'order'          => 'ASC',
    'tax_query'      => array(
        array(
            'taxonomy' => 'member_category', // CHANGE IF NEEDED
            'operator' => 'NOT EXISTS',
        ),
    ),
);

$members_query = new WP_Query($args);

if ($members_query->have_posts()) :
    while ($members_query->have_posts()) : $members_query->the_post();

        // ACF Link Field Handling
        $link_field = get_field('link');
        if (is_array($link_field)) {
            $link   = $link_field['url'] ?? '#';
            $target = $link_field['target'] ?? '_self';
        } else {
            $link   = $link_field ?: '#';
            $target = '_blank';
        }

        // Featured Image
        $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');

        if ($image_url) : ?>
            <div class="swiper-slide">
                <div class="logo-div">
                    <a href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>">
                        <img 
                            src="<?php echo esc_url($image_url); ?>" 
                            alt="<?php echo esc_attr(get_the_title()); ?>"
                            loading="lazy"
                        >
                    </a>
                </div>
            </div>
        <?php endif;

    endwhile;
    wp_reset_postdata();
endif;
?>

                        </div>

                        <div class="swiper-button-next"></div>

                        <div class="swiper-button-prev"></div>

                    </div>

                </div>

            </div>

        </section>
        <section class="sec-padd light-bg circle_arrow  news_sec">

            <div class="container-fluid">

                <div class="row g-md-5 g-4 align-items-center justify-content-between">

                    <div class="col-md-5">

                        <h2 class="heading-c after-border" data-aos="fade-right" data-aos-duration="2000">Latest News</h2>

                    </div>

                    <div class="col-md-4 m-hide">

                        <div class="mt-5 text-md-end">

                            <a class="c_btn yellow_btn" href="<?php echo esc_url(site_url('/'))?>latest-news/"><span>View All News</span></a>

                        </div>

                    </div>

                </div>

                <div class="row g-4 pt-5" data-aos="fade-left" data-aos-duration="3000">

                    <div class="swiper slider3 slider_padd mt-md-5">

                        <div class="swiper-wrapper">
 <?php
                    $args = array(
                        'post_type'      => 'news',
                        'posts_per_page' => 6,
                        'date_query'     => array(
                            array(
                                'after' => '1 month ago', // or date('Y-m-01') for current month only
                            ),
                        ),
                        'no_found_rows'          => true,
                        'update_post_term_cache' => true,
                        'update_post_meta_cache' => false,
                    );

                    $news_query = new WP_Query($args);

                    if ($news_query->have_posts()) :
                        while ($news_query->have_posts()) : $news_query->the_post();
                            $news_date  = date_i18n('jS F Y', strtotime(get_the_date('Y-m-d')));
                            $news_terms = get_the_terms(get_the_ID(), 'news_category');
                    ?>
                        <div class="swiper-slide">
                            <div class="news-card">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if (has_post_thumbnail()) : ?>
    <?php the_post_thumbnail([410, 193], ['alt' => get_the_title()]); ?>
<?php else : ?>
    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/home/news.png" alt="News" width="410" height="193">
<?php endif; ?>

                                </a>
                                <div class="new-content">
                                   
                                    <a href="<?php the_permalink(); ?>">
                                        <h2><?php the_title(); ?></h2>
                                    </a>
                                     <div class="news_info">
                                        <p>
                                             <?php
                                            // if (!empty($news_terms)) {
                                            //     echo '<span>' . esc_html($news_terms[0]->name) . '</span>';
                                            // }
                                            // ?>
                                            <span><?php echo esc_html($news_date); ?></span>
                                        </p>
                                    </div>
                                    <p><?php echo wp_trim_words(get_the_content(), 23); ?></p>

                                </div>
                            </div>
                        </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>

                    </div>

                    <div class="swiper-button-next"></div>

                    <div class="swiper-button-prev"></div>

                    <div class="swiper-pagination red_pagi"></div>

                </div>

                <div class="col-md-4 m-show ">

                    <div class="mt-5 text-center">

                        <a class="c_btn yellow_btn" href="<?php echo esc_url(site_url('/'))?>latest-news/"><span>View All News</span></a>

                    </div>

                </div>

            </div>

        </div>

    </section>
    <section class="sec-padd upcoming_sec">

        <div class="container-fluid">

            <div class="content-dex">

                <div class="row  g-4 align-items-center">

                    <div class="col-md-8">

                        <h2 class="heading-c mb-0 after-border" data-aos="fade-right" data-aos-duration="2000">Upcoming

                            Events</h2>

                                    </div>

                                    <div class="col-md-4 m-hide">

                                        <div class="mt-5 text-md-end">

                                            <a class="c_btn yellow_btn" href="<?php echo esc_url(site_url('/'))?>upcoming-events/"><span>View All Events</span></a>

                                        </div>

                                    </div>

                                </div>

                                <div class="row g-4 pt-5" data-aos="fade-left" data-aos-duration="3000">

                  <?php
$today = date('Ymd');

$args = array(
    'post_type'      => 'event',
    'posts_per_page' => 4, // limit to 4 for design
    'meta_key'       => 'start_date',
    'orderby'        => 'meta_value_num',
    'order'          => 'ASC',
    'meta_query'     => array(
        'relation' => 'OR',

        // Case 1: End date exists and is >= today - 6 days
        array(
            'key'     => 'event_start', // end date field
            'value'   => date('Ymd', strtotime('-6 days')),
            'compare' => '>=',
            'type'    => 'NUMERIC'
        ),

        // Case 2: No end date, so use start date
        array(
            'key'     => 'start_date',
            'value'   => date('Ymd', strtotime('-6 days')),
            'compare' => '>=',
            'type'    => 'NUMERIC'
        )
    )
);

$events = new WP_Query($args);

if ($events->have_posts()) :
    while ($events->have_posts()) : $events->the_post();
        $start_date = get_field('start_date');
        $end_date   = get_field('event_start');
        $category   = get_the_terms(get_the_ID(), 'event_category'); // taxonomy
        ?>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="upcoming-box">
                <div class="content-white">
                 
                    
                     <?php if ($category && !is_wp_error($category)) : ?>
    <?php 
    $cat_name = $category[0]->name;

    if ($cat_name === 'AIDA Hosted') : ?>
        <p class="tag">AIDA Co-Hosting</p>
    <?php else : ?>
        <p class="tag"><?php echo esc_html($cat_name); ?></p>
    <?php endif; ?>
<?php endif; ?>
 

                    <h3><?php the_title(); ?></h3>
                     <p class="date">
                        <?php 
                        if ($start_date) {
                            $start_day   = date_i18n('jS', strtotime($start_date));
                            $start_month = date_i18n('F', strtotime($start_date));
                            $start_year  = date_i18n('Y', strtotime($start_date));

                            if ($end_date) {
                                $end_day = date_i18n('jS', strtotime($end_date));

                                // If same month & year
                                if ($start_month === date_i18n('F', strtotime($end_date)) && $start_year === date_i18n('Y', strtotime($end_date))) {
                                    echo $start_day . '-' . $end_day . ' ' . $start_month . ', ' . $start_year;
                                } else {
                                    echo $start_day . ' ' . $start_month . ', ' . $start_year . ' - ' . $end_day . ' ' . date_i18n('F, Y', strtotime($end_date));
                                }
                            } else {
                                echo $start_day . ' ' . $start_month . ', ' . $start_year;
                            }
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
        <?php
    endwhile;
    wp_reset_postdata();
else :
    echo '<p>No upcoming events found.</p>';
endif;
?>


                                </div>

                                <div class="col-md-4 pt-4 m-show">

                                    <div class="mt-5 text-center">

                                        <a class="c_btn yellow_btn" href="<?php echo esc_url(site_url('/'))?>upcoming-events/"><span>View All Events</span></a>

                                    </div>

                                </div>

                            </div>

                        </div>

        </section>

        <?php get_footer(); ?>