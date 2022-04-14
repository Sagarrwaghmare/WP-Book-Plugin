<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              wpeka.com
 * @since             1.0.0
 * @package           Book
 *
 * @wordpress-plugin
 * Plugin Name:       wp-book
 * Plugin URI:        wpeka.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Sagar Waghmare
 * Author URI:        wpeka.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       book
 * Domain Path:       /languages
 */












// 1
function crunchify_deals_custom_post_type() {
	$labels = array(
		'name'                => __( 'Books' ),
		'singular_name'       => __( 'Book'),
		'menu_name'           => __( 'Books'),
		'parent_item_colon'   => __( 'Parent Book'),
		'all_items'           => __( 'All Books'),
		'view_item'           => __( 'View Book'),
		'add_new_item'        => __( 'Add New Book'),
		'add_new'             => __( 'Add New'),
		'edit_item'           => __( 'Edit Book'),
		'update_item'         => __( 'Update Book'),
		'search_items'        => __( 'Search Book'),
		'not_found'           => __( 'Not Found'),
		'not_found_in_trash'  => __( 'Not found in Trash')
	);
	$args = array(
		'label'               => __( 'books'),
		'description'         => __( 'Best Crunchify Deals'),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields'),
		'public'              => true,
		'hierarchical'        => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'has_archive'         => true,
		'can_export'          => true,
		'exclude_from_search' => false,
	        'yarpp_support'       => true,
		'taxonomies' 	      => array('post_tag'),
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'show_in_rest'=>false
);
	register_post_type( 'books', $args );
}
add_action( 'init', 'crunchify_deals_custom_post_type', 0 );


















// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'BOOK_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-book-activator.php
 */
function activate_book() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-book-activator.php';
	Book_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-book-deactivator.php
 */
function deactivate_book() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-book-deactivator.php';
	Book_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_book' );
register_deactivation_hook( __FILE__, 'deactivate_book' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-book.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_book() {

	$plugin = new Book();
	$plugin->run();

}
run_book();
