<?php
   /**
   * Template Name: Upcoming Event
   */
   ?>
    <?php get_header(); ?>

    <section class="about_sec">

        <div class="row">

            <div class="col-md-3">

                <div class="sidebar-left">

                    <ul class="group_option">

                        <li>

                            <a href="<?php echo esc_url(site_url('/'))?>upcoming-events/">Events <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon"></a>

                            <ul>

                                <li>

                                    <ul>

                                        <li>

                                            <a href="<?php echo esc_url(site_url('/'))?>upcoming-events/" class="active">

                                                Upcoming Events<img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="tab4"></a>

                                        </li>

                                        <li>

                                            <a href="<?php echo esc_url(site_url('/'))?>past-events/">Past Events <img

                                                    src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="tab4"></a>

                                        </li>

                                        



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

                        <li><a href="<?php echo esc_url(site_url('/'))?>"><img src="<?php echo get_template_directory_uri(); ?>/images/about/home.svg" alt="home"></a></li>

                        <li><a href="<?php echo esc_url(site_url('/'))?>upcoming-events/"> Events</a> </li>

                        <li>Upcoming events </li>
                    </ul>
                    
                    

                </div>

                <div class="container-fluid sec-padd event_sec">

                    <div class="row g-md-5 g-4">

                        <div class="col-md-12">

                            <h2 class="heading-c after-border mb-4 aos-init aos-animate" data-aos="fade-up"

                                data-aos-anchor-placement="top-bottom" data-aos-duration="2000"> Upcoming events

                            </h2>

                        </div>

                      <div class="col-md-12">
<?php
$today = date('Ymd');

$upcoming_args = array(
    'post_type'      => 'event',
    'posts_per_page' => 4,
    'orderby'        => 'meta_value_num',
    'meta_key'       => 'start_date',
    'order'          => 'ASC',
    'meta_query'     => array(
        'relation' => 'OR',

        // Keep if end_date exists and is >= (today - 6 days)
        array(
            'key'     => 'end_date',
            'value'   => date('Ymd', strtotime('-6 days')),
            'compare' => '>=',
            'type'    => 'NUMERIC'
        ),

        // Keep if no end_date and start_date >= (today - 6 days)
        array(
            'key'     => 'start_date',
            'value'   => date('Ymd', strtotime('-6 days')),
            'compare' => '>=',
            'type'    => 'NUMERIC'
        )
    )
);

$upcoming_events = new WP_Query($upcoming_args);

if ($upcoming_events->have_posts()) :
    while ($upcoming_events->have_posts()) : $upcoming_events->the_post();

        $start_date = get_field('start_date');
        $end_date   = get_field('end_date');
        $category   = get_the_terms(get_the_ID(), 'event_category');
        $event_img  = get_the_post_thumbnail_url(get_the_ID(), 'full');

        // Format date
        $date_display = '';
        if ($start_date) {
            $start_ts   = strtotime($start_date);
            $start_day  = date_i18n('jS', $start_ts);
            $start_month= date_i18n('F', $start_ts);
            $start_year = date_i18n('Y', $start_ts);

            if ($end_date) {
                $end_ts  = strtotime($end_date);
                $end_day = date_i18n('jS', $end_ts);

                if ($start_month === date_i18n('F', $end_ts) && $start_year === date_i18n('Y', $end_ts)) {
                    $date_display = $start_day . '-' . $end_day . ' ' . $start_month . ', ' . $start_year;
                } else {
                    $date_display = $start_day . ' ' . $start_month . ', ' . $start_year . ' - ' . $end_day . ' ' . date_i18n('F, Y', $end_ts);
                }
            } else {
                $date_display = $start_day . ' ' . $start_month . ', ' . $start_year;
            }
        }
        ?>

        <div class="event-card-new">
            <div class="event-main">
                <div class="row align-items-center g-4 g-md-0">
                   <div class="col-md-3 col-4">
    <?php 
    // Get ACF field value (external link)
    $external_link = get_field('external_link');

    // Check if event image exists
    if ($event_img) : 
        // If external link exists, wrap image with anchor
        if ($external_link) : ?>
            <a href="<?php echo esc_url($external_link); ?>" target="_blank" rel="noopener">
                <img src="<?php echo esc_url($event_img); ?>" 
                     class="img-fluid event-img" 
                     alt="<?php the_title_attribute(); ?>" 
                     loading="lazy">
            </a>
        <?php else : ?>
            <img src="<?php echo esc_url($event_img); ?>" 
                 class="img-fluid event-img" 
                 alt="<?php the_title_attribute(); ?>" 
                 loading="lazy">
        <?php endif; ?>
    <?php else : 
        // Fallback default image
        if ($external_link) : ?>
            <a href="<?php echo esc_url($external_link); ?>" target="_blank" rel="noopener">
                <img src="<?php echo get_template_directory_uri(); ?>/images/event/default.webp" 
                     class="img-fluid event-img" 
                     alt="Default Event Image" 
                     loading="lazy">
            </a>
        <?php else : ?>
            <img src="<?php echo get_template_directory_uri(); ?>/images/event/default.webp" 
                 class="img-fluid event-img" 
                 alt="Default Event Image" 
                 loading="lazy">
        <?php endif; ?>
    <?php endif; ?>
</div>

                    <div class="col-md-9 col-7">
                        <main>
                            <div class="event_info">
                                <?php if ($category && !is_wp_error($category)) : ?>
    <?php 
    $cat_name = $category[0]->name;

    if ($cat_name === 'AIDA Hosted') : ?>
        <p class="tag">AIDA Co-Hosting</p>
    <?php else : ?>
        <p class="tag"><?php echo esc_html($cat_name); ?></p>
    <?php endif; ?>
<?php endif; ?>

                                <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                                <p><?php echo esc_html($date_display); ?></p>
                            </div>

                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/event/arrow.svg" alt="arrow">
                            </a>
                        </main>
                    </div>
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

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>