<?php
$banner_image   = '';
$banner_text    = '';
$banner_caption = '';

// =======================
// Single post / CPT
// =======================
if ( is_singular() ) {
    $post_id        = get_the_ID();
    $banner_image   = get_field( 'banner_image', $post_id );
    $banner_text    = get_field( 'banner_text', $post_id );
    $banner_caption = get_field( 'banner_caption', $post_id );
}

// =======================
// Category / Tag / Taxonomy
// =======================
elseif ( is_category() || is_tag() || is_tax() ) {
    $term_obj = get_queried_object();
    if ( $term_obj && isset( $term_obj->term_id, $term_obj->taxonomy ) ) {
        $term_key       = $term_obj->taxonomy . '_' . $term_obj->term_id;
        $banner_image   = get_field( 'banner_image', $term_key );
        $banner_text    = get_field( 'banner_text', $term_key );
        $banner_caption = get_field( 'banner_caption', $term_key );
    }
}

// =======================
// Render Banner
// =======================
if ( $banner_image || $banner_text || $banner_caption ) :
?>
<section class="inner_banner"
    <?php if ( ! empty( $banner_image['url'] ) ) : ?>
        style="background-image: url('<?php echo esc_url( $banner_image['url'] ); ?>');"
    <?php endif; ?>
>
    <div class="container-fluid">
        <div class="banner-text">
            <div class="col-md-6">

                <?php
                // 🔴 Hide page title if banner_caption exists
                if ( empty( $banner_caption ) ) : ?>
                    <h1>
                        <?php
                        if ( is_singular() ) {
                            the_title();
                        } else {
                            single_term_title();
                        }
                        ?>
                    </h1>
                <?php endif; ?>

                <?php
                // =======================
                // Text / Caption Logic
                // =======================
                // Priority:
                // 1. banner_text (plain text)
                // 2. banner_caption (HTML allowed)
                if ( ! empty( $banner_text ) ) {
                    echo '<p>' . esc_html( $banner_text ) . '</p>';
                } elseif ( ! empty( $banner_caption ) ) {
                    echo wp_kses_post( $banner_caption );
                }
                ?>

            </div>
        </div>
    </div>
</section>
<?php endif; ?>
