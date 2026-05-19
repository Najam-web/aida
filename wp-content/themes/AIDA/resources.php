<?php
   /**
   * Template Name: Resources
   */
   ?>
<?php get_header(); ?>
<?php
$page_id = get_queried_object_id();
$background_url = get_field('resources_banner_image', $page_id);
?>
<section class="inner_banner" style="background-image: url('<?php echo esc_url($background_url); ?>');">
    <div class="container-fluid">
        <div class="banner-text">
            <div class="col-md-6">
                <h1><?php single_post_title(); ?></h1>
                <p><?php the_field('resources_banner_content', $page_id); ?></p>
            </div>
        </div>
    </div>
</section>
<section class="about_sec">
    <div class="row">
        <div class="col-md-3">
<?php get_template_part('resources-sidebar'); ?>
        </div>

        <div class="col-md-9">

            <div class="bit-cram">

                <ul>

                    <li><a href="<?php echo get_site_url(); ?>"><img
                                src="<?php echo get_template_directory_uri(); ?>/images/about/home.svg" alt="home"></a>
                    </li>

                    <li> Resources </li>

                </ul>

            </div>



            <div class="container-fluid sec-padd">

                <div class="row g-md-5 g-4">

                    <div class="commited_sec event_sec">

                        <div class="row g-md-5 g-4">
                            <?php
$terms = get_terms([
    'taxonomy'   => 'resources-category',
    'hide_empty' => false,
    'meta_key'   => 'category_order',
    'orderby'    => 'meta_value_num',
    'order'      => 'ASC',
    'meta_query' => [
        [
            'key'     => 'category_order',
            'value'   => 0,
            'compare' => '>',
            'type'    => 'NUMERIC',
        ]
    ],
]);

if (!empty($terms) && !is_wp_error($terms)) :
    foreach ($terms as $term) :

        // ACF fields
        $icon        = get_field('resources_icon_image', $term);
        $custom_link = get_field('resource_category_url', $term);

        $icon_url = !empty($icon['url']) ? $icon['url'] : '';
        $icon_alt = !empty($icon['alt']) ? $icon['alt'] : $term->name;

        if (is_array($custom_link)) {
            $custom_url    = $custom_link['url'] ?? '';
            $custom_target = $custom_link['target'] ?? '_self';
        } else {
            $custom_url    = $custom_link;
            $custom_target = '_self';
        }

        $final_link  = !empty($custom_url) ? $custom_url : get_term_link($term);
        $link_target = !empty($custom_url) ? $custom_target : '_self';
?>
                            <div class="col-md-6">
                                <a href="<?php echo esc_url($final_link); ?>"
                                    target="<?php echo esc_attr($link_target); ?>" class="text-decoration-none">

                                    <div class="card-box d-flex align-items-center gap-3">
                                        <?php if ($icon_url) : ?>
                                        <div class="card-icon">
                                            <img src="<?php echo esc_url($icon_url); ?>"
                                                alt="<?php echo esc_attr($icon_alt); ?>" loading="lazy">
                                        </div>
                                        <?php endif; ?>

                                        <h5 class="mb-0"><?php echo esc_html($term->name); ?></h5>
                                    </div>

                                </a>
                            </div>
                            <?php
    endforeach;
endif;
?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<?php get_footer(); ?>