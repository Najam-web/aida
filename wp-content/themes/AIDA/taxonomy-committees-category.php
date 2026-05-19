<?php get_header(); ?>

<?php
$term = get_queried_object();
$image = get_field('committees_banner_image', $term); // ACF field
$designation = get_field('comm_short_summary', $term);
?>

<section class="inner_banner" style="background-image: url('<?php echo esc_url($image['url'] ?? get_template_directory_uri() . '/images/committees/committed-banner.webp'); ?>');">
    <div class="container-fluid">
        <div class="banner-text">
            <div class="col-md-6">
                <h1><?php echo $term->name; ?></h1>
            </div>
        </div>
    </div>
</section>

<section class="about_sec">
    <div class="row">
        <div class="col-md-3">
            <div class="sidebar-left">
                <ul class="group_option">
                    <li>
                        <a href="<?php echo esc_url(site_url('/')) ?>committees/">Committees <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon"></a>
                        <ul>
                            <li>
                                <ul>
                                    <?php
                                    // Get only parent terms in the 'committees-category' taxonomy
                                    $terms = get_terms(array(
                                        'taxonomy'   => 'committees-category',
                                        'hide_empty' => false,
                                        'orderby'    => 'name',
                                        'order'      => 'ASC',
                                        'parent'     => 0, // ✅ fetch only parent categories
                                    ));

                                    if (!empty($terms) && !is_wp_error($terms)) {
                                        echo '<ul class="committees-list">';
                                        foreach ($terms as $term) {
                                            $term_link = get_term_link($term);

                                            if (is_wp_error($term_link)) {
                                                continue;
                                            }

                                            $is_active    = is_tax('committees-category', $term->slug);
                                            $active_class = $is_active ? 'active' : '';
                                            $aria_current = $is_active ? ' aria-current="page"' : '';

                                            echo '<li>
            <a href="' . esc_url($term_link) . '" class="' . esc_attr($active_class) . '"' . $aria_current . '>
                ' . esc_html($term->name) . '
                <img src="' . esc_url(get_template_directory_uri() . '/images/about/arrow-right.svg') . '" alt="' . esc_attr($term->name) . '">
            </a>
        </li>';
                                        }
                                        echo '</ul>';
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
                    <li><a href="/"><img src="<?php echo get_template_directory_uri(); ?>/images/about/home.svg" alt="home"></a></li>
                    <li> Committees </li>
                </ul>
            </div>

            <div class="container-fluid sec-padd comm_sec comm_detail">
                <div class="row g-md-5 g-4">
                    <div class="commi_login">
                        <div class="commi_div">
                            <div class="comm_img">
                                <?php
                                $term = get_queried_object();
                                $profile_image = get_field('committees_icon_image', 'term_' . $term->term_id);

                                // Handle different return types
                                if (is_array($profile_image) && isset($profile_image['url'])) {
                                    $image_url = $profile_image['url'];
                                } elseif (is_numeric($profile_image)) {
                                    $image_url = wp_get_attachment_url($profile_image);
                                } elseif (is_string($profile_image) && filter_var($profile_image, FILTER_VALIDATE_URL)) {
                                    $image_url = $profile_image;
                                } else {
                                    $image_url = '<?php echo esc_url(site_url(' / '))?>wp-content/themes/AIDA/images/default-user.png';
                                }
                                ?>
                                <img src="<?php echo esc_url($image_url); ?>" alt="Policy Icon" />


                            </div>
                            <div>
                                <h5><?php single_cat_title(); ?></h5>
                            </div>
                        </div>
                        <div class="comm_a_login">
                            <a class="btn btn_blue rounded-btn" href="<?php echo esc_url(site_url('/')) ?>login/"> Login <img src="<?php echo get_template_directory_uri(); ?>/images/committees/login.svg" alt="login"></a>
                        </div>
                    </div>
                    <div class="col-md-12 ">
                        <p><?php echo $designation; ?></p>
                    </div>
                </div>
                <div class="sec-padd-t">
                    <div class="col-md-12">
                        <h2 class="heading-c  after-border">List of the Members</h2>
                    </div>
                </div>
                <?php
                // Get current parent term ID
                $parent_id   = get_queried_object_id();
                $parent_term = get_term($parent_id, 'committees-category');

                // Build Convenor child slug (e.g. parent-slug-convenor)
                $parent_slug   = $parent_term->slug;
                $convenor_slug = $parent_slug . '-convenor';

                // Get the Convenor child term
                $convenor_term = get_term_by('slug', $convenor_slug, 'committees-category');

                if ($convenor_term) {

                    // Query members only in Convenor child category
                    $args = array(
                        'post_type'      => 'committees-member',
                        'posts_per_page' => -1,
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'committees-category',
                                'field'    => 'term_id',
                                'terms'    => $convenor_term->term_id,
                            ),
                        ),
                    );
                    $members = new WP_Query($args);

                    if ($members->have_posts()) :
                        // Static heading
                        echo '<div class="col-12 sec-padd-t"><h5 class="mb-5">Convenor</h5></div>';

                        while ($members->have_posts()) : $members->the_post();
                            $detail = get_field('committee');
                            $cbt    = get_field('committee_button_text');
                            $cbu    = get_field('committee_button_url');
                ?>
                            <div class="col-md-4 col-sm-6">
                                <div class="blue_main">
                                    <div class="blue_card">
                                        <div class="strip-info">
                                            <h3><?php the_title(); ?></h3>
                                            <?php echo $detail; ?>
                                            <!--<?php if ($cbt && $cbu) : ?>-->
                                            <!--    <div class="text-center mt-1">-->
                                            <!--        <a href="<?php echo esc_url($cbu); ?>" class="btn btn-primary">-->
                                            <!--            <?php echo esc_html($cbt); ?>-->
                                            <!--        </a>-->
                                            <!--    </div>-->
                                            <!--<?php endif; ?>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                <?php
                        endwhile;
                        wp_reset_postdata();

                    else :
                        // No Convenor found
                        echo '<div class="col-12"><h5>Convenor</h5><p>No committee members found in Convenor category.</p></div>';
                    endif;
                }
                ?>



                <section class="pt-0">
                    <div class="row g-md-5 g-4">
                        <div class="col-md-12">

                        </div>
                        <?php
                        $parent = get_queried_object();
                        $parent_slug = $parent->slug;

                        // Define the child slugs relative to parent
                        $child_slugs = array(
                            $parent_slug . '-member',
                            $parent_slug . '-special-invitee'
                        );

                        foreach ($child_slugs as $slug) {
                            $term = get_term_by('slug', $slug, 'committees-category');

                            if ($term && $term->parent == $parent->term_id) {
                                // Query members in this child term
                                $args = array(
                                    'post_type'      => 'committees-member',
                                    'posts_per_page' => -1,
                                    'tax_query'      => array(
                                        array(
                                            'taxonomy' => 'committees-category',
                                            'field'    => 'term_id',
                                            'terms'    => $term->term_id,
                                        ),
                                    ),
                                );
                                $query = new WP_Query($args);

                                if ($query->have_posts()) :
                                    // Show static heading based on suffix
                                    if (str_ends_with($slug, '-member')) {
                                        echo '<div class="col-12"><h5>Member</h5></div>';
                                    } elseif (str_ends_with($slug, '-special-invitee')) {
                                        echo '<div class="col-12"><h5 class="pt-5">Special Invitee</h5></div>';
                                    }

                                    while ($query->have_posts()) : $query->the_post();
                                        $detail = get_field('committee');
                                        $cbt    = get_field('committee_button_text');
                                        $cbu    = get_field('committee_button_url');
                        ?>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="blue_main">
                                                <div class="blue_card">
                                                    <div class="strip-info">
                                                        <h3><?php the_title(); ?></h3>
                                                        <?php echo $detail; ?>
                                                        <!--<?php if ($cbt && $cbu) : ?>-->
                                                        <!--    <div class="text-center mt-1">-->
                                                        <!--        <a href="<?php echo esc_url($cbu); ?>" class="btn btn-primary">-->
                                                        <!--            <?php echo esc_html($cbt); ?>-->
                                                        <!--        </a>-->
                                                        <!--    </div>-->
                                                        <!--<?php endif; ?>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                        <?php
                                    endwhile;
                                    wp_reset_postdata();

                                endif;
                            }
                        }
                        ?>

                    </div>

                </section>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>