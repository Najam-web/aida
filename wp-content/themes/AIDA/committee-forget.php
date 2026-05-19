<?php
/**
 * Template Name: Committee Forget
 */
?>
<?php get_header(); ?>

<section class="about_sec">
    <div class="row">
        <div class="col-md-3">
            <div class="sidebar-left">
                <ul class="group_option">
                    <li>
                        <a href="<?php echo esc_url(site_url('/committees/')) ?>">Committees 
                            <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon">
                        </a>
                        <ul>
                            <li>
                                <ul>
                                    <?php
                                    $terms = get_terms(array(
                                        'taxonomy' => 'committees-category',
                                        'hide_empty' => false,
                                        'orderby' => 'name',
                                        'order' => 'ASC',
                                    ));

                                    if (!empty($terms) && !is_wp_error($terms)) {
                                        foreach ($terms as $term) {
                                            $term_link = get_term_link($term);
                                            $active_class = (is_tax('committees-category', $term->slug)) ? 'active' : '';
                                            echo '<li>
                                                    <a href="' . esc_url($term_link) . '" class="' . $active_class . '">
                                                        ' . esc_html($term->name) . '
                                                        <img src="' . get_template_directory_uri() . '/images/about/arrow-right.svg" alt="' . esc_attr($term->name) . '">
                                                    </a>
                                                </li>';
                                        }
                                    }
                                    ?>
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
                    <li><a href="<?php echo esc_url(site_url('/')) ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/about/home.svg" alt="home"></a></li>
                    <li><a href="<?php echo esc_url(site_url('/committees/')) ?>">Committees</a></li>
                    <li>Forgot Password</li> <!-- Fixed breadcrumb -->
                </ul>
            </div>

            <div class="container-fluid sec-padd">
                <div class="row g-md-5 g-4">
                    <div class="form_main mt-5 btn_auto_form">
                        <div class="row g-md-5 g-4">
                            <div class="col-md-12">
                                <h4>Forgot Password</h4> <!-- Fixed heading -->

                                <div class="row g-md-5 g-4">
                                    <div class="col-md-6">
                                        <?php echo do_shortcode('[cms_forgot_password]'); ?>

                                        <div class="info_div mt-4">
                                            <h5>Please contact Admin, If you can't login.</h5>
                                            <ul>
                                                <li>Email: info@aida-india.org</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/committees/login.webp" alt="login image">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- REGISTER BUTTON PARALLEL TO LOGIN STYLE -->
                <section class="sec-padd-t">
                    <div class="row g-md-5 g-4">
                        <div class="col-md-12">
                            <div class="login_main register_main" style="background: url(<?php echo get_template_directory_uri(); ?>/images/committees/register-bg.png) center center / cover no-repeat;">
                                <a href="https://aida-india.org/committee-registration/">
                                    <main>
                                        <div>
                                            <h3>Register</h3>
                                            <p>To Become Committee Member</p>
                                        </div>
                                        <div class="login_icon">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/committees/register.svg" alt="Register">
                                        </div>
                                    </main>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
