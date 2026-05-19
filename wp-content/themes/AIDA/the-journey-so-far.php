<?php
/**
 * Template Name: Journey
 */
get_header();
?>

<section class="about_sec">
    <div class="row">
        <div class="col-md-3">
            <div class="sidebar-left">
                <ul class="group_option">
                    <li>
                        <a href="<?php echo esc_url(site_url('/'))?>who-we-are/">
                            Who We Are 
                            <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon">
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo esc_url(site_url('/'))?>meet-key-people/">
                            Meet Our Key People 
                            <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon">
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo esc_url(site_url('/'))?>organizational-structure/">
                            Organizational Structure 
                            <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon">
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo esc_url(site_url('/'))?>the-journey-so-far/" class="current">
                            The Journey So Far 
                            <img src="<?php echo get_template_directory_uri(); ?>/images/about/right.svg" alt="icon">
                        </a>
                        <ul id="navbar-time" class="navbar-time-scrollspy">
                            <li><a class="list-group-item list-group-item-action" href="#year-2025">2025</a></li>
                            <li><a class="list-group-item list-group-item-action" href="#year-2024">2024</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-md-9">
            <div class="bit-cram">
                <ul>
                    <li>
                        <a href="<?php echo esc_url(site_url('/'))?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/about/home.svg" alt="home">
                        </a>
                    </li>
                    <li><a href="<?php echo esc_url(site_url('/'))?>who-we-are/">About Us</a></li>
                    <li> The Journey So Far </li>
                </ul>
            </div>

            <div class="container-fluid sec-padd time_sec">
                <div class="row g-md-5 g-4">
                    <div class="col-md-12">
                        <h2 class="heading-c after-border mb-5" data-aos="fade-up"
                            data-aos-anchor-placement="top-bottom" data-aos-duration="2000">
                            The Journey So Far
                        </h2>
                    </div>

                    <div data-bs-spy="scroll" data-bs-target="#navbar-time" data-bs-offset="100"
                        class="scrollspy-time" tabindex="0">

                        <!-- 2025 -->
                        <div id="year-2025" class="timeline-section">
                            <div class="year-heading"><span>2025</span></div>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="timeline-card">
                                        <h6>22nd July 2025</h6>
                                        <p>AIDA conducted its second National Webinar focusing on Assam’s smart metering initiative. Shri Rakesh Kumar, IAS, CMD, APDCL presented how the state successfully installed 42 lakh smart meters (covering 60% of consumers), and achieved 100% feeder and transformer coverage setting a national benchmark for digital grid modernization.

</p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="timeline-card">
                                        <h6>10th July 2025</h6>
                                        <p>AIDA signed a Memorandum of Understanding (MoU) with the Power Foundation of India (PFI) at Shram Shakti Bhawan. The partnership aims to collaborate on reforms and innovations to enhance the performance and sustainability of India’s power distribution system.</p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="timeline-card">
                                        <h6>25th June 2025</h6>
                                        <p>AIDA organized a National Webinar spotlighting the Mukhya Mantri Saur Krushi Vahini Yojana 2.0 (MSKVY 2.0) under the PM-KUSUM Yojana. Shri Lokesh Chandra, IAS, CMD, MSEDCL shared insights into the scheme’s large-scale impact on solar energy deployment in Maharashtra, showcasing an exemplary state-led clean energy initiative.
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="timeline-card">
                                        <h6>2nd and 6th June 2025</h6>
                                        <p>AIDA sponsored the participation of seven senior officers from member DISCOMs at the Asia Clean Energy Forum (ACEF) 2025, held at the Asian Development Bank Headquarters in Manila. This initiative provided valuable international exposure, enabling the delegation to engage with global experts on clean energy pathways, resilience strategies, and inclusive energy solutions. The participation underscored AIDA’s commitment to fostering global knowledge exchange and aligning India’s distribution sector with international best practices.


                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="timeline-card">
                                        <h6>18th – 22nd March 2025</h6>
                                        <p>AIDA held its First General Body Meeting during the India Smart Utility Week (ISUW). The high-level meeting was chaired by Shri Lokesh Chandra, CMD, MSEDCL and President of AIDA, and co-chaired by Shri Ashish Goel, Managing Director, UPPCL and General Secretary of AIDA. Shri Alok Kumar, Former Secretary, Ministry of Power and the first Director General of AIDA, shared his vision of building AIDA into a strong institutional voice for DISCOMs and the clean energy transition.


                                        </p>
                                    </div>
                                </div>

                               
                            </div>
                        </div>

                        <!-- 2024 -->
                        <div id="year-2024" class="timeline-section">
                            <div class="year-heading"><span>2024</span></div>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="timeline-card">
                                        <h6>14th November 2024</h6>
                                        <p>AIDA was officially launched as a not-for-profit society by the Hon’ble Union Minister of Power, Shri Manohar Lal Khattar. Conceptualized as a collaborative platform “by and for” India’s electricity distribution utilities, it aims to strengthen the power distribution sector through collective problem-solving, capacity building, and policy engagement.

</p>
                                    </div>
                                </div>

                               
                            </div>
                        </div>

                    </div> <!-- scrollspy-time -->
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
