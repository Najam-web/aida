<?php

/**
 * Template Name: Latest News
 */
?>
<?php get_header(); ?>

<section class="about_sec">
    <div class="row">
        <div class="col-md-3">
            <div class="sidebar-left">
                <ul class="group_option">
                    <li>
                        <a href="/media">Media <img
                                src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon"></a>
                        <ul>
                            <li>
                                <ul>
                                    <li>
                                        <a href="<?php echo esc_url(site_url('/')) ?>latest-news/" class="active">
                                            News<img
                                                src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg"
                                                alt="tab4"></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo esc_url(site_url('/')) ?>videos/">Videos <img
                                                src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg"
                                                alt="tab4"></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo esc_url(site_url('/')) ?>images/">Images<img
                                                src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg"
                                                alt="tab4"></a>
                                    </li>
                                    <li>
                                        <a href="https://aida-india.org/nletter/">Newsletter
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg"
                                                alt="tab4">
                                        </a>
                                    </li>
                                    <!--<li>-->
                                    <!--    <a href="#">Media Releases<img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg"-->
                                    <!--            alt="tab4"></a>-->
                                    <!--</li>-->
                                    <!--<li>-->
                                    <!--    <a href="#">Media Enquiries<img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg"-->
                                    <!--            alt="tab4"></a>-->
                                    <!--</li>-->
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
                    <li><a href="<?php echo esc_url(site_url('/')) ?>"><img
                                src="<?php echo get_template_directory_uri(); ?>/images/about/home.svg" alt="home"></a>
                    </li>
                    <li><a href="/media"> Media</a> </li>
                    <li>News </li>
                </ul>
            </div>
            <div class="container-fluid sec-padd">
                <div class="row g-md-5 g-4">
                    <div class="col-md-12">
                        <h2 class="heading-c after-border mb-4 aos-init aos-animate" data-aos="fade-up"
                            data-aos-anchor-placement="top-bottom" data-aos-duration="2000"> Latest News
                        </h2>
                    </div>
                    <div class="row g-md-5 g-4 ">
                        <?php
                        $args = array(
                            'post_type' => 'news',
                            'posts_per_page' => -1,
                            'date_query' => array(
                                array(
                                    'after' => '2 month ago',
                                ),
                            ),
                        );
                        $news_query = new WP_Query($args);
                        if ($news_query->have_posts()) :
                            while ($news_query->have_posts()) : $news_query->the_post();
                                $news_date = get_the_date('F d Y');
                                $news_terms = get_the_terms(get_the_ID(), 'news_category');
                        ?>
                        <div class="col-md-4">
                            <div class="news-card">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium', ['alt' => get_the_title()]); ?>
                                    <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/news/default.webp"
                                        alt="News">
                                    <?php endif; ?>
                                </a>
                                <div class="new-content">

                                    <a href="<?php the_permalink(); ?>">
                                        <h2><?php the_title(); ?></h2>
                                    </a>
                                    <div class="news_info">
                                        <p>
                                            <?php
                                                    if (!empty($news_terms)) : ?>
                                            <!--<span><?php echo esc_html($news_terms[0]->name); ?></span>-->
                                            <?php endif; ?>
                                            <span><?php echo esc_html($news_date); ?></span>
                                        </p>
                                    </div>
                                    <p><?php echo wp_trim_words(get_the_excerpt(), 30); ?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>