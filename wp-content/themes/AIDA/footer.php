<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */
?>

<footer class="footer_web bg-light"
        style="background: url('./images/footer.webp') center center / cover no-repeat;">
        <div class="container-fluid">
            <div class="row  text-md-start">
                <div class="col-md-3 mb-4">
                    <img src="<?php echo of_get_option('uploader_footer'); ?>" alt="AIDA Logo" class="footer_logo">

                    <div class="footer_social">
                        <!--<a href="javascript:void(0)" class=" rounded-circle">-->
                        <!--    <img src="<?php echo get_template_directory_uri(); ?>/images/twitter.svg" alt="twitter">-->
                        <!--</a>-->
                        <a href="<?php echo of_get_option('lin_id'); ?>" class=" rounded-circle" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/linkedin.svg" alt="linkedin">
                        </a>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <h5 class="after-border">USEFUL LINKS</h5>
					<?php
wp_nav_menu(array(
    'theme_location' => 'footer-menu',
    'container' => false,
    'menu_class' => 'list-unstyled footer-link',
    'fallback_cb' => false,
    'link_before' => ' | ',
));
?>

                </div>

                <div class="col-md-3 mb-4">
                    <h5 class="after-border">CONTACT INFO</h5>
                    <p class="small flex_f mb-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/map.svg" alt="map"> <?php echo of_get_option('footer_1'); ?></p>
                    <p class="small flex_f mb-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/mail.svg" alt="mail"> <a
                            href="mailto:<?php echo of_get_option('footer_2'); ?>"><?php echo of_get_option('footer_2'); ?></a>
                    </p>
                </div>

                <div class="col-md-3 mb-4">
                    <h5 class="after-border">SIGN-UP FOR MEDIA RELEASES</h5>
                    <div class="footer-form">
                        

                        <?php echo do_shortcode('[contact-form-7 id="f8abe61" title="Subscribe Form"]
'); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="last_footer py-3">
            <div class="container d-flex flex-column flex-md-row justify-content-between small">
                <span><?php echo of_get_option('copyright_foo'); ?></span>
                <span>
                    <a href="#" class="text-decoration-none me-2">Guidelines & Policy</a> |
                    <a href="#" class="text-decoration-none me-2">Disclaimer</a> |
                    <a href="#" class="text-decoration-none me-2">Privacy Policy</a> |
                    <a href="#" class="text-decoration-none">Terms and Conditions</a>
                </span>
            </div>
        </div>
    </footer>
<div class="visiter_info">
	<img src="https://aida-india.org/wp-content/uploads/2026/02/eye.svg" alt="eye-aida">
	<?php echo do_shortcode('[wps_visitor_counter]'); ?>
	
</div>

<?php wp_footer();?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>
    <script>
        AOS.init();
    </script>
       <script>
        const thumbs = document.querySelectorAll('.gallery-thumb');
        const modal = new bootstrap.Modal(document.getElementById('galleryModal'));

        const swiper = new Swiper(".mySwiper", {
            loop: false, // disable loop for correct indexing
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            }
        });

        // Thumbnail click → open modal at correct slide
        thumbs.forEach((thumb, idx) => {
            thumb.addEventListener('click', () => {
                modal.show();
                setTimeout(() => {
                    swiper.slideTo(idx, 0); // jump to correct index
                }, 150);
            });
        });

        // Stop video when modal closes
        document.getElementById('galleryModal').addEventListener('hidden.bs.modal', () => {
            document.querySelectorAll("video").forEach(v => v.pause());
        });

        document.getElementById("closeModalBtn").addEventListener("click", () => {
            modal.hide();
        });

    </script>
   <script>
document.addEventListener("DOMContentLoaded", function() {
    const paragraphs = document.querySelectorAll('p');

    paragraphs.forEach(function(p) {
        // Check if paragraph has no child elements AND no text content
        const text = p.textContent.trim();
        const hasChildren = p.children.length > 0;

        if(text === '' && !hasChildren) {
            p.remove(); // Remove only truly empty <p>
        }
    });
});
</script>
<script>
jQuery(document).ready(function($) {

    function updateVisitors() {
        $.post(visitor_ajax.ajax_url, {
            action: 'update_active_visitors'
        }, function(response) {
            $('#live-visitor-count').text(response);
        });
    }

    updateVisitors();
    setInterval(updateVisitors, 15000); // Update every 15 sec

});

</script>


</body>

</html>