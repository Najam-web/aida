<?php get_header(); ?>
<section class="about_sec">
    <div class="row">
        <div class="col-md-3">
            <div class="sidebar-left">
                <ul class="group_option">
                    <li>
                        <a href="<?php echo esc_url(site_url('/upcoming-events/')); ?>">
                            Events <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon">
                        </a>
                        <ul>
                            <li>
                                <ul>
                                    <li>
                                        <a href="<?php echo esc_url(site_url('/upcoming-events/')); ?>">
                                            Upcoming events <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="tab4">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo esc_url(site_url('/past-events/')); ?>">
                                            Past Events <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="tab4">
                                        </a>
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
                    <li><a href="<?php echo esc_url(site_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/about/home.svg" alt="home"></a></li>
                    <li><a href="<?php echo esc_url(site_url('/upcoming-events/')); ?>"> Events</a> </li>
                    <li><?php the_title(); ?></li>
                </ul>
            </div>

            <div class="container-fluid sec-padd event-detail">
                <div class="col-md-12">
                   <section class="sec-padd-b">
    <?php 
    // Get ACF external link field
    $external_link = get_field('external_link');

    // Featured image or fallback
    if (has_post_thumbnail()) {
        $image_html = get_the_post_thumbnail(get_the_ID(), 'full', [
            'alt'     => get_the_title(),
            'loading' => 'lazy',
            'class'   => 'event-featured-img'
        ]);
    } else {
        $image_html = '<img src="' . get_template_directory_uri() . '/images/event/default.webp" 
                          alt="Default Event Image" 
                          loading="lazy" 
                          class="event-featured-img">';
    }

    // Wrap image with external link if exists
    if ($external_link) {
        echo '<a href="' . esc_url($external_link) . '" target="_blank" rel="noopener">' . $image_html . '</a>';
    } else {
        echo $image_html;
    }

    // Event category (optional)
    $categories = get_the_terms(get_the_ID(), 'event_category');
    if ($categories && !is_wp_error($categories)) {
        echo '<p class="label_yellow">' . esc_html($categories[0]->name) . '</p>';
    }

    // ACF fields for start and end date
    $start_date = get_field('start_date'); 
    $end_date   = get_field('end_date');
    $location   = get_field('location');

    // Format date
    $date_display = '';
    if ($start_date) {
        $start_ts    = strtotime($start_date);
        $start_day   = date_i18n('jS', $start_ts);
        $start_month = date_i18n('F', $start_ts);
        $start_year  = date_i18n('Y', $start_ts);

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

    <ul>
        <?php if ($date_display) : ?>
            <li><b>Date :</b> <?php echo esc_html($date_display); ?></li>
        <?php endif; ?>
        <?php if ($location) : ?>
            <li><b>Location :</b> <?php echo esc_html($location); ?></li>
        <?php endif; ?>
    </ul>

    <div class="event-description">
        <?php the_content(); ?>
    </div>
</section>

                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
