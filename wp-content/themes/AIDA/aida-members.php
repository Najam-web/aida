<?php
   /**
   * Template Name: AIDA Members
   */
   ?>
    <?php get_header(); ?>
   <section class="about_sec">
        <div class="row">
            <div class="col-md-3">
                    <div class="sidebar-left">
                      <ul class="group_option">
                        <li>
                            <a href="<?php echo esc_url(site_url('/'))?>contact-us/" class="activ_tab">Contact Us
                                <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon"></a>
                            <ul class="group_option">
                                <li>

                                    <ul class="group_option">
                                        <li><a href="<?php echo esc_url(site_url('/'))?>aida-secretariat/">AIDA Secretariat <img
                                                    src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="icon"></a>
                                        </li>
                                        <li><a href="<?php echo esc_url(site_url('/'))?>aida-members/" class="activ_tab">AIDA Members <img
                                                    src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="icon"></a></li>
                                        <!--<li><a target="_blank" href="<?php echo esc_url(site_url('/'))?>wp-content/uploads/2025/08/Vacancy-Circular-1.pdf">Work With-->
                                        <!--        Us <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="icon"></a></li>-->
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
                        <li> <?php single_post_title(); ?> </li>
                    </ul>
                </div>
                <div class="container-fluid sec-padd event_sec">
                    <div class="tab-pane fade show active" id="v-pills-Vision" role="tabpanel"
                        aria-labelledby="v-pills-Vision-tab" tabindex="0">
                        <div class="col-md-12">
                            <h2 class="heading-c after-border mb-5 aos-init aos-animate" data-aos="fade-up"
                                data-aos-anchor-placement="top-bottom" data-aos-duration="2000"><?php single_post_title(); ?></h2>

                        </div>
                        <div class="row g-md-5 g-4 pt-5">


                            <div class="col-md-12">
                                <div class="table-responsive table_member">
                                   <table class="table table-bordered">
    <thead>
        <tr>
            <th>S.N.</th>
            <th>Name of Member</th>
            <th>E-mail</th>
            <th>Address</th>
            <th>Logo</th>
        </tr>
    </thead>
    <tbody>
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
        $members = new WP_Query($args);
        if ($members->have_posts()):
            $sn = 1;
            while ($members->have_posts()): $members->the_post();
                $email = get_field('e-mail');
                $address = get_field('address');
                $link = get_field('link');
                $logo = get_the_post_thumbnail_url(get_the_ID(), 'medium');
        ?>
        <tr>
            <td><?php echo $sn++; ?></td>
            <td>
                <?php if ($link): ?>
                    <a href="<?php echo esc_url($link); ?>" target="_blank"><?php the_title(); ?></a>
                <?php else: ?>
                    <?php the_title(); ?>
                <?php endif; ?>
            </td>
            <td>
                <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
            </td>
            <td><?php echo wp_kses_post($address); ?></td>
            <td>
                <?php if ($logo): ?>
                    <div class="flex_logo">
                        <a href="<?php echo esc_url($link); ?>" target="_blank">
                            <img src="<?php echo esc_url($logo); ?>" alt="<?php the_title_attribute(); ?>" />
                        </a>
                    </div>
                <?php endif; ?>
            </td>
        </tr>
        <?php endwhile; wp_reset_postdata(); else: ?>
        <tr><td colspan="5">No members found.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>

    <?php get_footer(); ?>