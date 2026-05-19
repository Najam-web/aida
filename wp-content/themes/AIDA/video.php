<?php
   /**
   * Template Name: Video
   */
   ?>
<?php get_header(); ?>
<section class="about_sec">
    <div class="row">
        <div class="col-md-3">
            <div class="sidebar-left">
                <ul class="group_option">
                    <li>
                        <a href="<?php echo esc_url(site_url('/'))?>media/">
                            Media
                            <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon">
                        </a>
                        <ul>
                            <li>
                                <ul>
                                    <li>
                                        <a href="<?php echo esc_url(site_url('/'))?>latest-news/">
                                            News
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg"
                                                alt="tab4">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo esc_url(site_url('/'))?>videos/" class="active">Videos
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg"
                                                alt="tab4">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo esc_url(site_url('/'))?>images/">Images
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg"
                                                alt="tab4">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://aida-india.org/nletter/">Newsletter
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg"
                                                alt="tab4">
                                        </a>
                                    </li>
                                    <!--<li>-->
                                    <!--    <a href="#">Media Releases-->
                                    <!--        <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="tab4">-->
                                    <!--    </a>-->
                                    <!--</li>-->
                                    <!--<li>-->
                                    <!--    <a href="#">Media Enquiries-->
                                    <!--        <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="tab4">-->
                                    <!--    </a>-->
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
                    <li><a href="<?php echo esc_url(site_url('/'))?>"><img
                                src="<?php echo get_template_directory_uri(); ?>/images/about/home.svg" alt="home"></a>
                    </li>
                    <li><a href="/media"> Media</a></li>
                </ul>
            </div>

            <div class="container-fluid sec-padd">
                <div class="row g-md-5 g-4">

                    <div class="col-6 col-md-4">
                        <img src="https://aida-india.org/wp-content/uploads/2025/09/vedio1.webp"
                            class="img-fluid rounded gallery-thumb" data-index="1" alt="Video 1">
                    </div>
                    <div class="col-6 col-md-4">
                        <img src="https://aida-india.org/wp-content/uploads/2025/09/vedio2.webp"
                            class="img-fluid rounded gallery-thumb" data-index="2" alt="Video 2">
                    </div>

                </div>

                <!-- modal start -->
                <div class="modal fade" id="galleryModal" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                        <div class="modal-content">

                            <!-- Close button -->
                            <button type="button" class="btn-close-modal" id="closeModalBtn">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>

                            <div class="modal-body p-0">
                                <div class="swiper mySwiper swiper-initialized swiper-horizontal">
                                    <div class="swiper-wrapper" id="swiper-wrapper-20579d11141e1e13" aria-live="polite"
                                        style="transition-duration: 0ms; transition-delay: 0ms;">
                                        <!-- Images -->
                                        <div class="swiper-slide">
                                            <video controls="">
                                                <source
                                                    src="https://aida-india.org/wp-content/uploads/2025/09/vedio1-1.mp4"
                                                    type="video/mp4">
                                            </video>
                                        </div>
                                        <div class="swiper-slide">
                                            <video controls="">
                                                <source
                                                    src="https://aida-india.org/wp-content/uploads/2025/09/vedio2.mp4"
                                                    type="video/mp4">
                                            </video>
                                        </div>




                                    </div>
                                    <!-- Navigation -->
                                    <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"
                                        aria-controls="swiper-wrapper-20579d11141e1e13" aria-disabled="false"></div>
                                    <div class="swiper-button-prev" tabindex="0" role="button"
                                        aria-label="Previous slide" aria-controls="swiper-wrapper-20579d11141e1e13"
                                        aria-disabled="false"></div>
                                    <div
                                        class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal">
                                    </div>
                                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal end  -->

            </div>

        </div>
    </div>
</section>


<?php get_footer(); ?>