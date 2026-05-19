<?php
   /**
   * Template Name: Registration
   */
  get_header(); ?>

    <section class="sec-padd black_p aos-init" data-aos="fade-right" data-aos-duration="2000">
        <div class="container-fluid">
            <div class="row g-md-5 g-4">
                <div class="col-md-6"><?php the_field('left_section'); ?></div>
                <div class="col-md-6"><?php the_field('right_section'); ?></div>
            </div>
        </div>
    </section>
    <section class="sec-padd light_bg team_width">
    <div class="container-fluid">

        <h2 class="heading-c text-center after-border">Our Speakers</h2>

        <div class="swiper slider4 pt-4 space_b mt-md-5"
             data-aos="zoom-in-left"
             data-aos-duration="2000">

            <div class="swiper-wrapper">

                <?php
                $args = array(
                    'post_type'      => 'speaker',
                    'posts_per_page' => -1,
                    'post_status'    => 'publish',
                    
                    'order'          => 'ASC',
                );

                $key_people = new WP_Query($args);

                if ($key_people->have_posts()) :
                    while ($key_people->have_posts()) :
                        $key_people->the_post();
                ?>

                    <div class="swiper-slide">
                        <div class="team_card shadow-none">
                            <div class="team-info">

                                <a href="<?php the_permalink(); ?>">

                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('medium', array(
                                            'loading' => 'lazy',
                                            'class'   => 'img-fluid'
                                        )); ?>
                                    <?php endif; ?>

                                    <h2><?php the_title(); ?></h2>
                                </a>

                                <?php
                                $designation = get_field('designation');
                                if (!empty($designation)) :
                                ?>
                                    <p><b><?php echo esc_html($designation); ?></b></p>
								
                                <?php endif; ?>
								<?php
                                $company = get_field('company');
                                if (!empty($company)) :
                                ?>
                               <p><b><?php echo esc_html($company); ?></b></p>
								<?php endif; ?>
                            </div>
                        </div>
                    </div>

                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>

            </div>
            <style>
                .swiper-slide .team-info img {
    border: 2px solid #ec232a;
    border-radius: 10px;
}

            </style>

            <div class="swiper-pagination color_pagi"></div>
        </div>

    </div>
</section>
<script>
document.addEventListener('DOMContentLoaded', function () {
    new Swiper('.slider4', {
        slidesPerView: 4,
        spaceBetween: 30,
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 4,
            },
        },
    });
});
</script>


    <section class="sec-padd arrow_outer">
        <div class="container-fluid">
            <h2 class="heading-c after-border text-center mb-5 aos-init" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="2000">Supporting organizations & Sponsors</h2>
            <div class="row g-4 pt-4">
                <div class="swiper slider04 pb-4 swiper-initialized swiper-horizontal swiper-backface-hidden">
                     
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
            'taxonomy' => 'member_category',
            'field'    => 'slug',
            'terms'    => 'supporting-organizations',
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
        
        $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
        if ($image_url): ?>
            <div class="swiper-slide">
                <div class="logo-div">
                    <a href="<?php echo esc_url($link); ?>" target="_blank">
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>">
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
    <section class="sec-padd-b">
        <div class="container">
            <div class="row g-md-5 g-4">
                <div class="col-md-8 mx-auto">
                    <div class="form_main form_p">
                      
                        <div class="col-md-12">
                            <?php echo do_shortcode(' [contact-form-7 id="d83548b" title="Register Now"]'); ?>
                           
                        </div>
                    </div>
<!--                     <div class="row row-4 pt-4">
                        <div class="mt-5 pt-3 text-center">
                            <a class="c_btn yellow_btn aos-init" data-aos="flip-down" href="#"><span>Download Registration
                                    Form</span></a>
                        </div>
                    </div> -->
<!--                     <div class="form_main less_space">
                        <div class="bank_info">
                            <div class="img_x">
                                <img src="https://aida-india.org/wp-content/uploads/2025/12/icon-bank.svg" alt="bank">
                            </div>
                            <div class="bank_detail">
                                <h4>Bank Account Details For Payment</h4>
                                <p><b>Bank Name :</b> HDFC Bank</p>
                                <p><b>Account Holder :</b> All India Discoms Association</p>
                                <p><b>Account Number :</b> 50100817589337</p>

                                <p><b>IFSC Code :</b> HDFC0004711</p>
                            </div>

                        </div>

                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <?php get_footer(); ?>