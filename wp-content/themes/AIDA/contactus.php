<?php
   /**
   * Template Name: Contactus
   */
   ?>
    <?php get_header(); ?>

    <section class="about_sec">
        <div class="row">
            <div class="col-md-3">
                <div class="sidebar-left">
                      <ul class="group_option">
                        <li>
                            <a href="<?php echo esc_url(site_url('/'))?>contact-us/" class="activ_tab"><?php single_post_title(); ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon"></a>
                            <ul class="group_option">
                                <li>

                                    <ul class="group_option">
                                      
                                        <li><a href="<?php echo esc_url(site_url('/'))?>aida-members/">AIDA Members <img
                                                    src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="icon"></a></li>
                                       
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
                    <div class="commited_sec event_sec">
                        <div class="row g-md-5 g-4">

    <?php
    $box_title_1 = get_field('box_title_1');
    $box_image_1 = get_field('box_image_1');
    $box_url_1 = get_field('box_url_1');
    $box_title_2 = get_field('box_title_2');
    $box_image_2 = get_field('box_image_2');
    $box_url_2 = get_field('box_url_2');
    $cf_7 = get_field('form_shordcode');
    ?>

    <?php if ($box_title_1 && $box_image_1 && $box_url_1): ?>
        <!--<div class="col-md-6">-->
        <!--    <a href="<?php echo esc_html($box_url_1); ?>">-->
        <!--        <div class="card-box">-->
        <!--            <div class="card-icon">-->
        <!--                <img src="<?php echo esc_url($box_image_1['url']); ?>" alt="Policy Icon">-->
        <!--            </div>-->
        <!--            <div>-->
        <!--                <h5><?php echo esc_html($box_title_1); ?></h5>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </a>-->
        <!--</div>-->
    <?php endif; ?>

    <?php if ($box_title_2 && $box_image_2 && $box_url_2): ?>
        <!--<div class="col-md-6">-->
        <!--    <a href="<?php echo esc_html($box_url_2); ?>">-->
        <!--        <div class="card-box">-->
        <!--            <div class="card-icon">-->
        <!--                <img src="<?php echo esc_url($box_image_2['url']); ?>" alt="Policy Icon">-->
        <!--            </div>-->
        <!--            <div>-->
        <!--                <h5><?php echo esc_html($box_title_2); ?></h5>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </a>-->
        <!--</div>-->
    <?php endif; ?>

</div>

                    </div>

                    <div class="row g-md-5 g-4 pt-5">
                        <div class="col-md-12">
                            <div class="form_main mt-5">
                                <div class="row g-md-5 g-4">
                                    <div class="col-md-12">
                                        <h4>Submit General Enquiry</h4>
                                        <div class="col-md-12">
                                           <?php
$form_shortcode = get_field('form_shordcode');
if ($form_shortcode) {
    echo do_shortcode($form_shortcode);
}
?>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <?php get_footer(); ?>