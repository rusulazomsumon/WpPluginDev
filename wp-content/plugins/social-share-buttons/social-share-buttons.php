<?php
/*
Plugin Name: Social Share Buttons
Plugin URI: https://example.com/social-share-buttons
Description: A simple plugin to add social share buttons after each post
Version: 1.0
Author: Your Name
Author URI: https://example.com
License: GPL2
*/

function add_social_share_buttons() {
    global $post;
    $url = get_permalink($post->ID);
    echo '<div class="social-share-buttons">';
    echo '<a href="https://www.facebook.com/sharer/sharer.php?u='.$url.'"><i class="fa fa-facebook"></i></a>';
    echo '<a href="https://twitter.com/home?status='.$url.'"><i class="fa fa-twitter"></i></a>';
    echo '<a href="https://plus.google.com/share?url='.$url.'"><i class="fa fa-google"></i></a>';
    echo '<a href="https://www.linkedin.com/shareArticle?url='.$url.'"><i class="fa fa-linkedin"></i></a>';
    echo '</div>';
}
add_action( 'the_content', 'add_social_share_buttons');
