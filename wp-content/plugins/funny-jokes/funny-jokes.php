<?php
/*
Plugin Name: Funny Jokes
Plugin URI: https://example.com/funny-jokes
Description: A simple plugin to add a random joke to the end of each post
Version: 1.0
Author: Your Name
Author URI: https://example.com
License: GPL2
*/
function get_joke() {
    $jokes = array(
        "Why did the tomato turn red? Because it saw the salad dressing!",
        "What do you call an alligator in a vest? An investigator!",
        "Why did the cookie go to the doctor? Because it was feeling crumbly!",
        "Why did the scarecrow win an award? Because he was outstanding in his field!"
    );
    return $jokes[array_rand($jokes)];
}

function add_joke() {
    echo '<p class="joke">'.get_joke().'</p>';
}
add_action( 'the_content', 'add_joke');
