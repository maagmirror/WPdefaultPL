<?php
/**
 * Plugin Name: Plugin Name
 * Plugin URI: https://nibiru.com.uy
 * Description: service
 * Version: 1.0
 * Author: Nibiru Team
 * Author URI: https://nibiru.com.uy
 */

const pluginTitle = 'Plugin Name';
const pluginSlug = 'plugin_name';
const pluginIcon = 'dashicons-tagcloud';

define( 'CG_PLUGIN_FILE' , plugin_dir_path( __FILE__ ) . 'index.php');

require_once plugin_dir_path( __FILE__ ) . '/inc/index.php';
require_once plugin_dir_path( __FILE__ ) . '/shortcodes/index.php';
