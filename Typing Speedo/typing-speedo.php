<?php
/**
 * Plugin Name: Typing Speedo
 * Description: A plugin to test typing speed and accuracy.
 * Version: 1.0
 * Author: Umar Shaheen
 */

// Enqueue scripts and styles
function typing_speedo_enqueue_scripts() {
    wp_enqueue_style('typing-speedo-style', plugin_dir_url(__FILE__) . 'css/style.css');
    wp_enqueue_script('typing-speedo-script', plugin_dir_url(__FILE__) . 'js/script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'typing_speedo_enqueue_scripts');

// Create shortcode for typing test
function typing_speedo_shortcode() {
    ob_start();
    include 'templates/typing-test.php';
    return ob_get_clean();
}
add_shortcode('typing_speedo', 'typing_speedo_shortcode');
