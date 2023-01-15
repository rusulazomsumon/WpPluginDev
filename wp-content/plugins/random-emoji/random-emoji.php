<?php
/*
Plugin Name: Random Emoji
Plugin URI: https://rusulazom.xyz/plugin/randomemoji
Description: Simple Plugin for testing wp plugin
Version: 1.0.0
Author: rasumon
Author URI: https://rusulazom.xyz/
License: GPLv2 or later
Text Domain: randomemoji
*/

function random_emoji( $title ) {
    $emoji = array( "😀", "😃", "😄", "😁", "😆", "😅", "😂", "🤣", "☺️", "😊", "😇", "🙂", "🙃", "😉", "😌", "😍", "😘", "😗", "😙", "😚", "😋", "😛", "😝", "😜", "🤪", "🤨", "🧐", "🤓");
    $random_emoji = $emoji[array_rand($emoji)];
    $title .= ' '.$random_emoji;
    return $title;
}
add_filter( 'the_title', 'random_emoji' );
