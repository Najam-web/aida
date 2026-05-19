<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>
      <!-- banner section -->
  <?php 
              $image1 = get_field('inner_banner');?>
                    
        <section class="blogmain-section" style="background-image: url(<?php echo esc_url(site_url('/'))?>wp-content/uploads/2022/10/about-banner.png)">
            <div class="container">
              <div class="bg-lable">
              <h2 class="blog-heading"><?php single_post_title(); ?></h2>
				   <?php if(is_page( 6357 ) || is_page( 6391 ) || is_page( 6414 ) || is_page( 6518 ) || is_page( 6530 )|| is_page( 6566 ) || is_page( 6570 ) || is_page( 6577 ) || is_page( 6592 )  || is_page( 6623 ) || is_page( 6636 ) || is_page( 6679 ) || is_page( 6685 ) || is_page( 6692 ) || is_page( 6716 ) || is_page( 6724 ) || is_page( 6740 ) || is_page( 6746 ) || is_page( 6753 )){?>
				  <p><a href="<?php echo esc_url(site_url('/'))?>"> Home</a> / <a href="<?php echo esc_url(site_url('/'))?>about-us"> About Us</a> / <a href="<?php echo esc_url(site_url('/'))?>rid"> RID</a> / <?php single_post_title(); ?></p>
				  <?php }elseif(is_page( 6839 )){?>
				  <p><a href="<?php echo esc_url(site_url('/'))?>"> Home</a> / <a href="<?php echo esc_url(site_url('/'))?>about-us"> About Us</a> / <a href="<?php echo esc_url(site_url('/'))?>rid"> RID</a> / <a href="<?php echo esc_url(site_url('/'))?>investor-contact-details-rta/"> Investor Contact Details / RTA</a> / <?php single_post_title(); ?></p>
				  <?php }elseif(is_page( 6639 )  || is_page( 6676 )){?>
				  <p><a href="<?php echo esc_url(site_url('/'))?>"> Home</a> / <a href="<?php echo esc_url(site_url('/'))?>about-us"> About Us</a> / <a href="<?php echo esc_url(site_url('/'))?>rid"> RID</a> / <a href="<?php echo esc_url(site_url('/'))?>quarterly-compliance-reports/"> Quarterly Compliance Reports</a> / <?php single_post_title(); ?></p>
				  <?php }elseif(is_page( 6695 )  || is_page( 6701 ) || is_page( 6709 )){?>
				  <p><a href="<?php echo esc_url(site_url('/'))?>"> Home</a> / <a href="<?php echo esc_url(site_url('/'))?>about-us"> About Us</a> / <a href="<?php echo esc_url(site_url('/'))?>rid"> RID</a> / <a href="<?php echo esc_url(site_url('/'))?>postal-ballot/"> Postal Ballot</a> / <?php single_post_title(); ?></p>
				  <?php }elseif(is_page( 6760 ) || is_page( 6767 ) || is_page( 6782 ) || is_page( 6789 ) || is_page( 6795 )|| is_page( 6804 ) || is_page( 6815 ) || is_page( 6811 )){?>
				  <p><a href="<?php echo esc_url(site_url('/'))?>"> Home</a> / <a href="<?php echo esc_url(site_url('/'))?>about-us"> About Us</a> / <?php single_post_title(); ?></p>
				  	  <?php }elseif(is_page( 8312 )){?>
				  <p><a href="<?php echo esc_url(site_url('/'))?>"> Home</a> / <a href="<?php echo esc_url(site_url('/'))?>about-us"> About Us</a> / <a href="<?php echo esc_url(site_url('/'))?>csr-initiatives"> CSR Initiatives</a> / <?php single_post_title(); ?></p>
				  <?php }elseif(is_page( 8202 ) || is_page( 8250 )){?>
				  <p><a href="<?php echo esc_url(site_url('/'))?>"> Home</a> / <a href="<?php echo esc_url(site_url('/'))?>about-us"> About Us</a> / <a href="<?php echo esc_url(site_url('/'))?>csr-initiatives"> CSR Initiatives</a> / <a href="<?php echo esc_url(site_url('/'))?>2022-23/"> 2022 - 23</a> / <?php single_post_title(); ?></p>
				  <?php }elseif(is_page( 8383)){?>
				  <p><a href="<?php echo esc_url(site_url('/'))?>"> Home</a> / <a href="<?php echo esc_url(site_url('/'))?>about-us"> About Us</a> / <a href="<?php echo esc_url(site_url('/'))?>csr-initiatives"> CSR Initiatives</a> / <a href="<?php echo esc_url(site_url('/'))?>ogq-program">OGQ Program</a> / <a href="<?php echo esc_url(site_url('/'))?>2022-23/"> 2022 - 23</a> / <?php single_post_title(); ?></p>
				  <?php }elseif(is_page( 6818 ) || is_page( 6831 )){?>
				  <p><a href="<?php echo esc_url(site_url('/'))?>"> Home</a> / <a href="<?php echo esc_url(site_url('/'))?>about-us"> About Us</a> / <a href="<?php echo esc_url(site_url('/'))?>minosha"> Minosha</a> / <a href="<?php echo esc_url(site_url('/'))?>unpaid-and-unclaimed-dividend-2/">  Unpaid And Unclaimed Dividend</a> /<?php single_post_title(); ?></p>
				  <?php }elseif(is_page( 6826 )|| is_page( 8264 )){?>
				  <p><a href="<?php echo esc_url(site_url('/'))?>"> Home</a> / <a href="<?php echo esc_url(site_url('/'))?>about-us"> About Us</a> / <a href="<?php echo esc_url(site_url('/'))?>minosha"> Minosha</a> / <a href="<?php echo esc_url(site_url('/'))?>unpaid-and-unclaimed-dividend-2/">  Unpaid And Unclaimed Dividend</a> / <a href="<?php echo esc_url(site_url('/'))?>uud2014-15/">  2014-15</a> / <?php single_post_title(); ?></p>
				  
				  <?php }elseif(is_page( 6769 )){?>
				  <p><a href="<?php echo esc_url(site_url('/'))?>"> Home</a> / <a href="<?php echo esc_url(site_url('/'))?>about-us"> About Us</a> / <a href="<?php echo esc_url(site_url('/'))?>minosha"> Minosha</a> / <a href="<?php echo esc_url(site_url('/'))?>annual-general-meetings-2">  Annual General Meetings</a> / <?php single_post_title(); ?></p>
				  <?php }else{?>
				  <p><a href="<?php echo esc_url(site_url('/'))?>"> Home</a> / <a href="<?php echo esc_url(site_url('/'))?>about-us"> About Us</a> /<?php single_post_title(); ?></p> 
				   <?php } ?>
            </div>
            </div>
        </section>



        <!-- end banner section -->
<section class="blog-section bg-gray sec-padd">
<div class="container">
    
    
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <?php the_content(); ?>

            <?php endwhile; endif; ?>
</div>
</section>
<script type='text/javascript'>  
 //<![CDATA[  
 $(document).ready(function() {  
  $('img').each(function(){  
   var $img = $(this);  
   var filename = $img.attr('src')  
   $img.attr('title', filename.substring((filename.lastIndexOf('/'))+1, filename.lastIndexOf('.')));  
   $img.attr('alt', filename.substring((filename.lastIndexOf('/'))+1, filename.lastIndexOf('.')));  
  });  
 });  
 //]]>  
 </script>
<?php
//get_sidebar();
get_footer();