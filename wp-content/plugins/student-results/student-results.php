<?php

/*
Plugin Name: Student Result
Plugin URI: https://rusulazom.xyz/plugin/studentresult
Description: Simple Plugin for testing wp plugin
Version: 1.0.0
Author: rasumon
Author URI: https://rusulazom.xyz/
License: GPLv2 or later
Text Domain: simpleplugin
*/

// create database
global $wpdb;
$table_name = $wpdb->prefix . 'student_results';
$charset_collate = $wpdb->get_charset_collate();

$sql = "CREATE TABLE $table_name (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    registration_no varchar(55) NOT NULL,
    name varchar(55) NOT NULL,
    result varchar(55) NOT NULL,
    PRIMARY KEY  (id)
) $charset_collate;";

require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql );

// form
if(isset($_POST['add_result'])){
    global $wpdb;
    $table_name = $wpdb->prefix . 'student_results';

    $registration_no = sanitize_text_field($_POST['registration_no']);
    $name = sanitize_text_field($_POST['name']);
    $result = sanitize_text_field($_POST['result']);

    $wpdb->insert( 
        $table_name, 
        array( 
            'registration_no' => $registration_no, 
            'name' => $name, 
            'result' => $result,
        ) 
    );
}

// Insert Data
function display_results_page(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'student_results';
    $results = $wpdb->get_results("SELECT * FROM $table_name");

    echo '<table>';
    echo '<tr>';
    echo '<th>Registration Number</th>';
    echo '<th>Name</th>';
    echo '<th>Result</th>';
    echo '<th>Actions</th>';
    echo '</tr>';

    foreach ($results as $result) {
        echo '<tr>';
        echo '<td>' . $result->registration_no . '</td>';
        echo '<td>' . $result->name . '</td>';
        echo '<td>' . $result->result . '</td>';
        echo '<td><a href="'.admin_url('admin.php?page=update_student_result&id=' . $result->id).'">Edit</a> | <a href="'.admin_url('admin.php?page=display_student_results&delete=' . $result->id).'">Delete</a></td>';
        echo '</tr>';
    }
    echo '</table>';
}

// update result 
if(isset($_POST['update_result'])){
    global $wpdb;
    $table_name = $wpdb->prefix . 'student_results';

    $registration_no = sanitize_text_field($_POST['registration_no']);
    $name = sanitize_text_field($_POST['name']);
    $result = sanitize_text_field($_POST['result']);
    $id = sanitize_text_field($_POST['id']);

    $wpdb->update( 
        $table_name, 
        array( 
            'registration_no' => $registration_no, 
            'name' => $name, 
            'result' => $result,
        ), 
        array( 'id' => $id ) 
    );
}
// Delete Result
if(isset($_GET['delete'])){
    global $wpdb;
    $table_name = $wpdb->prefix . 'student_results';
    $id = sanitize_text_field($_GET['delete']);
    $wpdb->delete( $table_name, array( 'id' => $id ) );
}

// Search Result 
if(isset($_POST['search'])){
    global $wpdb;
    $table_name = $wpdb->prefix . 'student_results';
    $registration_no = sanitize_text_field($_POST['registration_no']);
    $result = $wpdb->get_row("SELECT * FROM $table_name WHERE registration_no = '$registration_no'");

    echo '<table>';
    echo '<tr>';
    echo '<td>' . $result->registration_no . '</td>';
    echo '<td>' . $result->name . '</td>';
    echo '<td>' . $result->result . '</td>';
    echo '</tr>';
    echo '</table>';
}
