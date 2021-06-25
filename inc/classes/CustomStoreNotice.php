<?php
namespace Rmcc;

class CustomStoreNotice {

  public function __construct() {
    add_action('plugins_loaded', array($this, 'plugin_text_domain_init'));    
    add_action('wp_enqueue_scripts', array($this, 'plugin_enqueue_assets'));
    
    add_action('plugins_loaded', array($this, 'remove_default_demo_store_notice'));
    
    add_action('rmcc_before_header', 'add_custom_demo_store_notice', 10);
  }
  
  public function remove_default_demo_store_notice() {
    remove_action('wp_footer', 'woocommerce_demo_store', 10);
  }

  public function plugin_enqueue_assets() {
    wp_enqueue_style(
      'custom-store-notice',
      CUSTOM_STORE_NOTICE_URL . 'public/css/custom-store-notice.css'
    );
  }
  public function plugin_text_domain_init() {
    load_plugin_textdomain('custom-store-notice', false, CUSTOM_STORE_NOTICE_BASE. '/languages');
  }
}