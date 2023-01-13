<?php 
/*
Plugin Name: Funny Comments
Plugin URI: https://rusulazom.xyz/
Description: Simple Plugin for testing wp plugin
Version: 1.0.0
Author: rasumon
Author URI: https://rusulazom.xyz/wordpress-plugins/
License: GPLv2 or later
Text Domain: funnycomments
*/
function funny_comments( $text ) {
    $text = str_replace( 'sad', 'happy', $text );
    $text = str_replace( 'bad', 'good', $text );
    $text = str_replace( 'angry', 'excited', $text );
    $text = str_replace( 'babu', 'Your are baba', $text );
    return $text;
}
add_filter( 'comment_text', 'funny_comments' );
