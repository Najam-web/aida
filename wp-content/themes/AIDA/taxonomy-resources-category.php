<?php
get_header();

$term = get_queried_object();

// ACF fields
$banner_image = get_field('resources_banner_image', $term);
$short_summary = get_field('resources_short_summary', $term);
$icon_image = get_field('resources_icon_image', $term);
$other_content = get_field('other_content', $term);

$banner_url = $banner_image['url'] ?? get_template_directory_uri() . '/images/committees/committed-banner.webp';
$icon_url = $icon_image['url'] ?? get_template_directory_uri() . '/images/resources/icon1.svg';
?>

<!-- Banner -->
<section class="inner_banner" style="background-image: url('<?php echo esc_url($banner_url); ?>');">
    <div class="container-fluid">
        <div class="banner-text">
            <div class="col-md-6">
                <h1><?php echo esc_html($term->name); ?></h1>
                <p><?php echo esc_html($term->description); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Main Section -->
<section class="about_sec">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <?php get_template_part('resources-sidebar'); ?>
        </div>

        <!-- Content -->
        <div class="col-md-9">
            <div class="bit-cram">
                <ul>
                    <li><a href="<?php echo esc_url(site_url('/'))?>"><img src="<?php echo get_template_directory_uri(); ?>/images/about/home.svg" alt="home"></a></li>
                    <li><a href="<?php echo esc_url(site_url('/'))?>resource/">Resources</a></li>
                    <li><?php echo esc_html($term->name); ?></li>
                </ul>
            </div>

            <div class="container-fluid sec-padd">
               <?php if (empty($other_content)) : ?>
<div class="row g-md-5 g-4">
    <div class="commi_div">
        <div class="comm_img" style="background: #F7A209;">
            <img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($term->name); ?> Icon">
        </div>
        <div>
            <h5><?php echo esc_html($term->name); ?></h5>
        </div>
    </div>

    <div class="col-md-12">
        <?php if ($short_summary): ?>
            <div class="short-summary">
                <?php echo wp_kses_post($short_summary); ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>


                <!-- Posts Loop -->
                <section class="sec-padd-t committ_sec">
                    <div class="row g-md-5 g-4">
                        <?php
                        $args = array(
                            'post_type' => 'resources',
                            'posts_per_page' => -1,
                            'order' => 'ASC',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'resources-category',
                                    'field' => 'term_id',
                                    'terms' => $term->term_id,
                                ),
                            ),
                        );

                        $query = new WP_Query($args);

                        if ($query->have_posts()) :
                            while ($query->have_posts()) : $query->the_post();
                                $resource_icon = get_field('icon_url');
                                $resource_icon_url = $resource_icon ?: get_template_directory_uri() . '/images/resources/icon1.svg';

                                $description = get_field('committee_text');
                                $download_url = get_field('download_url');
                                $download_text = get_field('resources_download_text') ?: 'Download';
                        ?>
                                <div class="col-md-4 col-sm-6">
                                    <div class="blue_main">
                                        <div class="blue_card">
                                            <div class="strip-info">
                                                <div class="card-icon">
                                                    <img src="<?php echo esc_url($resource_icon_url); ?>" alt="<?php the_title_attribute(); ?> Icon">
                                                </div>
                                                <h3><?php the_title(); ?></h3>
                                                <p><?php echo esc_html($description); ?></p>
                                                <?php if ($download_url): ?>
                                                    <a href="<?php echo esc_url($download_url); ?>" class="btn btn_blue rounded-btn">
                                                        <?php echo esc_html($download_text); ?>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        else :
                            echo '<p></p>';
                        endif;
                        ?>
                    </div>

                    <!-- Other Content -->
                    <?php if ($other_content): ?>
                        <div class="row g-md-5 g-4">
                            
                                <?php echo $other_content; ?>
                            
                        </div>
                    <?php endif; ?>
                </section>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
