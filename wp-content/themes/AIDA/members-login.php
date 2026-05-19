<?php
   /**
   * Template Name: Members Login
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
                        <li><a href="<?php echo esc_url(site_url('/'))?>committees/"> Committees </a></li>
                        <li>Register</li>
                    </ul>
                </div>
                <div class="container-fluid sec-padd">
                    <div class="row px-md-5 g-4">
                        <div class="form_main mt-5 btn_auto_form bottom_0">
                      <?php echo do_shortcode('[aida_member_login]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <?php get_footer(); ?>