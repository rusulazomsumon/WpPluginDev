<?php
/*
Plugin Name: Funny Comment Plugin
Plugin URI: https://rusulazom.xyz/funny-comment-plugin
Description: This plugin adds a funny comment field to the comments form
Version: 1.0
Author: Your Name
Author URI: https://rusulazom.xyz
*/

function funny_field_add() {
    echo '<p class="comment-form-funny">
            <label for="funny">Funny comment <span class="required">*</span></label>
            <input id="funny" name="funny" type="text" size="30" required />
          </p>';
}
add_action( 'comment_form_logged_in_after', 'funny_field_add' );
add_action( 'comment_form_after_fields', 'funny_field_add' );

function funny_field_save( $comment_id ) {
    if ( ( isset( $_POST['funny'] ) ) && ( $_POST['funny'] != '') )
        $funny = wp_filter_nohtml_kses($_POST['funny']);
    add_comment_meta( $comment_id, 'funny', $funny );
}
add_action( 'comment_post', 'funny_field_save' );
