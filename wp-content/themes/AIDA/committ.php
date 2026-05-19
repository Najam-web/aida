<?php
   /**
   * Template Name: Committees
   */
   ?>
<?php get_header(); ?>
 <section class="about_sec">
        <div class="row">
            <div class="col-md-3">
                <div class="sidebar-left">
                    <ul class="group_option">
                        <li>
                            <a href="<?php echo esc_url(site_url('/'))?>committees/">Committees <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon"></a>
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

                        <li><a href="<?php echo esc_url(site_url('/'))?>"><img src="<?php echo get_template_directory_uri(); ?>/images/about/home.svg" alt="home"></a></li>

                        <li> Committees </li>



                    </ul>

                </div>

                <div class="container-fluid sec-padd ">

                    <div class="row g-md-5 g-4">

                        <div class="commited_sec">
    <?php
    // Get only parent terms from the "committees-category" taxonomy
    $terms = get_terms([
        'taxonomy'   => 'committees-category',
        'hide_empty' => false,
        'parent'     => 0, // ✅ only parent categories
    ]);

    if (!empty($terms) && !is_wp_error($terms)) :
    ?>
    <div class="row g-md-5 g-4">
        <?php foreach ($terms as $term) :

            // Get committee members in this category
            $args = [
                'post_type'      => 'committees-member',
                'posts_per_page' => -1,
                'tax_query'      => [
                    [
                        'taxonomy' => 'committees-category',
                        'field'    => 'slug',
                        'terms'    => $term->slug,
                    ]
                ]
            ];
            $query = new WP_Query($args);

            // Optional: get a custom field for icon (ACF or fallback)
            $icon_url = get_field('committees_icon_image', $term) ?: get_template_directory_uri() . '/images/committees/default.svg';
        ?>
            <div class="col-md-6">
                <div class="card-box">
                    <div class="card-icon">
                        <img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($term->name); ?> Icon" />
                    </div>
                    <div>
                        <!--<h5>Committee on</h5>-->
                        <h5><?php echo esc_html($term->name); ?></h5>
                        <a href="<?php echo esc_url(get_term_link($term)); ?>" class="read-more blue">Read More</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>