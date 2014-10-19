<?php

add_action('wp_head', 'favicon_link');
function favicon_link() {
    echo '<link rel="shortcut icon" href="/favicon.ico">' . "\n";
}

add_action('wp_enqueue_scripts', 'enqueue_parent_theme_styles');
function enqueue_parent_theme_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri().'/style.css');
}