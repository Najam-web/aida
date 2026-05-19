<?php

$current_term = get_queried_object();

$current_slug = isset($current_term->slug) ? $current_term->slug : '';

?>



<div class="sidebar-left">

    <ul class="group_option">

        <li>

            <a href="<?php echo esc_url(site_url('/resource/')); ?>" class="<?php echo ($current_slug == '') ? 'active' : ''; ?>">

                Resources

                <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon">

            </a>



            <ul>

                <li>

                    <ul>



                        <li>

                            <a class="<?php echo ($current_slug == 'aida-webinars') ? 'active' : ''; ?>"

                               href="<?php echo esc_url(site_url('/resources-category/aida-webinars/')); ?>">

                                AIDA Webinars

                                <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="tab4">

                            </a>

                        </li>



                        <!-- <li>

                            <a class="<?php echo ($current_slug == 'annual-activity-calendar') ? 'active' : ''; ?>"

                               href="<?php echo esc_url(site_url('/resources-category/annual-activity-calendar/')); ?>">

                                Annual Activity Calendar

                                <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="tab4">

                            </a>

                        </li> -->



                        <!-- Reports Section -->

                        <?php

                        $reports_active = in_array($current_slug, ['annual-reports','other-reports']);

                        ?>

                        <li class="<?php echo $reports_active ? 'active open report_class' : 'report_class'; ?>">

                            <a href="javascript:void(0);">

                                Reports

                                <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="tab4">

                            </a>



                            <ul class="submenu pt-2" style="<?php echo $reports_active ? 'display:block;' : 'display:none;'; ?>">

                                <li>

                                    <a class="<?php echo ($current_slug == 'annual-reports') ? 'active' : ''; ?>"

                                       href="<?php echo esc_url(site_url('/resources-category/annual-reports/')); ?>">

                                       Annual Report
                                <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="tab4">

                                    </a>

                                </li>



                                <li>

                                    <a class="<?php echo ($current_slug == 'other-reports') ? 'active' : ''; ?>"

                                       href="<?php echo esc_url(site_url('/resources-category/other-reports/')); ?>">

                                       Other Reports
                                <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="tab4">


                                    </a>

                                </li>

                            </ul>

                        </li>
                    <li>

                            <a href="<?php echo esc_url(site_url('/nletter/')); ?>">

                                Newsletters

                                <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="tab4">

                            </a>

                        </li>
						  <li>

                            <a href="https://aida-india.org/resources-category/edicon-2026/">

                                EDICON 2026

                                <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="tab4">

                            </a>

                        </li>


<!--                         <li>

                            <a href="<?php echo esc_url(site_url('/wp-content/uploads/2026/02/AIDA-REC-Study-Report.pdf')); ?>" target="_blank">

                                Others

                                <img src="<?php echo get_template_directory_uri(); ?>/images/about/arrow-right.svg" alt="tab4">

                            </a>

                        </li> -->
                    </ul>

                </li>

            </ul>

        </li>

    </ul>

</div>

<style>
    .group_option .submenu{
        display:none !important;
    }
    .group_option .report_class img{
        height:15px;
    }
    .report_class.active img{
    transform: rotate(90deg);
    }
    .group_option .submenu{
        margin-left:15px;
    }
    .group_option .submenu.active{
        display: grid !important;
    }
    .group_option .submenu img{
        height:10px;
    transform: rotate(0deg);


    }
</style>


<script>
      const reportBtn = document.querySelector('.report_class');
  const submenu = document.querySelector('.submenu');

  reportBtn.addEventListener('click', function () {
    submenu.classList.toggle('active');
     reportBtn.classList.toggle('active');
  });
</script>