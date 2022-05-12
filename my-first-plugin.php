<?php

/*
  Plugin Name: My_frist_plugin
  Plugin URI:  http://localhost
  Description: A plugin to build any type of forms
  Version:     1.0.0
  Author:     Me
  Author URI:  http://localhost
  License:     GPL2
  License URI: https://www.gnu.org/licenses/gpl-2.0.html
  Domain Path: /languages
  Text Domain: my-first-plugin
 */
if (!class_exists('myfirst_plugin')) {
 class myfirst_plugin {
 	var $my_settings;
 	function __construct(){
    add_action('init',array($this,'create_custom_post'));
    add_action( 'pre_get_posts', array($this,'add_my_post_types_to_query' ));
 		add_action('admin_menu',array($this, 'menu'));
    register_activation_hook( __FILE__, array( $this, 'activate_plugin' ) );

 		add_action( 'admin_enqueue_scripts', array( $this, 'register_admin_assets' ) ); //registers admin assets
		add_action( 'wp_enqueue_scripts', array( $this, 'register_frontend_assets' ) ); //registers admin assets

		// add_action( 'wp_ajax_save_settings_action', array( $this, 'save_form_ajax' ) ); //add form ajax action
		// add_action( 'wp_ajax_nopriv_save_settings_action', array( $this, 'no_permission' ) );

    

    add_action('admin_post_save_settings_action', array($this, 'save_form_ajax'));
    add_action('admin_post_front_savetodb', array($this, 'front_savetodb'));

   /*shortcode*/
    add_shortcode('my_form',array($this, 'create_shortcode'));
    add_shortcode('my_books',array($this,'front_custom_post'));
 	}
 	function menu(){
 		add_menu_page('New Form', 'New Form', 'manage_options', 'new_form', array($this, 'new_form'));
 		add_submenu_page('new_form','Sub page','Sub Page','manage_options','sub_page',array($this, 'new_form'));
 	}
 	function new_form(){
 		include('includes/new_form.php');
 	}
 	function register_admin_assets() {
    $admin_ajax_nonce = wp_create_nonce( 'my-admin-ajax-nonce' );
 		$admin_ajax_object = array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'ajax_nonce' => $admin_ajax_nonce );

 		wp_enqueue_script( 'admin', plugin_dir_url( __FILE__ ) .'js/admin.js',  array( 'jquery' ), '1.0.0' );
    wp_localize_script( 'admin', 'my_ajax_obj', $admin_ajax_object );
 	}
 	function register_frontend_assets() {
      wp_enqueue_style( 'front-styles', plugin_dir_url(__FILE__). 'css/frontend.css',array() );
       wp_enqueue_script( 'frontend', plugin_dir_url( __FILE__ ) .'js/frontend.js',  array( 'jquery' ), '1.0.0' );
 	}
 	function save_form_ajax() {
    if ( isset( $_POST['save_settings_nonce'] ) && wp_verify_nonce( $_POST['save_settings_nonce'], 'save_settings_action' ) ) {
      include('includes/save_settings.php');
    }
 	}
  function create_shortcode(){
    include('includes/shortcode.php');
 } 
 function activate_plugin() {
  include('includes/activation.php');
 }

 function front_savetodb(){
  include('includes/front_savetodb.php');
 }
function create_custom_post(){
  register_post_type('book', array('public'=> true, 'label'=>'Books'));
}
function add_my_post_types_to_query( $query ) {
    if ( is_home() && $query->is_main_query() )
        $query->set( 'post_type', array( 'post', 'book' ) );
    return $query;
}
function front_custom_post(){
  include('includes/shortcode_for_custompost.php');
}
}
 $myfirst_plugin_obj = new myfirst_plugin();
}
