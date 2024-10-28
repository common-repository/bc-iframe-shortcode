<?php

// Plugin Name:
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://bc-interactive.fr
 * @since             1.0.0
 * @package           BC Iframe shortcode
 *
 * @wordpress-plugin
 * Plugin Name:       WordPress Plugin Boilerplate
 * Plugin URI:        http://www.bc-interactive.fr/wordpress/plugins/bc-shorcode-iframe-1.0.0.zip
 * Description:       Provide [iframe] shorcode to display an external webpage within an iframe.
 * Version:           1.0.0
 * Author:            Bruno CHIREZ
 * Author URI:        http://bc-interactive.fr
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * @param array $atts
 * @return string
 */
function wp_shortcode_iframe($atts = array())
{
    $defaults = array(
        'id' => null,
        'class' => null,
        'style' => null,
        'title' => null,
        'align' => null,
        'frameborder' => null,
        'height' => null,
        'name' => null,
        'sandbox' => null,
        'scrolling' => null,
        'src' => null,
        'srcdoc' => null,
        'width' => null,
    );
    $attributes = shortcode_atts($defaults, $atts);
    $attributes['src'] = esc_url($attributes['src']);

    $output = "<iframe";
    foreach ($attributes as $key => $value) {
        if (!isset($defaults[$key]) || empty($value)) {
            continue;
        }
        $output .= ' ' . $key . '="' . esc_attr($value) . '"';
    }
    $output .= "></iframe>";

    return $output;
}

add_shortcode('iframe', 'wp_shortcode_iframe');