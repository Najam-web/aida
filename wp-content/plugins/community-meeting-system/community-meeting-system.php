<?php
/*
Plugin Name: Community Meeting System
Description: Custom plugin for user registration, login, admin approval, and community-based meeting view.
Version: 1.0
Author: Syed Najam Hashmi
*/

// Prevent direct access
if (!defined('ABSPATH')) exit;

/* -----------------------------
   Custom User Registration
------------------------------ */
function cms_register_form_shortcode() {
        if (is_user_logged_in()) {
            return '<p>You are already logged in.</p>';
        }

        $html = '<form method="post">
            <div class="row g-md-5 g-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Full Name :<br>
                            <input type="text" name="cms_full_name" class="form-control" required>
                        </label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Designation :<br>
                            <input type="text" name="cms_designation" class="form-control" required>
                        </label>
                    </div>
                </div>
                
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email :<br>
                            <input type="email" name="cms_email" class="form-control" required>
                        </label>
                    </div>
                </div>
                
                 <div class="col-md-6">
                    <div class="form-group">
                        <label>Phone Number :<br>
                            <input type="text" name="cms_phone" class="form-control" required>
                        </label>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Select Your DISCOM :<br>
                            <select name="cms_member" class="form-control" required>
                                <option value="">-- Select Member --</option>
                                <option value="Uttar Pradesh Power Corporations Limited (UPPCL)">Uttar Pradesh Power Corporations Limited (UPPCL)</option>
                                <option value="Uttar Gujarat Vij Co Ltd- Mehsana (UGVCL)">Uttar Gujarat Vij Co Ltd- Mehsana (UGVCL)</option>
                                <option value="Torrent Power Ltd (TPL)">Torrent Power Ltd (TPL)</option>
                                 <option value="Tata Power Western Odisha Distribution Limited (TPWODL)">Tata Power Western Odisha Distribution Limited (TPWODL)</option>
                                <option value="Tata Power Southern Odisha Distribution Limited (TPSODL)">Tata Power Southern Odisha Distribution Limited (TPSODL)</option>
                                <option value="Tata Power Northern Odisha Distribution Limited (TPNODL)">Tata Power Northern Odisha Distribution Limited (TPNODL)</option>
                                 <option value="Tata Power Delhi Distribution Limited (TPDDL) – North Delhi Power Ltd (NDPL)">Tata Power Delhi Distribution Limited (TPDDL) – North Delhi Power Ltd (NDPL)</option>
                                 <option value="Tata Power Company Ltd- Mumbai (TPCL)">	Tata Power Company Ltd- Mumbai (TPCL)</option>
                                 <option value="Tata Power Central Odisha Distribution Limited (TPCODL)">	Tata Power Central Odisha Distribution Limited (TPCODL)</option>
                                 <option value="Tata Power Ajmer Distribution Limited (TPADL)">	Tata Power Ajmer Distribution Limited (TPADL)</option>
                                 <option value="South Bihar Power Distribution Company Limited (SBPDCL)">	South Bihar Power Distribution Company Limited (SBPDCL)</option>
                                 <option value="Purvanchal Vidyut Vitran Nigam Ltd. Varanasi (PVVNL)">	Purvanchal Vidyut Vitran Nigam Ltd. Varanasi (PVVNL)</option>
                                 <option value="Paschimanchal Vidyut Vitran Nigam Ltd.- Meerut (PVVNL)">	Paschimanchal Vidyut Vitran Nigam Ltd.- Meerut (PVVNL)</option>
                                 <option value="Paschim Gujarat Vij. Co. Ltd- Rajkot (PGVCL)">	Paschim Gujarat Vij. Co. Ltd- Rajkot (PGVCL)</option>
                                 <option value="North Bihar Power Distribution Company Limited – Patna (NBPDCL)">	North Bihar Power Distribution Company Limited – Patna (NBPDCL)</option>
                                 <option value="Noida Power Company Limited (NPCL)">	Noida Power Company Limited (NPCL)</option>
                                 <option value="MP Purv Kshetra Vidyut Vitran Co. Ltd – Jabalpur (MPPKVVCL)">	MP Purv Kshetra Vidyut Vitran Co. Ltd – Jabalpur (MPPKVVCL)</option>
                                 <option value="MP Paschim Kshetra Vidyut Vitran Co. Ltd- Indore (MPPKVVCL)">	MP Paschim Kshetra Vidyut Vitran Co. Ltd- Indore (MPPKVVCL)</option>
                                 <option value="MP Madhya Kshetra Vidyut Vitran Co. Ltd- Bhopal (MPKVVCL)">	MP Madhya Kshetra Vidyut Vitran Co. Ltd- Bhopal (MPKVVCL)</option>
                                 <option value="Meghalaya Power Distribution Corporation Ltd (MPDCL)">	Meghalaya Power Distribution Corporation Ltd (MPDCL)</option>
                                 <option value="Maharashtra State Electricity Distribution Co. Ltd. – Mumbai (MSEDCL)">	Maharashtra State Electricity Distribution Co. Ltd. – Mumbai (MSEDCL)</option>
                                 <option value="Madhyanchal Vidyut Vitran Nigam Ltd.- Lucknow (MVVNL)">	Madhyanchal Vidyut Vitran Nigam Ltd.- Lucknow (MVVNL)</option>
                                 <option value="Madhya Gujarat Vij Co. Ltd- Vadodra (MGVCL)">	Madhya Gujarat Vij Co. Ltd- Vadodra (MGVCL)</option>
                                 <option value="Kerala State Electricity Board Limited – Thiruvananthapuram (KSEBL)">	Kerala State Electricity Board Limited – Thiruvananthapuram (KSEBL)</option>
                                 <option value="Kanpur Electricity Supply Co. Ltd (KESCL)">	Kanpur Electricity Supply Co. Ltd (KESCL)</option>
                                 <option value="Eastern Power Distribution Company Limited Of Andhra Pradesh Limited – Visakhapatnam">	Eastern Power Distribution Company Limited Of Andhra Pradesh Limited – Visakhapatnam</option>
                                 <option value="Damodar Valley Corporation (DVC)">	Damodar Valley Corporation (DVC)</option>
                                 <option value="Dakshinanchal Vidyut Vitran Nigam Ltd.- Agra (DVVNL)">	Dakshinanchal Vidyut Vitran Nigam Ltd.- Agra (DVVNL)</option>
                                 <option value="Dakshin Gujarat Vij Co Ltd – Vadora (GUVNL)">	Dakshin Gujarat Vij Co Ltd – Vadora (GUVNL)</option>
                                 <option value="Chandigarh Power Distribution limited">	Chandigarh Power Distribution limited</option>
                                 <option value="Indian Electrical and Electronics Manufactures Association">	Indian Electrical and Electronics Manufactures Association</option>
                                 <option value="All India Discoms Association">	All India Discoms Association</option>
                                
                                 <option value="India Smart Grid Forum">	India Smart Grid Forum</option>
                                 <option value="Central Electricity Authority">	Central Electricity Authority</option>
                                 <option value="Others"> Others</option>
                            </select>
                        </label>
                    </div>
                </div>
                
            
                  
                           <div class="col-md-6">
    <div class="form-group chk">
        <label>Select Your Committee :</label><br>

        <label>
            <input type="checkbox" name="cms_community[]" value="Capacity Building"> Capacity Building
        </label><br>

        <label>
            <input type="checkbox" name="cms_community[]" value="Commercial Aspects of Discom Functioning"> Commercial Aspects of Discom Functioning
        </label><br>

        <label>
            <input type="checkbox" name="cms_community[]" value="Planning and Procurement of Bulk Power/ Capacity"> Planning and Procurement of Bulk Power/ Capacity
        </label><br>

        <label>
            <input type="checkbox" name="cms_community[]" value="Policy Related Matters"> Policy Related Matters
        </label><br>

        <label>
            <input type="checkbox" name="cms_community[]" value="Regulatory Matters"> Regulatory Matters
        </label><br>

        <label>
            <input type="checkbox" name="cms_community[]" value="Smart Grid Technologies"> Smart Grid Technologies
        </label><br>

        <label>
            <input type="checkbox" name="cms_community[]" value="Specifications and Procurement Practices"> Specifications and Procurement Practices
        </label>
    </div>
</div>
                     

                <div class="col-md-6">
                    <div class="form-group">
                        <label>User Name :<br>
                            <input type="text" name="cms_username" class="form-control" required>
                        </label>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label>Password :<br>
                            <input type="password" name="cms_password" class="form-control" required>
                        </label>
                    </div>
                </div>

                

                <div class="col-md-12">
                    <p><input type="submit" name="cms_register" class="btn btn-primary" value="Register"></p>
                </div>
            </div>
        </form>';

        return $html;
    }
    add_shortcode('cms_register', 'cms_register_form_shortcode');


function cms_handle_registration() {
    if (isset($_POST['cms_register'])) {

        $username = sanitize_user($_POST['cms_username']);
        $email    = sanitize_email($_POST['cms_email']);
        $password = $_POST['cms_password']; // ❗ no sanitize

        $member = sanitize_text_field($_POST['cms_member']);

        // Create user first
        $user_id = wp_create_user($username, $password, $email);

        if (!is_wp_error($user_id)) {

            // Handle checkbox communities
            $community = isset($_POST['cms_community']) ? $_POST['cms_community'] : [];
            $community = array_map('sanitize_text_field', $community);

            // Save fields
            update_user_meta($user_id, 'cms_full_name', sanitize_text_field($_POST['cms_full_name']));
            update_user_meta($user_id, 'cms_designation', sanitize_text_field($_POST['cms_designation']));
            update_user_meta($user_id, 'cms_phone', sanitize_text_field($_POST['cms_phone']));
            update_user_meta($user_id, 'cms_community', $community);
            update_user_meta($user_id, 'cms_member', $member);
            update_user_meta($user_id, 'cms_approved', 0);

            // Email
            $admin_email = get_option('admin_email');
            $subject = 'New Community User Registration';

            $message = "A new user has registered:\n\n";
            $message .= "Full Name: " . sanitize_text_field($_POST['cms_full_name']) . "\n";
            $message .= "Designation: " . sanitize_text_field($_POST['cms_designation']) . "\n";
            $message .= "Username: " . $username . "\n";
            $message .= "Email: " . $email . "\n";
            $message .= "Community: " . implode(', ', $community) . "\n";
            $message .= "Member: " . $member . "\n\n";
            $message .= "Please review and approve this user.";

            wp_mail($admin_email, $subject, $message);

            wp_logout();
            wp_redirect(home_url('/login'));
            exit;
        }
    }
}
add_action('init', 'cms_handle_registration');
/* -----------------------------
   Custom Login Form
------------------------------ */
function cms_login_form_shortcode() {
    if (is_user_logged_in()) {
        return '<p>You are already logged in.</p>';
    }

    $html = '<form method="post">
        <div class="row g-4">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Username<br>
                        <input type="text" name="cms_log_username" required class="form-control">
                    </label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Password<br>
                        <input type="password" name="cms_log_password" required class="form-control">
                    </label>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group d-flex justify-content-between align-items-center mt-3">
                    <input type="submit" name="cms_login" value="Login" class="btn btn-primary">
                    <span class="mx-2">Don\'t have an account?</span>
                    <a href="https://aida-india.org/committee-registration/" >Register</a>
                </div>
            </div>

            <div class="col-md-12">
                <p class="mt-2">
                    <a href="' . wp_lostpassword_url() . '">Forgot your password?</a>
                </p>
            </div>
        </div>
    </form>';

    return $html;
}

add_shortcode('cms_login', 'cms_login_form_shortcode');


function cms_handle_login() {
    if (isset($_POST['cms_login'])) {
        $creds = array(
            'user_login' => sanitize_user($_POST['cms_log_username']),
            'user_password' => sanitize_text_field($_POST['cms_log_password']),
            'remember' => true
        );
        $user = wp_signon($creds, false);

        if (!is_wp_error($user)) {
            $approved = get_user_meta($user->ID, 'cms_approved', true);
            if ($approved == 1) {
                wp_redirect(home_url('/meetings')); exit;
            } else {
                wp_logout();
                wp_die('Your account is not approved yet.');
            }
        } else {
            wp_die('Login failed.');
        }
    }
}
add_action('init', 'cms_handle_login');

/* -----------------------------
   Admin: Approve Users
------------------------------ */
function cms_user_approval_column($columns) {
    $columns['cms_approved'] = 'Approved';
    return $columns;
}
add_filter('manage_users_columns', 'cms_user_approval_column');

function cms_user_approval_column_content($value, $column_name, $user_id) {
    if ($column_name == 'cms_approved') {
        $approved = get_user_meta($user_id, 'cms_approved', true);
        $checked = $approved == 1 ? 'checked' : '';
        return '<input type="checkbox" class="cms-approve-user" data-userid="'.$user_id.'" '.$checked.'>';
    }
    return $value;
}
add_action('manage_users_custom_column', 'cms_user_approval_column_content', 10, 3);

function cms_approve_user_ajax() {
    $user_id = intval($_POST['user_id']);
    $approved = intval($_POST['approved']);
    update_user_meta($user_id, 'cms_approved', $approved);
    wp_send_json_success();
}
add_action('wp_ajax_cms_approve_user', 'cms_approve_user_ajax');

function cms_admin_scripts($hook) {
    if ($hook != 'users.php') return;
    wp_enqueue_script('cms-admin', plugin_dir_url(__FILE__) . 'cms-admin.js', array('jquery'), null, true);
}
add_action('admin_enqueue_scripts', 'cms_admin_scripts');



/* -----------------------------
   Show Meetings to User
------------------------------ */
function cms_meetings_shortcode() {

    if (!is_user_logged_in()) {
        return '<p>Please login to see meetings.</p>';
    }

    $user_id   = get_current_user_id();
    $community = get_user_meta($user_id, 'cms_community', true);

    if (!is_array($community)) {
        $community = [$community];
    }

    $community_slugs = array_map('sanitize_title', $community);

    $args = array(
        'post_type' => 'meeting',
        'tax_query' => array(
            array(
                'taxonomy' => 'community',
                'field'    => 'slug',
                'terms'    => $community_slugs,
            )
        )
    );

    $query = new WP_Query($args);

    $html = ''; // ✅ FIX

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            $event_date   = get_post_meta(get_the_ID(), 'start_date', true);
            $event_agenda = get_post_meta(get_the_ID(), 'agenda', true);
            $event_setime = get_post_meta(get_the_ID(), 'event_start_time_end_time', true);
            $event_meetlink = get_post_meta(get_the_ID(), 'meeting_link', true);

            $event_day   = $event_date ? date_i18n('d', strtotime($event_date)) : '';
            $event_month = $event_date ? date_i18n('F', strtotime($event_date)) : '';
            $event_year  = $event_date ? date_i18n('Y', strtotime($event_date)) : '';

            $html .= '<div class="event-card d-flex">
                <div class="date-box text-white text-center">
                <div class="date-only">
                    <p class="day">'.$event_day.' <span>'.$event_month.'</span></p></div>
                    <div class="year">'.$event_year.'</div>
                </div>
                <div class="event-details flex-grow-1">
                    <h5>'.get_the_title().'</h5>';

            if ($event_setime) {
                $html .= '<p><strong>Time :</strong> '.$event_setime.'</p>';
            }

            if ($event_agenda) {
                $html .= '<p><strong>Agenda Note :</strong> '.$event_agenda.'</p>';
            }

             if ( $event_meetlink ) {
    $html .= '<p><strong>Join Meeting Link :</strong> 
        <a href="' . esc_url( $event_meetlink ) . '" target="_blank" rel="noopener noreferrer">'
        . esc_html( $event_meetlink ) . 
        '</a></p>';
}


            $html .= '</div></div>';
        }
    } else {
        $html .= '<p>No meetings found for your community.</p>';
    }

    wp_reset_postdata();
    return $html;
}
add_shortcode('cms_meetings', 'cms_meetings_shortcode');

/* -----------------------------
   Show Minutes to User
------------------------------ */
function cms_minutes_shortcode() {

    if (!is_user_logged_in()) {
        return '<p>Please login to see minutes of meetings.</p>';
    }

    $user_id   = get_current_user_id();
    $community = get_user_meta($user_id, 'cms_community', true);

    if (!is_array($community)) {
        $community = [$community];
    }

    $community_slugs = array_map('sanitize_title', $community);

    $args = array(
        'post_type' => 'minutes',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'community',
                'field'    => 'slug',
                'terms'    => $community_slugs,
            )
        )
    );

    $query = new WP_Query($args);

    $html = '<div class="accordion meeting_collapse" id="meetingMinutesAccordion">';

    if ($query->have_posts()) {
        $i = 1;
        while ($query->have_posts()) {
            $query->the_post();

            $meeting_subject = get_field('meeting_subject');
            $date_time = get_field('date_time');
            $date = get_field('date_time_copy');
            $pdf = get_field('download_button_link');

            if (is_array($pdf)) $pdf = reset($pdf);

             $html .= '<div class="accordion-item">
                <h2 class="accordion-header" id="'.esc_attr($headingId).'">
                    <button class="accordion-button'.($i>1?' collapsed':'').'" type="button" data-bs-toggle="collapse" data-bs-target="#'.esc_attr($collapseId).'">
                        <div class="collapse_h">
                            <span> Minutes</span>
                            <p><strong>Meeting Subject :</strong> '.esc_html($meeting_subject ?: get_the_title()).'</p>
                            <p><strong>Date :</strong> '.esc_html($date).'</p>
                            <p><strong>Time :</strong> '.esc_html($date_time).'</p>
                        </div>
                    </button>
                </h2>

                <div id="'.esc_attr($collapseId).'" class="accordion-collapse collapse '.($i==1?'show':'').'">
                    <div class="accordion-body bg-light">
                        <div class="minutes-content">' . wpautop( get_the_content() ) . '</div>';

           if (!empty($pdf_file)) {
    $html .= '<a href="'.esc_url($pdf_file).'" target="_blank" class="btn_blue mt-3">Download PDF</a>';
}

            $html .= '</div></div></div>';

            $i++;
        }
    } else {
        $html .= '<p>No minutes found for your community.</p>';
    }

    $html .= '</div>';

    wp_reset_postdata();
    return $html;
}
add_shortcode('cms_minutes', 'cms_minutes_shortcode');
function cms_register_all_cpt() {

    register_post_type('meeting', array(
        'label' => 'Meetings',
        'public' => true,
        'supports' => array('title','editor'),
    ));

    register_post_type('minutes', array(
        'label' => 'Minutes',
        'public' => true,
        'supports' => array('title','editor'),
    ));

    register_post_type('notification', array( // ✅ SAME rakho (data safe)
        'label' => 'Notifications',
        'public' => true,
        'supports' => array('title','editor'),
    ));

    register_taxonomy('community', array('meeting','minutes','notification'), array(
        'label' => 'Community',
        'hierarchical' => true,
    ));
}
add_action('init', 'cms_register_all_cpt');

/* -----------------------------
   Show Notifications to User
------------------------------ */
function cms_notifications_shortcode() {
    if ( ! is_user_logged_in() ) {
        return '<p>Please login to see notifications.</p>';
    }

    $user_id   = get_current_user_id();
    $community = get_user_meta( $user_id, 'cms_community', true );

    $args = array(
        'post_type' => 'notification',
        'tax_query' => array(
            array(
                'taxonomy' => 'community',
                'field'    => 'name',
                'terms'    => $community,
            )
        )
    );

    $query = new WP_Query( $args );

    $html = ''; // initialize

    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();

          // Get custom fields
            $event_date   = get_post_meta( get_the_ID(), 'start_date', true ); // DateTime Picker
            $event_agenda = get_post_meta( get_the_ID(), 'agenda', true );     // Text
            $event_setime = get_post_meta( get_the_ID(), 'event_start_time_end_time', true );     // Text
            
            $event_meetlink = get_post_meta( get_the_ID(), 'meeting_link', true );     // Text

            // Fallback if no custom fields
            $event_title = get_the_title();
            $event_time  = $event_date ? date_i18n( 'h:i A', strtotime( $event_date ) ) : '';
            $event_day   = $event_date ? date_i18n( 'd', strtotime( $event_date ) ) : '';
            $event_month = $event_date ? date_i18n( 'F', strtotime( $event_date ) ) : '';
            $event_year  = $event_date ? date_i18n( 'Y', strtotime( $event_date ) ) : '';
            

                $html .= '<div class="event-card d-flex">
                <div class="date-box text-white text-center">
                    <div class="date-only">
                        <p class="day">' . esc_html( $event_day ) . ' <span>' . esc_html( $event_month ) . '</span></p>
                    </div>
                    <div class="year">' . esc_html( $event_year ) . '</div>
                </div>
                <div class="event-details flex-grow-1">
                    <h5>' . esc_html( $event_title ) . '</h5>';

            if ( $event_time ) {
                $html .= '<p><strong>Time :</strong> ' . esc_html( $event_setime ) . '</p>';
            }
            
            
            if ( $event_agenda ) {
                $html .= '<p><strong>Agenda Note :</strong> ' . esc_html( $event_agenda ) . '</p>';
            }
            
             if ( $event_meetlink ) {
    $html .= '<p><strong>Join Meeting Link :</strong> 
        <a href="' . esc_url( $event_meetlink ) . '" target="_blank" rel="noopener noreferrer">'
        . esc_html( $event_meetlink ) . 
        '</a></p>';
}


            $html .= '</div></div>';
        }
    } else {
        $html .= '<p>No notifications found for your community.</p>';
    }

    wp_reset_postdata();

    return $html;
}
add_shortcode( 'cms_notifications', 'cms_notifications_shortcode' );


function cms_forgot_password_form_shortcode() {
    if (is_user_logged_in()) {
        return '<p>You are already logged in.</p>';
    }

    ob_start();

    if (isset($_POST['cms_forgot_password'])) {
        $user_login = sanitize_text_field($_POST['user_login']);
        $user = get_user_by('email', $user_login);
        if (!$user) {
            $user = get_user_by('login', $user_login);
        }

        if ($user) {
            $reset_url = wp_lostpassword_url(); // Default WP reset page
            wp_redirect($reset_url);
            exit;
        } else {
            echo '<p class="text-danger">No user found with that username or email.</p>';
        }
    }

    ?>

    <form method="post" class="cms-forgot-password-form">
        <div class="row g-4">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Email or Username<br>
                        <input type="text" name="user_login" required class="form-control">
                    </label>
                </div>
            </div>
            <div class="col-md-12">
                <input type="submit" name="cms_forgot_password" value="Reset Password" class="btn btn-primary">
            </div>

            <div class="col-md-12 mt-2">
                <a href="<?php echo esc_url(home_url('/login')); ?>">Back to Login</a>
            </div>
        </div>
    </form>

    <?php
    return ob_get_clean();
}
add_shortcode('cms_forgot_password', 'cms_forgot_password_form_shortcode');

