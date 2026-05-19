<?php get_header(); ?>

    <section class="about_sec">

        <div class="row">

            <div class="col-md-3">

 <div class="sidebar-left">
                    <ul class="group_option">
                        <li>
                            <a href="<?php echo esc_url(site_url('/'))?>media/">Media <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon"></a>
                            <ul>
                                <li>
                                    <ul>
                                        <li>
                                            <a href="<?php echo esc_url(site_url('/'))?>latest-news/" class="active">
                                                News<img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="tab4"></a>
                                        </li>
                                        <li>
                                            <a href="#">Videos <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="tab4"></a>
                                        </li>
                                        <li>
                                            <a href="#">Images<img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="tab4"></a>
                                        </li>
                                        <li>
                                            <a href="#">Media Releases<img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg"
                                                    alt="tab4"></a>
                                        </li>
                                        <li>
                                            <a href="#">Media Enquiries<img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg"
                                                    alt="tab4"></a>
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

                        <li><a href="<?php echo esc_url(site_url('/'))?>media/"> Media</a> </li>

                        <li><a href="<?php echo esc_url(site_url('/'))?>latest-news/">News</a> </li>

                        <li><?php the_title(); ?></li>



                    </ul>

                </div>



                <div class="container-fluid sec-padd news_details">





                    <div class="row g-md-5 g-4">
    <div class="col-md-12">

        <!-- News Title -->
        <h2><?php the_title(); ?></h2>

        <!-- Featured Image -->
        <div class="news-img">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('large', ['alt' => get_the_title()]); ?>
            <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/images/media/newsd.webp" alt="">
            <?php endif; ?>
        </div>

        <!-- Meta & Share -->
        <div class="under_new">
            <div class="tag_date">
                <!--<span class="tag">NEWS</span>-->
                <span><?php echo get_the_date('M d Y'); ?></span>
            </div>
           <?php
$share_url   = urlencode( get_permalink() );
$share_title = urlencode( get_the_title() );
?>

<div class="share_tag">
    <h4>SHARE</h4>

    <!-- Twitter / X -->
    <a href="https://twitter.com/intent/tweet?url=<?php echo $share_url; ?>&text=<?php echo $share_title; ?>"
       target="_blank" rel="noopener noreferrer">
        <img src="<?php echo get_template_directory_uri(); ?>/images/media/twitter.svg" alt="twitter">
    </a>

    <!-- LinkedIn -->
    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $share_url; ?>"
       target="_blank" rel="noopener noreferrer">
        <img src="<?php echo get_template_directory_uri(); ?>/images/media/linkedin.svg" alt="linkedin">
    </a>
</div>
        </div>
        <!-- News Content -->
        <div class="news-content">
            <?php the_content(); ?>
        </div>

    </div>
                    <div class="row g-4">
                       <a href="<?php echo esc_url( wp_get_referer() ? wp_get_referer() : site_url('/news/') ); ?>" 
   class="back_btn">
    <img src="<?php echo get_template_directory_uri(); ?>/images/arrow.svg" alt="arrow"> 
    Back to Articles
</a>

                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>