<?php
/**
 * Plugin Name: Members List
 * Plugin URI: https://rasumon.com
 * Description: A plugin to display a list of members.
 * Version: 1.0
 * Author: Rusul Azom
 * Author URI: https://rasumon.com
**/

// Creating a new database table
global $wpdb;
$charset_collate = $wpdb->get_charset_collate();

$table_name = $wpdb->prefix . 'members_list';
$sql = "CREATE TABLE $table_name (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    designation VARCHAR(255) NOT NULL,
    contact VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
) $charset_collate;";

require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
dbDelta($sql);

// Creating a form to add new members

function members_list_form() {
    ob_start(); ?>
    <form method="post">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required>

        <label for="designation">Designation</label>
        <input type="text" name="designation" id="designation" required>

        <label for="contact">Contact</label>
        <input type="text" name="contact" id="contact" required>

        <?php wp_nonce_field('add_member', 'member_nonce'); ?>
        <button type="submit" name="add_member">Add Member</button>
    </form>
    <?php
    return ob_get_clean();
}

// Saving new member data to the database
function members_list_add_member() {
    global $wpdb;

    if (isset($_POST['add_member'])) {
        if (!wp_verify_nonce($_POST['member_nonce'], 'add_member')) {
            die('Invalid nonce');
        }

        $name = sanitize_text_field($_POST['name']);
        $designation = sanitize_text_field($_POST['designation']);
        $contact = sanitize_text_field($_POST['contact']);

        $wpdb->insert($wpdb->prefix . 'members_list', array(
            'name' => $name,
            'designation' => $designation,
            'contact' => $contact
        ));

        wp_redirect(get_permalink());
        exit;
    }
}
add_action('init', 'members_list_add_member');


// Creating a shortcode to display the members list
function members_list_shortcode() {
    global $wpdb;

    $members = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}members_list");

    ob_start(); ?>
    <ul>
        <?php foreach ($members as $member): ?>
            <li>
                <?php echo $member->name; ?> -
                <?php echo $member->designation; ?> -
                <?php echo $member->contact; ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php
    return ob_get_clean();
}
add_shortcode('members_list', 'members_list_shortcode');
