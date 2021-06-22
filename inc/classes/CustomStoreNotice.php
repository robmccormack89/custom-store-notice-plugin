<?php
namespace Rmcc;

/**
 * CUSTOM STORE NOTICE
 *
**/

class CustomStoreNotice {

  public function __construct() {
    // enqueue plugin assets
    add_action('wp_enqueue_scripts', array($this, 'custom_store_notice_assets'));
    
    // after plugins are loaded, do our stuff. this is so other plugins have a chance to do their stuff first
    add_action('plugins_loaded', array($this, 'remove_demo_store_notice'));
    add_action('rmcc_before_header', 'add_custom_demo_store_notice', 10);
  }
  
  public function custom_store_notice_assets() {
    wp_enqueue_style(
      'custom-store-notice',
      CUSTOM_STORE_NOTICE_URL . 'public/css/custom-store-notice.css'
    );
  }
  
  public function remove_demo_store_notice() {
    remove_action('wp_footer', 'woocommerce_demo_store', 10);
  }

}