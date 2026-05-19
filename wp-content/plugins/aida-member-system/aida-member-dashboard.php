<?php
/*
Plugin Name: AIDA Member Dashboard
Description: Custom member dashboard with Super Admin, Admin, and Member roles, folder and file management.
Version: 1.2
Author: Najam Hashmi
*/

if (!defined('ABSPATH')) exit;

// -----------------------------
// Plugin Activation: Create Roles
// -----------------------------
register_activation_hook(__FILE__, 'aida_create_roles');
function aida_create_roles() {
    add_role('aida_super_admin', 'AIDA Super Admin', array('read' => true, 'upload_files' => true, 'manage_options' => true));
    add_role('aida_admin', 'AIDA Admin', array('read' => true));
    add_role('aida_member', 'AIDA Member', array('read' => true));
}

// -----------------------------
// Shortcode: Dashboard
// -----------------------------
add_shortcode('aida_dashboard', 'aida_dashboard_shortcode');
function aida_dashboard_shortcode() {
    if (!is_user_logged_in()) return '<p>Please login to access the dashboard.</p>';

    $user = wp_get_current_user();

    // -----------------------------
    // Super Admin / Admin Dashboard
    // -----------------------------
    if (in_array('aida_super_admin', $user->roles) || in_array('aida_admin', $user->roles)) {
        ob_start();
        ?>
        <h2>AIDA Dashboard (Admin View)</h2>
        <p>Welcome, <?php echo esc_html($user->display_name); ?></p>

        <!-- Create Member -->
        <h3>Manage Members</h3>
        <form method="post">
            <input type="text" name="member_name" placeholder="Member Name" required>
            <input type="text" name="membership_no" placeholder="Membership No." required>
            <input type="date" name="start_date" required>
            <input type="date" name="end_date" required>
            <input type="email" name="member_email" placeholder="Email" required>
            <button type="submit" name="create_member">Create Member</button>
        </form>

        <!-- Create Folder -->
        <h3>Create Folder</h3>
        <form method="post">
            <input type="text" name="folder_name" placeholder="Folder Name" required>
            <button type="submit" name="create_folder">Create Folder</button>
        </form>

        <!-- Upload File to Folder -->
        <h3>Upload File</h3>
        <form method="post" enctype="multipart/form-data">
            <select name="folder_for_file" required>
                <option value="">Select Folder</option>
                <?php
                $folders = get_option('aida_folders', array());
                if (!empty($folders)) {
                    foreach ($folders as $folder) {
                        echo '<option value="' . esc_attr($folder) . '">' . esc_html($folder) . '</option>';
                    }
                }
                ?>
            </select>
            <input type="file" name="folder_file" required>
            <button type="submit" name="upload_file">Upload File</button>
        </form>

        <!-- List Members -->
        <h3>All Members</h3>
        <ul>
            <?php
            $members = get_users(array('role' => 'aida_member'));
            if (!empty($members)) {
                foreach ($members as $m) {
                    echo '<li>' . esc_html($m->display_name) . ' (' . esc_html(get_user_meta($m->ID, 'membership_no', true)) . ')</li>';
                }
            } else {
                echo '<li>No members created yet.</li>';
            }
            ?>
        </ul>

        <!-- List Folders & Files -->
        <h3>Folders & Files</h3>
        <ul>
            <?php
            if (!empty($folders)) {
                foreach ($folders as $folder) {
                    echo '<li><strong>' . esc_html($folder) . '</strong><ul>';
                    $files = get_option('aida_folder_files_' . sanitize_title($folder), array());
                    if (!empty($files)) {
                        foreach ($files as $f) {
                            echo '<li><a href="' . esc_url($f['url']) . '" target="_blank">' . esc_html($f['name']) . '</a></li>';
                        }
                    } else {
                        echo '<li>No files uploaded</li>';
                    }
                    echo '</ul></li>';
                }
            }
            ?>
        </ul>
        <?php
        return ob_get_clean();
    }

    // -----------------------------
    // Member Dashboard
    // -----------------------------
    if (in_array('aida_member', $user->roles)) {
        $membership_no = get_user_meta($user->ID, 'membership_no', true);
        $start_date = get_user_meta($user->ID, 'start_date', true);
        $end_date = get_user_meta($user->ID, 'end_date', true);

        ob_start();
        ?>
        <h2>AIDA Member Dashboard</h2>
        <p><strong>Name:</strong> <?php echo esc_html($user->display_name); ?></p>
        <p><strong>Membership No:</strong> <?php echo esc_html($membership_no); ?></p>
        <p><strong>Start Date:</strong> <?php echo esc_html($start_date); ?></p>
        <p><strong>End Date:</strong> <?php echo esc_html($end_date); ?></p>

        <h3>Available Folders & Files</h3>
        <ul>
            <?php
            $folders = get_option('aida_folders', array());
            if (!empty($folders)) {
                foreach ($folders as $folder) {
                    echo '<li><strong>' . esc_html($folder) . '</strong><ul>';
                    $files = get_option('aida_folder_files_' . sanitize_title($folder), array());
                    if (!empty($files)) {
                        foreach ($files as $f) {
                            echo '<li><a href="' . esc_url($f['url']) . '" target="_blank">' . esc_html($f['name']) . '</a></li>';
                        }
                    } else {
                        echo '<li>No files uploaded</li>';
                    }
                    echo '</ul></li>';
                }
            } else {
                echo '<li>No folders available</li>';
            }
            ?>
        </ul>
        <?php
        return ob_get_clean();
    }

    return '<p>You do not have permission to access this dashboard.</p>';
}

// -----------------------------
// Handle Form Submissions
// -----------------------------
add_action('init', 'aida_handle_forms');
function aida_handle_forms() {
    // Create Member
    if (isset($_POST['create_member'])) {
        $name = sanitize_text_field($_POST['member_name']);
        $membership_no = sanitize_text_field($_POST['membership_no']);
        $start_date = sanitize_text_field($_POST['start_date']);
        $end_date = sanitize_text_field($_POST['end_date']);
        $email = sanitize_email($_POST['member_email']);
        $password = wp_generate_password(12, false);

        $user_id = wp_create_user($email, $password, $email);
        if (!is_wp_error($user_id)) {
            wp_update_user(array('ID' => $user_id, 'display_name' => $name, 'role' => 'aida_member'));
            update_user_meta($user_id, 'membership_no', $membership_no);
            update_user_meta($user_id, 'start_date', $start_date);
            update_user_meta($user_id, 'end_date', $end_date);

            wp_mail($email, 'Your AIDA Membership Login', "Hello $name,\n\nYour membership has been created.\nLogin URL: " . wp_login_url() . "\nUsername: $email\nPassword: $password");
        }
    }

    // Create Folder
    if (isset($_POST['create_folder'])) {
        $folder_name = sanitize_text_field($_POST['folder_name']);
        $folders = get_option('aida_folders', array());
        if (!in_array($folder_name, $folders)) {
            $folders[] = $folder_name;
            update_option('aida_folders', $folders);
        }
    }

    // Upload File to Folder
    if (isset($_POST['upload_file']) && !empty($_FILES['folder_file']['name'])) {
        $folder_name = sanitize_text_field($_POST['folder_for_file']);
        $uploaded = wp_handle_upload($_FILES['folder_file'], array('test_form' => false));

        if (!empty($uploaded['url'])) {
            $files = get_option('aida_folder_files_' . sanitize_title($folder_name), array());
            $files[] = array('name' => $_FILES['folder_file']['name'], 'url' => $uploaded['url']);
            update_option('aida_folder_files_' . sanitize_title($folder_name), $files);
        }
    }
}
