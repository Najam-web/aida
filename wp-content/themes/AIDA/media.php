<?php

/**
 * Template Name: Media
 */
?>
<?php get_header(); ?>
<section class="about_sec">
    <div class="row">
        <div class="col-md-3">
            <?php get_template_part('media-sidebar'); ?>
        </div>

        <div class="col-md-9">
            <div class="bit-cram">
                <ul>
                    <li><a href="<?php echo esc_url(site_url('/')) ?>"><img
                                src="<?php echo get_template_directory_uri(); ?>/images/about/home.svg" alt="home"></a>
                    </li>
                    <li><a href="/media"> Media</a></li>
                </ul>
            </div>

            <div class="container-fluid sec-padd">
                <div class="row g-md-5 g-4">
                    <div class="commited_sec event_sec">
                        <div class="row g-md-5 g-4">

                            <div class="col-md-6">
                                <a href="<?php echo esc_url(site_url('/')) ?>latest-news/">
                                    <div class="card-box">
                                        <div class="card-icon">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/media/icon1.svg"
                                                alt="Policy Icon">
                                        </div>
                                        <div>
                                            <h5>News</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-6">
                                <a href="<?php echo esc_url(site_url('/')) ?>videos/">
                                    <div class="card-box">
                                        <div class="card-icon">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/media/icon2.svg"
                                                alt="Policy Icon">
                                        </div>
                                        <div>
                                            <h5>Videos</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-6">
                                <a href="<?php echo esc_url(site_url('/')) ?>images/">
                                    <div class="card-box">
                                        <div class="card-icon">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/media/icon3.svg"
                                                alt="Policy Icon">
                                        </div>
                                        <div>
                                            <h5>Images</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-6">
                                <a href="https://aida-india.org/nletter/">
                                    <div class="card-box">
                                        <div class="card-icon">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/media/icon4.svg"
                                                alt="Policy Icon">
                                        </div>
                                        <div>
                                            <h5> Newsletters</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <!--<div class="col-md-6">-->
                            <!--    <a href="#">-->
                            <!--        <div class="card-box">-->
                            <!--            <div class="card-icon">-->
                            <!--                <img src="<?php echo get_template_directory_uri(); ?>/images/media/icon5.svg" alt="Policy Icon">-->
                            <!--            </div>-->
                            <!--            <div>-->
                            <!--                <h5>Media Enquiries</h5>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    </a>-->
                            <!--</div>-->

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<?php get_footer(); ?>